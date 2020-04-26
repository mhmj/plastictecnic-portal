<template>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
                <form method="post" @submit.prevent="EditImages" enctype="multipart/form-data">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 class="card-title text-primary">News Images</h4>
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
                                                <el-carousel-item v-if="newsDetails.image_2 && newsDetails.image_2 !== 'null'">
                                                    <el-image
                                                            style="width: 100%; height:100%;"
                                                            :src="image_source +  newsDetails.image_2"
                                                            @click="handlePictureCardPreview(image_source +  newsDetails.image_2)"
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
                                                <el-carousel-item v-if="newsDetails.image_4 && newsDetails.image_4 !== 'null'">
                                                    <el-image
                                                            style="width: 100%; height:100%;"
                                                            :src="image_source +  newsDetails.image_4"
                                                            @click="handlePictureCardPreview(image_source +  newsDetails.image_4)"
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
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-12">
                                    <div class="form-group form-group-default required">
                                        <label class="muted" style="font-size: 20px">Upload Images :</label> <br>
                                        <label class="muted text-danger"  style="font-size: 14px">* Maximum 4 file only</label>
                                    </div>
                                    <div>
                                        <el-upload
                                                action="#"
                                                list-type="picture-card"
                                                :auto-upload="false"
                                                :on-change="handleChange"
                                                ref="upload">
                                            <i slot="default" class="el-icon-plus"></i>
                                            <div slot="file" slot-scope="{file}">
                                                <img
                                                        class="el-upload-list__item-thumbnail"
                                                        :src="file.url" alt=""
                                                >
                                                <span class="el-upload-list__item-actions">
                                                <span
                                                        v-if="!disabled"
                                                        class="el-upload-list__item-delete"
                                                        @click="handleRemove(file)"
                                                >
                                                  <i class="el-icon-delete"></i>
                                                </span>
                                              </span>
                                            </div>
                                        </el-upload>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top" style="margin-top: 20px">
                                <div class="col-6">
                                    <div class="form-group form-group-default"></div>
                                </div>
                                <div class="col-6" style="margin-top: 5px">
                                    <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                                        <button type="submit" class="btn btn-primary" style="margin-right: 10px">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <form method="post" @submit.prevent="EditAnnouncement" enctype="multipart/form-data">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 class="card-title text-primary">News Information</h4>
                            <div class="dropdown">
                                <button v-on:click="$parent.NewsEdit" type="button" class="btn btn-round btn-outline-default btn-simple btn-icon no-caret">
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
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="muted" style="font-size: 20px">Title</label>
                                    <input class="form-control" :style="[this.newsDetails.title ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="newsDetails.title">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-12">
                                    <label class="muted"  style="font-size: 20px">Description</label>
                                    <textarea rows="4" cols="200" class="form-control" :style="[this.newsDetails.description ? {'border-color': 'green'} :{'border-color': 'lightgray'}]" v-model="newsDetails.description" ></textarea>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-12">
                                    <label class="muted"  style="font-size: 20px">Remark</label>
                                    <input class="form-control" :style="[this.newsDetails.remark ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="newsDetails.remark">
                                </div>
                            </div>
                            <div class="row border-top" style="margin-top: 20px">
                                <div class="col-6">
                                    <div class="form-group form-group-default"></div>
                                </div>
                                <div class="col-6" style="margin-top: 5px">
                                    <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                                        <button type="submit" class="btn btn-primary" style="margin-right: 10px">Submit</button>
                                        <a v-on:click="$parent.NewsEdit" class="btn btn-default text-white">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
                fileTemp:'',
                image_source: 'storage/News/',
                dialogImageUrl: '',
                dialogVisible: false,
                newsDetails: [],
                fileList:[],
                imageList:[],
                file:'',
                image:[],
                image_1: '',
                image_2: '',
                image_3: '',
                image_4: '',
                staff_id: '',
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
            handleChange(file, fileList) {
                this.image = file;
                this.fileList = fileList;
                if (fileList.length <= 4) {

                }
                if (fileList.length > 4) {

                    this.$message.error('Do not upload more than 4 files');
                    fileList.pop();
                }
            },
            handleRemove(file) {
                var index = this.fileList.indexOf(file);
                this.fileList.splice(index,1);

            },
            async fetchNewsDetails(){
                this.isNewsDetailsLoading = true;

                fetch('/api/v1/dashboard/'+ this.id +'/news-details').then(response => response.json())
                    .then(response => {

                        this.newsDetails = response.data;
                        this.isNewsDetailsLoading = false;
                    })
                    .catch(error => console.log(error))
            },
            EditImages()
            {
                this.isNewsImageLoading = true;
                if(this.fileList[0])
                {
                    this.image_1 = this.fileList[0].raw;
                }
                if(this.fileList[1])
                {
                    this.image_2 = this.fileList[1].raw;
                }
                if(this.fileList[2])
                {
                    this.image_3 = this.fileList[2].raw;
                }
                if(this.fileList[3])
                {
                    this.image_4 = this.fileList[3].raw;
                }

                let currentObj = this;
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();
                formData.append("image_1", this.image_1);
                formData.append("image_2", this.image_2);
                formData.append("image_3", this.image_3);
                formData.append("image_4", this.image_4);

                let vm= this;
                axios.post('/api/v1/dashboard/'+ this.newsDetails.id +'/update-image-news', formData, config)
                    .then(function (data) {
                        Event.$emit('updateNews');
                        vm.newsDetails.image_1 = data.data.data.image_1;
                        vm.newsDetails.image_2 = data.data.data.image_2;
                        vm.newsDetails.image_3 = data.data.data.image_3;
                        vm.newsDetails.image_4 = data.data.data.image_4;
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });

                this.$refs.upload.clearFiles();
                this.newsDetails.image_1 = vm.newsDetails.image_1;
                this.newsDetails.image_1 = vm.newsDetails.image_2;
                this.newsDetails.image_1 = vm.newsDetails.image_3;
                this.newsDetails.image_1 = vm.newsDetails.image_4;
                this.isNewsImageLoading = false;


            },
            EditAnnouncement()
            {
                this.$parent.NewsEdit();

                let currentObj = this;
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();
                formData.append("staff_id", this.staff_id);
                formData.append("title", this.newsDetails.title);
                formData.append("description",  this.newsDetails.description);
                formData.append("category", this.newsDetails.category);
                formData.append("remark", this.newsDetails.remark);

                axios.post('/api/v1/dashboard/'+ this.newsDetails.id +'/update-news', formData, config)
                    .then(function (response) {
                        Event.$emit('updateNews');
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });
            }
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