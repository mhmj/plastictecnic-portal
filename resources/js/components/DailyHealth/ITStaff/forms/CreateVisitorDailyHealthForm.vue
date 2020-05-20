<template>
    <div>
        <div class="row">
            <div class="col-12">
                <div class="input-group no-border" style="display: flex; justify-content: flex-end">
                    <button class="btn btn-outline-danger" @click="$parent.newVisitor()">
                        X
                    </button>
                </div>
            </div>
        </div>
        <div class="row text-left">
            <div class="col-lg-6">
               <div class="row ">
                   <div class="col-lg-12">
                       <div class="row ">
                           <div class="col-lg-12">
                               <div class="card card-body text-left">
                                   <div class="row" style="margin-bottom: 10px">
                                       <div class="col-4">
                                           <label style="font-size: 14px" class="text-muted text-dark">Temperature</label>
                                       </div>
                                       <div class="col-1">
                                           <label style="font-size: 14px">:</label>
                                       </div>
                                       <div class="col-6" style="margin-left: -20px">
                                           <el-input-number v-model="visitor.temperature" :precision="2" :step="0.01" :min="34" :max="42"></el-input-number>
                                       </div>
                                   </div>
                                   <div class="row" style="margin-bottom: 10px">
                                       <div class="col-4">
                                           <label style="font-size: 14px" class="text-muted text-dark">Date</label>
                                       </div>
                                       <div class="col-1">
                                           <label style="font-size: 14px">:</label>
                                       </div>
                                       <div class="col-6" style="margin-left: -20px">
                                           <el-date-picker
                                                   v-model="visitor.created_at"
                                                   type="datetime"
                                                   placeholder="Select date and time"
                                                   format="yyyy/MM/dd HH:mm:ss"
                                                   value-format="yyyy-MM-dd HH:mm:ss"
                                                   default-time="12:00:00">
                                           </el-date-picker>
                                       </div>
                                   </div>
                                   <div class="row" style="margin-bottom: 10px">
                                       <div class="col-4"></div>
                                       <div class="col-1"></div>
                                       <div class="col-6" style="margin-left: -20px"  v-if="('created_at' in errors)">
                                           <label class="text-danger">{{errors['created_at']}}</label>
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-4">
                                           <label style="font-size: 14px" class="text-muted text-dark">Person To Meet</label>
                                       </div>
                                       <div class="col-1">
                                           <label style="font-size: 14px">:</label>
                                       </div>
                                       <div class="col-6" style="margin-left: -20px">
                                           <el-input
                                                   placeholder="Person To Meet"
                                                   v-model="visitor.person_to_meet"
                                                   clearable>
                                           </el-input>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="card card-body " >
                           <div class="row" >
                               <div class="col-4">
                                   <label style="font-size: 15px" class="text-muted text-dark">Name</label>
                               </div>
                               <div class="col-1">
                                   <label style="font-size: 15px">:</label>
                               </div>
                               <div class="col-6">
                                   <el-input
                                           placeholder="Name"
                                           v-model="visitor.name"
                                           clearable>
                                   </el-input>
                               </div>
                           </div>
                           <div class="row" style="margin-bottom: 10px">
                               <div class="col-4"></div>
                               <div class="col-1"></div>
                               <div class="col-6"  v-if="('visitor_name' in errors)">
                                   <label class="text-danger">{{errors['visitor_name']}}</label>
                               </div>
                           </div>
                           <div class="row" style="margin-bottom: 10px">
                               <div class="col-4">
                                   <label style="font-size: 15px" class="text-muted text-dark">NRIC / Passport</label>
                               </div>
                               <div class="col-1">
                                   <label style="font-size: 15px">:</label>
                               </div>
                               <div class="col-6">
                                   <el-input
                                           placeholder="NRIC / Passport"
                                           v-model="visitor.NRIC_Passport"
                                           clearable>
                                   </el-input>
                               </div>
                           </div>
                           <div class="row" style="margin-bottom: 10px">
                               <div class="col-4">
                                   <label style="font-size: 15px" class="text-muted text-dark">Company</label>
                               </div>
                               <div class="col-1">
                                   <label style="font-size: 15px">:</label>
                               </div>
                               <div class="col-6">
                                   <el-input
                                           placeholder="Company"
                                           v-model="visitor.company_from_name"
                                           clearable>
                                   </el-input>
                               </div>
                           </div>
                           <div class="row" style="margin-bottom: 10px">
                               <div class="col-4">
                                   <label style="font-size: 15px" class="text-muted text-dark">Vehicle No</label>
                               </div>
                               <div class="col-1">
                                   <label style="font-size: 15px">:</label>
                               </div>
                               <div class="col-6">
                                   <el-input
                                           placeholder="Vehicle No"
                                           v-model="visitor.vehicle_no"
                                           clearable>
                                   </el-input>
                               </div>
                           </div>
                           <div class="row" style="margin-bottom: 10px">
                               <div class="col-4">
                                   <label style="font-size: 15px" class="text-muted text-dark">Mobile No</label>
                               </div>
                               <div class="col-1">
                                   <label style="font-size: 15px">:</label>
                               </div>
                               <div class="col-6">
                                   <el-input
                                           placeholder="Mobile No"
                                           v-model="visitor.mobile_no"
                                           clearable>
                                   </el-input>
                               </div>
                           </div>
                           <div class="row" style="margin-bottom: 10px">
                               <div class="col-4"></div>
                               <div class="col-1"></div>
                               <div class="col-6"  v-if="('mobile_no' in errors)">
                                   <label class="text-danger">{{errors['mobile_no']}}</label>
                               </div>
                           </div>
                           <div class="row" style="margin-bottom: 10px">
                               <div class="col-4">
                                   <label style="font-size: 15px" class="text-muted text-dark">Nationality</label>
                               </div>
                               <div class="col-1">
                                   <label style="font-size: 15px">:</label>
                               </div>
                               <div class="col-6">
                                   <el-input
                                           placeholder="Nationality"
                                           v-model="visitor.nationality"
                                           clearable>
                                   </el-input>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="card card-body">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-12" style="">
                                    <div class="row">
                                        <div class="col">
                                            <strong>
                                                <label class="muted" style="font-size: 15px">1. If you have the following symptom(s), please tick the relevant box(es) </label>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <el-checkbox-group v-model="visitor.symptoms">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <el-checkbox value="Fever" label="Fever"></el-checkbox>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <el-checkbox value="Sore throat" label="Sore throat"></el-checkbox>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <el-checkbox value="Dry cough" label="Dry cough"></el-checkbox>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <el-checkbox value="Runny nose" label="Runny nose"></el-checkbox>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <el-checkbox value="Body aches" label="Body aches"></el-checkbox>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <el-checkbox value="Tiredness" label="Tiredness"></el-checkbox>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <el-checkbox value="Headaches" label="Headaches"></el-checkbox>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <el-checkbox value="Shortness of breath" label="Shortness of breath"></el-checkbox>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <el-checkbox value="Other" label="Other"></el-checkbox>
                                                        <el-input
                                                                placeholder="Other Symptoms"
                                                                v-model="visitor.symptoms_other"
                                                        >
                                                        </el-input>
                                                    </div>
                                                </div>
                                            </el-checkbox-group>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" style="">
                                    <div class="row">
                                        <div class="col">
                                            <strong>
                                                <label class="muted" style="font-size: 15px"><br>2. Have you been in contact with a confirmed novel coronavirus (Covid-19) patient in the past 14 days ?</label>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col" v-if="('contact_with' in errors)">
                                            <label class="text-danger">{{errors['contact_with']}}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <el-radio v-model="visitor.contact_with" value="Yes" label="Yes">Yes</el-radio>
                                            <el-radio v-model="visitor.contact_with" value="No" label="No">No</el-radio>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" style="">
                                    <div class="row">
                                        <div class="col">
                                            <strong>
                                                <label class="muted" style="font-size: 15px"><br>3. Have you been in to China or affected countries in past 14 days?</label>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col" v-if="('is_visited_china' in errors)">
                                            <label class="text-danger">{{errors['is_visited_china']}}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <el-radio v-model="visitor.is_visited_china" value="Yes" label="Yes">Yes</el-radio>
                                            <el-radio v-model="visitor.is_visited_china" value="No" label="No">No</el-radio>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" style="">
                                    <div class="row">
                                        <div class="col">
                                            <strong>
                                                <label class="muted" style="font-size: 15px"><br>If yes, please indicate the affected country(s) :</label>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <el-checkbox-group v-model="visitor.visited_country">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <el-checkbox value="South Korea" label="South Korea"></el-checkbox>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <el-checkbox value="Italy" label="Italy"></el-checkbox>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <el-checkbox value="United States" label="United States"></el-checkbox>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <el-checkbox value="Singapore" label="Singapore"></el-checkbox>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <el-checkbox value="German" label="German"></el-checkbox>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <el-checkbox value="Switzerland" label="Switzerland"></el-checkbox>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <el-checkbox value="Japan" label="Japan"></el-checkbox>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <el-checkbox value="France" label="France"></el-checkbox>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <el-checkbox value="United Kingdom" label="United Kingdom"></el-checkbox>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <el-checkbox value="Iran" label="Iran"></el-checkbox>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <el-checkbox value="Spain" label="Spain"></el-checkbox>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <el-checkbox value="Thailand" label="Thailand"></el-checkbox>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <el-checkbox value="Vietnam" label="Vietnam"></el-checkbox>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <el-checkbox value="Other" label="Other"></el-checkbox>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <el-input
                                                                placeholder="Other Country"
                                                                v-model="visitor.visited_other_country"
                                                        >
                                                        </el-input>
                                                    </div>
                                                </div>
                                            </el-checkbox-group>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" style="">
                                    <div class="row">
                                        <div class="col">
                                            <strong>
                                                <label class="muted" style="font-size: 15px"><br>4. Have you been in Tabliq Programme(Sri Petaling) from 27 Feb - 1 March 2020?</label>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col" v-if="('tabliqh' in errors)">
                                            <label class="text-danger">{{errors['tabliqh']}}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <el-radio v-model="visitor.tabliqh" value="Yes" label="Yes">Yes</el-radio>
                                            <el-radio v-model="visitor.tabliqh" value="No" label="No">No</el-radio>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" style="margin-top: 15px">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group form-group-default" style="display:flex; justify-content: flex-start"></div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                                                <button class="btn btn-primary text-white" @click="checkForm">Submit</button>
                                            </div>
                                        </div>
                                    </div>
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
        props: {
            'id1': {
                type: String,
                required: true
            }
        },
        data() {
            return {
                errors: [],
                visitor: {
                    company_name:'',
                    name: '',
                    mobile_no: '',
                    company_from_name:'',
                    person_to_meet:'',
                    NRIC_Passport: '',
                    vehicle_no: '',
                    nationality: '',
                    symptoms: [],
                    symptoms_other: '',
                    contact_with: '',
                    is_visited_china: '',
                    visited_country: [],
                    visited_other_country: '',
                    tabliqh: '',
                    created_at:'',
                    temperature: 3.6
                },
            }
        },
        methods:{
            checkForm(){
                this.errors = [];

                if(this.visitor.name && this.visitor.created_at && this.visitor.mobile_no && this.visitor.contact_with && this.visitor.is_visited_china && this.visitor.tabliqh)
                {
                    this.createVisitorDailyHealth();
                }
                if(!this.visitor.name)
                {
                    this.errors['visitor_name'] = "Please fill the name"
                }
                if(!this.visitor.created_at)
                {
                    this.errors['created_at'] = "Please Choose the date"
                }
                if(!this.visitor.contact_with)
                {
                    this.errors['contact_with'] = "Please choose one"
                }
                if(!this.visitor.is_visited_china)
                {
                    this.errors['is_visited_china'] = "Please choose one"
                }
                if(!this.visitor.tabliqh)
                {
                    this.errors['tabliqh'] = "Please choose one"
                }
                if(!this.visitor.mobile_no)
                {
                    this.errors['mobile_no'] = "Please fill the mobile number"
                }
//                if(!this.visitor.vehicle_no)
//                {
//                    this.errors['vehicle_no'] = "Please fill the vehicle number"
//                }

            },
            createVisitorDailyHealth()
            {
                if(this.id1 ==='1')
                {
                    this.visitor.company_name = 'Plastictecnic Sdn Bhd - Bangi'
                }
                if(this.id1 ==='2')
                {
                    this.visitor.company_name = 'Plastictecnic Sdn Bhd - Nilai(A)'
                }
                if(this.id1 ==='3')
                {
                    this.visitor.company_name = 'Bangi Plastics Sdn Bhd - Nilai(B)'
                }

                console.log(this.visitor);
                axios.post('/api/v1/profile/staff-create-visitor-daily-health',
                    {
                        company_id: this.id1,
                        company_name: this.visitor.company_name,
                        name: this.visitor.name,
                        mobile_no: this.visitor.mobile_no,
                        NRIC_Passport: this.visitor.NRIC_Passport,
                        person_to_meet: this.visitor.person_to_meet,
                        company_from_name: this.visitor.company_from_name,
                        vehicle_no: this.visitor.vehicle_no,
                        nationality: this.visitor.nationality,
                        symptoms: this.visitor.symptoms,
                        symptoms_other: this.visitor.symptoms_other,
                        contact_with: this.visitor.contact_with,
                        is_visited_china: this.visitor.is_visited_china,
                        visited_country: this.visitor.visited_country,
                        visited_other_country: this.visitor.visited_other_country,
                        tabliqh: this.visitor.tabliqh,
                        temperature: this.visitor.temperature,
                        created_at: this.visitor.created_at,
                    }
                )
                    .then(res =>

                        this.$parent.fetchDailyHealths(),
                        this.$parent.newVisitor(),
                        this.clearForm(),
                    );
            },
            clearForm(){
                this.visitor = {
                    company_name:'',
                        name: '',
                        mobile_no: '',
                        company_from_name:'',
                        person_to_meet:'',
                        NRIC_Passport: '',
                        vehicle_no: '',
                        nationality: '',
                        symptoms: [],
                        symptoms_other: '',
                        contact_with: '',
                        is_visited_china: '',
                        visited_country: [],
                        visited_other_country: '',
                        tabliqh: '',
                        created_at:'',
                        temperature: 3.6
                }
            }
        }
    }
</script>