<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmailService
 *
 * @author User
 */

namespace App\models\services;

use App\models\interfaces\IDAO;
use App\models\interfaces\IService;
use App\models\interfaces\IModel;

class EmailService implements IService {
    
     protected $DAO;
     protected $emailTypeService;
     protected $validator;
     protected $model;
             
     function getEmailTypeService() {
        return $this->emailTypeService;
    }

    function setEmailTypeService(IService $service) {
        $this->emailTypeService = $service;
    }
     
     function getValidator() {
         return $this->validator;
     }

     function setValidator($validator) {
         $this->validator = $validator;
     }

     function getModel() {
         return $this->model;
     }

     function setModel(IModel $model) {
         $this->model = $model;
     }
     
     
     function getDAO() {
         return $this->DAO;
     }

     function setDAO(IDAO $DAO) {
         $this->DAO = $DAO;
     }

    public function __construct( IDAO $emailDAO, IService $emailTypeService, IService $validator, IModel $model  ) {
        $this->setDAO($emailDAO);
        $this->setEmailTypeService($emailTypeService);
        $this->setValidator($validator);
        $this->setModel($model);
    }
    
    public function getAllEmailTypes() {       
        return $this->getEmailTypeService()->getAllRows();   
        
    }
    
    public function getAllRows($limit = "", $offset = "") {
        return $this->getDAO()->getAllRows($limit, $offset);
    }
    
    public function idExist($id) {
        return $this->getDAO()->idExisit($id);
    }
    
    public function read($id) {
        return $this->getDAO()->read($id);
    }
    
    public function delete($id) {
        return $this->getDAO()->delete($id);
    }
    
    public function create(IModel $model) {
        
        if ( count($this->validate($model)) === 0 ) {
            return $this->getDAO()->create($model);
        }
        return false;
    }
    
    public function update(IModel $model) {
        
        if ( count($this->validate($model)) === 0 ) {
            return $this->getDAO()->update($model);
        }
        return false;
    }
    
    public function validate( IModel $model ) {
        $errors = array();
        
        if ( !$this->getEmailTypeService()->idExist($model->getEmailtypeid()) ) {
            $errors[] = 'Email Type is invalid';
        }
        
        if ( !$this->getValidator()->emailIsValid($model->getEmail()) ) {
            $errors[] = 'Email is invalid';
        }
               
        if ( !$this->getValidator()->activeIsValid($model->getActive()) ) {
            $errors[] = 'Email active is invalid';
        }
        
        return $errors;
    }
    
    
    public function getNewEmailModel() {
        return clone $this->getModel();
    }
    
    
}
