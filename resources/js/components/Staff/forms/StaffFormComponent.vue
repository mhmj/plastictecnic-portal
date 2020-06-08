<template>
    <div style="margin-bottom: 10px">
        <form method="post" @submit.prevent="updateStaff">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 text-left">
                        <el-tabs tab-position="left" style=" width: 100%" :stretch="true">
                            <el-tab-pane label="Personal">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="text-primary muted"><h5>Personal</h5></label>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-lg-4" style="display: flex; align-items: center; justify-content: center; margin-bottom: 10px">
                                            <div v-if="staff.image">
                                                    <el-image :src="this.src  + this.staff.image" :fit="fit" style="width: 100%; height: 100%; border: 1px dashed gray"/>
                                            </div>
                                            <div v-if="!staff.image">
                                                <!--<el-image  fit="fit" style="width: 100%; height: 100%; border: 1px dashed gray">-->
                                                    <!--<div slot="error" class="image-slot">-->
                                                        <!--<i style="font-size:40px;" class="el-icon-picture-outline"></i>-->
                                                    <!--</div>-->
                                                <!--</el-image>-->
                                                <!--<el-image src="/images/no-image.jpg" :fit="fit" style="width: 100%; height: 100%; border: 1px dashed gray">-->
                                                <!--</el-image>-->
                                                <el-avatar shape="square" :size="230" :fit="fit" style="background-color:lightgray; display:flex; justify-content: center; align-items: center; border: 1px dashed gray">
                                                    <i style="font-size:40px; background-color:lightgray" class="now-ui-icons users_single-02"></i>
                                                </el-avatar>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
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
                            </el-tab-pane>
                            <el-tab-pane label="Work">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="text-primary muted"><h5>Work</h5></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Designation</label>
                                            <v-select :class="[{'btn-outline-default': !this.staff.designation_id.id},{'btn-outline-success': this.staff.designation_id.id}]" style="padding: 0px; border-radius: 8px; font-size: 13px;" @input="selectedDesignation()" :options="ListDesignation" :reduce="ListDesignation => ListDesignation.id " :label="ListDesignation.label" v-model="staff.designation_id.id" ></v-select>
                                            <!--<select :style="[this.staff.designation_id.id ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-on:change="selectedDesignation()" class="form-control" v-model="staff.designation_id.id">-->
                                            <!--<option v-for="designation in this.ListDesignation" :value="designation.id">{{ designation.name }}</option>-->
                                            <!--</select>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Department</label>
                                            <v-select :class="[{'btn-outline-default': !this.staff.department_id.id},{'btn-outline-success': this.staff.department_id.id}]" style="padding: 0px; border-radius: 8px; font-size: 13px" @input="selectedDepartment()" :options="ListDepartment" :reduce="ListDepartment => ListDepartment.id " :label="ListDepartment.label" v-model="staff.department_id.id" ></v-select>
                                            <!--<select v-on:change="selectedDepartment()"  class="form-control" :style="[this.staff.department_id.id ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="staff.department_id.id" >-->
                                            <!--<option v-for="list in this.ListDepartment" :value="list.id">{{ list.name }}</option>-->
                                            <!--</select>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Company</label>
                                            <v-select :class="[{'btn-outline-default': !this.staff.company_id.id},{'btn-outline-success': this.staff.company_id.id}]" style="padding: 0px; border-radius: 8px; font-size: 13px"  @input="selectedCompany()" :options="ListCompany" :reduce="ListCompany => ListCompany.id " :label="ListCompany.label" v-model="staff.company_id.id"></v-select>
                                            <!--<select :style="[this.staff.company_id.id ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-on:change="selectedCompany()" class="form-control" v-model="staff.company_id.id">-->
                                            <!--<option value="0" disabled>Select Company</option>-->
                                            <!--<option v-for="list in this.ListCompany" :value="list.id" v-bind:selected="list.id == staff.company_id.id">{{ list.name }} - {{ list.location }} ({{ list.base }})</option>-->
                                            <!--</select>-->
                                        </div>
                                    </div>
                                </div>
                            </el-tab-pane>
                        </el-tabs>
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
                            <a @submit.prevent="searchStaff" @click="$parent.toggleEdit()" class="btn btn-default text-white" >Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    import ElImage from "../../../../../public/element-ui/packages/image/src/main";
    export default {
        components: {ElImage},
        props: {
            'data': {
                type: Object,
            }
        },
        data(){
            return{
                src: 'storage/ProfilePicture/',
                fit: 'fill',
                ListDepartment:[{
                    id:'',
                    label: '',
                }],
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
                    image:'',
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
                console.log('yes')
                axios.get('/api/v1/getDepartmentDetails/'+ this.staff.department_id.id)
                    .then(function (response) {
                        this.staff.department_id = response.data;

                    }.bind(this));
            },
            getCompanies(){
                axios.get('/api/v1/getCompany')
                    .then(function (response) {
//                        this.ListCompany = response.data;
                        this.ListCompany = $.map(response.data, function(value){
                            return {'id': value.id, 'label': value.name + ' - ' +value.base};
                        });
                    }.bind(this));
            },
            getDesignations(){
                axios.get('/api/v1/getDesignation')
                    .then(function (response) {
                        this.ListDesignation = $.map(response.data, function(value){
                            return {'id': value.id, 'label': value.name};
                        });
//                        this.ListDesignation = response.data;
                    }.bind(this));
            },
            getDepartments(){
                axios.get('/api/v1/getDepartment')
                    .then(function (response) {
                        this.ListDepartment = $.map(response.data, function(value){
                            return {'id': value.id, 'label': value.name};
                        });
//                        this.ListDepartment = response.data;
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

                    if(this.$parent.$parent.isSearching === false)
                    {
                        Event.$emit('updateStaffList');
                    }
                    if(this.$parent.$parent.isSearching === true)
                    {
                        Event.$emit('updateSearchStaff');
                    }
                })
            },
        }
    }
</script>