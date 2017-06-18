app.controller('MainController', ['$scope', '$http', function($scope, $http) { 
  $http.get("connect.php").then(function (response) {$scope.songs = response.data;});

    $scope.songSelect = function(songPath) {
        $scope.selectedSongPath = songPath;
    }
}]);