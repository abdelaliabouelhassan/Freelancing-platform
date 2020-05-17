<template>
    <div>
        <br>
    <section class="cover-sec">
        <img  v-if="showbackimg" v-for="users in user" :src="users.background_image ? users.background_image : 'http://via.placeholder.com/1600x400'" alt="BackGround Image" style="height: 500px;">
        <img  v-if="!showbackimg"  :src="getbackgroundimage()" alt="BackGround Image" style="height: 500px;">

        <a href="javascript:void(0)" title="" @click="$refs.backgroundUserImafe.click()"><i class="fa fa-camera"></i> Change Image</a>
        <input type="file"  style="display: none" @change="UpdateBackGroundImage" ref="backgroundUserImafe">
    </section>

    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="main-left-sidebar">
                                <div class="user_profile">
                                    <div class="user-pro-img">
                                        <img v-if="showimg" v-for="users in user" :src="users.user_image ? users.user_image :'http://via.placeholder.com/170x170'"  style="height: 170px;width: 170px;" alt="User Image" >
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
                                    <ul class="social_links">
                                        <li><a href="javascript:void(0)" title=""><i class="la la-globe"></i> www.example.com</a></li>
                                        <li><a href="javascript:void(0)" title=""><i class="fa fa-facebook-square"></i> Http://www.facebook.com/john...</a></li>
                                        <li><a href="javascript:void(0)" title=""><i class="fa fa-twitter"></i> Http://www.Twitter.com/john...</a></li>
                                        <li><a href="javascript:void(0)" title=""><i class="fa fa-google-plus-square"></i> Http://www.googleplus.com/john...</a></li>
                                        <li><a href="javascript:void(0)" title=""><i class="fa fa-behance-square"></i> Http://www.behance.com/john...</a></li>
                                        <li><a href="javascript:void(0)" title=""><i class="fa fa-pinterest"></i> Http://www.pinterest.com/john...</a></li>
                                        <li><a href="javascript:void(0)" title=""><i class="fa fa-instagram"></i> Http://www.instagram.com/john...</a></li>
                                        <li><a href="javascript:void(0)" title=""><i class="fa fa-youtube"></i> Http://www.youtube.com/john...</a></li>
                                    </ul>
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
                                <div class="user-tab-sec">
                                    <h3 v-for="users in user">{{users.name}}</h3>
                                    <div class="star-descp">
                                        <span>Graphic Designer at Self Employed</span>
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
                                            <li data-tab="feed-dd" class="active">
                                                <a href="javascript:void(0)" title="">
                                                    <img src="images/ic1.png" alt="">
                                                    <span>Feed</span>
                                                </a>
                                            </li>
                                            <li data-tab="info-dd">
                                                <a href="javascript:void(0)" title="">
                                                    <img src="images/ic2.png" alt="">
                                                    <span>Info</span>
                                                </a>
                                            </li>
                                            <li data-tab="saved-jobs">
                                                <a href="javascript:void(0)" title="">
                                                    <img src="images/ic4.png" alt="">
                                                    <span>Saved Jobs</span>
                                                </a>
                                            </li>
                                            <li data-tab="my-bids">
                                                <a href="javascript:void(0)" title="">
                                                    <img src="images/ic5.png" alt="">
                                                    <span>My Bids</span>
                                                </a>
                                            </li>
                                            <li data-tab="portfolio-dd">
                                                <a href="javascript:void(0)" title="">
                                                    <img src="images/ic3.png" alt="">
                                                    <span>Portfolio</span>
                                                </a>
                                            </li>
                                            <li data-tab="payment-dd">
                                                <a href="javascript:void(0)" title="">
                                                    <img src="images/ic6.png" alt="">
                                                    <span>Payment</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- tab-feed end-->
                                </div><!--user-tab-sec end-->
                                <div class="product-feed-tab current" id="feed-dd">
                                    <div class="posts-section">



                                        <div class="post-bar">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img src="http://via.placeholder.com/50x50" alt="">
                                                    <div class="usy-name">
                                                        <h3>John Doe</h3>
                                                        <span><img src="images/clock.png" alt="">3 min ago</span>
                                                    </div>
                                                </div>
                                                <div class="ed-opts">
                                                    <a href="javascript:void(0)" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                    <ul class="ed-options">
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
                                                    <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
                                                    <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                                </ul>
                                                <ul class="bk-links">
                                                    <li><a href="javascript:void(0)" title=""><i class="la la-bookmark"></i></a></li>
                                                    <li><a href="javascript:void(0)" title=""><i class="la la-envelope"></i></a></li>
                                                    <li><a href="javascript:void(0)" title="" class="bid_now">Bid Now</a></li>
                                                </ul>
                                            </div>
                                            <div class="job_descp">
                                                <h3>Ios Shopping mobile app</h3>
                                                <ul class="job-dt">
                                                    <li><span>$300 - $350</span></li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="javascript:void(0)" title="">view more</a></p>
                                                <ul class="skill-tags">
                                                    <li><a href="javascript:void(0)" title="">HTML</a></li>
                                                    <li><a href="javascript:void(0)" title="">PHP</a></li>
                                                    <li><a href="javascript:void(0)" title="">CSS</a></li>
                                                    <li><a href="javascript:void(0)" title="">Javascript</a></li>
                                                    <li><a href="javascript:void(0)" title="">Wordpress</a></li>
                                                </ul>
                                            </div>
                                            <div class="job-status-bar">
                                                <ul class="like-com">
                                                    <li>
                                                        <a href="javascript:void(0)"><i class="la la-heart"></i> Like</a>
                                                        <img src="images/liked-img.png" alt="">
                                                        <span>25</span>
                                                    </li>
                                                    <li><a href="javascript:void(0)" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
                                                </ul>
                                                <a><i class="la la-eye"></i>Views 50</a>
                                            </div>
                                        </div><!--post-bar end-->

                                    </div><!--posts-section end-->
                                </div><!--product-feed-tab end-->
                                <div class="product-feed-tab" id="info-dd">
                                    <div class="user-profile-ov">
                                        <h3><a href="javascript:void(0)" title="" class="overview-open">Overview</a> <a href="javascript:void(0)" title="" class="overview-open"><i class="fa fa-pencil"></i></a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. Nunc eu augue nec arcu efficitur faucibus. Aliquam accumsan ac magna convallis bibendum. Quisque laoreet augue eget augue fermentum scelerisque. Vivamus dignissim mollis est dictum blandit. Nam porta auctor neque sed congue. Nullam rutrum eget ex at maximus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget vestibulum lorem.</p>
                                    </div><!--user-profile-ov end-->
                                    <div class="user-profile-ov st2">
                                        <h3><a href="javascript:void(0)" title="" class="exp-bx-open">Experience </a><a href="javascript:void(0)" title="" class="exp-bx-open"><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" title="" class="exp-bx-open"><i class="fa fa-plus-square"></i></a></h3>
                                        <h4>Web designer <a href="javascript:void(0)" title=""><i class="fa fa-pencil"></i></a></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
                                        <h4>UI / UX Designer <a href="javascript:void(0)" title=""><i class="fa fa-pencil"></i></a></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id.</p>
                                        <h4>PHP developer <a href="javascript:void(0)" title=""><i class="fa fa-pencil"></i></a></h4>
                                        <p class="no-margin">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
                                    </div><!--user-profile-ov end-->
                                    <div class="user-profile-ov">
                                        <h3><a href="javascript:void(0)" title="" class="ed-box-open">Education</a> <a href="javascript:void(0)" title="" class="ed-box-open"><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" title=""><i class="fa fa-plus-square"></i></a></h3>
                                        <h4>Master of Computer Science</h4>
                                        <span>2015 - 2018</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
                                    </div><!--user-profile-ov end-->
                                    <div class="user-profile-ov">
                                        <h3><a href="javascript:void(0)" title="" class="lct-box-open">Location</a> <a href="javascript:void(0)" title="" class="lct-box-open"><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" title=""><i class="fa fa-plus-square"></i></a></h3>
                                        <h4>India</h4>
                                        <p>151/4 BT Chownk, Delhi </p>
                                    </div><!--user-profile-ov end-->
                                    <div class="user-profile-ov">
                                        <h3><a href="javascript:void(0)" title="" class="skills-open">Skills</a> <a href="javascript:void(0)" title="" class="skills-open"><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)"><i class="fa fa-plus-square"></i></a></h3>
                                        <ul>
                                            <li><a href="javascript:void(0)" title="">HTML</a></li>
                                            <li><a href="javascript:void(0)" title="">PHP</a></li>
                                            <li><a href="javascript:void(0)" title="">CSS</a></li>
                                            <li><a href="javascript:void(0)" title="">Javascript</a></li>
                                            <li><a href="javascript:void(0)" title="">Wordpress</a></li>
                                            <li><a href="javascript:void(0)" title="">Photoshop</a></li>
                                            <li><a href="javascript:void(0)" title="">Illustrator</a></li>
                                            <li><a href="javascript:void(0)" title="">Corel Draw</a></li>
                                        </ul>
                                    </div><!--user-profile-ov end-->
                                </div><!--product-feed-tab end-->
                                <div class="product-feed-tab" id="saved-jobs">
                                    <div class="posts-section">



                                        <div class="post-bar">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img src="http://via.placeholder.com/50x50" alt="">
                                                    <div class="usy-name">
                                                        <h3>John Doe</h3>
                                                        <span><img src="images/clock.png" alt="">3 min ago</span>
                                                    </div>
                                                </div>
                                                <div class="ed-opts">
                                                    <a href="javascript:void(0)" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                    <ul class="ed-options">
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
                                                    <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
                                                    <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                                </ul>
                                                <ul class="bk-links">
                                                    <li><a href="javascript:void(0)" title=""><i class="la la-bookmark"></i></a></li>
                                                    <li><a href="javascript:void(0)" title=""><i class="la la-envelope"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="job_descp">
                                                <h3>Senior Wordpress Developer</h3>
                                                <ul class="job-dt">
                                                    <li><a href="javascript:void(0)" title="">Full Time</a></li>
                                                    <li><span>$30 / hr</span></li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="javascript:void(0)" title="">view more</a></p>
                                                <ul class="skill-tags">
                                                    <li><a href="javascript:void(0)" title="">HTML</a></li>
                                                    <li><a href="javascript:void(0)" title="">PHP</a></li>
                                                    <li><a href="javascript:void(0)" title="">CSS</a></li>
                                                    <li><a href="javascript:void(0)" title="">Javascript</a></li>
                                                    <li><a href="javascript:void(0)" title="">Wordpress</a></li>
                                                </ul>
                                            </div>
                                            <div class="job-status-bar">
                                                <ul class="like-com">
                                                    <li>
                                                        <a href="javascript:void(0)"><i class="la la-heart"></i> Like</a>
                                                        <img src="images/liked-img.png" alt="">
                                                        <span>25</span>
                                                    </li>
                                                    <li><a href="javascript:void(0)" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
                                                </ul>
                                                <a><i class="la la-eye"></i>Views 50</a>
                                            </div>
                                        </div><!--post-bar end-->

                                    </div><!--posts-section end-->
                                </div><!--product-feed-tab end-->
                                <div class="product-feed-tab" id="my-bids">
                                    <div class="posts-section">
                                        <div class="post-bar">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img src="http://via.placeholder.com/50x50" alt="">
                                                    <div class="usy-name">
                                                        <h3>John Doe</h3>
                                                        <span><img src="images/clock.png" alt="">3 min ago</span>
                                                    </div>
                                                </div>
                                                <div class="ed-opts">
                                                    <a href="javascript:void(0)" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                    <ul class="ed-options">
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
                                                    <li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
                                                    <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                                </ul>
                                                <ul class="bk-links">
                                                    <li><a href="javascript:void(0)" title=""><i class="la la-bookmark"></i></a></li>
                                                    <li><a href="javascript:void(0)" title=""><i class="la la-envelope"></i></a></li>
                                                    <li><a href="javascript:void(0)" title="" class="bid_now">Bid Now</a></li>
                                                </ul>
                                            </div>
                                            <div class="job_descp">
                                                <h3>Simple Classified Site</h3>
                                                <ul class="job-dt">
                                                    <li><span>$300 - $350</span></li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="javascript:void(0)" title="">view more</a></p>
                                                <ul class="skill-tags">
                                                    <li><a href="javascript:void(0)" title="">HTML</a></li>
                                                    <li><a href="javascript:void(0)" title="">PHP</a></li>
                                                    <li><a href="javascript:void(0)" title="">CSS</a></li>
                                                    <li><a href="javascript:void(0)" title="">Javascript</a></li>
                                                    <li><a href="javascript:void(0)" title="">Wordpress</a></li>
                                                    <li><a href="javascript:void(0)" title="">Photoshop</a></li>
                                                    <li><a href="javascript:void(0)" title="">Illustrator</a></li>
                                                    <li><a href="javascript:void(0)" title="">Corel Draw</a></li>
                                                </ul>
                                            </div>
                                            <div class="job-status-bar">
                                                <ul class="like-com">
                                                    <li>
                                                        <a href="javascript:void(0)"><i class="la la-heart"></i> Like</a>
                                                        <img src="images/liked-img.png" alt="">
                                                        <span>25</span>
                                                    </li>
                                                    <li><a href="javascript:void(0)" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
                                                </ul>
                                                <a><i class="la la-eye"></i>Views 50</a>
                                            </div>
                                        </div><!--post-bar end-->
                                        <div class="post-bar">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img src="http://via.placeholder.com/50x50" alt="">
                                                    <div class="usy-name">
                                                        <h3>John Doe</h3>
                                                        <span><img src="images/clock.png" alt="">3 min ago</span>
                                                    </div>
                                                </div>
                                                <div class="ed-opts">
                                                    <a href="javascript:void(0)" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                    <ul class="ed-options">
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
                                                    <li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
                                                    <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                                </ul>
                                                <ul class="bk-links">
                                                    <li><a href="javascript:void(0)" title=""><i class="la la-bookmark"></i></a></li>
                                                    <li><a href="javascript:void(0)" title=""><i class="la la-envelope"></i></a></li>
                                                    <li><a href="javascript:void(0)" title="" class="bid_now">Bid Now</a></li>
                                                </ul>
                                            </div>
                                            <div class="job_descp">
                                                <h3>Ios Shopping mobile app</h3>
                                                <ul class="job-dt">
                                                    <li><span>$300 - $350</span></li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="javascript:void(0)" title="">view more</a></p>
                                                <ul class="skill-tags">
                                                    <li><a href="javascript:void(0)" title="">HTML</a></li>
                                                    <li><a href="javascript:void(0)" title="">PHP</a></li>
                                                    <li><a href="javascript:void(0)" title="">CSS</a></li>
                                                    <li><a href="javascript:void(0)" title="">Javascript</a></li>
                                                    <li><a href="javascript:void(0)" title="">Wordpress</a></li>
                                                    <li><a href="javascript:void(0)" title="">Photoshop</a></li>
                                                    <li><a href="javascript:void(0)" title="">Illustrator</a></li>
                                                    <li><a href="javascript:void(0)" title="">Corel Draw</a></li>
                                                </ul>
                                            </div>
                                            <div class="job-status-bar">
                                                <ul class="like-com">
                                                    <li>
                                                        <a href="javascript:void(0)"><i class="la la-heart"></i> Like</a>
                                                        <img src="images/liked-img.png" alt="">
                                                        <span>25</span>
                                                    </li>
                                                    <li><a href="javascript:void(0)" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
                                                </ul>
                                                <a><i class="la la-eye"></i>Views 50</a>
                                            </div>
                                        </div><!--post-bar end-->
                                        <div class="post-bar">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img src="http://via.placeholder.com/50x50" alt="">
                                                    <div class="usy-name">
                                                        <h3>John Doe</h3>
                                                        <span><img src="images/clock.png" alt="">3 min ago</span>
                                                    </div>
                                                </div>
                                                <div class="ed-opts">
                                                    <a href="javascript:void(0)" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                    <ul class="ed-options">
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
                                                    <li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
                                                    <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                                </ul>
                                                <ul class="bk-links">
                                                    <li><a href="javascript:void(0)" title=""><i class="la la-bookmark"></i></a></li>
                                                    <li><a href="javascript:void(0)" title=""><i class="la la-envelope"></i></a></li>
                                                    <li><a href="javascript:void(0)" title="" class="bid_now">Bid Now</a></li>
                                                </ul>
                                            </div>
                                            <div class="job_descp">
                                                <h3>Simple Classified Site</h3>
                                                <ul class="job-dt">
                                                    <li><span>$300 - $350</span></li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="javascript:void(0)" title="">view more</a></p>
                                                <ul class="skill-tags">
                                                    <li><a href="javascript:void(0)" title="">HTML</a></li>
                                                    <li><a href="javascript:void(0)" title="">PHP</a></li>
                                                    <li><a href="javascript:void(0)" title="">CSS</a></li>
                                                    <li><a href="javascript:void(0)" title="">Javascript</a></li>
                                                    <li><a href="javascript:void(0)" title="">Wordpress</a></li>
                                                    <li><a href="javascript:void(0)" title="">Photoshop</a></li>
                                                    <li><a href="javascript:void(0)" title="">Illustrator</a></li>
                                                    <li><a href="javascript:void(0)" title="">Corel Draw</a></li>
                                                </ul>
                                            </div>
                                            <div class="job-status-bar">
                                                <ul class="like-com">
                                                    <li>
                                                        <a href="javascript:void(0)"><i class="la la-heart"></i> Like</a>
                                                        <img src="images/liked-img.png" alt="">
                                                        <span>25</span>
                                                    </li>
                                                    <li><a href="javascript:void(0)" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
                                                </ul>
                                                <a><i class="la la-eye"></i>Views 50</a>
                                            </div>
                                        </div><!--post-bar end-->
                                        <div class="post-bar">
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img src="http://via.placeholder.com/50x50" alt="">
                                                    <div class="usy-name">
                                                        <h3>John Doe</h3>
                                                        <span><img src="images/clock.png" alt="">3 min ago</span>
                                                    </div>
                                                </div>
                                                <div class="ed-opts">
                                                    <a href="javascript:void(0)" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                    <ul class="ed-options">
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
                                                    <li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
                                                    <li><img src="images/icon9.png" alt=""><span>India</span></li>
                                                </ul>
                                                <ul class="bk-links">
                                                    <li><a href="javascript:void(0)" title=""><i class="la la-bookmark"></i></a></li>
                                                    <li><a href="javascript:void(0)" title=""><i class="la la-envelope"></i></a></li>
                                                    <li><a href="javascript:void(0)" title="" class="bid_now">Bid Now</a></li>
                                                </ul>
                                            </div>
                                            <div class="job_descp">
                                                <h3>Ios Shopping mobile app</h3>
                                                <ul class="job-dt">
                                                    <li><span>$300 - $350</span></li>
                                                </ul>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="javascript:void(0)" title="">view more</a></p>
                                                <ul class="skill-tags">
                                                    <li><a href="javascript:void(0)" title="">HTML</a></li>
                                                    <li><a href="javascript:void(0)" title="">PHP</a></li>
                                                    <li><a href="javascript:void(0)" title="">CSS</a></li>
                                                    <li><a href="javascript:void(0)" title="">Javascript</a></li>
                                                    <li><a href="javascript:void(0)" title="">Wordpress</a></li>
                                                    <li><a href="javascript:void(0)" title="">Photoshop</a></li>
                                                    <li><a href="javascript:void(0)" title="">Illustrator</a></li>
                                                    <li><a href="javascript:void(0)" title="">Corel Draw</a></li>
                                                </ul>
                                            </div>
                                            <div class="job-status-bar">
                                                <ul class="like-com">
                                                    <li>
                                                        <a href="javascript:void(0)"><i class="la la-heart"></i> Like</a>
                                                        <img src="images/liked-img.png" alt="">
                                                        <span>25</span>
                                                    </li>
                                                    <li><a href="javascript:void(0)" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
                                                </ul>
                                                <a><i class="la la-eye"></i>Views 50</a>
                                            </div>
                                        </div><!--post-bar end-->
                                        <div class="process-comm">
                                            <a href="javascript:void(0)" title=""><img src="images/process-icon.png" alt=""></a>
                                        </div><!--process-comm end-->
                                    </div><!--posts-section end-->
                                </div><!--product-feed-tab end-->
                                <div class="product-feed-tab" id="portfolio-dd">
                                    <div class="portfolio-gallery-sec">
                                        <h3>Portfolio</h3>
                                        <div class="gallery_pf">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="http://via.placeholder.com/271x174" alt="">
                                                        <a href="javascript:void(0)" title=""><img src="images/all-out.png" alt=""></a>
                                                    </div><!--gallery_pt end-->
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="http://via.placeholder.com/170x170" alt="">
                                                        <a href="javascript:void(0)" title=""><img src="images/all-out.png" alt=""></a>
                                                    </div><!--gallery_pt end-->
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="http://via.placeholder.com/170x170" alt="">
                                                        <a href="javascript:void(0)" title=""><img src="images/all-out.png" alt=""></a>
                                                    </div><!--gallery_pt end-->
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="http://via.placeholder.com/170x170" alt="">
                                                        <a href="javascript:void(0)" title=""><img src="images/all-out.png" alt=""></a>
                                                    </div><!--gallery_pt end-->
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="http://via.placeholder.com/170x170" alt="">
                                                        <a href="javascript:void(0)" title=""><img src="images/all-out.png" alt=""></a>
                                                    </div><!--gallery_pt end-->
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="http://via.placeholder.com/170x170" alt="">
                                                        <a href="javascript:void(0)" title=""><img src="images/all-out.png" alt=""></a>
                                                    </div><!--gallery_pt end-->
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="http://via.placeholder.com/170x170" alt="">
                                                        <a href="javascript:void(0)" title=""><img src="images/all-out.png" alt=""></a>
                                                    </div><!--gallery_pt end-->
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="http://via.placeholder.com/170x170" alt="">
                                                        <a href="javascript:void(0)" title=""><img src="images/all-out.png" alt=""></a>
                                                    </div><!--gallery_pt end-->
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="http://via.placeholder.com/170x170" alt="">
                                                        <a href="javascript:void(0)" title=""><img src="images/all-out.png" alt=""></a>
                                                    </div><!--gallery_pt end-->
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                                    <div class="gallery_pt">
                                                        <img src="http://via.placeholder.com/170x170" alt="">
                                                        <a href="javascript:void(0)" title=""><img src="images/all-out.png" alt=""></a>
                                                    </div><!--gallery_pt end-->
                                                </div>
                                            </div>
                                        </div><!--gallery_pf end-->
                                    </div><!--portfolio-gallery-sec end-->
                                </div><!--product-feed-tab end-->
                                <div class="product-feed-tab" id="payment-dd">
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
                                    <div class="pf-gallery">
                                        <ul>
                                            <li><a href="javascript:void(0)" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="javascript:void(0)" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="javascript:void(0)" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="javascript:void(0)" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="javascript:void(0)" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="javascript:void(0)" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="javascript:void(0)" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="javascript:void(0)" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="javascript:void(0)" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="javascript:void(0)" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="javascript:void(0)" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                            <li><a href="javascript:void(0)" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        </ul>
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
                image:'',
                backimg:'',
                showbackimg:true,
                showimg:true,
            }
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

            getProfilePhoto() {
                if(this.image != '' && this.image != null){
                    return this.image;
                }else{
                    return  'http://via.placeholder.com/170x170'
                }
            },
            UploadImg:function(e){
                this.$Progress.start()
                let file = e.target.files[0];
                let reader = new FileReader();
                if(file['type']==='image/jpeg' || file['type']==='image/png'){
                    if(file['size'] < 2111775){
                        reader.onloadend = (file) =>{
                            console.log(reader.result)
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
                this.$Progress.start()
                let file = e.target.files[0];
                let reader = new FileReader();
                if(file['type']==='image/jpeg' || file['type']==='image/png'){
                    if(file['size'] < 2111775){
                        reader.onloadend = (file) =>{
                            console.log(reader.result)
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
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created() {
            this.$Progress.start()
            axios.get('api/Profile').then(({data}) => {this.user = data.data})
            this.$Progress.finish()
        }
    }
</script>

