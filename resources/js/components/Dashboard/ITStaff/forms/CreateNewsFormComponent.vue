<template>
    <div class="col-lg-12">
        <form method="post" @submit.prevent="NewNews" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 class="card-title text-primary">News Information</h4>
                            <div class="dropdown">
                                <button v-on:click="$parent.newNews" type="button" class="btn btn-round btn-outline-default btn-simple btn-icon no-caret">
                                    <i class="now-ui-icons ui-1_simple-remove"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="muted" style="font-size: 20px">Title</label>
                                    <div class="row" v-if="('title' in errors)">
                                        <div class="col">
                                            <label class="text-danger">{{errors['title']}}</label>
                                        </div>
                                    </div>
                                    <input class="form-control" :style="[this.newsDetails.title ? {'border-color': 'green'} :{'border-color': 'red'} ]" v-model="newsDetails.title">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-12">
                                    <label class="muted"  style="font-size: 20px">Description</label>
                                    <div class="row" v-if="('description' in errors)">
                                        <div class="col">
                                            <label class="text-danger">{{errors['description']}}</label>
                                        </div>
                                    </div>
                                    <textarea rows="4" cols="200" class="form-control" :style="[this.newsDetails.description ? {'border-color': 'green'} :{'border-color': 'red'}]" v-model="newsDetails.description" ></textarea>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-12">
                                    <label class="muted"  style="font-size: 20px">Remark</label>
                                    <input class="form-control" :style="[this.newsDetails.remark ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="newsDetails.remark">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-12">
                                    <div class="form-group form-group-default required">
                                        <label class="muted" style="font-size: 20px">File :</label> <br>
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
                                        <el-dialog :visible.sync="dialogVisible">
                                            <img width="100%" :src="dialogImageUrl" alt="">
                                        </el-dialog>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top" style="margin-top: 20px">
                                <div class="col-6">
                                    <div class="form-group form-group-default"></div>
                                </div>
                                <div class="col-6" style="margin-top: 5px">
                                    <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                                        <button type="submit" class="btn btn-primary" style="margin-right: 10px">Submit</button>
                                        <a v-on:click="$parent.newNews" class="btn btn-default text-white">Cancel</a>
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
    import ElementUI from 'element-ui'
    Vue.use(ElementUI)
    export default {
        props: {
            'id1': {
                type: String,
                required: true
            },
        },
        data(){
            return{
                newsDetails: [],
                errors: [],
                fileList:[],
                imageList:[],
                dialogImageUrl: '',
                dialogVisible: false,
                disabled: false,
                file:'',
                image:[],
                image_1: '',
                image_2: '',
                image_3: '',
                image_4: '',
                staff_id: '',
            }
        },
        created() {
            this.staff_id = this.id1;
        },
        methods: {
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
                console.log(this.fileList);
                this.fileList.splice(index,1);
                //this.imageList.splice(index,1);

            },

            NewNews() {
                this.errors = [];


                if(this.newsDetails.title && this.newsDetails.description)
                {
                    this.$parent.newNews();
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
                    formData.append("staff_id", this.staff_id);
                    formData.append("title", this.newsDetails.title);
                    formData.append("description",  this.newsDetails.description);
                    formData.append("category", this.newsDetails.category);
                    formData.append("remark", this.newsDetails.remark);
                    formData.append("image_1", this.image_1);
                    formData.append("image_2", this.image_2);
                    formData.append("image_3", this.image_3);
                    formData.append("image_4", this.image_4);


                    axios.post('/api/v1/dashboard/create-news', formData, config)
                        .then(function (response) {
                            Event.$emit('updateNews');
                        })
                        .catch(function (error) {
                            currentObj.output = error;
                        });
                    this.newsDetails = [];
                    this.$refs.upload.clearFiles();
                    this.image = [];
                    this.image_1 = '';
                    this.image_2 = '';
                    this.image_3 = '';
                    this.image_4 = '';
                    this.fileList = [];
                    this.imageList = [];

                }

                if(!this.newsDetails.title)
                {
                    this.errors['title'] = "Fill The Title"
                }
                if(!this.newsDetails.description)
                {
                    this.errors['description'] = "Fill The Description"
                }
            },
        }
    }
</script>