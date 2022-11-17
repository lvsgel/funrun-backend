<?php 
//FOR ADMIN Function
//get all admin 
function getAllAdmin($db) {

    $sql = 'Select * FROM admin '; 
    $stmt = $db->prepare ($sql); 
    $stmt ->execute(); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
} 

//get admin by id 
function getAdmin($db, $adminId) {

    $sql = 'Select a.adminName, a.password, a.email FROM admin a  ';
    $sql .= 'Where a.adminid = :id';
    $stmt = $db->prepare ($sql);
    $id = (int) $adminId;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 

}

//add new admin 
function createAdmin($db, $form_data) { 
    
    $sql = 'Insert into admin (adminName, password, email)'; 
    $sql .= 'values (:adminName, :password, :email)';  
    $stmt = $db->prepare ($sql); 
    $stmt->bindParam(':adminName', $form_data['adminName']); 
    $stmt->bindParam(':password', $form_data['password']);   
    $stmt->bindParam(':email', ($form_data['email']));
    $stmt->execute(); 
    return $db->lastInsertID();
}


//delete admin by id 
function deleteAdmin($db,$adminId) { 

    $sql = ' Delete from admin where adminId = :id';
    $stmt = $db->prepare($sql);  
    $id = (int)$adminId; 
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    $stmt->execute(); 
} 

//update admin by id 
function updateAdmin($db,$form_dat,$adminId) { 

    $sql = 'UPDATE admin SET adminName = :adminName , password = :password ,  email = :email'; 
    $sql .=' WHERE adminId = :id'; 
    $stmt = $db->prepare ($sql); 
    $id = (int)$adminId; 
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    $stmt->bindParam(':adminName', $form_dat['adminName']); 
    $stmt->bindParam(':password', $form_dat['password']); 
    $stmt->bindParam(':email',($form_dat['email']));
    $stmt->execute(); 
}

//Runner
//get all runner 
function getAllRunners($db) {

    
    $sql = 'Select * FROM runners '; 
    $stmt = $db->prepare ($sql); 
    $stmt ->execute(); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
} 

//get runner by id 
function getRunner($db, $runnerId) {

    $sql = 'Select o.runnerName, o.age, o.phone, o.address FROM runners o  ';
    $sql .= 'Where o.id = :id';
    $stmt = $db->prepare ($sql);
    $id = (int) $runnerId;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 

}

//add new runner
function createRunner($db, $form_data) { 
  
    $sql = 'Insert into runners ( runnerName, age, phone, address)'; 
    $sql .= 'values (:runnerName, :age, :phone, :address)';  
    $stmt = $db->prepare ($sql);   
    $stmt->bindParam(':runnerName', ($form_data['runnerName']));
    $stmt->bindParam(':age', ($form_data['age']));
    $stmt->bindParam(':phone', ($form_data['phone']));
    $stmt->bindParam(':address', ($form_data['address']));
    $stmt->execute(); 
    return $db->lastInsertID();
}


//delete runner by id 
function deleteRunner($db,$runnerId) { 

    $sql = ' Delete from runners where id = :id';
    $stmt = $db->prepare($sql);  
    $id = (int)$runnerId; 
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    $stmt->execute(); 
} 

//update runner by id 
function updateRunner($db,$form_data,$runnerId) { 


    
        $sql = 'UPDATE runners SET runnerName = :runnerName , age = :age , phone = :phone , address = :address'; 
        $sql .=' WHERE id = :id'; 
        $stmt = $db->prepare ($sql); 
        $id = (int)$runnerId;  
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);  
        $stmt->bindParam(':runnerName', ($form_data['runnerName']));
        $stmt->bindParam(':age', ($form_data['age']));
        $stmt->bindParam(':phone', ($form_data['phone']));
        $stmt->bindParam(':address', ($form_data['address']));
        $stmt->execute(); 
    }
    
