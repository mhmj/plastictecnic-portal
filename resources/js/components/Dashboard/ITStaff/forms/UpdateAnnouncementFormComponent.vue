<template>
    <div class="col-lg-12">
        <form method="post" @submit.prevent="EditAnnouncement" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 class="card-title text-primary">Announcement Information</h4>
                            <div class="dropdown">
                                <button v-on:click="$parent.AnnouncementEdit" type="button" class="btn btn-round btn-outline-default btn-simple btn-icon no-caret">
                                    <i class="now-ui-icons ui-1_simple-remove"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <loading-component v-show="isAnnouncementDetailsLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="muted" style="font-size: 20px">Title</label>
                                    <input class="form-control" :style="[this.announcementDetails.title ? {'border-color': 'green'} :{'border-color': 'lightgray'} ]" v-model="announcementDetails.title">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-12">
                                    <label class="muted"  style="font-size: 20px">Description</label>
                                    <textarea rows="4" cols="200" class="form-control" :style="[this.announcementDetails.description ? {'border-color': 'green'} :{'border-color': 'lightgray'}]" v-model="announcementDetails.description" ></textarea>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px" v-if="this.announcementDetails.file">
                                <div class="col-lg-12">
                                    <div class="form-group form-group-default required">
                                        <label class="muted" style="font-size: 20px">File :</label> <br>
                                        <label class="muted text-info" style="font-size: 15px">
                                            <a :href="file_source + announcementDetails.file " target="_blank">{{this.announcementDetails.file}}</a>
                                        </label>
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
                                        <a v-on:click="$parent.AnnouncementEdit" class="btn btn-default text-white">Cancel</a>
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
                file_source: 'storage/Announcement/',
                announcementDetails: [],
                staff_id: '',
                isAnnouncementDetailsLoading: false,
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
            onFileChange(e){
                this.file = e.target.files[0];
            },
            async fetchAnnouncementDetails(){
                this.isAnnouncementDetailsLoading = true;

                fetch('/api/v1/dashboard/'+ this.id +'/announcement-details').then(response => response.json())
                    .then(response => {

                        this.announcementDetails = response.data;
                        this.isAnnouncementDetailsLoading = false;
                    })
                    .catch(error => console.log(error))
            },
            EditAnnouncement()
            {
                if(!this.file){
                    this.file = this.announcementDetails.file;
                }
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


                axios.post('/api/v1/dashboard/'+ this.announcementDetails.id +'/update-announcement', formData, config)
                    .then(function (response) {
                        location.reload();
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });

            }
        }
    }
</script>