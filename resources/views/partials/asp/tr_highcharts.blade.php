<script>
    var graph_data = @json($data['graph_data']);

    jQuery(function ($) {
        //< !----------------Teachers by gender  here-------------------->
        $('#TG').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Teachers by gender',
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
                name: 'Teachers',
                colorByPoint: true,
                showInLegend: true,
                data: graph_data.total_teachers
            }]
        });

        $('#TGQ_male').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Male Teachers by Qualification',
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
                        format: '<b>{point.name}</b>: {point.y}'
                    }
                }
            },
            series: [{
                colorByPoint: true,
                showInLegend: true,
                type: 'pie',
                name: 'Qualification',
                innerSize: '50%',
                data: [
                    {
                        name: 'M.A/M.Sc',
                        y: 89717,
                        color: 'rgb(66, 126, 197, 0.84)'
                    },
                    {
                        name: 'B.A/B.Sc',
                        y: 37014,
                        color: 'rgba(66, 126, 197, 0.74)'
                    },
                    {
                        name: 'M.Phil',
                        y: 17220,
                        color: 'rgba(66, 126, 197, 0.64)'
                    },
                    {
                        name: 'Matric',
                        y: 8516,
                        color: 'rgba(66, 126, 197, 0.54)'
                    },
                    {
                        name: 'F.A/F.Sc',
                        y: 5762,
                        color: 'rgba(66, 126, 197, 0.44)'
                    },
                    {
                        name: 'Ph.D',
                        y: 342,
                        color: 'rgba(66, 126, 197, 0.34)'
                    }]
            }]
        });
        $('#TGQ_female').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Female Teachers by Qualification',
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
                        format: '<b>{point.name}</b>: {point.y}'
                    }
                }
            },
            series: [{
                colorByPoint: true,
                showInLegend: true,
                type: 'pie',
                name: 'Qualification',
                innerSize: '50%',
                data: [
                    {
                        name: 'M.A/M.Sc',
                        y: 125071,
                        color: 'rgb(243, 58, 134, 0.84)'
                    },
                    {
                        name: 'B.A/B.Sc',
                        y: 38153,
                        color: 'rgba(243, 58, 134, 0.74)'
                    },
                    {
                        name: 'M.Phil',
                        y: 17772,
                        color: 'rgba(243, 58, 134, 0.64)'
                    },
                    {
                        name: 'Matric',
                        y: 10884,
                        color: 'rgba(243, 58, 134, 0.54)'
                    },
                    {
                        name: 'F.A/F.Sc',
                        y: 6414,
                        color: 'rgba(243, 58, 134, 0.44)'
                    },
                    {
                        name: 'Ph.D',
                        y: 123,
                        color: 'rgba(243, 58, 134, 0.34)'
                    }]
            }]
        });
        /******************students_by_level END******************* */
        // Custom template helper
        Highcharts.Templating.helpers.abs = value => Math.abs(value);

        // Age categories
        const categories = [
            'M.Ed/MS.Ed', 'B.Ed/BS.Ed', 'CT', 'PTC/JV', 'None', 'Others'];
        //< !----------------districts chart  chart Start here-------------------->
        $('#TPQ').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Teacher by professional Qualification',
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
                color: 'rgba(66, 126, 197)',
                data: [-47439, -81242, -6903, -13658, -5525, -3804]
            }, {
                name: 'Female',
                color: 'rgb(243, 58, 134)',
                data: [73721, 95169, 4351, 18847, 3530,2899]
            }]
        });
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
    });
</script>
