<template>
<div>

    <main>
        <div class="search-sec">
        <div class="container">
            <div class="search-box">
                <form>
                    <input type="text" name="search" placeholder="Search keywords">
                    <button type="submit">Search</button>
                </form>
            </div><!--search-box end-->
        </div>
    </div><!--search-sec end-->
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="filter-secs">
                                <div class="filter-heading">
                                    <h3>Filters</h3>
                                    <a href="javascript:void(0)" title="" @click="clearall">Clear all filters</a>
                                </div><!--filter-heading end-->
                                <div class="paddy">

                                    <div class="filter-dd">
                                        <div class="filter-ttl">
                                            <h3>Availabilty</h3>
                                        </div>
                                        <ul class="avail-checks">
                                            <li>
                                                <input type="radio" name="cc" id="c2" v-model="isdone" value="0" @change="filterpost">
                                                <label for="c2">
                                                    <span></span>
                                                </label>
                                                <small>Available</small>
                                            </li>
                                            <li>
                                                <input type="radio" name="cc" id="c3" v-model="isdone" value="1" @change="filterpost">
                                                <label for="c3">
                                                    <span></span>
                                                </label>
                                                <small>Done</small>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="filter-dd">
                                        <div class="filter-ttl">
                                            <h3>Job Category</h3>
                                        </div>
                                        <form class="job-tp">
                                            <select @change="filterpost"  v-model="cat">
                                                <option value="0">Select a job Category</option>
                                                <option v-for="categorys in category" :value="categorys.id">{{categorys.category_name}}</option>
                                            </select>
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </form>
                                    </div>
                                    <div class="filter-dd">
                                        <div class="filter-ttl">
                                            <h3>Price</h3>
                                        </div>
                                        <form class="job-tp">
                                            <select v-model="price" @change="filterpost">
                                                <option value="0">Select Price</option>
                                                <option value="1">10-100DH</option>
                                                <option value="2">100-500DH</option>
                                                <option value="3">500-1000DH</option>
                                                <option value="4">1000DH >>></option>
                                            </select>
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </form>
                                    </div>
                                    <div class="filter-dd">
                                        <div class="filter-ttl">
                                            <h3>Cities</h3>
                                        </div>
                                        <form class="job-tp">
                                            <select v-model="cit" @change="filterpost">
                                                <option value="0">Select  City</option>
                                                <option v-for="citys in city" :value="citys.id">{{citys.city_name}}</option>

                                            </select>
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </form>
                                    </div>
                                </div>
                            </div><!--filter-secs end-->
                        </div>
                        <div class="col-lg-6">
                            <div class="main-ws-sec">
                                <div class="posts-section">
                                    <div class="post-bar" v-for="posts in post">
                                        <div class="post_topbar">
                                            <div class="usy-dt">
                                                <img :src="posts.image.path ? posts.image.path : 'https://via.placeholder.com/100'" alt="">
                                                <div class="usy-name">
                                                    <h3>{{posts.user.name}} </h3>
                                                    <span><img src="images/clock.png" alt="">{{posts.created_at}} </span>
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
                                                <li><img src="images/icon9.png" alt=""><span> {{posts.city.city_name}}</span></li>
                                            </ul>
                                            <ul class="bk-links">
                                                <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                                                <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
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
                                                <li><a href="#" title="">{{posts.category.category_name}}</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                    <!--post-bar end-->
                                    <infinite-loading v-if="isnormalload" @distance="1" @infinite="infiniteHandler"></infinite-loading>
                                </div><!--posts-section end-->
                            </div><!--main-ws-sec end-->
                        </div>
                        <div class="col-lg-3">
                            <div class="right-sidebar">
                                <div class="widget widget-about" v-if="!$gets.IsLogedIn()">
                                    <img src="images/wd-logo.png" alt="">
                                    <h3>You are Not Signed In</h3>
                                    <span>Signed In Now </span>
                                    <div class="sign_link">
                                        <h3><a href="/" title="">Sign up</a></h3>
                                    </div>
                                </div><!--widget-about end-->
                                <div class="widget widget-jobs">
                                    <div class="sd-title">
                                        <h3>Top Jobs</h3>
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
                                        <div class="job-info">
                                            <div class="job-details">
                                                <h3>Senior PHP Designer</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                            </div>
                                            <div class="hr-rate">
                                                <span>$25/hr</span>
                                            </div>
                                        </div><!--job-info end-->
                                        <div class="job-info">
                                            <div class="job-details">
                                                <h3>Senior Developer Designer</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                            </div>
                                            <div class="hr-rate">
                                                <span>$25/hr</span>
                                            </div>
                                        </div><!--job-info end-->
                                    </div><!--jobs-list end-->
                                </div><!--widget-jobs end-->
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
                // Create a new form instance
                post:{},
                city:{},
                category:{},
                page: 1,
                lastPage:0,
                cat:'0',
                price:'0',
                cit:'0',
                isdone:'3',
                isnormalload:true
            }
        },

        methods:{
         LoadCategory:function(){
             axios.get('api/category').then(({data})=>{this.category = data.data})
        },
        LoadCity:function(){
            axios.get('api/city').then(({data})=>{this.city = data.data})
       },
        LoadJobs:function () {
            let vm = this;
                axios.get('api/post').then(({data})=>{this.post = data.data
                    vm.lastPage = data.last_page
                })

        },
            infiniteHandler:function ($state) {

                let vm = this;
                if(this.post.length != 0){
                axios.get('api/post?page='+this.page)
                    .then(response => {
                        return response.data;
                    }).then(data => {
                    //
                    if(this.page -1  == this.lastPage){
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
            filterpost:function () {
                this.isnormalload = false
                    this.page= 1
                    this.lastPage=0
                axios.get('api/filter/'+this.cat + '/' + this.cit + '/' + this.price + '/' + this.isdone).then(({data})=>{this.post = data.data})
            },
            clearall:function(){
                this.isnormalload = true
                    this.cat = '0',
                    this.price='0',
                    this.cit='0',
                    this.isdone ='3'
                    this.page= 1
                    this.lastPage=0
                this.LoadJobs()

            },
        },
        watch: {
            $route: {
                immediate: true,
                handler(to, from) {
                    document.title = to.meta.title || 'Jobs | Brikole';
                }
            },
        },
        created() {
            this.$Progress.start()
            this. LoadJobs()
            this.LoadCategory()
            this.LoadCity()
            this.$Progress.finish()
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
