<script>
    var graph_data = @json($data['graph_data']);

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
                data: graph_data.total_schools
            }]
        });

        // < !--Enrollment Schools chart End here-- >
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
                data: graph_data.total_enrollment
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
                data: graph_data.total_teachers
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
                categories: graph_data.districts,
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
                data: graph_data.district_schools,
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
                categories: graph_data.districts,
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
                data: graph_data.district_students,
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
                text: 'Districts Wise Teachers  Male and Female'
            },
            xAxis: {
                categories: graph_data.districts,
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
                name: 'Male',
                data: graph_data.district_male_teachers,
                color: "#0a390a"

            }, {
                name: 'Female',
                data: graph_data.district_female_teachers,
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
                categories: graph_data.districts
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
                data: graph_data.district_six_male,
                stack: 'Male',
                color: '#427ec575'
            }, {
                name: 'Class7 Male',
                data: graph_data.district_seven_male,
                stack: 'Male',
                color: '#427ec5bd'
            }, {
                name: 'Class8 Male',
                data: graph_data.district_eight_male,
                stack: 'Male',
                color: '#427ec5'
            }, {
                name: 'Class6 Female',
                data: graph_data.district_six_female,
                stack: 'Female',
                color: '#f33a8675'
            }, {
                name: 'Class7 Female',
                data: graph_data.district_seven_female,
                stack: 'Female',
                color: '#f33a86a3'
            }, {
                name: 'Class8 Female',
                data: graph_data.district_eight_female,
                stack: 'Female',
                color: '#f33a86'
            }]

        });
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
