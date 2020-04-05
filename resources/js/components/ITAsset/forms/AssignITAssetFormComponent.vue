<template>
    <div style="margin-bottom: 10px">
        <form method="post" @submit.prevent="assignITAsset">
            <div class="col-lg-12">
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-12" style="display: flex; justify-content: center">
                        <h5 class="text-danger">Assign Staff (PIC) to asset</h5>
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
                <div class="row">
                    <div class="col-lg-5" style="display: flex; justify-content: flex-end">
                        Staff
                    </div>
                    <div class="col-sm-2" style="display: flex; justify-content: center">
                        :
                    </div>
                    <div class="col-lg-5" style="display: flex; justify-content: flex-start">
                        <span v-if="this.asset.staff_id === null">
                            <span class="fs-10 muted" style="font-size: 15px; color: #007bff"> - <br> </span>

                        </span>
                        <span v-else="this.asset.staff_id !== null">
                            <span class="fs-10 muted" style="font-size: 15px;">
                                <span class="fs-20" style="font-size: 14px; color: #007bff" v-for="listStaff in this.$parent.$parent.ListStaff" v-if="listStaff.id == asset.staff_id.id">
                                    {{listStaff.full_name}} ( {{listStaff.staff_no}} )
                                </span>
                            </span>
                        </span>
                    </div>
                </div>
                <div class="row" style="margin-top: 5px;">
                    <div class="col-lg-5" style="display: flex; justify-content: flex-end">

                    </div>
                    <div class="col-sm-2" style="display: flex; justify-content: center">

                    </div>
                    <div class="col-lg-5" style="display: flex; justify-content: flex-start; padding-right: 200px" >
                        <select @change="selectedStaff()" class="form-control" v-model="staff_id" >
                            <option v-for="list in this.$parent.$parent.ListStaff" :value="list.id">{{ list.staff_no }} -{{ list.full_name }}</option>
                        </select>
                    </div>
                </div>
                <div class="row border-top" style="margin-top: 10px" >
                    <div class="col-12" style=" margin-top: 10px; display: flex; justify-content: center">
                        <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                            <a @click="assignITAsset()" class="btn btn-danger" style="margin-right: 20px">Yes</a>
                            <a @click="$parent.toggleAssign()" class="btn btn-default" >Cancel</a>
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
                staff_id:'',
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

            selectedStaff(){
                this.$parent.staff_id = this.staff_id;
                if(this.$parent.asset.staff_id.id !== ''){
                    this.$parent.asset.staff_id.id = this.staff_id;
                }
            },

            assignITAsset(){
                this.$parent.toggleAssign();
                var url = 'http://'+ this.serverurl +'/api/v1/ITAsset/'+ this.asset.id +'/assign-it-asset', method = 'post';
                fetch(url, {
                    method: method,
                    body: JSON.stringify({staff_id: this.staff_id}),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    //this.$parent.fetchITAsset();
                    Event.$emit('updateITList');
                })

                //console.log('Staff ID:' + this.asset.staff_id.id);
                if(this.asset.staff_id ==null){
                    //console.log('Staff ID 2:' + this.staff_id);
                    //asset.staff_id.id = this.staff_id;
                    this.$set(this.asset.staff_id, 'id', this.staff_id);
                    console.log( this.asset.staff_id.id );


                }
            },
        }
    }
</script>