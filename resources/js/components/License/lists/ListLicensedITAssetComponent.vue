<template>
    <div class="row">
        <div class="col-lg-12">
            <loading-component v-show="isLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
            <div>
                <div class="table-responsive text-left">
                    <table class="table">
                        <th><label>No</label></th>
                        <th><label>Name</label></th>
                        <th><label>Serial Key</label></th>
                        <th><label>Version</label></th>
                    <license-it-asset-element-component  v-for="licenseDetails in ListLicense " v-bind:key="licenseDetails.id" :data="licenseDetails"></license-it-asset-element-component>
                    </table>
                    <pagination-component ref="pagination" v-on:changePage="fetchLicense($event)"></pagination-component>
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
                ListLicense: [],
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
            fetchLicense(page = 1){
                this.isLoading = true;
                this.isSearching = false;
                fetch('/api/v1/license/'+ this.id1 + '/list-license/it-asset' + '?page='+ page).then(response => response.json())
                    .then(response => {

                        this.ListLicense = response.data;
                        this.$refs.pagination.makePagination(response.meta, response.links);
                        this.isLoading = false;
                    })
                    .catch(error => console.log(error))
            },

        }
    }
</script>