<template>
    <a class="simple-text logo-mini">
        <el-avatar shape="circle" :size="33" style="border: 1px solid red"  >
            <el-image :src="this.src" :fit="this.fit" style="width: 100%; height: 100%;"/>
        </el-avatar>
        <!--<el-avatar  shape="circle" :size="30" >-->
            <!--<img :src="this.src" :fit="fit"/>-->
        <!--</el-avatar>-->
        <!--<el-image class="avatar border-gray" src="storage/ProfilePicture/{{Auth::user()->image}}" :fit="fill" style="border-radius: 100%; height: 100%; width: 100%;" ></el-image>-->
    </a>
</template>
<script>
    export default{
        props: {
            'data': {
                type: String,
                required: true
            },
            'id1': {
                type: String,
                required: true
            },
        },
        data(){
            return {
                staff: {
                    id:this.id1,
                    image: this.data,
                },
                src:'',
                fit: 'cover',
            }
        },
        watch: {
            'id1': function() {
                this.staff.id = this.id1;
            }
        },
        created() {
            this.fetchProfile();
        },
        mounted(){
            Event.$on('fetchProfileImage', (image) => {
                this.fetchProfilePicture(image);
            });
        },
        methods: {
            fetchProfile(){
                fetch('/api/v1/profile/'+ this.staff.id).then(response => response.json())
                    .then(response => {
                        this.staff.image = response.data.image;
                        this.src = 'storage/ProfilePicture/' + this.staff.image;
                        //console.log(this.src);
                    })
                    .catch(error => console.log(error))
            },

            fetchProfilePicture(image){
                this.src = 'storage/ProfilePicture/' + image;
            },
        }
    }
</script>