<script>
    var graph_data = @json($data['graph_data']);

    jQuery(function ($) {
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
                    '<td style="padding:0"><b>{point.y:f} Total</b></td></tr>',
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

        //<!--Enrollment by Gender and Medium-->
        $('#EGM').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'Enrollment by Gender in Districts',
                align: 'left'
            },

            xAxis: {
                categories: graph_data.districts
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
                data: graph_data.district_male_students,
                color: '#2caefd'
            }, {
                name: 'Girls',
                data: graph_data.district_female_students,
                color: '#f766ae'
            }]
        });

        Highcharts.Templating.helpers.abs = value => Math.abs(value);

        // Age categories
        const categories = [
            'ECE', 'Kachi', 'Class-1', 'Class-2', 'Class-3', 'Class-4', 'Class-5', 'Class-6',
            'Class-7', 'Class-8'];
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
                    'Students: {(abs point.y):f}'
            },

            series: [{
                name: 'Male',
                color: '#2caffe',
                data: graph_data.asp_male_class_students
            }, {
                name: 'Female',
                color: '#f16d6e',
                data: graph_data.asp_female_class_students
            }]
        });


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
    //< !--This is for the main function-- >
    });

</script>
