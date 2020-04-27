<template>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title text-primary">Images</h4>
                    </div>
                    <div class="card-body">
                        <div class="row" style="margin-top: 20px">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <loading-component v-show="isNewsImageLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <el-carousel :interval="4000" type="card" height="200px">
                                            <el-carousel-item v-if="newsDetails.image_1 && newsDetails.image_1 !== 'null'">
                                                <el-image
                                                        style="width: 100%; height:100%;"
                                                        :src="image_source +  newsDetails.image_1"
                                                        @click="handlePictureCardPreview(image_source +  newsDetails.image_1)"
                                                >
                                                </el-image>
                                            </el-carousel-item>
                                            <el-carousel-item v-if="newsDetails.image_1 === 'null'">
                                                <el-image
                                                        style="width: 100%; height:100%;"
                                                        src="/images/no-image.jpg"
                                                >
                                                </el-image>
                                            </el-carousel-item>
                                            <el-carousel-item v-if="newsDetails.image_2 && newsDetails.image_2 !== 'null'">
                                                <el-image
                                                        style="width: 100%; height:100%;"
                                                        :src="image_source +  newsDetails.image_2"
                                                        @click="handlePictureCardPreview(image_source +  newsDetails.image_2)"
                                                >
                                                </el-image>
                                            </el-carousel-item>
                                            <el-carousel-item v-if="newsDetails.image_2 === 'null'">
                                                <el-image
                                                        style="width: 100%; height:100%;"
                                                        src="/images/no-image.jpg"
                                                >
                                                </el-image>
                                            </el-carousel-item>
                                            <el-carousel-item v-if="newsDetails.image_3 && newsDetails.image_3 !== 'null'">
                                                <el-image
                                                        style="width: 100%; height:100%;"
                                                        :src="image_source +  newsDetails.image_3"
                                                        @click="handlePictureCardPreview(image_source +  newsDetails.image_3)"
                                                >
                                                </el-image>
                                            </el-carousel-item>
                                            <el-carousel-item v-if="newsDetails.image_3 === 'null'">
                                                <el-image
                                                        style="width: 100%; height:100%;"
                                                        src="/images/no-image.jpg"
                                                >
                                                </el-image>
                                            </el-carousel-item>
                                            <el-carousel-item v-if="newsDetails.image_4 && newsDetails.image_4 !== 'null'">
                                                <el-image
                                                        style="width: 100%; height:100%;"
                                                        :src="image_source +  newsDetails.image_4"
                                                        @click="handlePictureCardPreview(image_source +  newsDetails.image_4)"
                                                >
                                                </el-image>
                                            </el-carousel-item>
                                            <el-carousel-item v-if="newsDetails.image_4 === 'null'">
                                                <el-image
                                                        style="width: 100%; height:100%;"
                                                        src="/images/no-image.jpg"
                                                >
                                                </el-image>
                                            </el-carousel-item>
                                        </el-carousel>
                                        <el-dialog :visible.sync="dialogVisible">
                                            <img width="100%" :src="dialogImageUrl" alt="">
                                        </el-dialog>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title text-primary">News Information</h4>
                        <div class="dropdown">
                            <button v-on:click="$parent.NewsView" type="button" class="btn btn-round btn-outline-default btn-simple btn-icon no-caret">
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
                                <label class="muted text-primary" style="font-size: 20px">Remark</label><br>
                                <span v-if="newsDetails.remark">
                                    {{newsDetails.remark}}
                                </span>
                                <span v-if="!newsDetails.remark">
                                    -
                                </span>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <div class="col-lg-6">
                                <i class="now-ui-icons users_single-02" style="margin-right: 2px"></i>
                                <span class="text-info">{{staff_name}}</span>
                                <br>
                            </div>
                            <div class="col-lg-6">
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
                                    <a v-on:click="$parent.NewsView" class="btn btn-default text-white">Close</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            'data': {
            },
        },
        data(){
            return{
                id:'',
                fileTemp:'',
                image_source: 'storage/News/',
                dialogImageUrl: '',
                dialogVisible: false,
                newsDetails: [],
                staff_id: '',
                staff_name:'',
                disabled: false,
                isNewsDetailsLoading: false,
                isNewsImageLoading: false,
            }
        },
        created() {
            if(this.data !== null){
                this.id = this.data;
                this.staff_id = this.id1;
                this.fetchNewsDetails();
            }
        },
        methods: {
            handlePictureCardPreview(file) {
                console.log(file);
                this.dialogImageUrl = file;
                this.dialogVisible = true;
            },
            async fetchNewsDetails(){
                this.isNewsDetailsLoading = true;

                fetch('/api/v1/dashboard/'+ this.id +'/news-details').then(response => response.json())
                    .then(response => {

                        this.newsDetails = response.data;
                        this.staff_name = this.newsDetails.staff_id.full_name;
                        this.isNewsDetailsLoading = false;
                    })
                    .catch(error => console.log(error))
            },
        }
    }
</script>
<style>
    .el-carousel__item h3 {
        color: #475669;
        font-size: 14px;
        opacity: 0.75;
        line-height: 200px;
        margin: 0;
    }

    .el-carousel__item:nth-child(2n) {
        background-color: #99a9bf;
    }

    .el-carousel__item:nth-child(2n+1) {
        background-color: #d3dce6;
    }
</style>