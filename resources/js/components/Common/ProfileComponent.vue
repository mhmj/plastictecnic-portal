<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <el-tabs tab-position="left" style=" width: 100%" :stretch="true">
                    <el-tab-pane label="Picture">
                        <form method="post" @submit.prevent="UploadImages" enctype="multipart/form-data">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-4" v-if="!staff.image" style="display:flex; justify-content:center; align-items: center; margin-bottom: 5px;">
                                        <el-avatar src="/images/no-image.jpg"  shape="circle" :size="200" fit="fill"></el-avatar>
                                    </div>
                                    <div class="col-lg-4" v-if="staff.image" style="display:flex; justify-content:center; align-items: center; margin-bottom: 5px;">
                                        <el-avatar shape="circle" :size="200" :fit="fit">
                                            <el-image :src="src" :fit="fit" style="width: 100%; height: 100%; border-radius: 100%; border: 1px dashed gray"/>
                                        </el-avatar>
                                        <!--<el-image style="width: 70%; height: 70%; border-radius: 100%; border: 1px dashed gray" :fit="fit" :src="src"></el-image>-->
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5 class="text-primary">Profile Picture</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <el-upload
                                                        action="#"
                                                        list-type="picture-card"
                                                        :auto-upload="false"
                                                        :on-change="handleChange"
                                                        ref="upload">
                                                    <i slot="default" class="el-icon-plus"></i>
                                                    <div slot="file" slot-scope="{file}">
                                                        <img
                                                                class="el-upload-list__item-thumbnail"
                                                                :src="file.url" alt=""
                                                        >
                                                        <span class="el-upload-list__item-actions">
                                                <span
                                                        v-if="!disabled"
                                                        class="el-upload-list__item-delete"
                                                        @click="handleRemove()"
                                                >
                                                  <i class="el-icon-delete"></i>
                                                </span>
                                              </span>
                                                    </div>
                                                </el-upload>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6" style="margin-top: 5px">
                                                <div class="form-group form-group-default" style="display:flex; justify-content: flex-start">
                                                    <button type="submit" class="btn btn-primary">Upload</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </el-tab-pane>
                    <el-tab-pane label="Personal">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row" v-if="('updated' in errors)">
                                        <div class="col">
                                            <label class="text-success" style="font-size: 15px">{{errors['updated']}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form @submit.prevent="updateStaff">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Staff No</label>
                                            <input class="form-control" disabled v-model="staff.staff_no">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Username</label>
                                            <input class="form-control" disabled v-model="staff.username">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Full Name</label>
                                            <input class="form-control" v-model="staff.full_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Email</label>
                                            <label class="text-danger">*</label>
                                            <!--<div class="row" v-if="('email' in errors)">-->
                                            <!--<div class="col">-->
                                            <!--<label class="text-danger">{{errors['email']}}</label>-->
                                            <!--</div>-->
                                            <!--</div>-->
                                            <input class="form-control" v-model="staff.email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Phone No</label>
                                            <input class="form-control" v-model="staff.telephone_no">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Contact No</label>
                                            <input class="form-control" v-model="staff.phone_no">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12" style="display: flex; justify-content: flex-start">
                                        <div class="form-group form-group-default required">
                                            <button type="submit" class="btn btn-primary text-white">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </el-tab-pane>
                    <el-tab-pane label="Work">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group form-group-default required">
                                        <label class="muted">Department</label>
                                        <input class="form-control" disabled v-model="staff.department_id.name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-group-default required">
                                        <label class="muted">Designation</label>
                                        <input class="form-control" disabled v-model="staff.designation_id.name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group form-group-default required">
                                        <label class="muted">Company</label>
                                        <input class="form-control" disabled v-model="staff.company_id.name">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </el-tab-pane>
                    <el-tab-pane label="Password">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <loading-component v-show="isLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
                                </div>
                            </div>
                            <form @submit.prevent="updatePassword">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row" v-if="('success' in errors)">
                                            <div class="col">
                                                <label class="text-success" style="font-size: 15px">{{errors['success']}}</label>
                                            </div>
                                        </div>
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Old Password</label>
                                            <div class="row" v-if="('not_found' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['not_found']}}</label>
                                                </div>
                                            </div>

                                            <div class="row" v-if="('old_not_match' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['old_not_match']}}</label>
                                                </div>
                                            </div>
                                            <div class="row" v-if="('same' in errors)">
                                                <div class="col">
                                                    <label class="text-success">{{errors['same']}}</label>
                                                </div>
                                            </div>
                                            <input type="password" v-on:submit="checkPassword" v-on:change="checkPassword" class="form-control" v-model="old_password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group form-group-default required">
                                            <label class="muted">New Password</label>
                                            <div class="row" v-if="('not_match' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['not_match']}}</label>
                                                </div>
                                            </div>
                                            <div class="row" v-if="('new_empty' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['new_empty']}}</label>
                                                </div>
                                            </div>
                                            <input type="password" class="form-control" v-model="new_password">
                                        </div>
                                        <div class="form-group form-group-default required">
                                            <label class="muted">Confirm Password</label>
                                            <div class="row" v-if="('not_match' in errors)">
                                                <div class="col">
                                                    <label class="text-danger">{{errors['not_match']}}</label>
                                                </div>
                                            </div>
                                            <input type="password" class="form-control" v-model="confirm_password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12" style="display: flex; justify-content: flex-start">
                                        <div class="form-group form-group-default required">
                                            <button type="submit" class="btn btn-primary text-white">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </el-tab-pane>
                </el-tabs>
            </div>
        </div>
        <!--<div class="col-lg-12">-->
            <!--<div class="row">-->
                <!--<div class="col-lg-6">-->
                    <!--<div class="card">-->
                        <!--<div class="card-body">-->
                            <!--<div class="row">-->
                                <!--<div class="col-lg-12">-->
                                    <!--<label>-->
                                        <!--<h5 class="text-primary">Personal Information</h5>-->
                                    <!--</label>-->
                                <!--</div>-->
                            <!--</div>-->
                            <!--<div class="row">-->
                                <!--<div class="col-lg-12">-->
                                    <!--<div class="row" v-if="('updated' in errors)">-->
                                        <!--<div class="col">-->
                                            <!--<label class="text-success" style="font-size: 15px">{{errors['updated']}}</label>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</div>-->
                            <!--<form @submit.prevent="updateStaff">-->
                                <!--<div class="row">-->
                                    <!--<div class="col-lg-6">-->
                                        <!--<div class="form-group form-group-default required">-->
                                            <!--<label class="muted">Staff No</label>-->
                                            <!--&lt;!&ndash;<div class="row" v-if="('staff_no' in errors)">&ndash;&gt;-->
                                            <!--&lt;!&ndash;<div class="col">&ndash;&gt;-->
                                            <!--&lt;!&ndash;<label class="text-danger">{{errors['staff_no']}}</label>&ndash;&gt;-->
                                            <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                            <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                            <!--<input class="form-control" disabled v-model="staff.staff_no">-->
                                        <!--</div>-->
                                    <!--</div>-->
                                    <!--<div class="col-lg-6">-->
                                        <!--<div class="form-group form-group-default required">-->
                                            <!--<label class="muted">Username</label>-->
                                            <!--<label class="text-danger">*</label>-->
                                            <!--&lt;!&ndash;<div class="row" v-if="('username' in errors)">&ndash;&gt;-->
                                            <!--&lt;!&ndash;<div class="col">&ndash;&gt;-->
                                            <!--&lt;!&ndash;<label class="text-danger">{{errors['username']}}</label>&ndash;&gt;-->
                                            <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                            <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                            <!--<input class="form-control" disabled v-model="staff.username">-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</div>-->
                                <!--<div class="row">-->
                                    <!--<div class="col-lg-12">-->
                                        <!--<div class="form-group form-group-default required">-->
                                            <!--<label class="muted">Full Name</label>-->
                                            <!--<input class="form-control" v-model="staff.full_name">-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</div>-->
                                <!--<div class="row">-->
                                    <!--<div class="col-lg-12">-->
                                        <!--<div class="form-group form-group-default required">-->
                                            <!--<label class="muted">Email</label>-->
                                            <!--<label class="text-danger">*</label>-->
                                            <!--&lt;!&ndash;<div class="row" v-if="('email' in errors)">&ndash;&gt;-->
                                            <!--&lt;!&ndash;<div class="col">&ndash;&gt;-->
                                            <!--&lt;!&ndash;<label class="text-danger">{{errors['email']}}</label>&ndash;&gt;-->
                                            <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                            <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                            <!--<input class="form-control" v-model="staff.email">-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</div>-->
                                <!--<div class="row">-->
                                    <!--<div class="col-lg-6">-->
                                        <!--<div class="form-group form-group-default required">-->
                                            <!--<label class="muted">Phone No</label>-->
                                            <!--<input class="form-control" v-model="staff.telephone_no">-->
                                        <!--</div>-->
                                    <!--</div>-->
                                    <!--<div class="col-lg-6">-->
                                        <!--<div class="form-group form-group-default required">-->
                                            <!--<label class="muted">Contact No</label>-->
                                            <!--<input class="form-control" v-model="staff.phone_no">-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</div>-->
                                <!--<div class="row">-->
                                    <!--<div class="col-lg-12" style="display: flex; justify-content: flex-end">-->
                                        <!--<div class="form-group form-group-default required">-->
                                            <!--<button type="submit" class="btn btn-primary text-white" style="margin-right: 15px">Save</button>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</form>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->
                <!--<div class="col-lg-6">-->
                    <!--<div class="row">-->
                        <!--<div class="col-lg-12">-->
                            <!--<div class="card">-->
                                <!--<div class="card-body">-->
                                    <!--<div class="row">-->
                                        <!--<div class="col-lg-12">-->
                                            <!--<label>-->
                                                <!--<h5 class="text-primary">Work Information</h5>-->
                                            <!--</label>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                    <!--<div class="row">-->
                                        <!--<div class="col-lg-6">-->
                                            <!--<div class="form-group form-group-default required">-->
                                                <!--<label class="muted">Department</label>-->
                                                <!--<input class="form-control" disabled v-model="staff.department_id.name">-->
                                            <!--</div>-->
                                        <!--</div>-->
                                        <!--<div class="col-lg-6">-->
                                            <!--<div class="form-group form-group-default required">-->
                                                <!--<label class="muted">Designation</label>-->
                                                <!--<input class="form-control" disabled v-model="staff.designation_id.name">-->
                                            <!--</div>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                    <!--<div class="row">-->
                                        <!--<div class="col-lg-12">-->
                                            <!--<div class="form-group form-group-default required">-->
                                                <!--<label class="muted">Company</label>-->
                                                <!--<input class="form-control" disabled v-model="staff.company_id.name">-->
                                            <!--</div>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="row">-->
                        <!--<div class="col-lg-12">-->
                            <!--<div class="card">-->
                                <!--<div class="card-body">-->
                                    <!--<div class="row">-->
                                        <!--<div class="col-lg-12">-->
                                            <!--<label>-->
                                                <!--<h5 class="text-primary">Change Password</h5>-->
                                            <!--</label>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                    <!--<div class="row">-->
                                        <!--<div class="col-lg-12">-->
                                            <!--<loading-component v-show="isLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                    <!--<form @submit.prevent="updatePassword">-->
                                        <!--<div class="row">-->
                                            <!--<div class="col-lg-12">-->
                                                <!--<div class="row" v-if="('success' in errors)">-->
                                                    <!--<div class="col">-->
                                                        <!--<label class="text-success" style="font-size: 15px">{{errors['success']}}</label>-->
                                                    <!--</div>-->
                                                <!--</div>-->
                                                <!--<div class="form-group form-group-default required">-->
                                                    <!--<label class="muted">Old Password</label>-->
                                                    <!--<div class="row" v-if="('not_found' in errors)">-->
                                                        <!--<div class="col">-->
                                                            <!--<label class="text-danger">{{errors['not_found']}}</label>-->
                                                        <!--</div>-->
                                                    <!--</div>-->

                                                    <!--<div class="row" v-if="('old_not_match' in errors)">-->
                                                        <!--<div class="col">-->
                                                            <!--<label class="text-danger">{{errors['old_not_match']}}</label>-->
                                                        <!--</div>-->
                                                    <!--</div>-->
                                                    <!--<div class="row" v-if="('same' in errors)">-->
                                                        <!--<div class="col">-->
                                                            <!--<label class="text-success">{{errors['same']}}</label>-->
                                                        <!--</div>-->
                                                    <!--</div>-->
                                                    <!--<input type="password" v-on:submit="checkPassword" v-on:change="checkPassword" class="form-control" v-model="old_password">-->
                                                <!--</div>-->
                                            <!--</div>-->
                                            <!--<div class="col-lg-12">-->
                                                <!--<div class="form-group form-group-default required">-->
                                                    <!--<label class="muted">New Password</label>-->
                                                        <!--<div class="row" v-if="('not_match' in errors)">-->
                                                            <!--<div class="col">-->
                                                                 <!--<label class="text-danger">{{errors['not_match']}}</label>-->
                                                            <!--</div>-->
                                                        <!--</div>-->
                                                        <!--<div class="row" v-if="('new_empty' in errors)">-->
                                                            <!--<div class="col">-->
                                                                <!--<label class="text-danger">{{errors['new_empty']}}</label>-->
                                                            <!--</div>-->
                                                        <!--</div>-->
                                                    <!--<input type="password" class="form-control" v-model="new_password">-->
                                                <!--</div>-->
                                                <!--<div class="form-group form-group-default required">-->
                                                    <!--<label class="muted">Confirm Password</label>-->
                                                        <!--<div class="row" v-if="('not_match' in errors)">-->
                                                            <!--<div class="col">-->
                                                                <!--<label class="text-danger">{{errors['not_match']}}</label>-->
                                                            <!--</div>-->
                                                        <!--</div>-->
                                                    <!--<input type="password" class="form-control" v-model="confirm_password">-->
                                                <!--</div>-->
                                            <!--</div>-->
                                            <!--<div class="col-lg-12" style="display: flex; justify-content: flex-end">-->
                                                <!--<div class="form-group form-group-default required">-->
                                                    <!--<button type="submit" class="btn btn-primary text-white" style="margin-right: 15px">Save</button>-->
                                                <!--</div>-->
                                            <!--</div>-->
                                        <!--</div>-->
                                    <!--</form>-->

                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
    </div>
</template>
<script>
    import ElImage from "../../../../public/element-ui/packages/image/src/main";
    export default{
        components: {ElImage},
        props: {
            'id1': {
                type: String,
                required: true
            },
        },
        data(){
            return{
                fit: 'fill',
                errors: [],
                isLoading: false,
                old_password:'',
                old_passwordCondition: '',
                new_password:'',
                confirm_password:'',
                status:'',
                disabled: false,
                fileList:[],
                image_source: 'storage/ProfilePicture/',
                src: '',
                staff: {
                    id:'',
                    full_name: '',
                    username: '',
                    email: '',
                    staff_no:'',
                    telephone_no:'',
                    phone_no:'',
                    company_id:{
                        id:'',
                        name:'',
                        location: '',
                        base: '',
                    },
                    designation_id:{
                        id:'',
                        name:'',
                    },
                    department_id:{
                        id:'',
                        name:'',
                    },
                    image: '',
                },

            }
        },
        created() {
            this.fetchProfile();
        },
        methods: {
            handleChange(file, fileList) {
                //this.image = file;
                this.fileList = fileList;
                if (fileList.length > 1) {
                    this.$message.error('Do not upload more than 1 files');
                    fileList.pop();
                }
            },
            handleRemove(file) {
                var index = this.fileList.indexOf(file);
                this.fileList.splice(index,1);
            },
            fetchProfile(){
                fetch('/api/v1/profile/'+ this.id1).then(response => response.json())
                    .then(response => {
                        this.staff = response.data;
                        this.src = 'storage/ProfilePicture/' + this.staff.image;
                        //console.log(this.src)
                    })
                    .catch(error => console.log(error))
            },
            UploadImages()
            {
                let currentObj = this;
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();
                formData.append("image", this.fileList[0].raw);
                let vm= this;
                axios.post('api/v1/profile/'+ this.staff.id +'/change-profile-picture', formData, config)
                    .then(function (data) {
                        //this.fetchProfile();

                        vm.staff.image = data.data.data.image;
                        vm.src = 'storage/ProfilePicture/'+ data.data.data.image;
                        Event.$emit('fetchProfileImage',vm.staff.image);
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });
                this.src = vm.src;
                this.$refs.upload.clearFiles();

                this.fileList = [];


                this.$notify({
                    title: 'Success',
                    message: 'Successfully Uploaded',
                    type: 'success'
                });
                //window.location.reload(true);
            },
            updateStaff() {
                this.errors = [];
                var url = 'api/v1/staff/'+ this.staff.id +'/update-staff', method = 'post';

                fetch(url, {
                    method: method,
                    body: JSON.stringify({
                        full_name: this.staff.full_name,
                        username: this.staff.username,
                        email: this.staff.email,
                        staff_no: this.staff.staff_no,
                        telephone_no: this.staff.telephone_no,
                        phone_no: this.staff.phone_no,
                        company_id : this.staff.company_id.id,
                        department_id: this.staff.department_id.id,
                        designation_id: this.staff.designation_id.id,
                    }),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {
                    this.isLoading=true;
                    this.fetchProfile();
                    this.errors['updated'] = "The information are successfully updated"
                    this.isLoading=false;
                })
            },
            async checkPassword(){
                this.errors = [];

                    axios.get('/api/v1/check-password/'+ this.id1+ '/'+ this.old_password)
                        .then(function (response) {
                            this.status = response.data;

                            if(this.status === 'not'){
                                this.errors['not_found'] = "The password are not found in our record"
                            }
                            if(this.status === 'same'){
                                this.old_passwordCondition= "true";
                                this.errors['same'] = "The password are match with our record"
                            }

                        }.bind(this));
            },
            updatePassword(){
                this.errors = [];
                if((this.new_password === this.confirm_password) && (this.old_passwordCondition === "true") && this.new_password === this.confirm_password )
                {
                    axios.get('/api/v1/profile/'+ this.id1 + '/' + this.new_password +'/change-password')
                        .then(function (response) {

                            this.isLoading=true;
                            this.old_password = '';
                            this.new_password = '';
                            this.confirm_password = '';
                            this.fetchProfile();
                            this.errors['success'] = "The password are successfully changed"
                            this.isLoading=false;
                        }.bind(this));
                }

                if(!this.old_passwordCondition)
                {
                    this.errors['old_not_match'] = "The password are not found in our record"
                }


                if(!this.new_password){
                    this.errors['new_empty'] = "Fill the new password"
                }

                if(this.new_password !== this.confirm_password)
                {
                    this.errors['not_match'] = "The password are not match"
                }
            },
        }
    }


</script>