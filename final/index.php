<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Personal Finance Manager</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
</head>
<body>
<div id="wrapper">

<div id="header">
    <h1>Personal Finance Manager</h1>
    <a href="./?view=login">Login</a>
</div><!--header-->

<div id="main">
    <?php
        include_once("controllers/IndexController.php");
        $controller = new IndexController();
        $controller->invoke();
    ?>
</div><!--main-->

<div id="footer">
    <ul>
        <li><a href="?view=addcategory">Add Category</a></li>
        <li><a href="?view=budget">Budget</a></li>
        <li><a href="?view=import">Import</a></li>
        <li><a href="?view=signup">Signup</a></li>
    </ul>
    <p>&copy;2015 Jacob Gray</p>
</div><!--footer-->

</div><!--wrapper-->
</body>
</html>