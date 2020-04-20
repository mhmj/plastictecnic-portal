<template>
    <div style="margin-bottom: 10px">
        <form method="post">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 text-left">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="text-primary muted"><h5>Personal Information</h5></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Staff No</label>
                                            <input disabled class="form-control" v-model="staff.staff_no">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Username</label>
                                            <input disabled class="form-control" v-model="staff.username">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Full Name</label>
                                            <input disabled class="form-control" v-model="staff.full_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Email</label>
                                            <input disabled class="form-control" v-model="staff.email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Phone No</label>
                                            <input disabled class="form-control" v-model="staff.telephone_no">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Contact No</label>
                                            <input disabled class="form-control" v-model="staff.phone_no">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 text-left">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="text-primary muted"><h5>Work Information</h5></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Designation</label>
                                            <input disabled class="form-control" v-model="staff.designation_id.name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Department</label>
                                            <input disabled class="form-control" v-model="staff.department_id.name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Company</label>
                                            <input disabled class="form-control" v-model="staff.company_id.name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top" >
                    <div class="col-6">
                        <div class="form-group form-group-default">
                        </div>
                    </div>
                    <div class="col-6" style="margin-top: 10px">
                        <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                            <a @click="$parent.toggleEdit()" class="btn btn-default text-white" >Close</a>
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
                ListDepartment:[],
                ListDesignation:[],
                ListCompany:[],
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

        }
    }
</script>