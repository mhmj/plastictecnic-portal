<template>
    <div style="margin-bottom: 10px">
        <form method="post" @submit.prevent="updateITAsset">
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
                                            <input class="form-control" :style="[this.asset.model ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="asset.model">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Category</label>
                                            <select v-on:change="selectedCategory()" class="form-control" :style="[this.asset.asset_category_id.id ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="asset.asset_category_id.id">
                                                <option v-for="category in this.ListITAssetCategory" :value="category.id">{{ category.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Brand</label>
                                            <select v-on:change="selectedBrand()" class="form-control" :style="[this.asset.it_asset_brand_id.id ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="asset.it_asset_brand_id.id">
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
                                            <select v-on:change="selectedCompany()" class="form-control" :style="[this.asset.company.id ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="asset.company.id">
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
                <div class="row border-top" >
                    <div class="col-6">
                        <div class="form-group form-group-default">
                        </div>
                    </div>
                    <div class="col-6" style="margin-top: 10px">
                        <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                            <button type="submit" class="btn btn-primary" style="margin-right: 10px">Submit</button>
                            <button type="button" @click="$parent.toggleEdit()" class="btn btn-default text-white" >Cancel</button>

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
                ListCompany:[],
                ListITAssetCategory:[],
                ListITAssetBrand:[],
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
                this.getCompanies();
                this.getITAssetCategories();
                this.getITAssetBrands();
            }
        },
        methods: {
            async selectedCategory(){
                axios.get('/api/v1/getITAssetCategoryDetails/'+ this.asset.asset_category_id.id)
                    .then(function (response) {
                        this.asset.asset_category_id = response.data;
                    }.bind(this));
            },
            async selectedBrand(){
                axios.get('/api/v1/getITAssetBrandDetails/'+ this.asset.it_asset_brand_id.id)
                    .then(function (response) {
                        this.asset.it_asset_brand_id = response.data;
                    }.bind(this));
            },
            async selectedCompany(){
                axios.get('/api/v1/getCompanyDetails/'+ this.asset.company.id)
                    .then(function (response) {
                        this.asset.company = response.data;
                    }.bind(this));
            },
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

            updateITAsset() {
                this.$parent.toggleEdit();

                var url = '/api/v1/ITAsset/'+ this.asset.id +'/update-it-asset', method = 'post';

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