<?php

/**
 * The IndexController, included on the index page
 * 
 * @author Jacob Gray
 */
class IndexController
{
    public $util;
    public $db;
    /**
     * Initialize applcation in constructor.
     *
     */
    function __construct()
    {
        
        include_once("./controllers/Util.php");
        
        include_once("./models/BudgetDAO.php");
        include_once("./models/CategoryDAO.php");
        include_once("./models/DB.php");
        include_once("./models/ImportDAO.php");
        include_once("./models/UserDAO.php");
        
        $dbConfig = array(
            "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PersonalFinanceManager',
            "DB_USER"=>'root',
            "DB_PASSWORD"=>''
        );
        
        $this->util = new Util();
        $this->db = new DB($dbConfig);
    }

    /**
     * Runs the application, switches view based on $_GET["view"]
     *
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
                case "managecategories":
                    include_once("./views/managecategories.php");
                    break;
                case "budget";
                    include_once("./views/budget.php");
                    break;
                case "categorize";
                    include_once("./views/categorize.php");
                    break;
                case "import";
                    include_once("./views/import.php");
                    break;
                case "login";
                    include_once("./views/login.php");
                    break;
                case "logout";
                    session_destroy();
                    $this->util->redirect("?view=login");
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