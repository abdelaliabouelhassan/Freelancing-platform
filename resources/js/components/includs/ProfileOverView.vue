<template>
    <form @submit.prevent="CreateOverView()">
    <div class="overview-box" id="overview-box" v-bind:class="{open:css_class}">
        <div class="overview-edit">
            <h3>Overview</h3>
            <span>5000 character left</span>
            <form>
                <textarea v-model="form.text" :class="{ 'is-invalid': form.errors.has('text') }"></textarea>
                <has-error :form="form" field="text"></has-error>
                <button type="submit" class="save">Save</button>
                <a  class="btn btn-secondary" @click="$emit('update:css_class', false);$emit('update:overlay', false)"  >Cancel</a>
            </form>
            <a href="javascript:void(0)" title="" class="close-box"><i class="la la-close" @click="$emit('update:css_class', false);$emit('update:overlay', false)"></i></a>
        </div><!--overview-edit end-->
    </div>
    </form>
</template>

<script>
    export default {
        data () {
            return {
                // Create a new form instance
                form: new Form({
                    text: '',
                })

            }
        },
        props:['css_class','overlay'],
        methods:{
            CreateOverView(){
                this.$Progress.start()
                    this.$Progress.start()
                    this.form.post('api/test')
                        .then(()=>{
                            this.$Progress.finish()
                            Toast.fire({
                                icon: 'success',
                                title: 'OverView Created Successfully'
                            })
                            something.$emit('wherecreateuserloaddate');
                        })
                        .catch(()=>{
                            this.$Progress.decrease(20)
                            this.$Progress.fail()
                        })

            },
        }
    }
</script>
