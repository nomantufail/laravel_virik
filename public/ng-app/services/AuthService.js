/**
 * Created by zeenomlabs on 12/11/2015.
 */
var app = angular.module('inventory_system');
app.factory("$AuthService", function ($rootScope, $http) {
    return {
        getAppToken: function () {
            return $rootScope.AUTH_TOKEN;
        },
        setAppToken: function ($token) {
            $rootScope.AUTH_TOKEN = $token;
        },

        authenticate: function ($credentials) {
            var promise = $http({
                method: 'POST',
                url: apiPath+'login',
                data:$credentials
            }).then(function successCallback(response) {
                return response;
            }, function errorCallback(response) {
                return response;
            });

            return promise;
        },

        logout: function () {
            this.setAppToken(null);
        }
    }
});