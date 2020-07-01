<template>
    <div>
        <el-tabs type="border-card">
            <el-tab-pane label="All">
                <list-incident-report-location-component :id1="this.id1" :category="this.category"></list-incident-report-location-component>
            </el-tab-pane>
            <el-tab-pane label="Personal">
                <list-incident-report-personal-component :id1="this.id1" :staff_id="this.staff_id"></list-incident-report-personal-component>
            </el-tab-pane>
            <el-tab-pane label="New">
                <create-incident-report-form-component :id1="this.id1"></create-incident-report-form-component>
            </el-tab-pane>
        </el-tabs>
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
            },
            'staff_id': {
                type: String,
                required: true
            }
        },
    }
</script>
