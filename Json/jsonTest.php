<?php

$conn = new mysqli('localhost','root','','userlogin');



if($conn->connect_error){
    echo "connection Failed";
}else {
    //echo "connection";
}


if(isset($_REQUEST['submit'])) {

    $jsonData = json_encode(array (
        'name'=>$_REQUEST['name'],
        'username'=>$_REQUEST['username'],
        'password'=>$_REQUEST['password'],
        'email'=>$_REQUEST['email']
    ));
    echo "<pre>";
    print_r($jsonData);
    

    $query = "INSERT INTO 'json' ('id','jsonData') values (null,'$jsonData')";
    $test = "INSERT INTO validJson(json) VALUES ('$jsonData');";

    echo $query;

    $result = $conn->query($test);

}

if(isset($_REQUEST['search'])) {
    $search = $_REQUEST['search'];

    $query = "SELECT * FROM validjson where JSON_VALUE(json,'$.name') = 'Jhon'";
    $conn->query($query);//ALTER TABLE validjson add test varchar(50) AS id
    //select JSON_VALUE(json,'$.name') from validjson
    //SELECT * FROM validjson where 'Jhon' = JSON_VALUE(json,'$.name')
    // /ALTER TABLE validjson DROP COLUMN test
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Json Data Interchange</h1>

    <form action="" method="post">
    <label for="name">Name</label>
    <input type='text' name='name' required>
    <label for="username">Username</label>
    <input type="text" name='username' required>
    <label for="password">Password</label>
    <input type="text" name='password' required>
    <label for="email">Email</label>
    <input type="text" name='email'>
    <input type="submit" name='submit'>

    </form>
    <div id='id1'>


    <form action="" method='post'>
    Search:<input type="text" name='search'>
    <input type="submit" name=''>   
    </form>
    </div>
</body>
</html>

