/**
 * Created by noman_2 on 12/8/2015.
 */
var app = angular.module('inventory_system');

app.controller("LoginController",["$RouteHelper", "$rootScope", "$scope",
    "$AuthService", "$location", "$state", "$http", "$firebaseArray", "$ResourceLoader",
    function ($RouteHelper, $rootScope, $scope, $AuthService, $location, $state, $http, $firebaseArray, $ResourceLoader) {

        //var ref = new Firebase("https://blistering-torch-713.firebaseio.com/test1/lies");

        $scope.login = function () {
            $AuthService.authenticate({
                'email':'xyz@gmail.com',
                'password': '123'
            }).then(function (response) {
                if(response.data.status == 1){
                    $AuthService.setAppToken(response.data.access_token);
                    $ResourceLoader.loadAll().then(function (response) {
                        if(response == true)
                            $location.path($RouteHelper.getAuthenticatedLandingUri());
                        else
                            console.log('can not redirect. server fucked up!!');
                    });
                }else{
                    console.log(response.data.error.messages);
                }
            }, function (data) {
                alert('some thing went wrong');
            });
            /*$http({
                method: 'GET',
                url: '/auth/login'
            }).then(function successCallback(response) {
                $token = response.data.token;
                $rootScope.AUTH_TOKEN = $token;
                window.location = $state.href('home.customers.all');
            }, function errorCallback(response) {
                alert('oooops :((');
            });*/
        }
}]);