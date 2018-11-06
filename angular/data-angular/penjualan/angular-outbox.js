  module.controller('form-data', function($scope, $sce,$http,$timeout) {
    $scope.GetPesan = function($id) {
      $scope.loadingisi = 'Meumuat Data.....' ;
      $http.get(base_url()+'Pegawai/penjualan/isi_outbox/'+$id).success(function(data){
         $scope.datainbox = data;
         $scope.loadingisi = '' ;
      });
    }
    $scope.show = function() {
     $http.get(base_url()+'Pegawai/penjualan/v_outbox').success(function(data){
     $scope.myVal = data;
    });
    $timeout(function(){
           $scope.show();
        },7000)
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