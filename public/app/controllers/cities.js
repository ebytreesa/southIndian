


        app.controller('citiesController', function($scope, $http, API_URL) {
    //retrieve employees listing from API
    $http.get(API_URL + "cities")
            .then(function(response) {
                $scope.cities = response.data;

                console.log(response);
            });

});
