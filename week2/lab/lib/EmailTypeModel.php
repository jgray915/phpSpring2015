<?php
namespace week2\jgray;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmailTypeModel
 *
 * @author 001337436
 */
class EmailTypeModel implements IModel{
    //put your code here
    private $emailTypeId;
    private $emailType;
    private $active;
    
    function getEmailTypeId() {
        return $this->emailTypeId;
    }
    function setEmailTypeId($emailTypeId) {
        $this->emailTypeId = $emailTypeId;
    }
    function getEmailType() {
        return $this->emailType;
    }
    function setEmailType($emailType) {
        $this->emailType = $emailType;
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
        $this->setEmailTypeId('');
        $this->setEmailType('');
        $this->setActive('');
        return $this;
    }
    
    public function map(array $values) {
        if ( array_key_exists('emailtypeid', $values) ) {
            $this->setEmailTypeId($values['emailtypeid']);
        }
        if ( array_key_exists('emailtype', $values) ) {
            $this->setEmailType($values['emailtype']);
        }
        if ( array_key_exists('active', $values) ) {
            $this->setActive($values['active']);
        }
        return $this;
    }
    
}
