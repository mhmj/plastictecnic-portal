<template>
    <div style="margin-bottom: 10px" class="text-left">
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
                                            <label class="muted" style="text-align: left">Incident Category</label>
                                            <select class="form-control" :style="[this.IncidentReport.incident_category ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="IncidentReport.incident_category">
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
                                            <label class="muted">Root Cause</label>
                                            <select class="form-control" :style="[this.IncidentReport.root_cause ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="IncidentReport.root_cause">
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
                                <div class="row" v-if="this.IncidentReport.image">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group form-group-default required">
                                                    <label class="muted">Incident Image</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" v-if="this.previewImage === false && this.IncidentReport.image !=='null' ">
                                            <div class="col-md-4">
                                                <div class="card card-user">
                                                    <div class="image">
                                                        <a v-on:click="preview">
                                                            <img class="btn btn-outline-primary" style="padding: 10px; margin-bottom: 10px; width: 100% ;max-width: 100% ;height: 100% ; "  :src="image_source +  this.IncidentReport.image" >
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 10px" v-if="this.previewImage === true">
                                            <div class="col-lg-12">
                                                <div class="card" >
                                                    <div class="card-header">
                                                        <div style="display: flex;justify-content: flex-end; font-weight: bold; color: red">
                                                            <a class="btn btn-outline-primary"  v-on:click="preview">X</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-body" >
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <img style="height: 100%; width: 100%;"  :src="image_source +  this.IncidentReport.image" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" v-if="!this.IncidentReport.image">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Incident Image</label>
                                        </div>
                                        <div class=" fileinput fileinput-new text-left" >
                                            <div>
                                                <span class="form-control">
                                                     -
                                                </span>
                                            </div>
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
                                            <select v-on:change="selectedITAsset()" class="form-control" :style="[this.IncidentReport.asset_id.id ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="IncidentReport.asset_id.id" >
                                                <option v-for="list in this.ListITAssetByLocation" :value="list.id" >{{ list.computer_name }} - {{ list.serial_no }}</option>
                                            </select>
                                            <div>
                                                <div class="table-responsive text-left" style="border-top: 1px grey solid; margin-top: 20px">
                                                    <table class="table">
                                                        <tr>
                                                            <td class="text-left">
                                                                <label class="muted">Name</label>
                                                            </td>
                                                            <td>
                                                                :
                                                            </td>
                                                            <td class="fs-20" style="color: #007bff;">
                                                                <span>{{IncidentReport.asset_id.computer_name}}</span><br>
                                                            </td>
                                                        <tr>
                                                        <tr>
                                                            <td class="text-left">
                                                                <label class="muted">Serial No</label>
                                                            </td>
                                                            <td>
                                                                :
                                                            </td>
                                                            <td class="fs-20" style="color: #007bff;">
                                                                <span>{{IncidentReport.asset_id.serial_no}}</span><br>
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
                                                    <option v-bind:selected="IncidentReport.status == 'Received'" value="Received">Received</option>
                                                    <option v-bind:selected="IncidentReport.status == 'Pending 1'" value="Pending 1">Pending 1</option>
                                                    <option v-bind:selected="IncidentReport.status == 'Pending 2'" value="Pending 2">Pending 2</option>
                                                    <option v-bind:selected="IncidentReport.status == 'KIV'" value="KIV">KIV</option>
                                                    <option v-bind:selected="IncidentReport.status == 'Closed'" value="Closed">Closed</option>
                                                </select>
                                            </div>
                                            <div class="form-group form-group-default required" v-if="IncidentReport.status === 'Closed'">
                                                <label class="muted">Solution</label>
                                                <input class="form-control" :style="[this.IncidentReport.solution ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="IncidentReport.solution">
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
                                    <select v-on:change="selectedStaff()" :style="[this.IncidentReport.staff_id.id ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" class="form-control" v-model="IncidentReport.staff_id.id" >
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
                                                <td>
                                                    :
                                                </td>
                                                <td class="fs-20" style="color: #007bff;">
                                                    <span>{{IncidentReport.staff_id.full_name}}</span><br>
                                                    <span>{{IncidentReport.staff_id.staff_no}}</span>
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
                                        <h5 class="text-primary">IT Use</h5>
                                    </label>
                                </div>
                                <div>
                                    <div class="table-responsive text-left" >
                                        <div v-if="!this.IncidentReport.handle_by">
                                            <label class="muted">Handle By</label>
                                            <div class="row" v-if="('handle_by' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['handle_by']}}</label>
                                                </div>
                                            </div>
                                            <select v-on:change="selectedHandleByTemporary()" :style="[this.IncidentReport.handle_by === null ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" class="form-control" v-model="TemporaryHandleByID" >
                                                <option v-for="list in this.ListITStaff" :value="list.id" >{{ list.staff_no }} -{{ list.full_name }}</option>
                                            </select>
                                            <table class="table" style="border-top: 1px grey solid; margin-top: 20px">
                                                <tr>
                                                    <td class="text-left">
                                                        <label class="muted">Name</label>
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td class="fs-20" style="color: #007bff;">
                                                        <span>-</span>
                                                    </td>
                                                <tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <label class="muted">Designation</label>
                                                    </td>
                                                    <td>:</td>
                                                    <td class="fs-20" style="color: #007bff;">
                                                        <span>-</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div v-if="this.IncidentReport.handle_by">
                                            <label class="muted">Handle By</label>
                                            <div class="row" v-if="('handle_by' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['handle_by']}}</label>
                                                </div>
                                            </div>
                                            <select v-on:change="selectedHandleBy()" :style="[this.IncidentReport.handle_by.id ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" class="form-control" v-model="IncidentReport.handle_by.id" >
                                                <option v-for="list in this.ListITStaff" :value="list.id" >{{ list.staff_no }} -{{ list.full_name }}</option>
                                            </select>
                                            <table class="table" style="border-top: 1px grey solid; margin-top: 20px">
                                                <tr>
                                                    <td class="text-left">
                                                        <label class="muted">Name</label>
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
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
                </div>
                <div class="row border-top" >
                    <div class="col-6">
                        <div class="form-group form-group-default"></div>
                    </div>
                    <div class="col-6" style="margin-top: 10px">
                        <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                            <button class="btn btn-primary" style="margin-right: 10px">Submit</button>
                            <a @click="$parent.toggleEdit()" class="btn btn-default text-white">Cancel</a>
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
            'data': {
                type: Object,
            }
        },
        data(){
            return{
                errors: [],
                ListITStaff:[],
                ListStaffByLocation:[],
                ListITAssetByLocation:[],
                TemporaryHandleByID:'',
                image_source: 'storage/IncidentReport/',
                previewImage: false,
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
                    solution: '',
                    created_at: '',

                },

            }
        },

        created() {
            if(this.data !== null){
                this.IncidentReport = this.data;
            }
            this.getITAssetByLocation();
            this.getStaffByLocation();
            this.getITStaff();
        },
        methods: {
            preview(){
                this.previewImage = !this.previewImage;
            },
            getITAssetByLocation(){
                axios.get('/api/v1/getITAssetByLocation/'+ this.$parent.$parent.id1)
                    .then(function (response) {
                        this.ListITAssetByLocation = response.data;
                    }.bind(this));
            },
            getStaffByLocation(){
                axios.get('/api/v1/getStaffByLocation/'+ this.$parent.$parent.id1)
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
            checkIncidentReport(){
                this.errors = [];
                if(this.IncidentReport.handle_by)
                {
                    this.updateIncidentReport();

                }
                if(!this.IncidentReport.handle_by)
                {
                    this.errors['handle_by'] = "Choose the Staff"
                }

            },
            updateIncidentReport(){
                this.$parent.toggleEdit();

                let currentObj = this;
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();


                formData.append("asset_id", this.IncidentReport.asset_id.id);
                formData.append("staff_id", this.IncidentReport.staff_id.id);
                formData.append("handle_by", this.IncidentReport.handle_by.id);
                formData.append("confirm_by", this.IncidentReport.staff_id.id);
                formData.append("company_id", this.IncidentReport.asset_id.company.id);
                formData.append("root_cause", this.IncidentReport.root_cause);
                formData.append("incident_category", this.IncidentReport.incident_category);
                formData.append("job_start", this.IncidentReport.job_start);
                formData.append("job_finish", this.IncidentReport.job_finish);
                formData.append("description", this.IncidentReport.description);
                formData.append("file", this.IncidentReport.image);
                formData.append("rate",this.IncidentReport.rate);
                formData.append("status", this.IncidentReport.status);
                formData.append("solution", this.IncidentReport.solution);

                let vm= this;
                axios.post('/api/v1/IncidentReport/'+ this.IncidentReport.id +'/update-incident-report', formData, config)
                    .then(function (data) {
                        Event.$emit('updateIncidentReport');

                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });
            },
            async selectedStaff(){

                let vm = this
                fetch('/api/v1/getStaffDetails/'+ this.IncidentReport.staff_id.id).then(response => response.json())
                    .then(response => {
                        vm.IncidentReport.staff_id = response.data;
                        this.IncidentReport.staff_id = vm.IncidentReport.staff_id;
                    });
            },
            async selectedHandleByTemporary()
            {
                    let vm = this
                    fetch('/api/v1/getStaffDetails/'+ this.TemporaryHandleByID).then(response => response.json())
                        .then(response => {
                            vm.IncidentReport.handle_by = response.data;
                            this.IncidentReport.handle_by = vm.IncidentReport.handle_by;
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

        }
    }
</script>