<template>
  <b-container fluid style="height: calc(100vh - 56px);">
    <b-row no-gutters>
      <b-col cols="4">
        <contact-form-component/>
        <contact-list-component/>
      </b-col>
      <b-col cols="8">
        <active-conversation-component v-if="selectedConversation"/>
      </b-col>
    </b-row>
  </b-container>
</template>
<script>
export default {
  props: {
    user: Object
  },
  mounted() {
    this.$store.commit("setUser", this.user);
    this.$store.dispatch("getConversations").then(() => {
      const conversationId = this.$route.params.conversationId;
      if (conversationId) {
        const conversation = this.$store.getters.getConversationById(
          conversationId
        );
        this.$store.dispatch("getMessages", conversation);
      }
    });

    Echo.private(`users.${this.user.id}`).listen("MessageSend", data => {
      const message = data.message;
      message.written_by_me = false;
      console.log(message);
      this.addMessage(message);
    });

    Echo.join(`messenger`)
      .here(users => {
        users.forEach(user => this.changeStatus(user, true));
      })
      .joining(user => this.changeStatus(user, true))
      .leaving(user => this.changeStatus(user, false));
  },
  methods: {
    changeStatus(user, status) {
      const index = this.$store.state.conversations.findIndex(conversation => {
        return conversation.contact_id == user.id;
      });
      if (index >= 0)
        //vue.set
        this.$set(this.$store.state.conversations[index], "online", status);
    },
    addMessage(message) {
      this.$store.commit("addMessage", message);
    }
  },
  computed: {
    selectedConversation() {
      return this.$store.state.selectedConversation;
    }
  }
};
</script>