<template>
    <div>
        <el-container>
            <el-main>
                <el-row :gutter="20">
                    <div  class="login-container">
                        <el-col :xs="24" :sm="24" :md="15" :lg="8" :xl="8" >
                            <el-card>
                                <div slot="header" class="clearfix">
                                    <span class="login-title">Login</span>
                                </div>
                                <login-form></login-form>
                            </el-card>
                        </el-col>
                    </div>
                </el-row>
            </el-main>
        </el-container>
    </div>
</template>

<script>
    import LoginForm from '../components/auth/LoginForm.vue';
    export default {
        name: "Login",
        components : {
            LoginForm
        }
    }
</script>

<style scoped>
    .login-container {
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
