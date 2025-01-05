<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">

<script>
    var lnfbd = @json($data['graph_data']);
    console.log(lnfbd);
    jQuery(function ($) {
        //< !----------------L&NFBED-------------------->
        /*$('#master_trainer_trained').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'No. of Master Trainer Trained'
            },
            xAxis: {
                categories: [
                    'DERA GHAZI KHAN',
                    'MUZAFFARGARH',
                    'RAJANPUR',
                    'RAHIM YAR KHAN',
                    'BAHAWALPUR'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'No. of Master Trained'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
                name: 'Female trained',
                data: [49.9, 71.5, 106.4, 129.2, 144.0],
                color: '#f33a86'

            }, {
                name: 'Male trained',
                data: [83.6, 78.8, 98.5, 93.4, 106.0],
                color: '#427ec5'

            }]
        });*/
        //< !----------------FLN-------------------->
        $('#functional_nonfunctional').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'District Wise NFEIs',
				align:"left",
				style: {
					display: 'none'
				}
            },
            xAxis: {
                categories: lnfbd.districts,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Institutions Meeting Target'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:f} </b></td></tr>',
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
                name: 'Functional',
                data: [156, 162, 262,282, 138],
                color: '#5d9649'

            }]
        });
        /******************FLN******************* */
        $('#district_age_enrollment_graph').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'District And Age Wise Enrollment',
				align:"left",
				style: {
					display: 'none'
				}
            },
            xAxis: {
                categories: lnfbd.districts,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Enrollement'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:f} </b></td></tr>',
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
                name: '5-9',
                data: [2442, 3791, 3671, 7432, 2226],

            }, {
                name: '10-18',
                data: [3888, 1397, 5734, 1199, 2145],

            }]
        });
        /**************************************************/
        /*$('#literacy_mobilizers_gender').highcharts({
            chart: {
                type: 'column'
            },

            title: {
                text: 'Gender Wise Literacy Mobilizers',
                align: 'left'
            },

            xAxis: {
                categories: ['Literacy Mobilizers'],
                title: {
                    text: null
                },
                gridLineWidth: 1,
                lineWidth: 0
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Literacy Mobilizers',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                },
                gridLineWidth: 0
            },
            tooltip: {
                 valueSuffix: ' millions'
             },
            plotOptions: {
                bar: {
                    borderRadius: '50%',
                    dataLabels: {
                        enabled: true
                    },
                    groupPadding: 0.1
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 80,
                floating: true,
                borderWidth: 1,
                backgroundColor:
                    Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Male LM Engaged',
                data: [631],
                color:'#427ec5'
            }, {
                name: 'Male LM Trained',
                data: [814],
                color:'#427ec575'
            }, {
                name: 'Female LM Engaged',
                data: [1044],
                color:'#f33a86'
            }, {
                name:  'Female LM Trained',
                data: [1276],
                color:'#f33a8675'
            }]
        });*/
    });

</script>
