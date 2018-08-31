<template>
   <div>
       <el-form  v-loading="loading" :model="signUpForm" :rules="rules" ref="signUpForm" label-width="120px" class="demo-signUpForm">

           <el-form-item label="Email"
                         prop="email">
               <el-input
                       placeholder="Email Address"
                       suffix-icon="el-icon-message"
                       v-model="signUpForm.email"
                       auto-complete="off"
                       @input = "ruleErrorMessage = ''"
                       @keyup.enter.native="submitForm('signUpForm')"
                       :class="{'is-danger': ruleErrorMessage}"
               >
               </el-input>
               <div v-show="ruleErrorMessage"  class="el-form-item__error">
               {{ ruleErrorMessage }}
               </div>
           </el-form-item>
           <el-form-item label="Password"  prop="password">
               <el-input
                       placeholder="Password"
                       v-model="signUpForm.password"
                       auto-complete="off"
                       @keyup.enter.native="submitForm('signUpForm')"
                       type="password">
               </el-input>

               <!-- FORGET PASSWORD END -->
           </el-form-item>


           <el-form-item label="First name"  prop="firstname">
               <el-input v-model="signUpForm.firstname" placeholder="First name"></el-input>
           </el-form-item>

           <el-form-item label="Last name"  prop="lastname">
               <el-input v-model="signUpForm.lastname" placeholder="Last name"></el-input>
           </el-form-item>

           <el-form-item>
               <el-button type="primary" @click="submitForm('signUpForm')">Sign up</el-button>
           </el-form-item>
       </el-form>
   </div>
</template>

<script>
    export default {
        data() {
            return {
                loading : false,
                formName : 'signUp',
                signUpForm: {
                    firstname: '',
                    lastname : '',
                    email : '',
                    password: ''
                },
                ruleErrorMessage : '',
                rules: {
                    firstname: [
                        { required: true, message: 'Please input first name', trigger: 'blur' },
                    ],
                    lastname: [
                        { required: true, message: 'Please input last name', trigger: 'blur' },
                    ],
                    email : [
                        { required: true, message: 'Please input email address', trigger: 'blur' },
                        { type: 'email', message: 'Please input correct email address', trigger: ['blur', 'change'] },
                    ],
                    password : [
                        { required: true, message: 'Please input password', trigger: 'blur' },
                        { min: 5, message: 'The password must be at least 5 characters.'}
                    ],
                }
            };
        },
        methods: {
            submitForm(formName) {
                const self = this;
                self.ruleErrorMessage = '';
                this.$refs[formName].validate((valid) => {
                    if (valid) {

                        self.loading = true;
                        self.$axios.post('api/authentication/signUp', self.signUpForm)
                            .then((response) => {
                                this.$message({
                                    message: 'Account successfully registered.',
                                    type: 'success'
                                });
                                self.$router.push('/login');
                            })
                            .catch(error => {
                                console.log('ERROR MESSAGE', error.response.status);
                                self.loading = false;
                                self.signUpForm.password = '';
                                self.ruleErrorMessage = error.response.data.data;
                            });

                    } else {
                        return false;
                    }
                });
            },
            resetForm(formName) {
                this.$refs['signUpForm'].resetFields();
            }
        }
    }
</script>

<style scoped>
    .is-danger >>> .el-input__inner {
        border-color: #f56c6c !important;
    }
</style>
