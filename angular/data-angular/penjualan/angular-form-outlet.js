      module.directive('select2', function($timeout) {
        var linker = function(scope, element, attr) {
          

            $timeout(function() {
              element.select2();
             }, 0, false);
          };
          return {
           restrict: 'A',
           link: linker
          };
      }); 

      module.directive('showErrors', function($timeout) {
      return {
        restrict: 'A',
        require: '^form',
        link: function (scope, el, attrs, formCtrl) {
          // find the text box element, which has the 'name' attribute
          var inputEl   = el[0].querySelector("[name]");
          // convert the native text box element to an angular element
          var inputNgEl = angular.element(inputEl);
          // get the name on the text box
          var inputName = inputNgEl.attr('name');
          
          // only apply the has-error class after the user leaves the text box
          var blurred = false;
          inputNgEl.bind('blur', function() {
            blurred = true;
            el.toggleClass('has-error', formCtrl[inputName].$invalid);
          });
          
          scope.$watch(function() {
            return formCtrl[inputName].$invalid
          }, function(invalid) {
            // we only want to toggle the has-error class after the blur
            // event or if the control becomes valid
            if (!blurred && invalid) { return }
            el.toggleClass('has-error', invalid);
          });
          
          scope.$on('show-errors-check-validity', function() {
            el.toggleClass('has-error', formCtrl[inputName].$invalid);
          });
          
          scope.$on('show-errors-reset', function() {
            $timeout(function() {
              el.removeClass('has-error');
            }, 0, false);
          });
        }
      }
    });


     
       
      module.controller('form-data', function($scope,$http,$ngBootbox,$timeout) {
        $scope.action           = "save";
        $scope.actionButtonText = "Simpan Data";
        $scope.my = {};
        $scope.save = function() {
         $scope.$broadcast('show-errors-check-validity');
            if($scope.myForm.$valid) {
                $ngBootbox.confirm("Yakin Simpan Data ?").then(function() {
                $scope.loading = true; 
                $scope.actionButtonText = "Loading..";
                $scope.enable = "false";
                $http({
                  method  : 'POST',
                  url     : base_url()+'Pegawai/penjualan/save_setting_outlet',
                  data    : $scope.my, //forms user object
                  headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
               }).success(function(result){
                 //$scope.message = result.status
                 $.gritter.add({
                    title: 'Informasi',
                    text: result.status,
                    class_name: 'gritter-info gritter-center' 
                 });
                 $scope.reset();
                 $scope.loading = false;
                 $scope.show();
              });
              $timeout(function(){
                  $scope.enable = "true";
                  $scope.actionButtonText = "Simpan Data";
              }, 2000);   
            },
            function(){});
         }
        };
  
      $scope.reset = function() {
        $scope.$broadcast('show-errors-reset');
        $scope.my.id_outlet = '';
        $scope.my.id_spv = '';
        $scope.my.id_operator = '';
        $scope.my.id   = ''; 
      }

      $scope.show = function() {
        $http.get(base_url()+'Pegawai/penjualan/list_setting_outlet').success(function(data){
          $scope.list = data;
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
      $scope.counter = 0 ;
      $scope.show();

      $scope.edit = function(id_edit="") {
         $scope.reset();
        $http.get(base_url()+'Pegawai/penjualan/edit_setting_outlet/'+id_edit).success(function(data){
            $scope.my.id_outlet     = data.id_outlet;
            $scope.my.id_spv        = data.id_spv;
            $scope.my.id_operator   = data.id_operator;
            $scope.my.id            = data.id; 
        }).success(function(result){
            $('html, body').animate({
                scrollTop: $("#form").offset().top
            }, 1000);
        });
      }

      $scope.hapus = function(id_delete) {
        $ngBootbox.confirm("Yakin Hapus Data ?").then(function() {
           $http.get(base_url()+'Pegawai/penjualan/hapus_setting_outlet/'+id_delete).success(function(data){}).success(function(result){
            $.gritter.add({
               title: 'Informasi',
               text: result.status,
               class_name: 'gritter-danger gritter-center' 
            });
            $scope.reset();
            $scope.loading = false;
            $scope.show();
          });   
        },
        function(){});
      };

      $scope.GetOutlet = function(){
          $scope.outletList = [] ;
          $http.get(base_url()+'Pegawai/penjualan/getOutlet').success(function(data){
            $scope.outletList = data ;
          });
      }
      $scope.GetSpv = function(){
          $scope.spvList = [] ;
          $http.get(base_url()+'Pegawai/penjualan/getSpv').success(function(data){
            $scope.spvList = data ;
          });
      }
      $scope.GetOperator = function(){
          $scope.spvList = [] ;
          $http.get(base_url()+'Pegawai/penjualan/getOperator').success(function(data){
            $scope.operatorList = data ;
          });
      }
        $scope.GetOutlet();
        $scope.GetSpv();
        $scope.GetOperator();
});