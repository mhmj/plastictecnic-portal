<template>
    <div class="col-lg-12">
        <form method="post" @submit.prevent="DeleteAnnouncement" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 class="card-title text-danger">Are You sure want to delete this information?</h4>
                            <div class="dropdown">
                                <button v-on:click="$parent.AnnouncementDelete" type="button" class="btn btn-round btn-outline-default btn-simple btn-icon no-caret">
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
                            <div class="row" style="margin-top: 10px">
                                <div class="col-lg-12">
                                    <label class="muted text-primary" style="font-size: 20px">Title</label><br>
                                    {{announcementDetails.title}}
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-12">
                                    <label class="muted text-primary" style="font-size: 20px">Description</label><br>
                                    {{announcementDetails.description}}
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px" v-if="this.announcementDetails.file">
                                <div class="col-lg-12">
                                    <div class="form-group form-group-default required">
                                        <label class="muted text-primary" style="font-size: 20px">File</label> <br>
                                        <label class="muted text-info" style="font-size: 15px; text-decoration: underline;">
                                            <a :href="file_source + announcementDetails.file " target="_blank">{{this.announcementDetails.file}}</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px" v-if="!this.announcementDetails.file">
                                <div class="col-lg-12">
                                    <div class="form-group form-group-default required">
                                        <label class="muted text-primary" style="font-size: 20px">File</label>
                                    </div>
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
                                        <span class="text-info">{{announcementDetails.created_at}}</span>
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
                                        <a v-on:click="$parent.AnnouncementDelete" class="btn btn-default text-white">Cancel</a>
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
                        this.staff_name = this.announcementDetails.staff_id.full_name;
                        this.isAnnouncementDetailsLoading = false;
                    })
                    .catch(error => console.log(error))
            },
            DeleteAnnouncement()
            {
                var url = '/api/v1/dashboard/'+ this.id +'/delete-announcement', method = 'delete';
                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    this.$parent.AnnouncementDelete();
                    Event.$emit('updateAnnouncement');
                })
            }
        }
    }
</script>