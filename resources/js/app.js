require('./bootstrap');

window.Vue = require('vue');
import VueRouter from "vue-router";
import CxltToastr from "cxlt-vue2-toastr";
import VueSweetalert2 from 'vue-sweetalert2';
import { extend } from 'vee-validate';
import { required, email } from 'vee-validate/dist/rules';
import VueProgressBar from 'vue-progressbar';
import CKEditor from '@ckeditor/ckeditor5-vue';
// import VueLazyload from 'vue-lazyload'
import { store } from './store/'

import { routes } from './route/index';
import 'sweetalert2/dist/sweetalert2.min.css';
// import Slick from 'vue-slick';


const DEFAULT_TITLE="::EXCLUSIVE::"


// Vue.use(VueLazyload, {
//     preLoad: 1.3,
//     error: 'dist/error.png',
//     loading: '/images/siteloading.gif',
//     attempt: 1
// })
Vue.use(CKEditor);
Vue.use(VueSweetalert2);
Vue.use(VueProgressBar, {
    color: '#41B883',
    failedColor: '#874b4b',
    thickness: '4px',
    transition: {
        speed: '0.3s',
        opacity: '0.6s',
        termination: 400
    },
    autoRevert: true,
    location: 'top',
    inverse: false,
})

const toastConfig = {
    position: "bottom right",
    showDuration: 2000,
    timeOut: 5000,
    progressBar: true,
}

Vue.use(CxltToastr, toastConfig)
Vue.use(VueRouter);

extend('required', {
    ...required,
    message: 'This field is required'
});

// Add the required rule

let router = new VueRouter({
    mode: 'history',
    routes
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!store.getters.loggedIn) {
            next({
                name: 'home',
            })
        }
        else {
            next();
        }
    }
    else if (to.matched.some(record => record.meta.requiresVisitor)) {
        if (store.getters.loggedIn) {
            next({
                name: 'dashboard',
            })
        }
        else {
            next();
        }
    } else {
        next()
    }
})


router.afterEach( (to,from) => {
 //these hooks do not get a next function and cannot affect the navigation}
    Vue.nextTick(()=>{
        document.title=to.meta.title || DEFAULT_TITLE
    })
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
Vue.directive('plaintext', {
    bind(el, binding, Vnode) {
        el.innerHTML = el.InnerText
    }
})



Vue.component(
    'main-app',
    require('./components/App.vue').default)
    ;



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    store
});
