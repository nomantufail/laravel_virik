<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html ng-app="inventory_system">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{html_title}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="stylesheets/bootstrap.min.css">
    <!-- Font Awesome -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    &lt;!&ndash; Ionicons &ndash;&gt;
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- Theme style -->
    <link rel="stylesheet" href="stylesheets/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="stylesheets/skins/skin-blue.min.css">


    <script src="javascripts/jQuery/jQuery-2.1.4.min.js"></script>

    <script src="javascripts/firebase.js"></script>
    <script src="javascripts/angular/angular.min.js"></script>
    <script src="javascripts/angularfire.min.js"></script>
    <script src="javascripts/angular-route/angular-route.min.js"></script>
    <script src="javascripts/ui-router/angular-ui-router.min.js"></script>
    <script src="ng-app/models/Model.js"></script>
    <script src="ng-app/app.js"></script>
    <script src="ng-app/services/AuthService.js"></script>
    <script src="ng-app/services/RouteHelper.js"></script>
    <script src="ng-app/services/ResourceLoader.js"></script>
    <script src="ng-app/controllers/ParentController.js"></script>
    <script src="ng-app/controllers/LoginController.js"></script>
        <script src="ng-app/controllers/HeaderController.js"></script>
            <script src="ng-app/controllers/ContentContainerController.js"></script>
                <!--        Custoemrs Controllers       -->
                <script src="ng-app/controllers/ContentHeaderController.js"></script>
                <script src="ng-app/controllers/ShowCustomersController.js"></script>
                <script src="ng-app/controllers/AddCustomersController.js"></script>

                <!--        Users Controllers       -->
                <script src="ng-app/controllers/UserController.js"></script>

                <!--        Home Controllers       -->
                <script src="ng-app/controllers/HomeController.js"></script>
    <script src="ng-app/routes.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="" ng-controller="ParentController">

<ui-view></ui-view>

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<!-- Bootstrap 3.3.5 -->
<script src="javascripts/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="javascripts/app.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
