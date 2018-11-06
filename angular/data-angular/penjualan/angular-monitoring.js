  module.controller('form-data', function($scope, $sce,$http,$timeout) {
    $scope.antri = function() {
     $http.get(base_url()+'Supervisor/Transaksi/antri').success(function(data){
     $scope.myVal = data;
    });
    $timeout(function(){
           $scope.antri();
        },2000)
     }

    $scope.cuci = function() {
     $http.get(base_url()+'Supervisor/Transaksi/dicuci').success(function(data){
     $scope.myVal2 = data;
    });
    $timeout(function(){
           $scope.cuci();
        },2000)
     }

    $scope.kering = function() {
     $http.get(base_url()+'Supervisor/Transaksi/kering').success(function(data){
     $scope.myVal3 = data;
    });
    $timeout(function(){
           $scope.kering();
        },2000)
    }

    $scope.bayar = function() {
     $http.get(base_url()+'Supervisor/Transaksi/bayar').success(function(data){
     $scope.myVal4 = data;
    });
    $timeout(function(){
           $scope.bayar();
        },2000)
    }

    $scope.selesai = function() {
     $http.get(base_url()+'Supervisor/Transaksi/selesai').success(function(data){
     $scope.myVal5 = data;
    });
    $timeout(function(){
           $scope.selesai();
        },2000)
     }
     

     $scope.antri();
     $scope.cuci();
     $scope.kering();
     $scope.bayar();
     $scope.selesai();

    $scope.statusantri = function(id) {
    var cStatusAntri  = $('#statusantri'+id).val();
    var cIdTransaksi  = $('#id_transaksi'+id).val();
    var cKodeLayanan  = $('#kode_layanan'+id).val();
    $scope.my = {};
      $http({
        method: 'POST',
        url     : base_url()+'Supervisor/Transaksi_Act/save_antri',
        data    : $.param({statusantri: cStatusAntri,id_transaksi:cIdTransaksi,kode_layanan:cKodeLayanan}),
        headers : {'Content-Type': 'application/x-www-form-urlencoded'}
      }).success(function (data) {
        $.gritter.add({
          title: 'Informasi',
          text: "Status Berhasil Diubah",
          class_name: 'gritter-info gritter-center' 
        });
      });
    $timeout(function(){
           $scope.antri();
        },2000)
    }

    $scope.statuscuci = function(id) {
    var cStatusCuci  = $('#statuscuci'+id).val();
    var cIdTransaksi  = $('#id_transaksicuci'+id).val();
    var cKodeLayanan  = $('#kode_layanancuci'+id).val();
    $scope.my = {};
      $http({
        method: 'POST',
        url     : base_url()+'Supervisor/Transaksi_Act/save_cuci',
        data    : $.param({statuscuci: cStatusCuci,id_transaksi:cIdTransaksi,kode_layanan:cKodeLayanan}),
        headers : {'Content-Type': 'application/x-www-form-urlencoded'}
      }).success(function (data) {
        $.gritter.add({
          title: 'Informasi',
          text: "Status Berhasil Diubah",
          class_name: 'gritter-info gritter-center' 
        });
      });
    $timeout(function(){
           $scope.cuci();
        },2000)
    }

    $scope.statusbayar = function(id) {
    var cStatusBayar  = $('#statusbayar'+id).val();
    var cIdTransaksi  = $('#id_transaksibayar'+id).val();
    var cKodeLayanan  = $('#kode_layananbayar'+id).val();
    $scope.my = {};
      $http({
        method: 'POST',
        url     : base_url()+'Supervisor/Transaksi_Act/save_bayar',
        data    : $.param({statusbayar: cStatusBayar,id_transaksi:cIdTransaksi,kode_layanan:cKodeLayanan}),
        headers : {'Content-Type': 'application/x-www-form-urlencoded'}
      }).success(function (data) {
        $.gritter.add({
          title: 'Informasi',
          text: "Status Berhasil Diubah",
          class_name: 'gritter-info gritter-center' 
        });
      });
    $timeout(function(){
           $scope.bayar();
        },2000)
    }

    $scope.statuskering = function(id) {
    var cStatusKering  = $('#statuskering'+id).val();
    var cIdTransaksi  = $('#id_transaksikering'+id).val();
    var cKodeLayanan  = $('#kode_layanankering'+id).val();
    $scope.my = {};
      $http({
        method: 'POST',
        url     : base_url()+'Supervisor/Transaksi_Act/save_kering',
        data    : $.param({statuskering: cStatusKering,id_transaksi:cIdTransaksi,kode_layanan:cKodeLayanan}),
        headers : {'Content-Type': 'application/x-www-form-urlencoded'}
      }).success(function (data) {
        $.gritter.add({
          title: 'Informasi',
          text: "Status Berhasil Diubah",
          class_name: 'gritter-info gritter-center' 
        });
      });
    $timeout(function(){
           $scope.kering();
        },2000)
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