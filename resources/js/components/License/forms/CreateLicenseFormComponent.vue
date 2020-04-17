<template>
    <div style="margin-bottom: 10px">
        <form method="post" @submit.prevent="checkLicense">
            <div class="col-lg-12">
                <div class="row" style="margin-bottom: 20px">
                        <div class="col-lg-12 text-left">
                            <div class="card">
                                <div class="card-body">
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
                                                <select class="form-control" :style="[this.license.company_id ? {'border-color': 'green'} :{'border-color': 'red'} ]" v-model="license.company_id">
                                                    <option value="0" disabled>Select Company</option>
                                                    <option v-for="list in this.ListCompany" :value="list.id">{{ list.name }} - {{ list.location }} ({{ list.base }})</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group form-group-default required">
                                                <label class="muted">License No</label>
                                                <label class="text-danger">*</label>
                                                <div class="row" v-if="('license_no' in errors)">
                                                    <div class="col">
                                                        <label class="text-danger">{{errors['license_no']}}</label>
                                                    </div>
                                                </div>
                                                <input class="form-control" :style="[this.license.license_no ? {'border-color': 'green'} :{'border-color': 'red'} ]" v-model="license.license_no">
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
                                                <label class="muted">Warranty Expired</label>
                                                <input class="form-control" :style="[this.license.date_expired ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="license.date_expired">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row border-top" >
                                        <div class="col-6">
                                            <div class="form-group form-group-default"></div>
                                        </div>
                                        <div class="col-6" style="margin-top: 10px">
                                            <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                                                <button type="submit" class="btn btn-primary" style="margin-right: 20px">Submit</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
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
            return {
                license:{
                    license_no:'',
                    license_name:'',
                    vendor:'',
                    version:'',
                    quantity:'',
                    serial_key:'',
                    date_purchased:'',
                    date_expired:'',
                    company_id:''
                },
                errors :[],
                ListCompany:[],

            }
        },
        created(){
            this.getCompanies();
        },
        methods:{
            getCompanies(){
                axios.get('/api/v1/getCompany')
                    .then(function (response) {
                        this.ListCompany = response.data;
                    }.bind(this));
            },
            checkLicense(){
                this.errors = [];
                if(this.license.license_no && this.license.company_id)
                {
                    $("#LicenseModal").modal('hide');
                    this.createLicense();

                }

                if(!this.license.license_no)
                {
                    this.errors['license_no'] = "Fill the License No"
                }
                if(!this.license.company_id)
                {
                    this.errors['company'] = "Choose the Company"
                }

            },
            createLicense() {
                var url = '/api/v1/license/create-license', method = 'post';

                fetch(url, {
                    method: method,
                    body: JSON.stringify({
                        license_no: this.license.license_no,
                        license_name: this.license.license_name,
                        vendor: this.license.vendor,
                        version: this.license.version,
                        quantity: this.license.quantity,
                        serial_key: this.license.serial_key,
                        date_purchased: this.license.date_purchased,
                        date_expired: this.license.date_expired,
                        company_id: this.license.company_id,
                    }),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    this.clearForm();
                    Event.$emit('updateLicenseList');

                })
            },
            clearForm(){
                this.license = {
                    license_no:'',
                        license_name:'',
                        vendor:'',
                        version:'',
                        quantity:'',
                        serial_key:'',
                        date_purchased:'',
                        date_expired:'',
                };
            }
        }
    }
</script>