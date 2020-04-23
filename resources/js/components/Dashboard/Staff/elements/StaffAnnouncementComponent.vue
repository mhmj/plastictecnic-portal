<template>
    <div>
        <div class="row border-bottom" style="margin-bottom: 10px">
            <div class="col-lg-10 text-left">
                <div class="row">
                    <div class="col-lg-12-auto">
                        <a v-on:click="$parent.AnnouncementView(announcement.id)">
                        <div :class="['btn-primary','card']">
                            <div class="card-body">
                                <div>
                                    <span class="text-white" style="font-size: 14px; font-weight: 600; text-decoration: underline">
                                        {{announcement.title}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        </a>
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
                                <span class="fs-20 text-primary" style="font-size: 13px; text-decoration: underline;">
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
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;  font-weight: bold">By :</span>
                            <span class="fs-20" style="font-size: 13px;">
                                {{announcement.staff_id.full_name}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 text-right" style="margin-bottom: 10px; margin-top: -10px">
                <!--<a v-on:click="$parent.AnnouncementView(announcement.id)" rel="tooltip" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">-->
                    <!--<i class="fas fa-search text-dark"></i>-->
                <!--</a>-->
            </div>
        </div>
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
        watch: {
            'data': function() {
                this.announcement = this.data;
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