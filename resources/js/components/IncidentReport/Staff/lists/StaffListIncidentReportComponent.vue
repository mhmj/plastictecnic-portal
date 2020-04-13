<template>
    <div>
        <div class="row">
            <div class="col-12" style="margin-top:-20px; padding-top:0px; display: flex; justify-content: flex-end">
                <button @click="isCreatingButton()" type="button" class="btn btn-md btn-primary">
                    New
                </button>
            </div>
        </div>
        <loading-component v-show="isLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
        <div>
            <div class="table" v-if="isCreating">
                <staff-create-incident-report-form-component :companyID="this.id2"></staff-create-incident-report-form-component>
            </div>
            <div class="table">
                <staff-incident-report-element-component v-for="IncidentReport in IncidentReports " v-bind:key="IncidentReport.id" :data="IncidentReport"></staff-incident-report-element-component>
            </div>
            <div style="margin-top: 30px; justify-content: flex-end">
                <pagination-component ref="pagination" v-on:changePage="fetchIncidentReport($event)"></pagination-component>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            'id1': {
                type: String,
                required: true
            },
            'id2': {
                type: String,
                required: true
            }
        },
        data() {
            return {
                IncidentReports: [],
                items:[],
                serverurl: '3.0.245.237',
                isLoading: false,
                isCreating: false,

            }
        },
        mounted() {
            Event.$on('updateIncidentReport', () => {
                this.fetchIncidentReport();
            });

        },
        created() {
            this.fetchIncidentReport();
            console.log(this.id2)
        },
        methods: {
            isCreatingButton(){
                this.isCreating = !this.isCreating;
            },
            fetchIncidentReport(page = 1){
                this.isLoading = true;

                fetch('/api/v1/IncidentReport/staff/staff-list-incident-report/'+ this.id1 + '?page='+ page).then(response => response.json())
                    .then(response => {

                        this.IncidentReports = response.data;
                        this.$refs.pagination.makePagination(response.meta, response.links);

                        //turn off loading animation
                        this.isLoading = false;
                    })
                    .catch(error => console.log(error))
            },
        }
    }
</script>