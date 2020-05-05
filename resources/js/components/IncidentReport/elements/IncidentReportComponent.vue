<template>
    <div>
        <div class="row border-bottom" style="margin-bottom: 10px">
            <div class="col-lg-8 text-left">
                <div class="row">
                    <div class="col-lg-2-auto">
                        <div :class="[{'btn-info': this.IncidentReport.asset_id.company.id === 1},{'btn-success': this.IncidentReport.asset_id.company.id === 2}, {'btn-warning': this.IncidentReport.asset_id.company.id === 3}, {'btn-info': this.IncidentReport.asset_id.company.id === 4},'card']">
                            <div class="card-body"  style="padding: 8px;">
                                <div v-if="this.IncidentReport.ticket_no === null  ">
                                    <span class="fs-10 muted text-primary" style="font-size: 15px; font-weight: 600;">-</span>
                                </div>
                                <div v-else="this.IncidentReport.ticket_no !== null ">
                                    <span class="fs-10 muted" style="font-size: 15px;">
                                        <span class="fs-20 text-white" style="font-size: 15px; font-weight: 600;">
                                            #{{IncidentReport.ticket_no}}
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6" style="padding-bottom: 10px">
                        <div>
                            <span class="fs-10 muted" style="font-size: 14px;"> Category :</span>
                            <span class="fs-10 muted text-primary" style="font-size: 14px;"> {{this.IncidentReport.incident_category}}</span>
                        </div>
                        <div>
                            <span class="fs-10 muted" style="font-size: 14px;"> Root Cause :</span>
                            <span class="fs-10 muted text-primary" style="font-size: 15px;"> {{this.IncidentReport.root_cause}}</span>
                        </div>
                        <div>
                            <span class="fs-10 muted" style="font-size: 14px;"> Company :</span>
                            <span class="fs-18 text-primary" style="font-size: 14px;">
                            {{IncidentReport.asset_id.company.name}} - {{IncidentReport.asset_id.company.base}}
                        </span><br>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div v-if="this.IncidentReport.staff_id === null  ">
                            <span class="fs-10 muted" style="font-size: 14px;"> Issue By : - </span>
                        </div>
                        <div v-else="this.IncidentReport.staff_id !== null " style="margin-bottom: 5px">
                            <span class="fs-10 muted" style="font-size: 14px;"> Issue By :
                                <span class="fs-20 text-primary" style="font-size: 14px;">
                                    {{IncidentReport.staff_id.full_name}} ( {{IncidentReport.staff_id.staff_no}} )
                                </span><br>
                                 Email :<span class="fs-20 text-primary" style="font-size: 14px;">
                                    {{IncidentReport.staff_id.email}}
                                </span>
                            </span>
                        </div>
                        <div v-if="this.IncidentReport.handle_by === null  ">
                            <span class="fs-10 muted" style="font-size: 14px;"> Handle By : - </span>
                        </div>
                        <div v-else="this.IncidentReport.handle_by !== null ">
                            <span class="fs-10 muted" style="font-size: 14px;"> Handle By :
                                <span class="fs-20 text-primary" style="font-size: 14px;">
                                    {{IncidentReport.handle_by.full_name}} ( {{IncidentReport.handle_by.staff_no}} )
                                </span>
                            </span>
                        </div>
                        <div>
                            <span class="fs-10 muted" style="font-size: 14px;"> Status :</span>
                            <span class="fs-10 muted" style="font-size: 14px;">
                                <span :class="[{'text-success': IncidentReport.status === 'Closed'}, {'text-warning': IncidentReport.status === 'Pending 1'}, {'text-warning': IncidentReport.status === 'Pending 2'}, {'text-danger': IncidentReport.status === 'KIV'}, {'text-info': IncidentReport.status === 'Received'} ]" style="font-size: 14px;">
                                    {{this.IncidentReport.status}}
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row" style=" margin-bottom: 10px; ">

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
        props:
            ['data'],
            'id1': {
                type: String,
                required: true
            },
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