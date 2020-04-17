<template>
    <div>
        <div class="row border-bottom" style="margin-bottom: 10px">
            <div class="col-lg-8 text-left">
                <div class="row">
                    <div class="col-lg-2-auto">
                        <div :class="[{'btn-info': this.license.company_id.id === 1},{'btn-success': this.license.company_id.id === 2}, {'btn-warning': this.license.company_id.id === 3}, {'btn-info': this.license.company_id.id === 4},'card']">
                            <div class="card-body">
                                <div v-if="this.license.license_no !== ''  ">
                                    <span class="text-white" style="font-size: 15px; font-weight: 600;">
                                        {{this.license.license_no}}
                                    </span>
                                </div>
                                <div v-if="this.license.license_name === ''  ">
                                    <span class="text-white" style="font-size: 15px; font-weight: 600;">
                                         -
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-bottom: 10px">
                    <div class="col-lg-6" style="margin-bottom: 10px">
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">Name :</span>
                            <span class="fs-20 text-primary" style="font-size: 13px;">
                                {{this.license.license_name}}
                            </span>
                        </div>
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">Vendor :</span>
                            <span class="fs-20 text-primary" style="font-size: 13px;">
                                {{this.license.vendor}}
                            </span>
                        </div>
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">Version :</span>
                            <span class="fs-20 text-primary" style="font-size: 13px;">
                                {{this.license.version}}
                            </span>
                        </div>
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">Serial Key :</span>
                            <span class="fs-20 text-primary" style="font-size: 13px;">
                                {{this.license.serial_key}}
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">Purchased :</span>
                            <span class="fs-20 text-primary" style="font-size: 13px;">
                                {{this.license.date_purchased}}
                            </span>
                        </div>
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">Expired :</span>
                            <span class="fs-20 text-primary" style="font-size: 13px;">
                                {{this.license.date_expired}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col text-right" style="margin-bottom: 10px; margin-top: -10px">
                <a @click="toggleEdit()" rel="tooltip" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                    <i class="fas fa-pencil-alt text-dark"></i>
                </a>
                <a @click="toggleDelete()" rel="tooltip" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                    <i class="fas fa-trash text-danger"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="table" v-show="isEditing">
                <div class="card card-body" >
                    <license-form-component v-bind:key="license.id" :data="license"></license-form-component>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table" v-show="isDeleting">
                <div class="card card-body" >
                    <delete-license-form-component v-bind:key="license.id" :data="license"></delete-license-form-component>
                </div>
            </div>
        </div>

    </div>

</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                license: this.data,
                isEditing: false,
                isDeleting: false,
            }
        },
        mounted(){
            Event.$on('toggleEdit', () => {
                this.toggleEdit();
            });
            Event.$on('toggleDelete', () => {
                this.toggleDelete();
            });
        },
        methods:{
            toggleEdit(){
                this.isEditing = !this.isEditing;
            },
            toggleDelete(){
                this.isDeleting = !this.isDeleting;
            },
        }
    }
</script>
