<template>
    <div>

        <main>
            <div class="show-filter" @click="showFilter = !showFilter ">
                Filter
                <i class="fa fa-search"></i>
            </div>

                        <div class="filter" v-bind:class="{active:showFilter}">

                            <div class=" filter-file">
                                <div class="filter-secs">
                                    <div class="search-box">
                                    <form autocomplete="off" @submit.prevent="bringpost">
                            <input type="text" name="search" @keyup="search" v-model="input"
                                placeholder="Search keywords">
                            <button type="submit" class="panel-heading">Search</button>
                        </form>
                        </div>
                                    <div class="filter-heading">
                                        <h3>Filters</h3>
                                        <a href="javascript:void(0)" title="" @click="clearall">Clear all filters</a>
                                    </div>
                                    <!--filter-heading end-->
                                    <div class="paddy">

                                        <div class="filter-dd">
                                            <div class="filter-ttl">
                                                <h3>Availabilty</h3>
                                            </div>
                                            <ul class="avail-checks">
                                                <li>
                                                    <input type="radio" name="cc" id="c2" v-model="isdone" value="0"
                                                        @change="filterpost">
                                                    <label for="c2">
                                                        <span></span>
                                                    </label>
                                                    <small>Available</small>
                                                </li>
                                                <li>
                                                    <input type="radio" name="cc" id="c3" v-model="isdone" value="1"
                                                        @change="filterpost">
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
                                                <select @change="filterpost" v-model="cat">
                                                    <option value="0">Select a job Category</option>
                                                    <option v-for="categorys in category" :value="categorys.id">
                                                        {{categorys.category_name}}</option>
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
                                                    <option value="0">Select City</option>
                                                    <option v-for="citys in city" :value="citys.id">{{citys.city_name}}
                                                    </option>

                                                </select>
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--filter-secs end-->
                            </div>
                        </div>
                        <div v-if="searchresult.length">
                            <p v-for="searchresults in searchresult" @click="takevalue(searchresults.title)">
                                <b class="panel-footer">{{searchresults.title}}</b>
                            </p>
                        </div>
            <!--search-sec end-->
            <div class="main-section">
                <div class="container">
                    <div class="main-section-data">
                        <div class="row">
                            <div class="col-md">
                                <div class="main-ws-sec">
                                    <div class="posts-section">
                                        <div class="post-bar" v-for="posts in post">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img :src="posts.user_image ? posts.user_image.path : 'https://via.placeholder.com/100'" alt="User Image" style="height: 100px; width: 100px;">
                                                    <div class="usy-name">
                                                        <h3>{{posts.user_name}} </h3>
                                                        <span><img src="images/clock.png"
                                                                alt="">{{posts.created_at}} </span>
                                                    </div>
                                                </div>
                                                <div class="ed-opts" @click="showOption(posts)">
                                                    <a href="javascript:void(0)" title="" class="ed-opts-open"><i
                                                            class="la la-ellipsis-v"></i></a>
                                                    <ul class="ed-options" v-bind:class="{active:posts == showOp}">
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
                                                    <li><img src="images/icon8.png"
                                                            alt=""><span>{{posts.is_done ? 'done' : 'available'}}
                                                        </span></li>
                                                    <li><img src="images/icon9.png" alt=""><span>
                                                            {{posts.city_name}}</span></li>
                                                </ul>
                                                <ul class="bk-links">
                                                    <li><a href="javascript:void(0)" title=""><i class="la la-bookmark"></i></a></li>
                                                    <li><a href="javascript:void(0)" title=""><i class="la la-envelope"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="job_descp">
                                                <h3>{{posts.title}}</h3>
                                                <ul class="job-dt">
                                                    <li><a href="javascript:void(0)" title="">Full Time</a></li>
                                                    <li><span>DH{{posts.price}}</span></li>
                                                </ul>
                                                <img v-if="posts.post_image" :src="posts.post_image" alt="">
                                                <p>{{posts.body}} ... <a href="javascript:void(0)" title="">view more</a></p>
                                                <ul class="skill-tags">
                                                    <li><a href="javascript:void(0)" title="">{{posts.category_name}}</a></li>
                                                </ul>
                                            </div>

                                        </div>
                                        <!--post-bar end-->
                                        <infinite-loading @distance="1" @infinite="infiniteHandler"></infinite-loading>
                                    </div>
                                    <!--posts-section end-->
                                </div>
                                <!--main-ws-sec end-->
                            </div>
                            <div class="col-lg-3">
                                <div class="right-sidebar">
                                    <div class="widget widget-about" v-if="!$gets.IsLogedIn()">
                                        <img src="images/logotesticon.png" alt="">
                                        <h3>You are Not Signed In</h3>
                                        <span>Signed In Now </span>
                                        <div class="sign_link">
                                            <h3><a href="/" title="">Sign up</a></h3>
                                        </div>
                                    </div>
                                    <!--widget-about end-->
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
                                            </div>
                                            <!--job-info end-->
                                            <div class="job-info">
                                                <div class="job-details">
                                                    <h3>Senior UI / UX Designer</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                                </div>
                                                <div class="hr-rate">
                                                    <span>$25/hr</span>
                                                </div>
                                            </div>
                                            <!--job-info end-->
                                            <div class="job-info">
                                                <div class="job-details">
                                                    <h3>Junior Seo Designer</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                                </div>
                                                <div class="hr-rate">
                                                    <span>$25/hr</span>
                                                </div>
                                            </div>
                                            <!--job-info end-->
                                            <div class="job-info">
                                                <div class="job-details">
                                                    <h3>Senior PHP Designer</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                                </div>
                                                <div class="hr-rate">
                                                    <span>$25/hr</span>
                                                </div>
                                            </div>
                                            <!--job-info end-->
                                            <div class="job-info">
                                                <div class="job-details">
                                                    <h3>Senior Developer Designer</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                                </div>
                                                <div class="hr-rate">
                                                    <span>$25/hr</span>
                                                </div>
                                            </div>
                                            <!--job-info end-->
                                        </div>
                                        <!--jobs-list end-->
                                    </div>
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
                                            </div>
                                            <!--job-info end-->
                                            <div class="job-info">
                                                <div class="job-details">
                                                    <h3>Senior UI / UX Designer</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                                </div>
                                                <div class="hr-rate">
                                                    <span>$25/hr</span>
                                                </div>
                                            </div>
                                            <!--job-info end-->
                                            <div class="job-info">
                                                <div class="job-details">
                                                    <h3>Junior Seo Designer</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                                </div>
                                                <div class="hr-rate">
                                                    <span>$25/hr</span>
                                                </div>
                                            </div>
                                            <!--job-info end-->
                                        </div>
                                        <!--jobs-list end-->
                                    </div>
                                    <!--widget-jobs end-->
                                </div>
                                <!--right-sidebar end-->
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
        data() {
            return {
                // Create a new form instance
                post: {},
                city: {},
                category: {},
                lastPage: 0,
                page: 1,
                input: '',
                cat: '0',
                price: '0',
                cit: '0',
                isdone: '3',
                searchresult: '',
                showOp:null,
                showFilter:false,
            }
        },

        methods: {
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
            LoadJobs: function () {
                let vm = this;
                axios.get('api/post').then(({
                    data
                }) => {
                    this.post = data.data
                    vm.lastPage = data.meta.last_page
                })

            },
            infiniteHandler: function ($state) {
                let vm = this;
                if (this.post.length != 0) {
                    axios.get('api/post?page=' + this.page)
                        .then(response => {
                            return response.data;
                        }).then(data => {
                            //
                            if (this.page - 1 == this.lastPage) {
                                $state.complete();
                            } else {
                                setTimeout(function () {
                                    $.each(data.data, function (key, value) {
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
                } else {
                    $state.complete();
                }

            },
            filterpost: function () {
                this.lastPage = 0
                this.page = 1
                axios.get('api/filter/' + this.cat + '/' + this.cit + '/' + this.price + '/' + this.isdone).then(({
                    data
                }) => {
                    this.post = data.data
                })
            },
            clearall: function () {
                this.lastPage = 0
                this.page = 1
                this.cat = '0',
                    this.price = '0',
                    this.cit = '0',
                    this.isdone = '3'
                this.LoadJobs()

            },
            search: function () {
                if (this.input.trim() != '') {

                    axios.post('api/search', {
                        input: this.input
                    }).then((response) => {
                        this.searchresult = response.data;
                    })
                } else {
                    this.searchresult = ''
                }

            },
            takevalue: function (input) {
                this.input = input
                this.searchresult = ''
            },
            bringpost: function () {
                if (this.input.trim() != '') {
                    axios.get('api/search1/' + this.input).then(({
                        data
                    }) => {
                        this.post = data.data
                    })

                }
            },
            showOption:function (posts) {
                if(this.showOp == posts){
                    this.showOp = null
                }else{
                    this.showOp = posts
                }

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
            this.$Progress.start()
            this.LoadJobs()
            this.LoadCategory()
            this.LoadCity()
            this.$Progress.finish()
        },
        mounted() {
            console.log('Component mounted.')
        }
    }

</script>
