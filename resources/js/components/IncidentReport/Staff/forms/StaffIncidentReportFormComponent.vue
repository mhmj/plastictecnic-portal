<template>
    <div style="margin-bottom: 10px" class="text-left">
        <form method="post" @submit.prevent="updateIncidentReport">
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
                                            <div>
                                                <div class="table-responsive text-left">
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
                                        <div class="form-group form-group-default required">
                                            <label class="muted" style="margin-top: 10px">
                                                <h5 class="text-primary">Handle By</h5>
                                            </label>
                                        </div>
                                        <div>
                                            <div class="table-responsive text-left" >
                                                <div v-if="!this.IncidentReport.handle_by">
                                                    <table class="table">
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
                                                        <tr>
                                                            <td class="text-left">
                                                                <label class="muted">Contact No</label>
                                                            </td>
                                                            <td>:</td>
                                                            <td class="fs-20" style="color: #007bff;">
                                                                <span>-</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left">
                                                                <label class="muted">Job Start</label>
                                                            </td>
                                                            <td>:</td>
                                                            <td class="fs-20" style="color: #007bff;">
                                                                <span>-</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left">
                                                                <label class="muted">Job Finish</label>
                                                            </td>
                                                            <td>:</td>
                                                            <td class="fs-20" style="color: #007bff;">
                                                                <span>-</span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div v-if="this.IncidentReport.handle_by">
                                                    <table class="table">
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
                                                        <tr>
                                                            <td class="text-left">
                                                                <label class="muted">Contact No</label>
                                                            </td>
                                                            <td>:</td>
                                                            <td class="fs-20" style="color: #007bff;">
                                                                <span>{{IncidentReport.handle_by.phone_no}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left">
                                                                <label class="muted">Job Start</label>
                                                            </td>
                                                            <td>:</td>
                                                            <td class="fs-20" style="color: #007bff;">
                                                                <span>{{IncidentReport.job_start}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left">
                                                                <label class="muted">Job Finish</label>
                                                            </td>
                                                            <td>:</td>
                                                            <td class="fs-20" style="color: #007bff;">
                                                                <span>{{IncidentReport.job_finish}}</span>
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
                <div class="row">

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

        created() {
            if(this.data !== null){
                this.IncidentReport = this.data;
            }
        },
        methods: {
            updateIncidentReport(){
                this.$parent.toggleEdit();
                if(!this.IncidentReport.handle_by){
                    var url = '/api/v1/IncidentReport/'+ this.IncidentReport.id +'/update-incident-report', method = 'post';

                    fetch(url, {
                        method: method,
                        body: JSON.stringify({
                            asset_id: this.IncidentReport.asset_id.id,
                            staff_id: this.IncidentReport.staff_id.id,
                            //handle_by: this.IncidentReport.handle_by.id,
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
                        Event.$emit('updateIncidentReport');
                    })
                }
                else{
                    var url = '/api/v1/IncidentReport/'+ this.IncidentReport.id +'/update-incident-report', method = 'post';

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
                        Event.$emit('updateIncidentReport');
                    })
                }
            },
        }
    }
</script>