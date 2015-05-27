 'use strict';

var myApp = angular.module('myApp', [
  'ngRoute',
  'appControllers',
  'appServices',
  'appFilters'
]);


myApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
        when('/', {
            templateUrl: 'partials/email-list.html',
            controller: 'EmailListCtrl'
        }).
        when('/emails/:emailId', {
            templateUrl: 'partials/email-detail.html',
            controller: 'EmailDetailCtrl'
        }).
        otherwise({
          redirectTo: '/'
        });
  }]);