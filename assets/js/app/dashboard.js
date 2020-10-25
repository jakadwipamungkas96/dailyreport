mainApp.controller('dashboard', ['$scope', 'httpHandler', '$filter', function($scope, httpHandler, $filter){

	$scope.periode = "monthly";
	$scope.titleChart = "Produksi";
	$scope.subtitleChart = "PT. Nindya Karya (Persero)";
	$scope.startdate = "20 October 2020 - 26 October 2020";

	$scope.table_header = [
		"20 Oct",
		"21 Oct",
		"22 Oct",
		"23 Oct",
		"24 Oct",
		"25 Oct",
		"26 Oct",
	];

	$scope.latencyReport = {
		list: {
			"Wilayah 1" : {
				"20 Oct":100000,
				"21 Oct":150000,
				"22 Oct":200000,
				"23 Oct":250000,
				"24 Oct":300000,
				"25 Oct":350000,
				"26 Oct":370000,
			},
			"Wilayah 2" : {
				"20 Oct":130000,
				"21 Oct":160000,
				"22 Oct":200000,
				"23 Oct":230000,
				"24 Oct":300000,
				"25 Oct":330000,
				"26 Oct":390000,
			},
			"Wilayah 3" : {
				"20 Oct":150000,
				"21 Oct":190000,
				"22 Oct":230000,
				"23 Oct":270000,
				"24 Oct":340000,
				"25 Oct":360000,
				"26 Oct":400000,
			},
			"Wilayah 4" : {
				"20 Oct":120000,
				"21 Oct":150000,
				"22 Oct":230000,
				"23 Oct":240000,
				"24 Oct":290000,
				"25 Oct":300000,
				"26 Oct":340000,
			},
			"Wilayah 5" : {
				"20 Oct":150000,
				"21 Oct":180000,
				"22 Oct":230000,
				"23 Oct":280000,
				"24 Oct":370000,
				"25 Oct":390000,
				"26 Oct":400000,
			},
		}
	}

	console.log($scope.latencyReport);
	
	$scope.chartProduksi = function () {

		$scope.loading = true;
        httpHandler.send({
            method: 'GET',
            url: mainUrl + 'dashboard/process',
        }).then(function successCallbacks(response) {
			$scope.loading = false;

			am4core.ready(function() {

				// Themes begin
				am4core.useTheme(am4themes_dataviz);
				am4core.useTheme(am4themes_animated);
				// Themes end
				
				// Create chart instance
				var chart = am4core.create("chartdiv", am4charts.XYChart);
				// chart.scrollbarX = new am4core.Scrollbar();
				chart.exporting.menu = new am4core.ExportMenu();
				chart.exporting.filePrefix = $scope.titleChart + "-" + $scope.subtitleChart+"-Export";
				chart.exporting.menu.items[0].icon = mainUrl+"/assets/img/icon-download.png";
				chart.exporting.menu.align = "right";
				chart.exporting.menu.verticalAlign = "top";
				chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";
				
				// Add data
				chart.data = response.data.data;
				
				// Create axes
				
				var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
				categoryAxis.dataFields.category = "dates";
				categoryAxis.renderer.grid.template.location = 0;
				categoryAxis.renderer.minGridDistance = 30;
				
				categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
				  if (target.dataItem && target.dataItem.index & 2 == 2) {
					return dy + 25;
				  }
				  return dy;
				});

				
				var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
				
				// Create series
				var series = chart.series.push(new am4charts.ColumnSeries());
				series.dataFields.valueY = "wilayah1";
				series.dataFields.categoryX = "dates";
				series.name = "Wilayah 1";
				series.fill = "#006633";
				series.fillOpacity = 1;
				series.stroke = am4core.color("#006633");
				series.columns.template.tooltipText = "{name}: [b]{valueY}[/]";
				
				var columnTemplate = series.columns.template;
				columnTemplate.strokeWidth = 2;
				columnTemplate.strokeOpacity = 1;
	
				var series2 = chart.series.push(new am4charts.ColumnSeries());
				series2.dataFields.valueY = "wilayah2";
				series2.dataFields.categoryX = "dates";
				series2.name = "Wilayah 2";
				series2.fill = "#006633";
				series2.fillOpacity = 1;
				series2.stroke = am4core.color("#006633");
				series2.columns.template.tooltipText = "{name}: [b]{valueY}[/]";
				
				var columnTemplate = series2.columns.template;
				columnTemplate.strokeWidth = 2;
				columnTemplate.strokeOpacity = 1;
				
				var series3 = chart.series.push(new am4charts.ColumnSeries());
				series3.dataFields.valueY = "wilayah3";
				series3.dataFields.categoryX = "dates";
				series3.name = "Wilayah 3";
				series3.fill = "#006633";
				series3.fillOpacity = 1;
				series3.stroke = am4core.color("#006633");
				series3.columns.template.tooltipText = "{name}: [b]{valueY}[/]";
				
				var columnTemplate = series3.columns.template;
				columnTemplate.strokeWidth = 2;
				columnTemplate.strokeOpacity = 1;
	
				var series4 = chart.series.push(new am4charts.ColumnSeries());
				series4.dataFields.valueY = "wilayah4";
				series4.dataFields.categoryX = "dates";
				series4.name = "Wilayah 4";
				series4.fill = "#006633";
				series4.fillOpacity = 1;
				series4.stroke = am4core.color("#006633");
				series4.columns.template.tooltipText = "{name}: [b]{valueY}[/]";
				
				var columnTemplate = series4.columns.template;
				columnTemplate.strokeWidth = 2;
				columnTemplate.strokeOpacity = 1;
	
				var series5 = chart.series.push(new am4charts.ColumnSeries());
				series5.dataFields.valueY = "wilayah5";
				series5.dataFields.categoryX = "dates";
				series5.name = "Wilayah 5";
				series5.fill = "#006633";
				series5.fillOpacity = 1;
				series5.stroke = am4core.color("#006633");
				series5.columns.template.tooltipText = "{name}: [b]{valueY}[/]";
				
				var columnTemplate = series5.columns.template;
				columnTemplate.strokeWidth = 2;
				columnTemplate.strokeOpacity = 1;
				
			}); // end am4core.ready()
		}, function errorCallback(response) {

        });

		
	}

	$scope.chartProduksi();

}]);
