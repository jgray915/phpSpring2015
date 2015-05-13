<?php

/**
 * Description of EmailModel
 *
 * @author User
 */

namespace App\models\services;


class EmailModel extends BaseModel {
    
    private $emailid;
    private $email;
    private $emailtypeid;
    private $emailtype;
    private $emailtypeactive;
    private $logged;
    private $lastupdated;
    private $active;
    
    function getEmailid() {
        return $this->emailid;
    }

    function getEmail() {
        return $this->email;
    }

    function getActive() {
        return $this->active;
    }

    function setEmailid($emailid) {
        $this->emailid = $emailid;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setActive($active) {
        $this->active = $active;
    }

    function setEmailTypeId($x) {
        $this->emailtypeid = $x;
    }

    function getEmailTypeId() {
        return $this->emailtypeid;
    }
    
    
    
    
    function setEmailType($x) {
        $this->emailtype = $x;
    }

    function getEmailType() {
        return $this->emailtype;
    }
    
    function setEmailTypeActive($x) {
        $this->emailtypeactive = $x;
    }

    function getEmailTypeActive() {
        return $this->emailtypeactive;
    }
    
    function setLogged($x) {
        $this->logged = $x;
    }

    function getLogged() {
        return $this->logged;
    }
    
    function setLastUpdated($x) {
        $this->lastupdated = $x;
    }

    function getLastUpdated() {
        return $this->lastupdated;
    }
}
