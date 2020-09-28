<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?=Core\Router::getTitle()?></title>

        <link href="public/css/app.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;400&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php require_once __DIR__.Core\Router::getView(); ?>

        <script src="public/js/app.js"></script>
    </body>
</html>