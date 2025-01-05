<script>
    jQuery(function ($) {
        //Enrollment Schools chart  chart start here--
        $('#total_schools').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Total Schools',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Total',
                colorByPoint: true,
                data: [{
                    name: 'Male Afternoon Schools ',
                    y: 426,
                    sliced: true,
                    selected: true,
                    color: "#427ec6"
                }, {
                    name: 'Female Afternoon Schools ',
                    y: 575,
                    color: "#f33a86"
                }]
            }]
        });

        // < !--Enrollment Schools chart  chart End here-- >
        // Data retrieved from https://netmarketshare.com/
        // Make monochrome colors
        var pieColors = (function () {
            var colors = [],
                base = Highcharts.getOptions().colors[0],
                i;

            for (i = 0; i < 10; i += 1) {
                // Start out with a darkened base color (negative brighten), and end
                // up with a much brighter color
                colors.push(Highcharts.color(base).brighten((i - 3) / 7).get());
            }
            return colors;
        }());
        /*
    // Build the chart
     $('#total_schools1').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Total Schools',
            align: 'left'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                    distance: -50,
                    filter: {
                        property: 'percentage',
                        operator: '>',
                        value: 4
                    }
                }
            }
        },
        series: [{
            name: 'Total',
            colorByPoint: true,
            data: [{
                name: 'Male',
                y: 426,
                sliced: true,
                selected: true,
                color: "#427ec6"
            }, {
                name: 'Female',
                y: 575,
                color: "#f33a86"
            }]
        }]
    });*/
        // < !--Enrollment Schools chart  chart start here-- >
        $('#enrollment_chart').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Total Enrollment',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Total',
                colorByPoint: true,
                data: [{
                    name: 'Male Enrollment',
                    y: 22229,
                    sliced: true,
                    selected: true,
                    color: "#427ec6"
                }, {
                    name: 'Female Enrollment',
                    y: 32554,
                    color: "#f33a86"
                }, {
                    name: 'Other',
                    y: 6,
                    color: "#f33a86"
                }]
            }]
        });

        // < !--Enrollment Schools chart  chart End here-- >
        //< !--Teachers  Schools chart  chart start here-- >
        $('#Teachers_chart').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Total Teachers',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Total',
                colorByPoint: true,
                data: [{
                    name: 'Male Afternoon Teachers',
                    y: 1245,
                    sliced: true,
                    selected: true,
                    color: "#427ec6"
                }, {
                    name: 'Female Afternoon Teachers',
                    y: 1652,
                    color: "#f33a86"
                }]
            }]
        });
        //< !--Teachers  Schools chart  chart End here-- >
        //< !--trained_teachers chart  chart start here-- >
        $('#trained_teachers').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Total Trained Teachers',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Total',
                colorByPoint: true,
                data: [{
                    name: 'Male Trained Teachers',
                    y: 1245,
                    sliced: true,
                    selected: true,
                    color: "#427ec6"
                }, {
                    name: 'Female Trained Teachers',
                    y: 1652,
                    color: "#f33a86"
                }]
            }]
        });

        //< !--Teachers  Schools chart  chart End here-- >
        //< !----------------districts chart  chart Start here-------------------->
        $('#districts_schools_count').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Districts Wise Schools'
            },
            xAxis: {
                categories: [
                    'Chakwal',
                    'Faisalabad',
                    'Gujranwala',
                    'Gujrat',
                    'Khanewal',
                    'Lahore',
                    'Lahore',
                    'Multan',
                    'Narowal',
                    'Rawalpindi',
                    'Sahiwal',
                    'Sargodha',
                    'Sialkot',
                    'Sialkot'
                ],
                crosshair: true
            },
            yAxis: {
                /*min: 0,
                max: 10000,
                tickInterval: 150,*/
                title: {
                    text: 'Total'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} Total</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Schools',
                data: [23, 148, 84, 35, 74, 51, 43, 81, 54, 48, 84, 109, 80, 86],
                color: "#0a390a"

            }]
        });
        //< !----------------districts chart  chart Start here-------------------->
        //< !----------------districts chart  chart Start here-------------------->
        $('#districts_students_count').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Districts Wise Students Enrollment'
            },
            xAxis: {
                categories: [
                    'Chakwal',
                    'Faisalabad',
                    'Gujranwala',
                    'Gujrat',
                    'Khanewal',
                    'Lahore',
                    'Lahore',
                    'Multan',
                    'Narowal',
                    'Rawalpindi',
                    'Sahiwal',
                    'Sargodha',
                    'Sialkot',
                    'Sialkot'
                ],
                crosshair: true
            },
            yAxis: {
                /*min: 0,
                max: 10000,
                tickInterval: 150,*/
                title: {
                    text: 'Total'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} Total</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Enrollment',
                data: [734, 9688, 4896, 1928, 3887, 3504, 2398, 4235, 2695, 2210, 4376, 4988, 4642, 4608],
                color: "#d7425a"

            }]
        });
        //< !----------------districts chart  chart Start here-------------------->
        //< !----------------districts chart  chart Start here-------------------->
        $('#districts_teachers_trained').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Districts Wise Teachers and Trained'
            },
            xAxis: {
                categories: [
                    'Chakwal',
                    'Faisalabad',
                    'Gujranwala',
                    'Gujrat',
                    'Khanewal',
                    'Lahore',
                    'Lahore',
                    'Multan',
                    'Narowal',
                    'Rawalpindi',
                    'Sahiwal',
                    'Sargodha',
                    'Sialkot',
                    'Sialkot'
                ],
                crosshair: true
            },
            yAxis: {
                /*min: 0,
                max: 10000,
                tickInterval: 150,*/
                title: {
                    text: 'Total'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} Total</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Teachers',
                data: [68, 535, 293, 122, 228, 164, 140, 180, 184, 154, 261, 325, 269, 279],
                color: "#0a390a"

            }, {
                name: 'Trained',
                data: [68, 535, 293, 122, 228, 164, 140, 180, 184, 154, 261, 325, 269, 279],
                color: "#fcc100"

            }]
        });
        //< !----------------districts chart  chart Start here-------------------->
        //< !----------------No of Primary School Teachers Start-------------------->
        $('#no_PST').highcharts({
            chart: {
                type: 'bar'
            },

            title: {
                text: 'No of Primary School Teachers ',
                align: 'left'
            },

            xAxis: {
                categories: ['Gender']
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Number of Teachers'
                }
            },

            tooltip: {
                formatter: function () {
                    return '<b>' + this.x + '</b><br/>' +
                        this.series.name + ': ' + this.y + '<br/>' +
                        'Total: ' + this.point.stackTotal;
                }
            },

            plotOptions: {
                bar: {
                    stacking: 'normal'
                }
            },

            series: [{
                name: 'Male Teacher',
                data: [900],
                stack: 'Male',
                color: '#427ec575'
            }, {
                name: 'Male Teacher Trained',
                data: [900],
                stack: 'Male',
                color: '#427ec5bd'
            },{
                name: 'Female Teacher',
                data: [900],
                stack: 'Female',
                color: '#f33a8675'
            }, {
                name: 'Female Teacher Trained',
                data: [900],
                stack: 'Female',
                color: '#f33a86a3'
            }]
        });
        //< !----------------No of Primary School Teachers END-------------------->
        //< !----------------No of Primary School Teachers Start-------------------->
        $('#district_wise_enrolment_OOSC').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'District Wise Students Enrolment',
                align: 'left'
            },

            xAxis: {
                categories: ['Bahawalpur',
                    'D.G Khan',
                    'Mianwali',
                    'Muzaffargarh',
                    'Rahim Yar Khan'],
                title: {
                    text: 'District'
                }
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Enrollment'
                }
            },

            tooltip: {
                formatter: function () {
                    return '<b>' + this.x + '</b><br/>' +
                        this.series.name + ': ' + this.y + '<br/>' +
                        'Total: ' + this.point.stackTotal;
                }
            },

            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: [{
                name: 'Male',
                data: [900, 850, 800, 750, 850],
                stack: 'Male',
                color: '#427ec575'
            },{
                name: 'Female',
                data: [900, 850, 800, 750, 850],
                stack: 'Female',
                color: '#f33a86'
            }]

        });

        /******************FLN******************* */
        $('#learning_camps_established').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Year and district wise no. of learning camps established'
            },
            xAxis: {
                categories: [
                    '2021',
                    '2022',
                    '2023',
                    '2024',
                    '2025'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Enrollment Info'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} Total</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    allowPointSelect: true,
                    cursor: 'pointer'
                }
            },
            series: [{
                name: 'Bahawalpur',
                data: [
                    {
                        "name": "2021",
                        "y": 64
                    }],
                color: "#568203",
            }, {
                name: 'D.G Khan',
                data: [
                    {
                        "name": "2021",
                        "y": 24
                    }],
                color: "#32CD32",
            }, {
                name: 'Mianwali',
                data: [
                    {
                        "name": "2021",
                        "y": 74
                    }],
                color: "#8DB600",
            }, {
                name: 'Muzaffargarh',
                data: [
                    {
                        "name": "2021",
                        "y": 62
                    }],
                color: "#9EFD38",
            }, {
                name: 'Rahim Yar Khan',
                data: [
                    {
                        "name": "2021",
                        "y": 69
                    }],
                color: "#8F9779",
            }]
        });
        //< !----------------No of Primary School Teachers END-------------------->
        //< !----------------No of Teachers OOSC END Start-------------------->
        $('#teachers_OOSC').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'No of Teachers OOSC',
                align: 'left'
            },

            xAxis: {
                categories: ['Gender']
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Number of Teachers'
                }
            },

            tooltip: {
                formatter: function () {
                    return '<b>' + this.x + '</b><br/>' +
                        this.series.name + ': ' + this.y + '<br/>' +
                        'Total: ' + this.point.stackTotal;
                }
            },

            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: [{
                name: 'Male Teacher',
                data: [900],
                stack: 'Male',
                color: '#427ec575'
            }, {
                name: 'OOSC Training Male Teacher',
                data: [900],
                stack: 'Male',
                color: '#427ec5bd'
            },{
                name: 'Female Teacher',
                data: [900],
                stack: 'Female',
                color: '#f33a8675'
            }, {
                name: 'OOSC Training Female Teacher',
                data: [900],
                stack: 'Female',
                color: '#f33a86a3'
            }]
        });
        //< !----------------No of Teachers OOSC END-------------------->
        //< !----------------No of Teachers OOSC END Start-------------------->
        $('#AEO_OOSC').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'No of AEOs trained as Master Trainer For OOSC',
                align: 'left'
            },

            xAxis: {
                categories: ['Gender']
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Number of Teachers'
                }
            },

            tooltip: {
                formatter: function () {
                    return '<b>' + this.x + '</b><br/>' +
                        this.series.name + ': ' + this.y + '<br/>' +
                        'Total: ' + this.point.stackTotal;
                }
            },

            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: [{
                name: 'Male AEOs',
                data: [900],
                stack: 'Male',
                color: '#427ec575'
            }, {
                name: 'Trained Male AEOs',
                data: [900],
                stack: 'Male',
                color: '#427ec5bd'
            },{
                name: 'Female AEOs',
                data: [900],
                stack: 'Female',
                color: '#f33a8675'
            }, {
                name: 'Trained Female AEOs',
                data: [900],
                stack: 'Female',
                color: '#f33a86a3'
            }]
        });
        /*****************************************/
        $('#enrolment_LCs').highcharts({
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Camps Meeting Enrollment Target',
                align: 'left'
            },

            accessibility: {
                announceNewData: {
                    enabled: true
                },
                point: {
                    valueSuffix: '%'
                }
            },

            plotOptions: {
                series: {
                    borderRadius: 5,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: {point.y:.1f}%'
                    }
                },
                colors: ['blue', 'green', 'yellow']
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },

            series: [
                {
                    name: 'Number of Camps Meeting Target',
                    colorByPoint: true,
                    data: [
                        {
                            name: 'Male Students',
                            y: 61.04,
                            color: '#49dfb5'
                        },
                        {
                            name: 'Female Students',
                            y: 56.47,
                            color: '#7c94eb' // red
                        },
                        {
                            name: 'Other',
                            y: 9.47,
                            color: 'pink' // red
                        }
                    ]
                }
            ]
        });
        //< !----------------No of Teachers OOSC END-------------------->
        /*****************************FLN start graph*****************************/
        //< !----------------no_CPD_training Teachers Start-------------------->
        $('#no_CPD_training').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'No of Primary School Teachers completed CPD Training ',
                align: 'left'
            },

            xAxis: {
                categories: ['Gender']
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Number of Teachers'
                }
            },

            tooltip: {
                formatter: function () {
                    return '<b>' + this.x + '</b><br/>' +
                        this.series.name + ': ' + this.y + '<br/>' +
                        'Total: ' + this.point.stackTotal;
                }
            },

            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: [{
                name: 'Male Teacher',
                data: [900],
                stack: 'Male',
                color: '#427ec575'
            }, {
                name: 'CPD Training Completed',
                data: [900],
                stack: 'Male',
                color: '#427ec5bd'
            },{
                name: 'Female Teacher',
                data: [900],
                stack: 'Female',
                color: '#f33a8675'
            }, {
                name: 'CPD Training Completed',
                data: [900],
                stack: 'Female',
                color: '#f33a86a3'
            }]
        });
        //< !----------------no_CPD_training Teachers END-------------------->
        //< !----------------Module wise access rate Start-------------------->
        $('#no_accessed_module').highcharts({
            title: {
                text: 'Module wise access rate',
                align: 'left'
            },
            colors: [
                '#5d9649',
                '#5d9649',
                '#5d9649',
                '#5d9649',
                '#5d9649',
                '#5d9649'
            ],
            xAxis: {
                categories: ['Module1', 'Module2', 'Module3', 'Module4', 'Module5', 'Module6']
            },
            series: [{
                type: 'column',
                name: 'No. of teacher accessed the module',
                colorByPoint: true,
                data: [5412, 4977, 4730, 4437, 3947, 3707],
                showInLegend: true
            }]
        });
        //< !----------------Module wise access rate END-------------------->
        //< !----------------No of AEOs Start-------------------->
        $('#no_aeo').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'No of AEOs',
                align: 'left'
            },

            xAxis: {
                categories: ['Gender']
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Number of AEOs'
                }
            },

            tooltip: {
                formatter: function () {
                    return '<b>' + this.x + '</b><br/>' +
                        this.series.name + ': ' + this.y + '<br/>' +
                        'Total: ' + this.point.stackTotal;
                }
            },

            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: [{
                name: 'Male AEOs',
                data: [900],
                stack: 'Male',
                color: '#427ec575'
            }, {
                name: 'Train AEOs',
                data: [900],
                stack: 'Male',
                color: '#427ec5bd'
            },{
                name: 'Female AEOs',
                data: [900],
                stack: 'Female',
                color: '#f33a8675'
            }, {
                name: 'Train AEOs',
                data: [900],
                stack: 'Female',
                color: '#f33a86a3'
            }]
        });
        //< !----------------No of AEOs END-------------------->
        /************************************* */
        //< !---------------- District wise tablet distribution here START-------------------->
        $('#Tablet_Distribution').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'District wise tablet distribution'
            },
            xAxis: {
                categories: ["Attock","Bahawalnagar","Bahawalpur","Bhakkar","Chakwal","Chiniot","Dera Ghazi Khan","Faisalabad","Gujranwala","Gujrat","Hafizabad","Jhang","Jhelum","Kasur","Khanewal","Khushab","Kot Adu","Lahore","Layyah","Lodhran","Mandi Bahauddin","Mianwali","Multan","Murree","Muzaffargarh","Narowal","Nankana Sahib","Okara","Pakpattan","Rahim Yar Khan","Rajanpur","Rawalpindi","Sahiwal","Sargodha","Sheikhupura","Sialkot","Talagang","Taunsa","Toba Tek Singh","Vehari","Wazirabad"],
                crosshair: true
            },
            yAxis: {
                /*min: 0,
                max: 10000,
                tickInterval: 150,*/
                title: {
                    text: 'Total'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} Total</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'District Wise Tablet Distribution',
                data: [65, 59, 80, 81, 56, 55, 40,65, 59, 80, 81, 56, 55, 40,65, 59, 80, 81, 56, 55, 40,65, 59, 80, 81, 56, 55, 40,65, 59, 80, 81, 56, 55, 40,65, 59,50,55,55,33],
                color: "#147049"

            }]
        });
        //< !----------------District wise tablet distribution END-------------------->
        //< !----------------Enrollment Class chart Start here-------------------->
        $('#enrollment_class').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Yearly Disbursement VS Allocation'
            },
            xAxis: {
                categories: [
                    '2021',
                    '2022',
                    '2023',
                    '2024',
                    '2025'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Enrollment Info'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} Total</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    allowPointSelect: true,
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function () {
                                //  alert(this.options.url);
                                location.href = this.options.url;
                                //  location.href = 'https://bing.com/search?q=chrome';
                            }
                        }
                    }
                }
            },
            series: [{
                name: 'Disbursement',
                data: [
                    {
                        "name": "2021",
                        "y": 62.74,
                        "url": 'https://bing.com/search?q=chrome'
                    },
                    {
                        "name": "2022",
                        "y": 10.57,
                        "url": 'https://bing.com/search?q=firefox'
                    },
                    {
                        "name": "2023",
                        "y": 7.23,
                        "url": 'https://bing.com/search?q=IE'
                    },
                    {
                        "name": "2024",
                        "y": 7.23,
                        "url": 'https://bing.com/search?q=IE'
                    },
                    {
                        "name": "2025",
                        "y": 7.23,
                        "url": 'https://bing.com/search?q=IE'
                    }],
                color: "#ffea01",
            }, {
                name: 'Allocation',
                data: [
                    {
                        "name": "2021",
                        "y": 62.74,
                        "url": 'https://bing.com/search?q=chrome'
                    },
                    {
                        "name": "2022",
                        "y": 10.57,
                        "url": 'https://bing.com/search?q=firefox'
                    },
                    {
                        "name": "2023",
                        "y": 7.23,
                        "url": 'https://bing.com/search?q=IE'
                    },
                    {
                        "name": "2024",
                        "y": 7.23,
                        "url": 'https://bing.com/search?q=IE'
                    },
                    {
                        "name": "2025",
                        "y": 7.23,
                        "url": 'https://bing.com/search?q=IE'
                    }],
                color: "#2ea762",
            }]

        });

        //< !----------------Enrollment Class  chart Start here-------------------->
        //< !----------------Enrollment Class chart Start here-------------------->
        $('#target_districts').highcharts({
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Districts Target'
            },
            xAxis: {
                categories: [
                    'Schools',
                    'Enrollment',
                    'Teachers',
                    'Trained'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Enrollment Info'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} Total</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    allowPointSelect: true,
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function () {
                                //  alert(this.options.url);
                                location.href = this.options.url;
                                //  location.href = 'https://bing.com/search?q=chrome';
                            }
                        }
                    }
                }
            },
            series: [{
                name: 'Boys',
                data: [
                    {
                        "name": "Schools",
                        "y": 62.74,
                        "url": '#'
                    },
                    {
                        "name": "Enrollment",
                        "y": 10.57,
                        "url": '#'
                    },
                    {
                        "name": "Teachers",
                        "y": 7.23,
                        "url": '#'
                    },
                    {
                        "name": "Trained",
                        "y": 7.23,
                        "url": '#'
                    }],
                color: "#427ec6",
            }, {
                name: 'Girls',
                data: [83.6, 78.8, 98.5],
                data: [
                    {
                        "name": "Schools",
                        "y": 62.74,
                        "url": '#'
                    },
                    {
                        "name": "Enrollment",
                        "y": 10.57,
                        "url": '#'
                    },
                    {
                        "name": "Teachers",
                        "y": 7.23,
                        "url": '#'
                    },
                    {
                        "name": "Trained",
                        "y": 7.23,
                        "url": '#'
                    }
                ],
                color: "#f33a86",
            }]

        });
        /******************District Class Enrollment START******************* */
        $('#district_class_enrollment').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'District and Class Gender Wise ASP Schools Enrollment',
                align: 'left'
            },

            xAxis: {
                categories: ['Chakwal',
                    'Faisalabad',
                    'Gujranwala',
                    'Gujrat',
                    'Khanewal',
                    'Lahore',
                    'Lahore',
                    'Multan',
                    'Narowal',
                    'Rawalpindi',
                    'Sahiwal',
                    'Sargodha',
                    'Sialkot',
                    'Sialkot']
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Total Students'
                }
            },

            tooltip: {
                formatter: function () {
                    return '<b>' + this.x + '</b><br/>' +
                        this.series.name + ': ' + this.y + '<br/>' +
                        'Total: ' + this.point.stackTotal;
                }
            },

            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: [{
                name: 'Class6 Male',
                data: [900, 850, 800, 750, 700, 650, 500, 450, 400, 350, 300, 250, 200, 150],
                stack: 'Male',
                color: '#427ec575'
            }, {
                name: 'Class7 Male',
                data: [900, 850, 800, 750, 700, 650, 500, 450, 400, 350, 300, 250, 200, 150],
                stack: 'Male',
                color: '#427ec5bd'
            }, {
                name: 'Class8 Male',
                data: [900, 850, 800, 750, 700, 650, 500, 450, 400, 350, 300, 250, 200, 150],
                stack: 'Male',
                color: '#427ec5'
            }, {
                name: 'Class6 Female',
                data: [900, 850, 800, 750, 700, 650, 500, 450, 400, 350, 300, 250, 200, 150],
                stack: 'Female',
                color: '#f33a8675'
            }, {
                name: 'Class7 Female',
                data: [900, 850, 800, 750, 700, 650, 500, 450, 400, 350, 300, 250, 200, 150],
                stack: 'Female',
                color: '#f33a86a3'
            }, {
                name: 'Class8 Female',
                data: [900, 850, 800, 750, 700, 650, 500, 450, 400, 350, 300, 250, 200, 150],
                stack: 'Female',
                color: '#f33a86'
            }]

        });
        /******************District Class Enrollment END******************* */
        //< !----------------districts chart  chart Start here-------------------->
        $('#district_gender_schools').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },
            title: {
                text: 'School by Gender',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        distance: -50,
                        style: {
                            fontWeight: 'bold',
                            color: 'white'
                        }
                    },
                    startAngle: -90,
                    endAngle: 90,
                    center: ['50%', '75%'],
                    size: '110%'
                }
            },
            series: [{
                type: 'pie',
                name: 'School By Gender',
                innerSize: '50%',
                showInLegend: true,
                data: [
                    ['Male', 22727],
                    ['Female', 25513]
                ]
            }]
        });
        //< !----------------districts chart  chart Start here-------------------->
        /******************District and Gender Wise Schools START******************* */
        // Data retrieved from https://netmarketshare.com
        $('#district_level_schools').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Schools by level',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y}'
                    }
                }
            },
            series: [{
                name: 'Schools',
                colorByPoint: true,
                showInLegend: true,
                data: [{
                    name: 'sMosque',
                    y: 107,
                    sliced: true,
                    selected: true
                }, {
                    name: 'H.Sec',
                    y: 776
                },  {
                    name: 'High',
                    y: 8023
                }, {
                    name: 'Middle',
                    y: 7177
                }, {
                    name: 'Primary',
                    y: 32157
                }]
            }]
        });
        /******************District and Gender Wise Schools END******************* */
        //< !----------------Schools Area chart Start here-------------------->
        $('#Schools_Area').highcharts({
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'School By Area',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            series: [{
                name: 'Area',
                showInLegend: true,
                data: [
                    {
                        name: 'Rural Area Schools',
                        y: 42595,
                        color: '#fec656'
                    },
                    {
                        name: 'Urban  Area Schools',
                        y: 5645,
                        color: '#60c3ab'
                    }

                ]
            }]
        });
        //< !----------------Specialization Wise Enrollment in Higher Secondary here-------------------->
        $('#SWHS').highcharts({
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'Specialization Wise Enrollment in Higher Secondary',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45,
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y}'
                    }
                }
            },
            series: [{
                name: 'Schools',
                colorByPoint: true,
                showInLegend: true,
                data: [{
                    name: 'Arts',
                    y: 60575,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Pre-Madical',
                    y: 17631
                },  {
                    name: 'ICS',
                    y: 16365
                }, {
                    name: 'Pre-Engineering',
                    y: 7083
                }, {
                    name: 'I.Com',
                    y: 2885
                },  {
                    name: 'Others',
                    y: 1616
                }]
            }]
        });
        //< !----------------Specialization Wise Enrollment in Higher Secondary here-------------------->
        //< !----------------Enrollment by Gender and Area here-------------------->
        $('#EGA').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Enrollment by Gender and Area',
                align: 'left'
            },
            xAxis: {
                categories: [
                    'Rural',
                    'Urban'
                ],
                crosshair: true
            },
            yAxis: {
                /*min: 0,
                max: 10000,
                tickInterval: 150,*/
                title: {
                    text: 'Total'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} Total</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Boys',
                data: [4556116,138819],
                color: "#0a390a"

            }, {
                name: 'Girls',
                data: [4308880, 1617104],
                color: "#fcc100"

            }]
        });
        //< !----------------Enrollment by Gender and Area Start here-------------------->
        //<!--Enrollment by Gender and Shift-->
        $('#EGS1').highcharts({
            chart: {
                type: 'pie',
            },
            title: {
                text: 'Morning Shift',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}<br> <b>{point.percentage:.1f}%</b>'
                    }
                }
            },
            series: [{
                name: 'Morning',
                colorByPoint: true,
                showInLegend: true,
                data: [{
                    name: 'Boys',
                    y: 5128926,
                    color:'rgb(44, 175, 254)'
                }, {
                    name: 'Girls',
                    y: 5084315,
                    color:'#f766ae'
                }]
            }]
        });
        //<!--Enrollment by Gender and Shift-->
        //<!--Enrollment by Gender and Shift-->
        $('#EGS2').highcharts({
            chart: {
                type: 'pie',
            },
            title: {
                text: 'Double Shift',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}<br> <b>{point.percentage:.1f}%</b>'
                    }
                }
            },
            series: [{
                name: 'Double Shift',
                colorByPoint: true,
                showInLegend: true,
                data: [{
                    name: 'Boys',
                    y: 812408,
                    color:'rgb(44, 175, 254)'
                }, {
                    name: 'Girls',
                    y: 837439,
                    color:'#f766ae'
                }]
            }]
        });
        //<!--Enrollment by Gender and Shift-->
        //<!--Enrollment by Gender and Shift-->
        $('#EGS3').highcharts({
            chart: {
                type: 'pie',

            },
            title: {
                text: 'Evening Shift',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}<br> <b>{point.percentage:.1f}%</b>'
                    }
                }
            },
            series: [{
                name: 'Evening',
                colorByPoint: true,
                showInLegend: true,
                data: [{
                    name: 'Boys',
                    y: 3601,
                    color:'rgb(44, 175, 254)'
                }, {
                    name: 'Girls',
                    y: 4230,
                    color:'#f766ae'
                }]
            }]
        });
        //<!--Enrollment by Gender and Shift-->
        //<!--Enrollment by Gender and Medium-->
        $('#EGM').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'Enrollment by Gender and Medium',
                align: 'left'
            },

            xAxis: {
                categories: ['Urdu', 'English', 'Both']
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Gender'
                }
            },

            tooltip: {
                format: '<b>{key}</b><br/>{series.name}: {y}<br/>' +
                    'Total: {point.stackTotal}'
            },

            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: [{
                name: 'Boys',
                data: [3504889, 763679, 1676367],
                color: '#2caefd'
            }, {
                name: 'Girls',
                data: [3276493, 806593, 1842898],
                color: '#f766ae'
            }]
        });
        //<!--Enrollment by Gender and Medium-->
        //< !----------------School Ownership chart Start here-------------------->
        $('#School_Ownership').highcharts({
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'School Ownership',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45,
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y}'
                    }
                }
            },
            series: [{
                name: 'Schools',
                colorByPoint: true,
                showInLegend: true,
                data: [{
                    name: 'SED',
                    y: 45605,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Local Residents',
                    y: 998
                },  {
                    name: 'Municipal Building',
                    y: 564
                }, {
                    name: 'On Rent',
                    y: 179
                }, {
                    name: 'Other Govt Institution',
                    y: 149
                },  {
                    name: 'Other Govt Schools',
                    y: 157
                }, {
                    name: 'School Council Provided Building',
                    y: 118
                }, {
                    name: 'Waqf Property',
                    y: 113
                }, {
                    name: 'Madrassa / Masjid',
                    y: 124
                }]
            }]
        });
        //< !----------------School_Construction_Type chart Start here-------------------->
        $('#School_Construction_Type').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'School Construction Type',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y}'
                    }
                }
            },
            series: [{
                name: 'School Construction Type',
                colorByPoint: true,
                showInLegend: true,
                data: [{
                    name: 'Completely',
                    y: 42199,
                    sliced: true,
                    selected: true,
                    color: '#f16d6e'
                }, {
                    name: 'Partial Solid / Partial Rough',
                    y: 5263,
                    color: '#fec656'
                },  {
                    name: 'completely Rough',
                    y: 403,
                    color: '#60c3ab'
                }]
            }]
        });
        //< !----------------School_Buliding_Safety chart Start here-------------------->
        $('#School_Buliding_Safety').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'School Building Safety',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y}'
                    }
                }
            },
            series: [{
                name: 'School Construction Type',
                colorByPoint: true,
                showInLegend: true,
                data: [{
                    name: 'Satisfactory',
                    y: 37899,
                    sliced: true,
                    selected: true,
                    color: '#0B6623'
                }, {
                    name: 'Need Minor Repairing',
                    y: 5263,
                    color: '#fec656'
                }, {
                    name: 'Partially Dangerous',
                    y: 2305,
                    color: '#f16d6e'
                }, {
                    name: 'Complete Repairing',
                    y: 1726,
                    color: '#ff5722'
                }, {
                    name: 'Critically Dangerous',
                    y: 540,
                    color: '#8B0000'
                }]
            }]
        });
        //< !----------------district mdeium schools Start here-------------------->
        /******************students_by_level START******************* */
        // Data retrieved from https://netmarketshare.com
        $('#students_by_level').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Students by level',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y}'
                    }
                }
            },
            series: [{
                name: 'Students',
                colorByPoint: true,
                showInLegend: true,
                data: [{
                    name: 'Primary',
                    y: 7367794,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Elementary',
                    y: 2818486
                },  {
                    name: 'Secondary',
                    y: 1556150
                }, {
                    name: 'H.Secondary',
                    y: 128489
                }]
            }]
        });
        /******************students_by_level END******************* */
        // Custom template helper
        Highcharts.Templating.helpers.abs = value => Math.abs(value);

        // Age categories
        const categories = [
            'ECE', 'Kachi', 'Class-1', 'Class-2', 'Class-3', 'Class-4', 'Class-5', 'Class-6',
            'Class-7', 'Class-8', 'Class-9', 'Class-10', 'Class-11', 'Class-12'];
        //< !----------------districts chart  chart Start here-------------------->
        $('#students_by_gender').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Gender wise Number of Students',
                align: 'left'
            },
            accessibility: {
                point: {
                    valueDescriptionFormat: '{index}. Age {xDescription}, {value} Number.'
                }
            },
            xAxis: [{
                categories: categories,
                reversed: false,
                labels: {
                    step: 1
                },
                accessibility: {
                    description: 'Class (male)'
                }
            }, { // mirror axis on right side
                opposite: true,
                reversed: false,
                categories: categories,
                linkedTo: 0,
                labels: {
                    step: 1
                },
                accessibility: {
                    description: 'Class (female)'
                }
            }],
            yAxis: {
                title: {
                    text: null
                },
                labels: {
                    format: '{abs value}'
                },
                accessibility: {
                    description: 'Percentage Students',
                    rangeDescription: 'Range: 0 to 5%'
                }
            },

            plotOptions: {
                series: {
                    stacking: 'normal',
                    borderRadius: '50%'
                }
            },

            tooltip: {
                format: '<b>{series.name}, Class {point.category}</b><br/>' +
                    'Students: {(abs point.y):.1f} Number'
            },

            series: [{
                name: 'Male',
                color: '#2caffe',
                data: [-95411, -657334, -517644, -587781, -577922, -628770, -591046, -510501, -472399, -453320, -406265,-360954, -34133, -38504]
            }, {
                name: 'Female',
                color: '#f16d6e',
                data: [95189, 683868, 548049, 613246, 582824,624737, 569973, 480839, 461014, 440413, 410984, 377947, 26631, 29221]
            }]
        });
        //< !----------------districts chart  chart Start here-------------------->
        /************************************** */
        let chart = Highcharts.chart('year_enrollment', {
            title: {
                text: 'Yearly Enrollment Trends And Forecasting',
                align: 'left'
            },



            yAxis: {
                title: {
                    text: 'Number of Enrollment'
                }
            },

            xAxis: {
                accessibility: {
                    rangeDescription: 'Range: 2021 to 2025'
                }
            },

            chart: {
                marginBottom: 100
            },
            legend: {
                align: 'center',
                verticalAlign: 'bottom',
                layout: 'horizontal',
                x: 0,
                y: 0
            },
            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 2020
                }
            },

            series: [{
                name: 'Actual Enrollment',
                data: [43934, 48656, 65165, 81827, 112143],
                color: '#0a390a',
            }, {
                name: 'Forecasted Enrollment',
                data: [24916, 37941, 29742, 29851, 32490],
                color: 'orange',
            }, {
                name: 'Target Enrollment',
                data: [30240, 30240, 36590 , 40249,45567],
                color: 'red',
            }],
        });


        //< !----------------Target Districts all school INFO here-------------------->
        $('#target_districts_total_school').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },
            title: {
                text: 'Target Districts Total School',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: 'white'
                        }
                    },
                    startAngle: -180,
                    endAngle: 180,
                    center: ['50%', '50%'],
                    size: '110%'
                }
            },
            series: [{
                type: 'pie',
                name: 'Schools',
                innerSize: '50%',
                data: [
                    {
                        name: 'Boys',
                        y: 63.06,
                        color:'#427ec5'
                    },
                    {
                        name: 'Girls',
                        y: 19.84,
                        color: '#f33a86'
                    },
                    {
                        name: 'Other',
                        y: 4.18,
                        color: '#fcc100'
                    }]
            }]
        });
        //< !----------------Target Districts all Schools INFO here-------------------->
        //< !----------------Target Districts all Enrollement INFO here-------------------->
        $('#target_districts_total_enrollement').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },
            title: {
                text: 'Target Districts Total Enrollement',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: 'white'
                        }
                    },
                    startAngle: -180,
                    endAngle: 180,
                    center: ['50%', '50%'],
                    size: '110%'
                }
            },
            series: [{
                type: 'pie',
                name: 'Schools',
                innerSize: '50%',
                data: [
                    {
                        name: 'Boys',
                        y: 63.06,
                        color: '#427ec5'
                    },
                    {
                        name: 'Girls',
                        y: 19.84,
                        color: '#f33a86'
                    },
                    {
                        name: 'Other',
                        y: 4.18,
                        color: '#fcc100'
                    }]
            }]
        });
        //< !----------------Target Districts all INFO here-------------------->

        //< !----------------Target Districts all Teachers INFO here-------------------->
        $('#target_districts_total_teachers').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },
            title: {
                text: 'Target Districts Total Teachers',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: 'white'
                        }
                    },
                    startAngle: -180,
                    endAngle: 180,
                    center: ['50%', '50%'],
                    size: '110%'
                }
            },
            series: [{
                type: 'pie',
                name: 'Schools',
                innerSize: '50%',
                data: [
                    {
                        name: 'Male',
                        y: 63.06,
                        color: '#427ec5'
                    },
                    {
                        name: 'Female',
                        y: 19.84,
                        color: '#f33a86'
                    },
                    {
                        name: 'Other',
                        y: 4.18,
                        color: '#fcc100'
                    }]
            }]

        });
        //< !----------------Target Districts all INFO here-------------------->


        /******************-Target District wise Enrollment forecasting******************* */
        let chart1 = Highcharts.chart('year_district_enrollment', {
            title: {
                text: 'Yearly-wise District Enrollment Trends and Forecasting',
                align: 'left'
            },



            yAxis: {
                title: {
                    text: 'Number of Enrollment'
                }
            },

            xAxis: {
                accessibility: {
                    rangeDescription: 'Range: 2021 to 2025'
                }
            },
            chart: {
                marginBottom: 100
            },
            legend: {
                align: 'center',
                verticalAlign: 'bottom',
                layout: 'horizontal',
                x: 0,
                y: 0
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 2020
                }
            },

            series: [{
                name: 'Actual Enrollment',
                data: [43934, 48656, 65165, 81827, 112143],
                color: '#0a390a',
            }, {
                name: 'Forecasted Enrollment',
                data: [24916, 37941, 29742, 29851, 32490],
                color: 'orange',
            }, {
                name: 'Target Enrollment',
                data: [30240, 30240, 36590 , 40249,45567],
                color: 'red',
            }],

        });
        /************************************* */

    });

    //< !--This is for the main function-- >






</script>
