var app = angular.module("spoticloud", ["ngRoute"]);
app.config(function ($routeProvider) {
	$routeProvider
		//.when("/", {
		//	templateUrl: "index.html"
		//})
		.when("/songUpload", {
			templateUrl: "songUpload.html"
		});
});

app.filter('secondsToDateTime', [function () {
	return function (seconds) {
		return new Date(1970, 0, 1).setSeconds(seconds);
	};
}])