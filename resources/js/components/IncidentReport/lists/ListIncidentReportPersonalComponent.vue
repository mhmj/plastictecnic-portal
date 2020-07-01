<template>
    <div>
        <loading-component v-show="isLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
        <div>
            <div class="table">
                <incident-report-element-component v-for="IncidentReport in IncidentReports " v-bind:key="IncidentReport.id" :data="IncidentReport"></incident-report-element-component>
            </div>
            <div style="margin-top: 30px; justify-content: flex-end">
                <pagination-component ref="pagination" v-on:changePage="fetchPersonalIncidentReport($event)"></pagination-component>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            'staff_id': {
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
                IncidentReports: [],
                isLoading: false,

            }
        },
        mounted() {
            Event.$on('updateIncidentReport', () => {
                this.fetchPersonalIncidentReport();
            });

        },
        created() {
            this.fetchPersonalIncidentReport();
        },
        methods: {
            fetchPersonalIncidentReport(page = 1){
                this.isLoading = true;

                fetch('/api/v1/IncidentReport/'+ this.id1 + '/' + this.staff_id +'/list-incident-report-personal' + '?page='+ page).then(response => response.json())
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