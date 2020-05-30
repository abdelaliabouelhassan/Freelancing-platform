<template>
    <div>
        <br>
    <section class="cover-sec">
        <img  v-if="showbackimg" v-for="users in user" :src="users.backimage ? users.backimage.path : 'http://via.placeholder.com/1600x400'" alt="BackGround Image" style="height: 600px;"  class="img-fluid">
        <img  v-if="!showbackimg"  :src="getbackgroundimage()" alt="BackGround Image" style="height: 500px;"  class="img-fluid">
        <a href="javascript:void(0)" title="" @click="$refs.backgroundUserImafe.click()"><i class="fa fa-camera"></i> Change Image</a>
        <input type="file"  style="display: none" @change="UpdateBackGroundImage" ref="backgroundUserImafe">
    </section>

    <main>
        <div class="main-section" v-bind:class="{'overlay':overlay}">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="main-left-sidebar">
                                <div class="user_profile">
                                    <div class="user-pro-img">
                                        <img v-if="showimg" v-for="users in user" :src="users.image ? users.image.path :'http://via.placeholder.com/170x170'"  style="height: 170px;width: 170px;" alt="User Image" >
                                        <img v-if="!showimg" :src="getProfilePhoto()"  alt="User Image" style="height: 170px;width: 170px;">
                                        <a href="javascript:void(0)" title="" @click="$refs.profile_image.click()"><i class="fa fa-camera"></i></a>
                                        <input type="file" @change="UploadImg" style="display:none" ref="profile_image">
                                    </div><!--user-pro-img end-->
                                    <div class="user_pro_status">
                                        <ul class="flw-hr">
                                            <li><a href="javascript:void(0)" title="" class="flww"><i class="la la-plus"></i> Follow</a></li>
                                            <li><a href="javascript:void(0)" title="" class="hre">Hire</a></li>
                                        </ul>
                                        <ul class="flw-status">
                                            <li>
                                                <span>Following</span>
                                                <b>34</b>
                                            </li>
                                            <li>
                                                <span>Followers</span>
                                                <b>155</b>
                                            </li>
                                        </ul>
                                    </div><!--user_pro_status end-->
