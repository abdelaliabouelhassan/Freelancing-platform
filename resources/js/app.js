/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

/*includes */
import Gets from './Gets'
Vue.prototype.$gets = new Gets(window.user)
/*end includes*/
/*vue-infinite-loading  load more*/
Vue.use(require('vue-resource'));
Vue.component('InfiniteLoading', require('vue-infinite-loading'));

/*end vue-infinite-loading load more*/

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
/*vue router */
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
const routes = [
    { path: '/NotFound404', component: require('./components/404').default },
    { path: '/Jobs', component: require('./components/Job').default },
    { path: '/Projects', component: require('./components/Project').default },
    { path: '/Home', component: require('./components/Home').default },
    { path: '/', component: require('./components/Home').default, meta: {
            auth: true,
            title: 'Brikole'
        } },
    { path: '/Profile', component: require('./components/Profile').default },
    { path: '/Chat/:slug/:userslug', component: require('./components/Chat').default },
    { path: '/:username', component: require('./components/ShowUserProfile').default },


]
const router = new VueRouter({
    mode:'history',
    routes // short for `routes: routes`
})

/*end vue router */



/*moment */
import moment from  'moment'
Vue.filter('mydate',function (created) {
    return moment(created).format('YYYY');
});

/*end vue moment */



/** VueProgressBar */

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(99, 215, 255)',
    failedColor: 'red',
    height: '2px',
    thickness: '5px',
    transition: {
        speed: '1s',
        opacity: '1s',
        termination: 900
    },
})
/*end VueProgressBar*/

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('Message', require('./components/Message.vue').default);


/*  vform */
import { Form, HasError, AlertError } from 'vform';
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
/* vform end */


/*sweetalert2*/
import Swal from 'sweetalert2'
window.Swal = Swal
const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
})
window.swalWithBootstrapButtons = swalWithBootstrapButtons

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.Toast = Toast

/*End sweetalert2*/

window.something = new Vue();

/*Read More*/
import ReadMore from 'vue-read-more';
Vue.use(ReadMore);
/*End Read More*/


/*Datetime picker*/
import { Datetime } from 'vue-datetime'
// You need a specific loader for CSS files
import 'vue-datetime/dist/vue-datetime.css'
Vue.use(Datetime)
Vue.component('datetime', Datetime);

/*End Datetime picker*/
/*Image Gallery*/

import VueGallery from 'vue-gallery'
Vue.use(VueGallery)
Vue.component('VGallery', VueGallery)

/*End Image Gallery */

/*Multiple Language*/
import VueI18n from 'vue-i18n'
Vue.use(VueI18n)

