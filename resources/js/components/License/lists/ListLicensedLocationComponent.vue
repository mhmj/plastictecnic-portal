<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="row" style="margin-top: -15px">
                <div class="col-12" style="margin-bottom: 15px; display: flex; justify-content: flex-end">
                    <form @submit.prevent="searchLicense">
                        <div class="input-group no-border">
                            <input type="text" v-on:change="searchLicense" v-model="searchQuery" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <a @submit.prevent="searchLicense">
                                        <i class="now-ui-icons ui-1_zoom-bold"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <loading-component v-show="isLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
            <div>
                <div class="table" v-if="this.isSearching">
                    <license-element-component  v-for="licenseDetails in ListLicense " v-bind:key="licenseDetails.id" :data="licenseDetails"></license-element-component>
                    <pagination-component ref="pagination" v-on:changePage="searchLicense($event)"></pagination-component>
                </div>
                <div class="table" v-if="!this.isSearching">
                    <license-element-component  v-for="licenseDetails in ListLicense " v-bind:key="licenseDetails.id" :data="licenseDetails"></license-element-component>
                    <pagination-component ref="pagination" v-on:changePage="fetchLicense($event)"></pagination-component>
                </div>
                <div style="margin-top: 30px; justify-content: flex-end">
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            'category': {
                type: String,
                required: true
            },
            'id1': {
                type: String,
                required: true
            }
        },
        data() {
            return {
                ListLicense: [],
                searchQuery:'',
                isLoading: false,
                isSearching: false,

            }
        },
        mounted() {
            Event.$on('updateLicenseList', () => {
                this.fetchLicense();
            });
            Event.$on('updateSearchLicenseList', () => {
                this.searchLicense();
            });
        },
        created() {
            this.fetchLicense();
        },
        methods: {
            searchLicense(page = 1){
                this.isLoading = true;
                this.isSearching = true;
                if(this.searchQuery){
                    fetch('/api/v1/license/'+ this.id1 +'/'+ this.searchQuery +'/search-license' + '?page='+ page).then(response => response.json())
                        .then(response => {

                            this.ListLicense = response.data;
                            this.$refs.pagination.makePagination(response.meta, response.links);

                            this.isLoading = false;
                        })
                        .catch(error => console.log(error))
                }
                if(!this.searchQuery){
                    this.fetchLicense();
                }

            },
            fetchLicense(page = 1){
                this.isLoading = true;
                this.isSearching = false;
                fetch('/api/v1/license/'+ this.id1 +'/'+ this.category +'/list-license' + '?page='+ page).then(response => response.json())
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