var urls = window.location.origin+'/dailyreport/';
var mainApp = angular.module('nindya', ['angularUtils.directives.dirPagination', 'ngSanitize'])

.service('httpHandler', ['$http', '$q', '$injector', function($http, $q, $injector){

    this.send = function (opt, loading) {

        var canceler = $q.defer();
        var appHelper = $injector.get('appHelper');

        // Set options
        var options = {
            headers: {},
            method: 'GET',
            data: {},
            params: {},
            timeout: canceler.promise,
        };

        $.extend(options, opt);

        if(options.method == 'POST'){
            options.headers['Content-Type'] = 'application/x-www-form-urlencoded';
            options.data = options.data;
        }

        var request = $http(options);

        request.then(
            function successCallbacks(response){
                
            }, 
            function errorCallback(response, statusText) {
                
                if(response.status == 401)
                {
                    appHelper.showMessage(401,statusText);
                }else if(response.status == 400){
                    appHelper.showMessage('error','Oops bad request, please contact admin!');
                }else if(response.status == 403){
                    appHelper.showMessage('error','Oops you dont have access!');
                }else if(response.status == 404){
                    appHelper.showMessage('error','Oops page not found!');
                }else if(response.status == 405){
                    appHelper.showMessage('error','Oops method not allowed, please contact admin!');
                }else if(response.status == 408){
                    appHelper.showMessage('error','Oops request timeout, please reload again!');
                }else if(response.status == 500){
                    appHelper.showMessage('error','Oops internal server error, please reload again!');
                }else if(response.status == 502){
                    appHelper.showMessage('error','Oops bad gateway, please reload again!');
                }else if(response.status == 503){
                    appHelper.showMessage('error','Oops service unavailable, please reload again!');
                }

            });
        
        return request;
    }

}])

.service('appHelper', ['httpHandler', function(httpHandler){
    
    this.showMessage = function (e, msg) {
        
        if(e == 'success'){
            err = '<h1><i class="dripicons dripicons-checkmark text-success"></i></h1>';
        }else if(e == 'error'){
            err = '<h1><i class="dripicons dripicons-warning text-danger"></i></h1>';
        }else{
            err = e;
        }

        $('#popup-msg').find('.modal-body').html(err+'<p>'+msg+'</p>');
        $('#popup-msg').modal('show');
    }

}])
