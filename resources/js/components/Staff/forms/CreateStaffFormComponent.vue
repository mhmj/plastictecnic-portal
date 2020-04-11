<template>
    <div style="margin-bottom: 10px">
        <form method="post" @submit.prevent="staffChecked">
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
                                            <label class="text-danger">*</label>
                                            <div class="row" v-if="('staff_no' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['staff_no']}}</label>
                                                </div>
                                            </div>
                                            <input class="form-control" :style="[this.staff.staff_no ? {'border-color': 'green'} :{'border-color': 'red'} ]" v-model="staff.staff_no">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Username</label>
                                            <label class="text-danger">*</label>
                                            <div class="row" v-if="('username' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['username']}}</label>
                                                </div>
                                            </div>
                                            <input class="form-control" :style="[this.staff.username ? {'border-color': 'green'} :{'border-color': 'red'} ]" v-model="staff.username">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Full Name</label>
                                            <input class="form-control" :style="[this.staff.full_name ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="staff.full_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Email</label>
                                            <label class="text-danger">*</label>
                                            <div class="row" v-if="('email' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['email']}}</label>
                                                </div>
                                            </div>
                                            <input class="form-control" :style="[this.staff.email ? {'border-color': 'green'} :{'border-color': 'red'} ]" v-model="staff.email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Phone No</label>
                                            <input class="form-control" :style="[this.staff.telephone_no ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="staff.telephone_no">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Contact No</label>
                                            <input class="form-control" :style="[this.staff.phone_no ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="staff.phone_no">
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
                                            <label class="text-danger">*</label>
                                            <div class="row" v-if="('designation' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['designation']}}</label>
                                                </div>
                                            </div>
                                            <select :style="[this.staff.designation_id.id ? {'border-color': 'green'} :{'border-color': 'red'} ]" v-on:change="selectedDesignation()" class="form-control" v-model="staff.designation_id.id">
                                                <option v-for="designation in this.ListDesignation" :value="designation.id">{{ designation.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Department</label>
                                            <label class="text-danger">*</label>
                                            <div class="row" v-if="('department' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['department']}}</label>
                                                </div>
                                            </div>
                                            <select v-on:change="selectedDepartment()"  class="form-control" :style="[this.staff.department_id.id ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="staff.department_id.id" >
                                                <option v-for="list in this.ListDepartment" :value="list.id">{{ list.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Company</label>
                                            <label class="text-danger">*</label>
                                            <div class="row" v-if="('company' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['company']}}</label>
                                                </div>
                                            </div>
                                            <select :style="[this.staff.company_id.id ? {'border-color': 'green'} :{'border-color': 'red'} ]" v-on:change="selectedCompany()" class="form-control" v-model="staff.company_id.id">
                                                <option value="0" disabled>Select Company</option>
                                                <option v-for="list in this.ListCompany" :value="list.id" v-bind:selected="list.id == staff.company_id.id">{{ list.name }} - {{ list.location }} ({{ list.base }})</option>
                                            </select>
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
                            <button type="submit" class="btn btn-primary" style="margin-right: 15px">Submit</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default"  >Close</button>

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
                errors: [],
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
                this.errors = [];

                if(this.staff.staff_no && this.staff.username && this.staff.email && this.staff.designation_id.id && this.staff.department_id.id && this.staff.company_id.id )
                {
                    $("#staffModal").modal('hide');
                    this.createStaff();

                }

                if(!this.staff.staff_no)
                {
                    this.errors['staff_no'] = "Fill the Staff No"
                }
                if(!this.staff.username)
                {
                    this.errors['username'] = "Fill the Username"
                }
                if(!this.staff.email)
                {
                    this.errors['email'] = "Fill the Email"
                }
                if(!this.staff.designation_id.id)
                {
                    this.errors['designation'] = "Choose the Designation"
                }
                if(!this.staff.department_id.id)
                {
                    this.errors['department'] = "Choose the Department"
                }
                if(!this.staff.company_id.id)
                {
                    this.errors['company'] = "Choose the Company"
                }




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