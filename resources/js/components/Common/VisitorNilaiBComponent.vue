<template>
    <form @submit.prevent="submitForm">
        <div>
            <div v-if="isSubmit === false">
                <div class="row" v-if="isPage1 === true">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12" style="">
                                <span class="text-primary" style="font-size: 16px">Bangi Plastics Sdn Bhd - Nilai B</span>
                                <span> <br><br>Dear Sir / Madam,<br><br></span>
                                <span> To prevent the spread of novel coronavirus (Covid-19) in our community and reduce the risk of exposure
                            to our staff and visitors, we are conducting a simple screening questionnaire for the aforementioned.Your participant is important to help us take precautionary measures to protect you and everyone in this building.
                        </span>
                                <span>Thank you for your time.<br><br></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="">
                                <div class="row">
                                    <div class="col">
                                        <strong>
                                            <label class="muted" style="font-size: 15px">Visitor's Name</label>
                                        </strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label style="font-size: 14px" class="text-muted">Nama Pelawat</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col" v-if="('visitor_name' in errors)">
                                        <label class="text-danger">{{errors['visitor_name']}}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <el-input
                                                placeholder="Visitor's Name"
                                                v-model="visitor.name"
                                                clearable>
                                        </el-input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="">
                                <div class="row">
                                    <div class="col">
                                        <strong>
                                            <label class="muted" style="font-size: 15px"><br>Company Name</label>
                                        </strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label style="font-size: 14px" class="text-muted">Nama Syarikat</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <el-input
                                                placeholder="Company Name"
                                                v-model="visitor.company_from_name"
                                                clearable>
                                        </el-input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="">
                                <div class="row">
                                    <div class="col">
                                        <strong>
                                            <label class="muted" style="font-size: 15px"><br>Person To Meet</label>
                                        </strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label style="font-size: 14px" class="text-muted">Orang yang ingin dijumpa</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <el-input
                                                placeholder="Person to Meet"
                                                v-model="visitor.person_to_meet"
                                                clearable>
                                        </el-input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="">
                                <div class="row">
                                    <div class="col">
                                        <strong>
                                            <label class="muted" style="font-size: 15px"><br>Mobile Number</label>
                                        </strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label style="font-size: 14px" class="text-muted">No Telefon Bimbit</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col" v-if="('mobile_no' in errors)">
                                        <label class="text-danger">{{errors['mobile_no']}}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <el-input
                                                placeholder="Mobile Number"
                                                v-model="visitor.mobile_no"
                                                clearable>
                                        </el-input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="">
                                <div class="row">
                                    <div class="col">
                                        <strong>
                                            <label class="muted" style="font-size: 15px"><br>NRIC / Passport No ( <label class="text-danger" style="font-size: 13px">* Optional</label> )</label>
                                        </strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label style="font-size: 14px" class="text-muted">No Kad Pengenalan / Passport</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <el-input
                                                placeholder="NRIC / Passport"
                                                v-model="visitor.NRIC_Passport"
                                                clearable>
                                        </el-input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="">
                                <div class="row">
                                    <div class="col">
                                        <strong>
                                            <label class="muted" style="font-size: 15px"><br>Vehicle Model & Plate No </label>
                                        </strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label style="font-size: 14px" class="text-muted">Jenis kenderaan / No Plat</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col" v-if="('vehicle_no' in errors)" >
                                        <label class="text-danger">{{errors['vehicle_no']}}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <el-input
                                                placeholder="Vehicle No"
                                                v-model="visitor.vehicle_no"
                                                clearable>
                                        </el-input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="">
                                <div class="row">
                                    <div class="col">
                                        <strong>
                                            <label class="muted" style="font-size: 15px"><br>Nationality ( <label class="text-danger" style="font-size: 13px">For Foreigner Only</label> )</label>
                                        </strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label style="font-size: 14px" class="text-muted">Warganegara ( <label class="text-danger" style="font-size: 13px">Untuk Warga Asing Sahaja</label> ) </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <el-input
                                                placeholder="Nationality"
                                                v-model="visitor.nationality"
                                                clearable>
                                        </el-input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="">
                                <div class="row">
                                    <div class="col-6"></div>
                                    <div class="col-6">
                                        <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                                            <a class="btn btn-primary text-white" @click="onChangePage()">Next</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" v-if="isPage2 === true">
                    <div class="col-lg-12">
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
                                        <div class="col">
                                            <label style="font-size: 14px" class="text-muted">Sekiranya anda ada mengalami simptom berikut, sila tandakan kotak berkenaan. </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <el-checkbox-group v-model="visitor.symptoms">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <el-checkbox value="Fever" label="Fever (Demam)"></el-checkbox>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <el-checkbox value="Sore throat" label="Sore throat (Sakit Tekak)"></el-checkbox>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <el-checkbox value="Dry cough" label="Dry cough (Batuk)"></el-checkbox>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <el-checkbox value="Runny nose" label="Runny nose (Selsema)"></el-checkbox>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <el-checkbox value="Body aches" label="Body aches (Sakit Badan)"></el-checkbox>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <el-checkbox value="Tiredness" label="Tiredness (Keletihan)"></el-checkbox>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <el-checkbox value="Headaches" label="Headaches (Sakit Kepala)"></el-checkbox>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <el-checkbox value="Shortness of breath" label="Shortness of breath (Sesak Nafas)"></el-checkbox>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <el-checkbox value="Other" label="Other (Lain-lain)"></el-checkbox>
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
                                        <div class="col">
                                            <label style="font-size: 14px" class="text-muted">Adakah anda pernah berhubung dengan pesakit yang disahkan (Covid-19) dalam 14 hari yang lepas ? </label>
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
                                        <div class="col">
                                            <label style="font-size: 14px" class="text-muted">Adakah anda pernah pergi ke China atau negara-negara yang terjejas dalam 14 hari yang lepas?</label>
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
                                        <div class="col">
                                            <label style="font-size: 14px" class="text-muted">Jika ya, sila nyatakan negara yang terlibat :</label>
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
                                        <div class="col">
                                            <label style="font-size: 14px" class="text-muted">Adakah anda pernah mengikuti program tabligh (Sri Petaling dari 27 Feb - 1 Mac 2020?</label>
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
                                <div class="col-12" style="margin-top: 10px">
                                    <div class="row">
                                        <div class="col">
                                            <strong>
                                                <label class="muted" style="font-size: 15px">Temperature</label>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label style="font-size: 14px" class="text-muted">Suhu</label>
                                        </div>
                                    </div>
                                    <div class="row" v-if="('temperature' in errors)">
                                        <div class="col">
                                            <label style="font-size: 15px;" class="text-danger">{{errors['temperature']}}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <el-input
                                                    placeholder="Temperature"
                                                    v-model="visitor.temperature"
                                                    clearable>
                                            </el-input>
                                            <!--<el-input-number v-model="visitor.temperature" :precision="2" :step="0.01" :min="34" :max="42"></el-input-number>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" style="margin-top: 15px">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group form-group-default" style="display:flex; justify-content: flex-start">
                                                <a class="btn btn-primary text-white"  @click="onChangePage()">Back</a>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                                                <button class="btn btn-primary text-white" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="isSubmit === true">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 :style="[this.visitor.temperature <= '37.5' ? {'color': 'green'} :{'color': 'red'}]" style="display: flex; justify-content: center">{{visitor.temperature}} &#8451;</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <label class="muted" style="font-size: 15px">Visitor's Name</label>
                            </div>
                            <div class="col-1">
                                <label class="muted" style="font-size: 15px">:</label>
                            </div>
                            <div class="col-5">
                                <label class="muted text-success" style="font-size: 15px">{{visitor.name}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <label class="muted" style="font-size: 15px">Company Name</label>
                            </div>
                            <div class="col-1">
                                <label class="muted" style="font-size: 15px">:</label>
                            </div>
                            <div class="col-5">
                                <label class="muted text-success" style="font-size: 15px">{{visitor.company_from_name}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <label class="muted" style="font-size: 15px">Person To Meet</label>
                            </div>
                            <div class="col-1">
                                <label class="muted" style="font-size: 15px">:</label>
                            </div>
                            <div class="col-5">
                                <label class="muted text-success" style="font-size: 15px">{{visitor.person_to_meet}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <label class="muted" style="font-size: 15px">Mobile Number</label>
                            </div>
                            <div class="col-1">
                                <label class="muted" style="font-size: 15px">:</label>
                            </div>
                            <div class="col-5">
                                <label class="muted text-success" style="font-size: 15px">{{visitor.mobile_no}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <label class="muted" style="font-size: 15px">NRIC / Passport</label>
                            </div>
                            <div class="col-1">
                                <label class="muted" style="font-size: 15px">:</label>
                            </div>
                            <div class="col-5">
                                <label class="muted text-success" style="font-size: 15px">{{visitor.NRIC_Passport}}</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <label class="muted" style="font-size: 15px">Vehicle Number</label>
                            </div>
                            <div class="col-1">
                                <label class="muted" style="font-size: 15px">:</label>
                            </div>
                            <div class="col-5">
                                <label class="muted text-success" style="font-size: 15px">{{visitor.vehicle_no}}</label>
                            </div>
                        </div>
                        <div class="row" v-if="visitor.nationality">
                            <div class="col-5">
                                <label class="muted" style="font-size: 15px">Nationality</label>
                            </div>
                            <div class="col-1">
                                <label class="muted" style="font-size: 15px">:</label>
                            </div>
                            <div class="col-5">
                                <label class="muted text-success" style="font-size: 15px">{{visitor.nationality}}</label>
                            </div>
                        </div>
                        <div class="row" v-if="!visitor.nationality">
                            <div class="col-5">
                                <label class="muted" style="font-size: 15px">Nationality</label>
                            </div>
                            <div class="col-1">
                                <label class="muted" style="font-size: 15px">:</label>
                            </div>
                            <div class="col-5">
                                <label class="muted text-success" style="font-size: 15px">-</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="muted" style="font-size: 15px"> <hr>1. If you have the following symptom(s), please tick the relevant box(es)</label><br>
                                <label style="font-size: 14px" class="text-muted">Sekiranya anda ada mengalami simptom berikut, sila tandakan kotak berkenaan. </label>
                                <ul>
                                    <li :style="[symptom ? {'color': 'red'} :{'color': 'green'}]" v-for="symptom in visitor.symptoms">{{symptom}}</li>
                                    <li v-if="visitor.symptoms_other" :style="[visitor.symptoms_other ? {'color': 'red'} :{'color': 'green'}]">{{visitor.symptoms_other}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="muted" style="font-size: 15px"> <br>2. Have you been in contact with a confirmed novel coronavirus (Covid-19) patient in the past 14 days ?</label><br>
                                <label style="font-size: 14px" class="text-muted">Adakah anda pernah berhubung dengan pesakit yang disahkan (Covid-19) dalam 14 hari yang lepas ? </label>
                                <ul>
                                    <li :style="[this.visitor.contact_with ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">{{visitor.contact_with}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="muted" style="font-size: 15px"> <br>3. Have you been in to China or affected countries in past 14 days?</label><br>
                                <label style="font-size: 14px" class="text-muted">Adakah anda pernah pergi ke China atau negara-negara yang terjejas dalam 14 hari yang lepas?</label>
                                <ul>
                                    <li :style="[this.visitor.is_visited_china ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">{{visitor.is_visited_china}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="muted" style="font-size: 15px"> <br>If yes, please indicate the affected country(s) :</label><br>
                                <label style="font-size: 14px" class="text-muted">Jika ya, sila nyatakan negara yang terlibat :</label>
                                <ul>
                                    <li :style="[country ? {'color': 'red'} :{'color': 'green'}]" v-for="country in visitor.visited_country">{{country}}</li>
                                    <li v-if="visitor.visited_other_country" :style="[visitor.visited_other_country ? {'color': 'red'} :{'color': 'green'}]">{{visitor.visited_other_country}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="muted" style="font-size: 15px"> <br>4. Have you been in Tabliq Programme(Sri Petaling) from 27 Feb - 1 March 2020?</label><br>
                                <label style="font-size: 14px" class="text-muted">Adakah anda pernah mengikuti program tabligh (Sri Petaling dari 27 Feb - 1 Mac 2020?</label>
                                <ul>
                                    <li :style="[this.visitor.tabliqh === 'Yes' ? {'color': 'red'} :{'color': 'green'}]">{{visitor.tabliqh}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>
<script>
    export default {
        data() {
            return {
                errors: [],
                visitor: {
                    company_name:'Bangi Plastics Sdn Bhd - Nilai(B)',
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
                    temperature: ''

                },
                isSubmit: false,
                isPage1: true,
                isPage2: false,
            }
        },
        methods:{
            onChangePage()
            {
                this.errors = [];
                if(this.visitor.name &&  this.visitor.mobile_no && this.visitor.vehicle_no)
                {
                    this.isPage1 = !this.isPage1;
                    this.isPage2 = !this.isPage2;
                }
                if(!this.visitor.name)
                {
                    this.errors['visitor_name'] = "Please fill the name"
                }
                if(!this.visitor.mobile_no)
                {
                    this.errors['mobile_no'] = "Please fill the mobile number"
                }
                if(!this.visitor.vehicle_no)
                {
                    this.errors['vehicle_no'] = "Please fill the vehicle number"
                }


            },
            submitForm()
            {
                this.errors = [];
                if(this.visitor.contact_with && this.visitor.is_visited_china && this.visitor.tabliqh && this.visitor.temperature && !isNaN(this.visitor.temperature))
                {
                    this.createVisitorDailyHealth();
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
                if(!this.visitor.temperature)
                {
                    this.errors['temperature'] = "Please fill temperature"
                }
                if(isNaN(this.visitor.temperature))
                {
                    this.errors['temperature'] = "Please fill temperature"
                }
            },
            createVisitorDailyHealth()
            {
                console.log(this.visitor.symptoms);
                axios.post('/api/v1/profile/create-visitor-daily-health',
                    {
                        company_id: 3,
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
                    }
                )
                    .then(res => this.isSubmit = true);
            }
        }
    }
</script>