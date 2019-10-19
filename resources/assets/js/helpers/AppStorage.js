
class AppStorage{

    storeToken(token){
        localStorage.setItem('token', token);
    }

    storeUser(user){
        localStorage.setItem('user', user);

    }



    store(user, token){
        // console.log(user)
        this.storeUser(user);
        this.storeToken(token);
        // console.log(this.storeToken.token);
    }

    clear(){
        localStorage.removeItem('user');
        localStorage.removeItem('token');
    }

    getToken(){
        return localStorage.getItem('token');
    }

    getUser() {
        return localStorage.getItem('user');
    }
}

export default AppStorage = new AppStorage();
