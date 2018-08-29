import Vue from 'vue'

import './plugins/axios'
import './plugins/element-ui'
import Auth from './plugins/auth'
import App from './App.vue'
import router from './router'
import store from './vuex/store'

import './styles.scss'

Vue.use(Auth);


Vue.config.productionTip = false;


router.beforeEach(
    (to,from,next) => {
        if(to.matched.some(record => record.meta.forVisitors)){
            if(Vue.auth.isAuthenticated()){
                next({
                    path: '/'
                })
            } else next()
        }else if(to.matched.some(record => record.meta.forAuth)){
            if(! Vue.auth.isAuthenticated()){
                next({
                    path: '/login'
                })
            } else next()
        }else next()
    }
);



new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
