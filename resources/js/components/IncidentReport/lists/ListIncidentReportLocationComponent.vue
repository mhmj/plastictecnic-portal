<template>
    <div>
        <loading-component v-show="isLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
        <div>
            <div class="table">
                <incident-report-element-component  v-for="IncidentReport in IncidentReports " v-bind:key="IncidentReport.id" :data="IncidentReport"></incident-report-element-component>
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
                IncidentReports: [],
                ListCompany:[],
                ListStaff:[],
                ListITAsset:[],
                ITAssetCategory:[],
                ITAssetBrand:[],
                ListDepartment:[],
                ListDesignation:[],
                items:[],
                serverurl: '3.0.245.237',
                isLoading: false,

            }
        },
        mounted() {
            Event.$on('updateIncidentReport', () => {
                this.fetchIncidentReport();
            });
            Event.$on('getCompanies', () => {
                this.getCompanies();
            });
            Event.$on('getITAssetCategories', () => {
                this.getITAssetCategories();
            });
            Event.$on('getITAssetBrands', () => {
                this.getITAssetBrands();
            });
            Event.$on('getStaff', () => {
                this.getStaff();
            });
            Event.$on('getITAsset', () => {
                this.getITAsset();
            });
            Event.$on('getDepartments', () => {
                this.getDepartments();
            });

            Event.$on('getDesignations', () => {
                this.getDesignations();
            });
        },
        created() {
            this.fetchIncidentReport();
            this.getCompanies();
            this.getITAssetCategories();
            this.getITAssetBrands();
            this.getStaff();
            this.getITAsset();
            this.getDepartments();
            this.getDesignations();
        },
        methods: {
            fetchIncidentReport(page = 1){
                this.isLoading = true;

                fetch('/api/v1/IncidentReport/'+ this.id1 +'/'+ this.category +'/list-incident-report' + '?page='+ page).then(response => response.json())
                    .then(response => {

                        this.IncidentReports = response.data;
                        this.$refs.pagination.makePagination(response.meta, response.links);

                        //turn off loading animation
                        this.isLoading = false;
                    })
                    .catch(error => console.log(error))
            },
            getCompanies(){
                axios.get('/api/v1/getCompany')
                    .then(function (response) {
                        this.ListCompany = response.data;
                    }.bind(this));
            },
            getITAssetCategories(){
                axios.get('/api/v1/getITAssetCategory')
                    .then(function (response) {
                        this.ITAssetCategory = response.data;
                    }.bind(this));
            },
            getITAssetBrands(){
                axios.get('/api/v1/getITAssetBrand')
                    .then(function (response) {
                        this.ITAssetBrand = response.data;
                    }.bind(this));
            },
            getStaff(){
                axios.get('/api/v1/getStaff')
                    .then(function (response) {
                        this.ListStaff = response.data;
                    }.bind(this));
            },
            getITAsset(){
                axios.get('/api/v1/getITAsset')
                    .then(function (response) {
                        this.ListITAsset = response.data;
                    }.bind(this));
            },
            getDepartments(){
                axios.get('/api/v1/getDepartment')
                    .then(function (response) {
                        this.ListDepartment = response.data;
                    }.bind(this));
            },
            getDesignations(){
                axios.get('/api/v1/getDesignation')
                    .then(function (response) {
                        this.ListDesignation = response.data;
                    }.bind(this));
            },
        }
    }
</script>