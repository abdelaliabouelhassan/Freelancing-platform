<template>

    <div class="overview-box" id="overview-box" v-bind:class="{open:css_class}">
        <div class="overview-edit">
            <h3>{{$t('message.Overview')}}</h3>
            <span>5000 character left</span>
            <form @submit.prevent="CreateOverView()">
                <textarea v-model="form.overview" :class="{ 'is-invalid': form.errors.has('overview') }"></textarea>
                <has-error :form="form" field="overview"></has-error>
                <br>
                <button type="submit" class="save">{{$t('message.Save')}}</button>
                <a  style="color: #000000;font-size: 16px;border: 1px solid #e5e5e5; padding: 10px 25px;display: inline-block;background-color: #fff;font-weight: 600;cursor: pointer;" @click="$emit('update:css_class', false);$emit('update:overlay', false)"  >{{$t('message.Cancel')}}</a>
            </form>
            <a href="javascript:void(0)" title="" class="close-box"><i class="la la-close" @click="$emit('update:css_class', false);$emit('update:overlay', false)"></i></a>
        </div><!--overview-edit end-->
    </div>
</template>

<script>
    export default {
        data () {
            return {
                // Create a new form instance


            }
        },
        props:['css_class','overlay','form'],
        methods:{
            CreateOverView(){
                this.$Progress.start()
                    this.form.put('api/overview')
                        .then(()=>{
                            this.$Progress.finish()
                            Toast.fire({
                                icon: 'success',
                                title: 'OverView Created Successfully'
                            })
                            something.$emit('wherecreateuserloaddate');
                            this.$emit('update:overlay', false)
                            this.$emit('update:css_class', false)
                        })
                        .catch(()=>{
                            this.$Progress.decrease(20)
                            this.$Progress.fail()
                        })

            },
        }
    }
</script>
