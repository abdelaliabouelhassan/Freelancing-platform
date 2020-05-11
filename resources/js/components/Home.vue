<template>
   <div>
       <main>
           <div class="main-section">
               <div class="container">
                   <div class="main-section-data">
                       <div class="row">
                           <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                               <div class="main-left-sidebar no-margin">
                                   <div class="user-data full-width"  v-if="$gets.IsLogedIn()">
                                       <div class="user-profile">
                                           <div class="username-dt">
                                               <div class="usr-pic">
                                                   <img src="http://via.placeholder.com/100x100" alt="">
                                               </div>
                                           </div><!--username-dt end-->
                                           <div class="user-specs">
                                               <h3>{{$gets.user.name}}</h3>
                                               <span>Graphic Designer at Self Employed</span>
                                           </div>
                                       </div><!--user-profile end-->
                                       <ul class="user-fw-status">
                                           <li>
                                               <h4>Following</h4>
                                               <span>34</span>
                                           </li>
                                           <li>
                                               <h4>Followers</h4>
                                               <span>155</span>
                                           </li>
                                           <li>
                                               <a href="#" title="">View Profile</a>
                                           </li>
                                       </ul>
                                   </div><!--user-data end-->
                                   <div class="suggestions full-width">
                                       <div class="sd-title">
                                           <h3>Suggestions</h3>
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
                                               <a href="#" title="">View More</a>
                                           </div>
                                       </div><!--suggestions-list end-->
                                   </div><!--suggestions end-->
                                   <!--tags-sec end-->
                               </div><!--main-left-sidebar end-->
                           </div>
                           <div class="col-lg-6 col-md-8 no-pd">
                               <div class="main-ws-sec">
                                   <div class="post-topbar">
                                       <div class="user-picy">
                                           <img src="http://via.placeholder.com/100x100" alt="">
                                       </div>
                                       <div class="post-st">
                                           <ul>
                                               <li><a class="post_project" href="javascript:void(0)" title="">Post a Project</a></li>
                                               <li><a class="post-jb active" href="javascript:void(0)" title="">Post a Job</a></li>
                                           </ul>
                                       </div><!--post-st end-->
                                   </div><!--post-topbar end-->
                                   <div class="posts-section">
                                       <div class="post-bar" v-for="posts in post">
                                           <div class="post_topbar">
                                               <div class="usy-dt">
                                                   <img :src="posts.image_path ? posts.image_path : 'https://via.placeholder.com/100'" alt="">
                                                   <div class="usy-name">
                                                       <h3>{{posts.user_name}} </h3>
                                                       <span><img src="images/clock.png" alt="">{{posts.created_at | mydate}}  </span>
                                                   </div>
                                               </div>
                                               <div class="ed-opts">
                                                   <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                   <ul class="ed-options">
                                                       <li><a href="#" title="">Edit Post</a></li>
                                                       <li><a href="#" title="">Unsaved</a></li>
                                                       <li><a href="#" title="">Unbid</a></li>
                                                       <li><a href="#" title="">Close</a></li>
                                                       <li><a href="#" title="">Hide</a></li>
                                                   </ul>
                                               </div>
                                           </div>
                                           <div class="epi-sec">
                                               <ul class="descp">
                                                   <li><img src="images/icon8.png" alt=""><span>{{posts.is_done ? 'done' : 'available'}} </span></li>
                                                   <li><img src="images/icon9.png" alt=""><span> {{posts.city_name}}</span></li>
                                               </ul>
                                               <ul class="bk-links">
                                                   <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                   <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                                                   <li v-if="posts.type == 'servic'"><a href="#" title="" class="bid_now">Bid Now</a></li>
                                               </ul>
                                           </div>
                                           <div class="job_descp">
                                               <h3>{{posts.title}}</h3>
                                               <ul class="job-dt">
                                                   <li><a href="#" title="">Full Time</a></li>
                                                   <li><span>DH{{posts.price}}</span></li>
                                               </ul>
                                               <p>{{posts.body}} ... <a href="#" title="">view more</a></p>
                                               <ul class="skill-tags">
                                                   <li><a href="#" title="">{{posts.category_name}}</a></li>
                                               </ul>
                                           </div>

                                       </div>
                                   <!--post-bar end-->
                                       <infinite-loading  @distance="1" @infinite="infiniteHandler"></infinite-loading>




                                   </div><!--posts-section end-->
                               </div><!--main-ws-sec end-->
                           </div>
                           <div class="col-lg-3 pd-right-none no-pd">
                               <div class="right-sidebar">
                                   <div class="widget widget-about" v-if="!$gets.IsLogedIn()">
                                       <img src="images/logotesticon.png" alt="">
                                       <h3>You are Not Signed In</h3>
                                       <span>Signed In Now </span>
                                       <div class="sign_link">
                                           <h3><a href="/" title="">Sign up</a></h3>
                                       </div>
                                   </div><!--widget-about end-->
                                 <!--widget-jobs end-->
                                   <div class="widget widget-jobs">
                                       <div class="sd-title">
                                           <h3>Most Viewed This Week</h3>
                                           <i class="la la-ellipsis-v"></i>
                                       </div>
                                       <div class="jobs-list">
                                           <div class="job-info">
                                               <div class="job-details">
                                                   <h3>Senior Product Designer</h3>
                                                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                               </div>
                                               <div class="hr-rate">
                                                   <span>$25/hr</span>
                                               </div>
                                           </div><!--job-info end-->
                                           <div class="job-info">
                                               <div class="job-details">
                                                   <h3>Senior UI / UX Designer</h3>
                                                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                               </div>
                                               <div class="hr-rate">
                                                   <span>$25/hr</span>
                                               </div>
                                           </div><!--job-info end-->
                                           <div class="job-info">
                                               <div class="job-details">
                                                   <h3>Junior Seo Designer</h3>
                                                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                               </div>
                                               <div class="hr-rate">
                                                   <span>$25/hr</span>
                                               </div>
                                           </div><!--job-info end-->
                                       </div><!--jobs-list end-->
                                   </div><!--widget-jobs end-->
                                   <div class="widget suggestions full-width">
                                       <div class="sd-title">
                                           <h3>Most Viewed People</h3>
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
                                                   <span>C &amp; C++ Developer</span>
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
                                               <a href="#" title="">View More</a>
                                           </div>
                                       </div><!--suggestions-list end-->
                                   </div>
                               </div><!--right-sidebar end-->
                           </div>
                       </div>
                   </div><!-- main-section-data end-->
               </div>
           </div>
       </main>

       <div class="post-popup pst-pj">
           <div class="post-project">
               <h3>Post a project</h3>
               <div class="post-project-fields">
                   <form @submit.prevent="CreateProject()">
                       <div class="row">
                           <div class="col-lg-12">
                               <input type="text" name="title" placeholder="Title"  class="form-control" v-model="form.title" :class="{ 'is-invalid': form.errors.has('title') }">
                               <has-error :form="form" field="title"></has-error>
                               <br>
                           </div>
                           <div class="col-lg-12">
                               <div class="inp-field">
                                   <select name="category" v-model="form.category" :class="{ 'is-invalid': form.errors.has('category') }">
                                       <option value="0">Select a Project Category</option>
                                       <option v-for="categorys in category" :value="categorys.id">
                                           {{categorys.category_name}}</option>
                                   </select>
                                   <has-error :form="form" field="category"></has-error>
                                   <br>
                               </div>
                           </div>
                           <div class="col-lg-12">
                               <div class="inp-field">
                                       <select name="city"  v-model="form.city" :class="{ 'is-invalid': form.errors.has('city') }">
                                           <option value="0">Select City</option>
                                           <option v-for="citys in city" :value="citys.id">{{citys.city_name}}
                                           </option>
                                       </select>
                                   <has-error :form="form" field="city"></has-error>
                                   <br>
                               </div>
                           </div>
                           <div class="col-lg-12">
                           <div class="price-br">
                               <input type="file" name="image" placeholder="Upload Image" class="form-control" @change="UploadImg"  :class="{ 'is-invalid': form.errors.has('image') }">
                               <i class="fas fa-images"></i>
                               <has-error :form="form" field="image"></has-error>
                               <br>
                           </div>
                           </div>
                           <div class="col-lg-12">
                               <div class="price-sec">
                                   <div class="price-br">
                                       <input type="text" name="price" placeholder="Price" class="form-control" v-model="form.price" :class="{ 'is-invalid': form.errors.has('price') }">
                                       <i class="la la-dollar"></i>
                                       <has-error :form="form" field="price"></has-error>
                                       <br>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-12">
                               <textarea name="body" placeholder="Description"  class="form-control" v-model="form.body" :class="{ 'is-invalid': form.errors.has('body') }"></textarea>
                               <has-error :form="form" field="body"></has-error>
                               <br>
                           </div>
                           <div class="col-lg-12">
                               <ul>
                                   <li><button class="active" type="submit" value="post">Post</button></li>
                                   <li><a href="#" title="">Cancel</a></li>
                               </ul>
                           </div>
                       </div>
                   </form>
               </div><!--post-project-fields end-->
               <a href="#" title=""><i class="la la-times-circle-o"></i></a>
           </div><!--post-project end-->
       </div><!--post-project-popup end-->

       <div class="post-popup job_post">
           <div class="post-project">
               <h3>Post a job</h3>
               <div class="post-project-fields">
                   <form @submit.prevent="CreateJob()">
                       <div class="row">
                           <div class="col-lg-12">
                               <input type="text" name="title" placeholder="Title">
                           </div>
                           <div class="col-lg-12">
                               <div class="inp-field">
                                   <select>
                                       <option value="0">Select a job Category</option>
                                       <option v-for="categorys in category" :value="categorys.id">
                                           {{categorys.category_name}}</option>
                                   </select>
                               </div>
                           </div>
                           <div class="col-lg-12">
                               <div class="inp-field">
                                   <select>
                                       <option value="0">Select City</option>
                                       <option v-for="citys in city" :value="citys.id">{{citys.city_name}}
                                       </option>
                                   </select>
                               </div>
                           </div>

                           <div class="col-lg-12">
                               <div class="price-br">
                                   <input type="file" name="img" placeholder="Upload Image">
                                   <i class="fas fa-images"></i>
                               </div>
                           </div>
                           <div class="col-lg-12">
                               <div class="price-sec">
                                   <div class="price-br">
                                       <input type="text" name="price1" placeholder="Price">
                                       <i class="la la-dollar"></i>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-12">
                               <textarea name="description" placeholder="Description"></textarea>
                           </div>
                           <div class="col-lg-12">
                               <ul>
                                   <li><button class="active" type="submit" value="post">Post</button></li>
                                   <li><a href="#" title="">Cancel</a></li>
                               </ul>
                           </div>
                       </div>
                   </form>
               </div><!--post-project-fields end-->
               <a href="#" title=""><i class="la la-times-circle-o"></i></a>
           </div><!--post-project end-->
       </div><!--post-project-popup end-->
   </div>
