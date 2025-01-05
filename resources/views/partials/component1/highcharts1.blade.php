<script>
    jQuery(function ($) {
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
        //< !----------------Module wise access rate Start-------------------->
        /*$('#no_accessed_module').highcharts({
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
        });*/
        //< !----------------Module wise access rate END-------------------->
        //< !---------------- District wise tablet distribution here START-------------------->
        $('#Tablet_Distribution').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'District Wise Tablets Distribution',
                align: 'left'
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
                    text: 'Total number of tablets'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">Total {series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
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
                name: 'Tablets Distribution',
                data: [65, 59, 80, 81, 56, 55, 40,65, 59, 80, 81, 56, 55, 40,65, 59, 80, 81, 56, 55, 40,65, 59, 80, 81, 56, 55, 40,65, 59, 80, 81, 56, 55, 40,65, 59,50,55,55,33],
                color: "#147049"

            },{
                name: 'Tablets Allocation',
                data: [65, 59, 80, 81, 56, 55, 40,65, 59, 80, 81, 56, 55, 40,65, 59, 80, 81, 56, 55, 40,65, 59, 80, 81, 56, 55, 40,65, 59, 80, 81, 56, 55, 40,65, 59,50,55,55,33],
                color: "#ccbf9d"

            }]
        });

        /*Year wise Teacher trends*/
        $('#year_wise_teacher_trends').highcharts({
             chart: {
                type: 'column'
            },
            title: {
                text: 'Year Wise Teacher Trained',
                align: 'left',
				style: {
					display: 'none'
				}
            },

            xAxis: {
                categories: ['2022','2023','2024'],
                accessibility: {
                    description: 'Months of the year'
                }
            },
            yAxis: {
                title: {
                    text: 'Number of Teachers'
                }
            },
            tooltip: {
                shared: true,
                headerFormat: '<span style="font-size:12px"><b>{point.key}</b></span><br>'
            },

            series: [{
                name: 'Trained Teachers',
                data: [67000, 58591, 0]
            }
			/*,{
                name: 'Modules Developed',
                data: [1500,2020,1500,2020]
            }
			*/]
        });
    });
</script>
