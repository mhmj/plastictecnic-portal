<template>
    <div>
        <div class="row border-bottom" style="margin-bottom: 10px">
            <div class="col-lg-8 text-left">
                <div class="row">
                    <div class="col-lg-2-auto">
                        <div :class="[{'btn-info': this.staff.company_id.id === 1},{'btn-success': this.staff.company_id.id === 2}, {'btn-warning': this.staff.company_id.id === 3}, {'btn-info': this.staff.company_id.id === 4},'card']">
                            <div class="card-body">
                                <div>
                                    <span class="text-white" style="font-size: 15px; font-weight: 600;">
                                        {{staff.staff_no}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-bottom: 10px">
                    <div class="col-lg-6" style="padding-bottom: 10px">
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">Name :</span>
                            <span class="fs-20 text-primary" style="font-size: 13px;">
                                {{staff.full_name}}
                            </span>
                        </div>
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">Username :</span>
                            <span class="fs-20 text-primary" style="font-size: 13px;">
                                {{staff.username}}
                            </span>
                        </div>
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">Email :</span>
                            <span class="fs-20 text-primary" style="font-size: 13px;">
                                {{staff.email}}
                            </span>
                        </div>
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">Phone No :</span>
                            <span class="fs-20 text-primary" style="font-size: 13px;">
                                {{staff.telephone_no}}
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">Designation :</span>
                            <span class="fs-20 text-primary" style="font-size: 13px;">
                                {{staff.designation_id.name}}
                            </span>
                        </div>
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">Department :</span>
                            <span class="fs-20 text-primary" style="font-size: 13px;">
                                {{staff.department_id.name}}
                            </span>
                        </div>
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;">Company :</span>
                            <span class="fs-18 text-primary" style="font-size: 13px;">
                                {{staff.company_id.name}} {{staff.company_id.base}}
                            </span><br><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-right" style="margin-bottom: 10px; margin-top: -10px">
                <a @click="toggleEdit()" rel="tooltip" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                    <i class="fas fa-pencil-alt text-dark"></i>
                </a>
                <button data-toggle="modal" @click="toggleDelete()" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="table" v-show="isEditing">
                <div class="card card-body" >
                    <staff-form-component v-bind:id="staff.id" :data="staff"></staff-form-component>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table" v-show="isDeleting">
                <div class="card card-body" >
                    <delete-staff-form-component v-bind:key="staff.id" :data="staff"></delete-staff-form-component>
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
                staff: this.data,
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