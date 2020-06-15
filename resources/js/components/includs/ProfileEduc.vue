<template>
    <div class="overview-box" id="education-box" v-bind:class="{open:css_class}">
        <div class="overview-edit">
            <h3>{{$t('message.Education')}}</h3>
            <form @submit.prevent="addEduc()">
                <input type="text" name="school" placeholder="School / University" v-model="form.school":class="{ 'is-invalid': form.errors.has('school') }">
                <has-error :form="form" field="school"></has-error>
                <br>
                <div class="datepicky">
                    <div class="row">
                        <div class="col-lg-6 no-left-pd">
                            <div class="datefm">
                                <i class="fa fa-calendar"></i>
                                <datetime v-model="form.from" placeholder="To"   :class="{ 'is-invalid': form.errors.has('from') }"></datetime>
                                <has-error :form="form" field="from"></has-error>
                                <br>
                            </div>
                        </div>
                        <div class="col-lg-6 no-righ-pd">
                            <div class="datefm">
                                <i class="fa fa-calendar"></i>
                                <datetime v-model="form.to" placeholder="To"   :class="{ 'is-invalid': form.errors.has('to') }"></datetime>
                                <has-error :form="form" field="to"></has-error>
                                <br>
                            </div>

                        </div>
                    </div>
                </div>
                <textarea placeholder="Description" v-model="form.Description":class="{ 'is-invalid': form.errors.has('Description') }"></textarea>
                <has-error :form="form" field="Description"></has-error>
                <br>
                <button type="submit" class="save">{{$t('message.Save')}}</button>
                <button v-if="!type" type="submit" class="save-add" @click="saveandadd = true">{{$t('message.saveAndADD')}}</button>
                <a style="color: #000000;font-size: 16px;border: 1px solid #e5e5e5; padding: 10px 25px;display: inline-block;background-color: #fff;font-weight: 600;cursor: pointer;"  @click="$emit('update:css_class', false);$emit('update:overlay', false);$emit('update:type', false);form.errors.clear()">{{$t('message.Cancel')}}</a>
            </form>
            <a href="javascript:void(0)" title="" class="close-box" @click="$emit('update:css_class', false);$emit('update:overlay', false);$emit('update:type', false);form.errors.clear()"><i class="la la-close"></i></a>
        </div><!--overview-edit end-->

