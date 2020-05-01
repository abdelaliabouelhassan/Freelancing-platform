<template>
    <h1>My Profile</h1>
</template>

<script>
    export default {
        watch: {
            $route: {
                immediate: true,
                handler(to, from) {
                    document.title = to.meta.title || 'Profile | Bricole';
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
        }
    }
</script>
