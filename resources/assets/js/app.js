require('./bootstrap');

import Vue from 'vue'
import firebase from 'firebase'
import BootstrapVue from 'bootstrap-vue'
import store from './store'
import VueRouter from 'vue-router'
import MessengerComponent from './components/MessengerComponent.vue'
import ExampleComponent from './components/ExampleComponent.vue'

Vue.use(BootstrapVue);
Vue.use(VueRouter);


/*Firebase*/
var firebaseConfig = {
    apiKey: "AIzaSyCTqclB-lNgl0tLqTNZXFWba-RM669b2B4",
    authDomain: "turistainfo-77007.firebaseapp.com",
    databaseURL: "https://turistainfo-77007.firebaseio.com",
    projectId: "turistainfo-77007",
    storageBucket: "turistainfo-77007.appspot.com",
    messagingSenderId: "743919633104",
    appId: "1:743919633104:web:abe80b37b347c15d"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
/*End Firebase */
let db = firebase.firestore();
let ests = db.collection('rooms');
console.log(ests);
// console.log("hol");
window.eventBus = new Vue();

Vue.component('contact-form-component',
    require('./components/ContactFormComponent.vue')
);
Vue.component('profile-component',
    require('./components/ProfileFormComponent.vue')
);
Vue.component('status-component',
    require('./components/StatusComponent.vue')
);
// Vue.component('messenger-component', 
//     require('./components/MessengerComponent.vue')
// );
Vue.component('contact-component',
    require('./components/ContactComponent.vue')
);
Vue.component('contact-list-component',
    require('./components/ContactListComponent.vue')
);
Vue.component('active-conversation-component',
    require('./components/ActiveConversationComponent.vue')
);
Vue.component('message-conversation-component',
    require('./components/MessageConversationComponent.vue')
);

const routes = [{
        path: '/chat',
        component: MessengerComponent
    },
    {
        path: '/chat/:conversationId',
        component: MessengerComponent
    },
    {
        path: '/example',
        component: ExampleComponent
    }
]

const router = new VueRouter({
    routes,
    mode: 'history'
});

const app = new Vue({
    el: '#app',
    store,
    router,
    methods: {
        logout() {
            document.getElementById('logout-form').submit();
        }
    }
});