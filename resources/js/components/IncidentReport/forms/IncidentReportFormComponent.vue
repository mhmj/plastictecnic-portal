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
                                                <option v-for="list in this.$parent.$parent.ListITAsset" :value="list.id" >{{ list.computer_name }} - {{ list.serial_no }}</option>
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
                                                                <!--<span class="fs-20" style="font-size: 14px; color: #007bff; text-align: left" v-for="listAsset in this.$parent.$parent.ListITAsset" v-if="listAsset.id === IncidentReport.asset_id.id">-->
                                                                    <!--{{listAsset.computer_name}}-->
                                                                <!--</span>-->
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
                                                                <!--<span class="fs-20" style="font-size: 14px; color: #007bff; text-align: left" v-for="listAsset in this.$parent.$parent.ListITAsset" v-if="listAsset.id === IncidentReport.asset_id.id">-->
                                                                    <!--{{listAsset.serial_no}}-->
                                                                <!--</span>-->
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
                                    <select v-on:change="selectedStaff()" :style="[this.IncidentReport.staff_id.id ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" class="form-control" v-model="IncidentReport.staff_id.id" >
                                        <option v-for="list in this.$parent.$parent.ListStaff" :value="list.id" >{{ list.staff_no }} -{{ list.full_name }}</option>
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
                                                    <!--<span class="fs-20" style="font-size: 14px; color: #007bff; text-align: left" v-for="listStaff in this.$parent.$parent.ListStaff" v-if="listStaff.id === IncidentReport.staff_id.id">-->
                                                        <!--{{listStaff.full_name}} <br> {{listStaff.staff_no}}-->
                                                    <!--</span>-->

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
                                    <label class="muted">Handle By</label>
                                    <select v-on:change="selectedHandleBy()" :style="[this.IncidentReport.handle_by.id ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" class="form-control" v-model="IncidentReport.handle_by.id" >
                                        <option v-for="list in this.$parent.$parent.ListStaff" :value="list.id" >{{ list.staff_no }} -{{ list.full_name }}</option>
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
                                                    <span>{{IncidentReport.handle_by.full_name}}</span>
                                                    <!--<span class="fs-20" style="font-size: 14px; color: #007bff; text-align: left" v-for="listStaff in this.$parent.$parent.ListStaff" v-if="listStaff.id === IncidentReport.handle_by.id">-->
                                                        <!--{{listStaff.full_name}} <br> {{listStaff.staff_no}}-->
                                                    <!--</span>-->

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
                            <a @click="$parent.toggleEdit()" class="btn btn-default" style="margin-right: 10px">Cancel</a>
                            <button class="btn btn-primary">Submit</button>
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
            },
            async selectedStaff(){

                let vm = this
                fetch('/api/v1/getStaffDetails/'+ this.IncidentReport.staff_id.id).then(response => response.json())
                    .then(response => {
                        vm.IncidentReport.staff_id = response.data;
                        this.IncidentReport.staff_id = vm.IncidentReport.staff_id;
                        //console.log(this.IncidentReport.staff_id);
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