<!--        calin-->
        <div class="flatpickr-calendar hasTime animate arrowTop" v-bind:class="{open:from}" tabindex="-1" style="top: 183px;left: 14.5px;right: auto;"><div class="flatpickr-month"><span class="flatpickr-prev-month" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path></svg></span><span class="flatpickr-current-month"><span class="cur-month" title="Scroll to increment">May </span><div class="numInputWrapper"><input class="numInput cur-year" type="text" pattern="\d*" title="Scroll to increment"><span class="arrowUp"></span><span class="arrowDown"></span></div></span><span class="flatpickr-next-month" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"></path></svg></span></div><div class="flatpickr-innerContainer"><div class="flatpickr-rContainer"><div class="flatpickr-weekdays">
		<span class="flatpickr-weekday">
			Sun</span><span class="flatpickr-weekday">Mon</span><span class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span class="flatpickr-weekday">Sat
		</span>
        </div><div class="flatpickr-days" tabindex="-1"><div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="April 26, 2020" tabindex="-1">26</span><span class="flatpickr-day prevMonthDay" aria-label="April 27, 2020" tabindex="-1">27</span><span class="flatpickr-day prevMonthDay" aria-label="April 28, 2020" tabindex="-1">28</span><span class="flatpickr-day prevMonthDay" aria-label="April 29, 2020" tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="April 30, 2020" tabindex="-1">30</span><span class="flatpickr-day " aria-label="May 1, 2020" tabindex="-1">1</span><span class="flatpickr-day " aria-label="May 2, 2020" tabindex="-1">2</span><span class="flatpickr-day " aria-label="May 3, 2020" tabindex="-1">3</span><span class="flatpickr-day " aria-label="May 4, 2020" tabindex="-1">4</span><span class="flatpickr-day " aria-label="May 5, 2020" tabindex="-1">5</span><span class="flatpickr-day " aria-label="May 6, 2020" tabindex="-1">6</span><span class="flatpickr-day " aria-label="May 7, 2020" tabindex="-1">7</span><span class="flatpickr-day " aria-label="May 8, 2020" tabindex="-1">8</span><span class="flatpickr-day " aria-label="May 9, 2020" tabindex="-1">9</span><span class="flatpickr-day " aria-label="May 10, 2020" tabindex="-1">10</span><span class="flatpickr-day " aria-label="May 11, 2020" tabindex="-1">11</span><span class="flatpickr-day " aria-label="May 12, 2020" tabindex="-1">12</span><span class="flatpickr-day " aria-label="May 13, 2020" tabindex="-1">13</span><span class="flatpickr-day " aria-label="May 14, 2020" tabindex="-1">14</span><span class="flatpickr-day " aria-label="May 15, 2020" tabindex="-1">15</span><span class="flatpickr-day " aria-label="May 16, 2020" tabindex="-1">16</span><span class="flatpickr-day " aria-label="May 17, 2020" tabindex="-1">17</span><span class="flatpickr-day " aria-label="May 18, 2020" tabindex="-1">18</span><span class="flatpickr-day " aria-label="May 19, 2020" tabindex="-1">19</span><span class="flatpickr-day " aria-label="May 20, 2020" tabindex="-1">20</span><span class="flatpickr-day " aria-label="May 21, 2020" tabindex="-1">21</span><span class="flatpickr-day " aria-label="May 22, 2020" tabindex="-1">22</span><span class="flatpickr-day " aria-label="May 23, 2020" tabindex="-1">23</span><span class="flatpickr-day " aria-label="May 24, 2020" tabindex="-1">24</span><span class="flatpickr-day today" aria-label="May 25, 2020" tabindex="-1">25</span><span class="flatpickr-day " aria-label="May 26, 2020" tabindex="-1">26</span><span class="flatpickr-day " aria-label="May 27, 2020" tabindex="-1">27</span><span class="flatpickr-day " aria-label="May 28, 2020" tabindex="-1">28</span><span class="flatpickr-day " aria-label="May 29, 2020" tabindex="-1">29</span><span class="flatpickr-day " aria-label="May 30, 2020" tabindex="-1">30</span><span class="flatpickr-day " aria-label="May 31, 2020" tabindex="-1">31</span><span class="flatpickr-day nextMonthDay" aria-label="June 1, 2020" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay" aria-label="June 2, 2020" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay" aria-label="June 3, 2020" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay" aria-label="June 4, 2020" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay" aria-label="June 5, 2020" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay" aria-label="June 6, 2020" tabindex="-1">6</span></div></div></div></div><div class="flatpickr-time" tabindex="-1"><div class="numInputWrapper"><input class="numInput flatpickr-hour" type="text" pattern="\d*" tabindex="-1" step="1" min="1" max="12" title="Scroll to increment"><span class="arrowUp"></span><span class="arrowDown"></span></div><span class="flatpickr-time-separator">:</span><div class="numInputWrapper"><input class="numInput flatpickr-minute" type="text" pattern="\d*" tabindex="-1" step="5" min="0" max="59" title="Scroll to increment"><span class="arrowUp"></span><span class="arrowDown"></span></div><span class="flatpickr-am-pm" title="Click to toggle" tabindex="-1">PM</span></div></div>
