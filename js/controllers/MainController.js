app.controller('MainController', ['$scope', function($scope, $http) { 
  $http.get("connect.php").then(function (response) {$scope.songs = response.data.records;});
  
  /*$scope.songs = [{
    title: "Strike",
    artist: "KOAN Sound",
    genre: "Electronic",
    length: 123,
    year: 2015
  },
  {
    title: "Sentient",
    artist: "KOAN Sound",
    genre: "Electronic",
    length: 123,
    year: 2015
  },
  {
    title: "Forgotten Myths",
    artist: "KOAN Sound",
    genre: "Electronic",
    length: 123,
    year: 2015
  },
  {
    title: "View From Above",
    artist: "KOAN Sound",
    genre: "Electronic",
    length: 123,
    year: 2015
  }];*/
}]);