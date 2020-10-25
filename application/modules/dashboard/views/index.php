<div class="container-fluid" ng-controller="dashboard">
    <div class="row p-2">
        <div class="col">
            <div class="card card-nindya">
                <div class="card-header card-header-nindya">
                    <p class="text-nindya p-2 pull-left">GRAFIK PRODUKSI 
					</p>
                    <form class="form-inline pull-right">
						<div class="form-group">
                                <label for="periode" class="pr-2 text-small text-white">Periode &nbsp;</label>
							<select class="form-control" id="filterdate" ng-model="periode" ng-change="selectDate()">
								<option value="current">Current Day</option>
								<option value="lastday">last Day</option>
								<option value="weekly">Weekly</option>
								<option value="monthly">Current Month</option>
								<option value="lastmonth">Last Month</option>
								<option value="custom">Custom</option>
							</select>
						</div>
                    </form>
                </div>
                <div class="card-body card-body-nindya">
					<div class="row mb-2" ng-if="!loading">
                        <div class="col-lg-12">
							<div class="nav nav-tabs btn-group" id="myTab" role="tablist" aria-label="Basic example">
								<a class="btn btn-success btn-sm nav-link active" id="graph-tab" data-toggle="tab" href="#graph" role="tab" aria-controls="graph" aria-selected="true">Show Graph</a>
								<a class="btn btn-success btn-sm nav-link" id="tables-tab" data-toggle="tab" href="#tables" role="tab" aria-controls="tables" aria-selected="false">Show Tables</a>
							</div>
						</div>
					</div>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="graph" role="tabpanel" aria-labelledby="graph-tab">
							<div class="row">
								<div class="col-lg-9">
									<center style="font-size: 12px;">
										<b ng-if="!loading" ng-bind="titleChart"></b><br>
										<!-- <span ng-if="loading">
											<h6 id="loadingprogress">Loading...</h6>
											<p class="circle">
												<span class="ouro ouro3">
													<span class="left"><span class="anim"></span></span>
													<span class="right"><span class="anim"></span></span>
												</span>
											</p>
										</span> -->
										<b ng-if="!loading" ng-bind="subtitleChart"></b><br>
										<b ng-if="!loading" ng-bind="startdate"></b><br>
									</center>
									<div id="chartdiv"></div>
								</div>

								<div class="col-lg-3">
									<div class="card card-nindya mt-5" ng-if="!loading">
										<div class="card-header with-border card-header-information">
											<small>
												Information Produksi
											</small>
										</div>

										<small>
											<table class="table table-border" style="margin-bottom: 0px !important;">
												<tr>
													<td>Minimum Produksi</td>
													<td>
														<span class="badge badge-information">100.000</span>
													</td>
												</tr>
												<tr>
													<td>Maximum Produksi</td>
													<td>
														<span class="badge badge-information">400.000</span>
													</td>
												</tr>
											</table>
										</small>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="tables" role="tabpanel" aria-labelledby="tables-tab">
							<div class="row">
								<div class="col-lg-12">
									<table class="table table-condensed table-striped mb-1">
										<thead>
											<tr>
												<th class="thead-blank"></th>
												<th class="thead-report" ng-repeat="head in table_header" ng-bind="head"></th>
											</tr>
										</thead>
										<tbody>
											<tr ng-if="!loading" ng-repeat="(key, list) in latencyReport.list">
												<td class="td-background-white" ng-bind="key"></td>
												<td align="center" ng-repeat="(k,col) in list" ng-bind="col" ng-bind="col" ng-class="{'td-danger': k == 'avg_latency'}"></td>
											</tr>
											<tr ng-if="loading">
												<td class="text-center"><i class="fa fa-spinner fa-pulse fa-3x fa-fw text-danger" style="font-size:24px"></i></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
