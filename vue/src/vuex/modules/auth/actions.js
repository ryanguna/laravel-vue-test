import Vue from 'vue';
export default {
    getAuthenticatedUser({ commit }, payload ){
        // commit('GET_AUTHENTICATED_USER', payload)

        Vue.axios.get('api/user/getCurrentlyLoggedInUser')
            .then((response) => {
                console.log('RESPONSE ETO NA KUHA KO', response);
            })
            .catch(error => {
                console.log('ERROR');
            });



    }
};
