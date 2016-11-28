<!DOCTYPE html>
<html lang="en" ng-app="catstagramApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Catstagram</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="/app/bower_components/bootstrap/dist/css/bootstrap.css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title m-b-md">
            Catstagram
        </div>
        <div class="row">
            <div ng-view></div>
        </div>
    </div>
</div>
</body>
<!-- Application Dependencies -->
<script type="text/javascript" src="/app/bower_components/angular/angular.js"></script>
<script type="text/javascript" src="/app/bower_components/angular-route/angular-route.js"></script>
<script type="text/javascript" src="/app/bower_components/angular-bootstrap/ui-bootstrap.js"></script>
<script type="text/javascript" src="/app/bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>

<!-- Application Scripts -->
<script type="text/javascript" src="/app/app.module.js"></script>
<script type="text/javascript" src="/app/app.config.js"></script>
<script type="text/javascript" src="/app/home/home.module.js"></script>
<script type="text/javascript" src="/app/home/home.component.js"></script>
<script type="text/javascript" src="/app/kitty-list/kitty-list.module.js"></script>
<script type="text/javascript" src="/app/kitty-list/kitty-list.component.js"></script>

</html>
