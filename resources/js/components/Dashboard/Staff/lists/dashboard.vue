<template>
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-chart">
                    <div class="card-body">
                        <slider-component></slider-component>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category">List Announcement</h5>
                        <h4 class="card-title">Announcement</h4>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category">List News</h5>
                        <h4 class="card-title">News</h4>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="barChartSimpleGradientsNumbers"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>