<template>
    <div>
        <div class="row border-bottom" style="margin-bottom: 10px">
            <div class="col-lg-10 text-left">
                <div class="row" style="margin-bottom: 15px;">
                    <div class="col-lg-12">
                        <button v-on:click="$parent.NewsView(news.id)" style="padding-left:0px; border: none; background-color: white">
                            <span class="text-info text-capitalize" style="font-size: 14px; text-decoration: underline; font-weight: bold">
                                {{news.title}}
                            </span>
                        </button>
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
                            <div class="col-3" style="height: 100%; width: 100%; max-height: 100%;" v-if="this.news.image_1 && this.news.image_1 !== nullText">
                                <el-image
                                        style="width: 80px; height: 80px"
                                        :src="image_source +  this.news.image_1"
                                        >
                                </el-image>
                            </div>
                            <div class="col-3" style="margin-left:15px; height: 100%; width: 100%; max-height: 100%;" v-if="this.news.image_2 && this.news.image_2 !== nullText">
                                <el-image
                                        style="width: 80px; height: 80px"
                                        :src="image_source +  this.news.image_2"
                                        >
                                </el-image>
                            </div>
                            <div class="col-3" style="margin-left:15px; height: 100%; width: 100%; max-height: 100%;" v-if="this.news.image_3 && this.news.image_3 !== nullText">
                                <el-image
                                        style="width: 80px; height: 80px"
                                        :src="image_source +  this.news.image_3"
                                        >
                                </el-image>
                            </div>
                        </div>
                        <div style="margin-top: 10px">
                            <span class="m-l-5 m-r-5" style="font-size: 13px;  font-weight: bold">Date :</span>
                            <span class="fs-20" style="font-size: 13px;">
                                {{news.created_at}}
                            </span>
                        </div>
                        <div>
                            <span class="m-l-5 m-r-5" style="font-size: 13px;  font-weight: bold">By :</span>
                            <span class="fs-20" style="font-size: 13px;">
                                {{news.staff_id.full_name}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 text-right" style="margin-bottom: 10px; margin-top: -10px">
                <a v-on:click="$parent.NewsEdit(news.id)" rel="tooltip" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                    <i class="fas fa-pencil-alt text-dark"></i>
                </a>
                <button v-on:click="$parent.NewsDelete(news.id)" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral">
                    <i class="fas fa-trash"></i>
                </button>
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
                image_source: 'storage/News/',
                isEditing: false,
                isDeleting: false,
                nullText: 'null',
            }
        },
        watch: {
            'data': function() {
                this.news = this.data;
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