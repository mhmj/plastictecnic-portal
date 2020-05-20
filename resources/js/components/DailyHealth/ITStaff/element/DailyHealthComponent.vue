<template>
    <div style="margin-top: 0px">
        <div class="row border-bottom" >
            <div class="col-lg-12 text-left">
                <div class="row">
                    <div class="col-lg-1">
                        <span style="font-size: 16px; font-weight: bold" :style="[this.dailyhealth.temperature <= '37.5' ? {'color': 'green'} :{'color': 'red'}]">{{this.dailyhealth.temperature}} &#8451;</span><br>
                    </div>
                    <div class="col-lg-3 text-info" style="margin-bottom: 10px">
                        <span style="font-size: 13px;">{{this.dailyhealth.name}}</span><br>
                        <span style="font-size: 13px;">{{this.dailyhealth.company_from_name}}</span><br>
                        <span style="font-size: 13px;">{{this.dailyhealth.mobile_no}}</span><br>
                    </div>
                    <div class="col-lg-3">
                        <span style="font-size: 13px;">{{this.dailyhealth.person_to_meet}}</span><br>
                    </div>
                    <div class="col-lg-2">
                        <span style="font-size: 13px;">{{this.dailyhealth.vehicle_no}}</span><br>
                    </div>
                    <div class="col-lg-2">
                        <span style="font-size: 13px;">{{this.dailyhealth.created_at}}</span><br>
                    </div>
                    <div class="col-lg-1  text-right">
                        <a @click="toggleEdit()" rel="tooltip" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                            <i class="fa fa-search-plus text-dark"></i>
                        </a>
                        <el-popover
                                placement="left"
                                width="160"
                                v-model="visible">
                            <p class="text-danger">Are you sure to <br> delete this?</p>
                            <div style="text-align: right; margin: 0">
                                <el-button type="danger" size="mini" @click="deleteVisitor()">Confirm</el-button>
                                <el-button style="margin-top: 5px" size="mini" type="default" @click="visible = false">Cancel</el-button>
                            </div>
                            <el-button style="border: none; padding: 0px " slot="reference"> <i  class="fa fa-trash text-danger"></i></el-button>
                        </el-popover>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-lg-6">
                <div class="row text-left" v-show-slide="isEditing">
                    <div class="col-lg-12">
                            <div class="row" style="display: flex; justify-content: center">
                                <div class="col-5">
                                    <div class="card card-body text-center">
                                        <span  class="text-dark text-info" style="font-size: 20px">{{dailyhealth.created_at}}</span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card card-body text-center">
                                        <span :style="[this.dailyhealth.temperature <= '37.5' ? {'color': 'green'} :{'color': 'red'}]"  style="font-size: 20px">{{dailyhealth.temperature}} &#8451;</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card card-body text-left">
                                        <div class="row">
                                            <div class="col-4">
                                                <label style="font-size: 15px" class="text-muted text-dark">Person To Meet</label>
                                            </div>
                                            <div class="col-1">
                                                <label style="font-size: 15px">:</label>
                                            </div>
                                            <div class="col-6">
                                                <label style="font-size: 15px" class="text-dark text-info">{{dailyhealth.person_to_meet}}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="card card-body " >
                            <div class="row">
                                <div class="col-4">
                                    <label style="font-size: 15px" class="text-muted text-dark">Name</label>
                                </div>
                                <div class="col-1">
                                    <label style="font-size: 15px">:</label>
                                </div>
                                <div class="col-6">
                                    <label style="font-size: 15px" class="text-dark text-info">{{dailyhealth.name}}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label style="font-size: 15px" class="text-muted text-dark">Company</label>
                                </div>
                                <div class="col-1">
                                    <label style="font-size: 15px">:</label>
                                </div>
                                <div class="col-6">
                                    <label style="font-size: 15px" class="text-dark text-info">{{dailyhealth.company_from_name}}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label style="font-size: 15px" class="text-muted text-dark">NRIC / Passport</label>
                                </div>
                                <div class="col-1">
                                    <label style="font-size: 15px">:</label>
                                </div>
                                <div class="col-6">
                                    <label style="font-size: 15px" class="text-dark text-info">{{dailyhealth.NRIC_passport}}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label style="font-size: 15px" class="text-muted text-dark">Vehicle No</label>
                                </div>
                                <div class="col-1">
                                    <label style="font-size: 15px">:</label>
                                </div>
                                <div class="col-6">
                                    <label style="font-size: 15px" class="text-dark text-info">{{dailyhealth.vehicle_no}}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label style="font-size: 15px" class="text-muted text-dark">Mobile No</label>
                                </div>
                                <div class="col-1">
                                    <label style="font-size: 15px">:</label>
                                </div>
                                <div class="col-6">
                                    <label style="font-size: 15px" class="text-dark text-info">{{dailyhealth.mobile_no}}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label style="font-size: 15px" class="text-muted text-dark">Nationality</label>
                                </div>
                                <div class="col-1">
                                    <label style="font-size: 15px">:</label>
                                </div>
                                <div class="col-6">
                                    <label style="font-size: 15px" class="text-dark text-info">{{dailyhealth.nationality}}</label>
                                </div>
                            </div>
                            <!--<it-asset-form-component v-bind:key="asset.id" :data="asset"></it-asset-form-component>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row text-left" v-show="isEditing">
                    <div class="col-lg-12">
                        <div class="card card-body " >
                            <div class="row">
                                <div class="col-lg-12">
                                    <label style="font-size: 15px">1. Symptoms</label>
                                    <ul>
                                        <li class="text-danger" v-for="symptom in symptoms">{{symptom}}</li>
                                        <li class="text-danger" v-if="dailyhealth.symptoms_other !== null">{{dailyhealth.symptoms_other}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label style="font-size: 15px">2. Contact with novel coronavirus (Covid-19) patient.</label>
                                    <ul>
                                        <li :style="[this.dailyhealth.contact_with ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">{{dailyhealth.contact_with}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label style="font-size: 15px">3. Been to China or affected countries</label>
                                    <ul>
                                        <li :style="[this.dailyhealth.is_visited_china ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">{{dailyhealth.is_visited_china}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label style="font-size: 15px">4. Visited Country</label>
                                    <ul>
                                        <li class="text-danger" v-for="country in visited_country">{{country}}</li>
                                        <li class="text-danger" v-if="dailyhealth.visited_other_country !== null">{{dailyhealth.visited_other_country}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label style="font-size: 15px">5. Been to Tabligh Programme</label>
                                    <ul>
                                        <li :style="[this.dailyhealth.tabliqh ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">{{dailyhealth.tabliqh}}</li>
                                    </ul>
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
        props: ['data'],
        data() {
            return {
                dailyhealth: this.data,
                symptoms:[],
                visible: false,
                visited_country:[],
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
              this.symptoms = this.dailyhealth.symptoms.split(",");
              this.visited_country = this.dailyhealth.visited_country.split(",");
        },
        methods:{
            deleteVisitor(){
                this.visible = false;
                var url = '/api/v1/profile/'+ this.dailyhealth.company_id + '/'+ this.dailyhealth.id +'/staff-delete-visitor-daily-health', method = 'delete';
                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {

                    if(this.$parent.isSearching === false)
                    {
                        Event.$emit('updateVisitorList');
                    }
                    if(this.$parent.isSearching === true)
                    {
                        Event.$emit('updateVisitorSearchList');
                    }

                })
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