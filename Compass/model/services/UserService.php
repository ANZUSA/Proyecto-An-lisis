<?php

require_once 'model/gatewaydb/UsersGateway.php';
require_once 'model/gatewaydb/ValidationException.php';


class UserService {
    
    private $UsersGateway    = NULL;
    
    private function openDb() {
        if (!mysql_connect("163.178.107.130", "adm", "saucr.092")) {
            throw new Exception("Connection to the database server failed!");
        }
        if (!mysql_select_db("Compass")) {
            throw new Exception("No Compass database found on database server.");
        }
    }
    
    private function closeDb() {
        mysql_close();
    }
  
    public function __construct() {
        $this->UsersGateway = new UsersGateway();
    }
    
    public function getAllUser($order) {
        try {
            $this->openDb();
            $res = $this->UsersGateway->selectAll($order);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
    public function getUser($id) {
        try {
            $this->openDb();
            $res = $this->UsersGateway->selectById($id);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
        return $this->UsersGateway->find($id);
    }
    
    private function validateContactParams( $identificationCard,$firstname, $surnames , $phone, $email, $address , $idRole ) {
        $errors = array();
        if ( !isset($firstname) || empty($firstname) ) {
            $errors[] = 'firstname is required';
        }
        if ( empty($errors) ) {
            return;
        }
        throw new ValidationException($errors);
    }
    
    public function createNewUser( $identificationCard,$firstname, $surnames , $phone, $email, $address , $idRole ) {
        try {
            $this->openDb();
          //  $this->validateContactParams($identificationCard,$firstname, $surnames , $phone, $email, $address , $idRole);
            $res = $this->UsersGateway->insert($identificationCard,$firstname, $surnames , $phone, $email, $address , $idRole);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
    public function deleteUser( $id ) {
        try {
            $this->openDb();
            $res = $this->UsersGateway->delete($id);
            $this->closeDb();
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
    
}

?>
