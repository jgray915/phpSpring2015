<?php

/**
 * Description of EmailModel
 *
 * @author User
 */

namespace API\models\services;


class EmailModel extends BaseModel {
    
    private $emailid;
    private $email;
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


}
