<template>
    <h1>My Profile</h1>
</template>

<script>
    export default {
        data () {

            return {

                // Create a new form instance
                form: new Form({
                    id:'',
                    name: '',
                    password: '',
                    email:'',
                }),
                post:{},
            }

        },
        watch: {
            $route: {
                immediate: true,
                handler(to, from) {
                    document.title = to.meta.title || 'Profile | Brikole';
                }
            },
        },
        mounted() {
            console.log(this.$gets.IsLogedIn())
            if(this.$gets.IsLogedIn()){
                console.log('log')
            }else{
                console.log('not')
            }
            this.$Progress.start()
            console.log('Component mounted.')
            this.$Progress.finish()
        },
        created() {
            axios.get('api/profile').then(({data})=>(this.form.fill(data)))
        }
    }
</script>
