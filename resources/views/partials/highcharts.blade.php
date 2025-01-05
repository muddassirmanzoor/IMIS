<script>
    jQuery(function ($) {
        //< !----------------FLN-------------------->
        $('#age_wise_distribution').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Age Wise Distribution',
                align: 'left'
            },
            xAxis: {
                categories: ['5 Years','6 Years','7 Years','8 Years','9 Years','10 Years','11 Years','12 Years'],
                title: {
                    text: 'Distribution'
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
                        this.series.name + ': ' + this.y + '<br/>'
                }
            },


            series: [{
                name: 'Already Enrolled',
                data: [900, 850, 800, 750, 850],
                color: '#rgb(76, 175, 80)'
            },{
                name: 'OOSC',
                data: [900, 850, 800, 750, 850],
                color: 'rgb(255, 218, 32)'
            }]

        });
        //< !----------------FLN-------------------->
        $('#support_tickets').highcharts({
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Support Tickets',
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
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },

            series: [
                {
                    name: 'Tickets',
                    colorByPoint: true,
                    data: [
                        {
                            name: 'Resolved',
                            y: 61.04,
                            color: '#81e485'
                        },
                        {
                            name: 'Pending',
                            y: 9.47,
                            color: '#f9b0b0'
                        }
                    ]
                }
            ]
        });
        //< !----------------FLN-------------------->
        $('#functional_nonfunctional').highcharts({
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Functional And Non Functional Camps',
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
                            name: 'Functional And ',
                            y: 99,
                            color: '#49dfb5'
                        },
                        {
                            name: 'Non Functional Camps',
                            y: 1,
                            color: '#7c94eb' // red
                        }
                    ]
                }
            ]
        });
        /******************FLN******************* */
        $('#enrollment_range_graph').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'Enrollment Range Wise Camps',
                align: 'left'
            },

            xAxis: {
                categories: ['0-10',
                    '11-20',
                    '21-30',
                    '31-40',
                    '41-50',
                    '51 And Above']
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
                        this.series.name + ': ' + this.y + '<br/>'
                }
            },

            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: [{
                name: 'Range Wise Enrollment',
                data: [7, 16, 163, 937, 866,62],
                stack: 'Range Wise Enrollment',
                color: '#427ec575'
            }]

        });
        /**************************************************/
        $('#district_wise_enrolment_OOSC').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'Gender Wise Enrollment',
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
        /******************************************/

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
        $('#Assessment_Stats').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'Assessment_Stats',
                align: 'left'
            },

            xAxis: {
                categories: ['Baseline','Endline'],
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
                        this.series.name + ': ' + this.y + '<br/>'
                }
            },


            series: [{
                name: 'Submitted',
                data: [900, 850],
                color: '#rgb(76, 175, 80)'
            },{
                name: 'Remaining',
                data: [900, 850],
                color: 'rgb(255, 218, 32)'
            }]

        });
        /*****************************************/
        $('#Assessment_Enrolled').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'Assessment Enrolled',
                align: 'left'
            },

            xAxis: {
                categories: ['English','Urdu','Math'],
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
                        this.series.name + ': ' + this.y + '<br/>'
                }
            },


            series: [{
                name: 'Submitted',
                data: [900, 850,300],
                color: '#rgb(76, 175, 80)'
            },{
                name: 'Remaining',
                data: [900, 850,300],
                color: 'rgb(255, 218, 32)'
            }]

        });
        /*****************************************/
        $('#Assessment_OOSC').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'Assessment OOSC',
                align: 'left'
            },

            xAxis: {
                categories: ['English','Urdu','Math'],
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
                        this.series.name + ': ' + this.y + '<br/>'
                }
            },


            series: [{
                name: 'Submitted',
                data: [900, 850,300],
                color: '#rgb(76, 175, 80)'
            },{
                name: 'Remaining',
                data: [900, 850,300],
                color: 'rgb(255, 218, 32)'
            }]
        });
        /******************FLN******************* */
        $('#district_attendance').highcharts({
            title: {
                text: 'Daily Attendance',
                align: 'left'
            },
            yAxis: {
                title: {
                    text: 'Number of Enrollment'
                }
            },

            xAxis: {
                categories: ['01-jun', '02-jun', '03-jun','04-jun', '05-jun', '06-jun','07-jun', '08-jun', '09-jun','10-jun', '11-jun', '12-jun']
            },

            series: [{
                name: 'Total Enrollment',
                data: [1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000, 1000],
                color: '#eebf38'
            }, {
                name: 'Present',
                data: [900.0, 935.6, 948.5, 871.5, 606.4, 1000, 806.4, 971.5, 806.4, 1000, 806.4],
                color: '#427ec5'
            }]
        });
        /************************************* */
    });

    //< !--This is for the main function-- >

</script>
