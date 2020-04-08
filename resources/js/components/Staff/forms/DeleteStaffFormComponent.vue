<template>
    <div style="margin-bottom: 10px">
        <form method="post" @submit.prevent="deleteStaff">
            <div class="col-lg-12">
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-12" style="display: flex; justify-content: center">
                        <h5 class="text-danger">Are you sure want to delete this record?</h5>
                    </div>
                </div>
                <div class="row justify-content-center" style="border-bottom: dashed;"></div>
                <div class="row justify-content-center" style="margin-top: 20px">
                    <div class="col-5" style="display: flex; justify-content: flex-end">
                        Staff No
                    </div>
                    <div class="col-2" style="display: flex; justify-content: center">
                        :
                    </div>
                    <div class="col-5" style="display: flex; justify-content: flex-start">
                        <span class="fs-15" style="font-size: 15px; color: #007bff; justify-content: flex-start">
                            {{ staff.staff_no }}
                        </span>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 5px">
                    <div class="col-5" style="display: flex; justify-content: flex-end">
                        Username
                    </div>
                    <div class="col-2" style="display: flex; justify-content: center">
                        :
                    </div>
                    <div class="col-5" style="display: flex; justify-content: flex-start">
                        <span class="fs-15" style="font-size: 15px; color: #007bff; justify-content: flex-start">
                            {{ staff.username }}
                        </span>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 5px">
                    <div class="col-5" style="display: flex; justify-content: flex-end">
                        Full Name
                    </div>
                    <div class="col-2" style="display: flex; justify-content: center">
                        :
                    </div>
                    <div class="col-5" style="display: flex; justify-content: flex-start">
                        <span class="fs-15" style="font-size: 15px; color: #007bff; justify-content: flex-start">
                            {{ staff.full_name }}
                        </span>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 5px">
                    <div class="col-5" style="display: flex; justify-content: flex-end">
                        Company
                    </div>
                    <div class="col-2" style="display: flex; justify-content: center">
                        :
                    </div>
                    <div class="col-5" style="display: flex; justify-content: flex-start">
                         <span class="fs-15" style="font-size: 15px; color: #007bff; justify-content: flex-start" v-for="list in this.$parent.$parent.ListCompany" v-if="list.id == staff.company_id.id">
                             {{list.name}} ({{list.base}})
                         </span>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 5px">
                    <div class="col-5" style="display: flex; justify-content: flex-end">
                        Department
                    </div>
                    <div class="col-2" style="display: flex; justify-content: center">
                        :
                    </div>
                    <div class="col-5" style="display: flex; justify-content: flex-start">
                         <span class="fs-15" style="font-size: 15px; color: #007bff; justify-content: flex-start" v-for="department in this.$parent.$parent.ListDepartment" v-if="department.id == staff.department_id.id">
                             {{department.name}}
                         </span>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 5px">
                    <div class="col-5" style="display: flex; justify-content: flex-end">
                        Designation
                    </div>
                    <div class="col-2" style="display: flex; justify-content: center">
                        :
                    </div>
                    <div class="col-5" style="display: flex; justify-content: flex-start">
                        <span class="fs-15" style="font-size: 15px; color: #007bff; justify-content: flex-start" v-for="designation in this.$parent.$parent.ListDesignation" v-if="designation.id == staff.designation_id.id">
                            {{designation.name}}
                        </span>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 5px">
                    <div class="col-5" style="display: flex; justify-content: flex-end">
                        Email
                    </div>
                    <div class="col-2" style="display: flex; justify-content: center">
                        :
                    </div>
                    <div class="col-5" style="display: flex; justify-content: flex-start">
                        <span class="fs-15" style="font-size: 15px; color: #007bff; justify-content: flex-start">
                            {{ staff.email }}
                        </span>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 5px">
                    <div class="col-5" style="display: flex; justify-content: flex-end">
                        Phone No
                    </div>
                    <div class="col-2" style="display: flex; justify-content: center">
                        :
                    </div>
                    <div class="col-5" style="display: flex; justify-content: flex-start">
                        <span class="fs-15" style="font-size: 15px; color: #007bff; justify-content: flex-start">
                            {{ staff.telephone_no }}
                        </span>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 5px">
                    <div class="col-5" style="display: flex; justify-content: flex-end">
                        Contact No
                    </div>
                    <div class="col-2" style="display: flex; justify-content: center">
                        :
                    </div>
                    <div class="col-5" style="display: flex; justify-content: flex-start">
                        <span class="fs-15" style="font-size: 15px; color: #007bff; justify-content: flex-start">
                            {{ staff.phone_no }}
                        </span>
                    </div>
                </div>
                <div class="row border-top" style="margin-top: 10px" >
                    <div class="col-12" style=" margin-top: 10px; display: flex; justify-content: center">
                        <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                            <a @click="deleteStaff()" class="btn btn-danger" style="margin-right: 20px">Yes</a>
                            <a @click="$parent.toggleDelete()" class="btn btn-default" >Cancel</a>
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