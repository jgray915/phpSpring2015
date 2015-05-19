<?php

/**
 * Description of PhotoTypeModel
 *
 * @author User
 */

namespace API\models\services;


class EmailTypeModel extends BaseModel {
    
    private $emailTypeid;
    private $emailType;
    private $active;
    
    function getEmailTypeid() {
        return $this->emailTypeid;
    }

    function getEmailType() {
        return $this->emailType;
    }

    function getActive() {
        return $this->active;
    }

    function setEmailTypeid($emailTypeid) {
        $this->emailTypeid = $emailTypeid;
    }

    function setEmailType($emailType) {
        $this->emailType = $emailType;
    }

    function setActive($active) {
        $this->active = $active;
    }


}
