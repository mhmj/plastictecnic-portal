<template>
    <div>
        <div>
            <el-tabs type="border-card">
                <el-tab-pane label="All">
                    <div class="row">
                        <div class="col-6" style="display: flex; justify-content: flex-start;">
                            <download-excel
                                    class   = "btn"
                                    style="background-color: #2b5797; margin-top: 0px"
                                    :data   = "json_data"
                                    type    = "csv"
                                    worksheet = "My Worksheet"
                                    :name    = "this.file_name">

                                Download Excel
                            </download-excel>
                        </div>
                        <div class="col-6" style="display: flex; justify-content: flex-end ">
                            <form @submit.prevent="searchDailyHealths">
                                <el-date-picker
                                        v-on:change="searchDailyHealths"
                                        v-model="searchDailyHealth"
                                        type="daterange"
                                        start-placeholder="Start date"
                                        end-placeholder="End date"
                                        format="yyyy/MM/dd"
                                        value-format="yyyy-MM-dd">
                                </el-date-picker>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <el-table
                                    stripe
                                    :data="DailyHealths"
                                    :default-sort = "{prop: 'created_at', order: 'descending'}"
                                    style="width: 100%"
                                    height="600">
                                <el-table-column
                                        type="index"
                                        :min-width="2"
                                        :index="indexMethod">
                                </el-table-column>
                                <el-table-column
                                        prop="temperature"
                                        label=""
                                        :min-width="6"
                                >
                                </el-table-column>
                                <el-table-column
                                        prop="staff_name"
                                        label="Name"
                                        :min-width="30"
                                >
                                </el-table-column>
                                <el-table-column
                                        sortable
                                        prop="created_at"
                                        label="Date"
                                        :min-width="12"
                                >
                                </el-table-column>
                                <el-table-column
                                        prop="daily_starter_pack"
                                        label="D.P"
                                        :min-width="10"
                                >
                                </el-table-column>
                                <el-table-column
                                        prop="hand_sanitizing"
                                        label="S"
                                        :min-width="10"
                                >
                                </el-table-column>
                                <el-table-column
                                        prop="overall_health"
                                        label="O.H"
                                        :min-width="10"
                                >
                                </el-table-column>
                                <el-table-column
                                        prop="flu"
                                        label="F"
                                        :min-width="10"
                                >
                                </el-table-column>
                                <el-table-column
                                        prop="cough"
                                        label="C"
                                        :min-width="10"
                                >
                                </el-table-column>
                                <el-table-column
                                        prop="breathing_difficulty"
                                        label="B.D"
                                        :min-width="10"
                                >
                                </el-table-column>
                                <el-table-column
                                        prop="sore_throat"
                                        label="S.T"
                                        :min-width="10"
                                >
                                </el-table-column>
                                <el-table-column
                                        prop="weak_in_limbs"
                                        label="W.L"
                                        :min-width="10"
                                >
                                </el-table-column>
                                <el-table-column
                                        label=""
                                        :min-width="5">
                                    <template slot-scope="scope">
                                        <el-popover
                                                trigger="click"
                                                placement="left"
                                                width="160"
                                                :v-model="visible">
                                            <p class="text-danger">Are you sure to <br> delete this?</p>
                                            <div style="text-align: right; margin: 0">
                                                <el-button type="danger" size="mini" @click="DeleteDailyHealths(scope.row)">Confirm</el-button>
                                                <!--<el-button style="margin-top: 5px" size="mini" type="default" @click="closePopover">Cancel</el-button>-->
                                            </div>
                                            <el-button style="border: none; padding: 0px " slot="reference"> <i class="fa fa-trash text-danger"></i></el-button>
                                        </el-popover>
                                    </template>
                                </el-table-column>
                            </el-table>
                        </div>
                    </div>
                </el-tab-pane>
                <el-tab-pane label="Individual">
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
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <loading-component v-show="isLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
                    <div class="row">
                        <div class="table" v-if="!this.isSearching">
                            <staff-element-daily-health-element-component  v-for="staff in Staffs " v-bind:key="staff.id" :data="staff"></staff-element-daily-health-element-component>
                            <pagination-component ref="pagination" v-on:changePage="fetchStaff($event)"></pagination-component>
                        </div>
                        <div class="table" v-if="this.isSearching">
                            <staff-element-daily-health-element-component  v-for="staff in Staffs " v-bind:key="staff.id" :data="staff"></staff-element-daily-health-element-component>
                            <pagination-component ref="pagination" v-on:changePage="searchStaff($event)"></pagination-component>
                        </div>
                    </div>
                </el-tab-pane>
                <el-tab-pane label="Unattend">
                    <div class="row">
                        <div class="col-lg-12" style="display: flex; justify-content: flex-end">
                            <el-date-picker
                                    v-on:change="fetchUnAttendStaff"
                                    v-model="searchUnAttendStaffQuery"
                                    type="date"
                                    placeholder="Pick a date"
                                    format="yyyy/MM/dd"
                                    value-format="yyyy-MM-dd">
                            </el-date-picker>
                        </div>
                    </div>
                    <el-table
                            :data="UnAttendStaff"
                            :default-sort = "{prop: 'full_name', order: 'ascending'}"
                            style="width: 100%"
                            height="700">
                        <el-table-column
                                fixed
                                type="index"
                                :min-width="20"
                                :index="indexMethod">
                        </el-table-column>
                        <el-table-column
                                fixed
                                sortable
                                prop="full_name"
                                label="Name"
                                :min-width="80">
                        </el-table-column>
                    </el-table>
                </el-tab-pane>
            </el-tabs>
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
                visible: false,
                DailyHealths: [{
                    id:'',
                    staff_id:'',
                    staff_no:'',
                    staff_name: '',
                    company_id: '',
                    company_name: '',
                    daily_starter_pack: '',
                    hand_sanitizing: '',
                    flu: '',
                    cough: '',
                    breathing_difficulty: '',
                    sore_throat: '',
                    weak_in_limbs: '',
                    overall_health: '',
                    temperature: '',
                    remark: '',
                    created_at: '',
                    updated_at: '',
                }],
                UnAttendStaff: [{
                    full_name: '',
                }],
                searchQuery: '',
                searchDailyHealth: '',
                searchUnAttendStaffQuery: '',
                isLoading: false,
                isSearching: false,
                file_name: '',
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
            Event.$on('updateStaffList', () => {
                this.fetchStaff();
            });
            Event.$on('updateSearchStaff', () => {
                this.searchStaff();
            });
            Event.$on('updateDailyHealth', () => {
                this.fetchDailyHealth();
            });
            Event.$on('updateUnAttendStaff', () => {
                this.fetchUnAttendStaff();
            });
        },
        created() {
            this.fetchStaff();
            this.fetchDailyHealth();
            this.fetchUnAttendStaff();
        },
        methods: {
            DeleteDailyHealths(row){
                var url = '/api/v1/dailyhealth/'+ row.id +'/delete-staff-personal-daily-health', method = 'delete';
                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    if(!this.searchDailyHealth){
                        this.fetchDailyHealth();
                        Event.$emit('updateStaffHealthList');
                    }
                    if(this.searchDailyHealth){
                        this.searchDailyHealths();
                        //Event.$emit('updateStaffHealthList');
                    }
                    //this.fetchDailyHealth();
                })
            },
            indexMethod(index) {
                return index +1;
            },
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
            fetchDailyHealth(){
                var todayDate = new Date().toISOString().slice(0,10);
                fetch('/api/v1/dailyhealth/'+ this.id1 +'/' + todayDate + '/list-all-staff-daily-health').then(response => response.json())
                    .then(response => {
                        this.DailyHealths = response.data;
                        this.json_data = this.DailyHealths;
                        var currentDateWithFormat = new Date().toJSON().slice(0,10).replace(/-/g,'-');
                        this.file_name = 'List-Health-Screening-'+ currentDateWithFormat + '.xls';
                        //this.$refs.pagination.makePagination(response.meta, response.links);
                    })
                    .catch(error => console.log(error))

            },
            fetchUnAttendStaff(){
                if(!this.searchUnAttendStaffQuery)
                {
                    var todayDate = new Date().toISOString().slice(0,10);
                    fetch('/api/v1/dailyhealth/'+ this.id1 +'/' + todayDate + '/list-all-not-done-staff-personal-daily-health').then(response => response.json())
                        .then(response => {
                            this.UnAttendStaff = response;
                        })
                        .catch(error => console.log(error))
                }
                if(this.searchUnAttendStaffQuery)
                {
                    fetch('/api/v1/dailyhealth/'+ this.id1 +'/' + this.searchUnAttendStaffQuery + '/list-all-not-done-staff-personal-daily-health').then(response => response.json())
                        .then(response => {
                            this.UnAttendStaff = response;
                        })
                        .catch(error => console.log(error))
                }


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
            searchDailyHealths(){
                if(this.searchDailyHealth){
                    fetch('/api/v1/dailyhealth/'+ this.id1 +'/'+ this.searchDailyHealth +'/search-all-daily-health-by-date').then(response => response.json())
                        .then(response => {

                            this.DailyHealths = response.data;
                            this.json_data = this.DailyHealths;
                            this.file_name = 'List-Health-Screening.xls';

//                            var currentDateWithFormat = new Date().toJSON().slice(0,10).replace(/-/g,'-');
//                            this.file_name = this.staff.full_name+'-List-Health-Screening-'+ currentDateWithFormat + '.xls';
//
//                            this.$refs.pagination.makePagination(response.meta, response.links);

                        })
                        .catch(error => console.log(error))
                }
                if(!this.searchDailyHealth){
                    this.fetchDailyHealth();
                }

            },
        }
    }
</script>