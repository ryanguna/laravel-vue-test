<template>
  <div>
      <el-container>
          <el-main>
              <el-row :gutter="20">
                  <div  class="signup-container">
                      <el-col :xs="24" :sm="24" :md="15" :lg="8" :xl="8" >
                          <el-card>
                              <div slot="header" class="clearfix">
                                  <span class="login-title">Sign up</span>
                              </div>
                              <sign-up></sign-up>
                          </el-card>
                      </el-col>
                  </div>
              </el-row>
          </el-main>
      </el-container>
  </div>
</template>

<script>
    import SignUp from '../components/auth/SignUp.vue';
    export default {
        components : {
            SignUp : SignUp
        }
    }
</script>

<style scoped>
    .signup-container {
        align-items: center;
        display: flex;
        justify-content: center;
        margin: 180px auto;
    }
    .login-title {
        color: #444 !important;
        font-size: 1.2em !important;
        font-weight: bold !important;
    }
</style>
