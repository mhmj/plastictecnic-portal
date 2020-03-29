<template>
    <div>
        <loading-component v-show="isLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
        <div>
            <div>
                <table class="table">
                    <tbody>
                    <it-asset-element-component  v-for="asset in ITassets " v-bind:key="asset.id" :data="asset"></it-asset-element-component>
                    </tbody>
                </table>
            </div>
            <div style="margin-top: 30px; justify-content: flex-end">
                <pagination-component ref="pagination" v-on:changePage="fetchITAsset($event)"></pagination-component>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                ITassets: [],
                serverurl: '3.0.245.237',
                isLoading: false,

            }
        },
        mounted() {
            Event.$on('updateITList', () => {
                this.fetchITAsset();
            });
            console.log('Component mounted.')
        },
        created() {
            this.fetchITAsset();
        },
        methods: {
            fetchITAsset(page = 1){
                //turn on loading animation
                this.isLoading = true;

                fetch('http://'+ this.serverurl +'/api/v1/ITAsset/list-it-asset' + '?page='+ page).then(response => response.json())
                    .then(response => {

                        this.ITassets = response.data;
                        this.$refs.pagination.makePagination(response.meta, response.links);

                        //turn off loading animation
                        this.isLoading = false;
                    })
                    .catch(error => console.log(error))
            }
        }
    }
</script>