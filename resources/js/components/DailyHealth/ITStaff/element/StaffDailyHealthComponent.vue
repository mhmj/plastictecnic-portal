<template>
    <div style="margin-top: 0px">
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
                    <div class="col-lg-12">
                        <div class="card card-body " >
                            <div class="row" style="display: flex; justify-content: flex-end">
                                <form @submit.prevent="">
                                    <el-date-picker
                                            type="date"
                                            placeholder="Pick a Date"
                                            format="yyyy/MM/dd"
                                            value-format="yyyy-MM-dd">
                                    </el-date-picker>
                                </form>
                            </div>
                            <div class="row">
                                <table class="table-responsive">
                                    <th></th>
                                    <th>Daily Pack</th>
                                    <th>Sanitizing</th>
                                    <th>Overall Health</th>
                                    <th>Flu</th>
                                    <th>Cough</th>
                                    <th>Breathing Difficulty</th>
                                    <th>Sore Throat</th>
                                    <th>Weak in Limbs</th>
                                    <staff-element-daily-health-details-component v-for="DailyHealth in DailyHealths " v-bind:key="DailyHealth.id" :data="DailyHealth" ></staff-element-daily-health-details-component>
                                </table>
                            </div>
                            <div class="row" style="display: flex; justify-content: flex-end">
                                <pagination-component ref="pagination" v-on:changePage="fetchDailyHealths($event)"></pagination-component>
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
                isEditing: false,
                isDeleting: false,
                isAssigning: false,
            }
        },
        mounted(){
            Event.$on('toggleEdit', () => {
                this.toggleEdit();
            });
            Event.$on('toggleDelete', () => {
                this.toggleDelete();
            });
        },
        created(){
            this.fetchDailyHealths();
        },
        methods:{
            fetchDailyHealths(page = 1){
                this.isLoading = true;
                this.isSearching = false;
                fetch('/api/v1/dailyhealth/'+ this.staff.company_id.id + '/'+ this.staff.id +'/staff-personal-daily-health' + '?page='+ page).then(response => response.json())
                    .then(response => {

                        this.DailyHealths = response.data;
                        this.$refs.pagination.makePagination(response.meta, response.links);
                        this.isLoading = false;
                    })
                    .catch(error => console.log(error))
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