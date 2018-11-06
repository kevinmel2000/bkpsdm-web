  module.controller('form-data', function($scope, $sce,$http,$timeout) {
    $scope.GetPesan = function($id) {
      $scope.loadingisi = 'Memuat Data.....' ;
      $http.get(base_url()+'Pegawai/penjualan/isi_inbox/'+$id).success(function(data){
         $scope.datainbox = data;
         $scope.loadingisi = '' ;
      });
    }
    $scope.show = function() {
     $http.get(base_url()+'Pegawai/penjualan/inbox').success(function(data){
     $scope.myVal = data;
     $scope.selectedSongPath = base_url()+'assets/sound.mp3'; 
        document.getElementById("audio-tag").load();
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