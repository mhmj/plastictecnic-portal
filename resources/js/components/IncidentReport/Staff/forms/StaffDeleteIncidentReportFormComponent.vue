<template>
    <div style="margin-bottom: 10px" class="text-left">
        <form method="post" @submit.prevent="deleteIncidentReport">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col">
                        <h5 class="text-danger text-center">Are you sure want to delete this report?</h5>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px">
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
                                        <div class="table-responsive text-left" style="margin-top: 10px">
                                            <table class="table">
                                                <tr>
                                                    <td>
                                                        <label class="muted">Incident Category</label>
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td class="fs-20" style="color: #007bff;">
                                                        <span>{{IncidentReport.incident_category}}</span><br>
                                                    </td>
                                                <tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <label class="muted">Incident Details</label>
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td class="fs-20" style="color: #007bff;">
                                                        <span>{{IncidentReport.description}}</span><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <label class="muted">Root Cause</label>
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td class="fs-20" style="color: #007bff;">
                                                        <span>{{IncidentReport.root_cause}}</span><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <label class="muted">Job Start</label>
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td class="fs-20" style="color: #007bff;">
                                                        <span>{{IncidentReport.job_start}}</span><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <label class="muted">Job Finish</label>
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td class="fs-20" style="color: #007bff;">
                                                        <span>{{IncidentReport.job_finish}}</span><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <label class="muted">Status</label>
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td class="fs-20" style="color: #007bff;">
                                                        <span>{{IncidentReport.status}}</span><br>
                                                    </td>
                                                </tr>
                                            </table>
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
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive text-left" style="margin-top: 10px">
                                                    <table class="table">
                                                        <tr>
                                                            <td>
                                                                <label class="muted">Computer Name</label>
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
                                            <label class="muted">
                                                <h5 class="text-primary">Handle By</h5>
                                            </label>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive text-left" style="margin-top: 10px">
                                                    <div v-if="this.IncidentReport.handle_by === null  ">
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
                                                            <tr>
                                                                <td class="text-left">
                                                                    <label class="muted">Status</label>
                                                                </td>
                                                                <td>:</td>
                                                                <td class="fs-20" style="color: #007bff;">
                                                                    <span>{{IncidentReport.status}}</span>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div v-if="this.IncidentReport.handle_by !== null  ">
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
                                                            <tr>
                                                                <td class="text-left">
                                                                    <label class="muted">Status</label>
                                                                </td>
                                                                <td>:</td>
                                                                <td class="fs-20" style="color: #007bff;">
                                                                    <span>{{IncidentReport.status}}</span>
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
                </div>
                <div class="row border-top" >
                    <div class="col-6">
                        <div class="form-group form-group-default"></div>
                    </div>
                    <div class="col-6" style="margin-top: 10px">
                        <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                            <button class="btn btn-danger" style="margin-right: 10px">Delete</button>
                            <a @click="$parent.toggleDelete()" class="btn btn-default text-white">Cancel</a>
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
            deleteIncidentReport(){
                this.$parent.toggleDelete();
                var url = '/api/v1/IncidentReport/'+ this.IncidentReport.id +'/delete-incident-report', method = 'delete';
                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    Event.$emit('updateIncidentReport');
                })
            },
        }
    }
</script>