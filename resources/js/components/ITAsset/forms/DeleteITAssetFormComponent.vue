<template>
    <div style="margin-bottom: 10px">
        <form method="post" @submit.prevent="deleteITAsset">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 text-left">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label class="text-primary muted"><h5>Are you sure want to delete this record?</h5></label>
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
                            <button type="submit" class="btn btn-danger" style="margin-right: 10px">Submit</button>
                            <button type="button" @click="$parent.toggleDelete()" class="btn btn-default text-white" >Cancel</button>

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
            if(this.data !== null)
            {
                this.asset = this.data;
            }
        },
        methods: {

            deleteITAsset(){
                this.$parent.toggleDelete();
                var url = '/api/v1/ITAsset/'+ this.asset.id +'/delete-it-asset', method = 'delete';
                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    Event.$emit('updateITList');
                })
            },
        }
    }
</script>