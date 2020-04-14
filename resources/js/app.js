/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Event = new Vue();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

/////////// Lists //////////////////
/////////// Elements ///////////////
/////////// Forms //////////////////

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);



/////////////////////////////////// Common Component /////////////////////////////////////////////

Vue.component('pagination-component',require('./components/Common/PaginationComponent.vue').default);
Vue.component('loading-component', require('./components/Common/LoadingComponent.vue').default);
Vue.component('profile-component', require('./components/Common/ProfileComponent.vue').default);




/////////////////////////////////// Login Component /////////////////////////////////////////////

Vue.component('login-component', require('./components/auth/LoginComponent.vue').default);
Vue.component('slider-component', require('./components/auth/SliderComponent.vue').default);





/////////////////////////////////// IT Asset Component //////////////////////////////////////////

                            /////////// Lists //////////////////

Vue.component('list-it-asset-component', require('./components/ITAsset/lists/ListITAssetComponent.vue').default);
Vue.component('list-it-asset-location-component', require('./components/ITAsset/lists/ListITAssetLocationComponent.vue').default);
Vue.component('list-staff-it-asset-location-component', require('./components/ITAsset/Staff/lists/StaffListITAssetComponent.vue').default);

                            /////////// Elements ///////////////

Vue.component('it-asset-element-component', require('./components/ITAsset/elements/ITAssetComponent.vue').default);
Vue.component('staff-it-asset-element-component', require('./components/ITAsset/Staff/elements/StaffITAssetComponent.vue').default);

                            /////////// Forms //////////////////

Vue.component('it-asset-form-component', require('./components/ITAsset/forms/ITAssetFormComponent.vue').default);
Vue.component('staff-it-asset-form-component', require('./components/ITAsset/Staff/forms/StaffITAssetFormComponent.vue').default);


Vue.component('create-it-asset-form-component', require('./components/ITAsset/forms/CreateITAssetFormComponent.vue').default);
Vue.component('delete-it-asset-form-component', require('./components/ITAsset/forms/DeleteITAssetFormComponent.vue').default);
Vue.component('assign-it-asset-form-component', require('./components/ITAsset/forms/AssignITAssetFormComponent.vue').default);




/////////////////////////////////// Staff Component //////////////////////////////////////////

                            /////////// Lists //////////////////

Vue.component('list-staff-component', require('./components/Staff/lists/ListStaffComponent.vue').default);
Vue.component('list-staff-location-component', require('./components/Staff/lists/ListStaffLocationComponent.vue').default);

                            /////////// Elements ///////////////

Vue.component('staff-element-component', require('./components/Staff/elements/StaffComponent.vue').default);

                            /////////// Forms //////////////////

Vue.component('staff-form-component', require('./components/Staff/forms/StaffFormComponent.vue').default);
Vue.component('create-staff-form-component', require('./components/Staff/forms/CreateStaffFormComponent.vue').default);
Vue.component('delete-staff-form-component', require('./components/Staff/forms/DeleteStaffFormComponent.vue').default);





/////////////////////////////////// Incident Report Component //////////////////////////////////////////

                            /////////// Lists //////////////////

Vue.component('list-incident-report-location-component', require('./components/IncidentReport/lists/ListIncidentReportLocationComponent.vue').default);
Vue.component('staff-list-incident-report-component', require('./components/IncidentReport/Staff/lists/StaffListIncidentReportComponent.vue').default);

                            /////////// Elements ///////////////

Vue.component('incident-report-element-component', require('./components/IncidentReport/elements/IncidentReportComponent.vue').default);
Vue.component('staff-incident-report-element-component', require('./components/IncidentReport/Staff/elements/StaffIncidentReportComponent.vue').default);

                            /////////// Forms //////////////////

Vue.component('incident-report-form-component', require('./components/IncidentReport/forms/IncidentReportFormComponent.vue').default);
Vue.component('staff-incident-report-form-component', require('./components/IncidentReport/Staff/forms/StaffIncidentReportFormComponent.vue').default);
Vue.component('user-information-form-component', require('./components/IncidentReport/forms/UserInformationFormComponent.vue').default);
Vue.component('create-incident-report-form-component', require('./components/IncidentReport/forms/CreateIncidentReportFormComponent.vue').default);
Vue.component('staff-create-incident-report-form-component', require('./components/IncidentReport/Staff/forms/StaffCreateIncidentReportFormComponent.vue').default);
Vue.component('delete-incident-report-form-component', require('./components/IncidentReport/forms/DeleteIncidentReportFormComponent.vue').default);
Vue.component('staff-delete-incident-report-form-component', require('./components/IncidentReport/Staff/forms/StaffDeleteIncidentReportFormComponent.vue').default);






/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


