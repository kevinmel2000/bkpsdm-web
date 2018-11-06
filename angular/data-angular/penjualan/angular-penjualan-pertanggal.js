  module.directive('select2', function($timeout) {
        var linker = function(scope, element, attr) {
          scope.$watch('outletList', function() {
             $timeout(function() {
               element.trigger('select2:updated');
              }, 0, false);
           }, true);


            $timeout(function() {
              element.select2();
             }, 0, false);
          };
          return {
           restrict: 'A',
           link: linker
          };
      }); 
  module.controller('form-data', function($scope, $sce,$http,$timeout) {
      $scope.GetOutlet = function(){
          $scope.outletList = [] ;
          $http.get(base_url()+'Pegawai/penjualan/getOutlet/').success(function(data){
            $scope.outletList = data;
          });
        }
       $scope.GetOutlet();
       $scope.show = function() {
        var dataObj = {
            id_outlet : $scope.id_outlet,
            tgl_awal  : $scope.tgl_awal,
            tgl_akhir : $scope.tgl_akhir
        };  
        $http({
          method  : 'POST',
          url     : base_url()+'Pegawai/penjualan/viewPenjualanPerTanggal',
          data    : dataObj, //forms user object
          headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
         }).success(function(data){
            $scope.data_penjualan = data ; 
         });
      }
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