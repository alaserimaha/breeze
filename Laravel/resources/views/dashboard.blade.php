@extends('layouts.master')

@section('title', __('Dashboard'))

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y strategy-dashboard">

        @include('layouts.alert')
        <h4 class="py-3 mb-4">
            <h3>@lang('Welcome back,  Mohammed Alqhtani 👋🏻')</h3>

        </h4>
        <div class="row">
            <div class="col">

                {{-- <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="mb-1">Active Project</h5>
                        <p class="card-subtitle">Average 72% Completed</p>
                    </div>
                    <div class="dropdown">
                        <button
                            class="btn btn-text-secondary rounded-pill text-muted border-0 p-2 me-n1 waves-effect waves-light"
                            type="button" id="activeProjects" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-md text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="activeProjects" style="">
                            <a class="dropdown-item waves-effect" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item waves-effect" href="javascript:void(0);">Download</a>
                            <a class="dropdown-item waves-effect" href="javascript:void(0);">View All</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        <li class="mb-4 d-flex">
                            <div class="d-flex w-50 align-items-center me-4">
                                <img src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/img/icons/brands/laravel-logo.png"
                                    alt="laravel-logo" class="me-4" width="35">
                                <div>
                                    <h6 class="mb-0">Laravel</h6>
                                    <small class="text-body">eCommerce</small>
                                </div>
                            </div>
                            <div class="d-flex flex-grow-1 align-items-center">
                                <div class="progress w-100 me-4" style="height:8px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 65%"
                                        aria-valuenow="54" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                                <span class="text-muted">65%</span>
                            </div>
                        </li>
                        <li class="mb-4 d-flex">
                            <div class="d-flex w-50 align-items-center me-4">
                                <img src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/img/icons/brands/figma-logo.png"
                                    alt="figma-logo" class="me-4" width="35">
                                <div>
                                    <h6 class="mb-0">Figma</h6>
                                    <small class="text-body">App UI Kit</small>
                                </div>
                            </div>
                            <div class="d-flex flex-grow-1 align-items-center">
                                <div class="progress w-100 me-4" style="height:8px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 86%"
                                        aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                                <span class="text-muted">86%</span>
                            </div>
                        </li>
                        <li class="mb-4 d-flex">
                            <div class="d-flex w-50 align-items-center me-4">
                                <img src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/img/icons/brands/vue-logo.png"
                                    alt="vue-logo" class="me-4" width="35">
                                <div>
                                    <h6 class="mb-0">VueJs</h6>
                                    <small class="text-body">Calendar App</small>
                                </div>
                            </div>
                            <div class="d-flex flex-grow-1 align-items-center">
                                <div class="progress w-100 me-4" style="height:8px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 90%"
                                        aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                                <span class="text-muted">90%</span>
                            </div>
                        </li>
                        <li class="mb-4 d-flex">
                            <div class="d-flex w-50 align-items-center me-4">
                                <img src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/img/icons/brands/react-logo.png"
                                    alt="react-logo" class="me-4" width="35">
                                <div>
                                    <h6 class="mb-0">React</h6>
                                    <small class="text-body">Dashboard</small>
                                </div>
                            </div>
                            <div class="d-flex flex-grow-1 align-items-center">
                                <div class="progress w-100 me-4" style="height:8px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 37%"
                                        aria-valuenow="37" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                                <span class="text-muted">37%</span>
                            </div>
                        </li>
                        <li class="mb-4 d-flex">
                            <div class="d-flex w-50 align-items-center me-4">
                                <img src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/img/icons/brands/bootstrap-logo.png"
                                    alt="bootstrap-logo" class="me-4" width="35">
                                <div>
                                    <h6 class="mb-0">Bootstrap</h6>
                                    <small class="text-body">Website</small>
                                </div>
                            </div>
                            <div class="d-flex flex-grow-1 align-items-center">
                                <div class="progress w-100 me-4" style="height:8px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 22%"
                                        aria-valuenow="22" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                                <span class="text-muted">22%</span>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="d-flex w-50 align-items-center me-4">
                                <img src="https://demos.pixinvent.com/vuexy-html-laravel-admin-template/demo/assets/img/icons/brands/sketch-logo.png"
                                    alt="sketch-logo" class="me-4" width="35">
                                <div>
                                    <h6 class="mb-0">Sketch</h6>
                                    <small class="text-body">Website Design</small>
                                </div>
                            </div>
                            <div class="d-flex flex-grow-1 align-items-center">
                                <div class="progress w-100 me-4" style="height:8px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 29%"
                                        aria-valuenow="29" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                                <span class="text-muted">29%</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> --}}
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Trach type</h5>

                    </div>
                    <div class="card-body row g-6">
                        <div class="col-xxl-7 col-md-8" style="position: relative;">
                            <div id="horizontalBarChart" style="min-height: 335px;">
                                <div id="apexchartsgxqu6tn9g"
                                    class="apexcharts-canvas apexchartsgxqu6tn9g apexcharts-theme-light"
                                    style="width: 310px; height: 320px;"><svg id="SvgjsSvg1469" width="310"
                                        height="320" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                        style="background: transparent;">
                                        <g id="SvgjsG1471" class="apexcharts-inner apexcharts-graphical"
                                            transform="translate(32.2890625, -5)">
                                            <defs id="SvgjsDefs1470">
                                                <linearGradient id="SvgjsLinearGradient1475" x1="0" y1="0"
                                                    x2="0" y2="1">
                                                    <stop id="SvgjsStop1476" stop-opacity="0.4"
                                                        stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                    <stop id="SvgjsStop1477" stop-opacity="0.5"
                                                        stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                    <stop id="SvgjsStop1478" stop-opacity="0.5"
                                                        stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                </linearGradient>
                                                <clipPath id="gridRectMaskgxqu6tn9g">
                                                    <rect id="SvgjsRect1480" width="257.69921875" height="297.73" x="-2"
                                                        y="0" rx="0" ry="0" opacity="1" stroke-width="0"
                                                        stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                                <clipPath id="forecastMaskgxqu6tn9g"></clipPath>
                                                <clipPath id="nonForecastMaskgxqu6tn9g"></clipPath>
                                                <clipPath id="gridRectMarkerMaskgxqu6tn9g">
                                                    <rect id="SvgjsRect1481" width="257.69921875" height="301.73" x="-2"
                                                        y="-2" rx="0" ry="0" opacity="1" stroke-width="0"
                                                        stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                </clipPath>
                                            </defs>
                                            <rect id="SvgjsRect1479" width="0" height="297.73" x="0" y="0"
                                                rx="0" ry="0" opacity="1" stroke-width="0"
                                                stroke-dasharray="3" fill="url(#SvgjsLinearGradient1475)"
                                                class="apexcharts-xcrosshairs" y2="297.73" filter="none"
                                                fill-opacity="0.9"></rect>
                                            <g id="SvgjsG1542" class="apexcharts-yaxis apexcharts-xaxis-inversed"
                                                rel="0">
                                                <g id="SvgjsG1543"
                                                    class="apexcharts-yaxis-texts-g apexcharts-xaxis-inversed-texts-g"
                                                    transform="translate(0, 0)"><text id="SvgjsText1544"
                                                        font-family="Public Sans" x="-15" y="27.06636363636364"
                                                        text-anchor="end" dominant-baseline="auto" font-size="13px"
                                                        font-weight="400" fill="#acaab1"
                                                        class="apexcharts-text apexcharts-yaxis-label "
                                                        style="font-family: &quot;Public Sans&quot;;">
                                                        <tspan id="SvgjsTspan1545">6</tspan>
                                                        <title>6</title>
                                                    </text><text id="SvgjsText1546" font-family="Public Sans" x="-15"
                                                        y="76.6880303030303" text-anchor="end" dominant-baseline="auto"
                                                        font-size="13px" font-weight="400" fill="#acaab1"
                                                        class="apexcharts-text apexcharts-yaxis-label "
                                                        style="font-family: &quot;Public Sans&quot;;">
                                                        <tspan id="SvgjsTspan1547">5</tspan>
                                                        <title>5</title>
                                                    </text><text id="SvgjsText1548" font-family="Public Sans" x="-15"
                                                        y="126.30969696969697" text-anchor="end" dominant-baseline="auto"
                                                        font-size="13px" font-weight="400" fill="#acaab1"
                                                        class="apexcharts-text apexcharts-yaxis-label "
                                                        style="font-family: &quot;Public Sans&quot;;">
                                                        <tspan id="SvgjsTspan1549">4</tspan>
                                                        <title>4</title>
                                                    </text><text id="SvgjsText1550" font-family="Public Sans" x="-15"
                                                        y="175.93136363636364" text-anchor="end" dominant-baseline="auto"
                                                        font-size="13px" font-weight="400" fill="#acaab1"
                                                        class="apexcharts-text apexcharts-yaxis-label "
                                                        style="font-family: &quot;Public Sans&quot;;">
                                                        <tspan id="SvgjsTspan1551">3</tspan>
                                                        <title>3</title>
                                                    </text><text id="SvgjsText1552" font-family="Public Sans" x="-15"
                                                        y="225.5530303030303" text-anchor="end" dominant-baseline="auto"
                                                        font-size="13px" font-weight="400" fill="#acaab1"
                                                        class="apexcharts-text apexcharts-yaxis-label "
                                                        style="font-family: &quot;Public Sans&quot;;">
                                                        <tspan id="SvgjsTspan1553">2</tspan>
                                                        <title>2</title>
                                                    </text><text id="SvgjsText1554" font-family="Public Sans" x="-15"
                                                        y="275.174696969697" text-anchor="end" dominant-baseline="auto"
                                                        font-size="13px" font-weight="400" fill="#acaab1"
                                                        class="apexcharts-text apexcharts-yaxis-label "
                                                        style="font-family: &quot;Public Sans&quot;;">
                                                        <tspan id="SvgjsTspan1555">1</tspan>
                                                        <title>1</title>
                                                    </text></g>
                                            </g>
                                            <g id="SvgjsG1522" class="apexcharts-xaxis apexcharts-yaxis-inversed">
                                                <g id="SvgjsG1523" class="apexcharts-xaxis-texts-g"
                                                    transform="translate(0, -8.666666666666666)"><text id="SvgjsText1524"
                                                        font-family="Helvetica, Arial, sans-serif" x="253.69921875"
                                                        y="327.73" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="13px" font-weight="400" fill="#acaab1"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1526">35%</tspan>
                                                        <title>35%</title>
                                                    </text><text id="SvgjsText1527"
                                                        font-family="Helvetica, Arial, sans-serif" x="202.859375"
                                                        y="327.73" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="13px" font-weight="400" fill="#acaab1"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1529">28%</tspan>
                                                        <title>28%</title>
                                                    </text><text id="SvgjsText1530"
                                                        font-family="Helvetica, Arial, sans-serif" x="152.01953125"
                                                        y="327.73" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="13px" font-weight="400" fill="#acaab1"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1532">21%</tspan>
                                                        <title>21%</title>
                                                    </text><text id="SvgjsText1533"
                                                        font-family="Helvetica, Arial, sans-serif" x="101.1796875"
                                                        y="327.73" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="13px" font-weight="400" fill="#acaab1"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1535">14%</tspan>
                                                        <title>14%</title>
                                                    </text><text id="SvgjsText1536"
                                                        font-family="Helvetica, Arial, sans-serif" x="50.33984375"
                                                        y="327.73" text-anchor="middle" dominant-baseline="auto"
                                                        font-size="13px" font-weight="400" fill="#acaab1"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1538">7%</tspan>
                                                        <title>7%</title>
                                                    </text><text id="SvgjsText1539"
                                                        font-family="Helvetica, Arial, sans-serif" x="-0.5" y="327.73"
                                                        text-anchor="middle" dominant-baseline="auto" font-size="13px"
                                                        font-weight="400" fill="#acaab1"
                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                        <tspan id="SvgjsTspan1541">0%</tspan>
                                                        <title>0%</title>
                                                    </text></g>
                                            </g>
                                            <g id="SvgjsG1556" class="apexcharts-grid">
                                                <g id="SvgjsG1557" class="apexcharts-gridlines-horizontal"></g>
                                                <g id="SvgjsG1558" class="apexcharts-gridlines-vertical">
                                                    <line id="SvgjsLine1559" x1="0" y1="0"
                                                        x2="0" y2="297.73" stroke="#e6e6e8"
                                                        stroke-dasharray="10" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1560" x1="51.039843749999996" y1="0"
                                                        x2="51.039843749999996" y2="297.73" stroke="#e6e6e8"
                                                        stroke-dasharray="10" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1561" x1="102.07968749999999" y1="0"
                                                        x2="102.07968749999999" y2="297.73" stroke="#e6e6e8"
                                                        stroke-dasharray="10" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1562" x1="153.11953125" y1="0"
                                                        x2="153.11953125" y2="297.73" stroke="#e6e6e8"
                                                        stroke-dasharray="10" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1563" x1="204.159375" y1="0"
                                                        x2="204.159375" y2="297.73" stroke="#e6e6e8"
                                                        stroke-dasharray="10" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1564" x1="255.19921875000003" y1="0"
                                                        x2="255.19921875000003" y2="297.73" stroke="#e6e6e8"
                                                        stroke-dasharray="10" stroke-linecap="butt"
                                                        class="apexcharts-gridline"></line>
                                                </g>
                                                <line id="SvgjsLine1566" x1="0" y1="297.73" x2="253.69921875"
                                                    y2="297.73" stroke="transparent" stroke-dasharray="0"
                                                    stroke-linecap="butt"></line>
                                                <line id="SvgjsLine1565" x1="0" y1="1" x2="0"
                                                    y2="297.73" stroke="transparent" stroke-dasharray="0"
                                                    stroke-linecap="butt"></line>
                                            </g>
                                            <g id="SvgjsG1482" class="apexcharts-bar-series apexcharts-plot-series">
                                                <g id="SvgjsG1483" class="apexcharts-series" rel="1"
                                                    seriesName="seriesx1" data:realIndex="0">
                                                    <path id="SvgjsPath1487"
                                                        d="M 0.1 7.443249999999999L 246.79921874999997 7.443249999999999Q 253.79921874999997 7.443249999999999 253.79921874999997 14.443249999999999L 253.79921874999997 35.17841666666667Q 253.79921874999997 42.17841666666667 246.79921874999997 42.17841666666667L 246.79921874999997 42.17841666666667L 0.1 42.17841666666667L 0.1 42.17841666666667Q 0.1 42.17841666666667 0.1 42.17841666666667L 0.1 7.443249999999999Q 0.1 7.443249999999999 0.1 7.443249999999999z"
                                                        fill="rgba(115,103,240,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskgxqu6tn9g)"
                                                        pathTo="M 0.1 7.443249999999999L 246.79921874999997 7.443249999999999Q 253.79921874999997 7.443249999999999 253.79921874999997 14.443249999999999L 253.79921874999997 35.17841666666667Q 253.79921874999997 42.17841666666667 246.79921874999997 42.17841666666667L 246.79921874999997 42.17841666666667L 0.1 42.17841666666667L 0.1 42.17841666666667Q 0.1 42.17841666666667 0.1 42.17841666666667L 0.1 7.443249999999999Q 0.1 7.443249999999999 0.1 7.443249999999999z"
                                                        pathFrom="M 0.1 7.443249999999999L 0.1 7.443249999999999L 0.1 42.17841666666667L 0.1 42.17841666666667L 0.1 42.17841666666667L 0.1 42.17841666666667L 0.1 42.17841666666667L 0.1 7.443249999999999"
                                                        cy="57.06491666666667" cx="253.79921874999997" j="0"
                                                        val="35" barHeight="34.73516666666667"
                                                        barWidth="253.69921874999997"></path>
                                                    <path id="SvgjsPath1493"
                                                        d="M 0.1 57.06491666666667L 138.07098214285713 57.06491666666667Q 145.07098214285713 57.06491666666667 145.07098214285713 64.06491666666668L 145.07098214285713 84.80008333333333Q 145.07098214285713 91.80008333333333 138.07098214285713 91.80008333333333L 138.07098214285713 91.80008333333333L 0.1 91.80008333333333L 0.1 91.80008333333333Q 0.1 91.80008333333333 0.1 91.80008333333333L 0.1 57.06491666666667Q 0.1 57.06491666666667 0.1 57.06491666666667z"
                                                        fill="rgba(0,186,209,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskgxqu6tn9g)"
                                                        pathTo="M 0.1 57.06491666666667L 138.07098214285713 57.06491666666667Q 145.07098214285713 57.06491666666667 145.07098214285713 64.06491666666668L 145.07098214285713 84.80008333333333Q 145.07098214285713 91.80008333333333 138.07098214285713 91.80008333333333L 138.07098214285713 91.80008333333333L 0.1 91.80008333333333L 0.1 91.80008333333333Q 0.1 91.80008333333333 0.1 91.80008333333333L 0.1 57.06491666666667Q 0.1 57.06491666666667 0.1 57.06491666666667z"
                                                        pathFrom="M 0.1 57.06491666666667L 0.1 57.06491666666667L 0.1 91.80008333333333L 0.1 91.80008333333333L 0.1 91.80008333333333L 0.1 91.80008333333333L 0.1 91.80008333333333L 0.1 57.06491666666667"
                                                        cy="106.68658333333335" cx="145.07098214285713" j="1"
                                                        val="20" barHeight="34.73516666666667"
                                                        barWidth="144.97098214285714"></path>
                                                    <path id="SvgjsPath1499"
                                                        d="M 0.1 106.68658333333335L 94.57968749999999 106.68658333333335Q 101.57968749999999 106.68658333333335 101.57968749999999 113.68658333333335L 101.57968749999999 134.42175000000003Q 101.57968749999999 141.42175000000003 94.57968749999999 141.42175000000003L 94.57968749999999 141.42175000000003L 0.1 141.42175000000003L 0.1 141.42175000000003Q 0.1 141.42175000000003 0.1 141.42175000000003L 0.1 106.68658333333335Q 0.1 106.68658333333335 0.1 106.68658333333335z"
                                                        fill="rgba(40,199,111,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskgxqu6tn9g)"
                                                        pathTo="M 0.1 106.68658333333335L 94.57968749999999 106.68658333333335Q 101.57968749999999 106.68658333333335 101.57968749999999 113.68658333333335L 101.57968749999999 134.42175000000003Q 101.57968749999999 141.42175000000003 94.57968749999999 141.42175000000003L 94.57968749999999 141.42175000000003L 0.1 141.42175000000003L 0.1 141.42175000000003Q 0.1 141.42175000000003 0.1 141.42175000000003L 0.1 106.68658333333335Q 0.1 106.68658333333335 0.1 106.68658333333335z"
                                                        pathFrom="M 0.1 106.68658333333335L 0.1 106.68658333333335L 0.1 141.42175000000003L 0.1 141.42175000000003L 0.1 141.42175000000003L 0.1 141.42175000000003L 0.1 141.42175000000003L 0.1 106.68658333333335"
                                                        cy="156.30825000000002" cx="101.57968749999999" j="2"
                                                        val="14" barHeight="34.73516666666667"
                                                        barWidth="101.4796875"></path>
                                                    <path id="SvgjsPath1505"
                                                        d="M 0.1 156.30825000000002L 80.08258928571428 156.30825000000002Q 87.08258928571428 156.30825000000002 87.08258928571428 163.30825000000002L 87.08258928571428 184.0434166666667Q 87.08258928571428 191.0434166666667 80.08258928571428 191.0434166666667L 80.08258928571428 191.0434166666667L 0.1 191.0434166666667L 0.1 191.0434166666667Q 0.1 191.0434166666667 0.1 191.0434166666667L 0.1 156.30825000000002Q 0.1 156.30825000000002 0.1 156.30825000000002z"
                                                        fill="rgba(128,131,144,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskgxqu6tn9g)"
                                                        pathTo="M 0.1 156.30825000000002L 80.08258928571428 156.30825000000002Q 87.08258928571428 156.30825000000002 87.08258928571428 163.30825000000002L 87.08258928571428 184.0434166666667Q 87.08258928571428 191.0434166666667 80.08258928571428 191.0434166666667L 80.08258928571428 191.0434166666667L 0.1 191.0434166666667L 0.1 191.0434166666667Q 0.1 191.0434166666667 0.1 191.0434166666667L 0.1 156.30825000000002Q 0.1 156.30825000000002 0.1 156.30825000000002z"
                                                        pathFrom="M 0.1 156.30825000000002L 0.1 156.30825000000002L 0.1 191.0434166666667L 0.1 191.0434166666667L 0.1 191.0434166666667L 0.1 191.0434166666667L 0.1 191.0434166666667L 0.1 156.30825000000002"
                                                        cy="205.92991666666668" cx="87.08258928571428" j="3"
                                                        val="12" barHeight="34.73516666666667"
                                                        barWidth="86.98258928571428"></path>
                                                    <path id="SvgjsPath1511"
                                                        d="M 0.1 205.92991666666668L 65.58549107142856 205.92991666666668Q 72.58549107142856 205.92991666666668 72.58549107142856 212.92991666666668L 72.58549107142856 233.66508333333337Q 72.58549107142856 240.66508333333337 65.58549107142856 240.66508333333337L 65.58549107142856 240.66508333333337L 0.1 240.66508333333337L 0.1 240.66508333333337Q 0.1 240.66508333333337 0.1 240.66508333333337L 0.1 205.92991666666668Q 0.1 205.92991666666668 0.1 205.92991666666668z"
                                                        fill="rgba(255,76,81,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskgxqu6tn9g)"
                                                        pathTo="M 0.1 205.92991666666668L 65.58549107142856 205.92991666666668Q 72.58549107142856 205.92991666666668 72.58549107142856 212.92991666666668L 72.58549107142856 233.66508333333337Q 72.58549107142856 240.66508333333337 65.58549107142856 240.66508333333337L 65.58549107142856 240.66508333333337L 0.1 240.66508333333337L 0.1 240.66508333333337Q 0.1 240.66508333333337 0.1 240.66508333333337L 0.1 205.92991666666668Q 0.1 205.92991666666668 0.1 205.92991666666668z"
                                                        pathFrom="M 0.1 205.92991666666668L 0.1 205.92991666666668L 0.1 240.66508333333337L 0.1 240.66508333333337L 0.1 240.66508333333337L 0.1 240.66508333333337L 0.1 240.66508333333337L 0.1 205.92991666666668"
                                                        cy="255.55158333333335" cx="72.58549107142856" j="4"
                                                        val="10" barHeight="34.73516666666667"
                                                        barWidth="72.48549107142857"></path>
                                                    <path id="SvgjsPath1517"
                                                        d="M 0.1 255.55158333333335L 58.3369419642857 255.55158333333335Q 65.3369419642857 255.55158333333335 65.3369419642857 262.5515833333334L 65.3369419642857 283.28675000000004Q 65.3369419642857 290.28675000000004 58.3369419642857 290.28675000000004L 58.3369419642857 290.28675000000004L 0.1 290.28675000000004L 0.1 290.28675000000004Q 0.1 290.28675000000004 0.1 290.28675000000004L 0.1 255.55158333333335Q 0.1 255.55158333333335 0.1 255.55158333333335z"
                                                        fill="rgba(255,159,67,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="round" stroke-width="0" stroke-dasharray="0"
                                                        class="apexcharts-bar-area" index="0"
                                                        clip-path="url(#gridRectMaskgxqu6tn9g)"
                                                        pathTo="M 0.1 255.55158333333335L 58.3369419642857 255.55158333333335Q 65.3369419642857 255.55158333333335 65.3369419642857 262.5515833333334L 65.3369419642857 283.28675000000004Q 65.3369419642857 290.28675000000004 58.3369419642857 290.28675000000004L 58.3369419642857 290.28675000000004L 0.1 290.28675000000004L 0.1 290.28675000000004Q 0.1 290.28675000000004 0.1 290.28675000000004L 0.1 255.55158333333335Q 0.1 255.55158333333335 0.1 255.55158333333335z"
                                                        pathFrom="M 0.1 255.55158333333335L 0.1 255.55158333333335L 0.1 290.28675000000004L 0.1 290.28675000000004L 0.1 290.28675000000004L 0.1 290.28675000000004L 0.1 290.28675000000004L 0.1 255.55158333333335"
                                                        cy="305.17325000000005" cx="65.3369419642857" j="5"
                                                        val="9" barHeight="34.73516666666667"
                                                        barWidth="65.2369419642857"></path>
                                                    <g id="SvgjsG1485" class="apexcharts-bar-goals-markers"
                                                        style="pointer-events: none">
                                                        <g id="SvgjsG1486" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG1492" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG1498" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG1504" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG1510" className="apexcharts-bar-goals-groups"></g>
                                                        <g id="SvgjsG1516" className="apexcharts-bar-goals-groups"></g>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1484" class="apexcharts-datalabels" data:realIndex="0">
                                                    <g id="SvgjsG1489" class="apexcharts-data-labels"
                                                        transform="rotate(0)">
                                                        <text id="SvgjsText1491" font-family="Public Sans"
                                                            x="126.94960937499998" y="29.310833333333335"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="13px" font-weight="400" fill="#ffffff"
                                                            class="apexcharts-datalabel" cx="126.94960937499998"
                                                            cy="29.310833333333335"
                                                            style="font-family: &quot;Public Sans&quot;;">Wrappers</text>
                                                    </g>
                                                    <g id="SvgjsG1495" class="apexcharts-data-labels"
                                                        transform="rotate(0)">
                                                        <text id="SvgjsText1497" font-family="Public Sans"
                                                            x="72.58549107142856" y="78.9325" text-anchor="middle"
                                                            dominant-baseline="auto" font-size="13px" font-weight="400"
                                                            fill="#ffffff" class="apexcharts-datalabel"
                                                            cx="72.58549107142856" cy="78.9325"
                                                            style="font-family: &quot;Public Sans&quot;;">Plastic
                                                            Bags</text>
                                                    </g>
                                                    <g id="SvgjsG1501" class="apexcharts-data-labels"
                                                        transform="rotate(0)">
                                                        <text id="SvgjsText1503" font-family="Public Sans"
                                                            x="50.83984374999999" y="128.55416666666667"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="13px" font-weight="400" fill="#ffffff"
                                                            class="apexcharts-datalabel" cx="50.83984374999999"
                                                            cy="128.55416666666667"
                                                            style="font-family: &quot;Public Sans&quot;;">Bottles</text>
                                                    </g>
                                                    <g id="SvgjsG1507" class="apexcharts-data-labels"
                                                        transform="rotate(0)">
                                                        <text id="SvgjsText1509" font-family="Public Sans"
                                                            x="43.591294642857136" y="178.17583333333334"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="13px" font-weight="400" fill="#ffffff"
                                                            class="apexcharts-datalabel" cx="43.591294642857136"
                                                            cy="178.17583333333334"
                                                            style="font-family: &quot;Public Sans&quot;;">Containers
                                                        </text>
                                                    </g>
                                                    <g id="SvgjsG1513" class="apexcharts-data-labels"
                                                        transform="rotate(0)">
                                                        <text id="SvgjsText1515" font-family="Public Sans"
                                                            x="36.34274553571428" y="227.7975" text-anchor="middle"
                                                            dominant-baseline="auto" font-size="13px" font-weight="400"
                                                            fill="#ffffff" class="apexcharts-datalabel"
                                                            cx="36.34274553571428" cy="227.7975"
                                                            style="font-family: &quot;Public Sans&quot;;">Paper
                                                        </text>
                                                    </g>
                                                    <g id="SvgjsG1519" class="apexcharts-data-labels"
                                                        transform="rotate(0)">
                                                        <text id="SvgjsText1521" font-family="Public Sans"
                                                            x="32.71847098214285" y="277.41916666666674"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="13px" font-weight="400" fill="#ffffff"
                                                            class="apexcharts-datalabel" cx="32.71847098214285"
                                                            cy="277.41916666666674"
                                                            style="font-family: &quot;Public Sans&quot;;">Cigarette
                                                        </text>
                                                    </g>
                                                </g>
                                            </g>
                                            <line id="SvgjsLine1567" x1="0" y1="0" x2="253.69921875"
                                                y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine1568" x1="0" y1="0" x2="253.69921875"
                                                y2="0" stroke-dasharray="0" stroke-width="0"
                                                stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                            <g id="SvgjsG1569" class="apexcharts-yaxis-annotations"></g>
                                            <g id="SvgjsG1570" class="apexcharts-xaxis-annotations"></g>
                                            <g id="SvgjsG1571" class="apexcharts-point-annotations"></g>
                                        </g>
                                        <g id="SvgjsG1472" class="apexcharts-annotations"></g>
                                    </svg>
                                    <div class="apexcharts-legend" style="max-height: 160px;"></div>
                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                        <div class="apexcharts-tooltip-title"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                        <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                class="apexcharts-tooltip-marker"
                                                style="background-color: rgb(115, 103, 240);"></span>
                                            <div class="apexcharts-tooltip-text"
                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                <div class="apexcharts-tooltip-y-group"><span
                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                        class="apexcharts-tooltip-text-y-value"></span></div>
                                                <div class="apexcharts-tooltip-goals-group"><span
                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                        class="apexcharts-tooltip-text-goals-value"></span></div>
                                                <div class="apexcharts-tooltip-z-group"><span
                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                        class="apexcharts-tooltip-text-z-value"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                        <div class="apexcharts-yaxistooltip-text"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 335px; height: 336px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                        <div class="col-1 d-none d-xxl-block"></div>
                        <div class="col-md-4 d-flex justify-content-around align-items-center">
                            <div>
                                <div class="d-flex align-items-baseline">
                                    <span class="text-primary me-2"><i class="ti ti-circle-filled ti-12px"></i></span>
                                    <div>
                                        <p class="mb-0">Wrappers</p>
                                        <h5>35%</h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-baseline my-12">
                                    <span class="text-success me-2"><i class="ti ti-circle-filled ti-12px"></i></span>
                                    <div>
                                        <p class="mb-0">Bottles</p>
                                        <h5>14%</h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <span class="text-danger me-2"><i class="ti ti-circle-filled ti-12px"></i></span>
                                    <div>
                                        <p class="mb-0">Paper Napkins</p>
                                        <h5>10%</h5>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="d-flex align-items-baseline">
                                    <span class="text-info me-2"><i class="ti ti-circle-filled ti-12px"></i></span>
                                    <div>
                                        <p class="mb-0">Plastic Bags</p>
                                        <h5>20%</h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-baseline my-12">
                                    <span class="text-secondary me-2"><i class="ti ti-circle-filled ti-12px"></i></span>
                                    <div>
                                        <p class="mb-0">Containers</p>
                                        <h5>12%</h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-baseline">
                                    <span class="text-warning me-2"><i class="ti ti-circle-filled ti-12px"></i></span>
                                    <div>
                                        <p class="mb-0">Cigarette Butts</p>
                                        <h5>9%</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">City levels</h5>
                        <div class="dropdown">
                            <button
                                class="btn btn-text-secondary rounded-pill text-muted border-0 p-2 me-n1 waves-effect waves-light"
                                type="button" id="assignmentProgress" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="ti ti-dots-vertical ti-md text-muted"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="assignmentProgress">
                                <a class="dropdown-item waves-effect" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item waves-effect" href="javascript:void(0);">Download</a>
                                <a class="dropdown-item waves-effect" href="javascript:void(0);">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-6" style="position: relative;">
                                <div class="chart-progress me-4" data-color="primary" data-series="72"
                                    data-progress_variant="true" style="min-height: 62.7px;">
                                    <div id="apexchartscmncue3s"
                                        class="apexcharts-canvas apexchartscmncue3s apexcharts-theme-light"
                                        style="width: 58px; height: 62.7px;"><svg id="SvgjsSvg1564" width="58"
                                            height="62.7" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                            class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                            style="background: transparent;">
                                            <g id="SvgjsG1566" class="apexcharts-inner apexcharts-graphical"
                                                transform="translate(-18, -12)">
                                                <defs id="SvgjsDefs1565">
                                                    <clipPath id="gridRectMaskcmncue3s">
                                                        <rect id="SvgjsRect1568" width="98" height="91" x="-3"
                                                            y="-1" rx="0" ry="0" opacity="1"
                                                            stroke-width="0" stroke="none" stroke-dasharray="0"
                                                            fill="#fff"></rect>
                                                    </clipPath>
                                                    <clipPath id="forecastMaskcmncue3s"></clipPath>
                                                    <clipPath id="nonForecastMaskcmncue3s"></clipPath>
                                                    <clipPath id="gridRectMarkerMaskcmncue3s">
                                                        <rect id="SvgjsRect1569" width="96" height="93" x="-2"
                                                            y="-2" rx="0" ry="0" opacity="1"
                                                            stroke-width="0" stroke="none" stroke-dasharray="0"
                                                            fill="#fff"></rect>
                                                    </clipPath>
                                                </defs>
                                                <g id="SvgjsG1570" class="apexcharts-radialbar">
                                                    <g id="SvgjsG1571">
                                                        <g id="SvgjsG1572" class="apexcharts-tracks">
                                                            <g id="SvgjsG1573"
                                                                class="apexcharts-radialbar-track apexcharts-track"
                                                                rel="1">
                                                                <path id="apexcharts-radialbarTrack-0"
                                                                    d="M 46 18.615853658536583 A 25.884146341463417 25.884146341463417 0 1 1 45.99548236424567 18.615854052774676"
                                                                    fill="none" fill-opacity="1" stroke="#a8aaae29"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="4.223048780487806" stroke-dasharray="0"
                                                                    class="apexcharts-radialbar-area"
                                                                    data:pathOrig="M 46 18.615853658536583 A 25.884146341463417 25.884146341463417 0 1 1 45.99548236424567 18.615854052774676">
                                                                </path>
                                                            </g>
                                                        </g>
                                                        <g id="SvgjsG1575">
                                                            <g id="SvgjsG1580"
                                                                class="apexcharts-series apexcharts-radial-series"
                                                                seriesName="" rel="1" data:realIndex="0">
                                                                <path id="SvgjsPath1581"
                                                                    d="M 46 18.615853658536583 A 25.884146341463417 25.884146341463417 0 1 1 20.59141833088211 49.43892795959411"
                                                                    fill="none" fill-opacity="0.85"
                                                                    stroke="rgba(115,103,240,0.85)" stroke-opacity="1"
                                                                    stroke-linecap="round"
                                                                    stroke-width="4.3536585365853675" stroke-dasharray="0"
                                                                    class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                                    data:angle="259" data:value="72" index="0" j="0"
                                                                    data:pathOrig="M 46 18.615853658536583 A 25.884146341463417 25.884146341463417 0 1 1 20.59141833088211 49.43892795959411">
                                                                </path>
                                                            </g>
                                                            <circle id="SvgjsCircle1576" r="18.772621951219513"
                                                                cx="46" cy="44.5"
                                                                class="apexcharts-radialbar-hollow" fill="transparent">
                                                            </circle>
                                                            <g id="SvgjsG1577" class="apexcharts-datalabels-group"
                                                                transform="translate(0, 0) scale(1)" style="opacity: 1;">
                                                                <text id="SvgjsText1578"
                                                                    font-family="Helvetica, Arial, sans-serif" x="46"
                                                                    y="44.5" text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="16px" font-weight="500" fill="#7367f0"
                                                                    class="apexcharts-text apexcharts-datalabel-label"
                                                                    style="font-family: Helvetica, Arial, sans-serif;"></text><text
                                                                    id="SvgjsText1579" font-family="Public Sans" x="46"
                                                                    y="50.5" text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="15px" font-weight="500" fill="#444050"
                                                                    class="apexcharts-text apexcharts-datalabel-value"
                                                                    style="font-family: &quot;Public Sans&quot;;">72%</text>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                                <line id="SvgjsLine1582" x1="0" y1="0" x2="92"
                                                    y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                                    stroke-width="1" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine1583" x1="0" y1="0" x2="92"
                                                    y2="0" stroke-dasharray="0" stroke-width="0"
                                                    stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                            </g>
                                            <g id="SvgjsG1567" class="apexcharts-annotations"></g>
                                        </svg>
                                        <div class="apexcharts-legend"></div>
                                    </div>
                                </div>
                                <div class="row w-100 align-items-center">
                                    <div class="col-9">
                                        <div class="me-2">
                                            <h6 class="mb-2">Riyadh</h6>
                                            <small>120 Tasks</small>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <button type="button"
                                            class="btn btn-sm btn-icon btn-label-secondary waves-effect">
                                            <i class="ti ti-chevron-right scaleX-n1-rtl"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 311px; height: 74px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </li>
                            
                            <li class="d-flex mb-6" style="position: relative;">
                                <div class="chart-progress me-4" data-color="success" data-series="48"
                                    data-progress_variant="true" style="min-height: 62.7px;">
                                    <div id="apexchartsjfheg8ifl"
                                        class="apexcharts-canvas apexchartsjfheg8ifl apexcharts-theme-light"
                                        style="width: 58px; height: 62.7px;"><svg id="SvgjsSvg1584" width="58"
                                            height="62.7" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                            class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                            style="background: transparent;">
                                            <g id="SvgjsG1586" class="apexcharts-inner apexcharts-graphical"
                                                transform="translate(-18, -12)">
                                                <defs id="SvgjsDefs1585">
                                                    <clipPath id="gridRectMaskjfheg8ifl">
                                                        <rect id="SvgjsRect1588" width="98" height="91" x="-3"
                                                            y="-1" rx="0" ry="0" opacity="1"
                                                            stroke-width="0" stroke="none" stroke-dasharray="0"
                                                            fill="#fff"></rect>
                                                    </clipPath>
                                                    <clipPath id="forecastMaskjfheg8ifl"></clipPath>
                                                    <clipPath id="nonForecastMaskjfheg8ifl"></clipPath>
                                                    <clipPath id="gridRectMarkerMaskjfheg8ifl">
                                                        <rect id="SvgjsRect1589" width="96" height="93" x="-2"
                                                            y="-2" rx="0" ry="0" opacity="1"
                                                            stroke-width="0" stroke="none" stroke-dasharray="0"
                                                            fill="#fff"></rect>
                                                    </clipPath>
                                                </defs>
                                                <g id="SvgjsG1590" class="apexcharts-radialbar">
                                                    <g id="SvgjsG1591">
                                                        <g id="SvgjsG1592" class="apexcharts-tracks">
                                                            <g id="SvgjsG1593"
                                                                class="apexcharts-radialbar-track apexcharts-track"
                                                                rel="1">
                                                                <path id="apexcharts-radialbarTrack-0"
                                                                    d="M 46 18.615853658536583 A 25.884146341463417 25.884146341463417 0 1 1 45.99548236424567 18.615854052774676"
                                                                    fill="none" fill-opacity="1" stroke="#a8aaae29"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="4.223048780487806" stroke-dasharray="0"
                                                                    class="apexcharts-radialbar-area"
                                                                    data:pathOrig="M 46 18.615853658536583 A 25.884146341463417 25.884146341463417 0 1 1 45.99548236424567 18.615854052774676">
                                                                </path>
                                                            </g>
                                                        </g>
                                                        <g id="SvgjsG1595">
                                                            <g id="SvgjsG1600"
                                                                class="apexcharts-series apexcharts-radial-series"
                                                                seriesName="" rel="1" data:realIndex="0">
                                                                <path id="SvgjsPath1601"
                                                                    d="M 46 18.615853658536583 A 25.884146341463417 25.884146341463417 0 0 1 49.154483919236895 70.19120983974031"
                                                                    fill="none" fill-opacity="0.85"
                                                                    stroke="rgba(40,199,111,0.85)" stroke-opacity="1"
                                                                    stroke-linecap="round"
                                                                    stroke-width="4.3536585365853675" stroke-dasharray="0"
                                                                    class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                                    data:angle="173" data:value="48" index="0" j="0"
                                                                    data:pathOrig="M 46 18.615853658536583 A 25.884146341463417 25.884146341463417 0 0 1 49.154483919236895 70.19120983974031">
                                                                </path>
                                                            </g>
                                                            <circle id="SvgjsCircle1596" r="18.772621951219513"
                                                                cx="46" cy="44.5"
                                                                class="apexcharts-radialbar-hollow" fill="transparent">
                                                            </circle>
                                                            <g id="SvgjsG1597" class="apexcharts-datalabels-group"
                                                                transform="translate(0, 0) scale(1)" style="opacity: 1;">
                                                                <text id="SvgjsText1598"
                                                                    font-family="Helvetica, Arial, sans-serif" x="46"
                                                                    y="44.5" text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="16px" font-weight="500" fill="#28c76f"
                                                                    class="apexcharts-text apexcharts-datalabel-label"
                                                                    style="font-family: Helvetica, Arial, sans-serif;"></text><text
                                                                    id="SvgjsText1599" font-family="Public Sans" x="46"
                                                                    y="50.5" text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="15px" font-weight="500" fill="#444050"
                                                                    class="apexcharts-text apexcharts-datalabel-value"
                                                                    style="font-family: &quot;Public Sans&quot;;">48%</text>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                                <line id="SvgjsLine1602" x1="0" y1="0" x2="92"
                                                    y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                                                    stroke-width="1" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine1603" x1="0" y1="0" x2="92"
                                                    y2="0" stroke-dasharray="0" stroke-width="0"
                                                    stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                            </g>
                                            <g id="SvgjsG1587" class="apexcharts-annotations"></g>
                                        </svg>
                                        <div class="apexcharts-legend"></div>
                                    </div>
                                </div>
                                <div class="row w-100 align-items-center">
                                    <div class="col-9">
                                        <div class="me-2">
                                            <h6 class="mb-2">Mecca</h6>
                                            <small>32 Tasks</small>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <button type="button"
                                            class="btn btn-sm btn-icon btn-label-secondary waves-effect">
                                            <i class="ti ti-chevron-right scaleX-n1-rtl"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 311px; height: 64px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </li>
                            <li class="d-flex" style="position: relative;">
                                <div class="chart-progress me-4" data-color="info" data-series="24"
                                    data-progress_variant="true" style="min-height: 62.7px;">
                                    <div id="apexchartsf64myijz"
                                        class="apexcharts-canvas apexchartsf64myijz apexcharts-theme-light"
                                        style="width: 58px; height: 62.7px;"><svg id="SvgjsSvg1624" width="58"
                                            height="62.7" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                            class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                            transform="translate(0, 0)" style="background: transparent;">
                                            <g id="SvgjsG1626" class="apexcharts-inner apexcharts-graphical"
                                                transform="translate(-18, -12)">
                                                <defs id="SvgjsDefs1625">
                                                    <clipPath id="gridRectMaskf64myijz">
                                                        <rect id="SvgjsRect1628" width="98" height="91" x="-3"
                                                            y="-1" rx="0" ry="0" opacity="1"
                                                            stroke-width="0" stroke="none" stroke-dasharray="0"
                                                            fill="#fff"></rect>
                                                    </clipPath>
                                                    <clipPath id="forecastMaskf64myijz"></clipPath>
                                                    <clipPath id="nonForecastMaskf64myijz"></clipPath>
                                                    <clipPath id="gridRectMarkerMaskf64myijz">
                                                        <rect id="SvgjsRect1629" width="96" height="93" x="-2"
                                                            y="-2" rx="0" ry="0" opacity="1"
                                                            stroke-width="0" stroke="none" stroke-dasharray="0"
                                                            fill="#fff"></rect>
                                                    </clipPath>
                                                </defs>
                                                <g id="SvgjsG1630" class="apexcharts-radialbar">
                                                    <g id="SvgjsG1631">
                                                        <g id="SvgjsG1632" class="apexcharts-tracks">
                                                            <g id="SvgjsG1633"
                                                                class="apexcharts-radialbar-track apexcharts-track"
                                                                rel="1">
                                                                <path id="apexcharts-radialbarTrack-0"
                                                                    d="M 46 18.615853658536583 A 25.884146341463417 25.884146341463417 0 1 1 45.99548236424567 18.615854052774676"
                                                                    fill="none" fill-opacity="1" stroke="#a8aaae29"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="4.223048780487806"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-radialbar-area"
                                                                    data:pathOrig="M 46 18.615853658536583 A 25.884146341463417 25.884146341463417 0 1 1 45.99548236424567 18.615854052774676">
                                                                </path>
                                                            </g>
                                                        </g>
                                                        <g id="SvgjsG1635">
                                                            <g id="SvgjsG1640"
                                                                class="apexcharts-series apexcharts-radial-series"
                                                                seriesName="" rel="1" data:realIndex="0">
                                                                <path id="SvgjsPath1641"
                                                                    d="M 46 18.615853658536583 A 25.884146341463417 25.884146341463417 0 0 1 71.82109386190825 42.69441322534261"
                                                                    fill="none" fill-opacity="0.85"
                                                                    stroke="rgba(0,186,209,0.85)" stroke-opacity="1"
                                                                    stroke-linecap="round"
                                                                    stroke-width="4.3536585365853675"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                                    data:angle="86" data:value="24" index="0"
                                                                    j="0"
                                                                    data:pathOrig="M 46 18.615853658536583 A 25.884146341463417 25.884146341463417 0 0 1 71.82109386190825 42.69441322534261">
                                                                </path>
                                                            </g>
                                                            <circle id="SvgjsCircle1636" r="18.772621951219513"
                                                                cx="46" cy="44.5"
                                                                class="apexcharts-radialbar-hollow" fill="transparent">
                                                            </circle>
                                                            <g id="SvgjsG1637" class="apexcharts-datalabels-group"
                                                                transform="translate(0, 0) scale(1)"
                                                                style="opacity: 1;">
                                                                <text id="SvgjsText1638"
                                                                    font-family="Helvetica, Arial, sans-serif" x="46"
                                                                    y="44.5" text-anchor="middle"
                                                                    dominant-baseline="auto" font-size="16px"
                                                                    font-weight="500" fill="#00bad1"
                                                                    class="apexcharts-text apexcharts-datalabel-label"
                                                                    style="font-family: Helvetica, Arial, sans-serif;"></text><text
                                                                    id="SvgjsText1639" font-family="Public Sans" x="46"
                                                                    y="50.5" text-anchor="middle"
                                                                    dominant-baseline="auto" font-size="15px"
                                                                    font-weight="500" fill="#444050"
                                                                    class="apexcharts-text apexcharts-datalabel-value"
                                                                    style="font-family: &quot;Public Sans&quot;;">24%</text>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                                <line id="SvgjsLine1642" x1="0" y1="0"
                                                    x2="92" y2="0" stroke="#b6b6b6"
                                                    stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine1643" x1="0" y1="0"
                                                    x2="92" y2="0" stroke-dasharray="0"
                                                    stroke-width="0" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs-hidden"></line>
                                            </g>
                                            <g id="SvgjsG1627" class="apexcharts-annotations"></g>
                                        </svg>
                                        <div class="apexcharts-legend"></div>
                                    </div>
                                </div>
                                <div class="row w-100 align-items-center">
                                    <div class="col-9">
                                        <div class="me-2">
                                            <h6 class="mb-2">Dammam</h6>
                                            <small>56 Tasks</small>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <button type="button"
                                            class="btn btn-sm btn-icon btn-label-secondary waves-effect">
                                            <i class="ti ti-chevron-right scaleX-n1-rtl"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 311px; height: 64px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </li>
                            <li class="d-flex mb-6" style="position: relative;">
                                <div class="chart-progress me-4" data-color="danger" data-series="15"
                                    data-progress_variant="true" style="min-height: 62.7px;">
                                    <div id="apexchartsbzodh36b"
                                        class="apexcharts-canvas apexchartsbzodh36b apexcharts-theme-light"
                                        style="width: 58px; height: 62.7px;"><svg id="SvgjsSvg1604" width="58"
                                            height="62.7" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                            class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                            style="background: transparent;">
                                            <g id="SvgjsG1606" class="apexcharts-inner apexcharts-graphical"
                                                transform="translate(-18, -12)">
                                                <defs id="SvgjsDefs1605">
                                                    <clipPath id="gridRectMaskbzodh36b">
                                                        <rect id="SvgjsRect1608" width="98" height="91" x="-3"
                                                            y="-1" rx="0" ry="0" opacity="1"
                                                            stroke-width="0" stroke="none" stroke-dasharray="0"
                                                            fill="#fff"></rect>
                                                    </clipPath>
                                                    <clipPath id="forecastMaskbzodh36b"></clipPath>
                                                    <clipPath id="nonForecastMaskbzodh36b"></clipPath>
                                                    <clipPath id="gridRectMarkerMaskbzodh36b">
                                                        <rect id="SvgjsRect1609" width="96" height="93" x="-2"
                                                            y="-2" rx="0" ry="0" opacity="1"
                                                            stroke-width="0" stroke="none" stroke-dasharray="0"
                                                            fill="#fff"></rect>
                                                    </clipPath>
                                                </defs>
                                                <g id="SvgjsG1610" class="apexcharts-radialbar">
                                                    <g id="SvgjsG1611">
                                                        <g id="SvgjsG1612" class="apexcharts-tracks">
                                                            <g id="SvgjsG1613"
                                                                class="apexcharts-radialbar-track apexcharts-track"
                                                                rel="1">
                                                                <path id="apexcharts-radialbarTrack-0"
                                                                    d="M 46 18.615853658536583 A 25.884146341463417 25.884146341463417 0 1 1 45.99548236424567 18.615854052774676"
                                                                    fill="none" fill-opacity="1" stroke="#a8aaae29"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="4.223048780487806" stroke-dasharray="0"
                                                                    class="apexcharts-radialbar-area"
                                                                    data:pathOrig="M 46 18.615853658536583 A 25.884146341463417 25.884146341463417 0 1 1 45.99548236424567 18.615854052774676">
                                                                </path>
                                                            </g>
                                                        </g>
                                                        <g id="SvgjsG1615">
                                                            <g id="SvgjsG1620"
                                                                class="apexcharts-series apexcharts-radial-series"
                                                                seriesName="" rel="1" data:realIndex="0">
                                                                <path id="SvgjsPath1621"
                                                                    d="M 46 18.615853658536583 A 25.884146341463417 25.884146341463417 0 0 1 66.94071427513202 29.28568051230763"
                                                                    fill="none" fill-opacity="0.85"
                                                                    stroke="rgba(255,76,81,0.85)" stroke-opacity="1"
                                                                    stroke-linecap="round"
                                                                    stroke-width="4.3536585365853675" stroke-dasharray="0"
                                                                    class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                                    data:angle="54" data:value="15" index="0" j="0"
                                                                    data:pathOrig="M 46 18.615853658536583 A 25.884146341463417 25.884146341463417 0 0 1 66.94071427513202 29.28568051230763">
                                                                </path>
                                                            </g>
                                                            <circle id="SvgjsCircle1616" r="18.772621951219513"
                                                                cx="46" cy="44.5"
                                                                class="apexcharts-radialbar-hollow" fill="transparent">
                                                            </circle>
                                                            <g id="SvgjsG1617" class="apexcharts-datalabels-group"
                                                                transform="translate(0, 0) scale(1)" style="opacity: 1;">
                                                                <text id="SvgjsText1618"
                                                                    font-family="Helvetica, Arial, sans-serif" x="46"
                                                                    y="44.5" text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="16px" font-weight="500" fill="#ff4c51"
                                                                    class="apexcharts-text apexcharts-datalabel-label"
                                                                    style="font-family: Helvetica, Arial, sans-serif;"></text><text
                                                                    id="SvgjsText1619" font-family="Public Sans" x="46"
                                                                    y="50.5" text-anchor="middle"
                                                                    dominant-baseline="auto" font-size="px"
                                                                    font-weight="500" fill="#444050"
                                                                    class="apexcharts-text apexcharts-datalabel-value"
                                                                    style="font-family: &quot;Public Sans&quot;;">27%</text>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                                <line id="SvgjsLine1622" x1="0" y1="0"
                                                    x2="92" y2="0" stroke="#b6b6b6"
                                                    stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine1623" x1="0" y1="0"
                                                    x2="92" y2="0" stroke-dasharray="0"
                                                    stroke-width="0" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs-hidden"></line>
                                            </g>
                                            <g id="SvgjsG1607" class="apexcharts-annotations"></g>
                                        </svg>
                                        <div class="apexcharts-legend"></div>
                                    </div>
                                </div>
                                <div class="row w-100 align-items-center">
                                    <div class="col-9">
                                        <div class="me-2">
                                            <h6 class="mb-2">Jeddah</h6>
                                            <small>182 Tasks</small>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <button type="button"
                                            class="btn btn-sm btn-icon btn-label-secondary waves-effect">
                                            <i class="ti ti-chevron-right scaleX-n1-rtl"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 311px; height: 74px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </li>
                            
                            <li class="d-flex mb-6" style="position: relative;">
                                <div class="chart-progress me-4" data-color="danger" data-series="15"
                                    data-progress_variant="true" style="min-height: 62.7px;">
                                    <div id="apexchartsbzodh36b"
                                        class="apexcharts-canvas apexchartsbzodh36b apexcharts-theme-light"
                                        style="width: 58px; height: 62.7px;"><svg id="SvgjsSvg1604" width="58"
                                            height="62.7" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                            class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                            style="background: transparent;">
                                            <g id="SvgjsG1606" class="apexcharts-inner apexcharts-graphical"
                                                transform="translate(-18, -12)">
                                                <defs id="SvgjsDefs1605">
                                                    <clipPath id="gridRectMaskbzodh36b">
                                                        <rect id="SvgjsRect1608" width="98" height="91" x="-3"
                                                            y="-1" rx="0" ry="0" opacity="1"
                                                            stroke-width="0" stroke="none" stroke-dasharray="0"
                                                            fill="#fff"></rect>
                                                    </clipPath>
                                                    <clipPath id="forecastMaskbzodh36b"></clipPath>
                                                    <clipPath id="nonForecastMaskbzodh36b"></clipPath>
                                                    <clipPath id="gridRectMarkerMaskbzodh36b">
                                                        <rect id="SvgjsRect1609" width="96" height="93" x="-2"
                                                            y="-2" rx="0" ry="0" opacity="1"
                                                            stroke-width="0" stroke="none" stroke-dasharray="0"
                                                            fill="#fff"></rect>
                                                    </clipPath>
                                                </defs>
                                                <g id="SvgjsG1610" class="apexcharts-radialbar">
                                                    <g id="SvgjsG1611">
                                                        <g id="SvgjsG1612" class="apexcharts-tracks">
                                                            <g id="SvgjsG1613"
                                                                class="apexcharts-radialbar-track apexcharts-track"
                                                                rel="1">
                                                                <path id="apexcharts-radialbarTrack-0"
                                                                    d="M 46 18.615853658536583 A 25.884146341463417 25.884146341463417 0 1 1 45.99548236424567 18.615854052774676"
                                                                    fill="none" fill-opacity="1" stroke="#a8aaae29"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="4.223048780487806" stroke-dasharray="0"
                                                                    class="apexcharts-radialbar-area"
                                                                    data:pathOrig="M 46 18.615853658536583 A 25.884146341463417 25.884146341463417 0 1 1 45.99548236424567 18.615854052774676">
                                                                </path>
                                                            </g>
                                                        </g>
                                                        <g id="SvgjsG1615">
                                                            <g id="SvgjsG1620"
                                                                class="apexcharts-series apexcharts-radial-series"
                                                                seriesName="" rel="1" data:realIndex="0">
                                                                <path id="SvgjsPath1621"
                                                                    d="M 46 18.615853658536583 A 25.884146341463417 25.884146341463417 0 0 1 66.94071427513202 29.28568051230763"
                                                                    fill="none" fill-opacity="0.85"
                                                                    stroke="rgba(255,76,81,0.85)" stroke-opacity="1"
                                                                    stroke-linecap="round"
                                                                    stroke-width="4.3536585365853675" stroke-dasharray="0"
                                                                    class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                                    data:angle="54" data:value="15" index="0" j="0"
                                                                    data:pathOrig="M 46 18.615853658536583 A 25.884146341463417 25.884146341463417 0 0 1 66.94071427513202 29.28568051230763">
                                                                </path>
                                                            </g>
                                                            <circle id="SvgjsCircle1616" r="18.772621951219513"
                                                                cx="46" cy="44.5"
                                                                class="apexcharts-radialbar-hollow" fill="transparent">
                                                            </circle>
                                                            <g id="SvgjsG1617" class="apexcharts-datalabels-group"
                                                                transform="translate(0, 0) scale(1)" style="opacity: 1;">
                                                                <text id="SvgjsText1618"
                                                                    font-family="Helvetica, Arial, sans-serif" x="46"
                                                                    y="44.5" text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="16px" font-weight="500" fill="#ff4c51"
                                                                    class="apexcharts-text apexcharts-datalabel-label"
                                                                    style="font-family: Helvetica, Arial, sans-serif;"></text><text
                                                                    id="SvgjsText1619" font-family="Public Sans" x="46"
                                                                    y="50.5" text-anchor="middle"
                                                                    dominant-baseline="auto" font-size="15px"
                                                                    font-weight="500" fill="#444050"
                                                                    class="apexcharts-text apexcharts-datalabel-value"
                                                                    style="font-family: &quot;Public Sans&quot;;">15%</text>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                                <line id="SvgjsLine1622" x1="0" y1="0"
                                                    x2="92" y2="0" stroke="#b6b6b6"
                                                    stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine1623" x1="0" y1="0"
                                                    x2="92" y2="0" stroke-dasharray="0"
                                                    stroke-width="0" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs-hidden"></line>
                                            </g>
                                            <g id="SvgjsG1607" class="apexcharts-annotations"></g>
                                        </svg>
                                        <div class="apexcharts-legend"></div>
                                    </div>
                                </div>
                                <div class="row w-100 align-items-center">
                                    <div class="col-9">
                                        <div class="me-2">
                                            <h6 class="mb-2">Almadina</h6>
                                            <small>182 Tasks</small>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <button type="button"
                                            class="btn btn-sm btn-icon btn-label-secondary waves-effect">
                                            <i class="ti ti-chevron-right scaleX-n1-rtl"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 311px; height: 74px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <div class="card">

                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="card-title mb-0">
                                <h5 class="m-0 me-2">Violations</h5>
                            </div>
                            <div class="dropdown">
                                <button
                                    class="btn btn-text-secondary rounded-pill text-muted border-0 p-2 me-n1 waves-effect waves-light"
                                    type="button" id="routeVehicles" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ti ti-dots-vertical ti-md text-muted"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="routeVehicles">
                                    <a class="dropdown-item waves-effect" href="javascript:void(0);">Select All</a>
                                    <a class="dropdown-item waves-effect" href="javascript:void(0);">Refresh</a>
                                    <a class="dropdown-item waves-effect" href="javascript:void(0);">Share</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-datatable table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <div class="table-responsive">
                                    <table class="dt-route-vehicles table table-sm dataTable no-footer dtr-column"
                                        id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"
                                        style="width: 1206px;">
                                        <thead>
                                            <tr>
                                                <th class="control sorting_disabled dtr-hidden" rowspan="1"
                                                    colspan="1" style="width: 0px; display: none;" aria-label="">
                                                </th>

                                                <th class="sorting sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 144px;"
                                                    aria-label="location: activate to sort column descending"
                                                    aria-sort="ascending">name</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 215px;"
                                                    aria-label="starting route: activate to sort column ascending">place
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 213px;"
                                                    aria-label="ending route: activate to sort column ascending">time
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 175px;"
                                                    aria-label="warnings: activate to sort column ascending">plate</th>

                                                <th class="w-20 sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 205px;"
                                                    aria-label="progress: activate to sort column ascending">Trach type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd">
                                                <td class="control dtr-hidden" tabindex="0" style="display: none;">
                                                </td>


                                                <td class="" style="">
                                                    <div class="text-body">Ahmed Ali</div>
                                                </td>
                                                <td class="control dtr-hidden" tabindex="0" style="display: none;">
                                                </td>


                                                <td class="" style="">
                                                    <div class="text-body">4-th street , Almrooj</div>

                                                    </div>
                                                </td>
                                                <td class="control dtr-hidden" tabindex="0" style="display: none;">
                                                </td>


                                                <td class="" style="">
                                                    <div class="text-body">4-2-2025 10:00 AM</div>
                                                </td>
                                                <td class="" style="">
                                                    <div class="text-body">4521 ADH</div>
                                                </td>
                                                <td class="" style="">
                                                    <div class="text-body">Wrappers</div>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="width: 1%;"></div>
                                </div>
                                <div class="row d-flex align-items-center">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_info pt-0" id="DataTables_Table_0_info" role="status"
                                            aria-live="polite">Showing 1 to 5 of 25 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                            id="DataTables_Table_0_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="DataTables_Table_0_previous"><a
                                                        aria-controls="DataTables_Table_0" aria-disabled="true"
                                                        role="link" data-dt-idx="previous" tabindex="-1"
                                                        class="page-link"><i class="ti ti-chevron-left ti-sm"></i></a>
                                                </li>
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="DataTables_Table_0" role="link"
                                                        aria-current="page" data-dt-idx="0" tabindex="0"
                                                        class="page-link">1</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="DataTables_Table_0" role="link"
                                                        data-dt-idx="1" tabindex="0" class="page-link">2</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="DataTables_Table_0" role="link"
                                                        data-dt-idx="2" tabindex="0" class="page-link">3</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="DataTables_Table_0" role="link"
                                                        data-dt-idx="3" tabindex="0" class="page-link">4</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="DataTables_Table_0" role="link"
                                                        data-dt-idx="4" tabindex="0" class="page-link">5</a></li>
                                                <li class="paginate_button page-item next" id="DataTables_Table_0_next">
                                                    <a href="#" aria-controls="DataTables_Table_0"
                                                        role="link" data-dt-idx="next" tabindex="0"
                                                        class="page-link"><i class="ti ti-chevron-right ti-sm"></i></a>
                                                </li>
                                            </ul>
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
    <!--/ Content -->

@endsection
