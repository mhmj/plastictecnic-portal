<template>
    <div style="margin-bottom: 10px">
        <form method="post" @submit.prevent="ITAssetChecked">
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
                                <option v-for="category in this.ITAssetCategory" :value="category.id" v-bind:selected="category.id == asset.asset_category_id.id">{{ category.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group form-group-default required">
                            <label class="muted">Brand</label>
                            <select class="form-control" v-model="asset.it_asset_brand_id.id">
                                <option v-for="brand in this.ITAssetBrand" :value="brand.id" v-bind:selected="brand.id == asset.it_asset_brand_id.id">{{ brand.name }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row muted" style="border-bottom: dashed; border-bottom-color: #ff9e9e">
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
                                <option v-for="list in this.ListCompany" :value="list.id" v-bind:selected="list.id == asset.company.id">{{ list.name }} - {{ list.location }} ({{ list.base }})</option>
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
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
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
                                <option value="Running">Running</option>
                                <option value="Failure">Failure</option>
                                <option value="Repair">Repair</option>
                            </select>
                            <!--<input class="form-control" v-model="asset.status">-->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button @click="ITAssetChecked" class="btn btn-primary" data-dismiss="modal" style="margin-right: 20px">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
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
                ITAssetCategory:[],
                ITAssetBrand:[],
                asset: {
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
            this.getCompanies();
            this.getITAssetCategories();
            this.getITAssetBrands();
        },
        methods: {
            getCompanies(){
                axios.get('/api/v1/getCompany')
                    .then(function (response) {
                        this.ListCompany = response.data;
                    }.bind(this));
            },
            getITAssetCategories(){
                axios.get('/api/v1/getITAssetCategory')
                    .then(function (response) {
                        this.ITAssetCategory = response.data;
                    }.bind(this));
            },
            getITAssetBrands(){
                axios.get('/api/v1/getITAssetBrand')
                    .then(function (response) {
                        this.ITAssetBrand = response.data;
                    }.bind(this));
            },

            ITAssetChecked()
            {
                if(this.asset.company.id =="") {
                    this.asset.company.id = 1;
                }
                if(this.asset.it_asset_brand_id.id =="")
                {
                    this.asset.it_asset_brand_id.id = 1;
                }
                if(this.asset.asset_category_id.id =="")
                {
                    this.asset.asset_category_id.id = 1;

                }
                this.createITAsset();
            },
            createITAsset() {

                var url = '/api/v1/ITAsset/create-it-asset', method = 'post';

                fetch(url, {
                    method: method,
                    body: JSON.stringify({
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
                        status: this.asset.status
                    }),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    this.clearForm();
                    Event.$emit('updateITList');

                })
            },
            clearForm(){
                this.asset = {
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

                }

            }
        }
    }
</script>