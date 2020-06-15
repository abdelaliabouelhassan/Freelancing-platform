<template>
    <div>
    <ul class="social_links">
        <li>   <h1>{{$t('message.websites')}}</h1>
            <br>
            <a href="javascript:void(0)" @click="$emit('update:css_class', true)"> <i class="fa fa-plus-square"></i>{{$t('message.addweb')}}</a>
        </li>
        <li v-for="urls in Url">
            <a target="_blank" :href="urls.url"  title="" class="url"><i :class="urls.icon"></i> {{urls.url}}</a>
            <a href="javascript:void(0)" class="text-center" @click="deleteUrl(urls)"><i class="fas fa-trash-alt"></i></a>
        </li>
    </ul>

    <div class="overview-box" id="create-portfolio" v-bind:class="{open:css_class}">
        <div class="overview-edit">
            <h3>Create Portfolio</h3>
            <form @submit.prevent="addurl()">

                    <input type="url" name="url" :class="{ 'is-invalid': form.errors.has('url') }" v-model="form.url" placeholder="www.example.com" >
                    <has-error :form="form" field="url"></has-error>
                    <br>

                <button type="submit" class="save">Save</button>
            </form>
            <a href="javascript:void(0)" title="" class="close-box"><i class="la la-close" @click="$emit('update:css_class', false);$emit('update:overlay', false)"></i></a>
        </div><!--overview-edit end-->
    </div>
    </div>
</template>

<script>
    export default {
        props:['css_class','overlay','form'],
        data: function () {
            return {
                Url:[],
            };
        },
        methods:{
            deleteUrl(url){
                Swal.fire({
                    title: this.$t('message.areyousure'),
                    text: this.$t('message.youcantback'),
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText:this.$t('message.Cancel'),
                    confirmButtonText: this.$t('message.yes')
                }).then((result) => {
                    if (result.value) {
                        this.form.url = url.url;
                        this.$Progress.start('8000')
                        this.form.post('api/DeleteUrl')
                            .then(()=> {
                                this.$Progress.finish()
                                Swal.fire(
                                    this.$t('message.Deleted'),
                                    this.$t('message.deleurl'),
                                    'success'
                                )
                                this.form.url = '';
                                something.$emit('loadurl');
                            })
                            .catch(()=> {
                                this.$Progress.decrease(20)
                                this.$Progress.fail()
                                Toast.fire({
                                    icon: 'error',
                                    title:  this.$t('message.error'),
                                })
                            });

                    }
                })
            },
            addurl(){
                this.$Progress.start('8000')
                this.form.post('api/AddUrl')
                    .then(()=>{
                        this.$Progress.finish()
                        Toast.fire({
                            icon: 'success',
                            title: this.$t('message.addedutl')
                        })
                        something.$emit('loadurl');
                        this.$emit('update:overlay', false)
                        this.$emit('update:css_class', false)
                        this.form.url = ''
                    })
                    .catch(()=>{
                        this.$Progress.decrease(50)
                        this.$Progress.fail()
                    })
            },
            loadUrl(){
                axios.get('api/getUrl').then(({data}) => {this.Url = data.data})
            }
        },
        created() {

                this.loadUrl()
                something.$on('loadurl',()=>{
                    this.loadUrl();
                })

        }
    }
</script>

<style scoped>
    .url{
        overflow-wrap: break-word;
    }

</style>
