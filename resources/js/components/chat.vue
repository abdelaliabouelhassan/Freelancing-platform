<template>
    <div>
        <br>  <br>
        <section class="forum-page">
            <div class="container">
                <div class="forum-questions-sec">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="forum-questions">
                             <!--usr-question end-->
                                <div class="col-lg-8">
                                    <div class="forum-post-view">
                                        <div class="usr-question" v-for="posts in post.data">
                                            <div class="usr_img">
                                                <img  class="lnk"  @click="$router.push({ path: '/'   + posts.slug})" :src="posts.user_image ? posts.user_image.path : 'http://via.placeholder.com/60x60'"  alt="user image">
                                            </div>
                                            <div class="usy-name">
                                                <h3  class="lnk" @click="$router.push({ path: '/'   + posts.slug})">{{posts.user_name}}</h3>
                                            </div>
                                            <div class="usr_quest">
                                                <br>
                                                <br>
                                                <h3>{{posts.title}}</h3>
                                                <span><i class="fa fa-clock-o"></i>{{posts.created_at}}</span>
                                                <ul class="react-links">
                                                    <li><a href="#" title=""><i class="fa fa-share-alt"></i> Share</a></li>
                                                    <li><a href="javascript:void(0)" title="" class="bid_now">Bid Now</a></li>
                                                    <li><span>DH{{posts.price}}</span></li>
                                                </ul>
                                                <ul class="quest-tags">
                                                    <li><a href="#" title="">{{posts.category_name}}</a></li>
                                                </ul>
                                                <p>{{posts.body}}</p>
                                            </div><!--usr_quest end-->
                                        </div><!--usr-question end-->
                                    </div><!--forum-post-view end-->


                                </div>
                            </div><!--forum-questions end-->

                        </div>
                        <div class="col-lg-4">
                            <div class="col-7 px-0" >
                                <div class="px-4 py-5 chat-box bg-white "  id="scroll">
                                    <div  v-for="message in messages.slice().reverse() " track-by="id"  class="media w-50 mb-3" :class="{'ml-auto':globalUserId == message.user_id}">
                                        <input type="hidden" v-if="message.user_id != globalUserId" v-model="useridTO = message.user_id ">
                                        <img v-if="globalUserId != message.user_id"  src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">

                                        <div class="media-body" :class="{'ml-3':globalUserId != message.user_id}">
                                            <input type="hidden" v-if="globalUserId != message.user_id ? touserid = message.user_id : ''">
                                            <div class="rounded py-2 px-3 mb-2" :class="{'bg-light':globalUserId != message.user_id,'bg-primary':globalUserId == message.user_id}">
                                                <p class="text-small mb-0" :class="{'text-muted':globalUserId != message.user_id,'text-white':globalUserId == message.user_id}">{{message.message}}</p>
                                            </div>
                                            <p class="small text-muted">{{message.created_at}}</p>
                                        </div>

                                    </div>
                                    <div    class="media w-50 mb-3"  v-if="typing">
                                        <img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
                                        <div class="media-body ml-3'">

                                                <div class="text-small mb-0 text-muted">
                                                    <div class="spinner">
                                                        <div class="bounce1"></div>
                                                        <div class="bounce2"></div>
                                                    </div>
                                                </div>

                                        </div>

                                    </div>
                                </div>

                                <!-- Typing area -->
                                <div  class="bg-light" id="frm">
                                    <div class="input-group">
                                        <input type="text" @keyup.enter="sendmessage" @keydown="isTyping"  v-model="text" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                                        <div class="input-group-append">
                                            <button id="button-addon2" @click="sendmessage" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="widget widget-adver" v-for="posts in post.data">
                                <img  :src="posts.post_image ? posts.post_image : 'http://via.placeholder.com/370x270'">
                            </div><!--widget-adver end-->
                        </div>
                    </div>
                </div><!--forum-questions-sec end-->
            </div>
        </section>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                text:'',
                text2 :'',
                globalUserId : globalUserId,
                messages:[],
                useridTO:'',
                typing: false,
                url:'',
                post:[],

            }
        },

        methods: {
            fetchPost(){
                axios.post('/api/getPostMessage',{
                    message:this.text2,
                    slug:this.$route.fullPath.replace('/Chat/','')
                }).then(data=>{
                    this.post = data.data
                })
            },
           sendmessage() {
               if(this.text.length != 0){
                   this.text2 = this.text
                   this.text = ''

                   axios.post('/message/send',{
                       message:this.text2,
                       slug:this.$route.fullPath.replace('/Chat/','')
                   }).then(data=>{
                       this.messages.unshift(data.data)
                       setTimeout(this.scrollToEnd,100)

                   })

               }


            },
            fetchMessaged(){
                axios.get('/api/message/get' + this.$route.fullPath.replace('/Chat','')).then(({data}) => {
                    this.messages = data.data
                    setTimeout(this.scrollToEnd,100)
                })
            },
            scrollToEnd(){
               document.getElementById('scroll').scrollTo(0,999999);
            },
            isTyping() {
                let channel = Echo.private('chat.' + this.useridTO);
                document.getElementById('scroll').scrollTo(0,999999);
                setTimeout(function() {
                    channel.whisper('typing', {
                        typing: true
                    });
                }, 100);
            },
        },
        created() {
            if(this.$gets.IsLogedIn()){
            this.fetchMessaged()
                this.fetchPost()
            }
        },
        mounted() {
            let _this = this;
            Echo.private('chat.' + globalUserId)
                .listen('MessageSent', (e) => {
                 if(e.message.url == this.$route.fullPath){
                     this.messages.unshift(e.message)
                 }
                    setTimeout(this.scrollToEnd,100)
                }) .listenForWhisper('typing', (e) => {
                this.user = e.user;
                this.typing = e.typing;
                // remove is typing indicator after 0.9s
                setTimeout(function() {
                    _this.typing = false
                }, 3000);
            });

        },
        watch: {
            $route: {
                immediate: true,
                handler(to, from) {
                    document.title = to.meta.title || 'lets go | Brikole';
                }

            },
            '$route': ['fetchMessaged','fetchPost'],


        },
    }
