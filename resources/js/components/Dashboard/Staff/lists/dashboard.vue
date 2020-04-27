<template>
    <div class="content">
        <div class="row" v-show-slide="this.isSlider">
            <div class="col-lg-12">
                <div class="card card-chart">
                    <div class="card-body">
                        <slider-component></slider-component>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" v-show="this.isAnnouncementAndNews">
            <div class="col-lg-8">
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title text-primary">Announcement</h4>
                    </div>
                    <div class="card-body">
                        <loading-component v-show="isAnnouncementLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
                        <div class="table" v-if="isLoadData">
                            <staff-announcement-element-component v-for="announcement in announcements" v-bind:key="announcement.id" :data="announcement"></staff-announcement-element-component>
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
                    </div>
                    <div class="card-body">
                        <loading-component v-show="isNewsLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
                        <div class="table">
                            <staff-news-element-component v-for="news in ListNews" v-bind:key="news.id" :data="news"></staff-news-element-component>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" v-if="this.isAnnouncementViewing">
            <staff-announcement-form-component :data="announcements_id"></staff-announcement-form-component>
        </div>
        <div class="row" v-if="this.isNewsViewing">
            <staff-news-form-component :data="announcements_id"></staff-news-form-component>
        </div>
    </div>
</template>
<script>
    import VShowSlide from 'v-show-slide';
    Vue.use(VShowSlide);
    export default{
        props: {
        },
        data(){
            return {
                announcements : [],
                staff_id: '',
                ListNews : [],
                isAnnouncementLoading: false,
                isNewsLoading: false,
                isSlider: true,
                isAnnouncementAndNews: true,
                isAnnouncementViewing: false,
                isNewsViewing: false,
                isLoadData: false,
                announcements_id:'',
            }
        },
        mounted() {
            Event.$on('updateAnnouncement', () => {
                this.fetchAnnouncement();
            });

        },
        created() {
            this.fetchAnnouncement();
            this.fetchNews();
        },

        methods: {
            newAnnouncement(){
                this.isSlider = !this.isSlider;
                this.isAnnouncementCreating = !this.isAnnouncementCreating;
                this.isAnnouncementAndNews = !this.isAnnouncementAndNews;
            },
            AnnouncementView(item){
                this.announcements_id = item;
                this.isSlider = !this.isSlider;
                this.isAnnouncementViewing = !this.isAnnouncementViewing;
                this.isAnnouncementAndNews = !this.isAnnouncementAndNews;
            },
            NewsView(item){
                this.announcements_id = item;
                this.isSlider = !this.isSlider;
                this.isNewsViewing = !this.isNewsViewing;
                this.isAnnouncementAndNews = !this.isAnnouncementAndNews;
            },
            fetchAnnouncement(page = 1){
                this.isAnnouncementLoading = true;

                fetch('/api/v1/dashboard/list-announcement' + '?page='+ page).then(response => response.json())
                    .then(response => {

                        this.announcements = response.data;
                        this.$refs.pagination.makePagination(response.meta, response.links);
                        //turn off loading animation
                        this.isAnnouncementLoading = false;
                        this.isLoadData = true;
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