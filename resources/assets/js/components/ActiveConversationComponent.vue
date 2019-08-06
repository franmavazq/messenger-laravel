<template>
  <b-row>
    <b-col cols="8">
      <b-card no-body footer-bg-variant="light" footer-border-variant="dark" class="h-100">
        <b-card-body class="card-body-scroll">
          <message-conversation-component
            v-for=" message in messages"
            :key="message.id"
            :written-by-me="message.written_by_me"
            :image="message.written_by_me ? myImageUrl : selectedConversation.contact_image"
          >{{ message.content }}</message-conversation-component>
        </b-card-body>

        <div slot="footer">
          <b-form class="mb-0" @submit.prevent="postMessage" autocomplete="off">
            <b-input-group>
              <b-form-input
                class="text-center"
                type="text"
                v-model="newMessage"
                placeholder="Escribe un mensaje ..."
              ></b-form-input>

              <b-input-group-append>
                <b-btn type="submit" variant="primary">Enviar</b-btn>
              </b-input-group-append>
            </b-input-group>
          </b-form>
        </div>
      </b-card>
    </b-col>
    <b-col cols="4">
      <b-img
        :src="selectedConversation.contact_image"
        rounded="circle"
        width="75"
        height="75"
        class="m-1"
      />
      <p>{{ selectedConversation.contact_name }}</p>
      <hr>
      <b-form-checkbox>Desactivar notificaciones</b-form-checkbox>
    </b-col>
  </b-row>
</template>

<style>
.card-body-scroll {
  max-height: calc(100vh - 63px);
  overflow-y: auto;
}
</style>


<script>
export default {
  data() {
    return {
      newMessage: ""
    };
  },
  mounted() {
    eventBus.$on("example", function(data) {
      console.log("Event Bus example", data);
    });
  },
  methods: {
    postMessage() {
      this.$store.dispatch("postMessage", this.newMessage).then(() => {
        this.newMessage = "";
      });
    },
    scrollToEnd() {
      const el = document.querySelector(".card-body-scroll");
      el.scrollTop = el.scrollHeight;
    }
  },
  computed: {
    myImageUrl() {
      return `/users/${this.$store.state.user.image}`;
    },
    selectedConversation() {
      return this.$store.state.selectedConversation;
    },
    messages() {
      return this.$store.state.messages;
    }
  },
  updated() {
    this.scrollToEnd();
  }
};
</script>