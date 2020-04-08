<template>
    <div style="margin-bottom: 10px">
        <form method="post" @submit.prevent="deleteITAsset">
            <div class="col-lg-12">
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-12" style="display: flex; justify-content: center">
                        <h5 class="text-danger">Are you sure want to delete this record?</h5>
                    </div>
                </div>
                <div class="row justify-content-center" style="border-bottom: dashed;"></div>
                <div class="row justify-content-center" style="margin-top: 20px">
                    <div class="col-5" style="display: flex; justify-content: flex-end">
                        Computer Name
                    </div>
                    <div class="col-2" style="display: flex; justify-content: center">
                        :
                    </div>
                    <div class="col-5" style="display: flex; justify-content: flex-start">
                        <span style="color: #007bff">{{asset.computer_name}}</span>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 5px">
                    <div class="col-5" style="display: flex; justify-content: flex-end">
                        Category
                    </div>
                    <div class="col-2" style="display: flex; justify-content: center">
                        :
                    </div>
                    <div class="col-5" style="display: flex; justify-content: flex-start">
                        <span class="fs-15" style="font-size: 15px; color: #007bff;" v-for="category in this.$parent.$parent.ITAssetCategory" v-if="category.id == asset.asset_category_id.id">
                                {{category.name}}
                        </span>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 5px">
                    <div class="col-5" style="display: flex; justify-content: flex-end">
                        Brand
                    </div>
                    <div class="col-2" style="display: flex; justify-content: center">
                        :
                    </div>
                    <div class="col-5" style="display: flex; justify-content: flex-start">
                        <span class="fs-15" style="font-size: 15px; color: #007bff;" v-for="brand in this.$parent.$parent.ITAssetBrand" v-if="brand.id == asset.it_asset_brand_id.id">
                                {{brand.name}}
                        </span>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 5px">
                    <div class="col-5" style="display: flex; justify-content: flex-end">
                        Model
                    </div>
                    <div class="col-2" style="display: flex; justify-content: center">
                        :
                    </div>
                    <div class="col-5" style="display: flex; justify-content: flex-start">
                        <span class="fs-15" style="font-size: 15px; color: #007bff;">
                                {{asset.model}}
                        </span>
                    </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 5px">
                    <div class="col-5" style="display: flex; justify-content: flex-end">
                        Serial No
                    </div>
                    <div class="col-2" style="display: flex; justify-content: center">
                        :
                    </div>
                    <div class="col-5" style="display: flex; justify-content: flex-start">
                        <span class="fs-15" style="font-size: 15px; color: #007bff;">
                                {{asset.serial_no}}
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
                        <span class="fs-15" style="font-size: 15px; color: #007bff; justify-content: flex-start" v-for="list in this.$parent.$parent.ListCompany" v-if="list.id == asset.company.id">
                                {{list.name}} ({{list.base}})
                            </span>
                    </div>
                </div>
                <div class="row border-top" style="margin-top: 10px" >
                    <div class="col-12" style=" margin-top: 10px; display: flex; justify-content: center">
                        <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                            <a @click="deleteITAsset()" class="btn btn-danger" style="margin-right: 20px">Yes</a>
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
                    //this.$parent.$parent.fetchITAsset();
                    Event.$emit('updateITList');
                })
            },
        }
    }
</script>