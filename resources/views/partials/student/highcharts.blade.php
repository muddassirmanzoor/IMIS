<script>
    jQuery(function ($) {
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
        //< !----------------district mdeium schools Start here-------------------->
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
                align: 'left',
				style: {
					display: 'none'
				}
            },
			//colors: ['#66369a','#2f5597','#ffc000','#c55a11','#fa4b42'],
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
                    y: 3931516,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Elementary',
                    y: 1922903
                },  {
                    name: 'High',
                    y: 4516998
                }, {
                    name: 'H.Secondary',
                    y: 832020
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
                text: 'Gender Distribution (By Class)',
                align: 'left',
				style: {
					display: 'none'
				}
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
                format: '<b>{series.name}, {point.category}</b><br/>' +
                    'Students: {(abs point.y):1f} '
            },

            series: [{
                name: 'Male',
                color: '#2caffe',
                data: [-211418, -639806, -529890, -527827, -485743, -480426, -475662, -416580, -458553, -439434, -386067,-368131, -28479, -26205]
            }, {
                name: 'Female',
                color: '#f16d6e',
                data: [211868, 633269, 540599, 536740, 499521, 490472, 497897, 480950, 509968, 487736, 390257, 378795, 39527, 39334]
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
