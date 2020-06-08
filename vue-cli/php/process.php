<?php
    header('Access-Control-Allow-Origin: http://localhost:5000');
    $conn = new mysqli("localhost","root","","usthoms");
    if($conn->connect_error){
        die("Connection Failed".$conn->connect_error);

    }
    $result = array('error' => false);
    $action = '';
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }

    if($action == 'read'){
        $sql = $conn->query("SELECT * FROM User");
        $user = array();
        while($row = $sql->fetch_assoc()){
            array_push($user, $row);
        }
        $result['user'] = $user;
    }

    if($action == 'create'){
        $name=$_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'] ;
        $type = $_POST['type'] ;
        $md5pass = md5($password);
        $shapass = sha1($md5pass);
        $crypt = crypt($shapass, 'ng');
        $sql = $conn->query("INSERT INTO User (user_name, email ,password,type)
                            VALUES('$name','$email','$crypt','$type')");
        if($sql){
            $result['message']= "Please login with your newly created account with the email $email";
        }
        else {
            $result['error'] = true;
            $result['message']= "Existed email address";
        }
    } 

    if($action == 'update'){
        $id=$_POST['id'] ?? '';
        $name=$_POST['user_name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $sql = $conn->query("UPDATE User SET name='$name',email='$email',password='$password' WHERE id='$id'");
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
        $crypt = crypt($shapass, 'ng');
        $sql = "SELECT * FROM User WHERE email ='$email' and password = '$crypt' ";
        $query = mysqli_query($conn,$sql);
		$num_rows = mysqli_num_rows($query);
        if ($num_rows==0) {
            $result['message']= "no existed";
        }else{
            $result['message']= "found it";
            } 
    }
    echo json_encode($result)
?>