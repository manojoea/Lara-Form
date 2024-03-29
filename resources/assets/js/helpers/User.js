import Token from "./Token";
import AppStorage from "./AppStorage";

class User{

    login(data){
        axios.post('/api/auth/login', data)
            .then(res => this.responseAfterLogin(res))
            .catch(error => console.log(error.response.data))
    }

    signup(data){
        axios.post('/api/auth/signup', data)
            .then(res => this.responseAfterLogin(res))
            .catch(error => this.errors = error.response.data.errors)
    }

    responseAfterLogin(res){
         const access_token = res.data.access_token
         const username = res.data.user
        //  console.log(username)
         if (Token.isValid(access_token)) {
            //  console.log(username)
             AppStorage.store(username, access_token)
             window.location = '/forum'
         }
    }

    hasToken(){
        const storedToken = AppStorage.getToken();
        if (storedToken) {
            return Token.isValid(storedToken) ? true : false
        }
        return false
    }

    loggedIn(){
        return this.hasToken();
    }

    logout(){
        return AppStorage.clear()
        window.location = '/forum'
    }

    name(){
        if (this.loggedIn()) {
            return AppStorage.getUser();
        }
    }

    id(){
        if (this.loggedIn) {
            const payload = Token.payload(AppStorage.getToken());
            return payload.sub
        }
    }
}

export default User = new User();
