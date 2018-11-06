  module.controller('form-data', function($scope, $sce,$http,$timeout) {
    
    $scope.show = function() {
     $http.get(base_url()+'Monitoring/master/lists').success(function(data){
     $scope.myVal = data;
    });
    $timeout(function(){
           $scope.show();
        },2000)
     }
     $scope.show();

  })
  .directive('dir', function($compile, $parse) {
    return {
      restrict: 'A',
      link: function(scope, element, attr) {
        scope.$watch(attr.content, function() {
          element.html($parse(attr.content)(scope));
          $compile(element.contents())(scope);
        }, true);
      }
    }
  })