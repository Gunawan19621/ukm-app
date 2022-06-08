<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta
    name="viewport"
    content="width=device-width, initial-scale=1, viewport-fit=cover"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $title }}</title>

    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css"/>

    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
    {{-- Bootstrap5 --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    <!-- CSS files -->
    <link href="../../dist/css/tabler.min.css" rel="stylesheet" />
    <link href="../../dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="../../dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="../../dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="../../dist/css/demo.min.css" rel="stylesheet" />
    {{-- Sweetalert2 --}}
    <link rel="stylesheet" href="sweetalert2/sweetalert2.css">
    <script src="sweetalert2/sweetalert2.js"></script>
    {{-- Trix Editor --}}
    <link rel="stylesheet" href="/css/trix.css">
    <script src="/js/trix.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display: none;
        }
    </style>
    {{-- Trix Editor END --}}

</head>
<body>

    <div class="page">
        {{-- Header Start --}}
        @include('dashboard.layouts.navbar')
        {{-- Header END --}}
        <div class="page-wrapper">
            @yield('container')
            {{-- Footer Start --}}
            @include('dashboard.layouts.footer')
            {{-- END Footer --}}
        </div>
    </div>
    <!-- Libs JS -->
    <script src="../../dist/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../../dist/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
    <script src="../../dist/libs/jsvectormap/dist/maps/world.js"></script>
    <script src="../../dist/libs/jsvectormap/dist/maps/world-merc.js"></script>
    <!-- Tabler Core -->
    <script src="../../dist/js/tabler.min.js"></script>
    <script src="../../dist/js/demo.min.js"></script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-uptime'), {
                chart: {
                    type: "area",
                    fontFamily: 'inherit',
                    height: 240,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: false,
                    },
                    animations: {
                        enabled: false
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: .16,
                    type: 'solid'
                },
                stroke: {
                    width: 2,
                    lineCap: "round",
                    curve: "smooth",
                },
                series: [{
                    name: "Uptime",
                    data: [150, 160, 170, 161, 167, 162, 161, 152, 141, 144, 154, 166, 176, 187, 198, 210, 196, 207, 200, 187, 192, 204, 193, 204, 208, 196, 193, 178, 191, 204, 218, 211, 218, 216, 201, 197, 190, 179, 172, 158, 159, 147, 152, 152, 144, 137, 136, 123, 112, 99, 100, 95, 105, 116, 125, 124, 133, 129, 116, 119, 109, 114, 115, 111, 96, 104, 104, 102, 116, 126, 117, 130, 124, 126, 131, 143, 130, 116, 118, 122, 132, 126, 136, 123, 112, 116, 113, 113, 109, 99, 100, 95, 83, 79, 64, 79, 81, 94, 99, 97, 83, 71, 75, 69, 71, 75, 84, 90, 100, 96, 108, 102, 116, 112, 112, 102, 115, 120, 118, 118]
                }],
                grid: {
                    padding: {
                        top: -20,
                        right: 0,
                        left: -4,
                        bottom: -4
                    },
                    strokeDashArray: 4,
                },
                xaxis: {
                    labels: {
                        padding: 0,
                    },
                    tooltip: {
                        enabled: false
                    },
                    axisBorder: {
                        show: false,
                    },
                    type: 'datetime',
                },
                yaxis: {
                    labels: {
                        padding: 4
                    },
                },
                labels: [
                '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19', '2020-07-20', '2020-07-21', '2020-07-22', '2020-07-23', '2020-07-24', '2020-07-25', '2020-07-26', '2020-07-27', '2020-07-28', '2020-07-29', '2020-07-30', '2020-07-31', '2020-08-01', '2020-08-02', '2020-08-03', '2020-08-04', '2020-08-05', '2020-08-06', '2020-08-07', '2020-08-08', '2020-08-09', '2020-08-10', '2020-08-11', '2020-08-12', '2020-08-13', '2020-08-14', '2020-08-15', '2020-08-16', '2020-08-17', '2020-08-18', '2020-08-19', '2020-08-20', '2020-08-21', '2020-08-22', '2020-08-23', '2020-08-24', '2020-08-25', '2020-08-26', '2020-08-27', '2020-08-28', '2020-08-29', '2020-08-30', '2020-08-31', '2020-09-01', '2020-09-02', '2020-09-03', '2020-09-04', '2020-09-05', '2020-09-06', '2020-09-07', '2020-09-08', '2020-09-09', '2020-09-10', '2020-09-11', '2020-09-12', '2020-09-13', '2020-09-14', '2020-09-15', '2020-09-16', '2020-09-17', '2020-09-18', '2020-09-19', '2020-09-20', '2020-09-21', '2020-09-22', '2020-09-23', '2020-09-24', '2020-09-25', '2020-09-26', '2020-09-27', '2020-09-28', '2020-09-29', '2020-09-30', '2020-10-01', '2020-10-02', '2020-10-03', '2020-10-04', '2020-10-05', '2020-10-06', '2020-10-07', '2020-10-08', '2020-10-09', '2020-10-10', '2020-10-11', '2020-10-12', '2020-10-13', '2020-10-14', '2020-10-15', '2020-10-16', '2020-10-17'
                ],
                colors: ["#206bc4"],
                legend: {
                    show: false,
                },
            })).render();
        });
        // @formatter:on
    </script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-uptime-incidents'), {
                chart: {
                    type: "bar",
                    fontFamily: 'inherit',
                    height: 240,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: false,
                    },
                    animations: {
                        enabled: false
                    },
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%',
                    }
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: 1,
                },
                series: [{
                    name: "Uptime incidents",
                    data: [1, 2, 6, 3, 1, 1, 2, 5, 2, 5, 6, 2, 4, 3, 4, 5, 4, 3, 2, 1, 2, 0, 2, 1, 1]
                }],
                grid: {
                    padding: {
                        top: -20,
                        right: 0,
                        left: -4,
                        bottom: -4
                    },
                    strokeDashArray: 4,
                },
                xaxis: {
                    labels: {
                        padding: 0,
                    },
                    tooltip: {
                        enabled: false
                    },
                    axisBorder: {
                        show: false,
                    },
                    type: 'datetime',
                },
                yaxis: {
                    labels: {
                        padding: 4
                    },
                    max: 20,
                },
                labels: [
                '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14'
                ],
                colors: ["#cd201f"],
                legend: {
                    show: false,
                },
            })).render();
        });
        // @formatter:on
    </script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts &&
            new ApexCharts(document.getElementById("chart-revenue-bg"), {
                chart: {
                    type: "area",
                    fontFamily: "inherit",
                    height: 40.0,
                    sparkline: {
                        enabled: true,
                    },
                    animations: {
                        enabled: false,
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: 0.16,
                    type: "solid",
                },
                stroke: {
                    width: 2,
                    lineCap: "round",
                    curve: "smooth",
                },
                series: [
                {
                    name: "Profits",
                    data: [
                    37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35,
                    41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62,
                    51, 35, 41, 67,
                    ],
                },
                ],
                grid: {
                    strokeDashArray: 4,
                },
                xaxis: {
                    labels: {
                        padding: 0,
                    },
                    tooltip: {
                        enabled: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                    type: "datetime",
                },
                yaxis: {
                    labels: {
                        padding: 4,
                    },
                },
                labels: [
                "2020-06-20",
                "2020-06-21",
                "2020-06-22",
                "2020-06-23",
                "2020-06-24",
                "2020-06-25",
                "2020-06-26",
                "2020-06-27",
                "2020-06-28",
                "2020-06-29",
                "2020-06-30",
                "2020-07-01",
                "2020-07-02",
                "2020-07-03",
                "2020-07-04",
                "2020-07-05",
                "2020-07-06",
                "2020-07-07",
                "2020-07-08",
                "2020-07-09",
                "2020-07-10",
                "2020-07-11",
                "2020-07-12",
                "2020-07-13",
                "2020-07-14",
                "2020-07-15",
                "2020-07-16",
                "2020-07-17",
                "2020-07-18",
                "2020-07-19",
                ],
                colors: ["#206bc4"],
                legend: {
                    show: false,
                },
            }).render();
        });
        // @formatter:on
    </script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts &&
            new ApexCharts(document.getElementById("chart-new-clients"), {
                chart: {
                    type: "line",
                    fontFamily: "inherit",
                    height: 40.0,
                    sparkline: {
                        enabled: true,
                    },
                    animations: {
                        enabled: false,
                    },
                },
                fill: {
                    opacity: 1,
                },
                stroke: {
                    width: [2, 1],
                    dashArray: [0, 3],
                    lineCap: "round",
                    curve: "smooth",
                },
                series: [
                {
                    name: "May",
                    data: [
                    37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35,
                    41, 35, 27, 93, 53, 61, 27, 54, 43, 4, 46, 39, 62,
                    51, 35, 41, 67,
                    ],
                },
                {
                    name: "April",
                    data: [
                    93, 54, 51, 24, 35, 35, 31, 67, 19, 43, 28, 36, 62,
                    61, 27, 39, 35, 41, 27, 35, 51, 46, 62, 37, 44, 53,
                    41, 65, 39, 37,
                    ],
                },
                ],
                grid: {
                    strokeDashArray: 4,
                },
                xaxis: {
                    labels: {
                        padding: 0,
                    },
                    tooltip: {
                        enabled: false,
                    },
                    type: "datetime",
                },
                yaxis: {
                    labels: {
                        padding: 4,
                    },
                },
                labels: [
                "2020-06-20",
                "2020-06-21",
                "2020-06-22",
                "2020-06-23",
                "2020-06-24",
                "2020-06-25",
                "2020-06-26",
                "2020-06-27",
                "2020-06-28",
                "2020-06-29",
                "2020-06-30",
                "2020-07-01",
                "2020-07-02",
                "2020-07-03",
                "2020-07-04",
                "2020-07-05",
                "2020-07-06",
                "2020-07-07",
                "2020-07-08",
                "2020-07-09",
                "2020-07-10",
                "2020-07-11",
                "2020-07-12",
                "2020-07-13",
                "2020-07-14",
                "2020-07-15",
                "2020-07-16",
                "2020-07-17",
                "2020-07-18",
                "2020-07-19",
                ],
                colors: ["#206bc4", "#a8aeb7"],
                legend: {
                    show: false,
                },
            }).render();
        });
        // @formatter:on
    </script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts &&
            new ApexCharts(document.getElementById("chart-active-users"), {
                chart: {
                    type: "bar",
                    fontFamily: "inherit",
                    height: 40.0,
                    sparkline: {
                        enabled: true,
                    },
                    animations: {
                        enabled: false,
                    },
                },
                plotOptions: {
                    bar: {
                        columnWidth: "50%",
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: 1,
                },
                series: [
                {
                    name: "Profits",
                    data: [
                    37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35,
                    41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62,
                    51, 35, 41, 67,
                    ],
                },
                ],
                grid: {
                    strokeDashArray: 4,
                },
                xaxis: {
                    labels: {
                        padding: 0,
                    },
                    tooltip: {
                        enabled: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                    type: "datetime",
                },
                yaxis: {
                    labels: {
                        padding: 4,
                    },
                },
                labels: [
                "2020-06-20",
                "2020-06-21",
                "2020-06-22",
                "2020-06-23",
                "2020-06-24",
                "2020-06-25",
                "2020-06-26",
                "2020-06-27",
                "2020-06-28",
                "2020-06-29",
                "2020-06-30",
                "2020-07-01",
                "2020-07-02",
                "2020-07-03",
                "2020-07-04",
                "2020-07-05",
                "2020-07-06",
                "2020-07-07",
                "2020-07-08",
                "2020-07-09",
                "2020-07-10",
                "2020-07-11",
                "2020-07-12",
                "2020-07-13",
                "2020-07-14",
                "2020-07-15",
                "2020-07-16",
                "2020-07-17",
                "2020-07-18",
                "2020-07-19",
                ],
                colors: ["#206bc4"],
                legend: {
                    show: false,
                },
            }).render();
        });
        // @formatter:on
    </script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts &&
            new ApexCharts(document.getElementById("chart-mentions"), {
                chart: {
                    type: "bar",
                    fontFamily: "inherit",
                    height: 240,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: false,
                    },
                    animations: {
                        enabled: false,
                    },
                    stacked: true,
                },
                plotOptions: {
                    bar: {
                        columnWidth: "50%",
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: 1,
                },
                series: [
                {
                    name: "Web",
                    data: [
                    1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 2, 12, 5, 8, 22, 6, 8,
                    6, 4, 1, 8, 24, 29, 51, 40, 47, 23, 26, 50, 26, 41,
                    22, 46, 47, 81, 46, 6,
                    ],
                },
                {
                    name: "Social",
                    data: [
                    2, 5, 4, 3, 3, 1, 4, 7, 5, 1, 2, 5, 3, 2, 6, 7, 7, 1,
                    5, 5, 2, 12, 4, 6, 18, 3, 5, 2, 13, 15, 20, 47, 18,
                    15, 11, 10, 0,
                    ],
                },
                {
                    name: "Other",
                    data: [
                    2, 9, 1, 7, 8, 3, 6, 5, 5, 4, 6, 4, 1, 9, 3, 6, 7, 5,
                    2, 8, 4, 9, 1, 2, 6, 7, 5, 1, 8, 3, 2, 3, 4, 9, 7, 1,
                    6,
                    ],
                },
                ],
                grid: {
                    padding: {
                        top: -20,
                        right: 0,
                        left: -4,
                        bottom: -4,
                    },
                    strokeDashArray: 4,
                    xaxis: {
                        lines: {
                            show: true,
                        },
                    },
                },
                xaxis: {
                    labels: {
                        padding: 0,
                    },
                    tooltip: {
                        enabled: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                    type: "datetime",
                },
                yaxis: {
                    labels: {
                        padding: 4,
                    },
                },
                labels: [
                "2020-06-20",
                "2020-06-21",
                "2020-06-22",
                "2020-06-23",
                "2020-06-24",
                "2020-06-25",
                "2020-06-26",
                "2020-06-27",
                "2020-06-28",
                "2020-06-29",
                "2020-06-30",
                "2020-07-01",
                "2020-07-02",
                "2020-07-03",
                "2020-07-04",
                "2020-07-05",
                "2020-07-06",
                "2020-07-07",
                "2020-07-08",
                "2020-07-09",
                "2020-07-10",
                "2020-07-11",
                "2020-07-12",
                "2020-07-13",
                "2020-07-14",
                "2020-07-15",
                "2020-07-16",
                "2020-07-17",
                "2020-07-18",
                "2020-07-19",
                "2020-07-20",
                "2020-07-21",
                "2020-07-22",
                "2020-07-23",
                "2020-07-24",
                "2020-07-25",
                "2020-07-26",
                ],
                colors: ["#206bc4", "#79a6dc", "#bfe399"],
                legend: {
                    show: false,
                },
            }).render();
        });
        // @formatter:on
    </script>
    <script>
        // @formatter:on
        document.addEventListener("DOMContentLoaded", function () {
            const map = new jsVectorMap({
                selector: "#map-world",
                map: "world",
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: "#F8FAFC",
                        stroke: "rgba(98, 105, 118, .16)",
                        strokeWidth: 1,
                    },
                },
                zoomOnScroll: false,
                zoomButtons: false,
                // -------- Series --------
                visualizeData: {
                    scale: ["#F8FAFC", "#206bc4"],
                    values: {
                        AF: 16,
                        AL: 11,
                        DZ: 158,
                        AO: 85,
                        AG: 1,
                        AR: 351,
                        AM: 8,
                        AU: 1219,
                        AT: 366,
                        AZ: 52,
                        BS: 7,
                        BH: 21,
                        BD: 105,
                        BB: 3,
                        BY: 52,
                        BE: 461,
                        BZ: 1,
                        BJ: 6,
                        BT: 1,
                        BO: 19,
                        BA: 16,
                        BW: 12,
                        BR: 2023,
                        BN: 11,
                        BG: 44,
                        BF: 8,
                        BI: 1,
                        KH: 11,
                        CM: 21,
                        CA: 1563,
                        CV: 1,
                        CF: 2,
                        TD: 7,
                        CL: 199,
                        CN: 5745,
                        CO: 283,
                        KM: 0,
                        CD: 12,
                        CG: 11,
                        CR: 35,
                        CI: 22,
                        HR: 59,
                        CY: 22,
                        CZ: 195,
                        DK: 304,
                        DJ: 1,
                        DM: 0,
                        DO: 50,
                        EC: 61,
                        EG: 216,
                        SV: 21,
                        GQ: 14,
                        ER: 2,
                        EE: 19,
                        ET: 30,
                        FJ: 3,
                        FI: 231,
                        FR: 2555,
                        GA: 12,
                        GM: 1,
                        GE: 11,
                        DE: 3305,
                        GH: 18,
                        GR: 305,
                        GD: 0,
                        GT: 40,
                        GN: 4,
                        GW: 0,
                        GY: 2,
                        HT: 6,
                        HN: 15,
                        HK: 226,
                        HU: 132,
                        IS: 12,
                        IN: 1430,
                        ID: 695,
                        IR: 337,
                        IQ: 84,
                        IE: 204,
                        IL: 201,
                        IT: 2036,
                        JM: 13,
                        JP: 5390,
                        JO: 27,
                        KZ: 129,
                        KE: 32,
                        KI: 0,
                        KR: 986,
                        KW: 117,
                        KG: 4,
                        LA: 6,
                        LV: 23,
                        LB: 39,
                        LS: 1,
                        LR: 0,
                        LY: 77,
                        LT: 35,
                        LU: 52,
                        MK: 9,
                        MG: 8,
                        MW: 5,
                        MY: 218,
                        MV: 1,
                        ML: 9,
                        MT: 7,
                        MR: 3,
                        MU: 9,
                        MX: 1004,
                        MD: 5,
                        MN: 5,
                        ME: 3,
                        MA: 91,
                        MZ: 10,
                        MM: 35,
                        NA: 11,
                        NP: 15,
                        NL: 770,
                        NZ: 138,
                        NI: 6,
                        NE: 5,
                        NG: 206,
                        NO: 413,
                        OM: 53,
                        PK: 174,
                        PA: 27,
                        PG: 8,
                        PY: 17,
                        PE: 153,
                        PH: 189,
                        PL: 438,
                        PT: 223,
                        QA: 126,
                        RO: 158,
                        RU: 1476,
                        RW: 5,
                        WS: 0,
                        ST: 0,
                        SA: 434,
                        SN: 12,
                        RS: 38,
                        SC: 0,
                        SL: 1,
                        SG: 217,
                        SK: 86,
                        SI: 46,
                        SB: 0,
                        ZA: 354,
                        ES: 1374,
                        LK: 48,
                        KN: 0,
                        LC: 1,
                        VC: 0,
                        SD: 65,
                        SR: 3,
                        SZ: 3,
                        SE: 444,
                        CH: 522,
                        SY: 59,
                        TW: 426,
                        TJ: 5,
                        TZ: 22,
                        TH: 312,
                        TL: 0,
                        TG: 3,
                        TO: 0,
                        TT: 21,
                        TN: 43,
                        TR: 729,
                        TM: 0,
                        UG: 17,
                        UA: 136,
                        AE: 239,
                        GB: 2258,
                        US: 4624,
                        UY: 40,
                        UZ: 37,
                        VU: 0,
                        VE: 285,
                        VN: 101,
                        YE: 30,
                        ZM: 15,
                        ZW: 5,
                    },
                },
            });
            window.addEventListener("resize", () => {
                map.updateSize();
            });
        });
        // @formatter:off
    </script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts &&
            new ApexCharts(document.getElementById("sparkline-activity"), {
                chart: {
                    type: "radialBar",
                    fontFamily: "inherit",
                    height: 40,
                    width: 40,
                    animations: {
                        enabled: false,
                    },
                    sparkline: {
                        enabled: true,
                    },
                },
                tooltip: {
                    enabled: false,
                },
                plotOptions: {
                    radialBar: {
                        hollow: {
                            margin: 0,
                            size: "75%",
                        },
                        track: {
                            margin: 0,
                        },
                        dataLabels: {
                            show: false,
                        },
                    },
                },
                colors: ["#206bc4"],
                series: [35],
            }).render();
        });
        // @formatter:on
    </script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts &&
            new ApexCharts(
            document.getElementById("chart-development-activity"),
            {
                chart: {
                    type: "area",
                    fontFamily: "inherit",
                    height: 192,
                    sparkline: {
                        enabled: true,
                    },
                    animations: {
                        enabled: false,
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: 0.16,
                    type: "solid",
                },
                stroke: {
                    width: 2,
                    lineCap: "round",
                    curve: "smooth",
                },
                series: [
                {
                    name: "Purchases",
                    data: [
                    3, 5, 4, 6, 7, 5, 6, 8, 24, 7, 12, 5, 6, 3, 8, 4,
                    14, 30, 17, 19, 15, 14, 25, 32, 40, 55, 60, 48,
                    52, 70,
                    ],
                },
                ],
                grid: {
                    strokeDashArray: 4,
                },
                xaxis: {
                    labels: {
                        padding: 0,
                    },
                    tooltip: {
                        enabled: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                    type: "datetime",
                },
                yaxis: {
                    labels: {
                        padding: 4,
                    },
                },
                labels: [
                "2020-06-20",
                "2020-06-21",
                "2020-06-22",
                "2020-06-23",
                "2020-06-24",
                "2020-06-25",
                "2020-06-26",
                "2020-06-27",
                "2020-06-28",
                "2020-06-29",
                "2020-06-30",
                "2020-07-01",
                "2020-07-02",
                "2020-07-03",
                "2020-07-04",
                "2020-07-05",
                "2020-07-06",
                "2020-07-07",
                "2020-07-08",
                "2020-07-09",
                "2020-07-10",
                "2020-07-11",
                "2020-07-12",
                "2020-07-13",
                "2020-07-14",
                "2020-07-15",
                "2020-07-16",
                "2020-07-17",
                "2020-07-18",
                "2020-07-19",
                ],
                colors: ["#206bc4"],
                legend: {
                    show: false,
                },
                point: {
                    show: false,
                },
            }
            ).render();
        });
        // @formatter:on
    </script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts &&
            new ApexCharts(
            document.getElementById("sparkline-bounce-rate-1"),
            {
                chart: {
                    type: "line",
                    fontFamily: "inherit",
                    height: 24,
                    animations: {
                        enabled: false,
                    },
                    sparkline: {
                        enabled: true,
                    },
                },
                tooltip: {
                    enabled: false,
                },
                stroke: {
                    width: 2,
                    lineCap: "round",
                },
                series: [
                {
                    color: "#206bc4",
                    data: [17, 24, 20, 10, 5, 1, 4, 18, 13],
                },
                ],
            }
            ).render();
        });
        // @formatter:on
    </script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts &&
            new ApexCharts(
            document.getElementById("sparkline-bounce-rate-2"),
            {
                chart: {
                    type: "line",
                    fontFamily: "inherit",
                    height: 24,
                    animations: {
                        enabled: false,
                    },
                    sparkline: {
                        enabled: true,
                    },
                },
                tooltip: {
                    enabled: false,
                },
                stroke: {
                    width: 2,
                    lineCap: "round",
                },
                series: [
                {
                    color: "#206bc4",
                    data: [13, 11, 19, 22, 12, 7, 14, 3, 21],
                },
                ],
            }
            ).render();
        });
        // @formatter:on
    </script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts &&
            new ApexCharts(
            document.getElementById("sparkline-bounce-rate-3"),
            {
                chart: {
                    type: "line",
                    fontFamily: "inherit",
                    height: 24,
                    animations: {
                        enabled: false,
                    },
                    sparkline: {
                        enabled: true,
                    },
                },
                tooltip: {
                    enabled: false,
                },
                stroke: {
                    width: 2,
                    lineCap: "round",
                },
                series: [
                {
                    color: "#206bc4",
                    data: [10, 13, 10, 4, 17, 3, 23, 22, 19],
                },
                ],
            }
            ).render();
        });
        // @formatter:on
    </script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts &&
            new ApexCharts(
            document.getElementById("sparkline-bounce-rate-4"),
            {
                chart: {
                    type: "line",
                    fontFamily: "inherit",
                    height: 24,
                    animations: {
                        enabled: false,
                    },
                    sparkline: {
                        enabled: true,
                    },
                },
                tooltip: {
                    enabled: false,
                },
                stroke: {
                    width: 2,
                    lineCap: "round",
                },
                series: [
                {
                    color: "#206bc4",
                    data: [6, 15, 13, 13, 5, 7, 17, 20, 19],
                },
                ],
            }
            ).render();
        });
        // @formatter:on
    </script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts &&
            new ApexCharts(
            document.getElementById("sparkline-bounce-rate-5"),
            {
                chart: {
                    type: "line",
                    fontFamily: "inherit",
                    height: 24,
                    animations: {
                        enabled: false,
                    },
                    sparkline: {
                        enabled: true,
                    },
                },
                tooltip: {
                    enabled: false,
                },
                stroke: {
                    width: 2,
                    lineCap: "round",
                },
                series: [
                {
                    color: "#206bc4",
                    data: [2, 11, 15, 14, 21, 20, 8, 23, 18, 14],
                },
                ],
            }
            ).render();
        });
        // @formatter:on
    </script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            window.ApexCharts &&
            new ApexCharts(
            document.getElementById("sparkline-bounce-rate-6"),
            {
                chart: {
                    type: "line",
                    fontFamily: "inherit",
                    height: 24,
                    animations: {
                        enabled: false,
                    },
                    sparkline: {
                        enabled: true,
                    },
                },
                tooltip: {
                    enabled: false,
                },
                stroke: {
                    width: 2,
                    lineCap: "round",
                },
                series: [
                {
                    color: "#206bc4",
                    data: [22, 12, 7, 14, 3, 21, 8, 23, 18, 14],
                },
                ],
            }
            ).render();
        });
        // @formatter:on
    </script>

    {{-- CKEditor4 CDN Start --}}
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('deskripsi',options);
    </script>
    {{-- END --}}
    <!-- sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- SweetAlert Biasa --}}
    @include('sweetalert::alert')
    {{-- Bootstrap5 --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    @stack('script-external')
    @stack('script-internal')

    {{-- Datatables --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script>


    </script>
    {{-- UKM --}}
    <script>
        $('.ukm-nonaktif-confirm').on('click',function(event){
            event.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title:'UKM akan dinonaktifkan?',
                text: 'Seluruh data dari UKM yang dipilih akan terkunci dan tidak dapat dilihat oleh siapapun!',
                icon:'warning',
                showCancelButton:true,
                confirmButtonColor:'#F40000',
                cancelButtonColor:'#3085d6',
                cancelButtonText:'Batal',
                confirmButtonText:'Ya, Nonaktifkan!'
            }).then((result)=>{
                if(result.value){
                    window.location.href = url;

                }
            })
        });
    </script>
    <script>
        $('.ukm-aktif-confirm').on('click',function(event){
            event.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title:'UKM akan Aktifkan?',
                text: 'Seluruh data dari UKM yang dipilih terbuka kembali dan dapat dilihat',
                icon:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#F40000',
                cancelButtonText:'Batal',
                confirmButtonText:'Ya, Aktifkan!'
            }).then((result)=>{
                if(result.value){
                    window.location.href = url;

                }
            })
        });
    </script>
    {{-- Komentar --}}
    <script>
        $('.komentar-delete-confirm').on('click',function(event){
            event.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title:'Hapus komentar?',
                text: 'Komentar akan dihapus permanen',
                icon:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                cancelButtonText:'Batal',
                confirmButtonText:'Ya, Hapus!'
            }).then((result)=>{
                if(result.value){
                    window.location.href = url;

                }
            })
        });
    </script>
    {{-- Data Tables --}}
    <script>
        $(document).ready( function () {
            $('#myLaporan').DataTable({
                dom: 'lBfrtip',
                buttons: [
                'copy', 'excel', 'pdf', 'csv', 'print'
                ],
                "lengthMenu": [
                [ 10, 25, 50, 100, 1000, -1 ],
                [ '10 baris', '25 baris', '50 baris', '100 baris', '1000 baris', 'All' ]
                ],
                processing: true,
                serverSide: true,
                ajax: '{{ route('data-laporan') }}',
                columns: [
                { data: 'ukm', name: 'ukm' },
                { data: 'kegiatan.nama_kegiatan', name: 'kegiatan.nama_kegiatan' },
                { data: 'nama_laporan', name: 'nama_laporan' },
                { data: 'tgl_laporan', name: 'tgl_laporan' },
                { data: 'keterangan', name: 'keterangan' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'file', name: 'file' },
                { data: 'action', name: 'action' },
                ]
            });
        });
    </script>
    <script>
        $(document).ready( function () {
            $('#myLogbook').DataTable({
                dom: 'lBfrtip',
                buttons: [
                'copy', 'excel', 'pdf', 'csv', 'print'
                ],
                "lengthMenu": [
                [ 10, 25, 50, 100, 1000, -1 ],
                [ '10 baris', '25 baris', '50 baris', '100 baris', '1000 baris', 'All' ]
                ],
                processing: true,
                serverSide: true,
                ajax: '{{ route('data-logbook') }}',
                columns: [
                { data: 'ukm', name: 'ukm' },
                { data: 'kegiatan.nama_kegiatan', name: 'kegiatan.nama_kegiatan' },
                { data: 'uraian', name: 'uraian' },
                { data: 'tgl_logbook', name: 'tgl_logbook' },
                { data: 'hasil', name: 'hasil' },
                { data: 'kendala', name: 'kendala' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'progress', name: 'progress' },
                { data: 'action', name: 'action' },
                ]
            });
        });
    </script>
    <script>
        $(document).ready( function () {
            $('#myKegiatan').DataTable({
                dom: 'lBfrtip',
                buttons: [
                'copy', 'excel', 'pdf', 'csv', 'print'
                ],
                "lengthMenu": [
                [ 10, 25, 50, 100, 1000, -1 ],
                [ '10 baris', '25 baris', '50 baris', '100 baris', '1000 baris', 'All' ]
                ],
                processing: true,
                serverSide: true,
                ajax: '{{ route('data-kegiatan') }}',
                columns: [
                { data: 'ukm.nama_ukm', name: 'ukm.nama_ukm' },
                { data: 'nama_kegiatan', name: 'nama_kegiatan' },
                { data: 'deskripsi', name: 'deskripsi' },
                { data: 'tgl_kegiatan', name: 'tgl_kegiatan' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'file', name: 'file' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' },
                ]
            });
        });
    </script>
    {{-- Dashboard show Detail START --}}
    <script>
        $(document).ready( function () {
            $('#myDashboardKegiatan').DataTable();
        });
    </script>
    <script>
        $(document).ready( function () {
            $('#myDashboardProposal').DataTable();
        });
    </script>
    <script>
        $(document).ready( function () {
            $('#myDashboardLogbook').DataTable();
        });
    </script>
    <script>
        $(document).ready( function () {
            $('#myDashboardLaporan').DataTable();
        });
    </script>
    {{-- Dashboard show Detail END --}}
    <script>
        $(document).ready( function () {
            $('#myProposal').DataTable({
                dom: 'lBfrtip',
                buttons: [
                'copy', 'excel', 'pdf', 'csv', 'print'
                ],
                "lengthMenu": [
                [ 10, 25, 50, 100, 1000, -1 ],
                [ '10 baris', '25 baris', '50 baris', '100 baris', '1000 baris', 'All' ]
                ],
                processing: true,
                serverSide: true,
                ajax: '{{ route('data-proposal') }}',
                columns: [
                { data: 'ukm', name: 'ukm' },
                { data: 'nama_proposal', name: 'nama_proposal' },
                { data: 'kegiatan.nama_kegiatan', name: 'kegiatan.nama_kegiatan' },
                { data: 'keterangan', name: 'keterangan' },
                { data: 'tgl_proposal', name: 'tgl_proposal' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'file', name: 'file' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' },
                ]
            });
        });
    </script>

    <script>
        $(document).ready( function () {
            $('#myVerification').DataTable({
                "lengthMenu": [
                [ 10, 25, 50, 100, 1000, -1 ],
                [ '10 baris', '25 baris', '50 baris', '100 baris', '1000 baris', 'All' ]
                ],
                processing: true,
                serverSide: true,
                ajax: '{{ route('data-verification') }}',
                columns: [
                { data: 'user.id', name: 'user.id' },
                { data: 'user.name', name: 'user.name' },
                { data: 'user.email', name: 'user.email' },
                { data: 'user.role', name: 'user.role' },
                { data: 'login_at', name: 'login_at' },
                { data: 'login_successful', name: 'login_successful' },
                { data: 'logout_at', name: 'logout_at' },
                ]
            });
        });
    </script>
    {{-- END Data Tables --}}
    <script>
        // membuat agar file upload dalam trix tidak berjalan
        document.addEventListener('trix-file-accept',function(e){
            e.preventDefault();
        });
    </script>
    {{-- close alert otomatis --}}
    <script>
        $(document).ready(function() {
            // Buat fungsi closeAlert()
            function closeAlert() {
                // Buat timer dengan javascript
                setInterval(function(){ // fungsi ini akan dijalankan ketika timer selesai
                    $('.auto-close').slideUp(200); // buat animasi slideup dengan waktu 200 miliseconds = 0.2 detik
                }, 2000); // set timer menjadi 3000 miliseconds = 3 detik
            }
            closeAlert(); // panggil fungsi closeAlert() untuk menutup alert
        });
    </script>
</body>
</html>
