import Vue from 'vue'
import $ from 'jquery'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import MyCharacters from './components/MyCharacters.vue'
import SearchCharacters from './components/SearchCharacters.vue'
import AccountFusion from './components/AccountFusion.vue'
import ModifCharac from './components/ModifCharac.vue'
import ViewCharac from './components/ViewCharac.vue'
import GalleryCharac from './components/GalleryCharac.vue'
import BlogCharac from './components/BlogCharac.vue'
import BlogPost from './components/BlogPost.vue'
import BlogEdit from './components/BlogEdit.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path:'/aionGRP/index.php',
            name: 'mycharacters',
            component: MyCharacters,
        },
        {
            path:'/aionGRP/index.php/mycharacters',
            name: 'mycharacters',
            component: MyCharacters,
        },
        {
            path:'/aionGRP/index.php/searchcharacters',
            name: 'searchcharacters',
            component: SearchCharacters,
        },
        {
            path:'/aionGRP/index.php/accountfusion',
            name: 'accountfusion',
            component: AccountFusion,
        },
        {
            path:'/aionGRP/index.php/modifcharac/:id',
            name: 'modifcharac',
            component: ModifCharac,
        },
        {
            path:'/aionGRP/index.php/viewcharac/:id',
            name: 'viewcharac',
            component: ViewCharac,
        },
        {
            path:'/aionGRP/index.php/gallerycharac/:id',
            name: 'gallerycharac',
            component: GalleryCharac,
        },
        {
            path:'/aionGRP/index.php/blogcharac/:id',
            name: 'blogcharac',
            component: BlogCharac,
        },
        {
            path:'/aionGRP/index.php/blogpost/:id',
            name: 'blogpost',
            component: BlogPost,
        },
        {
            path:'/aionGRP/index.php/blogedit/:id',
            name: 'blogedit',
            component: BlogEdit,
        },
    ],
});

const app = new Vue({
    el: "#app",
    component: {},
    router,
});
