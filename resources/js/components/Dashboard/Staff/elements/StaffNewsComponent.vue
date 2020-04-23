<template>
    <div>
        <div class="row border-bottom" style="margin-bottom: 10px">
            <div class="col-lg-10 text-left">
                <div class="row" style="margin-bottom: 15px;">
                    <div class="col-lg-12">
                        <span class="text-info text-capitalize" style="font-size: 15px; text-decoration: underline; font-weight: bold">
                           {{news.title}}
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <p class="fs-10 muted" style="font-size: 13px; white-space: nowrap; width: 100%; overflow: hidden; text-overflow: ellipsis; ">
                                {{this.news.description}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row" style="">
                    <div class="col-lg-12" style="padding-bottom: 10px">
                        <div class="row">
                            <div class="col-3" style="height: 100%; width: 100%; max-height: 100%;">
                                <img class="btn btn-outline-default" style="padding: 10px; margin-bottom: 10px; width: 100% ;max-width: 100% ;height: 100%;" :src="image_source +  this.news.image_1">
                            </div>
                            <div class="col-3" style="height: 100%; width: 100%; max-height: 100%;  margin-left: -20px">
                                <a>
                                    <img class="btn btn-outline-default" style="padding: 10px; margin-bottom: 10px; width: 100% ;max-width: 100% ;height: 100% ;" :src="image_source +  this.news.image_2">
                                </a>
                            </div>
                            <div class="col-3" style="height: 100%; width: 100%; max-height: 100%; margin-left: -20px">
                                <a>
                                    <img class="btn btn-outline-default" style="padding: 10px; margin-bottom: 10px; width: 100% ;max-width: 100% ;height: 100% ;" :src="image_source +  this.news.image_3">
                                </a>
                            </div>
                        </div>
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;  font-weight: bold">Date :</span>
                            <span class="fs-20" style="font-size: 13px;">
                                {{news.created_at}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 text-right" style="margin-bottom: 10px; margin-top: -10px">
                <!--<a rel="tooltip" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">-->
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
                news: this.data,
                image_source: 'storage/IncidentReport/',
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