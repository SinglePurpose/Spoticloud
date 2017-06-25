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