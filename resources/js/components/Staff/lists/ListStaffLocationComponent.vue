<template>
    <div>
        <loading-component v-show="isLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
        <div>
            <div class="table">
                <staff-element-component  v-for="staff in staffs" v-bind:key="staff.id" :data="staff"></staff-element-component>
            </div>
            <div style="margin-top: 30px; justify-content: flex-end">
                <pagination-component ref="pagination" v-on:changePage="fetchStaff($event)"></pagination-component>
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
                staffs: [],
                items:[],
                isLoading: false,

            }
        },
        mounted() {
            Event.$on('updateStaffList', () => {
                this.fetchStaff();
            });
        },
        created() {
            this.fetchStaff();
        },
        methods: {
            fetchStaff(page = 1){
                this.isLoading = true;
                fetch('/api/v1/staff/'+ this.id1 +'/'+ this.category +'/list-staff' + '?page='+ page).then(response => response.json())
                    .then(response => {

                        this.staffs = response.data;
                        this.$refs.pagination.makePagination(response.meta, response.links);
                        this.isLoading = false;
                    })
                    .catch(error => console.log(error))
            },
        }
    }
</script>