</template>

<script>
    export default {
        data () {
            return {
                // Create a new form instance
                post:{},
                lastPage:0,
                page: 1,
                city: {},
                category: {},
                form: new Form({
                    title: '',
                    body: '',
                    image: '',
                    price:'',
                    category:'0',
                    city:'0',
                })

            }
        },
        methods:{
            LoadPost:function () {
                let vm = this;
                axios.get('api/AllPosts').then(({data})=>{this.post = data.data
                    vm.lastPage = data.meta.last_page
                })
            },
            infiniteHandler:function ($state) {
                let vm = this;
                if(this.post.length != 0){
                    axios.get('api/AllPosts?page='+this.page)
                        .then(response => {
                            return response.data;
                        }).then(data => {
                        //
                        if(this.page  -1  == this.lastPage){
                            $state.complete();
                        } else {
                            setTimeout(function() {
                                $.each(data.data, function(key, value) {
                                    vm.post.push(value);
                                });
                                $state.loaded();
                                Vue.nextTick(function () {
                                    $('[data-toggle="tooltip"]').tooltip();
                                });
                            }.bind(this), 0);
                        }

                    });
                    this.page = this.page + 1;
                }else{
                    $state.complete();
                }

            },
            LoadCategory: function () {
                axios.get('api/category').then(({
                                                    data
                                                }) => {
                    this.category = data.data
                })
            },
            LoadCity: function () {
                axios.get('api/city').then(({
                                                data
                                            }) => {
                    this.city = data.data
                })
            },
            CreateProject:function () {
                this.$Progress.start()
                this.form.post('api/CreateProject')
                    .then(()=>{
                        $(".post-popup.pst-pj").removeClass("active");
                        $(".wrapper").removeClass("overlay");

                        this.$Progress.finish()
                        Toast.fire({
                            icon: 'success',
                            title: 'Project Created Successfully'
                        })
                    })
                    .catch(()=>{
                        this.$Progress.decrease(20)
                        this.$Progress.fail()
                    })

            },
            CreateJob:function(){
                this.$Progress.start()
                console.log('job')
                $(".post-popup.job_post").addClass("active");
                $(".wrapper").addClass("overlay");
                this.$Progress.finish()
            },
            UploadImg:function(){
                console.log('image')
            },
        },
        watch: {
            $route: {
                immediate: true,
                handler(to, from) {
                    document.title = to.meta.title || 'Home | Brikole';
                }
            },
        },
        created(){
            this.$Progress.start()
            this.LoadPost()
            this.LoadCategory()
            this.LoadCity()
            this.$Progress.finish()
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
