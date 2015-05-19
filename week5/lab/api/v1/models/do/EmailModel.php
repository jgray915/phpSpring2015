<?php

/**
 * Description of EmailModel
 *
 * @author GFORTI
 */

namespace API\models\services;


class EmailModel extends BaseModel {
    
    private $emailid;
    private $email;
    private $emailTypeid;
    private $emailType;
    private $emailTypeactive;
    private $logged;
    private $lastupdated;
    private $active;
    
    function getEmailid() {
        return $this->emailid;
    }

    function getEmail() {
        return $this->email;
    }

    function getEmailTypeid() {
        return $this->emailTypeid;
    }
    
     function getEmailType() {
        return $this->emailType;
    }

    function getEmailTypeactive() {
        return $this->emailTypeactive;
    }

    function getLogged() {
        return $this->logged;
    }

    function getLastupdated() {
        return $this->lastupdated;
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

    function setEmailTypeid($emailTypeid) {
        $this->emailTypeid = $emailTypeid;
    }

    function setEmailType($emailType) {
        $this->emailType = $emailType;
    }

    function setEmailTypeactive($emailTypeactive) {
        $this->emailTypeactive = $emailTypeactive;
    }
    
    function setLogged($logged) {
        $this->logged = $logged;
    }

    function setLastupdated($lastupdated) {
        $this->lastupdated = $lastupdated;
    }

    function setActive($active) {
        $this->active = $active;
    }
    
}
