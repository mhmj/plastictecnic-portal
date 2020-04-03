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
                            Asset No
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-lg-7">
                            {{this.$parent.items.it_asset_no}}
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
                            <span class="fs-15" style="font-size: 15px;" v-for="category in this.$parent.ITAssetCategory" v-if="category.id == $parent.items.asset_category_id.id">
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
                            <span class="fs-15" style="font-size: 15px;" v-for="brand in this.$parent.ITAssetBrand" v-if="brand.id == $parent.items.it_asset_brand_id.id">
                                {{brand.name}}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            Service Tag
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-lg-7">
                            {{this.$parent.items.service_tag}}
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
                            {{this.$parent.items.serial_no}}
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
                            <span class="fs-15" style="font-size: 15px; justify-content: flex-start" v-for="list in this.$parent.ListCompany" v-if="list.id == $parent.items.company.id">
                                {{list.name}} ({{list.base}})
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            Staff
                        </div>
                        <div class="col-sm-1">
                            :
                        </div>
                        <div class="col-lg-7" >
                            <select class="form-control" v-model="staff_id">
                                <option value="0" disabled>Select Staff</option>
                                <option v-for="staff_record in this.ListStaff" :value="staff_record.id">{{ staff_record.staff_no }} -{{ staff_record.full_name }}</option>
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
                        this.ListStaff = response.data;
                        console.log(this.ListStaff);
                    }.bind(this));
            },
            assignITAsset(item){
                console.log(item);
                console.log(this.staff_id);

                var url = 'http://'+ this.serverurl +'/api/v1/ITAsset/'+ item +'/assign-it-asset', method = 'post';
                fetch(url, {
                    method: method,
                    body: JSON.stringify({staff_id: this.staff_id}

                    ),
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