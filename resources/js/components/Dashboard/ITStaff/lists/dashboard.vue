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
                        <div class="dropdown">
                            <button v-on:click="newAnnouncement" type="button" class="btn btn-round btn-outline-default btn-simple btn-icon no-caret">
                                <i class="now-ui-icons ui-1_simple-add"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <loading-component v-show="isAnnouncementLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
                        <div class="table" v-if="isLoadData">
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
                            <button v-on:click="newNews" type="button" class="btn btn-round btn-outline-default btn-simple btn-icon no-caret">
                                <i class="now-ui-icons ui-1_simple-add"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <loading-component v-show="isNewsLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
                        <div class="table">
                            <news-element-component v-for="news in ListNews" v-bind:key="news.id" :data="news"></news-element-component>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" v-if="this.isAnnouncementEditing">
            <announcement-form-component :id1="staff_id" :data="announcements_id"></announcement-form-component>
        </div>
        <div class="row" v-if="this.isAnnouncementDeleting">
            <delete-announcement-form-component :id1="staff_id" :data="announcements_id"></delete-announcement-form-component>
        </div>
        <div class="row" v-show="this.isAnnouncementCreating">
            <create-announcement-form-component :id1="staff_id"></create-announcement-form-component>
        </div>
        <div class="row" v-show="this.isNewsCreating">
            <create-news-form-component :id1="staff_id"></create-news-form-component>
        </div>
        <div class="row" v-if="this.isNewsEditing">
            <news-form-component :id1="staff_id" :data="news_id"></news-form-component>
        </div>
        <div class="row" v-if="this.isNewsDeleting">
            <delete-news-form-component :id1="staff_id" :data="news_id"></delete-news-form-component>
        </div>
    </div>
</template>
<script>
    import VShowSlide from 'v-show-slide';
    Vue.use(VShowSlide);
    export default{
        props: {
            'id1': {
                type: String,
                required: true
            },
        },
        data(){
            return {
                announcements : [],
                ListNews : [],
                staff_id: '',
                announcements_id:'',
                news_id:'',
                isSlider: true,
                isLoadData: false,
                isAnnouncementAndNews: true,
                isAnnouncementLoading: false,
                isAnnouncementCreating: false,
                isAnnouncementEditing: false,
                isAnnouncementDeleting: false,
                isNewsLoading: false,
                isNewsCreating: false,
                isNewsEditing: false,
                isNewsDeleting: false,

            }
        },
        mounted() {
            Event.$on('updateAnnouncement', () => {
                this.fetchAnnouncement();
            });
            Event.$on('updateNews', () => {
                this.fetchNews();
            });

        },
        created() {
            this.staff_id = this.id1;
            this.fetchAnnouncement();
            this.fetchNews();
        },

        methods: {
            newAnnouncement(){
              this.isSlider = !this.isSlider;
              this.isAnnouncementCreating = !this.isAnnouncementCreating;
              this.isAnnouncementAndNews = !this.isAnnouncementAndNews;
            },
            newNews(){
                this.isSlider = !this.isSlider;
                this.isNewsCreating = !this.isNewsCreating;
                this.isAnnouncementAndNews = !this.isAnnouncementAndNews;
            },
            AnnouncementEdit(item){
                this.announcements_id = item;
                this.isSlider = !this.isSlider;
                this.isAnnouncementAndNews = !this.isAnnouncementAndNews;
                this.isAnnouncementEditing = !this.isAnnouncementEditing;
                //this.isAnnouncementDeleting = !this.isAnnouncementDeleting;
            },

            NewsEdit(item){
                this.news_id = item;
                this.isSlider = !this.isSlider;
                this.isAnnouncementAndNews = !this.isAnnouncementAndNews;
                this.isNewsEditing = !this.isNewsEditing;
            },
            AnnouncementDelete(item){
                this.announcements_id = item;
                this.isSlider = !this.isSlider;
                this.isAnnouncementAndNews = !this.isAnnouncementAndNews;
                this.isAnnouncementDeleting = !this.isAnnouncementDeleting;
            },
            NewsDelete(item){
                this.news_id = item;
                this.isSlider = !this.isSlider;
                this.isAnnouncementAndNews = !this.isAnnouncementAndNews;
                this.isNewsDeleting = !this.isNewsDeleting;
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