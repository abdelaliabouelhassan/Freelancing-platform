<template>
    <div class="acc-setting">
        <h3>Account Setting</h3>
        <form @submit.prevent="resetPassword">
            <div class="cp-field">
                <h5>Old Password</h5>
                <div class="cpp-fiel">
                    <input  type="password" name="old-password" placeholder="Old Password" v-model="oldPassword" >
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            <div class="cp-field">
                <h5>New Password</h5>
                <div class="cpp-fiel">
                    <input type="password" name="new-password" placeholder="New Password" v-model="newPassword">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            <div class="cp-field">
                <h5>Repeat Password</h5>
                <div class="cpp-fiel">
                    <input type="password" name="repeat-password" placeholder="Repeat Password" v-model="renewPassword">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            <div class="cp-field">
                <h5><a href="#" title="">Forgot Password?</a></h5>
            </div>
            <div class="save-stngs pd2">
                <ul>
                    <li><button type="submit" >Save Setting</button></li>
                    <li @click="restorsetting"><a href="javascript:void(0)">Restore Setting</a></li>
                </ul>
            </div><!--save-stngs end-->
        </form>
    </div><!--acc-setting end-->
</template>

<script>

    export default {
        data () {
            return {
                oldPassword:'',
                newPassword:'',
                renewPassword:''
            }
        },
        methods:{
            restorsetting(){
              this.oldPassword = ''
              this.newPassword = ''
              this.renewPassword = ''
            },
            resetPassword(){
                this.$Progress.start('8000')
                if(this.oldPassword.length  == 0 || this.newPassword.length == 0 || this.renewPassword.length  == 0){
                    this.$Progress.fail()
                }else{
                    if(this.newPassword != this.renewPassword){
                        this.$Progress.fail()
                    }else{
                        axios.post('api/ChangePassword' , {
                            Password: this.newPassword,
                            oldPassword: this.oldPassword
                        })
                            .then(function (response) {
                                Toast.fire({
                                    icon: 'success',
                                    title:response.data.message
                                })
                            })
                            .catch(function (error) {
                                Toast.fire({
                                    icon: 'error',
                                     title: error.response.status == 422 ? error.response.data.errors.Password : error.response.data.message,
                                })
                                console.log(error.response)
                            });


                        this.$Progress.finish()

                    }
                }

            }
        }

    }
</script>

<style scoped>

</style>
