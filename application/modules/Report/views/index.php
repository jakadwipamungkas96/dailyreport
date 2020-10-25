<div class="container-fluid" ng-controller="report">
    <div class="row p-2">
        <div class="col">
            <div class="card card-nindya">
                <div class="card-header card-header-nindya">
                    <p class="text-nindya p-2 pull-left">REPORT PRODUKSI</p>
                </div>
                <div class="card-body card-body-nindya">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="btn-group pull-left mb-2" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-primary"><i class="fa fa-file-archive-o" aria-hidden="true"></i> Export Docx</button>
                                <button type="button" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Xlsx</button>
                                <button type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Export PDF</button>
                            </div>
                            <div class="btn-group pull-right mb-2" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                                <button type="button" class="btn btn-success" ng-click="sendEmail()"><i class="fa fa-envelope-open" aria-hidden="true"></i> Send Email</button>
                            </div>
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

    <div class="modal fade" id="mdlSendEmail" style="background: rgb(0 102 51 / 0.5) !important;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" style="border-bottom: 3px solid #006633 !important;" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-top: 3px solid #006633 !important;">
                    <h6 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-send"></i> Send Email</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 mb-1">
                            <form>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="email" class="form-control-label">To:</label><br>
                                            <input type="text" class="form-control" style="color: black !important;" id="subject" name="subject">
                                        </div>
                                        <div class="form-group">
                                            <label for="subject" class="form-control-label">Subject:</label>
                                            <input type="text" class="form-control" style="color: black !important;" id="subject" name="subject">
                                        </div>
                                        <div class="form-group">
                                            <label for="message" class="form-control-label">Message:</label>
                                            <textarea class="form-control" cols="100" rows="10" ng-model="sendemail.message"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="attcahment" class="form-control-label">Attcahment:</label><br>
                                            <i class="fa fa-file-pdf-o text-danger" aria-hidden="true"></i> <a href=""><span class="badge badge-danger">REPORTPRODUKSI.PDF</span></a>
                                            <!-- <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp"> -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
						<div class="btn-group col-12 mb-2" role="group" aria-label="Basic example">
							<button type="button" class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i> Cancel</button>
							<button type="button" class="btn btn-success"><i class="fa fa-send" aria-hidden="true"></i> Send</button>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
