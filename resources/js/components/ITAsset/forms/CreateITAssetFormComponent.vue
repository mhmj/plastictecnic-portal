<template>
    <div style="margin-bottom: 10px">
        <form method="post" @submit.prevent="ITAssetChecked">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 text-left">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="text-primary muted"><h5>Asset Information</h5></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Computer Name</label>
                                            <input class="form-control" :style="[this.asset.computer_name ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="asset.computer_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Model</label>
                                            <label class="text-danger">*</label>
                                            <div class="row" v-if="('model' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['model']}}</label>
                                                </div>
                                            </div>
                                            <input class="form-control" :style="[this.asset.model ? {'border-color': 'green'} :{'border-color': 'red'} ]" v-model="asset.model">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Category</label>
                                            <label class="text-danger">*</label>
                                            <div class="row" v-if="('category' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['category']}}</label>
                                                </div>
                                            </div>
                                            <select class="form-control" :style="[this.asset.asset_category_id.id ? {'border-color': 'green'} :{'border-color': 'red'} ]" v-model="asset.asset_category_id.id">
                                                <option v-for="category in this.ListITAssetCategory" :value="category.id">{{ category.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Brand</label>
                                            <label class="text-danger">*</label>
                                            <div class="row" v-if="('brand' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['brand']}}</label>
                                                </div>
                                            </div>
                                            <select class="form-control" :style="[this.asset.it_asset_brand_id.id ? {'border-color': 'green'} :{'border-color': 'red'} ]" v-model="asset.it_asset_brand_id.id">
                                                <option v-for="brand in this.ListITAssetBrand" :value="brand.id">{{ brand.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Serial No</label>
                                            <input class="form-control" :style="[this.asset.serial_no ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="asset.serial_no">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Username</label>
                                            <input class="form-control" :style="[this.asset.username ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="asset.username">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Operating System</label>
                                            <input class="form-control" :style="[this.asset.OS ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="asset.OS">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">MS Office</label>
                                            <input class="form-control" :style="[this.asset.office ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="asset.office">
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
                                        <label class="text-primary muted"><h5>General Information</h5></label>
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
                                            <select class="form-control" :style="[this.asset.company.id ? {'border-color': 'green'} :{'border-color': 'red'} ]" v-model="asset.company.id">
                                                <option value="0" disabled>Select Company</option>
                                                <option v-for="list in this.ListCompany" :value="list.id" v-bind:selected="list.id == asset.company.id">{{ list.name }} - {{ list.location }} ({{ list.base }})</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Date Purchased</label>
                                            <input class="form-control" placeholder="DD/MM/YYYY" :style="[this.asset.year_purchased ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="asset.year_purchased">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Asset Status</label>
                                            <select class="form-control" :style="[this.asset.status ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="asset.status">
                                                <option value="0" disabled>Select Status</option>
                                                <option v-bind:selected="asset.status == 'Running'" value="Running">Running</option>
                                                <option v-bind:selected="asset.status == 'Failure'" value="Failure">Failure</option>
                                                <option v-bind:selected="asset.status == 'Repair'" value="Repair">Repair</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Warranty Status</label>
                                            <select class="form-control" :style="[this.asset.warranty_status ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="asset.warranty_status">
                                                <option value="0" disabled>Select Status</option>
                                                <option v-bind:selected="asset.warranty_status == 'Yes'" value="Yes">Yes</option>
                                                <option v-bind:selected="asset.warranty_status == 'No'" value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Warranty Period</label>
                                            <input class="form-control" placeholder="DD/MM/YYYY" :style="[this.asset.warranty_period ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="asset.warranty_period">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Remark</label>
                                            <input class="form-control" :style="[this.asset.remark ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="asset.remark">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="margin-right: 20px">Submit</button>
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
                errors: [],
                ListCompany:[],
                ListITAssetCategory:[],
                ListITAssetBrand:[],
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
                        this.ListITAssetCategory = response.data;
                    }.bind(this));
            },
            getITAssetBrands(){
                axios.get('/api/v1/getITAssetBrand')
                    .then(function (response) {
                        this.ListITAssetBrand = response.data;
                    }.bind(this));
            },

            ITAssetChecked()
            {
                this.errors = [];
                if(this.asset.model && this.asset.company.id && this.asset.it_asset_brand_id.id && this.asset.asset_category_id.id )
                {
                    $("#ITAssetModal").modal('hide');
                    this.createITAsset();
                }

                if(!this.asset.model)
                {
                    this.errors['model'] = "Fill the Model"
                }
                if(!this.asset.company.id)
                {
                    this.errors['company'] = "Choose the company"
                }
                if(!this.asset.it_asset_brand_id.id)
                {
                    this.errors['brand'] = "Choose the Brand"
                }
                if(!this.asset.asset_category_id.id)
                {
                    this.errors['category'] = "Choose the Category"
                }

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