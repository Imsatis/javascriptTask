<?php

//TESTING FILE FOR SELECT OPTION ONCHANGE

$check = 'Jhon';

echo "i am '$check'";


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
    
    <select id="" onchange="my(this.value)">
        <option value=1>chk</option>
        <option value=2>chk1</option>
        <option value=3>chk2</option>
    </select>


    <button id='chk' onclick='test()'>click</button>
    <script>

        //chk.addEventListener('click',test);
    function my(value) {
        console.log(value);
    }
    function test() {
        console.log(chk);
    }
    </script>
</body>
</html>