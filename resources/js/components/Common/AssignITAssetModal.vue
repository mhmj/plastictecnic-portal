<template>
    <div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="deleteModalLabel">Assign IT Asset</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            Computer Name
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-lg-7">
                            <span class="fs-15" style="font-size: 15px; color: #007bff; justify-content: flex-start">
                                {{this.$parent.items.computer_name}}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            Category
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-lg-7">
                            <span class="fs-15" style="font-size: 15px; color: #007bff;" v-for="category in this.$parent.ITAssetCategory" v-if="category.id == $parent.items.asset_category_id.id">
                                {{category.name}}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            Brand
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-lg-7">
                            <span class="fs-15" style="font-size: 15px; color: #007bff;" v-for="brand in this.$parent.ITAssetBrand" v-if="brand.id == $parent.items.it_asset_brand_id.id">
                                {{brand.name}}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            Model
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-lg-7">
                            <span class="fs-15" style="font-size: 15px; color: #007bff; justify-content: flex-start">
                                {{this.$parent.items.model}}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            Serial No
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-lg-7">
                            <span class="fs-15" style="font-size: 15px; color: #007bff; justify-content: flex-start">
                                {{this.$parent.items.serial_no}}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            Company
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-lg-7" >
                            <span class="fs-15" style="font-size: 15px; color: #007bff; justify-content: flex-start" v-for="list in this.$parent.ListCompany" v-if="list.id == $parent.items.company.id">
                                {{list.name}} ({{list.base}})
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            Staff1
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-lg-7" >
                            <div v-if="this.$parent.items.staff_id === null  ">
                                <span class="fs-10 muted" style="font-size: 15px; color: #007bff"> - </span>
                            </div>
                            <div v-else="this.$parent.items.staff_id !== null ">
                            <span class="fs-10 muted" style="font-size: 15px;">
                                <span class="fs-20" style="font-size: 14px; color: #007bff" v-for="staff in this.StaffList" v-if="staff.id == $parent.items.staff_id.id">
                                    {{staff.full_name}} ( {{staff.staff_no}} )
                                </span>
                            </span>
                            </div>
                            <select class="form-control" v-model="staff_id">
                                <option value="" >Select Staff</option>
                                <option v-for="list in this.StaffList" :value="list.id">{{ list.staff_no }} -{{ list.full_name }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button style="margin-right: 10px" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button @click="assignITAsset($parent.items.id)" data-dismiss="modal" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data(){
            return{
                serverurl: '3.0.245.237',
                staff_id: '',
                StaffList: [],
            }
        },
        mounted(){
            Event.$on('getStaff', () => {
                this.getStaff();
            });
        },
        created() {
            this.getStaff();
        },
        methods: {
            getStaff(){
                axios.get('/api/v1/getStaff')
                    .then(function (response) {
                        this.StaffList = response.data;
                    }.bind(this));
            },
            assignITAsset(item){
                console.log(item);

                var url = 'http://'+ this.serverurl +'/api/v1/ITAsset/'+ item +'/assign-it-asset', method = 'post';
                fetch(url, {
                    method: method,
                    body: JSON.stringify({staff_id: this.staff_id}

                    ),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    //this.$parent.fetchITAsset();
                    Event.$emit('updateITList');
                })
            },
        }
    }
</script>