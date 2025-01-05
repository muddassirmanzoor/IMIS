<script>
    var schools = @json($data['graph_data']);
    jQuery(function ($) {
        $('#district_gender_schools').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },
            title: {
                text: 'School by Gender',
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
                    dataLabels: {
                        enabled: true,
                        distance: -50,
                        style: {
                            fontWeight: 'bold',
                            color: 'white'
                        }
                    },
                    startAngle: -90,
                    endAngle: 90,
                    center: ['50%', '75%'],
                    size: '110%'
                }
            },
            series: [{
                type: 'pie',
                name: 'School By Gender',
                innerSize: '50%',
                showInLegend: true,
                data: schools.schools_by_gender
            }]
        });
        //< !----------------districts chart  chart Start here-------------------->
		$('#School_by_type').highcharts({
            chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false,
				type: 'pie'
			},
			title: {
				text: 'Level wise Schools',
				align: 'left',
				style: {
					display: 'none'
				}
			},
			tooltip: {
				pointFormat: '{series.name}(<b>{point.y})</b>'
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
						format: '{point.name} <b>({point.y})</b>'
					}
				}
			},
			series: [{
				name: 'Schools',
				colorByPoint: true,
				data: schools.schools_by_level
			}]
		});
		/***************************************/
			$('#School_by_type2').highcharts({
            chart: {
					plotBackgroundColor: null,
					plotBorderWidth: 0,
					plotShadow: true
				},
				title: {
					text: 'Level wise Schools',
					align: 'left',
					verticalAlign: 'top',
					y: 60,
					style: {
						display: 'none'
					}
				},
				accessibility: {
					point: {
						valueSuffix: '%'
					}
				},
				 plotOptions: {
					pie: {
						innerSize: '50%', // Make it a half donut chart
						dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b>: {point.y}', // Show name and percentage
							distance: 40 // Place the data labels outside the pie
						},
						showInLegend: true,
						startAngle: -90, // Start angle at -90 degrees (top of the circle)
						endAngle: 90,   // End angle at 90 degrees (bottom of the circle)
						center: ['50%', '75%'] // Center the chart horizontally and position it lower
					}
				},
				series: [{
					type: 'pie',
					name: 'Schools',
					innerSize: '50%',
					keys: ['name', 'y', 'color', 'label'],
					data: schools.schools_by_level
				}]
			});

        //< !----------------district mdeium schools Start here-------------------->
        /******************District and Gender Wise Schools START******************* */
        // Data retrieved from https://netmarketshare.com
        $('#district_level_schools').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Schools by level',
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
                name: 'Schools',
                colorByPoint: true,
                showInLegend: true,
                data: schools.schools_by_level
            }]
        });
        /******************District and Gender Wise Schools END******************* */
        //< !----------------Schools Area chart Start here-------------------->
        $('#Schools_Area').highcharts({
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'School By Area',
                align: 'left',
				style: {
					display: 'none'
				}
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            series: [{
                name: 'Area',
                showInLegend: true,
                data: schools.school_by_area
            }]
        });
        //< !----------------School Ownership chart Start here-------------------->
        $('#School_Ownership').highcharts({
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'School Ownership',
                align: 'left',
				style: {
					display: 'none'
				}
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
                data: schools.school_ownership
            }]
        });
        //< !----------------School_Construction_Type chart Start here-------------------->
        $('#School_Construction_Type').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'School Construction Type',
                align: 'left',
				style: {
					display: 'none'
				}
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
                name: 'School Construction Type',
                colorByPoint: true,
                showInLegend: true,
                data: schools.construction_type
            }]
        });
        //< !----------------School_Buliding_Safety chart Start here-------------------->
        $('#School_Buliding_Safety').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'School Building Safety',
                align: 'left',
				style: {
					display: 'none'
				}
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
                name: 'School Building Safety',
                colorByPoint: true,
                showInLegend: true,
                data: schools.building_safety
            }]
        });
        //< !----------------district mdeium schools Start here-------------------->

    });

    //< !--This is for the main function-- >

</script>
