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
                items:[],
                serverurl: '3.0.245.237',
                isLoading: false,

            }
        },
        mounted() {
            Event.$on('updateITList', () => {
                this.fetchITAsset();
            });
        },
        created() {
            this.fetchITAsset();

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

        }
    }
</script>