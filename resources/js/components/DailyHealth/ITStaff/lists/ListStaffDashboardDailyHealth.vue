<template>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <el-tabs v-model="activeName">
                        <el-tab-pane label="Bangi" name="Bangi">
                            <list-staff-daily-health-component id1="1" category="bangi"></list-staff-daily-health-component>
                        </el-tab-pane>
                        <el-tab-pane label="Nilai(Block A)" name="NilaiA">
                            <list-staff-daily-health-component id1="2" category="nilaiA"></list-staff-daily-health-component>
                        </el-tab-pane>
                        <el-tab-pane label="Nilai(Block B)" name="NilaiB">
                            <list-staff-daily-health-component id1="3" category="nilaiB"></list-staff-daily-health-component>
                        </el-tab-pane>
                        <el-tab-pane label=" GOODHART MILLIONS" name="goodhart">
                            <list-staff-daily-health-component id1="4" category="goodhart"></list-staff-daily-health-component>
                        </el-tab-pane>
                    </el-tabs>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                activeName: 'Bangi',
            }
        },
    }
</script>