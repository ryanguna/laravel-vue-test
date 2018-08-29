import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import(/* webpackChunkName: "about" */ './views/Home.vue'),
      meta: {
          forAuth : true
      },
      children : [
          {
              path: 'about',
              name: 'about',
              component: () => import('./views/About.vue')
          },
      ]
    },
    {
      path: '/signup',
      name: 'signup',
      component: () => import('./views/SignUp.vue'),
      meta: {
          forVisitors : true
      }
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('./views/Login.vue'),
      meta: {
          forVisitors : true
      }
    },
    {
        path: "/account/begin_password_reset",
        component: () => import('./views/PasswordReset.vue'),
        meta: {
            forVisitors : true
        }
    },
    {
        path: "/resetAccount",
        component: () => import('./views/ResetAccount.vue'),
        meta: {
            forVisitors : true
        }
    },
  ]


})