const messages = {
    ar: {
        message: {
            Search:'بحث',
            Filters:'فِلْتَر',
            clearAll:'مسح جميع الفِلْتَرز',
            Availabilty:'التوفر',
            Available:'متاح',
            Done:'منجز',
            Job_Category:'تصنيف الوظيفة',
            Price:'السعر',
            Select_Price:'حدد السعر',
            Cities:'مدن',
            Select_City:'اختر مدينة',
            Select_a_job_Category:'حدد فئة الوظيفة',
            Select_a_Project_Category:"حدد فئة المشروع",
            Search_keywords:'كلمات البحث',
            Top_Jobs:'أفضل الوظائف',
            Most_Viewed_This_Week:'الأكثر مشاهدة هذا الأسبوع',
            Jobs:'وظائف',
            Messages:'الرسائل',
            Setting:'ضبط',
            Clear_all:'امسح الكل',
            View_All_Messsages:'عرض جميع الرسائل',
            Change_Image:"تغيير الصورة",
            Follow:"تابع",
            Hire:"توظيف",
            Followers:"متابعون",
            Following:"تتابع",
            Followings:"يتابع",
            People_Viewed_Profile:"الأشخاص شاهدوا الملف الشخصي",
            Message:"رسالة",
            Portfolio:"محفظة",
            Status:"الحالة",
            Feed:"خلاصتك",
            Info:"معلومات",
            Saved_Jobs:"الوظائف المحفوظة",
            My_Bids:"عطاءاتي",
            Payment:"دفع",
            Add_some_of_your_works:"أضف بعض أعمالك",
            Load_More:"تحميل المزيد",
            Create_Portfolio:"إنشاء محفظة",
            Save:"حفظ",
            Cancel:"إلغاء",
            areyousure:"هل أنت متأكد أنك تريد حذف هذا؟",
            youcantback:"لن تتمكن من التراجع عن هذا!",
            yes:"نعم ، احذفه!",
            Deleted:"تم الحذف",
            gooddelete:"تم حذف الصورة.",
            error:"هناك خطأ ما",
            Cancelled:"ألغيت",
            imgsize:"حجم الصورة أكبر من 2 ميجا بايت",
            notimg:"هذا الملف ليس صورة",
            backimg:"تم تحديث صورة الخلفية بنجاح",
            profileimg:"تم تحديث صورة الملف الشخصي بنجاح",
            Overview:"نظرة عامة",
            Experience:"خبرتك",
            saveAndADD:"حفظ وإضافة المزيد",
            exp:"تم إنشاء التجربة بنجاح",
            addexp:"أضف بعض الخبرة",
            expu:"تم تحديث التجربة بنجاح",
            expd:"تم حذف تجربتك.",
            edud:"تم حذف التعليم الخاص بك.",
            addeduc:"أضف تعليمك",
            bioadd:"تمت إضافة السيرة الذاتية بنجاح",
            youarenotlogedin:"لم يتم دخولك !!!",
            plselog:"يرجى تسجيل الدخول أولاً أو إنشاء حساب جديد",
            loghere:"تسجيل الدخول هنا أو إنشاء حساب",
            youcantdothis:"لا يمكنك فعل ذلك في ملفك الشخصي !!",
            youdonthaveany:"ليس لديك أي محفظة",
            Bid_Now:"مزايدة الآن",
            addlocal:"أضف موقعك",
            Location:"موقعك",
            workname:"أضف اسم عملك",
            View_More:"عرض المزيد",
            Education:"التعليم",
            cityadd:"تمت إضافة المدينة بنجاح",
            websites:"المواقع والروابط الاجتماعية",
            addweb:"أضف موقع ويب",
            deleurl:"تم حذف عنوان Url.",
            addedutl:"تمت إضافة عنوان Url بنجاح",
            educadded:"تم إنشاء التعليم بنجاح",
            educup:"تم تحديث التعليم بنجاح",
            youarenosingmsg:"أنت غير مسجل الدخول",
            singnow:"تسجيل الدخول الآن",
            Sign_up:"سجل",
            Suggestions:"اقتراحات",
            View_Profile:"عرض الصفحة الشخصية",
            project:"نشر مشروع",
            job:"أضف وظيفة",
            mostppl:"الأشخاص الأكثر مشاهدة",
            post:"بريكول",
            Project_Created_Successfully:"تم إنشاء المشروع بنجاح",
            Job_Created_Successfully:"تم إنشاء الوظيفة بنجاح",
            pleasecheck:"يرجى التحقق من ملف التحميل الخاص بك",
            unfollow:"الغاء المتابعة",
            Work_type_not_specified:"نوع العمل غير محدد",
            Overview_not_specified:"نظرة عامة غير محددة",
            Experience_not_specified:"الخبرة غير محددة",
            Education_not_specified:"التعليم غير محدد",
            Location_not_specified:"الموقع غير محدد",
            Empty_Portfolio:"محفظة فارغة"



        }
    },
    en: {
        message: {
            Search:'Search',
            Filters:'Filters',
            clearAll:'Clear all filters',
            Availabilty:'Availabilty',
            Available:'Available',
            Done:'Done',
            Job_Category:'Job Category',
            Price:'Price',
            Select_Price:'Select Price',
            Cities:'Cities',
            Select_City:'Select City',
            Select_a_job_Category:'Select a job Category',
            Select_a_Project_Category:"Select a Project Category",
            Search_keywords:'Search keywords',
            Top_Jobs:'Top Jobs',
            Most_Viewed_This_Week:'Most Viewed This Week',
            Jobs:'Jobs',
            Messages:'Messages',
            Setting:'Setting',
            Clear_all:'Clear all',
            View_All_Messsages:'View All Messsages',
            Change_Image:"Change Image",
            Follow:"Follow",
            Hire:"Hire",
            Followers:"Followers",
            Following:"Following",
            Followings:"Following",
            People_Viewed_Profile:"People Viewed Profile",
            Message:"Message",
            Portfolio:"Portfolio",
            Status:"Status",
            Feed:"Feed",
            Info:"Info",
            Saved_Jobs:"Saved Jobs",
            My_Bids:"My Bids",
            Payment:"Payment",
            Add_some_of_your_works:"Add some of your works",
            Load_More:"Load More",
            Create_Portfolio:"Create Portfolio",
            Save:"Save",
            Cancel:"Cancel",
            areyousure:"Are you sure You Wnat Delete This ?",
            youcantback:'You won\'t be able to revert this!',
            yes:"Yes, delete it!",
            Deleted:"Deleted!",
            gooddelete:"Your Image has been deleted.",
            error:"Something Went Wrong",
            Cancelled:"Cancelled",
            imgsize:"Image Size Is Bigger Than 2MB",
            notimg:"This File Is Not Image",
            backimg:"Background Image Updated Successfully",
            profileimg:"Profile Image Updated Successfully",
            Overview:"Overview",
            Experience:"Experience",
            saveAndADD:"Save & Add More",
            exp:"Experience  Created Successfully",
            expu:"Experience  Updated Successfully",
            expd:"Your Experience has been deleted.",
            edud:"Your Education has been deleted.",
            addeduc:"Add Your Education",
            bioadd:"Bio Added Successfully",
            youarenotlogedin:"You Are Not Logged In !!!",
            plselog:"Please Logged In first Or Create New Account",
            loghere:"Logged In here Or Create Account",
            youcantdothis:"You Can\'t Do This In Your Profile !!",
            youdonthaveany:"You Dont Have Any Portfolio",
            Bid_Now:"Bid Now",
            addlocal:"Add Your Location",
            Location:"Location",
            addexp:"Add Some Experience",
            workname:"Add Your Work Name",
            View_More:"View More",
            Education:"Education",
            cityadd:"City Added Successfully",
            websites:"Websites and Social Links",
            addweb:"Add a website",
            deleurl:"The  Url has been deleted.",
            addedutl:"Url Added Successfully",
            educadded:"Education Created Successfully",
            educup:"Education  Updated Successfully",
            youarenosingmsg:"You are Not Signed In",
            singnow:"Signed In Now",
            Sign_up:"Sign up",
            Suggestions:"Suggestions",
            View_Profile:"View Profile",
            project:"Post a Project",
            job:"Post a Job",
            mostppl:"Most Viewed People",
            post:"Brikole",
            Project_Created_Successfully:"Project Created Successfully",
            Job_Created_Successfully:"Job Created Successfully",
            pleasecheck:"Pleas Check You Upload File",
            unfollow:"unfollow",
            Work_type_not_specified:"Work type not specified",
            Overview_not_specified:"Overview not specified",
            Experience_not_specified:"Experience not specified",
            Education_not_specified:"Education not specified",
            Location_not_specified:"Location not specified",
            Empty_Portfolio:"Empty Portfolio"



















        }
    }
}

const i18n = new VueI18n({
    locale: Language, // set locale
    messages, // set locale messages
})
/*End Multiple Language*/

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    i18n,
    routes:[

    ]
});
