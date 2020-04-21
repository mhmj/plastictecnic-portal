<template>
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-chart">
                    <div class="card-body">
                        <slider-component></slider-component>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title text-primary">Announcement</h4>
                        <div class="dropdown">
                            <button type="button" class="btn btn-round btn-outline-default btn-simple btn-icon no-caret">
                                <i class="now-ui-icons ui-1_simple-add"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <loading-component v-show="isAnnouncementLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
                        <div class="table">
                            <announcement-element-component v-for="announcement in announcements" v-bind:key="announcement.id" :data="announcement"></announcement-element-component>
                        </div>
                        <div style="margin-top: 30px; justify-content: flex-end">
                            <pagination-component ref="pagination" v-on:changePage="fetchAnnouncement($event)"></pagination-component>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-title text-info">News</h5>
                        <div class="dropdown">
                            <button type="button" class="btn btn-round btn-outline-default btn-simple btn-icon no-caret">
                                <i class="now-ui-icons ui-1_simple-add"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <loading-component v-show="isNewsLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
                        <div class="table">
                            <news-element-component v-for="news in ListNews" v-bind:key="news.id" :data="news"></news-element-component>
                        </div>
                        <!--<div style="margin-top: 30px; justify-content: flex-end">-->
                            <!--<pagination-component ref="pagination" v-on:changePage="fetchNews($event)"></pagination-component>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data(){
            return {
                announcements : [],
                ListNews : [],
                isAnnouncementLoading: false,
                isNewsLoading: false,
            }
        },
        mounted() {
            Event.$on('updateIncidentReport', () => {
                this.fetchIncidentReport();
            });

        },
        created() {
            this.fetchAnnouncement();
            this.fetchNews();
        },

        methods: {
            fetchAnnouncement(page = 1){
                this.isAnnouncementLoading = true;

                fetch('/api/v1/dashboard/list-announcement' + '?page='+ page).then(response => response.json())
                    .then(response => {

                        this.announcements = response.data;
                        this.$refs.pagination.makePagination(response.meta, response.links);
                        //turn off loading animation
                        this.isAnnouncementLoading = false;
                    })
                    .catch(error => console.log(error))
            },
            fetchNews(page = 1){
                this.isNewsLoading = true;

                fetch('/api/v1/dashboard/list-news' + '?page='+ page).then(response => response.json())
                    .then(response => {

                        this.ListNews = response.data;
                        this.$refs.pagination.makePagination(response.meta, response.links);
                        //turn off loading animation
                        this.isNewsLoading = false;
                    })
                    .catch(error => console.log(error))
            },
        }



    }

</script>