<!--                                    web sites component-->
                                    <websites :css_class.sync="showurl" :overlay.sync="overlay" :form.sync="this.form" ></websites>
                                </div><!--user_profile end-->
                                <div class="suggestions full-width">
                                    <div class="sd-title">
                                        <h3>People Viewed Profile</h3>
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
                                            <a href="javascript:void(0)" title="">View More</a>
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
                                        <span @click="showbio = true"><i class="fa fa-pencil piont"></i></span>
                                        <span>{{users.bio}}</span>
                                        <span v-if="!users.bio">Add Your Work Name</span>
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-o"></i></li>
                                        </ul>
                                        <a href="javascript:void(0)" title="">Status</a>
                                    </div><!--star-descp end-->
                                    <div class="tab-feed st2">
                                        <ul>
                                            <li data-tab="feed-dd"   v-bind:class="{active:feed,'animated fadeIn':feed}" @click="feed=true;Info=false;Saved=false;Portfolio=false;Bids=false;Payment=false">
                                                <a href="javascript:void(0)" title="">
                                                    <img src="images/ic1.png" alt="">
                                                    <span>Feed</span>
                                                </a>
                                            </li>
                                            <li data-tab="info-dd"  v-bind:class="{active:Info,'animated fadeIn':Info}" @click="Info=true;feed=false;Saved=false;Bids=false;Portfolio=false;Payment=false">
                                                <a href="javascript:void(0)" title="">
                                                    <img src="images/ic2.png" alt="">
                                                    <span>Info</span>
                                                </a>
                                            </li>
                                            <li data-tab="saved-jobs" v-bind:class="{active:Saved,'animated fadeIn':Saved}" @click="Info=false;feed=false;Saved=true;Bids=false;Portfolio=false;Payment=false;">
                                                <a href="javascript:void(0)" title="">
                                                    <img src="images/ic4.png" alt="">
                                                    <span>Saved Jobs</span>
                                                </a>
                                            </li>
                                            <li data-tab="my-bids" v-bind:class="{active:Bids,'animated fadeIn':Bids}" @click="Info=false;feed=false;Saved=false;Bids=true;Portfolio=false;Payment=false">
                                                <a href="javascript:void(0)" title="">
                                                    <img src="images/ic5.png" alt="">
                                                    <span>My Bids</span>
                                                </a>
                                            </li>
                                            <li data-tab="portfolio-dd" v-bind:class="{active:Portfolio,'animated fadeIn':Portfolio}" @click="Info=false;feed=false;Saved=false;Bids=false;Portfolio=true;Payment=false">
                                                <a href="javascript:void(0)" title="">
                                                    <img src="images/ic3.png" alt="">
                                                    <span>Portfolio</span>
                                                </a>
                                            </li>
                                            <li data-tab="payment-dd" v-bind:class="{active:Payment,'animated fadeIn':Payment}" @click="Info=false;feed=false;Saved=false;Bids=false;Portfolio=false;Payment=true">
                                                <a href="javascript:void(0)" title="">
                                                    <img src="images/ic6.png" alt="">
                                                    <span>Payment</span>
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
                                                    <router-link  :to="feedss.slug"><img :src="feedss.user_image ? feedss.user_image.path : 'https://via.placeholder.com/100'" alt="" style="height: 100px; width: 100px;" ></router-link>
                                                    <div class="usy-name">
                                                        <h3><router-link class="lnk"  :to=" feedss.slug">{{feedss.user_name}}</router-link></h3>
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
                                                    <li><img src="images/icon8.png" alt=""><span>{{feedss.is_done ? 'done' : 'available'}} </span></li>
                                                    <li><img src="images/icon9.png" alt=""><span> {{feedss.city_name}}</span></li>
                                                </ul>
                                                <ul class="bk-links">
                                                    <li><a href="javascript:void(0)" title=""><i class="la la-bookmark"></i></a></li>
                                                    <li><a href="javascript:void(0)" title=""><i class="la la-envelope"></i></a></li>
                                                    <li v-if="feedss.type == 'servic'"><a href="javascript:void(0)" title="" class="bid_now">Bid Now</a></li>
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
                                <div class="product-feed-tab"  v-bind:class="{current:Info}" id="info-dd">
                                    <div class="user-profile-ov">
                                        <h3><a href="javascript:void(0)" title="" class="overview-open" @click="showoverview = true;overlay = true">Overview</a> <a href="javascript:void(0)" title="" class="overview-open"  @click="showoverview = true;overlay = true"><i class="fa fa-pencil"></i></a></h3>
                                        <p v-text="form.overview ? form.overview : 'Say Something About Yourself'"></p>
                                    </div><!--user-profile-ov end-->
                                    <div class="user-profile-ov st2">
                                        <h3 ><a href="javascript:void(0)" title="" class="exp-bx-open" @click="showExper = true;overlay = true;form.ExpBody = '';form.ExpTitle = ''">Experience </a> <a href="javascript:void(0)" @click="showExper = true;overlay = true;form.ExpBody = '';form.ExpTitle = ''" title="" class="exp-bx-open"><i class="fa fa-plus-square"></i></a></h3>
                                        <span v-for="Exp in Experience">
                                        <h4>{{Exp.title}} <a href="javascript:void(0)" title="" @click="updateExp(Exp)"><i class="fa fa-pencil"></i></a> <a
                                            href="javascript:void(0)" @click="DeleteExp(Exp)"><i class="fas fa-trash-alt"></i></a></h4>
                                        <p>{{Exp.body}} </p>
                                        </span>
                                        <span v-if="Experience.length == 0">Add Some Experience</span>
                                    </div><!--user-profile-ov end-->
                                    <div class="user-profile-ov">
                                        <h3><a href="javascript:void(0)" title="" class="ed-box-open" @click="showEduc = true;overlay= true;form.idEduc = '';form.Description = '';form.school = '';form.to= '';form.from = ''">Education</a>  <a href="javascript:void(0)" title="" @click="showEduc = true;overlay= true;form.idEduc = '';form.Description = '';form.school = '';form.to= '';form.from = ''"><i class="fa fa-plus-square"></i></a></h3>
                                        <span v-for="educs in Educ">
                                            <h4>{{educs.school}} <a href="javascript:void(0)" title="" @click="updateEduc(educs)"><i class="fa fa-pencil"></i></a>
                                                <a href="javascript:void(0)" @click="DeleteEduc(educs)"><i class="fas fa-trash-alt"></i></a></h4>
                                            <span> {{educs.from | mydate}}  |  {{educs.to | mydate}}</span>
                                            <p>{{educs.description}} </p> </span>
                                        <span v-if="Educ.length == 0">Add Your Education</span>
                                    </div><!--user-profile-ov end-->
                                    <div class="user-profile-ov">
                                        <h3><a href="javascript:void(0)" title="" class="lct-box-open" @click="showLoac = true;overlay= true">Location</a> <a href="javascript:void(0)" title="" class="lct-box-open" @click="showLoac = true;overlay= true"><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" title="" @click="showLoac = true;overlay= true"><i class="fa fa-plus-square"></i></a></h3>
                                       <span  v-for="Loacs in Loac" >
                                        <h4>{{Loacs.city_name}}</h4>
                                       </span>
                                        <span v-if="!Loac">Add Your Location</span>
                                    </div><!--user-profile-ov end-->

                                </div><!--product-feed-tab end-->
                                <div class="product-feed-tab" id="saved-jobs" v-bind:class="{current:Saved}">
                                    <div class="posts-section">
                                        <div class="post-bar" v-for="save in saves">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <router-link  :to="save.slug"><img :src="save.user_image ? save.user_image.path : 'https://via.placeholder.com/100'" alt="" style="height: 100px; width: 100px;" ></router-link>
                                                    <div class="usy-name">
                                                        <h3><router-link class="lnk" :to="save.slug">{{save.username}}</router-link></h3>
                                                        <span><img src="images/clock.png" alt="">{{save.time}}  </span>
                                                    </div>
                                                </div>
                                                <div class="ed-opts" @click="showOption(save)">
                                                    <a href="javascript:void(0)" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                    <ul class="ed-options" v-bind:class="{active:save == showOp}">
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
                                                    <li><img src="images/icon8.png" alt=""><span>{{save.is_done ? 'done' : 'available'}} </span></li>
                                                    <li><img src="images/icon9.png" alt=""><span> {{save.city}}</span></li>
                                                </ul>
                                                <ul class="bk-links">
                                                    <li><a href="javascript:void(0)" title=""><i class="la la-bookmark"></i></a></li>
                                                    <li><a href="javascript:void(0)" title=""><i class="la la-envelope"></i></a></li>
                                                    <li v-if="save.type == 'servic'"><a href="javascript:void(0)" title="" class="bid_now">Bid Now</a></li>
                                                </ul>
                                            </div>
                                            <div class="job_descp">
                                                <h3>{{save.title}}</h3>
                                                <ul class="job-dt">
                                                    <li><a href="javascript:void(0)" title="">Full Time</a></li>
                                                    <li><span>DH{{save.price}}</span></li>
                                                </ul>
                                                <img v-if="save.post_image" :src="save.post_image" alt="" style="height: 500px;width: 500px"  class="img-fluid">
                                                <p>  <read-more more-str="read more" :text="save.body" link="#" less-str="read less" :max-chars="500"></read-more></p>
                                                <ul class="skill-tags">
                                                    <li><a href="javascript:void(0)" title="">{{save.category}}</a></li>
                                                </ul>
                                            </div>

                                        </div>
                                        <!--post-bar end-->
                                    </div>
                                    <infinite-loading @distance="1" @infinite="loadsave"></infinite-loading>

                                </div><!--product-feed-tab end-->
                                <div class="product-feed-tab" id="my-bids" v-bind:class="{current:Bids}">
                                    <div class="posts-section">
                                        <div class="post-bar" v-for="mybid in mybids">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <router-link  :to="mybid.slug"><img :src="mybid.user_image ? mybid.user_image.path : 'https://via.placeholder.com/100'" alt="" style="height: 100px; width: 100px;" ></router-link>
                                                    <div class="usy-name">
                                                        <h3><router-link  class="lnk" :to="mybid.slug">{{mybid.username}}</router-link></h3>
                                                        <span><img src="images/clock.png" alt="">{{mybid.time}}  </span>
                                                    </div>
                                                </div>
                                                <div class="ed-opts" @click="showOption(mybid)">
                                                    <a href="javascript:void(0)" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                    <ul class="ed-options" v-bind:class="{active:mybid == showOp}">
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
                                                    <li><img src="images/icon8.png" alt=""><span>{{mybid.is_done ? 'done' : 'available'}} </span></li>
                                                    <li><img src="images/icon9.png" alt=""><span> {{mybid.city}}</span></li>
                                                </ul>
                                                <ul class="bk-links">
                                                    <li><a href="javascript:void(0)" title=""><i class="la la-bookmark"></i></a></li>
                                                    <li><a href="javascript:void(0)" title=""><i class="la la-envelope"></i></a></li>
                                                    <li v-if="mybid.type == 'servic'"><a href="javascript:void(0)" title="" class="bid_now">Bid Now</a></li>
                                                </ul>
                                            </div>
                                            <div class="job_descp">
                                                <h3>{{mybid.title}}</h3>
                                                <ul class="job-dt">
                                                    <li><a href="javascript:void(0)" title="">Full Time</a></li>
                                                    <li><span>DH{{mybid.price}}</span></li>
                                                </ul>
                                                <img v-if="mybid.post_image" :src="mybid.post_image" alt="" style="height: 500px;width: 500px"  class="img-fluid">
                                                <p>  <read-more more-str="read more" :text="mybid.body" link="#" less-str="read less" :max-chars="500"></read-more></p>
                                                <ul class="skill-tags">
                                                    <li><a href="javascript:void(0)" title="">{{mybid.category}}</a></li>
                                                </ul>
                                            </div>

                                        </div>
                                        <!--post-bar end-->
                                    </div>
                                    <infinite-loading @distance="1" @infinite="loadbid"></infinite-loading>

                                </div><!--product-feed-tab end-->
                                    <proto :Portfolio="Portfolio" :showProf.sync="showProf" :overlay.sync="overlay" :form.sync="form"   ></proto>
                                <div class="product-feed-tab" id="payment-dd" v-bind:class="{current:Payment}">
                                    <div class="billing-method">
                                        <ul>
                                            <li>
                                                <h3>Add Billing Method</h3>
                                                <a href="javascript:void(0)" title=""><i class="fa fa-plus-circle"></i></a>
                                            </li>
                                            <li>
                                                <h3>See Activity</h3>
                                                <a href="javascript:void(0)" title="">View All</a>
                                            </li>
                                            <li>
                                                <h3>Total Money</h3>
                                                <span>$0.00</span>
                                            </li>
                                        </ul>
                                        <div class="lt-sec">
                                            <img src="images/lt-icon.png" alt="">
                                            <h4>All your transactions are saved here</h4>
                                            <a href="javascript:void(0)" title="">Click Here</a>
                                        </div>
                                    </div><!--billing-method end-->
                                    <div class="add-billing-method">
                                        <h3>Add Billing Method</h3>
                                        <h4><img src="images/dlr-icon.png" alt=""><span>With workwise payment protection , only pay for work delivered.</span></h4>
                                        <div class="payment_methods">
                                            <h4>Credit or Debit Cards</h4>
                                            <form>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="cc-head">
                                                            <h5>Card Number</h5>
                                                            <ul>
                                                                <li><img src="images/cc-icon1.png" alt=""></li>
                                                                <li><img src="images/cc-icon2.png" alt=""></li>
                                                                <li><img src="images/cc-icon3.png" alt=""></li>
                                                                <li><img src="images/cc-icon4.png" alt=""></li>
                                                            </ul>
                                                        </div>
                                                        <div class="inpt-field pd-moree">
                                                            <input type="text" name="cc-number" placeholder="">
                                                            <i class="fa fa-credit-card"></i>
                                                        </div><!--inpt-field end-->
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="cc-head">
                                                            <h5>First Name</h5>
                                                        </div>
                                                        <div class="inpt-field">
                                                            <input type="text" name="f-name" placeholder="">
                                                        </div><!--inpt-field end-->
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="cc-head">
                                                            <h5>Last Name</h5>
                                                        </div>
                                                        <div class="inpt-field">
                                                            <input type="text" name="l-name" placeholder="">
                                                        </div><!--inpt-field end-->
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="cc-head">
                                                            <h5>Expiresons</h5>
                                                        </div>
                                                        <div class="rowwy">
                                                            <div class="row">
                                                                <div class="col-lg-6 pd-left-none no-pd">
                                                                    <div class="inpt-field">
                                                                        <input type="text" name="f-name" placeholder="">
                                                                    </div><!--inpt-field end-->
                                                                </div>
                                                                <div class="col-lg-6 pd-right-none no-pd">
                                                                    <div class="inpt-field">
                                                                        <input type="text" name="f-name" placeholder="">
                                                                    </div><!--inpt-field end-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="cc-head">
                                                            <h5>Cvv (Security Code) <i class="fa fa-question-circle"></i></h5>
                                                        </div>
                                                        <div class="inpt-field">
                                                            <input type="text" name="l-name" placeholder="">
                                                        </div><!--inpt-field end-->
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <button type="submit">Continue</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <h4>Add Paypal Account</h4>
                                        </div>
                                    </div><!--add-billing-method end-->
                                </div><!--product-feed-tab end-->
                            </div><!--main-ws-sec end-->
                        </div>
                        <div class="col-lg-3">
                            <div class="right-sidebar">
                                <div class="message-btn">
                                    <a href="javascript:void(0)" title=""><i class="fa fa-envelope"></i> Message</a>
                                </div>
                                <div class="widget widget-portfolio">
                                    <div class="wd-heady">
                                        <h3>Portfolio</h3>
                                        <img src="images/photo-icon.png" alt="">
                                    </div>
                                    <div class="pf-gallery" >
                                        <VGallery :images="imagesproto" :index="index1" @close="index1 = null"></VGallery>
                                        <ul >
                                            <li  v-for="(image, imageIndex) in imagesproto"
                                                 :key="imageIndex"><a href="javascript:void(0)" @click="index1 = imageIndex" title=""><img :src="image.path" alt=""></a></li>

                                        </ul>
                                        <div v-if="imagesproto.length == 0">You Dont Have Any Portfolio</div>
                                    </div><!--pf-gallery end-->
                                </div><!--widget-portfolio end-->
                            </div><!--right-sidebar end-->
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>


        <div class="overview-box" id="create-portfolio" v-bind:class="{open:showbio}">
            <div class="overview-edit">
                <h3>Create Portfolio</h3>
                <form @submit.prevent="addbio()">

                    <input type="text" name="bio" :class="{ 'is-invalid': form.errors.has('bio') }" v-model="form.bio" placeholder="Exp : Graphic Designer at Self Employed..." >
                    <has-error :form="form" field="bio"></has-error>
                    <br>

                    <button type="submit" class="save">Save</button>
                </form>
                <a href="javascript:void(0)" title="" class="close-box"><i class="la la-close" @click="showbio = false"></i></a>
            </div><!--overview-edit end-->
        </div>

    </main>

     <overview  :css_class.sync="showoverview" :overlay.sync="overlay" :form="this.form"></overview>
     <exp :css_class.sync="showExper" :overlay.sync="overlay" :form.sync="this.form" :type.sync="IsExpUpdate"></exp>
     <educ :css_class.sync="showEduc" :overlay.sync="overlay" :form.sync="this.form" :type.sync="IsEducUpdate"></educ>
     <location :css_class.sync="showLoac" :overlay.sync="overlay" :form.sync="this.form"></location>
    </div>
