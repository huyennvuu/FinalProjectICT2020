<?php
    header('Access-Control-Allow-Origin: http://localhost:5000');
    $conn = new mysqli("http://192.168.64.2","root","","user_account");
    if($conn->connect_error){
        die("Connection Failed".$conn->connect_error);

    }
    $result = array('error' => false);
    $action = '';
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }

    if($action == 'read'){
        $sql = $conn->query("SELECT * FROM users");
        $user = array();
        while($row = $sql->fetch_assoc()){
            array_push($user, $row);
        }
        $result['user'] = $user;
    }

    if($action == 'create'){
        $name=$_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $md5pass = md5($password);
        $shapass = sha1($md5pass);
        $crypt = crypt($shapass);
        $sql = $conn->query("INSERT INTO users (name, email ,password)
                            VALUES('$name','$email','$crypt')");
        if($sql){
            $result['message']= "Please login with your newly created account with the email '$email'";
        }
        else {
            $result['error'] = true;
            $result['message']= "Existed email address";
        }
    } 

    if($action == 'update'){
        $id=$_POST['id'] ?? '';
        $name=$_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $sql = $conn->query("UPDATE users SET name='$name',email='$email',password='$password' WHERE id='$id'");
        if($sql){
            $result['message']= "User updated succesfully";
        }
        else {
            $result['error'] = true;
            $result['message']= "User update failed";
        }
    } 

    if($action == 'delete'){
        $id=$_POST['id'] ?? '';
        $sql = $conn->query("DELETE FROM users WHERE id='$id'");
        if($sql){
            $result['message']= "User deleted succesfully";
        }
        else {
            $result['error'] = true;
            $result['message']= "User deleted failed";
        }
    } 
    if( $action == 'login'){
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $md5pass = md5($password);
        $shapass = sha1($md5pass);
        $crypt = crypt($shapass,ng);
        $result['message'] = $email + ' ' + $crypt; 
        // $sql = $conn->query("SELECT * FROM users WHERE email ='$email' ");
        // $user = array();
        // while($row = $sql->fetch_assoc()){
        //     array_push($user, $row);
        // }
        // $result['user'] = $user; 
    }
    echo json_encode($result)
?>