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
                name: 'District',
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
                categories: ['0-30',
                    '31 And Above']
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
                align: 'left',
				style: {
					display: 'none'
				}
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
        $('#Assessment_Enrolled').highcharts({
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
                name: 'Baseline',
                data: fln.male_assessment,
                color: '#4caf50'
            },{
                name: 'Endline',
                data: fln.female_assessment,
                color: '#ffda20'
            }]

        });
        /*****************************************/
        $('#Assessment_OOSC').highcharts({
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
                name: 'Baseline',
                data: fln.oosc_male_assessment,
                color: '#4caf50'
            },{
                name: 'Endline',
                data: fln.oosc_female_assessment,
                color: '#ffda20'
            }]
        });
        /******************FLN******************* */
    });

    //< !--This is for the main function-- >






</script>
