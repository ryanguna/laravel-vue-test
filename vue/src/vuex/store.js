import Vue from 'vue'
import Vuex from 'vuex'
import state from './state.js'
import mutations from './mutations.js'
import actions from './actions.js'
import getters from './getters.js'


//Import store modules
import authModule from './modules/auth/store.js'


Vue.use(Vuex);



export default new Vuex.Store({
    modules: {
        'auth' : authModule,
    },
    state,
    mutations,
    actions,
    getters,
});