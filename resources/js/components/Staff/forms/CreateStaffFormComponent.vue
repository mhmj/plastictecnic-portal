<template>
    <div style="margin-bottom: 10px">
        <form method="post" @submit.prevent="staffChecked">
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
                                <option v-for="list in this.ListCompany" :value="list.id" v-bind:selected="list.id == staff.company_id.id">{{ list.name }} - {{ list.location }} ({{ list.base }})</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group form-group-default required">
                            <label class="muted">Department</label>
                            <select class="form-control" v-model="staff.department_id.id">
                                <option v-for="department in this.ListDepartment" :value="department.id" v-bind:selected="department.id == staff.department_id.id">{{ department.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group form-group-default required">
                            <label class="muted">Designation</label>
                            <select class="form-control" v-model="staff.designation_id.id">
                                <option v-for="designation in this.ListDesignation" :value="designation.id" v-bind:selected="designation.id == staff.designation_id.id">{{ designation.name }}</option>
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
                            <button @click="staffChecked" class="btn btn-primary" data-dismiss="modal" style="margin-right: 10px">Submit</button>
                            <a data-dismiss="modal" class="btn btn-default" >Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    export default {
        props: {},
        data(){
            return{
                serverurl: '3.0.245.237',
                ListCompany:[],
                ListDepartment:[],
                ListDesignation:[],
                ITAssetCategory:[],
                ITAssetBrand:[],
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
            this.getCompanies();
            this.getDepartments();
            this.getDesignations();
        },
        methods: {
            getCompanies(){
                axios.get('/api/v1/getCompany')
                    .then(function (response) {
                        this.ListCompany = response.data;
                    }.bind(this));
            },
            getDepartments(){
                axios.get('/api/v1/getDepartment')
                    .then(function (response) {
                        this.ListDepartment = response.data;
                    }.bind(this));
            },
            getDesignations(){
                axios.get('/api/v1/getDesignation')
                    .then(function (response) {
                        this.ListDesignation = response.data;
                    }.bind(this));
            },

            staffChecked()
            {
                if(this.staff.company_id.id =="") {
                    this.staff.company_id.id = 1;
                }
                if(this.staff.designation_id.id =="")
                {
                    this.staff.designation_id.id = 1;
                }
                if(this.staff.department_id.id =="")
                {
                    this.staff.department_id.id = 1;

                }

                this.createStaff();


            },
            createStaff() {

                var url = '/api/v1/staff/create-staff', method = 'post';
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
                    this.clearForm();
                    //this.fetchStaff();
                        Event.$emit('updateStaffList');

                })
            },
            fetchStaff(page = 1){
                this.isLoading = true;

                fetch('/api/v1/staff/list-staff' + '?page='+ page).then(response => response.json())
                    .then(response => {

                        this.staffs = response.data;
                        this.$refs.pagination.makePagination(response.meta, response.links);

                        //turn off loading animation
                        this.isLoading = false;
                    })
                    .catch(error => console.log(error))
            },
            clearForm(){
                this.staff = {
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
                }
            }
        }
    }
</script>