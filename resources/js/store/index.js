import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import { resolve } from 'url';
import { reject } from 'q';
Vue.use(Vuex);
axios.defaults.baseURL="http://localhost:8000/api"

import mutations from "./mutations"
import actions from "./actions"
import getters from "./getters"


export const store =new Vuex.Store({
    state:{
      token:localStorage.getItem('token') || null,
      serverError:false,
      posts:null,
      post:null,
      category:[],
      loading:false,
      uploadProgress:0,
      evsFeed:[]
    },
    mutations,
    actions,
    getters
}) 