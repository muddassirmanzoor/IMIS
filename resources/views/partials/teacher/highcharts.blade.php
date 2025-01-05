<script>
    jQuery(function ($) {
        //< !----------------Teachers by gender  here-------------------->
		$('#teacher-by-level').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Teachers by level',
                align: 'left',
				style: {
					display: 'none'
				}
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
                data: [{
                    name: 'Primary',
                    y: 179413,
                    sliced: true,
                    selected: true
                }, {
                    name: 'ESTS',
                    y: 104770
                },  {
                    name: 'SSTS',
                    y: 44516
                }, {
                    name: 'SS/SSS',
                    y: 3467
                }, {
                    name: 'HRMS/PRINCIPALS',
                    y: 2981
                }, {
                    name: 'IMAM/QARI',
                    y: 33
                }]
            }]
        });
        $('#TG').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Teachers by gender',
                align: 'left',
				style: {
					display: 'none'
				}
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
                data: [{
                    name: 'Male',
                    y: 146870,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Female',
                    y: 188322
                }]
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
                align: 'left',
				style: {
					display: 'none'
				}
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
                        name: 'Matric',
                        y: 6580,
                        color: 'rgba(66, 126, 197, 0.54)'
                    },
                    {
                        name: 'F.A/F.Sc',
                        y: 4655,
                        color: 'rgba(66, 126, 197, 0.44)'
                    },
                    {
                        name: 'B.A/B.Sc',
                        y: 31284,
                        color: 'rgba(66, 126, 197, 0.74)'
                    },
                    {
                        name: 'M.A/M.Sc',
                        y: 84606,
                        color: 'rgb(66, 126, 197, 0.84)'
                    },
                    {
                        name: 'M.Phil',
                        y: 19296,
                        color: 'rgba(66, 126, 197, 0.64)'
                    },
                    {
                        name: 'Ph.D',
                        y: 498,
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
                align: 'left',
				style: {
					display: 'none'
				}
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
                        name: 'Matric',
                        y: 8421,
                        color: 'rgba(243, 58, 134, 0.54)'
                    },
                    {
                        name: 'F.A/F.Sc',
                        y: 5353,
                        color: 'rgba(243, 58, 134, 0.44)'
                    },
                    {
                        name: 'B.A/B.Sc',
                        y: 32867,
                        color: 'rgba(243, 58, 134, 0.74)'
                    },
                    {
                        name: 'M.A/M.Sc',
                        y: 121,
                        color: 'rgb(243, 58, 134, 0.84)'
                    },
                    {
                        name: 'M.Phil',
                        y: 20032,
                        color: 'rgba(243, 58, 134, 0.64)'
                    },
                    {
                        name: 'Ph.D',
                        y: 195,
                        color: 'rgba(243, 58, 134, 0.34)'
                    }]
            }]
        });
        /******************students_by_level END******************* */
        // Custom template helper
        Highcharts.Templating.helpers.abs = value => Math.abs(value);

        // Age categories
        const categories = [
            'Under Matric', 'Matric', 'CT', 'PTC/JV', 'None', 'Others'];
        //< !----------------districts chart  chart Start here-------------------->
        $('#TPQ').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Teacher by professional Qualification',
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

    });
</script>
