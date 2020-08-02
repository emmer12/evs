import AccountCreated from '../components/pages/AccountCreated.vue';
import AccountActivated from '../components/pages/AccountActivated.vue';
import AboutPage from '../components/pages/AboutPage.vue';
import ContactPage from '../components/pages/ContactPage.vue';
import BlogPage from '../components/pages/BlogPage.vue';
import BlogPageSingle from '../components/pages/BlogPageSingle.vue';
import HomePage from '../components/pages/HomePage.vue';
import GalleryPage from '../components/pages/GalleryPage.vue';
import EvsFeed from '../components/pages/EvsFeed.vue';
import AddFeed from '../components/pages/AddFeed.vue';
import Category from '../components/pages/Category.vue';
import FeedCategory from '../components/pages/FeedCategory.vue';
import NewPost from '../components/partials/NewPost.vue';
import EditPost from '../components/partials/EditPost.vue';
import ShowPost from '../components/partials/ShowPost.vue';
import UploadPage from '../components/partials/UploadPage.vue';
import AdminLoginPage from '../components/auth/AdminLoginPage.vue';
import PageNotFound from '../components/pages/PageNotFound.vue';
import DashboardPage from '../components/auth/DashboardPage.vue';
import Logout from '../components/auth/Logout.vue';

export const routes = [
    {
        path: '/',
        name: 'home',
        component: HomePage,
        meta: {
            // progress:{
            //     func:[
            //         {call:'color',modifier:'temp',argument:'#ffb000'},
            //         {call:'fail',modifier:'temp',argument:'red'},
            //         {call:'location',modifier:'temp',argument:'top'},
            //         // {call:'color',modifier:'temp',argument:'#ffb000'},
            //     ]
            //}
        }
    },
    {
        path: '/category/:category',
        name: 'category',
        component: FeedCategory,
        meta: {
            title: "::About::",
        }
    },
    {
        path: '/contact',
        name: 'contact',
        component: ContactPage,
        meta: {
            title: "::Contact Us::",
        }
    },
    {
        path: '/blog/:slug',
        name: 'blog-single',
        component: BlogPageSingle
    },
    {
        path: '/upload-example',
        name: 'uploade',
        component: UploadPage
    },
    {
        path: '/gallery',
        name: 'gallery',
        component: GalleryPage
    },
    {
        path: '/admin/exclusive',
        name: 'admin',
        component: AdminLoginPage,
        meta: {
            requiresVisitor: true,
        }
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: DashboardPage,
        meta: {
            requiresAuth: true,
        },
        children:[
            {
                path: '',
                name: 'feeds',
                component:EvsFeed,
                meta: {
                    requiresAuth: true,
                }
            },
            {
                path: '/feeds/add',
                name: 'feeds.add',
                component:AddFeed,
                meta: {
                    requiresAuth: true,
                }
            },
            {
                path: '/feeds/category',
                name: 'feeds.category',
                component:Category,
                meta: {
                    requiresAuth: true,
                }
            },
        ]
    },

    {
        path: '/dashboard/add',
        name: 'add',
        component: NewPost,
        meta: {
            requiresAuth: true,
        }
    },

    {
        path: '/dashboard/:id/edit',
        name: 'edit',
        component: EditPost,
        meta: {
            requiresAuth: true,
        }
    },

    {
        path: '/dashboard/show/:id',
        name: 'show',
        component: ShowPost,
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/logout',
        name: 'logout',
        component: Logout,
        meta: {
            requiresAuth: true,
        }
    },
    // { 
    //     path: '/about',
    //     name: 'about',
    //     component:About,
    //     meta:{
    //         requiresAuth:false,
    //     }
    // },
    {
        path: '/account/created/success',
        name: 'account-success',
        component: AccountCreated
    },
    {
        path: '/account/activated/success',
        name: 'activated-success',
        component: AccountActivated
    },

    {
        path: '*',
        name: '404',
        component: PageNotFound
    },
];
