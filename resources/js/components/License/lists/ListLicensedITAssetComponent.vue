<template>
    <div class="row">
        <div class="col-lg-12">
            <div>
                <div class="table-responsive text-left">
                    <el-table
                            :data="ListLicense"
                            style="width: 100%"
                            height="300">
                        <el-table-column
                                fixed
                                type="index"
                                :index="indexMethod"
                                :min-width="5">
                        </el-table-column>
                        <el-table-column
                                fixed
                                prop="license_no"
                                label="No"
                                :min-width="25">
                        </el-table-column>
                        <el-table-column
                                fixed
                                prop="license_name"
                                label="Name"
                                :min-width="25">
                        </el-table-column>
                        <el-table-column
                                fixed
                                prop="serial_key"
                                label="Serial Key"
                                :min-width="25">
                        </el-table-column>
                        <el-table-column
                                prop="version"
                                label="Version"
                                :min-width="20">
                        </el-table-column>
                    </el-table>
                    <!--<table class="table">-->
                        <!--<th><label>No</label></th>-->
                        <!--<th><label>Name</label></th>-->
                        <!--<th><label>Serial Key</label></th>-->
                        <!--<th><label>Version</label></th>-->
                    <!--<license-it-asset-element-component  v-for="licenseDetails in ListLicense " v-bind:key="licenseDetails.id" :data="licenseDetails"></license-it-asset-element-component>-->
                    <!--</table>-->
                    <!--<pagination-component ref="pagination" v-on:changePage="fetchLicense($event)"></pagination-component>-->
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            'id1': {
                type: Number,
                required: true
            }
        },
        data() {
            return {
                ListLicense: [{
                    id: '',
                    it_asset_id:'',
                    company_id:'',
                    license_name:'',
                    license_no:'',
                    vendor:'',
                    serial_key:'',
                    version:'',
                    quantity:'',
                    remark:'',
                    date_purchased:'',
                    date_expired:'',
                    created_at:'',
                    updated_at:'',
                }],
                isLoading: false,

            }
        },
        mounted() {
            Event.$on('updateLicenseList', () => {
                this.fetchLicense();
            });
        },
        created() {
            this.fetchLicense();
        },
        methods: {
            indexMethod(index) {
                return index +1;
            },
            fetchLicense(page = 1){
                this.isSearching = false;
                fetch('/api/v1/license/'+ this.id1 + '/list-license/it-asset' + '?page='+ page).then(response => response.json())
                    .then(response => {

                        this.ListLicense = response.data;
                        //this.$refs.pagination.makePagination(response.meta, response.links);
                    })
                    .catch(error => console.log(error))
            },

        }
    }
</script>