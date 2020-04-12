<template>
    <div style="margin-bottom: 10px">
        <form method="post" @submit.prevent="assignITAsset">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 text-left">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="text-primary muted"><h5>Assign Staff (PIC) to Asset</h5></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <div class="table-responsive text-left" style="margin-top: 10px">
                                                <table class="table" style="font-size: 15px;">
                                                    <tr >
                                                        <td class="text-left">
                                                            <label class="muted" style="color: black">Name</label>
                                                        </td>
                                                        <td>
                                                            :
                                                        </td>
                                                        <td class="fs-20" style="color: #007bff;">
                                                            <span>{{asset.computer_name}}</span>
                                                        </td>
                                                    <tr>
                                                    <tr>
                                                        <td class="text-left">
                                                            <label class="muted" style="color: black">Category</label>
                                                        </td>
                                                        <td>:</td>
                                                        <td class="fs-20" style="color: #007bff;">
                                                            <span>{{asset.asset_category_id.name}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">
                                                            <label class="muted" style="color: black">Brand</label>
                                                        </td>
                                                        <td>:</td>
                                                        <td class="fs-20" style="color: #007bff;">
                                                            <span>{{asset.it_asset_brand_id.name}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">
                                                            <label class="muted" style="color: black">Model</label>
                                                        </td>
                                                        <td>:</td>
                                                        <td class="fs-20" style="color: #007bff;">
                                                            <span>{{asset.model}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">
                                                            <label class="muted" style="color: black">Serial No</label>
                                                        </td>
                                                        <td>:</td>
                                                        <td class="fs-20" style="color: #007bff;">
                                                            <span>{{asset.serial_no}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">
                                                            <label class="muted" style="color: black">Company</label>
                                                        </td>
                                                        <td>:</td>
                                                        <td class="fs-20" style="color: #007bff;">
                                                            <span>{{asset.company.name}} {{asset.company.base}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">
                                                            <label class="muted" style="color: black">Staff</label>
                                                        </td>
                                                        <td>:</td>
                                                        <td class="fs-20" style="width:70%; color: #007bff;">
                                                            <span v-if="!this.asset.staff_id">
                                                                <label class="fs-10 muted" style="font-size: 15px; color: #007bff">
                                                                    <select :style="[!this.asset.staff_id ?  {'border-color': 'green'} : {'border-color':'red'}]"  v-on:change="selectedStaff()" class="form-control" v-model="staff_id" >
                                                                        <option v-for="list in this.ListStaffByLocation" :value="list.id"> {{ list.staff_no }} -{{ list.full_name }}</option>
                                                                    </select>
                                                                </label>
                                                                <div class="row" v-if="('staff' in errors)">
                                                                    <div class="col">
                                                                        <label class="text-danger">{{errors['staff']}}</label>
                                                                    </div>
                                                                </div>
                                                            </span>
                                                            <span v-if="this.asset.staff_id">
                                                                <label class="fs-10 muted" style="font-size: 15px;">
                                                                    <select  v-on:change="selectedStaffDetails()" class="form-control" v-model="asset.staff_id.id" >
                                                                        <option v-for="list in this.ListStaffByLocation" :value="list.id" v-bind:selected="list.id === asset.staff_id.id "> {{ list.staff_no }} -{{ list.full_name }}</option>
                                                                    </select>
                                                                </label>
                                                            </span>
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
                <div class="row border-top" >
                    <div class="col-6">
                        <div class="form-group form-group-default">
                        </div>
                    </div>
                    <div class="col-6" style="margin-top: 10px">
                        <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                            <button type="submit" class="btn btn-primary" style="margin-right: 10px">Submit</button>
                            <button type="button" @click="$parent.toggleAssign()" class="btn btn-default text-white" >Cancel</button>

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
                staff_id:'',
                ListStaffByLocation:[],
                asset: {
                    id:'',
                    model: '',
                    serial_no: '',
                    service_tag: '',
                    computer_name:'',
                    username: '',
                    office: '',
                    OS: '',
                    remark: '',
                    it_asset_brand_id:{
                        id:'',
                        name: '',
                    },
                    staff_id:{
                        id: 0,
                        full_name:'',
                        username:'',
                    },
                    company:{
                        id: '',
                        name:'',
                    },
                    asset_category_id:{
                        id:'',
                        name:'',
                    },
                    year_purchased:'',
                    warranty_status:'',
                    warranty_period:'',
                    status: '',

                },

            }
        },
        mounted(){

        },
        created() {
            if(this.data !== null)
            {
                this.asset = this.data;
                this.getStaffByLocation();
            }
        },
        methods: {
            getStaffByLocation(){
                axios.get('/api/v1/getStaffByLocation/'+ this.$parent.$parent.id1)
                    .then(function (response) {
                        this.ListStaffByLocation = response.data;
                    }.bind(this));
            },

            async selectedStaff(){
                let vm = this
                fetch('/api/v1/getStaffDetails/'+ this.staff_id).then(response => response.json())
                    .then(response => {
                        vm.asset.staff_id = response.data;
                        this.asset.staff_id = vm.asset.staff_id;
                        this.staff_id='';
                    });
            },
            async selectedStaffDetails(){
                        let vm = this
                        fetch('/api/v1/getStaffDetails/'+ this.asset.staff_id.id).then(response => response.json())
                            .then(response => {
                                vm.asset.staff_id = response.data;
                                this.asset.staff_id = vm.asset.staff_id;

                            });

            },

            assignITAsset(){
                this.errors = [];
                if(this.asset.staff_id)
                {
                    this.$parent.toggleAssign();
                    var url = '/api/v1/ITAsset/'+ this.asset.id +'/assign-it-asset', method = 'post';
                    fetch(url, {
                        method: method,
                        body: JSON.stringify({staff_id: this.asset.staff_id.id}),
                        headers: {
                            'content-type': 'application/json'
                        }
                    }).then((response) => {
                        Event.$emit('updateITList');
                    })
                }

                if(!this.asset.staff_id)
                {
                    this.errors['staff'] = "Choose the Staff"
                }

            },
        }
    }
</script>