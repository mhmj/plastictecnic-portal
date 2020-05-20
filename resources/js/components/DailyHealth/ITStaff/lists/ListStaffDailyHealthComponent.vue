<template>
    <div>
        <div>
            <div class="row" style=" margin-top: 0px">
                <div class="col-12" style="margin-bottom: 15px;">
                    <div class="row">
                        <div class="col-12" style=" display: flex; justify-content: flex-end ">
                            <div class="row" >
                                <form  @submit.prevent="searchStaff">
                                    <div style="margin-left: -20px" class="input-group no-border">
                                        <input type="text" v-on:change="searchStaff" v-model="searchQuery" class="form-control" placeholder="Search...">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <a @submit.prevent="searchStaff">
                                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!--<div class="col-lg-5" style=" display: flex; justify-content: flex-end ">-->
                                    <!--<form @submit.prevent="searchDailyHealths">-->
                                        <!--<div class="input-group no-border">-->
                                            <!--<download-excel-->
                                                    <!--class   = "btn"-->
                                                    <!--style="background-color: #2b5797;"-->
                                                    <!--:data   = "json_data"-->
                                                    <!--type    = "csv"-->
                                                    <!--worksheet = "My Worksheet"-->
                                                    <!--:name    = "this.file_name">-->

                                                <!--Download Excel-->
                                            <!--</download-excel>-->
                                        <!--</div>-->
                                    <!--</form>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <loading-component v-show="isLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
            <div>
                <div class="table" v-if="!this.isSearching">
                    <staff-element-daily-health-element-component  v-for="staff in Staffs " v-bind:key="staff.id" :data="staff"></staff-element-daily-health-element-component>
                    <pagination-component ref="pagination" v-on:changePage="fetchStaff($event)"></pagination-component>
                </div>
                <div class="table" v-if="this.isSearching">
                    <staff-element-daily-health-element-component  v-for="staff in Staffs " v-bind:key="staff.id" :data="staff"></staff-element-daily-health-element-component>
                    <pagination-component ref="pagination" v-on:changePage="searchStaff($event)"></pagination-component>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

    export default {
        props: {
            'category': {
                type: String,
                required: true
            },
            'id1': {
                type: String,
                required: true
            }
        },
        data() {
            return {
                Staffs: [],
                DailyHealths: [],
                searchQuery: '',
                isLoading: false,
                isSearching: false,
            }
        },
        mounted() {
            Event.$on('updateStaffList', () => {
                this.fetchStaff();
            });
            Event.$on('updateSearchStaff', () => {
                this.searchStaff();
            });
        },
        created() {
            this.fetchStaff();
        },
        methods: {
            fetchStaff(page = 1){
                this.isLoading = true;
                this.isSearching = false;
                fetch('/api/v1/staff/'+ this.id1 +'/'+ this.category +'/list-staff' + '?page='+ page).then(response => response.json())
                    .then(response => {
                        this.Staffs = response.data;
                        this.$refs.pagination.makePagination(response.meta, response.links);
                        this.isLoading = false;
                    })
                    .catch(error => console.log(error))
            },
            searchStaff(page = 1){
                this.isLoading = true;
                this.isSearching = true;
                if(this.searchQuery){
                    fetch('/api/v1/staff/'+ this.id1 +'/'+ this.searchQuery +'/search-staff' + '?page='+ page).then(response => response.json())
                        .then(response => {

                            this.Staffs = response.data;
                            this.$refs.pagination.makePagination(response.meta, response.links);

                            //turn off loading animation
                            this.isLoading = false;
                        })
                        .catch(error => console.log(error))
                }
                if(!this.searchQuery){
                    this.fetchStaff();
                }

            },
//            searchDailyHealths(page = 1){
//                this.isLoading = true;
//                this.isSearching = true;
//                if(this.searchQuery){
//                    fetch('/api/v1/dailyhealth/'+ this.id1 +'/'+ this.searchQuery +'/search-visitor-daily-health' + '?page='+ page).then(response => response.json())
//                        .then(response => {
//
//                            this.DailyHealths = response.data;
//
//                            this.json_data = this.DailyHealths;
//
//                            var currentDateWithFormat = new Date().toJSON().slice(0,10).replace(/-/g,'-');
//                            this.file_name = 'Visitor-Daily-Health-'+ currentDateWithFormat + '.xls';
//
//                            this.$refs.pagination.makePagination(response.meta, response.links);
//
//                            this.isLoading = false;
//                        })
//                        .catch(error => console.log(error))
//                }
//                if(!this.searchQuery){
//                    this.fetchDailyHealths();
//                }
//
//            },


        }
    }
</script>