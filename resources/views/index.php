<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Angular-Laravel Authentication</title>
    <?php
    //echo Html::style('css/bootstrap.css');
    echo "<link media=\"all\" type=\"text/css\" rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css\">";
        echo "<link media=\"all\" type=\"text/css\" rel=\"stylesheet\" href=\"./css/bootstrap.css\">";
    echo "<link media=\"all\" type=\"text/css\" rel=\"stylesheet\" href=\"./css/style.css\">";
    echo "<script src='scripts/modernizr.custom.js'></script>";
    echo "<base href=\"/\">"

    ?>
</head>
<body ng-app="authApp">

<div class="container">
    <div ui-view></div>
</div>

</body>

<?php

echo Html::script(asset('scripts/lib/angular.js'));
echo Html::script(asset('scripts/lib/angular-ui-router.js'));
echo Html::script(asset('scripts/lib/satellizer.js'));
echo Html::script(asset('scripts/lib/angular-resource.js'));
    
echo Html::script(asset('scripts/toucheffects.js'));

// Angularjs scripts
echo Html::script(asset('scripts/app.js'));
echo Html::script(asset('scripts/controllers/authController.js'));
echo Html::script(asset('scripts/controllers/userController.js'));
echo Html::script(asset('scripts/controllers/homeController.js'));
echo Html::script(asset('scripts/controllers/navController.js'));
echo Html::script(asset('scripts/controllers/researchController.js'));
echo Html::script(asset('scripts/controllers/singleController.js'));
echo Html::script(asset('scripts/services/services.js'));
    
?>
</html>