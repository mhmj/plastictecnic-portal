<template>
    <div style="margin-bottom: 10px">
        <form method="post" @submit.prevent="updateITAsset">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group form-group-default required">
                            <label class="muted">Computer Name</label>
                            <input class="form-control" v-model="asset.computer_name">
                        </div>
                    </div>
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-3">
                        <div class="form-group form-group-default required">
                            <label class="muted">Category</label>
                            <select class="form-control" v-model="asset.asset_category_id.id">
                                <option value="0" disabled>Select Category</option>
                                <option v-for="category in this.$parent.$parent.ITAssetCategory" :value="category.id" v-bind:selected="category.id == asset.asset_category_id.id">{{ category.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group form-group-default required">
                            <label class="muted">Brand</label>
                            <select class="form-control" v-model="asset.it_asset_brand_id.id">
                                <option value="0" disabled>Select Brand</option>
                                <option v-for="brand in this.$parent.$parent.ITAssetBrand" :value="brand.id" v-bind:selected="brand.id == asset.it_asset_brand_id.id">{{ brand.name }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row muted" style="border-bottom: dashed; color: #ff9e9e">
                    <div class="col-lg-6">
                        <div class="form-group form-group-default required">
                            <label class="muted">Operating System</label>
                            <input class="form-control" v-model="asset.OS">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group form-group-default required">
                            <label class="muted">Model</label>
                            <input class="form-control" v-model="asset.model">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group form-group-default required">
                            <label class="muted">Serial No</label>
                            <input class="form-control" v-model="asset.serial_no">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px">
                    <div class="col-lg-5">
                        <div class="form-group form-group-default required">
                            <label class="muted">Company</label>
                            <select class="form-control" v-model="asset.company.id">
                                <option value="0" disabled>Select Company</option>
                                <option v-for="list in this.$parent.$parent.ListCompany" :value="list.id" v-bind:selected="list.id == asset.company.id">{{ list.name }} - {{ list.location }} ({{ list.base }})</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-1">

                    </div>
                    <div class="col-lg-3">
                        <div class="form-group form-group-default required">
                            <label class="muted">Username</label>
                            <input class="form-control" v-model="asset.username">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group form-group-default required">
                            <label class="muted">Office</label>
                            <input class="form-control" v-model="asset.office">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group form-group-default required">
                            <label class="muted">Date Purchased</label>
                            <input class="form-control" placeholder="DD/MM/YYYY" v-model="asset.year_purchased">
                        </div>
                    </div>
                    <div class="col-lg-1">

                    </div>
                    <div class="col-lg-3">
                        <div class="form-group form-group-default required">
                            <label class="muted">Warranty Status</label>
                            <select class="form-control" v-model="asset.warranty_status">
                                <option value="0" disabled>Select Status</option>
                                <option v-bind:selected="asset.warranty_status == 'Yes'" value="Yes">Yes</option>
                                <option v-bind:selected="asset.warranty_status == 'No'" value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group form-group-default required">
                            <label class="muted">Warranty Period</label>
                            <input class="form-control" v-model="asset.warranty_period">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group form-group-default required">
                            <label class="muted">Remark</label>
                            <input class="form-control" v-model="asset.remark">
                        </div>
                    </div>
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group form-group-default required">
                            <label class="muted">Asset Status</label>
                            <select class="form-control" v-model="asset.status">
                                <option value="0" disabled>Select Status</option>
                                <option v-bind:selected="asset.status == 'Running'" value="Running">Running</option>
                                <option v-bind:selected="asset.status == 'Failure'" value="Failure">Failure</option>
                                <option v-bind:selected="asset.status == 'Repair'" value="Repair">Repair</option>
                            </select>
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
                        id: '',
                        first_name:'',
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
            if(this.data !== null){
                //this.company = this.$parent.$parent.ListCompany;
                this.asset = this.data;
            }
        },
        methods: {

            updateITAsset() {
                this.$parent.toggleEdit();

                var url = 'http://'+ this.serverurl +'/api/v1/ITAsset/'+ this.asset.id +'/update-it-asset', method = 'post';

                fetch(url, {
                    method: method,
                    body: JSON.stringify({
                        id: this.asset.id,
                        asset_category_id: this.asset.asset_category_id.id,
                        company_id: this.asset.company.id,
                        it_asset_brand_id: this.asset.it_asset_brand_id.id,
                        model: this.asset.model,
                        computer_name: this.asset.computer_name,
                        username: this.asset.username,
                        office: this.asset.office,
                        OS: this.asset.OS,
                        remark: this.asset.remark,
                        serial_no: this.asset.serial_no,
                        service_tag: this.asset.service_tag,
                        year_purchased: this.asset.year_purchased,
                        warranty_status: this.asset.warranty_status,
                        warranty_period: this.asset.warranty_period,
                        warranty_period: this.asset.warranty_period,
                        status: this.asset.status
                    }),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    //this.$parent.$parent.fetchITAsset();
                    Event.$emit('updateITList');
                })
            },
        }
    }
</script>