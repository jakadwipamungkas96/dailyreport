mainApp.controller('report', ['$scope', 'httpHandler', '$filter', function($scope, httpHandler, $filter){

	$scope.periode = "current";
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
		"Average"
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
				"Average": 245000
			},
			"Wilayah 2" : {
				"20 Oct":130000,
				"21 Oct":160000,
				"22 Oct":200000,
				"23 Oct":230000,
				"24 Oct":300000,
				"25 Oct":330000,
				"26 Oct":390000,
				"Average": 249000
			},
			"Wilayah 3" : {
				"20 Oct":150000,
				"21 Oct":190000,
				"22 Oct":230000,
				"23 Oct":270000,
				"24 Oct":340000,
				"25 Oct":360000,
				"26 Oct":400000,
				"Average": 325000
			},
			"Wilayah 4" : {
				"20 Oct":120000,
				"21 Oct":150000,
				"22 Oct":230000,
				"23 Oct":240000,
				"24 Oct":290000,
				"25 Oct":300000,
				"26 Oct":340000,
				"Average": 328000
			},
			"Wilayah 5" : {
				"20 Oct":150000,
				"21 Oct":180000,
				"22 Oct":230000,
				"23 Oct":280000,
				"24 Oct":370000,
				"25 Oct":390000,
				"26 Oct":400000,
				"Average": 359000
			},
		}
	}

	console.log($scope.latencyReport);

	console.log($scope.periode);

	$scope.sendEmail = function () {
		$("#mdlSendEmail").modal("show");
	}

}]);
