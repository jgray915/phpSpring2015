<?php

/**
 * Description of EmailController
 *
 * @author GFORTI
 */
namespace APP\controller;

use App\models\interfaces\IController;
use App\models\interfaces\IService;

class EmailController extends BaseController implements IController  {
       
    public function __construct( IService $EmailService ) {                
        $this->service = $EmailService;     
        
    }


    public function execute(IService $scope) {
                
        $this->data['model'] = $this->service->getNewEmailModel();
        $this->data['model']->reset();
        $viewPage = 'email';
        
        
        if ( $scope->util->isPostRequest() ) {
            
            if ( $scope->util->getAction() == 'create' ) {
                
                $this->data['model']->map($scope->util->getPostValues());
                $this->data["errors"] = $this->service->validate($this->data['model']);
                $this->data["saved"] = $this->service->create($this->data['model']);
            }
            
            if ( $scope->util->getAction() == 'update'  ) {
                $this->data['model']->map($scope->util->getPostValues());
                $this->data["errors"] = $this->service->validate($this->data['model']);
                $this->data["updated"] = $this->service->update($this->data['model']);
                 $viewPage .= 'edit';
            }
            
            if ( $scope->util->getAction() == 'edit' ) {
                $viewPage .= 'edit';
                $this->data['model'] = $this->service->read($scope->util->getPostParam('emailid'));
                  
            }
            
            if ( $scope->util->getAction() == 'delete' ) {                
                $this->data["deleted"] = $this->service->delete($scope->util->getPostParam('emailid'));
            }
                       
        }
        
        
       
        $this->data['Emails'] = $this->service->getAllRows();        
        $this->data['emailTypes'] = $this->service->getAllEmailTypes();
        
        $scope->view = $this->data;
        return $this->view($viewPage,$scope);
    }
    
    
}
