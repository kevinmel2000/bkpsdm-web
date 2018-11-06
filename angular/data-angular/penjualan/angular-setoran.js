  module.controller('form-data', function($scope, $sce,$http,$timeout) {
    $scope.GetPesan = function($id) {
      $scope.loadingisi = 'Meumuat Data.....' ;
      $http.get(base_url()+'Pegawai/penjualan/isi_outbox/'+$id).success(function(data){
         $scope.datainbox = data;
         $scope.loadingisi = '' ;
      });
    }
     $scope.show = function() {
        $http.get(base_url()+'Pegawai/penjualan/viewSetoran').success(function(data){
          $scope.list = data.json;
          $scope.totalsetoran = data.total;
          $scope.currentPage = 1; //current page
          $scope.entryLimit = 10; //max no of items to display in a page
          $scope.filteredItems = $scope.list.length; //Initially for no filter  
          $scope.totalItems = $scope.list.length;
      });
        $scope.setPage = function(pageNo) {
            $scope.currentPage = pageNo;
        };
        $scope.filter = function() {
            $timeout(function() { 
                $scope.filteredItems = $scope.filtered.length;
            }, 10);
        };
        $scope.sort_by = function(predicate) {
            $scope.predicate = predicate;
            $scope.reverse = !$scope.reverse;
        };
      }
      $scope.show();

     $scope.KirimSMS = function() {
      $http({
        method  : 'POST',
        url     : base_url()+'Pegawai/penjualan/kirim_sms',
        data    : $scope.my, //forms user object
        headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
       }).success(function(result){
          $.gritter.add({
               title: 'Informasi',
               text: result.status,
               class_name: 'gritter-info gritter-center' 
            });
          $('#modal_mail').modal('hide');
       });
    }

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