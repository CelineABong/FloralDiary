var myApp = angular.module("app",['ngRoute'])
.config(
    function($routeProvider){
        $routeProvider.when(
            "/signUp",
            {
                templateUrl: "views/signUp.html",
                controller: "userCtrl"
            }
        ).when(
            "/home",
            {
                templateUrl: "views/home.html",
                controller: "imgCtrl"
            }
        ).when(
            "/userd",
            {
                templateUrl: "views/userdata.html",
                controller: "userCtrl"
            }
        ).when(
            "/upload",
            {
                templateUrl: "views/uploadImg.html",
                controller: "imgCtrl"
            }
        ).when(
            "/detail/:imgId",
            {
                templateUrl: "views/detail.html",
                controller: "userCtrl"
            }
        ).otherwise({redirectTo: "/home"})
    }   
)
.controller("userCtrl", function($scope, $location, $window){
    $scope.goSignUp = function(){
        $location.path("/signUp");
    };
    
    $scope.logout = function(){
        $window.localStorage.clear();
        $window.location.reload();
    };
    
    $scope.userInit = function(){
        if(JSON.parse($window.localStorage.getItem("userInfo"))){
            $scope.status = "login";
            $scope.userid = JSON.parse($window.localStorage.getItem("userInfo")).userid;
            $scope.username = JSON.parse($window.localStorage.getItem("userInfo")).username;
            console.log("Testing");
        }else{
            $scope.status = "notLogin";
        }
    };
    
    $scope.login = function(u,p){
        $.ajax({
                url:"controller/user.php",
                type:"post",
                dataType:"json",
                data: {
                    method:"login",
                    username: u,
                    password: p
                },
                success:function(resp){
                    console.log(resp.userInfo[0]);
                    var userInfo = {
                        username: resp.userInfo[0].username,
                        userid: resp.userInfo[0].id
                    };
                    $window.localStorage.setItem("userInfo",JSON.stringify(userInfo));
                    $scope.$apply(
                        function(){
                            $scope.userInit();
                        }
                    );
                }
        });
    };
    
    $scope.signup = function(su, sp, sa, sph, se){
        $.ajax({
                url:"controller/user.php",
                type:"post",
                dataType:"html",
                data: {
                    method:"insert",
                    username: su,
                    password: sp,
                    address: sa,
                    phone: sph,
                    email: se,
                },
                success:function(resp){
                    $scope.$apply(
                        function(){
                            $scope.login(su, sp, sa, sph, se);
                            $location.path('#/home')
                        }
                    );
                }
            });
    };
    
    $scope.updateUser =function(nn, np, na, nph, ne){
        $.ajax({
                url:"controller/user.php",
                type:"post",
                dataType:"html",
                data: {
                    method:"reset",
                    id: JSON.parse($window.localStorage.getItem("userInfo")).userid,
                    name: nn,                            
                    newPass: np,
                    address: na,
                    phone: nph,
                    email: ne,
                },
                success:function(resp){
                    console.log(resp);
                    alert("Updated!");
                }
            });
    };
})
.controller("imgCtrl",function($scope, $routeParams, $window){
    $scope.upImg = function(v,col,i){
        console.log(v,col,i);
        $.ajax({
                url: "controller/image.php",
                type: "POST",
                data: {
                    method: "updateImage",
                    id: i,
                    col: col,
                    value: v
                    
                },
                dataType: "json",
                success: function(res){
                    console.log(res);
                    if(res == 1){
                        $window.location.reload();
                    }
                }
            });
    };
    
     $scope.getAll = function(){
         $.ajax({
                url: "controller/image.php",
                type: "POST",
                data: {method: "getAll"},
                dataType: "json",
                success: function(res){
                    console.log(res);
                    $scope.$apply(
                        function(){
                            $scope.images = res;
                        }
                    );
                }
            });
     };
    
    $scope.getImage = function(){
        console.log($routeParams);
        $.ajax({
                url: "controller/image.php",
                type: "POST",
                data: {method: "getImage",
                       id: $routeParams.imgId
                      },
                dataType: "json",
                success: function(res){
                    console.log(res);
                    $scope.imgD = res[0];
                },
                error: function(){
                    console.log("hta");
                }
            });
    };
    
    $scope.delImg = function(i){
        console.log(i);
        $.ajax({
                url: "controller/image.php",
                type: "POST",
                data: {
                    method: "del",
                    id: i
                      },
                dataType: "json",
                success: function(res){
                    console.log(res);
                    if(res == 1){
                    $window.location.reload();
                    }
                },
                error: function(){
                    console.log("hta");
                }
            });
    };
    
    $scope.getUserImg = function(){
        $.ajax({
                url: "controller/image.php",
                type: "POST",
                data: {method: "getUserImage",
                       id: JSON.parse($window.localStorage.getItem("userInfo")).userid
                      },
                dataType: "json",
                success: function(res){
                    console.log(res);
                    $scope.$apply(
                        function(){
                            $scope.userImgs = res;
                        }
                    ); 
                },
                error: function(){
                    console.log("hta");
                }
            });
    };
    
    //LIKES
        $scope.clickFunc = function(id){
        $.ajax({
            url:"controller/image.php",
            type:"POST",
            dataType:"html",
            data:{
                method:"like",
                image_id: $routeParams.imgId,                
                user_id: JSON.parse($window.localStorage.getItem("userInfo")).userid
                //user_id: sessionStorage.getItem("userid")
            },
            success:function(resp){
                alert("Liked!");
                location.reload(); 
            }
        });
    };        
})


.controller("commCtrl", function($scope, $routeParams, $window){
    
    $scope.getUserComm = function(){
        $.ajax({
                url: "controller/comment.php",
                type: "POST",
                data: {
                       method: "getUserComm",
                       userid: JSON.parse($window.localStorage.getItem("userInfo")).userid
                      },
                dataType: "json",
                success: function(res){
                    console.log(res);
                    $scope.$apply(
                        function(){
                            $scope.userComms = res;
                        }
                    );
                }
            });
    };
    
    $scope.getImgComm = function(){
        $.ajax({
                url: "controller/comment.php",
                type: "POST",
                data: {
                       method: "getImgComm",
                       imageid: $routeParams.imgId
                      },
                dataType: "json",
                success: function(res){
                    console.log(res);
                    $scope.$apply(
                        function(){
                            $scope.comms = res;
                        }
                    );
                }
            });
    };
    
    $scope.postComm = function(c,i){
        $.ajax({
                url: "controller/comment.php",
                type: "POST",
                data: {
                       method: "insert",
                       imageid: $routeParams.imgId,
                       userid: i,
                       text: c
                      },
                dataType: "json",
                success: function(res){
                    console.log(res);
                    $scope.$apply(
                        function(){
                            $window.location.reload();
                        }
                    );
                }
            });
    };
    
    $scope.delCom = function(i,c){
        $.ajax({
                url: "controller/comment.php",
                type: "POST",
                data: {
                       method: "deleteComment",
                       imageid: i,
                       userid: JSON.parse($window.localStorage.getItem("userInfo")).userid,
                       text: c
                      },
                dataType: "json",
                success: function(res){
                    console.log(res);
                    if(res>=1){
                        $window.location.reload();
                    }
                }
            });
    };
})
