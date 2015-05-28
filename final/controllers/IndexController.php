<?php

/**
 * The IndexController, included on index, includes a view based on $_GET["view"]
 * 
 * @author Jacob Gray
 */
class IndexController
{
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
        include_once("./models/signupDAO.php");
        include_once("./models/DB.php");
        include_once("./controllers/util.php");
        include_once("./models/DB.php");
        $util = new Util();
        
        $dbConfig = array(
            "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PersonalFinanceManager',
            "DB_USER"=>'root',
            "DB_PASSWORD"=>''
        );
                
        if(!isset($_GET["view"]))
        {
            include_once("./views/login.php");
        }
        else
        {
            switch($_GET["view"])
            {
                case "addcategory":
                    include_once("./views/addcategory.php");
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