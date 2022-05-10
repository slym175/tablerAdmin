if (ngTablerApp) {
    ngTablerApp.directive('ngMediaCenter', ['ngAppConfig', function(ngAppConfig) {
        let _templateUrl;
        return {
            restrict: 'E',
            templateUrl: function(scope, elem, attr) {
                return ngAppConfig.pathAssets+'/tabler/angularjs/directives/ngMediaCenterDirective.html';
            }
        };
    }]);
}
