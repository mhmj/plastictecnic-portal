<template>
    <div style="margin-bottom: 10px" class="text-left">
        <form method="post" @submit.prevent="deleteLicense">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col">
                        <h5 class="text-danger text-center">Are you sure want to delete this record?</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive text-left" style="margin-top: 10px">
                                            <table class="table">
                                                <tr>
                                                    <td>
                                                        <label class="muted">License No</label>
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td class="fs-20" style="color: #007bff;">
                                                        <span>{{license.license_no}}</span>
                                                    </td>
                                                <tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <label class="muted">License Name</label>
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td class="fs-20" style="color: #007bff;">
                                                        <span>{{license.license_name}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <label class="muted">Vendor</label>
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td class="fs-20" style="color: #007bff;">
                                                        <span>{{license.vendor}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <label class="muted">Version</label>
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td class="fs-20" style="color: #007bff;">
                                                        <span>{{license.version}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <label class="muted">Quantity</label>
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td class="fs-20" style="color: #007bff;">
                                                        <span>{{license.quantity}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <label class="muted">Serial Key</label>
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td class="fs-20" style="color: #007bff;">
                                                        <span>{{license.serial_key}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <label class="muted">Date Purchased</label>
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td class="fs-20" style="color: #007bff;">
                                                        <span>{{license.date_purchased}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <label class="muted">Date Expired</label>
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td class="fs-20" style="color: #007bff;">
                                                        <span>{{license.date_expired}}</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top" >
                    <div class="col-6">
                        <div class="form-group form-group-default"></div>
                    </div>
                    <div class="col-6" style="margin-top: 10px">
                        <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                            <button class="btn btn-danger" style="margin-right: 10px">Delete</button>
                            <a @click="$parent.toggleDelete()" class="btn btn-default text-white">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    export default {
        props: {
            'data': {
                type: Object,
            }
        },
        data(){
            return{
                license:[],
            }
        },

        created() {
            if(this.data !== null){
                this.license = this.data;
            }
        },
        methods: {
            deleteLicense(){
                this.$parent.toggleDelete();
                var url = '/api/v1/license/'+ this.license.id +'/delete-license', method = 'delete';
                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    Event.$emit('updateLicenseList');
                })
            },
        }
    }
</script>