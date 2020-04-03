<template>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="deleteModalLabel">Delete IT Asset</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-danger" style="display: flex; justify-content: center">Are you sure want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button style="margin-right: 10px" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button @click="deleteITAsset($parent.items.id)" data-dismiss="modal" class="btn btn-primary">Delete</button>
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
                item_id : '',
            }
        },
        mounted(){

        },
        created() {
            this.item_id = this.$parent.items.id;
        },
        methods: {

            deleteITAsset(item){


                var url = 'http://'+ this.serverurl +'/api/v1/ITAsset/'+ item +'/delete-it-asset', method = 'delete';
                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
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