<template>
    <div style="margin-bottom: 10px">
        <form method="post" @submit.prevent="checkLicenseAssetId">
            <div class="col-lg-12">
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6"  style="display: flex; justify-content: center">
                        <ul class="nav" data-tabs="tabs">
                            <li class="nav-item col-lg-6-auto" style="padding-left: 10px; padding-right: 0px">
                                <button type="button" v-on:click="tabOption" class="btn btn-md btn-success" href="#license" data-toggle="tab" style="margin-bottom: 10px; background-color: #2b5797;">
                                    Licensing Information
                                </button>
                            </li>
                            <li class="nav-item col-lg-6-auto" style="padding-left: 10px; padding-right: 0px">
                                <button type="button" v-on:click="tabOption" class="btn btn-md btn-info" href="#asset" data-toggle="tab" style="background-color: #00aba9;">
                                    Asset Information
                                </button>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="tab-pane" id="license" v-if="this.isLicense">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6 text-left">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label class="muted" style="color: #2b5797;"><h5>License Information</h5></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group form-group-default required">
                                                <label class="muted">License No</label>
                                                <input class="form-control" :style="[this.license.license_no ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="license.license_no">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group form-group-default required">
                                                <label class="muted">License Name</label>
                                                <input class="form-control" :style="[this.license.license_name? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="license.license_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group form-group-default required">
                                                <label class="muted">Vendor</label>
                                                <input class="form-control" :style="[this.license.vendor ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="license.vendor">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group form-group-default required">
                                                <label class="muted">Version</label>
                                                <input class="form-control" :style="[this.license.version ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="license.version">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group form-group-default required">
                                                <label class="muted">Quantity</label>
                                                <input class="form-control" :style="[this.license.quantity ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="license.quantity">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group form-group-default required">
                                                <label class="muted">Serial Key</label>
                                                <input class="form-control" :style="[this.license.serial_key ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="license.serial_key">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group form-group-default required">
                                                <label class="muted">Date Purchased</label>
                                                <input class="form-control" :style="[this.license.date_purchased ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="license.date_purchased">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group form-group-default required">
                                                <label class="muted">Date Expired</label>
                                                <input class="form-control" :style="[this.license.date_expired ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="license.date_expired">
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane active" id="asset" v-if="this.isAsset">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6 text-left">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label class="muted" style="color:#00aba9; "><h5>Asset Information</h5></label>
                                        </div>
                                    </div>
                                    <div v-if="this.license.it_asset_id === null">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <select v-on:change="selectedTemporaryITAsset" class="form-control" v-model="temporary_asset_id" >
                                                    <option v-for="list in this.ListITAssetByLocation" :value="list.id" >{{ list.computer_name }} - {{ list.serial_no }}</option>
                                                </select>
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
                                                                    <span>-</span>
                                                                </td>
                                                            <tr>
                                                            <tr>
                                                                <td class="text-left">
                                                                    <label class="muted" style="color: black">Brand</label>
                                                                </td>
                                                                <td>:</td>
                                                                <td class="fs-20" style="color: #007bff;">
                                                                    <span>-</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left">
                                                                    <label class="muted" style="color: black">Model</label>
                                                                </td>
                                                                <td>:</td>
                                                                <td class="fs-20" style="color: #007bff;">
                                                                    <span>-</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left">
                                                                    <label class="muted" style="color: black">Serial No</label>
                                                                </td>
                                                                <td>:</td>
                                                                <td class="fs-20" style="color: #007bff;">
                                                                    <span>-</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left">
                                                                    <label class="muted" style="color: black">Category</label>
                                                                </td>
                                                                <td>:</td>
                                                                <td class="fs-20" style="color: #007bff;">
                                                                    <span>-</span>
                                                                </td>
                                                            </tr>
                                                        </table>
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
                                    <div v-if="this.license.it_asset_id !== null">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <select v-on:change="selectedITAsset" class="form-control" v-model="license.it_asset_id.id" >
                                                    <option v-for="list in this.ListITAssetByLocation" :value="list.id" >{{ list.computer_name }} - {{ list.serial_no }}</option>
                                                </select>
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
                                                                    <span>{{this.license.it_asset_id.computer_name}}</span>
                                                                </td>
                                                            <tr>
                                                            <tr>
                                                                <td class="text-left">
                                                                    <label class="muted" style="color: black">Brand</label>
                                                                </td>
                                                                <td>:</td>
                                                                <td class="fs-20" style="color: #007bff;">
                                                                    <span>{{this.license.it_asset_id.it_asset_brand_id.name}}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left">
                                                                    <label class="muted" style="color: black">Model</label>
                                                                </td>
                                                                <td>:</td>
                                                                <td class="fs-20" style="color: #007bff;">
                                                                    <span>{{this.license.it_asset_id.model}}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left">
                                                                    <label class="muted" style="color: black">Serial No</label>
                                                                </td>
                                                                <td>:</td>
                                                                <td class="fs-20" style="color: #007bff;">
                                                                    <span>{{this.license.it_asset_id.serial_no}}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-left">
                                                                    <label class="muted" style="color: black">Category</label>
                                                                </td>
                                                                <td>:</td>
                                                                <td class="fs-20" style="color: #007bff;">
                                                                    <span>{{this.license.it_asset_id.asset_category_id.name}}</span>
                                                                </td>
                                                            </tr>
                                                        </table>
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
                                </div>
                            </div>
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
                ListCompany:[],
                ListITAssetByLocation:[],
                temporary_asset_id:'',
                if_asset_id_null: '',
                license:[],
                isLicense: true,
                isAsset: false,

            }
        },
        mounted(){

        },
        created() {
            if(this.data !== null){
                this.license = this.data;
                this.getITAssetByLocation();
            }
        },
        methods: {
            tabOption(){
              this.isLicense = !this.isLicense;
              this.isAsset = !this.isAsset;
            },
            getITAssetByLocation(){
                axios.get('/api/v1/getITAssetByLocation/'+ this.license.company_id.id)
                    .then(function (response) {
                        this.ListITAssetByLocation = response.data;
                    }.bind(this));
            },
            async selectedITAsset(){

                let vm = this
                fetch('/api/v1/getITAssetDetails/'+ this.license.it_asset_id.id).then(response => response.json())
                    .then(response => {
                        vm.license.it_asset_id = response.data;
                        this.license.it_asset_id = vm.license.it_asset_id;
                    });
            },
            async selectedTemporaryITAsset(){

                let vm = this
                fetch('/api/v1/getITAssetDetails/'+ this.temporary_asset_id).then(response => response.json())
                    .then(response => {
                        vm.license.it_asset_id = response.data;
                        this.license.it_asset_id = vm.license.it_asset_id;
                    });
            },
            checkLicenseAssetId(){
                if(this.license.it_asset_id === null)
                {
                    this.updateLicenseWithoutId();
                }
                else
                {
                    this.updateLicenseWithId();
                }
            },
            updateLicenseWithoutId() {
                this.$parent.toggleEdit();
                var url = '/api/v1/license/'+ this.license.id +'/update-license', method = 'post';
                    fetch(url, {
                        method: method,
                        body: JSON.stringify({
                            it_asset_id: this.if_asset_id_null,
                            license_no: this.license.license_no,
                            license_name: this.license.license_name,
                            vendor: this.license.vendor,
                            version: this.license.version,
                            quantity: this.license.quantity,
                            serial_key: this.license.serial_key,
                            date_purchased: this.license.date_purchased,
                            date_expired: this.license.date_expired,
                            company_id: this.license.company_id.id,
                        }),
                        headers: {
                            'content-type': 'application/json'
                        }
                    }).then((response) => {

                        if(this.$parent.$parent.isSearching === false)
                        {
                            Event.$emit('updateLicenseList');
                        }
                        if(this.$parent.$parent.isSearching === true)
                        {
                            Event.$emit('updateSearchLicenseList');
                        }
                    })
            },
            updateLicenseWithId() {
                this.$parent.toggleEdit();
                var url = '/api/v1/license/'+ this.license.id +'/update-license', method = 'post';

                    fetch(url, {
                        method: method,
                        body: JSON.stringify({
                            it_asset_id: this.license.it_asset_id.id,
                            license_no: this.license.license_no,
                            license_name: this.license.license_name,
                            vendor: this.license.vendor,
                            version: this.license.version,
                            quantity: this.license.quantity,
                            serial_key: this.license.serial_key,
                            date_purchased: this.license.date_purchased,
                            date_expired: this.license.date_expired,
                            company_id: this.license.company_id.id,
                        }),
                        headers: {
                            'content-type': 'application/json'
                        }
                    }).then((response) => {
                        if(this.$parent.$parent.isSearching === false)
                        {
                            Event.$emit('updateLicenseList');
                        }
                        if(this.$parent.$parent.isSearching === true)
                        {
                            Event.$emit('updateSearchLicenseList');
                        }
                    })
            },
        }
    }
</script>