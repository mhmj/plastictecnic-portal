<template>
<div>
    <div>
        <div class="row border-bottom" style="margin-bottom: 10px">
            <div class="col text-left">
                <div class="row">
                    <div class="col">
                    <span class="fs-15" style="font-size: 15px; color: #007bff">
                        {{this.staff.staff_no}}
                    </span>
                        <span class="m-l-5 m-r-5">-</span>
                        <span class="fs-20" style="font-size: 15px; color: #007bff">
                        {{this.staff.username}}
                    </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span class="fs-10 muted" style="font-size: 13px; color: #003976"> {{this.staff.full_name}}</span>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px">
                    <div class="col">
                        <span class="fs-18" style="font-size: 12px; color: #f96332" v-for="companies in this.$parent.ListCompany" v-if="companies.id == staff.company_id.id">
                            {{companies.name}}
                        </span><br>
                        <span class="fs-18" style="font-size: 12px; color: #f96332" v-for="companies in this.$parent.ListCompany" v-if="companies.id == staff.company_id.id">
                            {{companies.location}} - {{companies.base}}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col text-right" style="margin-bottom: 10px; margin-top: -10px">
                <a @click="toggleEdit()" rel="tooltip" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                    <i class="fas fa-pencil-alt text-dark"></i>
                </a>
                <button data-toggle="modal" @click="$parent.itemClicked(staff)" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="table" v-show="isEditing">
                <div class="card card-body" >
                    <staff-form-component v-bind:key="staff.id" :data="staff"></staff-form-component>
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
                staff: this.data,
                isEditing: false,
            }
        },
        mounted(){
            Event.$on('toggleEdit', () => {
                this.toggleEdit();
            });
        },
        methods:{
            toggleEdit(){
                this.isEditing = !this.isEditing;
            },
        }
    }
</script>