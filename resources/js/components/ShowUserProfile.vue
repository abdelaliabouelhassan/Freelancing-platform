<template>
    <div>
    <section class="cover-sec" v-for="users in user">
        <img  :src="users.backimage ? users.backimage : 'http://via.placeholder.com/1600x400'" alt="">
    </section>
    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="main-left-sidebar">
                                <div class="user_profile">
                                    <div class="user-pro-img" v-for="users in user">
                                        <img  :src="users.image ? users.image :'http://via.placeholder.com/170x170'" alt="">
                                    </div><!--user-pro-img end-->
                                    <div class="user_pro_status" v-for="users in user">
                                        <ul class="flw-hr" >
                                            <li><a href="javascript:void(0)" title="" v-if="!users.ismy" class="flww" @click="follow(users)" v-text="users.isfollow ? $t('message.unfollow') : $t('message.Follow')" :class="{unfollow:users.isfollow}"><i class="la la-plus"></i></a></li>
                                            <li><a href="javascript:void(0)" title="" v-if="!users.ismy" class="hre">{{$t('message.Hire')}}</a></li>
                                        </ul>
                                        <ul class="flw-status">
                                            <li>
                                                <span>{{$t('message.Followings')}}</span>
                                                <b v-text="users.followingCount">0</b>
                                            </li>
                                            <li>
                                                <span>{{$t('message.Followers')}}</span>
                                                <b v-text="users.followersCount">0</b>
                                            </li>
                                        </ul>
                                    </div><!--user_pro_status end-->
                                    <ul class="social_links">
                                        <li v-for="urls in Url">
                                            <a target="_blank" :href="urls.url"  title="" class="url"><i :class="urls.icon"></i> {{urls.url}}</a>
                                        </li>
                                    </ul>
                                </div><!--user_profile end-->
                                <div class="suggestions full-width">
                                    <div class="sd-title">
                                        <h3>{{$t('message.Suggestions')}}</h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div><!--sd-title end-->
                                    <div class="suggestions-list">
                                        <div class="suggestion-usd">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                            <div class="sgt-text">
                                                <h4>Jessica William</h4>
                                                <span>Graphic Designer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                            <div class="sgt-text">
                                                <h4>John Doe</h4>
                                                <span>PHP Developer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                            <div class="sgt-text">
                                                <h4>Poonam</h4>
                                                <span>Wordpress Developer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                            <div class="sgt-text">
                                                <h4>Bill Gates</h4>
                                                <span>C & C++ Developer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                            <div class="sgt-text">
                                                <h4>Jessica William</h4>
                                                <span>Graphic Designer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="suggestion-usd">
                                            <img src="http://via.placeholder.com/35x35" alt="">
                                            <div class="sgt-text">
                                                <h4>John Doe</h4>
                                                <span>PHP Developer</span>
                                            </div>
                                            <span><i class="la la-plus"></i></span>
                                        </div>
                                        <div class="view-more">
                                            <a href="#" title="">{{$t('message.View_More')}}</a>
                                        </div>
                                    </div><!--suggestions-list end-->
                                </div><!--suggestions end-->
                            </div><!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="main-ws-sec">
                                <div class="user-tab-sec" v-for="users in user">
                                    <h3>{{users.name}}</h3>
                                    <div class="star-descp">
                                        <span>{{users.bio}}</span>
                                        <span v-if="!users.bio">{{$t('message.Work_type_not_specified')}}</span>
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-o"></i></li>
                                        </ul>
                                    </div><!--star-descp end-->
                                    <div class="tab-feed">
                                        <ul>
                                            <li data-tab="feed-dd"  @click="feed = true;info=false;proto=false" v-bind:class="{active:feed}">
                                                <a href="javascript:void(0)" title="">
                                                    <img src="images/ic1.png" alt="">
                                                    <span>{{$t('message.Feed')}}</span>
                                                </a>
                                            </li>
                                            <li data-tab="info-dd" @click="feed = false;info=true;proto=false" v-bind:class="{active:info}">
                                                <a href="javascript:void(0)" title="">
                                                    <img src="images/ic2.png" alt="">
                                                    <span>{{$t('message.Info')}}</span>
                                                </a>
                                            </li>
                                            <li data-tab="portfolio-dd" @click="feed = false;info=false;proto=true" v-bind:class="{active:proto}">
                                                <a href="javascript:void(0)" title="">
                                                    <img src="images/ic3.png" alt="">
                                                    <span>{{$t('message.Portfolio')}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- tab-feed end-->
                                </div><!--user-tab-sec end-->
                                <div class="product-feed-tab " v-bind:class="{current:feed}" id="feed-dd">
                                    <div class="posts-section">
                                        <div class="post-bar" v-for="feedss in feeds">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img :src="feedss.user_image ? feedss.user_image.path : 'https://via.placeholder.com/100'" alt="" style="height: 100px; width: 100px;">
                                                    <div class="usy-name">
                                                        <h3>{{feedss.user_name}} </h3>
                                                        <span><img src="images/clock.png" alt="">{{feedss.created_at}}  </span>
                                                    </div>
                                                </div>
                                                <div class="ed-opts" @click="showOption(feedss)">
                                                    <a href="javascript:void(0)" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                    <ul class="ed-options" v-bind:class="{active:feedss == showOp}">
                                                        <li><a href="javascript:void(0)" title="">Edit Post</a></li>
                                                        <li><a href="javascript:void(0)" title="">Unsaved</a></li>
                                                        <li><a href="javascript:void(0)" title="">Unbid</a></li>
                                                        <li><a href="javascript:void(0)" title="">Close</a></li>
                                                        <li><a href="javascript:void(0)" title="">Hide</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="epi-sec">
                                                <ul class="descp">
                                                    <li><img src="images/icon8.png" alt=""><span>{{feedss.is_done ? $t('message.Done') : $t('message.Available') }} </span></li>
                                                    <li><img src="images/icon9.png" alt=""><span> {{feedss.city_name}}</span></li>
                                                </ul>
                                                <ul class="bk-links" v-for="users in user">
                                                    <li  v-if="!users.ismy"><a href="javascript:void(0)" title="" @click="SavePost(feedss)" ><i class="la la-bookmark" :class="{savecolor:feedss.IsSave}"></i></a></li>
                                                    <li v-for="us in me "   v-if="!users.ismy"> <router-link  :to="'Chat/' + feedss.postSlug + '/' + us.slug" ><span><i class="la la-envelope"></i></span>
                                                    </router-link></li>
<!--                                                    <li v-if="feedss.type == 'servic' && !users.ismy"  ><a href="javascript:void(0)" title="" class="bid_now">{{$t('message.Bid_Now')}}</a></li>-->
                                                    <li v-for="us in me "  v-if="feedss.type == 'servic' && !users.ismy"> <router-link  class="bid_now" :to="'Chat/' + feedss.postSlug + '/' + us.slug" >{{$t('message.Bid_Now')}}
                                                    </router-link></li>
                                                </ul>
                                            </div>
                                            <div class="job_descp">
                                                <h3>{{feedss.title}}</h3>
                                                <ul class="job-dt">
                                                    <li><a href="javascript:void(0)" title="">Full Time</a></li>
                                                    <li><span>DH{{feedss.price}}</span></li>
                                                </ul>
                                                <img v-if="feedss.post_image" :src="feedss.post_image" alt="" style="height: 500px;width: 500px"  class="img-fluid">
                                                <p>  <read-more more-str="read more" :text="feedss.body" link="#" less-str="read less" :max-chars="500"></read-more></p>
                                                <ul class="skill-tags">
                                                    <li><a href="javascript:void(0)" title="">{{feedss.category_name}}</a></li>
                                                </ul>
                                            </div>

                                        </div>

                                        <!--post-bar end-->
                                    </div>
                                    <infinite-loading @distance="1" @infinite="loadfeed"></infinite-loading>
                                </div><!--product-feed-tab end-->
                                <div class="product-feed-tab" id="info-dd" v-bind:class="{current:info}">
                                    <div class="user-profile-ov">
                                        <h3>{{$t('message.Overview')}}</h3>
                                        <span  v-for="overvs in overview">
                                        <p>{{overvs.overview}}</p>
                                        </span>
                                        <p v-if="overview.length == 0 ">{{$t('message.Overview_not_specified')}}</p>

                                    </div><!--user-profile-ov end-->
                                    <div class="user-profile-ov st2">
                                        <h3>Experience</h3>
                                        <span v-for="exp in Experience">
                                        <h4>{{exp.title}}</h4>
                                            <p>{{exp.body}}</p>
                                        </span>
                                        <span v-if="Experience.length == 0">{{$t('message.Experience_not_specified')}}</span>
                                    </div><!--user-profile-ov end-->
                                    <div class="user-profile-ov">
                                        <h3>Education</h3>
                                        <span v-for="ed in Educ">
                                        <h4>{{ed.school}}</h4>
                                        <span>{{ed.from | mydate}}  |  {{ed.to | mydate}}</span>
                                        <p>{{ed.description}}</p>
                                        </span>
                                        <span v-if="Educ.length == 0">{{$t('message.Education_not_specified')}}</span>
                                    </div><!--user-profile-ov end-->
                                    <div class="user-profile-ov">
                                        <h3>Location</h3>
                                        <span v-for="Loacs in Loac">
                                        <h4>{{Loacs.city_name}}</h4>
                                        </span>
                                        <span v-if="!Loac">{{$t('message.Location_not_specified')}}</span>
                                    </div><!--user-profile-ov end-->
                                </div><!--product-feed-tab end-->
                                <div class="product-feed-tab" id="portfolio-dd" v-bind:class="{current:proto}">
                                    <div class="portfolio-gallery-sec">
                                        <div class="gallery_pf">
                                            <div class="row">
                                                <VGallery :images="images" :index="index" @close="index = null"></VGallery>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6"
                                                     v-for="(image, imageIndex) in images"
                                                     :key="imageIndex">
                                                    <div class="gallery_pt"  @click="index = imageIndex">
                                                        <img class="image" :src="image.path" alt="" >
                                                        <a href="javascript:void(0)" ><img src="images/all-out.png" alt=""></a>
                                                    </div>
                                                </div>
                                                <div v-if="images.length == 0">{{$t('message.Empty_Portfolio')}} </div>
                                            </div>
                                        </div><!--gallery_pf end-->
                                    </div><!--portfolio-gallery-sec end-->
                                    <div class="col text-center">
                                        <button type="button" v-if="this.prpage < this.prlastPage" @click="loadmore" class="btn btn-outline-info">{{$t('message.Load_More')}} </button>
                                    </div>
                                </div><!--product-feed-tab end-->
                            </div><!--main-ws-sec end-->
                        </div>
                        <div class="col-lg-3">
                            <div class="right-sidebar">
                                <div class="message-btn" v-for="users in user">
                                    <a href="javascript:void(0)" title="" v-if="!users.ismy"><i class="fa fa-envelope"></i> {{$t('message.Message')}}</a>
                                </div>
                                <div class="widget widget-portfolio">
                                    <div class="wd-heady">
                                        <h3>{{$t('message.Portfolio')}}</h3>
                                        <img src="images/photo-icon.png" alt="">
                                    </div>
                                    <div class="pf-gallery" >
                                        <VGallery :images="imagesproto" :index="index1" @close="index1 = null"></VGallery>
                                        <ul >
                                            <li  v-for="(image, imageIndex) in imagesproto"
                                                 :key="imageIndex"><a href="javascript:void(0)" @click="index1 = imageIndex" title=""><img :src="image.path" alt=""></a></li>

                                        </ul>
                                        <div v-if="imagesproto.length == 0">{{$t('message.Empty_Portfolio')}}</div>
                                    </div><!--pf-gallery end-->
                                </div><!--widget-portfolio end-->
                            </div><!--right-sidebar end-->
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>
    </main>
    </div>
</template>

<script>
    export default {
        data () {

            return {
                user:[],
                me:[],
                feed:true,
                info:false,
                proto:false,
                /*feeds*/
                showOp:null,
                lastPage: 0,
                page: 1,
                feeds:{},
                /*end feeds*/
                /*overview*/
                overview:{},
                /*End overview*/
                /*Experience*/
                Experience:{},
                /*End Experience*/
                /*Education*/
                Educ:{},
                /*End Education*/
                /*Location*/
                Loac:{},
                /*End Location*/
                /*portfolio*/
                images: [],
                index: null,
                prlastPage: 0,
                prpage: 1,
                imagesproto:[],
                index1: null,
                /*End portfolio*/
                Url:'',
            }
        },
        watch: {
            $route: {
                immediate: true,
                handler(to, from) {
                    document.title = to.meta.title || 'Brikole | ' +this.$route.fullPath.substring(0, 0) + this.$route.fullPath.substring(0 + 1);
                }
            },
        },
        methods:{
            loadUrl(){
                axios.get('api/getUrl').then(({data}) => {this.Url = data.data})
            },
            loadmore(){
                this.prpage++
                let vm = this;
                axios.get('api/showportload' + this.$route.fullPath + '?page='+this.prpage)
                    .then(response => {
                        return response.data;
                    }).then(data => {
                    setTimeout(function () {
                        $.each(data.data, function (key, value) {
                            this.images.push(value);
                        });
                        Vue.nextTick(function () {
                            $('[data-toggle="tooltip"]').tooltip();
                        });
                    }.bind(this), 0);


                });
            },
            loadImage(){
                let vm = this;
                axios.get('api/showportload' + this.$route.fullPath).then(({data}) => {
                    this.images = data.data
                    this.imagesproto = data.data
                    vm.prlastPage = data.meta.last_page
                })
            },
            loadOverView(){
                let vm = this;
                axios.get('api/showoverview' + this.$route.fullPath).then(({data}) => {
                    this.overview = data.data
                })
            },
            loadExperience(){
                let vm = this;
                axios.get('api/showexp' + this.$route.fullPath).then(({data}) => {
                    this.Experience = data.data
                })
            },
            loadEduc(){
                let vm = this;
                axios.get('api/showeduc' + this.$route.fullPath).then(({data}) => {
                    this.Educ = data.data
                })
            },
            loadLoac(){
                let vm = this;
                axios.get('api/showloac' + this.$route.fullPath).then(({data}) => {
                    this.Loac = data.data
                })
            },

            loadfeeds(){
                let vm = this;
                axios.get('api/showfeeds' + this.$route.fullPath).then(({data}) => {
                    this.feeds = data.data
                    vm.lastPage = data.meta.last_page
                })
            },
            loadfeed($state){
                let vm = this;
                if (this.feeds.length != 0) {
                    axios.get('api/showfeeds' +  this.$route.fullPath + '?page='+this.page)
                        .then(response => {
                            return response.data;
                        }).then(data => {
                        //
                        if (this.page - 1 == this.lastPage) {
                            $state.complete();
                        } else {
                            setTimeout(function () {
                                $.each(data.data, function (key, value) {
                                    vm.feeds.push(value);
                                });
                                $state.loaded();
                                Vue.nextTick(function () {
                                    $('[data-toggle="tooltip"]').tooltip();
                                });
                            }.bind(this), 0);
                        }

                    });
                    this.page = this.page + 1;
                } else {
                    $state.complete();
                }

            },
            follow(user){
                axios.post('api/follow', {
                    slug: this.$route.fullPath.substring(0, 0) + this.$route.fullPath.substring(0 + 1),
                }).then(function (response) {
                    if(response.data.msg == 'unfollow'){
                            user.isfollow = false
                        user.followersCount--
                    }else{
                        user.isfollow = true
                        user.followersCount++

                    }
                })
            },
            showOption:function (feeds) {
                if(this.showOp == feeds){
                    this.showOp = null
                }else{
                    this.showOp = feeds
                }

            },
            SavePost(posts){
                this.$Progress.start('8000')
                if(this.$gets.IsLogedIn()){
                    axios.post('api/SavePost', {
                        id: posts.id,
                    }).then(function (response) {
                        var   status = response.data.status;
                        var   icon = 'success'
                        if(status == '500'){
                            icon = 'error';
                        }
                        Toast.fire({
                            icon: icon,
                            title: response.data.msg,
                        })
                    })
                    if(posts.IsSave){
                        posts.IsSave = false
                    }else{
                        posts.IsSave = true
                    }
                    this.$Progress.finish()
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: this.$t('message.youarenotlogedin'),
                        text: this.$t('message.plselog'),
                        footer: '<a href="/"> ' +this.$t("message.loghere") + ' </a>'
                    })
                    this.$Progress.fail()
                }
            },
        },
      created() {
          this.$Progress.start('1000')
          axios.get('api/showUser' + this.$route.fullPath).then(({data}) => {this.user = data.data})
              .then(
              (response) => {},
              ).catch(error => {
              this.$router.push("/NotFound404")
          });
          axios.get('api/user').then(({data}) => {this.me = data.data})
              .then(
                  (response) => {},
              ).catch(error => {

          });
          this.loadfeeds()
          this.loadExperience()
          this.loadOverView()
          this.loadEduc()
          this.loadLoac()
          this.loadImage()
          this.loadUrl()
          this.$Progress.finish()

      }
    }
</script>

<style scoped>
    .url{
        overflow-wrap: break-word;
    }
    .savecolor{
        background-color: #2a71f5;
    }
    .unfollow{
        background-color: red;
    }
</style>
