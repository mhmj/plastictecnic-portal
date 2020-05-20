<template>
    <div style="margin-bottom: 10px" class="text-left">
        <form method="post" @submit.prevent="checkIncidentReport" enctype="multipart/form-data">
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
                                        <div class="form-group form-group-default required" data-provides="fileinput">
                                            <label class="muted">Incident File</label>
                                        </div>
                                        <div class=" fileinput fileinput-new text-left" >
                                        <div>
                                            <span class="form-control">
                                                <input type="file" v-on:change="onFileChange"/>
                                            </span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!--<div class="row">-->
                                    <!--<div class="col-lg-12">-->
                                        <!--<div class="form-group form-group-default required">-->
                                            <!--<label class="muted">Root Cause </label>-->
                                            <!--<span style="color: red">*</span>-->
                                            <!--<div class="row" v-if="('root_cause' in errors)">-->
                                                <!--<div class="col">-->
                                                    <!--<label class="text-danger">{{errors['root_cause']}}</label>-->
                                                <!--</div>-->
                                            <!--</div>-->
                                            <!--<select class="form-control"  :style="[this.IncidentReport.root_cause ?  {'border-color': 'green'} : {'border-color':'red'}]" v-model="IncidentReport.root_cause">-->
                                                <!--<option v-bind:selected="IncidentReport.root_cause == 'SW/HW/DB Configuration'" value="SW/HW/DB Configuration">SW/HW/DB Configuration</option>-->
                                                <!--<option v-bind:selected="IncidentReport.root_cause == 'SW/HW/DB Bug'" value="SW/HW/DB Bug">SW/HW/DB Bug</option>-->
                                                <!--<option v-bind:selected="IncidentReport.root_cause == 'User Negligence'" value="User Negligence">User Negligence</option>-->
                                            <!--</select>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</div>-->
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
                    </div>
                </div>
                <div class="row border-top" >
                    <div class="col-6">
                        <div class="form-group form-group-default"></div>
                    </div>
                    <div class="col-6" style="margin-top: 10px">
                        <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                            <button type="submit" class="btn btn-primary" style="margin-right: 20px">Submit</button>
                            <button type="button" class="btn btn-secondary" @click="this.$parent.isCreatingButton" >Close</button>
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
            'companyID': {
                type: String,
                required: true
            },
            'staffID': {
                type: String,
                required: true
            }
        },
        data(){
            return{
                errors: [],
                company_id: this.companyID,
                ListITAssetByLocation:[],
                file:'',
                incident_report_image:'',
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
            this.getITAssetByLocation();
            this.selectedStaff();
        },
        methods: {
            onFileChange(e){
                this.file = e.target.files[0];
            },
            getITAssetByLocation(){
                axios.get('/api/v1/getITAssetByLocation/'+ this.company_id)
                    .then(function (response) {
                        this.ListITAssetByLocation = response.data;
                    }.bind(this));
            },

            selectedStaff(){

                let vm = this
                fetch('/api/v1/getStaffDetails/'+ this.staffID).then(response => response.json())
                    .then(response => {
                        vm.IncidentReport.staff_id = response.data;
                        this.IncidentReport.staff_id = vm.IncidentReport.staff_id;
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
                if(this.IncidentReport.incident_category && this.IncidentReport.asset_id.id)
                {
                    this.createIncidentReport();

                }

                if(!this.IncidentReport.incident_category)
                {
                    this.errors['category'] = "Choose the Incident Category"
                }
                if(!this.IncidentReport.asset_id.id)
                {
                    this.errors['asset'] = "Choose the Asset"
                }

            },
            createIncidentReport() {
                this.$parent.isCreatingButton();
                var url = '/api/v1/IncidentReport/create-incident-report', method = 'post';

                let currentObj = this;
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();
                formData.append("asset_id", this.IncidentReport.asset_id.id);
                formData.append("staff_id", this.IncidentReport.staff_id.id);
                formData.append("handle_by",  this.IncidentReport.handle_by.id);
                formData.append("confirm_by", this.IncidentReport.staff_id.id);
                formData.append("company_id", this.IncidentReport.asset_id.company.id);
                formData.append("root_cause", this.IncidentReport.root_cause);
                formData.append("incident_category", this.IncidentReport.incident_category);
                formData.append("job_start", this.IncidentReport.job_start);
                formData.append("job_finish", this.IncidentReport.job_finish);
                formData.append("description", this.IncidentReport.description);
                formData.append("file", this.file);
                formData.append("rate",this.IncidentReport.rate);
                formData.append("status", "-");


                axios.post('/api/v1/IncidentReport/create-incident-report', formData, config)
                    .then(function (response) {
                        Event.$emit('updateIncidentReport');
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });


//                fetch(url, {
//                    method: method,
//                    body: JSON.stringify({
//                        asset_id: this.IncidentReport.staff_id.id,
//                        staff_id: this.IncidentReport.staff_id.id,
//                        handle_by: this.IncidentReport.handle_by.id,
//                        confirm_by: this.IncidentReport.staff_id.id,
//                        company_id: this.IncidentReport.asset_id.company.id,
//                        root_cause: this.IncidentReport.root_cause,
//                        incident_category: this.IncidentReport.incident_category,
//                        job_start: this.IncidentReport.job_start,
//                        job_finish: this.IncidentReport.job_finish,
//                        description: this.IncidentReport.description,
//                        image: this.IncidentReport.image,
//                        rate: this.IncidentReport.rate,
//                        status: "Received",
//                    }),
//                    headers: {
//                        'content-type': 'application/json'
//                    }
//                }).then((response) => {
//                    //this.clearForm();
//                    Event.$emit('updateIncidentReport');
//
//                })
            },
        }
    }
</script>