<template>
    <div style="margin-bottom: 10px">
        <form method="post" @submit.prevent="updateStaff">
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
                                            <input class="form-control" :style="[this.staff.staff_no ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="staff.staff_no">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Username</label>
                                            <input class="form-control" :style="[this.staff.username ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="staff.username">
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
                                            <input class="form-control" :style="[this.staff.email ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="staff.email">
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
                                            <select :style="[this.staff.designation_id.id ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-on:change="selectedDesignation()" class="form-control" v-model="staff.designation_id.id">
                                                <option v-for="designation in this.ListDesignation" :value="designation.id">{{ designation.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Department</label>
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
                                            <select :style="[this.staff.company_id.id ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-on:change="selectedCompany()" class="form-control" v-model="staff.company_id.id">
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
                            <button class="btn btn-primary" style="margin-right: 15px">Submit</button>
                            <a @click="$parent.toggleEdit()" class="btn btn-default text-white" >Cancel</a>
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
                this.getDepartments();
                this.getDesignations();
                this.getCompanies();
                //console.log(this.staff.designation_id)
            }
        },
        methods: {
            async selectedCompany(){
                axios.get('/api/v1/getCompanyDetails/'+ this.staff.company_id.id)
                    .then(function (response) {
                        this.staff.company_id = response.data;
                    }.bind(this));
            },
            async selectedDesignation(){
                axios.get('/api/v1/getDesignationDetails/'+ this.staff.designation_id.id)
                    .then(function (response) {
                        this.staff.designation_id = response.data;
                    }.bind(this));
            },
            async selectedDepartment(){
                axios.get('/api/v1/getDepartmentDetails/'+ this.staff.department_id.id)
                    .then(function (response) {
                        this.staff.department_id = response.data;
                    }.bind(this));
            },
            getCompanies(){
                axios.get('/api/v1/getCompany')
                    .then(function (response) {
                        this.ListCompany = response.data;
                    }.bind(this));
            },
            getDesignations(){
                axios.get('/api/v1/getDesignation')
                    .then(function (response) {
                        this.ListDesignation = response.data;
                    }.bind(this));
            },
            getDepartments(){
                axios.get('/api/v1/getDepartment')
                    .then(function (response) {
                        this.ListDepartment = response.data;
                    }.bind(this));
            },
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