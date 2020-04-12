<template>
    <div>
        <div class="row border-bottom" style="margin-bottom: 10px">
            <div class="col-lg-8 text-left">
                <div class="row">
                    <div class="col-lg-2-auto">
                        <div :class="[{'btn-info': this.asset.company.id === 1},{'btn-success': this.asset.company.id === 2}, {'btn-warning': this.asset.company.id === 3}, {'btn-info': this.asset.company.id === 4},'card']">
                            <div class="card-body">
                                <div v-if="this.asset.computer_name !== ''  ">
                                    <span class="text-white" style="font-size: 15px; font-weight: 600;">
                                        {{this.asset.computer_name}}
                                    </span>
                                </div>
                                <div v-if="this.asset.computer_name === ''  ">
                                    <span class="text-white" style="font-size: 15px; font-weight: 600;">
                                        -
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2-auto" style="margin-left: 10px">
                        <div class="card" v-bind:style= "[this.asset.company.id === 1 ? {'background-color': '#72c5ff'} : this.asset.company.id === 2 ? {'background-color': '#55f24d'} : this.asset.company.id === 3 ? {'background-color': '#ffc15d'}: {'background-color': '#72c5ff'}]">
                            <div class="card-body">
                                <div v-if="this.asset.staff_id !== null  ">
                                    <span class="text-white" style="font-size: 15px; font-weight: 600;">
                                        {{this.asset.staff_id.username}}
                                    </span>
                                </div>
                                <div v-if="this.asset.staff_id === null  ">
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
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">Model :</span>
                            <span class="fs-20 text-primary" style="font-size: 13px;">
                                {{asset.model}}
                            </span>
                        </div>
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">Category :</span>
                            <span class="fs-20 text-primary" style="font-size: 13px;">
                                {{asset.asset_category_id.name}}
                            </span>
                        </div>
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">Brand :</span>
                            <span class="fs-20 text-primary" style="font-size: 13px;">
                                {{asset.it_asset_brand_id.name}}
                            </span>
                        </div>
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">Serial No :</span>
                            <span class="fs-20 text-primary" style="font-size: 13px;">
                                {{asset.serial_no}}
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">Username :</span>
                            <span class="fs-20 text-primary" style="font-size: 13px;">
                                {{asset.username}}
                            </span>
                        </div>
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">MS Office :</span>
                            <span class="fs-20 text-primary" style="font-size: 13px;">
                                {{asset.office}}
                            </span>
                        </div>
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">OS :</span>
                            <span class="fs-20 text-primary" style="font-size: 13px;">
                                {{asset.OS}}
                            </span>
                        </div>
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">Company :</span>
                            <span class="fs-20 text-primary" style="font-size: 13px;">
                                {{asset.company.name}} {{asset.company.base}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col text-right" style="margin-bottom: 10px; margin-top: -10px">
                <a @click="toggleEdit()" rel="tooltip" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                    <i class="fas fa-pencil-alt text-dark"></i>
                </a>
                <a @click="" data-toggle="modal" @click="toggleAssign()" aria-expanded="false" aria-controls="collapseExample" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                    <i class="fas fa-user-tag text-black"></i>
                </a>
                <a @click="toggleDelete()" rel="tooltip" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                    <i class="fas fa-trash text-danger"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="table" v-show="isEditing">
                <div class="card card-body" >
                    <it-asset-form-component v-bind:key="asset.id" :data="asset"></it-asset-form-component>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table" v-show="isDeleting">
                <div class="card card-body" >
                    <delete-it-asset-form-component v-bind:key="asset.id" :data="asset"></delete-it-asset-form-component>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table" v-show="isAssigning">
                <div class="card card-body" >
                    <assign-it-asset-form-component v-bind:key="asset.id" :data="asset"></assign-it-asset-form-component>
                </div>
            </div>
        </div>

    </div>

</template>
<script>
    export default {
        props: ['data','brand'],
        data() {
            return {
                asset: this.data,
                asset_id: 0,
                staff_id: '',
                brand_id: this.brand,
                isEditing: false,
                isDeleting: false,
                isAssigning: false,
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
            toggleAssign(){
                this.isAssigning = !this.isAssigning;
            },
        }
    }
</script>