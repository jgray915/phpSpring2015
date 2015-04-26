<?php
namespace week2\jgray;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmailModel
 *
 * @author 001337436
 */
class EmailModel implements IModel{
    //put your code here
    private $emailId;
    private $email;
    private $emailTypeId;
    private $logged;
    private $lastUpdated;
    private $active;
    
    function getEmailId() {
        return $this->emailId;
    }
    function setEmailId($emailId) {
        $this->emailId = $emailId;
    }
    function getEmail() {
        return $this->email;
    }
    function setEmail($email) {
        $this->email = $email;
    }
    function getEmailTypeId() {
        return $this->emailTypeId;
    }
    function setEmailTypeId($emailTypeId) {
        $this->emailTypeId = $emailTypeId;
    }
    function getLogged() {
        return $this->logged;
    }
    function setLogged($logged) {
        $this->logged = $logged;
    }
    function getLastUpdated() {
        return $this->lastUpdated;
    }
    function setLastUpdated($lastUpdated) {
        $this->lastUpdated = $lastUpdated;
    }
    function getActive() {
        return $this->active;
    }
    function setActive($active) {
        $this->active = $active;
    }
    
         /*
    * When a class has to implement an interface those functions must be created in the class.
    */
    public function reset() {
        $this->setEmailId('');
        $this->setEmail('');
        $this->setEmailTypeId('');
        $this->setLogged('');
        $this->setLastUpdated('');
        $this->setActive('');
        return $this;
    }
    
    public function map(array $values) {
        if ( array_key_exists('emailid', $values) ) {
            $this->setEmailId($values['emailid']);
        }
        if ( array_key_exists('email', $values) ) {
            $this->setEmail($values['email']);
        }
        if ( array_key_exists('emailtypeid', $values) ) {
            $this->setEmailTypeId($values['emailtypeid']);
        }
        if ( array_key_exists('logged', $values) ) {
            $this->setLogged($values['logged']);
        }
        if ( array_key_exists('lastupdated', $values) ) {
            $this->setLastUpdated($values['lastupdated']);
        }
        if ( array_key_exists('active', $values) ) {
            $this->setActive($values['active']);
        }
        return $this;
    }
    
}