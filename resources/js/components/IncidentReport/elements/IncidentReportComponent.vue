<template>
    <div>
        <div class="row border-bottom" style="margin-bottom: 10px">
            <div class="col-lg-8 text-left">
                <div class="row">
                    <div class="col-lg-6">
                        <div v-if="this.IncidentReport.asset_id === null  ">
                            <span class="fs-10 muted" style="font-size: 15px;">-</span>
                        </div>
                        <div v-else="this.IncidentReport.asset_id !== null ">
                            <span class="fs-10 muted" style="font-size: 15px;"> Asset :
                                <!--<span class="fs-20" style="font-size: 14px; color: #007bff" v-for="listasset in this.$parent.ListITAsset" v-if="listasset.id == IncidentReport.asset_id.id">-->
                                    <!--{{listasset.computer_name}} - {{listasset.serial_no}}-->
                                <!--</span>-->
                                <span class="fs-20" style="font-size: 14px; color: #007bff">
                                    {{IncidentReport.asset_id.computer_name}} - {{IncidentReport.asset_id.serial_no}}
                                </span>
                            </span>
                        </div>
                        <div>
                            <span class="fs-10 muted" style="font-size: 15px;"> Category :</span>
                            <span class="fs-10 muted" style="font-size: 15px; color: #da532c"> {{this.IncidentReport.incident_category}}</span>
                        </div>
                        <div>
                            <span class="fs-10 muted" style="font-size: 15px;"> Root Cause :</span>
                            <span class="fs-10 muted" style="font-size: 15px; color: #da532c"> {{this.IncidentReport.root_cause}}</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div v-if="this.IncidentReport.staff_id === null  ">
                            <span class="fs-10 muted" style="font-size: 15px;"> Issue By : - </span>
                        </div>
                        <div v-else="this.IncidentReport.staff_id !== null ">
                            <span class="fs-10 muted" style="font-size: 15px;"> Issue By :
                                <span class="fs-20" style="font-size: 14px; color: #da532c">
                                    {{IncidentReport.staff_id.full_name}} ( {{IncidentReport.staff_id.staff_no}} )
                                </span>
                            </span>
                        </div>
                        <div v-if="this.IncidentReport.handle_by === null  ">
                            <span class="fs-10 muted" style="font-size: 15px;"> Handle By : - </span>
                        </div>
                        <div v-else="this.IncidentReport.handle_by !== null ">
                            <span class="fs-10 muted" style="font-size: 15px;"> Handle By :
                                <span class="fs-20 text-success" style="font-size: 14px; color: #da532c">
                                    {{IncidentReport.handle_by.full_name}} ( {{IncidentReport.handle_by.staff_no}} )
                                </span>
                            </span>
                        </div>
                        <div>
                            <span class="fs-10 muted" style="font-size: 15px;"> Status :</span>
                            <span class="fs-10 muted" style="font-size: 15px;">
                                <span :class="[{'text-success': IncidentReport.status === 'Fixed'}, {'text-warning': IncidentReport.status === 'On Process'} ]" style="font-size: 15px;">
                                    {{this.IncidentReport.status}}
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row" style=" margin-bottom: 10px; ">
                    <div class="col">
                        <span class="fs-18" style="font-size: 12px;">
                            {{IncidentReport.asset_id.company.name}} {{IncidentReport.asset_id.company.location}} - {{IncidentReport.asset_id.company.base}}
                        </span><br>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-right" style="margin-bottom: 10px; margin-top: -10px">
                <a @click="toggleEdit()" rel="tooltip" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                    <i class="fas fa-pencil-alt text-dark"></i>
                </a>
                <a @click="toggleDelete()" rel="tooltip" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                    <i class="fas fa-trash text-danger"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="table" v-show="isEditing">
                <div class="card card-body" >
                    <incident-report-form-component v-bind:id="IncidentReport.id" :data="IncidentReport"></incident-report-form-component>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table" v-show="isDeleting">
                <div class="card card-body" >
                    <delete-incident-report-form-component v-bind:id="IncidentReport.id" :data="IncidentReport"></delete-incident-report-form-component>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                IncidentReport: this.data,
                staff_id: '',
                handle_by:'',
                ITAssetID: '',
                isEditing: false,
                isDeleting: false,
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
        },
        methods:{
            toggleEdit(){
                this.isEditing = !this.isEditing;
            },
            toggleDelete(){
                this.isDeleting = !this.isDeleting;
            },
        }
    }
</script>