<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Personal Finance Manager</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
    <script src='http://code.jquery.com/jquery-2.1.4.js'></script>
</head>
<body>
<div id="wrapper">

<div id="header">
    <h1>Personal Finance Manager</h1>
    <?php
        // start session, change greeting
        session_start();
        session_regenerate_id(TRUE);
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            echo "Hello, ".$_SESSION["username"].". ".'<a href="./?view=logout">Logout</a>';
        }
        else{
            echo '<a href="./?view=login">Login</a>';
        }
    ?>
</div><!--header-->

<div id="main">
    <?php
        // invoke controller
        include_once("controllers/IndexController.php");
        $controller = new IndexController();
        $controller->invoke();
    ?>
</div><!--main-->

<div id="footer">
    <ul>
        <?php
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            echo '<li><a href="?view=managecategories">Manage Categories</a></li>
            <li><a href="?view=budget">Manage Budget</a></li>
            <li><a href="?view=categorize">Categorize Transactions</a></li>
            <li><a href="?view=import">Import</a></li>
            <li><a href="?view=monthly">Monthly Report</a></li>';
        }
        else{
            echo '<li><a href="?view=signup">Signup</a></li>';
        }
        ?>
    </ul>
    <p>&copy;2015 Jacob Gray</p>
</div><!--footer-->

</div><!--wrapper-->
</body>
</html>