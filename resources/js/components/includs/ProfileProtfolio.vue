<template>
    <div>
    <div class="product-feed-tab" id="portfolio-dd" v-bind:class="{current:Portfolio}">
        <div class="portfolio-gallery-sec">
            <h3 @click="$emit('update:showProf', true);$emit('update:overlay', true)"><a href="javascript:void(0)">Portfolio <i class="fa fa-plus-square"></i></a></h3>
            <div class="gallery_pf">
                <div class="row">

                    <VGallery :images="images" :index="index" @close="index = null"></VGallery>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6"
                             v-for="(image, imageIndex) in images"
                             :key="imageIndex"
                             @click="index = imageIndex">
                            <div class="gallery_pt">
                            <img class="image" :src="image" alt="" >
                            <a href="javascript:void(0)" ><img src="images/all-out.png" alt=""></a>
                            </div>
                        </div>


                </div>
            </div><!--gallery_pf end-->
        </div><!--portfolio-gallery-sec end-->
    </div><!--product-feed-tab end-->

    <div class="overview-box" id="create-portfolio" v-bind:class="{open:showProf}">
        <div class="overview-edit">
            <h3>Create Portfolio</h3>
            <form>
                <input type="text" name="pf-name" placeholder="Portfolio Name">
                <div class="file-submit">
                    <input type="file" name="file">
                </div>
                <div class="pf-img">
                    <img src="http://via.placeholder.com/60x60" alt="">
                </div>
                <input type="text" name="website-url" placeholder="htp://www.example.com">
                <button type="submit" class="save">Save</button>
                <a  style="color: #000000;font-size: 16px;border: 1px solid #e5e5e5; padding: 10px 25px;display: inline-block;background-color: #fff;font-weight: 600;cursor: pointer;" @click="$emit('update:showProf', false);$emit('update:overlay', false)"  >Cancel</a>
            </form>
            <a href="javascript:void(0)" title="" class="close-box"><i class="la la-close" @click="$emit('update:showProf', false);$emit('update:overlay', false)"></i></a>
        </div><!--overview-edit end-->
    </div>

    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                images: [
                    'https://dummyimage.com/800/ffffff/000000',
                    'https://dummyimage.com/1600/ffffff/000000',
                    'https://dummyimage.com/1280/000000/ffffff',
                    'https://dummyimage.com/400/000000/ffffff',
                ],
                index: null
            };
        },
        props:['Portfolio','showProf','overlay'],

    }
</script>

<style scoped>
    .image {
        float: left;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        border: 1px solid #ebebeb;
        margin: 5px;
    }
</style>
