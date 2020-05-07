<template>
    <div>
        <div class="row">
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <label class="muted" style="color: #2b5797;"><h5>Total Report</h5></label>
                            </div>
                            <div class="card-body">
                                <incident-report-status-chart-element-component></incident-report-status-chart-element-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <label class="muted" style="color: #2b5797;"><h5>Root Cause</h5></label>
                            </div>
                            <div class="card-body">
                                <incident-report-root-cause-chart-element-component></incident-report-root-cause-chart-element-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <label class="muted" style="color: #2b5797;"><h5>Location</h5></label>
                            </div>
                            <div class="card-body">
                                <incident-report-location-chart-element-component></incident-report-location-chart-element-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
