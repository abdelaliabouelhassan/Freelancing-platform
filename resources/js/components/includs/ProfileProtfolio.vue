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
                            >
                            <div class="gallery_pt"  @click="index = imageIndex">
                            <img class="image" :src="image.path" alt="" >
                            <a href="javascript:void(0)" ><img src="images/all-out.png" alt=""></a>
                            </div>
                          <i   @click="deletepic(image)" class="fas fa-trash deletepic"></i>
                        </div>
                    <div v-if="images.length == 0">Add some of your works</div>
                </div>
            </div><!--gallery_pf end-->
        </div><!--portfolio-gallery-sec end-->
        <div class="col text-center">
            <button type="button" v-if="this.page < this.lastPage" @click="loadmore" class="btn btn-outline-info">Load More</button>
        </div>

    </div><!--product-feed-tab end-->

    <div class="overview-box" id="create-portfolio" v-bind:class="{open:showProf}">
        <div class="overview-edit">
            <h3>Create Portfolio</h3>
            <form @submit.prevent="addProt()">
                <div class="file-submit">
                    <input type="file" name="file" :class="{ 'is-invalid': form.errors.has('path') }" @change="UploadImg">
                    <has-error :form="form" field="path"></has-error>
                    <br>
                </div>
                <div class="pf-img">
                    <img :src="seeimageporf()" alt="" style="height: 100px;width: 100px">
                </div>
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
                images: [],
                index: null,
                lastPage: 0,
                page: 1,
            };
        },
        props:['Portfolio','showProf','overlay','form'],
        methods:{
            seeimageporf:function () {
                if(this.form.path != '' && this.form.path != null){
                    return this.form.path;
                }else{
                    return  'http://via.placeholder.com/60x60'
                }
            },
            addProt(){
                this.$Progress.start('8000')
                this.form.post('api/addProt')
                    .then(()=>{
                        this.$Progress.finish()
                        Toast.fire({
                            icon: 'success',
                            title: 'Portfolio Added Successfully'
                        })
                        something.$emit('loadport');
                        this.$emit('update:overlay', false)
                        this.$emit('update:showProf', false)
                    })
                    .catch(()=>{
                        this.$Progress.decrease(50)
                        this.$Progress.fail()
                    })
            },
            deletepic(image){
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
                        this.form.profId = image.id;
                        this.$Progress.start()
                        this.form.post('api/DeleteProt')
                            .then(()=> {
                                this.$Progress.finish()
                                Swal.fire(
                                    'Deleted!',
                                    'Your Experience has been deleted.',
                                    'success'
                                )
                                something.$emit('loadport');
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
            loadmore(){
                this.page++
                let vm = this;
                axios.get('api/getPortfolio?page='+this.page)
                    .then(response => {
                        return response.data;
                    }).then(data => {
                        setTimeout(function () {
                            $.each(data.data, function (key, value) {
                                vm.images.push(value);
                            });
                            Vue.nextTick(function () {
                                $('[data-toggle="tooltip"]').tooltip();
                            });
                        }.bind(this), 0);


                });

            },
            loadImage(){
                let vm = this;
                axios.get('api/getPortfolio').then(({data}) => {
                    this.images = data.data
                    vm.lastPage = data.meta.last_page

                })
            },
            UploadImg(e){
                this.$Progress.start()
                let file = e.target.files[0];
                let reader = new FileReader();
                if(file['type']==='image/jpeg' || file['type']==='image/png'){
                    if(file['size'] < 2111775){
                        reader.onloadend = (file) =>{
                            this.form.path = reader.result
                            this.$Progress.finish()
                            this.isready = true
                        }
                        reader.readAsDataURL(file)
                    }else{
                        this.$emit('update:overlay', false)
                        this.$emit('update:showProf', false)
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Image Size Is Big Then 2MB',
                            'error'

                        )
                        this.$Progress.decrease(20)
                        this.$Progress.fail()
                        this.isready = false
                    }
                }else{
                    this.$emit('update:overlay', false)
                    this.$emit('update:showProf', false)
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'This File Is Not Image',
                        'error'

                    )
                    this.$Progress.decrease(20)
                    this.$Progress.fail()
                    this.isready = false
                }
            },

        },
        created() {
                this.loadImage()
                something.$on('loadport',()=>{
                    this.loadImage();
                })


        }


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
    .deletepic{
      cursor:pointer;
    }
</style>
