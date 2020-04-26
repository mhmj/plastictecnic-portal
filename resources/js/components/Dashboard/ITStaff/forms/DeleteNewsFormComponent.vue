<template>
    <div class="col-lg-12">
        <form method="post" @submit.prevent="DeleteNews" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 class="card-title text-danger">Are You sure want to delete this information?</h4>
                            <div class="dropdown">
                                <button v-on:click="$parent.NewsDelete" type="button" class="btn btn-round btn-outline-default btn-simple btn-icon no-caret">
                                    <i class="now-ui-icons ui-1_simple-remove"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <loading-component v-show="isNewsDetailsLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-lg-12">
                                    <label class="muted text-primary" style="font-size: 20px">Title</label><br>
                                    {{newsDetails.title}}
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-12">
                                    <label class="muted text-primary" style="font-size: 20px">Description</label><br>
                                    {{newsDetails.description}}
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-12">
                                    <label class="muted text-primary" style="font-size: 20px">Images</label><br>
                                    <div class="row">
                                        <div class="col-lg-6" style="padding-bottom:10px">
                                            <div class="row">
                                                <div class="col-3" style="height: 100%; width: 100%; max-height: 100%;" v-if="this.newsDetails.image_1 && this.newsDetails.image_1 !== 'null'">
                                                    <el-image
                                                            style="width: 80px; height: 80px"
                                                            :src="image_source +  this.newsDetails.image_1"
                                                    >
                                                    </el-image>
                                                </div>
                                                <div class="col-3" style="height: 100%; width: 100%; max-height: 100%;" v-if="this.newsDetails.image_2 && this.newsDetails.image_2 !== 'null'">
                                                    <el-image
                                                            style="width: 80px; height: 80px"
                                                            :src="image_source +  this.newsDetails.image_2"
                                                    >
                                                    </el-image>
                                                </div>
                                                <div class="col-3" style="height: 100%; width: 100%; max-height: 100%;" v-if="this.newsDetails.image_3 && this.newsDetails.image_3 !== 'null'">
                                                    <el-image
                                                            style="width: 80px; height: 80px"
                                                            :src="image_source +  this.newsDetails.image_3"
                                                    >
                                                    </el-image>
                                                </div>
                                                <div class="col-lg-3" style="margin-top:10px; height: 100%; width: 100%; max-height: 100%;" v-if="this.newsDetails.image_4 && this.newsDetails.image_4 !== 'null'">
                                                    <el-image
                                                            style="width: 80px; height: 80px"
                                                            :src="image_source +  this.newsDetails.image_4"
                                                    >
                                                    </el-image>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-12">
                                    <label class="muted text-primary" style="font-size: 20px">Remark</label><br>
                                    {{newsDetails.remark}}
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-4">
                                    <i class="now-ui-icons users_single-02" style="margin-right: 2px"></i>
                                    <span class="text-info">{{staff_name}}</span>
                                    <br>
                                </div>
                                <div class="col-lg-4">
                                    <i class="now-ui-icons ui-2_time-alarm" style="margin-right: 2px"></i>
                                    <span class="text-info">{{newsDetails.created_at}}</span>
                                    <br>
                                </div>
                            </div>
                            <div class="row border-top" style="margin-top: 20px">
                                <div class="col-6">
                                    <div class="form-group form-group-default"></div>
                                </div>
                                <div class="col-6" style="margin-top: 5px">
                                    <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                                        <button type="submit" class="btn btn-danger" style="margin-right: 10px">Delete</button>
                                        <a v-on:click="$parent.NewsDelete" class="btn btn-default text-white">Cancel</a>
                                    </div>
                                </div>
                            </div>
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
            },
            'id1': {
                type: String,
                required: true
            },
        },
        data(){
            return{
                id:'',
                file:'',
                fileTemp:'',
                staff_name:'',
                image_source: 'storage/News/',
                newsDetails: [],
                staff_id: '',
                isNewsDetailsLoading: false,
            }
        },
        created() {
            if(this.data !== null){
                this.id = this.data;
                this.staff_id = this.id1;
                this.fetchAnnouncementDetails();
            }
        },
        methods: {
            async fetchAnnouncementDetails(){
                this.isNewsDetailsLoading = true;

                fetch('/api/v1/dashboard/'+ this.id +'/news-details').then(response => response.json())
                    .then(response => {

                        this.newsDetails = response.data;
                        this.staff_name = this.newsDetails.staff_id.full_name;
                        this.isNewsDetailsLoading = false;
                    })
                    .catch(error => console.log(error))
            },
            DeleteNews()
            {
                var url = '/api/v1/dashboard/'+ this.id +'/delete-news', method = 'delete';
                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    this.$parent.NewsDelete();
                    Event.$emit('updateNews');
                })
            }
        }
    }
</script>