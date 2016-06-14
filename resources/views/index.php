<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Angular-Laravel Authentication</title>
    <?php
    //echo Html::style('css/bootstrap.css');
    echo "<link media=\"all\" type=\"text/css\" rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css\">";
    echo "<link media=\"all\" type=\"text/css\" rel=\"stylesheet\" href=\"./css/bootstrap.css\">";
    echo "<link media=\"all\" type=\"text/css\" rel=\"stylesheet\" href=\"./css/angular-clndr.css\">";
    echo "<link media=\"all\" type=\"text/css\" rel=\"stylesheet\" href=\"./css/style.css\">";
    echo "<script src='scripts/lib/modernizr.custom.js'></script>";
    echo "<base href=\"/\">"

    ?>
</head>
<body ng-app="serialWatcherApp">

<div class="container">
    <div ui-view></div>
</div>

</body>

<?php

echo Html::script(asset('scripts/lib/jquery-2.2.4.min.js'));
echo Html::script(asset('scripts/lib/moment.js'));
echo Html::script(asset('scripts/lib/angular.js'));
echo Html::script(asset('scripts/lib/angular-ui-router.js'));
echo Html::script(asset('scripts/lib/satellizer.js'));
echo Html::script(asset('scripts/lib/angular-resource.js'));
echo Html::script(asset('scripts/lib/clndr.js'));
echo Html::script(asset('scripts/lib/angular-clndr.min.js'));
echo Html::script(asset('scripts/lib/spin.min.js'));
echo Html::script(asset('scripts/lib/angular-spinner.min.js'));
echo Html::script(asset('scripts/lib/angular-loading-spinner.js'));
echo Html::script(asset('scripts/lib/ui-bootstrap-tpls-1.3.3.min.js'));

echo Html::script(asset('scripts/lib/toucheffects.js'));

// Angularjs scripts
echo Html::script(asset('scripts/app.js'));
echo Html::script(asset('scripts/controllers/authController.js'));
echo Html::script(asset('scripts/controllers/homeController.js'));
echo Html::script(asset('scripts/controllers/navController.js'));
echo Html::script(asset('scripts/controllers/landingController.js'));
echo Html::script(asset('scripts/controllers/singleController.js'));
echo Html::script(asset('scripts/controllers/profileController.js'));
echo Html::script(asset('scripts/controllers/calendarController.js'));
echo Html::script(asset('scripts/controllers/toWatchController.js'));
echo Html::script(asset('scripts/controllers/signUpController.js'));
echo Html::script(asset('scripts/filters/filters.js'));
echo Html::script(asset('scripts/directives/directives.js'));
echo Html::script(asset('scripts/services/services.js'));


?>
</html>