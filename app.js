var reportsApp = angular.module('reportsApp', []);


reportsApp.controller('reportsController', function ($scope, $http) {
    $scope.allReports;

    $scope.getReports = function () {

        $http({


            method: 'GET',
            url: '/rest.php'

        }).then(function (response) {
            $scope.allReports = response.data;

        }, function (response) {

            // on error
            console.log(response.data, response.status);
        });
    };

    $scope.addReport = function () {

        $http({

            method: 'POST',
            url: '/rest.php',
            data: {
                host: $scope.newHost,
                code: $scope.newCode,
                message: $scope.newMessage,
                operation: 1
            }
        }).then(function (response) {

            var myForm = angular.element(document.querySelector("#addForm"))[0].style.display = "none";
            $scope.getReports();
        }, function (responce) {
            console.log(response.data, response.status)
        })

    };

    $scope.deleteReport = function (id) {
        $http({

            method: 'POST',
            url: '/rest.php',
            data: {
                id: id,
                operation: 3
            }
        }).then(function (response) {
                $scope.getReports();

            }, function (response) {
                console.log(response.data, response.status)
            }
        );

    };

    $scope.openFormUpdate = function (data) {
        var myForm = angular.element(document.querySelector("#updateForm"));
        myForm[0].style.display = "inline";
        $scope.idInput = data.id,
            $scope.hostInput = data.host;
        $scope.codeInput = data.code;
        $scope.messageInput = data.message;
        location.href = '#top';

        };

    $scope.openFormAdd = function (data) {
        var myForm = angular.element(document.querySelector("#addForm"));
        myForm[0].style.display = "inline";
    };

    $scope.updateReport = function () {

        $http({

            method: 'POST',
            url: '/rest.php',
            data: {
                id: $scope.idInput,
                host: $scope.hostInput,
                code: $scope.codeInput,
                message: $scope.messageInput,
                operation: 2
            }
        }).then(function (response) {

            var myForm = angular.element(document.querySelector("#updateForm"))[0].style.display = "none";
            $scope.getReports();
        }, function (responce) {
            console.log(response.data, response.status)
        })


    };

    $scope.getReports();
});