</script>

<style scoped>
    /*
    *
    * ==========================================
    * FOR DEMO PURPOSES
    * ==========================================
    *
    */
    body {
        background-color: #74EBD5;
        background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);

        min-height: 100vh;
    }

    ::-webkit-scrollbar {
        width: 5px;
    }

    ::-webkit-scrollbar-track {
        width: 5px;
        background: #f5f5f5;
    }

    ::-webkit-scrollbar-thumb {
        width: 1em;
        background-color: #ddd;
        outline: 1px solid slategrey;
        border-radius: 1rem;
    }

    .text-small {
        font-size: 0.9rem;
    }

    .messages-box,
    .chat-box {
        height: 510px;
        overflow-y: scroll;
        width: 354px;
    }

    .rounded-lg {
        border-radius: 0.5rem;
    }
    #frm{
        width: 354px;
    }
    input::placeholder {
        font-size: 0.9rem;
        color: #999;
    }
    .reverseorder {
        display: flex;
        flex-direction: column-reverse;
    }
    .spinner {
        margin: 0 30px;
        width: 30px;
        height: 30px;
        border:none;
        text-align: center;
    }
    .spinner > div {
        width: 10px;
        height: 10px;
        background-color: #888;
        -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
        animation: sk-bouncedelay 1.4s infinite ease-in-out both;
    }

    .spinner .bounce1 {
        -webkit-animation-delay: -0.32s;
        animation-delay: -0.32s;
    }

    .spinner .bounce2 {
        -webkit-animation-delay: -0.16s;
        animation-delay: -0.16s;
    }
.lnk{
    cursor:pointer;

}
</style>
