clientApp.filter("trust", ['$sce', function($sce) {
  return function(htmlCode){
    return $sce.trustAsHtml(htmlCode);
  }
}]);

clientApp.controller("appHome", function ($scope, $http, $location) {
	
	$scope.path = 'http://localhost/proposal_request/admin/test/getlist';

	$http({
                method: 'POST',
                url: $scope.path,
                headers: {'Content-Type': 'application/json'},
                /*data: JSON.stringify({
                    txtupdtPassword: $scope.password,
                    txtupdtcnfPassword: $scope.cnfpassword,
                    hiddenToken: $scope.hiddenToken,
                    roleid: $scope.roleid
                })*/
            }).success(function (data) {
				//console.log(data);
				//alert('ss');
				//$scope.users = data; //success data
			});
});

clientApp.controller("clientLogin", function ($scope, $http, $location) {
	
	console.log($location);
	$scope.errorMsgShow = false;
	
	$scope.path = SERVER_REQUEST_URL_BASE_PATH_CLIENT+'/clientLogin/checkLogin';
	
	$scope.submitClientLoginForm = function (isValid)
    {
		if(isValid) {
			
			$http({
                method: 'POST',
                url: $scope.path,
                headers: {'Content-Type': 'application/json'},
                data: JSON.stringify({
                    txtEmail: $scope.txtEmail,
                    txtPassword: $scope.txtPassword,
                })
            }).success(function (data) {
				
				if(data.status === 0) {
                    $scope.errorMsgShow = true;
                    $scope.errorMsg = data.msg;
                }else{
					$location.path("/client/dashboard");					
				}
				//console.log(data);
				//alert('ss');
				//$scope.users = data; //success data
			});
		}
	
	}
});

clientApp.controller("clientRequestProposal", function ($scope, $http, $location) {
	
	$scope.errorMsgShow = false;
	
	$scope.path = SERVER_REQUEST_URL_BASE_PATH_CLIENT +'clientRequestProposal/addRequestProposal';
	
	$scope.submitRequestProposalForm = function (isValid)
    {
		
		if(isValid) {
			
			var formData = new FormData();

			formData.append("projectname", $scope.projectname);
			formData.append("projectidea", $scope.projectidea);
			formData.append("help", $scope.help);

			if ($scope.files != undefined) {
				for (var i = 0; i < $scope.files.length; i++) {
					formData.append("file" + i, $scope.files[i]);
				}
			}
			
			$http.post($scope.path, formData, {
				transformRequest: angular.identity,
				headers: {'Content-Type': undefined, 'Process-Data': false}
			}).success(function (data) {
				
				if(data.status === 0) {
				}
				else {
				}
			});
		}
	
	}
});

var values = [];

clientApp.directive('ngFileModel', ['$parse', function ($parse) {
        return {
            restrict: 'A',
            link: function (scope, element, attrs) {

                var model = $parse(attrs.ngFileModel);
                var isMultiple = attrs.multiple;
                var modelSetter = model.assign;

                element.bind('change', function (event) {
                    
                    var totalFileSize = 0.00;
                    var fileSize = 0.00;
                    
                    if (element[0].files.length <= TOTAL_NO_FILE_UPLOAD) {
						
                        angular.forEach(element[0].files, function (item, key) {
							
                            var file = item; //event.target.files[0];
                            var extn = file.name.split(".").pop().toLowerCase();

                            totalFileSize += file.size;
                            fileSize = (totalFileSize / (1024 * 1024)).toFixed(2); // file in MB
                            
                            var validFileData = false;
							
                            scope.FileMessage = '';

                            var arrValidateFile = ALLOW_FILE_TYPE;

                            // file type validation
                            if ($.inArray(extn, arrValidateFile) === -1) {
                                validFileData = true;
                                scope.FileMessage = 'Please upload only pdf, xls, xlsx, doc, docx file.';
                            }
                                                        
                            // file size validation
                            if (fileSize >= MAX_UPLOAD_FILE_SIZE) {
                                validFileData = true;
                                scope.FileMessage = 'Please upload correct File size.';
                            }

                            if (validFileData) {
                                scope.files = '';
                                element.val(null);
                            } else {
                                values.push(item);
                            }
                        });
                    }
                    else {
                        var validFileData = true;
                        scope.FileMessage = 'Max file limit is 5.';
                        if (validFileData) {
                            scope.files = '';
                            element.val(null);
                        }
                    }

                    scope.$apply(function () {
                        if (isMultiple) {
                            console.log(values);
                            modelSetter(scope, values);
                        } else {
                            modelSetter(scope, values[0]);
                        }
                    });

                });
            }
        };
}]);