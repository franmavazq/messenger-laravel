import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        messages: [],
        selectedConversation: null,
        conversations: [],
        querySearch: '',
        user: null
    },
    //CONTROL DE LOS ESTADOS
    mutations: {
        setUser(state, user) {
            state.user = user;
        },
        newMessagesList(state, messages) {
            state.messages = messages;
        },
        addMessages(state, message) {
            const conversation = state.conversations.find((conversation) => {
                return conversation.contact_id == message.from_id ||
                    conversation.contact_id == message.to_id;
            });
            const author = state.user.id === message.from_id ? 'Tú' : conversation.contact_name;
            conversation.last_message = `${author}: ${message.content}`;
            conversation.last_time = message.created_at;
            if (state.selectedConversation.contact_id == message.from_id ||
                state.selectedConversation.contact_id == message.to_id)
                state.$store.commit('addMessages', message);

            state.messages.push(messages);
        },
        selectConversation(state, conversation) {
            state.selectedConversation = conversation;
        },
        newQuerySearch(state, newValue) {
            state.querySearch = newValue;
        },
        newConversationsList(state, conversations) {
            state.conversations = conversations;
        },
    },
    //Peticiones asincronas e invocan mutations
    actions: {
        getMessages(context, conversation) {
            return axios.get(`/api/messages?contactId=${conversation.contact_id}`)
                .then(
                    response => {
                        context.commit('selectConversation', conversation);
                        context.commit('newMessagesList', response.data);
                    }
                );
        },
        getConversations(context) {
            return axios.get('/api/conversations')
                .then((response) => {
                    context.commit('newConversationsList', response.data);
                });
        },
        postMessage(context, newMessage) {
            const params = {
                to_id: context.state.selectedConversation.contact_id,
                content: newMessage
            };
            return axios.post('/api/messages', params)
                .then((response) => {
                    if (response.data.sucess) {
                        newMessage = '';
                        const message = response.data.message;
                        message.written_by_me = true;
                        context.commit('addMessage', message);
                    }
                });
        }
    },
    getters: {
        conversationsFiltered(state) {
            return state.conversations.filter(
                conversation =>
                conversation.contact_name
                .toLowerCase()
                .includes(state.querySearch.toLowerCase())
            );
        },
        getConversationById(state) {
            return function(conversationId) {
                return state.conversations.find(
                    conversation =>
                    conversation.id == conversationId
                );
            };
        }
    }
});