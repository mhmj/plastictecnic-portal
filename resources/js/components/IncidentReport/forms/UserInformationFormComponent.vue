<template>
        <div>
            <label class="muted">Staff Name :</label>
            <span> {{this.StaffDetails.full_name}}</span>
        </div>

</template>
<script>
    export default {
        props: {
            'id': {
                type: Number,
            },
            'data': {
                type: Object,
            }
        },
        data(){
            return {
                StaffDetails: {
                    id: '',
                    full_name: '',
                    username: '',
                    email: '',
                    staff_no: '',
                    telephone_no: '',
                    phone_no: '',
                    company_id: {
                        id: '',
                        name: '',
                        location: '',
                        base: '',
                    },
                    designation_id: {
                        id: '',
                        name: '',
                    },
                    department_id: {
                        id: '',
                        name: '',
                    },
                },
            }
        },
        mounted(){

        },
        created() {
            if (this.data !== null) {
                this.StaffDetails = this.data;
                this.selectedStaff();
            }
        },
        methods: {
            selectedStaff(){

                var url = '/api/v1/getStaffDetails/' + this.StaffDetails.id;
                axios.get(url)
                    .then((response) => {
                        this.StaffDetails = response.data;
                        console.log(this.StaffDetails);
                        //this.IncidentReport.staff_id = this.StaffDetails;
                        //console.log(this.StaffDetails);
                    });

            }

        }
    }
</script>