<script>
    jQuery(function ($) {
        //< !--fund_allocation chart  chart start here-- >
        $('#fund_allocation').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Total Fund Allocation',
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
                    name: 'Total Allocation',
                    y: 1245,
                    sliced: true,
                    selected: true,
                    color: "#ffea01"
                }, {
                    name: 'Released to Districts',
                    y: 1652,
                    color: "#2ea762"
                }]
            }]
        });

        //< !--Teachers  Schools chart  chart End here-- >
            //< !----------------districts chart  chart Start here-------------------->
        $('#districts_schools_count1').highcharts({
            chart: {
            type: 'column'
            },

            title: {
                text: 'Districts Wise Schools',
                align: 'left'
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
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Number of Schools',
                    align: 'left'
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
                name: 'Girls',
                data: [18, 91, 83, 27, 90, 30, 31, 82, 58, 45, 87, 124, 71, 86],
                    color: "#0a390a",
                stack: 'Students',
                color:"#E91E63"
            }, {
                name: 'Boys',
                data: [9, 52, 47, 24, 27, 35, 26, 41, 17, 22, 62, 62, 38, 75],
                stack: 'Students',
                color:"#3F51B5"
            }]
        });
        $('#districts_schools_count').highcharts({
            chart: {
            type: 'column'
            },

            title: {
                text: 'Districts Wise Schools',
                align: 'left'
            },

            xAxis: {
                categories: {!! json_encode($categories) !!}
            },

            yAxis: {

                title: {
                    text: 'Schools',
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
                name: 'Female',
                data: {!! json_encode($femaleSchools) !!},
                    color: "#0a390a",
                stack: 'Students',
                color:"#E91E63"
            }, {
                name: 'Male',
                data: {!! json_encode($maleSchools) !!},
                stack: 'Students',
                color:"#3F51B5"
            }]
        });

	    //< !----------------districts chart  chart Start here-------------------->
        $('#districts_students_count').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Districts Wise Enrollment',
                align: 'left'
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
                    text: 'Total Students'
                }
            },

            tooltip: {
                format: '<b>{key}</b><br/>{series.name}: {y}<br/>' +
                    'Total: {point.stackTotal}'
            },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Girls',
                    data: [526, 6914, 5352, 1825, 5454, 3106, 2112, 4268, 3213, 2492, 5143, 6830, 4785, 5082],
                    color:"#fca7c4"
                }, {
                    name: 'Boys',
                    data: [298, 6591, 3057, 1162, 1657, 2005, 1372, 2986, 991, 952, 3960, 3211, 2067, 4661],
                    color:"#a8b5ff"
                }]
        });

        //< !----------------districts chart  chart Start here-------------------->
        $('#districts_teachers_trained').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Districts Wise Teachers',
                align: 'left'
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
                headerFormat: '{point.key}<table><br>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:1f} </b></td></tr>',
                footerFormat: '</table>'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Total Teachers',
                data: [95, 691, 440, 201, 439, 236, 186, 433, 271, 239, 457, 592, 388, 550],
                color: "#0a390a"

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
        //< !----------------Enrollment Class chart Start here-------------------->
        $('#enrollment_class').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Districts Wise Fund Disbursement',
                align: 'left'
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
                headerFormat: '{point.key}<table><br>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} Total</b></td></tr>',
                footerFormat: '</table>'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Park Amount',
                data: [68, 535, 293, 122, 228, 164, 140, 180, 184, 154, 261, 325, 269, 279],
                color: "#ffea01"

            }, {
                name: 'Release Amount',
                data: [68, 535, 293, 122, 228, 164, 140, 180, 184, 154, 261, 325, 269, 279],
                color: "#2ea762"

            }]
        });

        //< !----------------Enrollment Class  chart Start here-------------------->
        /******************District Class Enrollment START******************* */
        $('#district_class_enrollment').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'District and Class Wise Enrollment',
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
    });
</script>
