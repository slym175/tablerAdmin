if (ngTablerApp) {
    ngTablerApp.controller('ngUserController', [
        '$ngUserService', '$scope', ($ngUserService, $scope) => {
            $scope.controllerData = {
                userList: [],
                user: {}
            }

            let initController = function () {

            }
            initController();
        }
    ])
}
