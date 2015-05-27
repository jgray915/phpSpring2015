'use strict';

var appControllers = angular.module('appControllers', []);

appControllers.controller('EmailListCtrl', ['$scope', 'emailsProvider', function($scope, emailsProvider) {
    
    $scope.emails = {};
    
    emailsProvider.getEmails().success(function(response) {
         $scope.emails = response.data;
    }).error(function (response, status) {
       console.log(response);
    });
    
    
}])
.controller('EmailDetailCtrl', ['$scope', '$routeParams', 'emailsProvider', 'findEmailFilter', 
    function($scope, $routeParams, emailsProvider, findEmailFilter) {
    
        $scope.email = {};
        var id = $routeParams.emailId;
        
        emailsProvider.getEmails().success(function(response) {
            for(var i = 0; i < response.data.length; i++)
            {
                if(response.data[i].emailid == id)
                {
                    $scope.email = response.data[i];
                }
            }              
        }).error(function (response, status) {
           console.log(response);
        });  
    
}]);




