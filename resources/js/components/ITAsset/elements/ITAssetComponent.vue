<template>
    <div>
        <div class="row border-bottom" style="margin-bottom: 10px">
            <div class="col text-left">
                <div class="row">
                    <div class="col">
                        <span class="fs-10 muted" style="font-size: 15px; color: #007bff"> {{this.asset.computer_name}}</span>
                        <!--<span class="fs-15" style="font-size: 15px; color: #007bff" v-for="category in this.$parent.ITAssetCategory" v-if="category.id == asset.asset_category_id.id">-->
                        <!--{{category.name}}-->
                        <!--</span>-->
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div v-if="this.asset.staff_id === null  ">
                            <span class="fs-10 muted" style="font-size: 15px; color: #007bff"> PIC :
                            <span class="fs-20" style="font-size: 14px; color: #003976" v-for="listStaff in this.$parent.ListStaff" v-if="listStaff.id == staff_id">
                                    {{listStaff.full_name}} ( {{listStaff.staff_no}} )
                                </span>
                            </span>
                        </div>
                        <div v-else="this.asset.staff_id !== null ">
                            <span class="fs-10 muted" style="font-size: 15px; color: #007bff"> PIC :
                                <span class="fs-20" style="font-size: 14px; color: #003976" v-for="listStaff in this.$parent.ListStaff" v-if="listStaff.id == asset.staff_id.id">
                                    {{listStaff.full_name}} ( {{listStaff.staff_no}} )
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span class="fs-20" style="font-size: 14px; color: #003976" v-for="brand in this.$parent.ITAssetBrand" v-if="brand.id == asset.it_asset_brand_id.id">
                            {{brand.name}}
                        </span>
                        <span class="fs-10 muted" style="font-size: 14px; "> - </span>
                        <span class="fs-10 muted" style="font-size: 14px; color: #003976"> {{this.asset.model}}</span>
                    </div>
                </div>
                <div class="row" style=" margin-bottom: 10px; ">
                    <div class="col">
                        <span class="fs-18" style="font-size: 12px; color: #f96332" v-for="companies in this.$parent.ListCompany" v-if="companies.id == asset.company.id">
                            {{companies.name}} {{companies.location}} - {{companies.base}}
                        </span><br>
                        <!--<span class="fs-18" style="font-size: 12px; color: #f96332" v-for="companies in this.$parent.ListCompany" v-if="companies.id == asset.company.id">-->
                        <!--{{companies.location}} - {{companies.base}}-->
                        <!--</span>-->

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