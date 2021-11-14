<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Minimyst</title>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./views/css/app.css" type="text/css">
    </head>
    <body>
        <div id="app-container">
            <?php 
                include('./config.php');

                $environmentPath = (CURRENT_ENVIRONMENT === 'local') ? LOCAL_PATH : PROD_DOMAIN;
                define('ENVIRONMENT_PATH', $environmentPath);
                
                $currentUrl = $_SERVER['REQUEST_URI'];
                $pagePathArray = explode('/', $currentUrl);
                $currentPage = $pagePathArray[count($pagePathArray) - 1];

                $loggedIn = isset($_COOKIE['minimyst_user_id']);
                if (LOGIN && !$loggedIn){
                    header('Location: ' . ENVIRONMENT_PATH . 'login');
                }

                require_once('./models/queryModel.php');
                require_once('./views/navigation.php');
                require_once('./views/header.php');
                require_once('./routes.php');
            ?>
        </div>
    </body>
</html>
