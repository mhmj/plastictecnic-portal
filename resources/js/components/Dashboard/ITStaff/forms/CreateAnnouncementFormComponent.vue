<template>
    <div class="col-lg-12">
        <form method="post" @submit.prevent="NewAnnouncement" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 class="card-title text-primary">Announcement Information</h4>
                            <div class="dropdown">
                                <button v-on:click="$parent.newAnnouncement" type="button" class="btn btn-round btn-outline-default btn-simple btn-icon no-caret">
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
                                    <input class="form-control" :style="[this.announcementDetails.title ? {'border-color': 'green'} :{'border-color': 'red'} ]" v-model="announcementDetails.title">
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
                                    <textarea rows="4" cols="200" class="form-control" :style="[this.announcementDetails.description ? {'border-color': 'green'} :{'border-color': 'red'}]" v-model="announcementDetails.description" ></textarea>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px" v-if="this.announcementDetails.file">
                                <div class="col-lg-12">
                                    <div class="form-group form-group-default required">
                                        <label class="muted" style="font-size: 20px">File :</label> <br>
                                        <label class="muted text-info" style="font-size: 15px">{{this.announcementDetails.file}}</label>
                                    </div>
                                    <div class=" fileinput fileinput-new text-left" >
                                        <div>
                                        <span class="form-control">
                                            <input type="file" v-on:change="onFileChange" />
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px" v-if="!this.announcementDetails.file">
                                <div class="col-lg-12">
                                    <div class="form-group form-group-default required">
                                        <label class="muted" style="font-size: 20px">File</label>
                                    </div>
                                    <div class=" fileinput fileinput-new text-left" >
                                        <div>
                                        <span class="form-control">
                                            <input type="file" v-on:change="onFileChange" />
                                        </span>
                                        </div>
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
                                        <a v-on:click="$parent.newAnnouncement" class="btn btn-default text-white">Cancel</a>
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
            'id1': {
                type: String,
                required: true
            },
        },
        data(){
            return{
                announcementDetails: [],
                errors: [],
                file:'',
                staff_id: '',
            }
        },
        created() {
            this.staff_id = this.id1;
        },
        methods: {
            onFileChange(e){
                this.file = e.target.files[0];
            },
            NewAnnouncement() {
                this.errors = [];
                if(this.announcementDetails.title && this.announcementDetails.description)
                {
                    this.$parent.newAnnouncement();

                    let currentObj = this;
                    const config = {
                        headers: { 'content-type': 'multipart/form-data' }
                    }

                    let formData = new FormData();
                    formData.append("staff_id", this.staff_id);
                    formData.append("title", this.announcementDetails.title);
                    formData.append("description",  this.announcementDetails.description);
                    formData.append("category", this.announcementDetails.category);
                    formData.append("remark", this.announcementDetails.remark);
                    formData.append("file", this.file);


                    axios.post('/api/v1/dashboard/create-announcement', formData, config)
                        .then(function (response) {
                            Event.$emit('updateAnnouncement');
                        })
                        .catch(function (error) {
                            currentObj.output = error;
                        });
                    this.announcementDetails = [];

                }

                if(!this.announcementDetails.title)
                {
                    this.errors['title'] = "Fill The Title"
                }
                if(!this.announcementDetails.description)
                {
                    this.errors['description'] = "Fill The Description"
                }
            },
        }
    }
</script>