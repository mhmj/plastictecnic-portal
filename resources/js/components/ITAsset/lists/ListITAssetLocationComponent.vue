<template>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12" style="margin-bottom: 15px; display: flex; justify-content: flex-end">
                    <form @submit.prevent="searchITAsset">
                        <div class="input-group no-border">
                            <input type="text" v-on:change="searchITAsset" v-model="searchQuery" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <a @submit.prevent="searchITAsset">
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
                    <it-asset-element-component  v-for="asset in ITassets " v-bind:key="asset.id" :data="asset"></it-asset-element-component>
                    <pagination-component ref="pagination" v-on:changePage="searchITAsset($event)"></pagination-component>
                </div>
                <div class="table" v-if="!this.isSearching">
                    <it-asset-element-component  v-for="asset in ITassets " v-bind:key="asset.id" :data="asset"></it-asset-element-component>
                    <pagination-component ref="pagination" v-on:changePage="fetchITAsset($event)"></pagination-component>
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
                ITassets: [],
                searchQuery:'',
                items:[],
                serverurl: '3.0.245.237',
                isLoading: false,
                isSearching: false,

            }
        },
        mounted() {
            Event.$on('updateITList', () => {
                this.fetchITAsset();
            });
            Event.$on('updateSearchITList', () => {
                this.searchITAsset();
            });
        },
        created() {
            this.fetchITAsset();
        },
        methods: {
            searchITAsset(page = 1){
                this.isLoading = true;
                this.isSearching = true;
                if(this.searchQuery){
                    fetch('/api/v1/ITAsset/'+ this.id1 +'/'+ this.searchQuery +'/search-it-asset' + '?page='+ page).then(response => response.json())
                        .then(response => {

                            this.ITassets = response.data;
                            this.$refs.pagination.makePagination(response.meta, response.links);

                            //turn off loading animation
                            this.isLoading = false;
                        })
                        .catch(error => console.log(error))
                }
                if(!this.searchQuery){
                    this.fetchITAsset();
                }

            },
            fetchITAsset(page = 1){
                this.isLoading = true;
                this.isSearching = false;
                fetch('/api/v1/ITAsset/'+ this.id1 +'/'+ this.category +'/list-it-asset' + '?page='+ page).then(response => response.json())
                    .then(response => {

                        this.ITassets = response.data;
                        this.$refs.pagination.makePagination(response.meta, response.links);

                        //turn off loading animation
                        this.isLoading = false;
                    })
                    .catch(error => console.log(error))
            },
            itemClicked(item) {
                this.items = item;
                $("#deleteModal").modal('show');
            },
            assignClicked(item) {
                this.items = item;
                $("#assignModal").modal('show');
            },

        }
    }
</script>