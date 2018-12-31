<?php

$conn = new mysqli('localhost','root','','userlogin');



if($conn->connect_error){
    echo "connection Failed";
}else {
    //echo "connection";
}


if(isset($_REQUEST['submit'])) {

    // $jsonData = json_encode(array (
    //     'name'=>$_REQUEST['name'],
    //     'username'=>$_REQUEST['username'],
    //     'password'=>$_REQUEST['password'],
    //     'email'=>$_REQUEST['email']
    // ));

    
    // echo "<pre>";
    // print_r($jsonData);


    $jsonData = json_encode(array (
            'name'=>array($_REQUEST['name'],$_REQUEST['name1'],$_REQUEST['name2'],$_REQUEST['name3']),
            'username'=>$_REQUEST['username'],
            'password'=>$_REQUEST['password']
            // 'email'=>$_REQUEST['email']
        ));
    
    //       echo "<pre>";
    // print_r($jsonData);
    

    //$query = "INSERT INTO 'json' ('id','jsonData') values (null,'$jsonData')";
    $test = "INSERT INTO validJson(json) VALUES ('$jsonData');";

    //echo $query;

    $result = $conn->query($test);

}

if(isset($_REQUEST['search'])) {
    
    $search = $_REQUEST['search'];


    $query = "SELECT JSON_SEARCH(json,'one','$search') FROM validjson ";
    $result = $conn->query($query);
    echo "<pre>";
    //print_r($result);

    if ($result->num_rows>0) {//select json_contains(json,'["Jhon","Mary","Jane","Mark"]','$.password') from validjson


        while($row = $result->fetch_assoc()) {
            //print_r($row);echo "<br>";
            foreach($row as $value) {
               // echo $value;
                if($value!="") {
                    //echo $value;
                    
                    
                     $searchQuery = "SELECT JSON_VALUE(json,$value) FROM validjson where JSON_VALUE(json,$value) = '$search'";//SELECT * FROM validjson JSON_VALUE(json,$value) = '$search'
                     //echo $searchQuery."<br>";
                     $data = $conn->query($searchQuery);
                    print_r($data);
                     if($data->num_rows>0){
                         
                        
                        while($row1 = $data->fetch_assoc()) {
                            print_r($row1);
                            foreach($row1 as $item) {
                                echo $item.'<br>';
                            }
                        }
                     }
                }
            }
        }
        

    }

    
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
    <label for="name1">Name1</label>
    <input type='text' name='name1' required>
    <label for="name2">Name2</label>
    <input type='text' name='name2' required>
    <label for="name3">Name3</label>
    <input type='text' name='name3' required>
    <label for="username">Username</label>
    <input type="text" name='username' required>
    <label for="password">Password</label>
    <input type="text" name='password' required>
    <!-- <label for="email">Email</label>
    <input type="text" name='email'> -->
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

<!-- if($result->num_rows>0) {

while($row = $result->fetch_assoc()) {
//echo "<pre>";
//print_r(json_decode($row['json'])->name);

// foreach($row as $value) {
//     print_r($value."<br>");
// }
foreach($row as $value) {
if($value!=""){
    //print_r($value);
    $search = "SELECT JSON_VALUE(json,'$.name[2]') FROM validjson)";
   
    $result = $conn->query($search); print_r($result);
    // while($row = $result->fetch_assoc()){
    //     print_r($row);
    //     echo "<br>";

    // }

    
}
}
}   

select json_contains(json,json_extract(json,'$.name'),'$.name') from validjson

SELECT json_extract(json,'$.name[0]') FROM `validjson`
SELECT json_search(json,'all','jhon') as test FROM `validjson` where json_extract(json,test)

} -->

