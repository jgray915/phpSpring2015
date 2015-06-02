<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Util{
    
    /**
     * Whether or not a post request was made
     * @return bool
     */
    function isPostRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }
    
    /**
     * Get session loggedin variable
     * @return bool
     */
    public function isLoggedin() {
        return ( isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true );
    }
    
    /**
     * Set session loggedin variable
     * @param bool $value
     */
    public function setLoggedin($value) {
        $_SESSION['loggedin'] = $value;
    }
    
     /**
     * Redirect to the given page.
     * @param type $page target page
     */
    public function redirect($page) {
        header('Location: ' . $page);
    }
}