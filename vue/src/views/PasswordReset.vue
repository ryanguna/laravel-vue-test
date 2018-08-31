<template>

  <el-container>
    <el-main>
      <el-row :gutter="20">
        <div  class="signup-container">
          <el-col :xs="24" :sm="24" :md="15" :lg="8" :xl="8" >
            <el-card>
              <div slot="header" class="clearfix">
                <span class="login-title">Signup</span>
              </div>

              <el-form v-loading="loading" :model="ruleForm" :rules="rules" ref="ruleForm" label-width="120px" class="demo-ruleForm">

                <el-form-item label="Email"
                              prop="email">
                  <el-input
                    placeholder="Email Address"
                    suffix-icon="el-icon-message"
                    v-model="ruleForm.email"
                    auto-complete="off"
                    @input = "ruleErrorMessage = ''"
                    @keyup.enter.native="login"
                  >
                  </el-input>

                  <div v-show="ruleErrorMessage"  class="el-form-item__error">
                    {{ ruleErrorMessage }}
                  </div>

                </el-form-item>


                <el-form-item>
                  <el-button type="primary" @click="submitForm('ruleForm')">Reset</el-button>
                </el-form-item>
              </el-form>


            </el-card>
          </el-col>
        </div>
      </el-row>
    </el-main>
  </el-container>






</template>


<script>
  export default {
    data() {
      return {
        loading : false,
        ruleErrorMessage: '',
        ruleForm: {
          email : '',
        },
        rules: {
          email : [
            { required: true, message: 'Please input email address', trigger: 'blur' },
            { type: 'email', message: 'Please input correct email address', trigger: ['blur', 'change'] }
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
              self.axios.post('api/password/create', {
                  email : self.ruleForm.email
              })
              .then((response) => {
                  self.loading = false;
                console.log('RESPONSE', response);
                // self.$router.push('/login')

              })
              .catch(error => {
                  self.loading = false;
                  self.ruleErrorMessage =   error.response.data.message;
                console.log('ERROR TO', error.response.data.message);
              });


          } else {
            console.log('error submit!!');
            return false;
          }
        });
      },
      resetForm(formName) {
        this.$refs[formName].resetFields();
      }
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
</style>



