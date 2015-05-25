<?php

/**
 * The IndexController includes a view based on $_GET["view"]
 * 
 * @author Jacob Gray
 */
class IndexController
{
    public $db;

    /**
     * ??
     *
     * @param ??
     *
     * @return ??
     */
    function __construct()
    {

    }

    /**
     * ??
     *
     * @param ??
     *
     * @return ??
     */
    function invoke()
    {
        if(!isset($_GET["view"]))
        {
            include_once("./views/login.php");
        }
        else
        {
            switch($_GET["view"])
            {
                case "addcategory":
                    include_once("./view/addcategory.php");
                    break;
                case "budget";
                    include_once("./views/budget.php");
                    break;
                case "import";
                    include_once("./views/import.php");
                    break;
                case "login";
                    include_once("./views/login.php");
                    break;
                case "monthly";
                    include_once("./views/monthly.php");
                    break;
                case "signup";
                    include_once("./views/signup.php");
                    break;
                default:
                    include_once("./views/login.php");
                    break;
            }
        }
    }
}

?>