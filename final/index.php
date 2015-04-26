<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Personal Finance Manager</title>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body>
<div id="wrapper">

<div id="header">
    <h1>Personal Finance Manager</h1>
</div><!--header-->

<div id="main">
    <?php
        include_once("controller/Controller.php");
        $controller = new Controller();
        $controller->invoke();
    ?>
</div><!--main-->

<div id="footer">
    <table><tr><td>
    <ul>
    <li><a href="./">Home</a></li>
    <li><a href="./?view=Documentation">Documentation</a></li>
    </ul>
    </td><td>
    <ul>
    <li><a href="./?view=MonthlyReport">Monthly Report</a></li>
    <li><a href="./?view=YearlyReport">Yearly Report</a></li>
    </ul>
    </td><td>
    <ul>
    <li><a href="./?view=MonthlyTransactions">Monthly Transactions</a></li>
    <li><a href="./?view=YearlyTransactions">Yearly Transactions</a></li>
    </ul>
    </td></tr></table>
</div><!--footer-->

</div><!--wrapper-->
</body>
</html>