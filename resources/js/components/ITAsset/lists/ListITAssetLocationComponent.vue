<template>
    <div>
        <loading-component v-show="isLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
        <div>
            <div class="table">
                <it-asset-element-component  v-for="asset in ITassets " v-bind:key="asset.id" :data="asset"></it-asset-element-component>
            </div>
            <div style="margin-top: 30px; justify-content: flex-end">
                <pagination-component ref="pagination" v-on:changePage="fetchITAsset($event)"></pagination-component>
            </div>
            <div>
                <delete-it-asset-modal-component :data="items"></delete-it-asset-modal-component>
            </div>
            <!--<div>-->
                <!--<assign-it-asset-modal-component></assign-it-asset-modal-component>-->
            <!--</div>-->
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
                ListCompany:[],
                ListStaff:[],
                ITAssetCategory:[],
                ITAssetBrand:[],
                items:[],
                serverurl: '3.0.245.237',
                isLoading: false,

            }
        },
        mounted() {
            Event.$on('updateITList', () => {
                this.fetchITAsset();
            });
            Event.$on('getCompanies', () => {
                this.getCompanies();
            });
            Event.$on('getITAssetCategories', () => {
                this.getITAssetCategories();
            });
            Event.$on('getITAssetBrands', () => {
                this.getITAssetBrands();
            });
            Event.$on('getStaff', () => {
                this.getStaff();
            });
        },
        created() {
            this.fetchITAsset();
            this.getCompanies();
            this.getITAssetCategories();
            this.getITAssetBrands();
            this.getStaff();
        },
        methods: {
            fetchITAsset(page = 1){
                this.isLoading = true;

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
            getCompanies(){
                axios.get('/api/v1/getCompany')
                    .then(function (response) {
                        this.ListCompany = response.data;
                    }.bind(this));
            },
            getITAssetCategories(){
                axios.get('/api/v1/getITAssetCategory')
                    .then(function (response) {
                        this.ITAssetCategory = response.data;
                    }.bind(this));
            },
            getITAssetBrands(){
                axios.get('/api/v1/getITAssetBrand')
                    .then(function (response) {
                        this.ITAssetBrand = response.data;
                    }.bind(this));
            },
            getStaff(){
                axios.get('/api/v1/getStaff')
                    .then(function (response) {
                        this.ListStaff = response.data;
                    }.bind(this));
            },
        }
    }
</script>