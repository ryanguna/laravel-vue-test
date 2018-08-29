/**
 * Created by Admin on 8/24/2017.
 */
export default function (Vue) {
    Vue.auth = {
        setToken(token, expiration) {
            localStorage.setItem('token', token);
            localStorage.setItem('expiration', expiration);
        },
        getToken() {
            let token = localStorage.getItem('token')
            let expiration = localStorage.getItem('expiration')
            if(!token || !expiration)
                return null
            if(Date.now() > parseInt(expiration)){
                this.destoryToken();
                return null
            }else{
                return token
            }
        },
        destoryToken()  {
            localStorage.removeItem('tesiToken')
            localStorage.removeItem('tesiTokenExpiration')
            localStorage.removeItem('expiration')
            localStorage.removeItem('token')
        },
        isAuthenticated()  {
            return !!this.getToken();
        }
    };

    Object.defineProperties(Vue.prototype, {
        $auth :  {
            get: () => {
                return Vue.auth
            }
        }
    })


}
