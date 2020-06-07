<template>
    <div>
        <div class="row border-bottom" style="margin-bottom: 10px">
            <div class="col-lg-8 text-left">
                <div class="row">
                    <div class="col-lg-2-auto">
                        <div >
                            <div class="card-body">
                                <div v-if="staff.image">
                                    <el-avatar shape="circle" :size="100" :fit="fit">
                                        <el-image :src="this.src  + this.staff.image" :fit="fit" style="width: 100%; height: 100%; border-radius: 100%; border: 1px dashed gray"/>
                                    </el-avatar>
                                </div>
                                <div v-if="!staff.image">
                                    <el-avatar shape="circle" :size="100" :fit="fit" style="background-color:lightgray; display:flex; justify-content: center; align-items: center; border: 1px dashed gray">
                                        <el-avatar><i style="font-size:40px; background-color:lightgray" class="now-ui-icons users_single-02"></i></el-avatar>
                                    </el-avatar>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2-auto" style="display: flex; align-items: center; margin-top: 20px">
                        <div :class="[{'btn-info': this.staff.company_id.id === 1},{'btn-success': this.staff.company_id.id === 2}, {'btn-warning': this.staff.company_id.id === 3}, {'btn-info': this.staff.company_id.id === 4},'card']">
                            <div class="card-body" style="padding:8px">
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
            <div class="table" v-show-slide="isEditing" >
                <div class="card card-body" >
                    <staff-form-component  v-bind:id="staff.id" :data="staff"></staff-form-component>
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
                src: 'storage/ProfilePicture/',
                fit: 'fill',
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