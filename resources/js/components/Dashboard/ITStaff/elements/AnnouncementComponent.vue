<template>
    <div>
        <div class="row border-bottom" style="margin-bottom: 10px">
            <div class="col-lg-10 text-left">
                <div class="row">
                    <div class="col-lg-12-auto">
                        <div :class="['btn-primary','card']">
                            <div class="card-body">
                                <div>
                                    <span class="text-white" style="font-size: 14px; font-weight: 600;">
                                        {{announcement.title}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="padding-bottom: 10px">
                        <div>
                            <p class="fs-10 muted" style="font-size: 13px; white-space: nowrap; width: 100%; overflow: hidden; text-overflow: ellipsis; ">
                                {{this.announcement.description}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: -10px">
                    <div class="col-lg-12" style="padding-bottom: 10px">
                        <div>
                            <div v-if="!this.announcement.file">
                                <span class="m-l-5 m-r-5" style="font-size: 13px; font-weight: bold">File : </span>
                                <span class="fs-20" style="font-size: 13px; font-weight: bold">
                                    -
                                </span>
                            </div>
                            <div v-if="this.announcement.file">
                                <span class="m-l-5 m-r-5" style="font-size: 13px;  font-weight: bold">File : </span>
                                <span class="fs-20 text-primary" style="font-size: 13px;">
                                    <a :href="file_source + announcement.file " target="_blank">{{announcement.file}}</a>
                                </span>
                            </div>
                        </div>
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;  font-weight: bold">Date :</span>
                            <span class="fs-20" style="font-size: 13px;">
                                {{announcement.created_at}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 text-right" style="margin-bottom: 10px; margin-top: -10px">
                <a v-on:click="$parent.AnnouncementEdit(announcement.id)" rel="tooltip" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                    <i class="fas fa-pencil-alt text-dark"></i>
                </a>
                <button data-toggle="modal" @click="toggleDelete()" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
        <!--<div class="row">-->
            <!--<div class="table" v-show="isEditing">-->
                <!--<div class="card card-body" >-->
                    <!--<staff-form-component v-bind:id="staff.id" :data="staff"></staff-form-component>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
        <!--<div class="row">-->
            <!--<div class="table" v-show="isDeleting">-->
                <!--<div class="card card-body" >-->
                    <!--<delete-staff-form-component v-bind:key="staff.id" :data="staff"></delete-staff-form-component>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                announcement: this.data,
                file_source: 'storage/Announcement/',
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