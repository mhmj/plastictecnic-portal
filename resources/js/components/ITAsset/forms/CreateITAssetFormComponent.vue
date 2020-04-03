<template>
    <div style="margin-bottom: 10px">
        <form method="post" @submit.prevent="createITAsset">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group form-group-default required">
                            <label class="muted">Category</label>
                            <select class="form-control" v-model="asset.asset_category_id.id">
                                <option value="0" disabled>Select Category</option>
                                <option v-for="category in this.ITAssetCategory" :value="category.id">{{ category.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group form-group-default required">
                            <label class="muted">Brand</label>
                            <select class="form-control" v-model="asset.it_asset_brand_id.id">
                                <option value="0" disabled>Select Brand</option>
                                <option v-for="brand in this.ITAssetBrand" :value="brand.id">{{ brand.name }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group form-group-default required">
                            <label class="muted">Company</label>
                            <select class="form-control" v-model="asset.company.id">
                                <option value="0" disabled>Select Company</option>
                                <option v-for="list in this.ListCompany" :value="list.id">{{ list.name }} - {{ list.location }} ({{ list.base }})</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group form-group-default required">
                            <label class="muted">Model</label>
                            <input class="form-control" v-model="asset.model">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group form-group-default required">
                            <label class="muted">Serial No</label>
                            <input class="form-control" v-model="asset.serial_no">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group form-group-default required">
                            <label class="muted">Service Tag</label>
                            <input class="form-control" v-model="asset.service_tag">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group form-group-default required">
                            <label class="muted">Date Purchased</label>
                            <input class="form-control" v-model="asset.year_purchased">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group form-group-default required">
                            <label class="muted">Warranty Status</label>
                            <input class="form-control" v-model="asset.warranty_status">
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="form-group form-group-default required">
                            <label class="muted">Warranty Period</label>
                            <input class="form-control" v-model="asset.warranty_period">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button @click="createITAsset" class="btn btn-primary" data-dismiss="modal">Save changes</button>
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

            createITAsset() {
                //this.$parent.toggleEdit();

                var url = 'http://'+ this.serverurl +'/api/v1/ITAsset/create-it-asset', method = 'post';

                fetch(url, {
                    method: method,
                    body: JSON.stringify({
                        asset_category_id: this.asset.asset_category_id.id,
                        company_id: this.asset.company.id,
                        it_asset_brand_id: this.asset.it_asset_brand_id.id,
                        model: this.asset.model,
                        serial_no: this.asset.serial_no,
                        service_tag: this.asset.service_tag,
                        year_purchased: this.asset.year_purchased,
                        warranty_status: this.asset.warranty_status,
                        warranty_period: this.asset.warranty_period,
                    }),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    //this.$parent.$parent.fetchITAsset();
                    this.clearForm();
                    Event.$emit('updateITList');

                })
            },
            clearForm(){
                this.asset = {
                    model: '',
                        serial_no: '',
                        service_tag: '',
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

                }

            }
        }
    }
</script>