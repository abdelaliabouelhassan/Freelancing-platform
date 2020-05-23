<template>
    <div class="overview-box" id="experience-box" v-bind:class="{open:css_class}">
        <div class="overview-edit">
            <h3>Experience</h3>
            <form @submit.prevent="addExperience()">
                <input type="text" name="ExpTitle" placeholder="Subject"  v-model="form.ExpTitle":class="{ 'is-invalid': form.errors.has('ExpTitle') }">
                <has-error :form="form" field="ExpTitle"></has-error>
                <br>
                <textarea name="ExBody"  v-model="form.ExpBody" :class="{ 'is-invalid': form.errors.has('ExpBody') }"></textarea>
                <has-error :form="form" field="ExpBody"></has-error>
                <br>
                <button type="submit" class="save">Save</button>
                <button v-if="!type" type="submit" class="save-add" @click="saveandadd = true">Save &amp; Add More</button>
                <a style="color: #000000;font-size: 16px;border: 1px solid #e5e5e5; padding: 10px 25px;display: inline-block;background-color: #fff;font-weight: 600;cursor: pointer;"  @click="$emit('update:css_class', false);$emit('update:overlay', false);$emit('update:type', false);form.errors.clear()">Cancel</a>
            </form>
            <a href="javascript:void(0)" title="" class="close-box" @click="$emit('update:css_class', false);$emit('update:overlay', false);$emit('update:type', false);form.errors.clear()"><i class="la la-close"></i></a>
        </div><!--overview-edit end-->
    </div>
</template>

<script>
    export default {
       props:['css_class','overlay','form','type'],
        data () {
            return {
                saveandadd:false,
            }
        },
        methods:{
           addExperience(){
               this.$Progress.start()
               if (!this.type){
                   this.form.post('api/addExperience')
                       .then(()=>{
                           this.$Progress.finish()
                           Toast.fire({
                               icon: 'success',
                               title: 'Experience  Created Successfully'
                           })
                           something.$emit('loadExperience');
                           if(!this.saveandadd){
                               this.$emit('update:overlay', false)
                               this.$emit('update:css_class', false)
                           }else {
                               this.form.ExpBody = ''
                               this.form.ExpTitle = ''
                           }


                       })
                       .catch(()=>{
                           this.$Progress.decrease(20)
                           this.$Progress.fail()

                       })
                   this.form.errors.clear()

               }else{
                   this.$Progress.start()
                   this.form.post('api/UpdateExperience/')
                       .then(()=> {
                           this.$Progress.finish()
                           Toast.fire({
                               icon: 'success',
                               title: 'Experience  Updated Successfully'
                           })
                           something.$emit('loadExperience');
                           if(!this.saveandadd){
                               this.$emit('update:overlay', false)
                               this.$emit('update:css_class', false)
                               this.$emit('update:type', false)
                           }else {
                               this.form.ExpBody = ''
                               this.form.ExpTitle = ''
                           }
                       })
                       .catch(()=> {
                           this.$Progress.decrease(20)
                           this.$Progress.fail()

                       });
                   this.form.errors.clear()


               }

           }
        }
    }




</script>
