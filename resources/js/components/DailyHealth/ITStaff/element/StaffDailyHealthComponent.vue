<template>
    <div class="col-lg-12" style="margin-top: 0px">
        <div class="row border-bottom" >
            <div class="col-lg-12 text-left">
                <div class="row">
                    <div class="col-lg-1">{{this.staff.staff_no}}</div>
                    <div class="col-lg-3 text-info" style="margin-bottom: 10px">
                        <span style="font-size: 13px;">{{this.staff.full_name}}</span><br>
                        <!--<span style="font-size: 13px;">{{this.staff.company_from_name}}</span><br>-->
                        <!--<span style="font-size: 13px;">{{this.dailyhealth.mobile_no}}</span><br>-->
                    </div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-1  text-right">
                        <a @click="toggleEdit()" rel="tooltip" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                            <i class="fa fa-search-plus text-dark"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-lg-12">
                <div class="row" v-show-slide="isEditing">
                    <div class="col-12">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-6" style="">
                                            <div class="input-group no-border" style="display: flex; justify-content: flex-start ">
                                                <button class="btn btn-primary" @click="newDailyHealth()">
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
                                        <div class="col-12" style="display: flex; justify-content: flex-end ">
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
                        <div class="row" v-show-slide="this.isCreating">
                            <div class="card card-body">
                                <hr-staff-create-daily-health-form-component :id1="this.staff.company_id.id" :id2="this.staff.id"></hr-staff-create-daily-health-form-component>
                            </div>
                        </div>
                            <div class="row" v-if="!this.isCreating">
                                <div class="card card-body">
                                    <!--<loading-component v-if="isLoad" style=" display: flex; align-items: center; justify-content: center"></loading-component>-->
                                    <table class="table-responsive" v-if="!this.isSearching">
                                        <th> </th>
                                        <th>Daily Pack</th>
                                        <th>Sanitizing</th>
                                        <th>Overall Health</th>
                                        <th>Flu</th>
                                        <th>Cough</th>
                                        <th>Breathing Difficulty</th>
                                        <th>Sore Throat</th>
                                        <th>Weak in Limbs</th>
                                        <th></th>
                                        <th></th>
                                        <staff-element-daily-health-details-component  v-for="DailyHealth in DailyHealths " v-bind:key="DailyHealth.id" :data="DailyHealth" ></staff-element-daily-health-details-component>
                                    </table>
                                    <table class="table-responsive" v-if="this.isSearching">
                                        <th></th>
                                        <th >Daily Pack</th>
                                        <th>Sanitizing</th>
                                        <th>Overall Health</th>
                                        <th>Flu</th>
                                        <th>Cough</th>
                                        <th>Breathing Difficulty</th>
                                        <th>Sore Throat</th>
                                        <th>Weak in Limbs</th>
                                        <staff-element-daily-health-details-component  v-for="DailyHealth in DailyHealths " v-bind:key="DailyHealth.id" :data="DailyHealth" ></staff-element-daily-health-details-component>
                                    </table>
                                    <div style="display: flex; justify-content: flex-end" v-if="this.isSearching">
                                        <pagination-component ref="pagination" v-on:changePage="searchDailyHealths($event)"></pagination-component>
                                    </div>
                                    <div style="display: flex; justify-content: flex-end" v-if="!this.isSearching">
                                        <pagination-component ref="pagination" v-on:changePage="fetchDailyHealths($event)"></pagination-component>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['data','id1'],
        data() {
            return {
                staff: this.data,
                DailyHealths: [],
                searchQuery: '',
                isLoad: false,
                isSearching: false,
                isCreating: false,
                isEditing: false,
                isDeleting: false,
                isAssigning: false,
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
        mounted(){
            Event.$on('updateStaffHealthList', () => {
                this.fetchDailyHealths();
            });
            Event.$on('updateStaffHealthSearchList', () => {
                this.searchDailyHealths();
            });
        },
        created(){
            this.fetchDailyHealths();
        },
        methods:{
            newDailyHealth(){
                this.isCreating = !this.isCreating;
            },
            fetchDailyHealths(page = 1){
                this.isLoad = true;
                this.isSearching = false;
                fetch('/api/v1/dailyhealth/'+ this.staff.company_id.id + '/'+ this.staff.id +'/staff-personal-daily-health' + '?page='+ page).then(response => response.json())
                    .then(response => {

                        this.DailyHealths = response.data;
                        this.json_data = this.DailyHealths;
                        var currentDateWithFormat = new Date().toJSON().slice(0,10).replace(/-/g,'-');
                        this.file_name = this.staff.full_name+'-List-Health-Screening-'+ currentDateWithFormat + '.xls';

                        this.$refs.pagination.makePagination(response.meta, response.links);
                        this.isLoad = false;
                    })
                    .catch(error => console.log(error))
            },
            searchDailyHealths(page = 1){
                this.isLoad = true;
                this.isSearching = true;
                if(this.searchQuery){
                    fetch('/api/v1/dailyhealth/'+ this.staff.id +'/'+ this.searchQuery +'/search-staff-daily-health-by-date' + '?page='+ page).then(response => response.json())
                        .then(response => {

                            this.DailyHealths = response.data;

                            this.json_data = this.DailyHealths;

                            var currentDateWithFormat = new Date().toJSON().slice(0,10).replace(/-/g,'-');
                            this.file_name = this.staff.full_name+'-List-Health-Screening-'+ currentDateWithFormat + '.xls';

                            this.$refs.pagination.makePagination(response.meta, response.links);

                            this.isLoad = false;
                        })
                        .catch(error => console.log(error))
                }
                if(!this.searchQuery){
                    this.fetchDailyHealths();
                }

            },

            toggleEdit(){
                this.isEditing = !this.isEditing;
            },
            toggleDelete(){
                this.isDeleting = !this.isDeleting;
            },
            toggleAssign(){
                this.isAssigning = !this.isAssigning;
            },
        }
    }
</script>