import Vue from 'vue'
import $ from 'jquery'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import MyCharacters from './components/MyCharacters.vue'
import SearchCharacters from './components/SearchCharacters.vue'
import AccountFusion from './components/AccountFusion.vue'
import ModifCharac from './components/ModifCharac.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path:'/aionGRPlaravel/public/mycharacters',
            name: 'mycharacters',
            component: MyCharacters,
        },
        {
            path:'/aionGRPlaravel/public/searchcharacters',
            name: 'searchcharacters',
            component: SearchCharacters,
        },
        {
            path:'/aionGRPlaravel/public/accountfusion',
            name: 'accountfusion',
            component: AccountFusion,
        },
        {
            path:'/aionGRPlaravel/public/modifcharac/:id',
            name: 'modifcharac',
            component: ModifCharac,
        },
    ],
});

const app = new Vue({
    el: "#app",
    component: {},
    router,
});
