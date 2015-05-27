'use strict';
  
var appServices = angular.module('appServices', []);
 
appServices.factory('emailsProvider', ['$http', function($http) {

    var url = 'http://localhost/PhpProject2/week5/lab/proxyAPI.php?resource=emails';

    return {
        "getEmails": function () {
            return $http.get(url);
        }
    };
}]);