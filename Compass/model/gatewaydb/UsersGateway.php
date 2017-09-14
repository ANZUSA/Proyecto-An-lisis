<?php
class UsersGateway {
    
    public function selectAll($order) {
        if ( !isset($order) ) {
            $order = "firstname";
        }
        $dbOrder =  mysql_real_escape_string($order);
        $dbres = mysql_query("SELECT * FROM User ORDER BY $dbOrder ASC");
        
        $users = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $users[] = $obj;
        }
        
        return $users;
    }
    
    public function selectById($id) {
        $dbId = mysql_real_escape_string($id);
        
        $dbres = mysql_query("SELECT * FROM User WHERE id=$dbId");
        
        return mysql_fetch_object($dbres);
		
    }
    
    public function insert( $identificationCard,$firstname, $surnames ,$phone, $email, $address , $idRole ) {
        $dbidentificationCard = ($identificationCard != NULL)?"'".mysql_real_escape_string($identificationCard)."'":'NULL'; 
        $dbfirstname = ($firstname != NULL)?"'".mysql_real_escape_string($firstname)."'":'NULL';
        $dbsurnames = ($surnames != NULL)?"'".mysql_real_escape_string($surnames)."'":'NULL';
        $dbPhone = ($phone != NULL)?"'".mysql_real_escape_string($phone)."'":'NULL';
        $dbEmail = ($email != NULL)?"'".mysql_real_escape_string($email)."'":'NULL';
        $dbAddress = ($address != NULL)?"'".mysql_real_escape_string($address)."'":'NULL';
        $idRole = ($idRole != NULL)?"'".mysql_real_escape_string($idRole)."'":'NULL';

        
        mysql_query("INSERT INTO User (identificationCard,firstname,surnames, phone, email, address ,idRole) VALUES ($dbidentificationCard,$dbfirstname, $dbsurnames,$dbPhone, $dbEmail, $dbAddress,$idRole)");
        return mysql_insert_id();
    }
    
    public function delete($id) {
        $dbId = mysql_real_escape_string($id);
        mysql_query("DELETE FROM User WHERE id=$dbId");
    }
    
}

?>
