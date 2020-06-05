<template>
    <li>
        <a href="javascript:void(0)" title="" class="not-box-open">
            <span><img src="images/icon6.png" alt=""></span>
            Messages
        </a>
        <div class="notification-box msg">
            <div class="nt-title">
                <h4>Setting</h4>
                <a href="#" title="">Clear all</a>
            </div>
            <div class="nott-list" v-for="msg in messages">
                <div class="notfication-details" v-for="msgs in msg.message">
                    <div class="noty-user-img">
                        <img :src="msgs.image ? msgs.image : 'images/resources/ny-img3.png'"  alt="">
                    </div>
                    <div class="notification-info">
                        <h3><a href="messages.html" title="">{{msgs.username}}</a></h3>
                        <p>{{msgs.message}}</p>
                        <span>{{msgs.created_at}}</span>
                    </div><!--notification-info -->
                </div>


                <div class="view-all-nots">
                    <a href="messages.html" title="">View All Messsages</a>
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
            getmessages(){
                axios.get('api/getchatmsg/'+ 2).then(({data}) => {this.messages = data.data})
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
                        console.log(e.message.user_id)
                    });


        }
    }

</script>

<style scoped>

</style>
