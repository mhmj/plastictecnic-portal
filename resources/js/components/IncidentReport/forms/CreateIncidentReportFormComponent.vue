<template>
    <div style="margin-bottom: 10px">
        <form method="post" @submit.prevent="checkIncidentReport">
            <div class="col-lg-12">
                <div class="row" style="margin-bottom: 30px">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="muted text-primary"><h5>Incident Information</h5></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Incident Category</label>
                                            <span style="color: red">*</span>
                                            <div class="row" v-if="('category' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['category']}}</label>
                                                </div>
                                            </div>
                                            <select class="form-control"  :style="[this.IncidentReport.incident_category ?  {'border-color': 'green'} : {'border-color':'red'}]" v-model="IncidentReport.incident_category">
                                                <option v-bind:selected="IncidentReport.incident_category == 'Account Access'" value="Account Access">Account Access</option>
                                                <option v-bind:selected="IncidentReport.incident_category == 'Computer & Printer'" value="Computer & Printer">Computer & Printer</option>
                                                <option v-bind:selected="IncidentReport.incident_category == 'Email'" value="Email">Email</option>
                                                <option v-bind:selected="IncidentReport.incident_category == 'Network'" value="Network">Network</option>
                                                <option v-bind:selected="IncidentReport.incident_category == 'SAP'" value="SAP">SAP</option>
                                                <option v-bind:selected="IncidentReport.incident_category == 'Other'" value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Incident Detail</label>
                                            <input class="form-control" :style="[this.IncidentReport.description ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="IncidentReport.description">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Root Cause </label>
                                            <span style="color: red">*</span>
                                            <div class="row" v-if="('root_cause' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['root_cause']}}</label>
                                                </div>
                                            </div>
                                            <select class="form-control"  :style="[this.IncidentReport.root_cause ?  {'border-color': 'green'} : {'border-color':'red'}]" v-model="IncidentReport.root_cause">
                                                <option v-bind:selected="IncidentReport.root_cause == 'SW/HW/DB Configuration'" value="SW/HW/DB Configuration">SW/HW/DB Configuration</option>
                                                <option v-bind:selected="IncidentReport.root_cause == 'SW/HW/DB Bug'" value="SW/HW/DB Bug">SW/HW/DB Bug</option>
                                                <option v-bind:selected="IncidentReport.root_cause == 'User Negligence'" value="User Negligence">User Negligence</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Job Start</label>
                                            <input placeholder="DD/MM/YY" class="form-control" :style="[this.IncidentReport.job_start ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="IncidentReport.job_start">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Job Finish</label>
                                            <input placeholder="DD/MM/YY" class="form-control" :style="[this.IncidentReport.job_finish ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="IncidentReport.job_finish">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Location</label>
                                            <div class="row" v-if="('company_id' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['company_id']}}</label>
                                                </div>
                                            </div>
                                            <select class="form-control" v-on:change="getITAssetandStaff()"  :style="[this.company_id ?  {'border-color': 'green'} : {'border-color':'red'}]" v-model="company_id">
                                                <option value="1">Bangi Plant</option>
                                                <option value="2">Nilai Block A</option>
                                                <option value="3">Nilai Block B</option>
                                                <option value="4">GOODHART MILLIONS (Bangi Plant)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <label class="text-muted">
                                                <h5 class="text-primary">Asset Information</h5>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="muted">Asset</label>
                                            <span style="color: red">*</span>
                                            <div class="row" v-if="('asset' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['asset']}}</label>
                                                </div>
                                            </div>
                                            <div class="row" v-if="('notmatch' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['notmatch']}}</label>
                                                </div>
                                            </div>
                                            <select v-on:change="selectedITAsset()" class="form-control" :style="[this.IncidentReport.asset_id.id ?  {'border-color': 'green'} : {'border-color':'red'}]" v-model="IncidentReport.asset_id.id" >
                                                <option v-for="list in this.ListITAssetByLocation" :value="list.id" >{{ list.computer_name }} - {{ list.serial_no }}</option>
                                            </select>
                                            <div>
                                                <div class="table-responsive text-left" style="border-top: 1px grey solid; margin-top: 20px">
                                                    <table class="table">
                                                        <tr>
                                                            <td class="text-left">
                                                                <label class="muted">Name</label>
                                                            </td>
                                                            <td>:</td>
                                                            <td class="fs-20" style="color: #007bff;">
                                                                <span>{{IncidentReport.asset_id.computer_name}}</span>
                                                            </td>
                                                        <tr>
                                                        <tr>
                                                            <td class="text-left">
                                                                <label class="muted">Serial No</label>
                                                            </td>
                                                            <td>:</td>
                                                            <td class="fs-20" style="color: #007bff;">
                                                                <span>{{IncidentReport.asset_id.serial_no}}</span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <label class="text-muted">
                                                <h5 class="text-primary">Status</h5>
                                            </label>
                                        </div>
                                        <div>
                                            <div class="form-group form-group-default required">
                                                <select class="form-control" :style="[this.IncidentReport.status ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="IncidentReport.status">
                                                    <option v-bind:selected="IncidentReport.status == 'On Process'" value="On Process">On Process</option>
                                                    <option v-bind:selected="IncidentReport.status == 'Fixed'" value="Fixed">Fixed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group form-group-default required">
                                    <label class="muted" style="margin-top: 10px">
                                        <h5 class="text-primary">User Information</h5>
                                    </label>
                                </div>
                                <div>
                                    <label class="muted">Issue By</label>
                                    <span style="color: red">*</span>
                                    <div class="row" v-if="('issue_by' in errors)">
                                        <div class="col">
                                            <label class="text-danger">{{errors['issue_by']}}</label>
                                        </div>
                                    </div>
                                    <div class="row" v-if="('notmatch' in errors)">
                                        <div class="col">
                                            <label class="text-danger">{{errors['notmatch']}}</label>
                                        </div>
                                    </div>
                                    <select v-on:change="selectedStaff()" class="form-control" :style="[this.IncidentReport.staff_id.id ?  {'border-color': 'green'} : {'border-color':'red'}]" v-model="IncidentReport.staff_id.id" >
                                        <option v-for="list in this.ListStaffByLocation" :value="list.id" >{{ list.staff_no }} -{{ list.full_name }}</option>
                                    </select>
                                </div>
                                <div>
                                    <div class="table-responsive text-left" style="border-top: 1px grey solid; margin-top: 20px">
                                        <table class="table">
                                            <tr>
                                                <td class="text-left">
                                                    <label class="muted">Name</label>
                                                </td>
                                                <td>:</td>
                                                <td class="fs-20" style="color: #007bff;">
                                                    <span>{{IncidentReport.staff_id.full_name}}</span>
                                                </td>
                                            <tr>
                                            <tr>
                                                <td class="text-left">
                                                    <label class="muted">Department</label>
                                                </td>
                                                <td>:</td>
                                                <td class="fs-20" style="color: #007bff;">
                                                    <span>{{IncidentReport.staff_id.department_id.name}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">
                                                    <label class="muted">Designation</label>
                                                </td>
                                                <td>:</td>
                                                <td class="fs-20" style="color: #007bff;">
                                                    <span>{{IncidentReport.staff_id.designation_id.name}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">
                                                    <label class="muted">Email</label>
                                                </td>
                                                <td>:</td>
                                                <td class="fs-20" style="color: #007bff;">
                                                    <span>{{IncidentReport.staff_id.email}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">
                                                    <label class="muted">Contact</label>
                                                </td>
                                                <td>:</td>
                                                <td class="fs-20" style="color: #007bff;">
                                                    <span>{{IncidentReport.staff_id.telephone_no}}</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group form-group-default required">
                                    <label class="muted" style="margin-top: 10px">
                                        <h5 class="text-primary">IT Use </h5>
                                    </label>
                                </div>
                                <div>
                                    <label class="muted">Handle By</label>
                                    <span style="color: red">*</span>
                                    <div class="row" v-if="('handle_by' in errors)">
                                        <div class="col">
                                            <label class="text-danger">{{errors['handle_by']}}</label>
                                        </div>
                                    </div>
                                    <select v-on:change="selectedHandleBy()" class="form-control" :style="[this.IncidentReport.handle_by.id ?  {'border-color': 'green'} : {'border-color':'red'}]" v-model="IncidentReport.handle_by.id" >
                                        <option v-for="list in this.ListITStaff" :value="list.id" >{{ list.staff_no }} -{{ list.full_name }}</option>
                                    </select>
                                </div>
                                <div>
                                    <div class="table-responsive text-left" style="border-top: 1px grey solid; margin-top: 20px">
                                        <table class="table">
                                            <tr>
                                                <td class="text-left">
                                                    <label class="muted">Name</label>
                                                </td>
                                                <td>:</td>
                                                <td class="fs-20" style="color: #007bff;">
                                                    <span>{{IncidentReport.handle_by.full_name}}</span>
                                                </td>
                                            <tr>
                                            <tr>
                                                <td class="text-left">
                                                    <label class="muted">Designation</label>
                                                </td>
                                                <td>:</td>
                                                <td class="fs-20" style="color: #007bff;">
                                                    <span>{{IncidentReport.handle_by.designation_id.name}}</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top" >
                    <div class="col-6">
                        <div class="form-group form-group-default"></div>
                    </div>
                    <div class="col-6" style="margin-top: 10px">
                        <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                            <button type="submit" class="btn btn-primary" style="margin-right: 20px">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    export default {
        props: {
            'id1': {
                type: String,
                required: true
            },
        },
        data(){
            return{
                errors: [],
                company_id:'',
                ListITStaff:[],
                ListStaffByLocation:[],
                ListITAssetByLocation:[],

                ListStaff:[],
                ListITAsset:[],
                IncidentReport: {
                    id:'',
                    asset_id:{
                        id:'',
                        computer_name: '',
                        serial_no: '',
                    },
                    staff_id:{
                        id:'',
                        full_name: '',
                        username: '',
                        email: '',
                        staff_no:'',
                        telephone_no:'',
                        phone_no:'',
                        company_id:{
                            id:'',
                            name:'',
                            location: '',
                            base: '',
                        },
                        designation_id:{
                            id:'',
                            name:'',
                        },
                        department_id:{
                            id:'',
                            name:'',
                        },
                    },
                    handle_by:{
                        id:'',
                        full_name: '',
                        username: '',
                        email: '',
                        staff_no:'',
                        telephone_no:'',
                        phone_no:'',
                        company_id:{
                            id:'',
                            name:'',
                            location: '',
                            base: '',
                        },
                        designation_id:{
                            id:'',
                            name:'',
                        },
                        department_id:{
                            id:'',
                            name:'',
                        },
                    },
                    company:{
                        id: '',
                        name:'',
                        location:'',
                        base:'',
                    },
                    asset_category_id:{
                        id:'',
                        name:'',
                    },
                    root_cause:'',
                    incident_category:'',
                    job_start:'',
                    job_finish: '',
                    description: '',
                    image: '',
                    rate: '',
                    status: '',
                    created_at: '',

                },
            }
        },
        mounted(){

        },
        created() {
            this.getStaff();
            this.getITStaff();
        },
        methods: {
            getITAssetandStaff(){
                this.getStaffByLocation();
                this.getITAssetByLocation();
            },
            getITAssetByLocation(){
                axios.get('/api/v1/getITAssetByLocation/'+ this.company_id)
                    .then(function (response) {
                        this.ListITAssetByLocation = response.data;
                    }.bind(this));
            },
            getStaffByLocation(){
                axios.get('/api/v1/getStaffByLocation/'+ this.company_id)
                    .then(function (response) {
                        this.ListStaffByLocation = response.data;
                    }.bind(this));
            },
            getITStaff(){
                axios.get('/api/v1/getITStaff/3')
                    .then(function (response) {
                        this.ListITStaff = response.data;
                    }.bind(this));
            },
            getStaff(){

                axios.get('/api/v1/getStaff')
                    .then(function (response) {
                        this.ListStaff = response.data;
                    }.bind(this));
            },
            async selectedStaff(){

                let vm = this
                fetch('/api/v1/getStaffDetails/'+ this.IncidentReport.staff_id.id).then(response => response.json())
                    .then(response => {
                        vm.IncidentReport.staff_id = response.data;
                        this.IncidentReport.staff_id = vm.IncidentReport.staff_id;
                    });
            },
            async selectedHandleBy(){

                let vm = this
                fetch('/api/v1/getStaffDetails/'+ this.IncidentReport.handle_by.id).then(response => response.json())
                    .then(response => {
                        vm.IncidentReport.handle_by = response.data;
                        this.IncidentReport.handle_by = vm.IncidentReport.handle_by;
                    });
            },

            async selectedITAsset(){

                let vm = this
                fetch('/api/v1/getITAssetDetails/'+ this.IncidentReport.asset_id.id).then(response => response.json())
                    .then(response => {
                        vm.IncidentReport.asset_id = response.data;
                        this.IncidentReport.asset_id = vm.IncidentReport.asset_id;
                    });
            },

            checkIncidentReport(){
                this.errors = [];
                if(this.IncidentReport.incident_category && this.IncidentReport.root_cause && this.IncidentReport.asset_id.id && this.IncidentReport.staff_id.id && this.IncidentReport.handle_by.id )
                {
                    $("#IncidentReportModal").modal('hide');
                    this.createIncidentReport();

                }

                if(!this.IncidentReport.incident_category)
                {
                    this.errors['category'] = "Choose the Incident Category"
                }
                if(!this.IncidentReport.root_cause)
                {
                    this.errors['root_cause'] = "Choose the Root Cause"
                }
                if(!this.IncidentReport.asset_id.id)
                {
                    this.errors['asset'] = "Choose the Asset"
                }
                if(!this.IncidentReport.staff_id.id)
                {
                    this.errors['issue_by'] = "Choose the Staff"
                }
                if(!this.IncidentReport.handle_by.id)
                {
                    this.errors['handle_by'] = "Choose the Staff"
                }
                if(!this.company_id)
                {
                    this.errors['company_id'] = "Choose the location"
                }
                if(this.IncidentReport.asset_id.company.id !== this.IncidentReport.staff_id.company_id.id)
                {
                    console.log("yep not match")
                    this.errors['notmatch'] = "The information not match between asset and staff"
                }
            },
            createIncidentReport() {

                var url = '/api/v1/IncidentReport/create-incident-report', method = 'post';

                fetch(url, {
                    method: method,
                    body: JSON.stringify({
                        asset_id: this.IncidentReport.asset_id.id,
                        staff_id: this.IncidentReport.staff_id.id,
                        handle_by: this.IncidentReport.handle_by.id,
                        confirm_by: this.IncidentReport.staff_id.id,
                        company_id: this.IncidentReport.asset_id.company.id,
                        root_cause: this.IncidentReport.root_cause,
                        incident_category: this.IncidentReport.incident_category,
                        job_start: this.IncidentReport.job_start,
                        job_finish: this.IncidentReport.job_finish,
                        description: this.IncidentReport.description,
                        image: this.IncidentReport.image,
                        rate: this.IncidentReport.rate,
                        status: this.IncidentReport.status,
                    }),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    this.clearForm();
                    Event.$emit('updateIncidentReport');

                })
            },
            clearForm(){
                this.IncidentReport = {
                    id:'',
                        asset_id:{
                        id:'',
                            computer_name: '',
                            serial_no: '',
                    },
                    staff_id:{
                        id:'',
                            full_name: '',
                            username: '',
                            email: '',
                            staff_no:'',
                            telephone_no:'',
                            phone_no:'',
                            company_id:{
                            id:'',
                                name:'',
                                location: '',
                                base: '',
                        },
                        designation_id:{
                            id:'',
                                name:'',
                        },
                        department_id:{
                            id:'',
                                name:'',
                        },
                    },
                    handle_by:{
                        id:'',
                            full_name: '',
                            username: '',
                            email: '',
                            staff_no:'',
                            telephone_no:'',
                            phone_no:'',
                            company_id:{
                            id:'',
                                name:'',
                                location: '',
                                base: '',
                        },
                        designation_id:{
                            id:'',
                                name:'',
                        },
                        department_id:{
                            id:'',
                                name:'',
                        },
                    },
                    company:{
                        id: '',
                            name:'',
                            location:'',
                            base:'',
                    },
                    asset_category_id:{
                        id:'',
                            name:'',
                    },
                    root_cause:'',
                        incident_category:'',
                        job_start:'',
                        job_finish: '',
                        description: '',
                        image: '',
                        rate: '',
                        status: '',
                        created_at: '',

                }

            }

        }
    }
</script>