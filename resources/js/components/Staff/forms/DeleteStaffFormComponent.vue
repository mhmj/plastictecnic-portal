<template>
    <div style="margin-bottom: 10px">
        <form method="post" @submit.prevent="deleteStaff">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 text-left">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="text-primary muted"><h5>Are you sure want to delete this record?</h5></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <div class="table-responsive text-left" style="margin-top: 10px">
                                                <table class="table" style="font-size: 15px;">
                                                    <tr >
                                                        <td class="text-left">
                                                            <label class="muted" style="color: black">Staff No</label>
                                                        </td>
                                                        <td>
                                                            :
                                                        </td>
                                                        <td class="fs-20" style="color: #007bff;">
                                                            <span>{{staff.staff_no}}</span>
                                                        </td>
                                                    <tr>
                                                    <tr>
                                                        <td class="text-left">
                                                            <label class="muted" style="color: black">Username</label>
                                                        </td>
                                                        <td>:</td>
                                                        <td class="fs-20" style="color: #007bff;">
                                                            <span>{{staff.username}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">
                                                            <label class="muted" style="color: black">Full Name</label>
                                                        </td>
                                                        <td>:</td>
                                                        <td class="fs-20" style="color: #007bff;">
                                                            <span>{{staff.full_name}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">
                                                            <label class="muted" style="color: black">Email</label>
                                                        </td>
                                                        <td>:</td>
                                                        <td class="fs-20" style="color: #007bff;">
                                                            <span>{{staff.email}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">
                                                            <label class="muted" style="color: black">Phone No</label>
                                                        </td>
                                                        <td>:</td>
                                                        <td class="fs-20" style="color: #007bff;">
                                                            <span>{{staff.phone}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">
                                                            <label class="muted" style="color: black">Contact No</label>
                                                        </td>
                                                        <td>:</td>
                                                        <td class="fs-20" style="color: #007bff;">
                                                            <span>{{staff.telephone_no}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">
                                                            <label class="muted" style="color: black">Designation</label>
                                                        </td>
                                                        <td>:</td>
                                                        <td class="fs-20" style="color: #007bff;">
                                                            <span>{{staff.designation_id.name}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">
                                                            <label class="muted" style="color: black">Department</label>
                                                        </td>
                                                        <td>:</td>
                                                        <td class="fs-20" style="color: #007bff;">
                                                            <span>{{staff.department_id.name}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">
                                                            <label class="muted" style="color: black">Company</label>
                                                        </td>
                                                        <td>:</td>
                                                        <td class="fs-20" style="color: #007bff;">
                                                            <span>{{staff.company_id.name}} {{staff.company_id.base}}</span>
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
                <div class="row border-top" style="margin-top: 10px" >
                    <div class="col-12" style=" margin-top: 10px; display: flex; justify-content: center">
                        <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                            <a @click="deleteStaff()" class="btn btn-danger text-white" style="margin-right: 20px">Submit</a>
                            <a @click="$parent.toggleDelete()" class="btn btn-default text-white" >Cancel</a>
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
                serverurl: '3.0.245.237',
                staff: {
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

            }
        },
        mounted(){

        },
        created() {
            if(this.data !== null){
                this.staff = this.data;
            }
        },
        methods: {

            deleteStaff(){
                this.$parent.toggleDelete();
                var url = '/api/v1/staff/'+ this.staff.id +'/delete-staff', method = 'delete';
                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    Event.$emit('updateStaffList');
                })
//                this.$parent.toggleDelete();
//                var url = 'http://'+ this.serverurl +'/api/v1/ITAsset/'+ this.asset.id +'/delete-it-asset', method = 'delete';
//                fetch(url, {
//                    method: method,
//                    body: JSON.stringify(),
//                    headers: {
//                        'content-type': 'application/json'
//                    }
//                }).then((response) => {
//                    //this.$parent.$parent.fetchITAsset();
//                    Event.$emit('updateITList');
//                })
            },
        }
    }
</script>