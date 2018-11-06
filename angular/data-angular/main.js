function base_url() {
    

    var url = "http://192.168.0.109:8080/bom/";  // entire url including querystring - also: window.location.href;
    return url ;

}

module = angular.module('app', ['ngSanitize','ui.bootstrap','ngRoute']);

module.filter('startFrom', function() {
        return function(input, start) {
            if(input) {
                start = +start; //parse to int
                return input.slice(start);
            }
            return [];
        }
      });