<!--    calin 2-->
        <div class="flatpickr-calendar hasTime animate arrowTop" v-bind:class="{open:to}" tabindex="-1" style="top: 183px; left: 283.5px; right: auto;"><div class="flatpickr-month"><span class="flatpickr-prev-month" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path></svg></span><span class="flatpickr-current-month"><span class="cur-month" title="Scroll to increment">May </span><div class="numInputWrapper"><input class="numInput cur-year" type="text" pattern="\d*" title="Scroll to increment"><span class="arrowUp"></span><span class="arrowDown"></span></div></span><span class="flatpickr-next-month" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"></path></svg></span></div><div class="flatpickr-innerContainer"><div class="flatpickr-rContainer"><div class="flatpickr-weekdays">
		<span class="flatpickr-weekday">
			Sun</span><span class="flatpickr-weekday">Mon</span><span class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span class="flatpickr-weekday">Sat
		</span>
        </div><div class="flatpickr-days" tabindex="-1"><div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="April 26, 2020" tabindex="-1">26</span><span class="flatpickr-day prevMonthDay" aria-label="April 27, 2020" tabindex="-1">27</span><span class="flatpickr-day prevMonthDay" aria-label="April 28, 2020" tabindex="-1">28</span><span class="flatpickr-day prevMonthDay" aria-label="April 29, 2020" tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="April 30, 2020" tabindex="-1">30</span><span class="flatpickr-day " aria-label="May 1, 2020" tabindex="-1">1</span><span class="flatpickr-day " aria-label="May 2, 2020" tabindex="-1">2</span><span class="flatpickr-day " aria-label="May 3, 2020" tabindex="-1">3</span><span class="flatpickr-day " aria-label="May 4, 2020" tabindex="-1">4</span><span class="flatpickr-day " aria-label="May 5, 2020" tabindex="-1">5</span><span class="flatpickr-day " aria-label="May 6, 2020" tabindex="-1">6</span><span class="flatpickr-day " aria-label="May 7, 2020" tabindex="-1">7</span><span class="flatpickr-day " aria-label="May 8, 2020" tabindex="-1">8</span><span class="flatpickr-day " aria-label="May 9, 2020" tabindex="-1">9</span><span class="flatpickr-day " aria-label="May 10, 2020" tabindex="-1">10</span><span class="flatpickr-day " aria-label="May 11, 2020" tabindex="-1">11</span><span class="flatpickr-day " aria-label="May 12, 2020" tabindex="-1">12</span><span class="flatpickr-day " aria-label="May 13, 2020" tabindex="-1">13</span><span class="flatpickr-day " aria-label="May 14, 2020" tabindex="-1">14</span><span class="flatpickr-day " aria-label="May 15, 2020" tabindex="-1">15</span><span class="flatpickr-day " aria-label="May 16, 2020" tabindex="-1">16</span><span class="flatpickr-day " aria-label="May 17, 2020" tabindex="-1">17</span><span class="flatpickr-day " aria-label="May 18, 2020" tabindex="-1">18</span><span class="flatpickr-day " aria-label="May 19, 2020" tabindex="-1">19</span><span class="flatpickr-day " aria-label="May 20, 2020" tabindex="-1">20</span><span class="flatpickr-day " aria-label="May 21, 2020" tabindex="-1">21</span><span class="flatpickr-day " aria-label="May 22, 2020" tabindex="-1">22</span><span class="flatpickr-day " aria-label="May 23, 2020" tabindex="-1">23</span><span class="flatpickr-day " aria-label="May 24, 2020" tabindex="-1">24</span><span class="flatpickr-day today" aria-label="May 25, 2020" tabindex="-1">25</span><span class="flatpickr-day " aria-label="May 26, 2020" tabindex="-1">26</span><span class="flatpickr-day " aria-label="May 27, 2020" tabindex="-1">27</span><span class="flatpickr-day " aria-label="May 28, 2020" tabindex="-1">28</span><span class="flatpickr-day " aria-label="May 29, 2020" tabindex="-1">29</span><span class="flatpickr-day " aria-label="May 30, 2020" tabindex="-1">30</span><span class="flatpickr-day " aria-label="May 31, 2020" tabindex="-1">31</span><span class="flatpickr-day nextMonthDay" aria-label="June 1, 2020" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay" aria-label="June 2, 2020" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay" aria-label="June 3, 2020" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay" aria-label="June 4, 2020" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay" aria-label="June 5, 2020" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay" aria-label="June 6, 2020" tabindex="-1">6</span></div></div></div></div><div class="flatpickr-time" tabindex="-1"><div class="numInputWrapper"><input class="numInput flatpickr-hour" type="text" pattern="\d*" tabindex="-1" step="1" min="1" max="12" title="Scroll to increment"><span class="arrowUp"></span><span class="arrowDown"></span></div><span class="flatpickr-time-separator">:</span><div class="numInputWrapper"><input class="numInput flatpickr-minute" type="text" pattern="\d*" tabindex="-1" step="5" min="0" max="59" title="Scroll to increment"><span class="arrowUp"></span><span class="arrowDown"></span></div><span class="flatpickr-am-pm" title="Click to toggle" tabindex="-1">PM</span></div></div>
    </div>
</template>

<script>
    export default {
        props:['css_class','overlay','type','form'],
        data () {
            return {
                saveandadd:false,
                to:false,
                from:false
            }
        },
        methods:{
            addEduc(){
                this.$Progress.start()
                if (!this.type){
                    this.form.post('api/addEduc')
                        .then(()=>{
                            this.$Progress.finish()
                            Toast.fire({
                                icon: 'success',
                                title: this.$t('message.educadded')
                            })
                            something.$emit('loadEduc');
                            if(!this.saveandadd){
                                this.$emit('update:overlay', false)
                                this.$emit('update:css_class', false)
                            }else {
                                this.form.school = ''
                                this.form.from = ''
                                this.form.to = ''
                                this.form.Description = ''
                            }


                        })
                        .catch(()=>{
                            this.$Progress.decrease(20)
                            this.$Progress.fail()

                        })
                    this.form.errors.clear()

                }else{
                    this.$Progress.start()
                    this.form.post('api/UpdateEduc/')
                        .then(()=> {
                            this.$Progress.finish()
                            Toast.fire({
                                icon: 'success',
                                title: this.$t('message.educup')
                            })
                            something.$emit('loadEduc');
                            if(!this.saveandadd){
                                this.$emit('update:overlay', false)
                                this.$emit('update:css_class', false)
                                this.$emit('update:type', false)
                            }else {
                                this.form.school = ''
                                this.form.from = ''
                                this.form.to = ''
                                this.form.Description = ''
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

