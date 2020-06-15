<template>
    <div class="overview-box" id="location-box" v-bind:class="{open:css_class}">
        <div class="overview-edit">
            <h3>{{$t('message.Location')}}</h3>
            <form @submit.prevent="addLoacl()">
                <div class="datefm">
                    <select v-model="form.City" :class="{ 'is-invalid': form.errors.has('City') }">
                        <option value="0">City</option>
                        <option v-for="citys in city" :value="citys.id">{{citys.city_name}}</option>
                    </select>
                    <i class="fa fa-map-marker"></i>
                    <has-error :form="form" field="City"></has-error>
                    <br>
                </div>
                <button type="submit" class="save">{{$t('message.Save')}}</button>
                <a  style="color: #000000;font-size: 16px;border: 1px solid #e5e5e5; padding: 10px 25px;display: inline-block;background-color: #fff;font-weight: 600;cursor: pointer;" @click="$emit('update:css_class', false);$emit('update:overlay', false)"  >{{$t('message.Cancel')}}</a>
            </form>
            <a href="javascript:void(0)" title="" class="close-box"><i class="la la-close" @click="$emit('update:css_class', false);$emit('update:overlay', false)"></i></a>
        </div><!--overview-edit end-->
    </div>
</template>

<script>
    export default {
        props:['css_class','overlay','type','form'],
        data(){
            return {
                city: {},
                cit: '0',
            }
        },
        methods:{
            addLoacl(){
                this.$Progress.start()
                this.form.post('api/addLocation')
                    .then(()=>{
                        this.$Progress.finish()
                        Toast.fire({
                            icon: 'success',
                            title: this.$t('message.cityadd')
                        })
                        something.$emit('loadLoac');
                        this.$emit('update:overlay', false)
                        this.$emit('update:css_class', false)
                    })
                    .catch(()=>{
                        this.$Progress.decrease(20)
                        this.$Progress.fail()
                    })
            },
            LoadCity: function () {
                axios.get('api/city').then(({data}) => {
                    this.city = data.data
                })
            }
        },
        created() {
            this.LoadCity()
        },
    }
</script>

<style scoped>

</style>
