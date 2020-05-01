export default  class Gets {
    constructor(user) {
        this.user = user

    }

    IsLogedIn(){
        if(this.user)
            return true
        else
            false
    }




}
