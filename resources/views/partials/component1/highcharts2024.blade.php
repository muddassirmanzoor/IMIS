<script>
    var fln = @json($data['graph_data']);

    jQuery(function ($) {
        //< !----------------FLN-------------------->
        $('#age_wise_distribution').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Age Wise Distribution',
                align: 'left',
				style: {
					display: 'none'
				}
            },
            xAxis: {
                categories: fln.ages,
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
                data: fln.age_wise_enrolled,
                color: '#65c869'
            },{
                name: 'OOSC',
                data: fln.age_wise_oosc,
                color: '#ffda20'
            }]

        });
        //< !----------------FLN-------------------->
        // $('#learning_camps_established').highcharts({
        //     chart: {
        //         type: 'column'
        //     },
        //     title: {
        //         text: 'District Wise Camps',
        //         align: 'left'
        //     },
        //     xAxis: {
        //         categories: [
        //             '2021',
        //             '2022',
        //             '2023',
        //             '2024',
        //             '2025'
        //         ],
        //         crosshair: true,
        //         labels: {
        //             enabled: false
        //         }
        //     },
        //     yAxis: {
        //         min: 0,
        //         title: {
        //             text: 'No.of Camps'
        //         }
        //     },
        //     tooltip: {
        //         headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        //         pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        //             '<td style="padding:0"><b>{point.y:.1f} Total</b></td></tr>',
        //         footerFormat: '</table>',
        //         shared: true,
        //         useHTML: true
        //     },
        //     plotOptions: {
        //         column: {
        //             pointPadding: 0.2,
        //             borderWidth: 0,
        //             allowPointSelect: true,
        //             cursor: 'pointer'
        //         }
        //     },
        //     series: [{
        //         name: 'Bahawalpur',
        //         data: [
        //             {
        //                 "name": "2021",
        //                 "y": 449
        //             }],
        //         color: "#568203",
        //     }, {
        //         name: 'D.G Khan',
        //         data: [
        //             {
        //                 "name": "2021",
        //                 "y": 427
        //             }],
        //         color: "#32CD32",
        //     }, {
        //         name: 'Mianwali',
        //         data: [
        //             {
        //                 "name": "2021",
        //                 "y": 121
        //             }],
        //         color: "#8DB600",
        //     }, {
        //         name: 'Muzaffargarh',
        //         data: [
        //             {
        //                 "name": "2021",
        //                 "y": 170
        //             }],
        //         color: "#9EFD38",
        //     }, {
        //         name: 'Rahim Yar Khan',
        //         data: [
        //             {
        //                 "name": "2021",
        //                 "y": 884
        //             }],
        //         color: "#8F9779",
        //     }]
        // });
        $('#learning_camps_established').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'District Wise Camps',
                align: 'left',
				style: {
					display: 'none'
				}
            },

            xAxis: {
                categories: fln.districts_list,

            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'No.of Camps'
                }
            },

            tooltip: {
                formatter: function () {
                    return '<b>' + this.x + '</b><br/>' +
                        this.series.name + ': ' + this.y;
                }
            },

            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: [{
                name: 'District Camps',
                data: fln.district_camps,
                stack: 'District',
            }]

        });
        /******************FLN******************* */
        $('#enrollment_range_graph').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'Enrollment Range Wise Camps',
                align: 'left',
				style: {
					display: 'none'
				}
            },

            xAxis: {
                categories: ['0-10','11-20','21-30','31-40','41-50',
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
                data: fln.range_wise_enrollment,
                stack: 'Range Wise Enrollment',
                colors: [
                    '#F1AEB5', '#FFE69C', '#A3CFBB', '#9EC5FE', '#FFC060', '#4783FF'],
            }]

        });
        /**************************************************/
        $('#district_wise_enrolment_OOSC').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'Gender Wise Enrollment',
                align: 'left',
				style: {
					display: 'none'
				}
            },

            xAxis: {
                categories: fln.enrollmentDistrict,
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
                        this.series.name + ': ' + this.y;
                }
            },

            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: [{
                name: 'Male',
                data: fln.male_enrollment,
                stack: 'Male',
                color: '#427ec575'
            },{
                name: 'Female',
                data: fln.female_enrollment,
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
                align: 'left',
				style: {
					display: 'none'
				}
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
        //< !----------------No of Teachers OOSC END Start-------------------->
        $('#AEO_OOSC').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'No of AEOs trained as Master Trainer For OOSC',
                align: 'left',
				style: {
					display: 'none'
				}
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
        $('#Assessment_Enrolled_Beginner').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'Assessment Result of Enrolled Students',
                align: 'left',
				style: {
					display: 'none'
				}
            },

            xAxis: {
                categories: ['English','Urdu','Math'],
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Marks'
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
                    pointPadding: 0.2,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,  // Enable data labels
                        format: this.y   // Show the value on top of the column
                    }
                }
            },

            series: [{
                name: 'Baseline',
                data: fln.beginner_baseline,
                color: '#4caf50'
            },{
                name: 'Endline',
                data: fln.beginner_endline,
                color: '#ffda20'
            }]

        });
        /*****************************************/
        $('#Assessment_Enrolled_Intermediate').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'Assessment Result of Enrolled Students',
                align: 'left',
				style: {
					display: 'none'
				}
            },

            xAxis: {
                categories: ['English','Urdu','Math'],
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Marks'
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
                    pointPadding: 0.2,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,  // Enable data labels
                        format: this.y   // Show the value on top of the column
                    }
                }
            },

            series: [{
                name: 'Baseline',
                data: fln.intermediate_baseline,
                color: '#4caf50'
            },{
                name: 'Endline',
                data: fln.intermediate_endline,
                color: '#ffda20'
            }]

        });
        /*****************************************/
        $('#Assessment_OOSC_Beginner').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'Assessment Result Of OOSC',
                align: 'left',
				style: {
					display: 'none'
				}
            },

            xAxis: {
                categories: ['English','Urdu','Math'],
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Marks'
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
                    pointPadding: 0.2,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,  // Enable data labels
                        format: this.y   // Show the value on top of the column
                    }
                }
            },

            series: [{
                name: 'Baseline',
                data: fln.oosc_beginner_baseline,
                color: '#4caf50'
            },{
                name: 'Endline',
                data: fln.oosc_beginner_endline,
                color: '#ffda20'
            }]
        });
        /*****************************************/
        $('#Assessment_OOSC_Intermediate').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'Assessment Result Of OOSC',
                align: 'left',
				style: {
					display: 'none'
				}
            },

            xAxis: {
                categories: ['English','Urdu','Math'],
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Marks'
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
                    pointPadding: 0.2,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,  // Enable data labels
                        format: this.y   // Show the value on top of the column
                    }
                }
            },

            series: [{
                name: 'Baseline',
                data: fln.oosc_intermediate_baseline,
                color: '#4caf50'
            },{
                name: 'Endline',
                data: fln.oosc_intermediate_endline,
                color: '#ffda20'
            }]
        });
        /******************FLN********************/
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
                categories: fln.attendanceDates
            },

            series: [{
                name: 'Total Enrollment',
                data: fln.attendanceTotalEnroll,
                color: '#A3CFBB'
            }, {
                name: 'Present',
                data: fln.attendanceTotalPresent,
                color: '#9EC5FE'
            }]

        });
        /******************FLN********************/
        $('#functiona_NonFunctional_Camps').highcharts({
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
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },

            series: [
                {
                    name: 'Total Camps',
                    colorByPoint: true,
                    data: [
                        {
                            name: 'Functional  ',
                            y: fln.functionalCampsPercent,
                            color: '#9EC5FE'
                        },
                        {
                            name: 'Not Functional ',
                            y: fln.notFunctionalCampsPercent,
                            color: '#F1AEB5'
                        }
                    ]
                }
            ]
        });
        /******************FLN********************/
        $('#target_districts1').highcharts({
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
                            name: 'Meet Target ('+fln.aboveTwentyFiveCamps+')',
                            y: fln.aboveFortyCampsPercent,
                            color: '#F1AEB5'
                        },
                        {
                            name: 'Where Enrollment < 25 ('+fln.underTwentyFiveCamps+')',
                            y: fln.underFortyCampsPercent,
                            color: '#A3CFBB' // red
                        }
                    ]
                }
            ]
        });
        /******************FLN********************/
        $('#enrollment_camp').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Camps With Enrollment Below Threshold',
                align: 'left'
            },
            xAxis: {
                categories: [
                    'Camps'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: '# Camps Enrollment'
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
                    allowPointSelect: true
                }
            },
            series: [{
                name: '# of camps with <30 ',
                data: [
                    {
                        "y": fln.lessThanThirty
                    }],
                color: "#F1AEB5",
            }, {
                name: '# of camps with <60 OOSC ',
                data: [
                    {
                        "y": fln.lessThanSixty
                    }],
                color: "#A3CFBB",
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
                            y: 0,
                            color: '#A3CFBB'
                        },
                        {
                            name: 'Pending',
                            y: fln.pendingComplaints,
                            color: '#FFE69C'
                        }
                    ]
                }
            ]
        });
        //< !----------------FLN-------------------->
        $('#enrollment_range_graph_new').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Enrollment Range Wise',
                align: 'left'
            },
            xAxis: {
                type: 'category',
                labels: {
                    autoRotation: [-45, -90],
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Enrollment'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} Total</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            series: [{
                name: 'Enrollment',
                colors: [
                    '#F1AEB5', '#FFE69C', '#A3CFBB', '#9EC5FE', '#FFC060', '#4783FF'],
                colorByPoint: true,
                groupPadding: 0,
                data: [
                    ['0-10', 37.33],
                    ['11-20', 31.18],
                    ['21-30', 27.79],
                    ['31-40', 22.23],
                    ['41-50', 21.91],
                    ['51-Above', 21.74]
                ],
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    inside: true,
                    verticalAlign: 'top',
                    format: '{point.y:.1f}', // one decimal
                    y: 10, // 10 pixels down from the top
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
        /******************FLN******************* */
        $('#Assessment_Stats').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'Assessment Status',
                align: 'left'
            },

            xAxis: {
                categories: ['Baseline','Endline']
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
                name: 'Submitted',
                data: [fln.TotalBaselineSubmittedStudents, 0 ],
                stack: 'Baseline',
                color: '#A3CFBB'
            },{
                name: 'Remaining',
                data: [fln.RemainingBaselineSubmittedStudents, 0 ],
                stack: 'Endline',
                color: 'red'
            }]

        });
    });

    //< !--This is for the main function-- >






</script>
