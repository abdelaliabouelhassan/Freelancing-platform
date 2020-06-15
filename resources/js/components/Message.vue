<template>
    <li>
        <a href="javascript:void(0)" title="" class="not-box-open">
            <span><img src="images/icon6.png" alt=""></span>
            {{$t('message.Messages')}}
        </a>
        <div class="notification-box msg">
            <div class="nt-title">
                <h4>{{$t('message.Setting')}} </h4>
                <a href="#" title="">{{$t('message.Clear_all')}} </a>
            </div>
            <div class="nott-list">
                <div class="notfication-details" v-for="msg in messages">
                    <router-link  :to="msg.url" :key="$route.fullPath" >
                    <div class="noty-user-img">
                        <img :src="msg.image ? msg.image : 'https://via.placeholder.com/70'"  alt="">
                    </div>
                    <div class="notification-info">
                        <h3><a :href="msg.url"  title="">{{msg.username}}</a></h3>
                        <b>{{msg.message}}</b>
                        <span>{{msg.created_at}}</span>
                    </div><!--notification-info -->
                    </router-link>
                </div>
                <div  class="notfication-details" v-if="messages.length == 0 ">
                    <div class="notification-info">
                        <h3>There is No Messages</h3>
                    </div><!--notification-info -->
                </div>

                <div class="view-all-nots" v-if="messages.length != 0 ">
                    <a href="messages.html" title="">{{$t('message.View_All_Messsages')}} </a>
                </div>
            </div><!--nott-list end-->
        </div><!--notification-box end-->
    </li>
</template>

<script>
    export default {
        data() {
            return {
                messages:[],
            }
        },
        methods:{
            go(url){
                this.$router.push(url)
            },
            getmessages(){
                axios.get('api/getchatmsg').then(({data}) => {this.messages = data.data})
                    .then(
                        (response) => {console.log(response)},
                    ).catch(error => {
                    console.log('opsss')
                });
            }
        },
        created() {
           this.getmessages()
        },
        mounted() {

                Echo.private('chat.' + globalUserId)
                    .listen('MessageSent', (e) => {
                        this.getmessages()
                    });


        }
    }

</script>

<style scoped>

</style>