</template>

<script>
    import ProfileOverView from "./includs/ProfileOverView";
    import ProfileExperience from "./includs/ProfileExperience";
    import ProfileEduc from "./includs/ProfileEduc";
    import ProfileLocation from "./includs/ProfileLocation";
    import ProfileProtfolio from "./includs/ProfileProtfolio";
    import ProfileWebSites from "./includs/ProfileWebSites";

    export default {
        components: {ProfileExperience, ProfileOverView,ProfileEduc,ProfileLocation,ProfileProtfolio},
        data () {

            return {
                imagesproto:[],
                index1: null,
                user:[],
                image:'',
                backimg:'',
                /*v-bind:class variable*/
                showbackimg:true,
                showimg:true,
                feed:true,
                Info:false,
                Saved:false,
                Bids:false,
                Payment:false,
                Portfolio:false,
                showoverview:false,
                overlay:false,
                showExper:false,
                showEduc:false,
                showLoac:false,
                IsExpUpdate : false,
                IsEducUpdate : false,
                showProf:false,
                showurl:false,
                showbio:false,
                /*End v-bind:class variable*/
                /*feed*/
                showOp:null,
                lastPage: 0,
                page: 1,
                feeds:{},
                /*feed End*/
                /*save job*/
                lastPagesave: 0,
                pagesave: 1,
                saves:{},
                /*save job end*/
                /*My Bids*/
                lastPagebids: 0,
                pagebids: 1,
                mybids:{},
                /*End My Bids*/
                /*Experience*/
                Experience:{},
                /*End Experience*/
                /*Education*/
                Educ:{},
                /*End Education*/
                /*Location*/
                Loac:{},
                /*End Location*/
                form: new Form({
                    overview: '',
                    ExpTitle:'',
                    ExpBody:'',
                    ExpId:'',
                    EducId:'',
                    school:'',
                    from:'',
                    to:'',
                    Description:'',
                    City:'',
                    path:'',
                    profId:'',
                    url:'',
                    bio:''
                })
            }
        },
        beforeRouteLeave (to, from, next) {
            next(false);
            if(this.$gets.IsLogedIn()){
                next();
            }else{
                if(to.path != '/Projects' && to.path != '/home' && to.path != '/Jobs'){
                    Swal.fire({
                        icon: 'error',
                        title: 'You Are Not Logged In !!!',
                        text: 'Please Logged In first Or Create New Account',
                        footer: '<a href="/">Logged In here Or Create Account</a>'
                    })
                    next(false);
                }else{
                    next();
                }

            }
        },
        components: {
            'overview':ProfileOverView,
            'exp':ProfileExperience,
            'educ':ProfileEduc,
            'location':ProfileLocation,
            'proto':ProfileProtfolio,
            'websites':ProfileWebSites,
        },
        watch: {
            $route: {
                immediate: true,
                handler(to, from) {
                    document.title = to.meta.title || 'Profile | Brikole';
                }
            },
        },
        methods:{
            loadImage(){
                let vm = this;
                axios.get('api/getPortfolio').then(({data}) => {
                    this.imagesproto = data.data
                })
            },
            loadbids(){
                let vm = this;
                axios.get('api/bids').then(({data}) => {
                    this.mybids = data.data
                    vm.lastPagebids = data.meta.last_page
                })
            },
            loadbid($state){
                let vm = this;
                if (this.mybids.length != 0) {
                    axios.get('api/bids?page=' + this.pagebids)
                        .then(response => {
                            return response.data;
                        }).then(data => {
                        //
                        if (this.pagesave - 1 == this.lastPagebids) {
                            $state.complete();
                        } else {
                            setTimeout(function () {
                                $.each(data.data, function (key, value) {
                                    vm.mybids.push(value);
                                });
                                $state.loaded();
                                Vue.nextTick(function () {
                                    $('[data-toggle="tooltip"]').tooltip();
                                });
                            }.bind(this), 0);
                        }

                    });
                    this.pagebids = this.pagebids + 1;
                } else {
                    $state.complete();
                }
            },
            loadsaves(){
                let vm = this;
                axios.get('api/save').then(({data}) => {
                    this.saves = data.data
                    vm.lastPagesave = data.meta.last_page
                })
            },
            loadsave($state){
                let vm = this;
                if (this.saves.length != 0) {
                    axios.get('api/save?page=' + this.pagesave)
                        .then(response => {
                            return response.data;
                        }).then(data => {
                        //
                        if (this.pagesave - 1 == this.lastPagesave) {
                            $state.complete();
                        } else {
                            setTimeout(function () {
                                $.each(data.data, function (key, value) {
                                    vm.saves.push(value);
                                });
                                $state.loaded();
                                Vue.nextTick(function () {
                                    $('[data-toggle="tooltip"]').tooltip();
                                });
                            }.bind(this), 0);
                        }

                    });
                    this.pagesave = this.pagesave + 1;
                } else {
                    $state.complete();
                }
            },
            loadfeeds(){
                let vm = this;
                axios.get('api/feeds').then(({data}) => {
                    this.feeds = data.data
                    vm.lastPage = data.meta.last_page
                })
            },
            loadfeed($state){
                let vm = this;
                if (this.feeds.length != 0) {
                    axios.get('api/feeds?page=' + this.page)
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
            getProfilePhoto() {
                if(this.image != '' && this.image != null){
                    return this.image;
                }else{
                    return  'http://via.placeholder.com/170x170'
                }
            },
            UploadImg:function(e){
                this.$Progress.start('8000')
                let file = e.target.files[0];
                let reader = new FileReader();
                if(file['type']==='image/jpeg' || file['type']==='image/png'){
                    if(file['size'] < 2111775){
                        reader.onloadend = (file) =>{
                            this.image = reader.result
                                axios.post('api/UpdateImage' , {
                                    data: this.image,
                                    _method: 'patch'
                                })
                                    .then(function (response) {
                                        Toast.fire({
                                            icon: 'success',
                                            title: 'Profile Image Updated Successfully'
                                        })
                                    })
                                    .catch(function (error) {
                                        Toast.fire({
                                            icon: 'error',
                                            title: 'something went wrong'
                                        })
                                    });
                            this.showimg = false
                            this.$Progress.finish()
                        }
                        reader.readAsDataURL(file)
                    }else{
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Image Size Is Big Then 2MB',
                            'error'

                        )
                        this.$Progress.decrease(20)
                        this.$Progress.fail()
                    }
                }else{
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'This File Is Not Image',
                        'error'

                    )
                    this.$Progress.decrease(20)
                    this.$Progress.fail()
                }


            },
            getbackgroundimage:function () {
                if(this.backimg != '' && this.backimg != null){
                    return this.backimg;
                }else{
                    return  'http://via.placeholder.com/170x170'
                }
            },
            UpdateBackGroundImage:function (e) {
                this.$Progress.start('8000')
                let file = e.target.files[0];
                let reader = new FileReader();
                if(file['type']==='image/jpeg' || file['type']==='image/png'){
                    if(file['size'] < 2111775){
                        reader.onloadend = (file) =>{
                            this.backimg = reader.result
                            axios.post('api/UpdateBackGround' , {
                                data: this.backimg,
                                _method: 'patch'
                            })
                                .then(function (response) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'BackGround Image Updated Successfully'
                                    })
                                })
                                .catch(function (error) {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'Something Went Wrong !!!'
                                    })
                                });
                            this.showbackimg = false
                            this.$Progress.finish()
                        }
                        reader.readAsDataURL(file)
                    }else{
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Image Size Is Big Then 2MB',
                            'error'

                        )
                        this.$Progress.decrease(20)
                        this.$Progress.fail()
                    }
                }else{
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'This File Is Not Image',
                        'error'

                    )
                    this.$Progress.decrease(20)
                    this.$Progress.fail()
                }
            },
            showOption:function (feeds) {
                if(this.showOp == feeds){
                    this.showOp = null
                }else{
                    this.showOp = feeds
                }

            },
            loadoverivew:function () {
                axios.get('api/getoverview').then(({data})=>(this.form.fill(data)))
            },
            loadExp(){
                axios.get('api/getExperience').then(({data}) => {
                    this.Experience = data.data
                })

            },
            updateExp(exp){
                this.form.ExpId = exp.id
                this.form.ExpBody = exp.body
                this.form.ExpTitle = exp.title
                this.showExper = true
                this.IsExpUpdate = true
            },
            DeleteExp(exp){
                Swal.fire({
                    title: 'Are you sure You Wnat Delete This ?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        this.form.ExpId = exp.id
                        this.$Progress.start()
                        this.form.post('api/DeleteExperience')
                            .then(()=> {
                                this.$Progress.finish()
                                Swal.fire(
                                    'Deleted!',
                                    'Your Experience has been deleted.',
                                    'success'
                                )
                                something.$emit('loadExperience');
                            })
                            .catch(()=> {
                                this.$Progress.decrease(20)
                                this.$Progress.fail()
                                Toast.fire({
                                    icon: 'error',
                                    title: 'Something Went Wrong'
                                })
                            });

                    }
                })
            },
            loadEduc(){
                axios.get('api/getEduc').then(({data}) => {
                    this.Educ = data.data
                })

            },
            updateEduc(educ){
                    this.form.EducId = educ.id;
                    this.form.school = educ.school;
                    this.form.from = educ.from;
                    this.form.to = educ.to;
                    this.form.Description = educ.description;
                    this.showEduc = true;
                    this.IsEducUpdate = true;
            },
            DeleteEduc(educ){
                Swal.fire({
                    title: 'Are you sure You Wnat Delete This ?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        this.form.EducId = educ.id
                        this.$Progress.start()
                        this.form.post('api/DeleteEduc')
                            .then(()=> {
                                this.$Progress.finish()
                                Swal.fire(
                                    'Deleted!',
                                    'Your Education has been deleted.',
                                    'success'
                                )
                                something.$emit('loadEduc');
                            })
                            .catch(()=> {
                                this.$Progress.decrease(20)
                                this.$Progress.fail()
                                Toast.fire({
                                    icon: 'error',
                                    title: 'Something Went Wrong'
                                })
                            });

                    }
                })
            },
            LoadLocation(){
                axios.get('api/getLocation').then(({data}) => {
                    this.Loac = data.data
                    this.form.City = '0'
                })
            },
            addbio(){
                this.$Progress.start('8000')
                this.form.post('api/AddBio')
                    .then(()=>{
                        this.$Progress.finish()
                        Toast.fire({
                            icon: 'success',
                            title: 'Bio Added Successfully'
                        })
                        something.$emit('loaduser');
                        this.showbio = false
                    })
                    .catch(()=>{
                        this.$Progress.decrease(50)
                        this.$Progress.fail()
                    })
            },

        },
        beforeRouteEnter (to, from, next) {
            next(vm => {
                if(vm.$gets.IsLogedIn()){
                    next();
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'You Are Not Logged In !!!',
                        text: 'Please Logged In first Or Create New Account',
                        footer: '<a href="/">Logged In here Or Create Account</a>'
                    })
                    next('Jobs');
                    setTimeout(function () {
                        console.clear();
                    }, 10000);

                }
            })


        },
        mounted() {
        },
        created() {
            this.$Progress.start('1000')
            axios.get('api/Profile').then(({data}) => {this.user = data.data})
                .then(
                    (response) => {},
                ).catch(error => {
            });
                this.loadfeeds();
                this.loadbids()
                this.loadsaves()
                this.loadoverivew();
                this.loadExp()
                this.loadEduc()
                this.LoadLocation()
                this.loadImage()
                something.$on('wherecreateuserloaddate',()=>{
                    this.loadoverivew();
                });
                something.$on('loadExperience',()=>{
                    this.loadExp();
                });
                something.$on('loadEduc',()=>{
                    this.loadEduc();
                });
                something.$on('loadLoac',()=>{
                    this.LoadLocation();
                });
                something.$on('loadport',()=>{
                    this.loadImage();
                })
                something.$on('loaduser',()=>{
                    axios.get('api/Profile').then(({data}) => {this.user = data.data})
                })


            this.$Progress.finish()
        }
    }
</script>

<style scoped>
    .piont{
        cursor: pointer;
    }
    .piont:hover{
        cursor: pointer;
        color: #3f9ae5;
    }
    .lnk{
        color: rgb(247, 247, 247);
    }
</style>



