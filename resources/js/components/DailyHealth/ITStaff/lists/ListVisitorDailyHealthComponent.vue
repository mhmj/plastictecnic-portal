<template>
    <div class="row">
        <div class="col-12">
            <div v-show-slide="!this.isCreating">
                <div class="row" style=" margin-top: 0px">
                    <div class="col-12" style="margin-bottom: 15px;">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-6" style="">
                                        <div class="input-group no-border" style="display: flex; justify-content: flex-start ">
                                            <button class="btn btn-primary" @click="newVisitor()">
                                                New
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-6" style="display: flex; justify-content: flex-end;">
                                        <form @submit.prevent="searchDailyHealths">
                                            <div class="input-group no-border" style=" margin-right: 10px">
                                                <download-excel
                                                        class   = "btn"
                                                        style="background-color: #2b5797;"
                                                        :data   = "json_data"
                                                        type    = "csv"
                                                        worksheet = "My Worksheet"
                                                        :name    = "this.file_name">

                                                    Download Excel
                                                </download-excel>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4" style="">
                                <div class="row">
                                    <div class="col-12" style="margin-top: 8px; display: flex; justify-content: flex-end ">
                                        <form @submit.prevent="searchDailyHealths">
                                            <el-date-picker
                                                    v-on:change="searchDailyHealths"
                                                    v-model="searchQuery"
                                                    type="daterange"
                                                    start-placeholder="Start date"
                                                    end-placeholder="End date"
                                                    format="yyyy/MM/dd"
                                                    value-format="yyyy-MM-dd">
                                            </el-date-picker>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <loading-component v-show="isLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
                <div>
                    <div class="table" v-if="this.isSearching">
                        <daily-health-element-component  v-for="dailyhealth in DailyHealths " v-bind:key="dailyhealth.id" :data="dailyhealth"></daily-health-element-component>
                        <pagination-component ref="pagination" v-on:changePage="searchDailyHealths($event)"></pagination-component>
                    </div>
                    <div class="table" v-if="!this.isSearching">
                        <daily-health-element-component  v-for="dailyhealth in DailyHealths " v-bind:key="dailyhealth.id" :data="dailyhealth"></daily-health-element-component>
                        <pagination-component ref="pagination" v-on:changePage="fetchDailyHealths($event)"></pagination-component>
                    </div>
                </div>
            </div>
            <div v-show-slide="this.isCreating">
                <create-daily-health-form-component :id1="this.id1"></create-daily-health-form-component>
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
                DailyHealths: [],
                searchQuery: '',
                isLoading: false,
                isCreating: false,
                isSearching: false,
                file_name: '',
//                json_fields: {
//                    'Company': 'Company',
//                    'Name': 'Name',
//                },
                //json_data_1: [],
                json_data: [],
                json_meta: [
                    [
                        {
                            'key': 'charset',
                            'value': 'utf-8'
                        }
                    ]
                ],

            }
        },
        mounted() {
            Event.$on('updateVisitorList', () => {
                this.fetchDailyHealths();
            });
            Event.$on('updateVisitorSearchList', () => {
                this.searchDailyHealths();
            });
        },
        created() {
            this.fetchDailyHealths();
        },
        methods: {

            newVisitor(){
                this.isCreating = !this.isCreating;
            },
            searchDailyHealths(page = 1){
                this.isLoading = true;
                this.isSearching = true;
                if(this.searchQuery){
                    fetch('/api/v1/dailyhealth/'+ this.id1 +'/'+ this.searchQuery +'/search-visitor-daily-health' + '?page='+ page).then(response => response.json())
                        .then(response => {

                            this.DailyHealths = response.data;

                            this.json_data = this.DailyHealths;

                            var currentDateWithFormat = new Date().toJSON().slice(0,10).replace(/-/g,'-');
                            this.file_name = 'Visitor-Daily-Health-'+ currentDateWithFormat + '.xls';

                            this.$refs.pagination.makePagination(response.meta, response.links);

                            this.isLoading = false;
                        })
                        .catch(error => console.log(error))
                }
                if(!this.searchQuery){
                    this.fetchDailyHealths();
                }

            },
            fetchDailyHealths(page = 1){
                this.isLoading = true;
                this.isSearching = false;
                fetch('/api/v1/dailyhealth/'+ this.id1 +'/'+ this.category +'/list-visitor-daily-health' + '?page='+ page).then(response => response.json())
                    .then(response => {

                        this.DailyHealths = response.data;
                        this.json_data = this.DailyHealths;
//                        this.json_data_1 = [{
//
//                            'Company': this.DailyHealths[0].company_id,
//                            'Name': this.DailyHealths[0].name,
//                        }]


                        var currentDateWithFormat = new Date().toJSON().slice(0,10).replace(/-/g,'-');
                        this.file_name = 'Visitor-Daily-Health-'+ currentDateWithFormat + '.xls';

                        this.$refs.pagination.makePagination(response.meta, response.links);
                        this.isLoading = false;
                    })
                    .catch(error => console.log(error))
            },

        }
    }
</script>