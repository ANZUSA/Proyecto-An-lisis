<?php

require_once 'model/services/UserService.php';

class UserController {
    
    private $UserService = NULL;
    
    public function __construct() {
        $this->UserService = new UserService();
    }
    
    public function redirect($location) {
        header('Location: '.$location);
    }
    
    public function handleRequest() {
        $op = isset($_GET['op'])?$_GET['op']:NULL;
        try {
            if ( !$op || $op == 'list' ) {
                $this->listUser();
            } elseif ( $op == 'new' ) {
                $this->saveUser();
            } elseif ( $op == 'delete' ) {
                $this->deleteUser();
            } elseif ( $op == 'show' ) {
                $this->showUser();
            } else {
                $this->showError("Page not found", "Page for operation ".$op." was not found!");
            }
        } catch ( Exception $e ) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }
    
    public function listUser() {
        $orderby = isset($_GET['orderby'])?$_GET['orderby']:NULL;
        $users = $this->UserService->getAllUser($orderby);
        include 'view/webpages/Users.php';
    }
    
    public function saveUser() {
       
        $title = 'Add new User';
        $identificationCard = '';
        $name = '';
        $surnames = '';
        $phone = '';
        $email = '';
        $address = '';
        $idRole =''; 
       
        $errors = array();
        
        if ( isset($_POST['form-submitted']) ) {
            $identificationCard =  isset($_POST['identificationCard']) ?   $_POST['identificationCard']  :NULL;
            $name       = isset($_POST['firstname']) ?   $_POST['firstname']  :NULL;
            $surnames       = isset($_POST['surnames']) ?   $_POST['surnames']  :NULL;
            $phone      = isset($_POST['phone'])?   $_POST['phone'] :NULL;
            $email      = isset($_POST['email'])?   $_POST['email'] :NULL;
            $address    = isset($_POST['address'])? $_POST['address']:NULL;
            $idRole    = isset($_POST['idRole'])? $_POST['idRole']:NULL;

            
            try {
                $this->UserService->createNewUser($identificationCard,$name, $surnames ,$phone, $email, $address , $idRole);
                $this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
        
        include 'view/forms/user-form.php';
    }
    
    public function deleteUser() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) {
            throw new Exception('Internal error.');
        }
        
        $this->UserService->deleteUser($id);
        
        $this->redirect('index.php');
    }
    
    public function showUser() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) {
            throw new Exception('Internal error.');
        }
        $contact = $this->UserService->getUser($id);
        
        include 'view/webpages/user.php';
    }
    
    public function showError($title, $message) {
        include 'view/webpages/error.php';
    }
    
}
?>
