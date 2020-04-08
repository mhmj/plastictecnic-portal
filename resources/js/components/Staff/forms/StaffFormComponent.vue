<template>
    <div style="margin-bottom: 10px">
        <form method="post" @submit.prevent="updateStaff">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group form-group-default required">
                            <label class="muted">Staff No</label>
                            <input class="form-control" v-model="staff.staff_no">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group form-group-default required">
                            <label class="muted">Username</label>
                            <input class="form-control" v-model="staff.username">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group form-group-default required">
                            <label class="muted">Full Name</label>
                            <input class="form-control" v-model="staff.full_name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group form-group-default required">
                            <label class="muted">Company</label>
                            <select class="form-control" v-model="staff.company_id.id">
                                <option value="0" disabled>Select Company</option>
                                <option v-for="list in this.$parent.$parent.ListCompany" :value="list.id" v-bind:selected="list.id == staff.company_id.id">{{ list.name }} - {{ list.location }} ({{ list.base }})</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group form-group-default required">
                            <label class="muted">Department</label>
                            <select class="form-control" v-model="staff.department_id.id">
                                <option value="0" disabled>Select Department</option>
                                <option v-for="department in this.$parent.$parent.ListDepartment" :value="department.id" v-bind:selected="department.id == staff.department_id.id">{{ department.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group form-group-default required">
                            <label class="muted">Designation</label>
                            <select class="form-control" v-model="staff.designation_id.id">
                                <option value="0" disabled>Select Designation</option>
                                <option v-for="designation in this.$parent.$parent.ListDesignation" :value="designation.id" v-bind:selected="designation.id == staff.designation_id.id">{{ designation.name }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group form-group-default required">
                            <label class="muted">Email</label>
                            <input class="form-control" v-model="staff.email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group form-group-default required">
                            <label class="muted">Phone No</label>
                            <input class="form-control" v-model="staff.telephone_no">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group form-group-default required">
                            <label class="muted">Contact No</label>
                            <input class="form-control" v-model="staff.phone_no">
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
            updateStaff() {
                this.$parent.toggleEdit();

                var url = 'api/v1/staff/'+ this.staff.id +'/update-staff', method = 'post';

                fetch(url, {
                    method: method,
                    body: JSON.stringify({
                        full_name: this.staff.full_name,
                        username: this.staff.username,
                        email: this.staff.email,
                        staff_no: this.staff.staff_no,
                        telephone_no: this.staff.telephone_no,
                        phone_no: this.staff.phone_no,
                        company_id : this.staff.company_id.id,
                        department_id: this.staff.department_id.id,
                        designation_id: this.staff.designation_id.id,
                    }),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    Event.$emit('updateStaffList');
                })
            },
        }
    }
</script>