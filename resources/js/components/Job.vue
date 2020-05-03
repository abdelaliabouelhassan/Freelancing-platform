<template>
<div>
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

    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="filter-secs">
                                <div class="filter-heading">
                                    <h3>Filters</h3>
                                    <a href="#" title="">Clear all filters</a>
                                </div><!--filter-heading end-->
                                <div class="paddy">
                                    <div class="filter-dd">
                                        <div class="filter-ttl">
                                            <h3>Skills</h3>
                                            <a href="#" title="">Clear</a>
                                        </div>
                                        <form>
                                            <input type="text" name="search-skills" placeholder="Search skills">
                                        </form>
                                    </div>
                                    <div class="filter-dd">
                                        <div class="filter-ttl">
                                            <h3>Availabilty</h3>
                                            <a href="#" title="">Clear</a>
                                        </div>
                                        <ul class="avail-checks">
                                            <li>
                                                <input type="radio" name="cc" id="c1">
                                                <label for="c1">
                                                    <span></span>
                                                </label>
                                                <small>Hourly</small>
                                            </li>
                                            <li>
                                                <input type="radio" name="cc" id="c2">
                                                <label for="c2">
                                                    <span></span>
                                                </label>
                                                <small>Part Time</small>
                                            </li>
                                            <li>
                                                <input type="radio" name="cc" id="c3">
                                                <label for="c3">
                                                    <span></span>
                                                </label>
                                                <small>Full Time</small>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="filter-dd">
                                        <div class="filter-ttl">
                                            <h3>Job Type</h3>
                                            <a href="#" title="">Clear</a>
                                        </div>
                                        <form class="job-tp">
                                            <select>
                                                <option>Select a job type</option>
                                                <option>Select a job type</option>
                                                <option>Select a job type</option>
                                                <option>Select a job type</option>
                                            </select>
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </form>
                                    </div>
                                    <div class="filter-dd">
                                        <div class="filter-ttl">
                                            <h3>Pay Rate / Hr ($)</h3>
                                            <a href="#" title="">Clear</a>
                                        </div>
                                        <div class="rg-slider">
                                            <input class="rn-slider slider-input" type="hidden" value="5,50" />
                                        </div>
                                        <div class="rg-limit">
                                            <h4>1</h4>
                                            <h4>100+</h4>
                                        </div><!--rg-limit end-->
                                    </div>
                                    <div class="filter-dd">
                                        <div class="filter-ttl">
                                            <h3>Experience Level</h3>
                                            <a href="#" title="">Clear</a>
                                        </div>
                                        <form class="job-tp">
                                            <select>
                                                <option>Select a experience level</option>
                                                <option>3 years</option>
                                                <option>4 years</option>
                                                <option>5 years</option>
                                            </select>
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </form>
                                    </div>
                                    <div class="filter-dd">
                                        <div class="filter-ttl">
                                            <h3>Countries</h3>
                                            <a href="#" title="">Clear</a>
                                        </div>
                                        <form class="job-tp">
                                            <select>
                                                <option>Select a country</option>
                                                <option>United Kingdom</option>
                                                <option>United States</option>
                                                <option>Russia</option>
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
                                                <img src="http://via.placeholder.com/50x50" alt="">
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

                                    </div><!--post-bar end-->
                                    <infinite-loading @distance="1" @infinite="infiniteHandler"></infinite-loading>
                                    <!--                                    <div class="process-comm">-->
<!--                                        <div class="spinner">-->
<!--                                            <div class="bounce1"></div>-->
<!--                                            <div class="bounce2"></div>-->
<!--                                            <div class="bounce3"></div>-->
<!--                                        </div>-->
<!--                                    </div>&lt;!&ndash;process-comm end&ndash;&gt;-->
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
                page: 1
            }
        },
        methods:{
        LoadJobs:function () {
            this.$Progress.start()
                axios.get('api/post').then(({data})=>(this.post = data.data))
            this.$Progress.finish()
        },
            infiniteHandler:function ($state) {
               let vm = this;

               this.$http.get('api/post?page='+this.page)
                   .then(response => {
                       return response.json();
                   }).then(data => {
                   $.each(data.data, function(key, value) {
                       vm.post.push(value);
                   });
                   $state.loaded();
               });

               this.page = this.page + 1;
            }
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
            this. LoadJobs()
        },
        mounted() {
            console.log('Component mounted.')

        }
    }
</script>
