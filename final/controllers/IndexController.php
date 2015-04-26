<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * The controller invokes models to perform operations and sends data back to a
 * view based on $_GET["view"]
 * 
 * @author Jacob Gray
 */
class Controller
{
    public $db;

    function __construct()
    {
        include_once("./models/Database.php");
        $this->db = new CheckingAccount();
    }

    function invoke()
    {
        if(!isset($_GET["view"]))
        {
            include_once("./views/Home.php");
        }
        else
        {
            switch($_GET["view"])
            {
                case "MonthlyTransactions":
                    $monthInt = date('m');
                    $monthTxt = date('F');
                    $lastMonthTxt = date("F",strtotime("-1 month"));
                    echo "<h2>Transaction Report for the Month of ".$lastMonthTxt."</h2>";
                    $data = $this->db->getCheckingTransactionsByMonth($monthInt-1);
                    include_once("./view/TransactionReport.php");
                    break;
                case "YearlyTransactions";
                    $year = date('Y');
                    $data = $this->db->getCheckingTransactionsByYear($year);
                    echo "<h2>Transaction Report for ".$year."</h2>";
                    include_once("./views/TransactionReport.php");
                    break;
                case "Documentation";
                    $files = scandir("./docs");
                    include_once("./views/Documentation.php");
                    break;
                case "Import";
                    include_once("./views/Import.php");
                    break;
                default:
                    include_once("./views/Home.php");
                    break;
            }
        }
    }
}

?>