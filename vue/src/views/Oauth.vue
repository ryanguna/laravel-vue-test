<template>
    <div>
        Social Login!
    </div>
</template>

<script>
    export default {
        name: "Oauth",
        mounted(){
            console.log('WELCOME TO OAUTH!');
            const self = this;
            self.$axios.get(`api/authentication/social/oauth/authorize/?code=${this.$route.query.code}`)
                .then(response => {
                    console.log('PUTANG INA NIYO! ', response)

                    / self.$auth.setToken(response.data.oauth_token.access_token, response.data.oauth_token.expires_in + Date.now());
                    // self.$auth.setToken(response.body.tesi.access_token, response.body.tesi.expires_in + Date.now(), 'tesi');

                    self.$router.push("/");

                }).catch(err => {
                console.log('Error ', err);
                // self.errorMessage = `${err.body.data} Redirecting to log in page.`;

                // if(self.errorMessage) {
                //     setTimeout(() => {
                //         self.$router.push("/login");
                //     }, 1000);
                // }

            })


        }
    }
</script>

<style scoped>

</style>