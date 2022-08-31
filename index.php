<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trang chủ</title>
</head>
    <style>
        a{
            text-decoration: none;
        }

        .table{
            text-align: center;
        }

        td{
            padding: 0 20px;
        }

        .hhhh b{
            color: #FF0000;
        }

        .table3 td{
            padding: 5px 5px;
        }

        .hhhh td{
            
        }

        .error {color: #FF0000;}
    </style>

<body>
    <table class="table">
            <tr>
                <td class="bang_0">
                    <h3><a href='http://localhost/bai_json/index.php'>|   Gốc  |</a></h3>
                </td>

                <td class="bang_1">
                    <h3><a href='http://localhost/bai_json/index.php/sapxep'>|   Sắp xếp tăng dần theo id   |</a></h3>
                </td>

                <td class="bang_2">
                    <h3><a href='http://localhost/bai_json/index.php/year'>|    Sắp xếp giảm dần theo năm   |</a></h3>
                </td>
                <td class="bang_3">
                    <h3><a href='http://localhost/bai_json/index.php/msv'>|     Sắp xếp giảm dần theo mã sinh viên   |</a></h3>
                </td>

                <td class="bang_3">
                    <h3><a href='http://localhost/bai_json/index.php/them_du_lieu'>|     Thêm dữ liệu  |</a></h3>
                </td>

                <td class="bang_3">
                    <h3><a href='http://localhost/bai_json/index.php/sua_du_lieu'>|     Sửa dữ liệu   |</a></h3>
                </td>

                <td class="bang_3">
                    <h3><a href='http://localhost/bai_json/index.php/xoa_du_lieu'>|     Xoá dữ liệu  |</a></h3>
                </td>
            </tr>
    </table>
    <?php                                                                           
        $myFile = fopen("datajson.txt", 'r') or die("File không tồn tại");
        $json = fread($myFile, filesize("datajson.txt"));
        fclose($myFile);    

        $arrayJson = json_decode($json,1);

        // var_dump($arrayJson);

        $nameErr = $emailErr = $genderErr = $websiteErr = $commentErr = $new1Err = $new2Err = $name = $email = $new1 = $new2 = $gender = $comment = $website ="";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["id"])) {
                $nameErr = "Chưa nhập dữ liệu hoặc không phải là số";
            } else {
                $name = test_input($_POST["id"]);
            }
            
            if (empty($_POST["name"])) {
                $emailErr = "Chưa nhập dữ liệu";
            } else {
                $email = test_input($_POST["name"]);
            }
                
            if (empty($_POST["url"])) {
                $websiteErr = "Chưa nhập dữ liệu";
            } else {
                $website = test_input($_POST["url"]);
            }

            if (empty($_POST["mssv"])) {
                $commentErr = "Chưa nhập dữ liệu hoặc không phải là số";
            } else {
                $comment = test_input($_POST["mssv"]);
            }

            if (empty($_POST["img"])) { 
                $new1Err = "";
            } else {
                $new1 = test_input($_POST["img"]);
            }

            if (empty($_POST["web"])) {
                $new2Err = "";
            } else {
                $new2 = test_input($_POST["web"]);
            }

            if (empty($_POST["time"])) {
                $genderErr = "Chưa nhập dữ liệu hoặc không phải là số";
            } else {
                $gender = test_input($_POST["time"]);
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

    ?>

    <table class="table">
        <thead class="ahihi">
            <tr>
            <th scope="col"><h3 style="padding: 0 20px;">id</h3></th>
            <th scope="col"><h3 style="padding: 0 20px;">name</h3></th>
            <th scope="col"><h3 style="padding: 0 20px;">url</h3></th>
            <th scope="col"><h3 style="padding: 0 20px;">mssv</h3></th>
            <th scope="col"><h3 style="padding: 0 20px;">img</h3></th>
            <th scope="col"><h3 style="padding: 0 20px;">web</h3></th>
            <th scope="col"><h3 style="padding: 0 20px;">time</h3></th>
            </tr>
        </theadc>
        <tbody>
            <tr>
            <td scope="row">
                <table>
                <?php
                    if(empty($_SERVER['PATH_INFO']) == 'sapxep'){
                        foreach ($arrayJson as $phantumang => $phantucon) {
                            if(empty($_SERVER['PATH_INFO']) === true){
            
                                echo "<tr><td><h3> <a href='http://localhost/bai_json/index.php/".$phantucon['url']."'> " .$phantucon['id']. " </a></h3></td></tr>";
                            } 
                            else{
                                $phantucon['url']='undefined';
                            }
                        }   
                    }
                    else{
                        if(($_SERVER['PATH_INFO'] == '/sapxep')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['id']);
                            }
                            sort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['id']){
                                                echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['id']. " </a></h3></td></tr>";   
                                            }
                                    }
                                }
                        }
            
                        else if(($_SERVER['PATH_INFO']== '/year')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['time']);
                            }
                            rsort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['time']){
                                                echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['id']. " </a></h3></td></tr>";   
                                            }
                                    }
                                }
                        }
            
                        else if(($_SERVER['PATH_INFO'] == '/msv')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['mssv']);
                            }
                            rsort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['mssv']){
                                            echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['id']. " </a></h3></td></tr>";
                                        }
                                    }
                                }
                        }
                    }      
                ?>
                </table>
            </td>

            <td>
                <table>
                <?php
                    if(empty($_SERVER['PATH_INFO']) == 'sapxep'){
                        foreach ($arrayJson as $phantumang => $phantucon) {
                            if(empty($_SERVER['PATH_INFO']) === true){
            
                                echo "<tr><td><h3> <a href='http://localhost/bai_json/index.php/".$phantucon['url']."'> " .$phantucon['name']. " </a></h3></td></tr>";
                            } 
                            else{
                                $phantucon['url']='undefined';
                            }
                        }   
                    } 
                    else{
                        if(($_SERVER['PATH_INFO'] == '/sapxep')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['id']);
                            }
                            sort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['id']){
                                                echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['name']. " </a></h3></td></tr>";   
                                            }
            
                                    }
                                }
                        }
            
                        else if(($_SERVER['PATH_INFO']== '/year')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['time']);
                            }
                            rsort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['time']){
                                                echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['name']. " </a></h3></td></tr>";   
                                            }
            
                                    }
                                }
                        }
            
                        else if(($_SERVER['PATH_INFO'] == '/msv')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['mssv']);
                            }
                            rsort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['mssv']){
                                            echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['name']. " </a></h3></td></tr>";
                                        }
                                    }
                                }
                        }
                    }      
                ?>
                </table>
            </td>
            <td>
                <table>
                <?php
                    if(empty($_SERVER['PATH_INFO']) == 'sapxep'){
                        foreach ($arrayJson as $phantumang => $phantucon) {
                            if(empty($_SERVER['PATH_INFO']) === true){
            
                                echo "<tr><td><h3> <a href='http://localhost/bai_json/index.php/".$phantucon['url']."'> " .$phantucon['url']. " </a></h3></td></tr>";
                            } 
                            else{
                                $phantucon['url']='undefined';
                            }
                        }   
                    } 
                    else{
                        if(($_SERVER['PATH_INFO'] == '/sapxep')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['id']);
                            }
                            sort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['id']){
                                                echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['url']. " </a></h3></td></tr>";   
                                            }
            
                                    }
                                }
                        }
            
                        else if(($_SERVER['PATH_INFO']== '/year')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['time']);
                            }
                            rsort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['time']){
                                                echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['url']. " </a></h3></td></tr>";   
                                            }
            
                                    }
                                }
                        }
            
                        else if(($_SERVER['PATH_INFO'] == '/msv')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['mssv']);
                            }
                            rsort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['mssv']){
                                            echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['url']. " </a></h3></td></tr>";
                                        }
                                    }
                                }
                        }
                    }      
                ?>
                </table>
            </td>
            <td>
                <table>
                <?php
                    if(empty($_SERVER['PATH_INFO']) == 'sapxep'){
                        foreach ($arrayJson as $phantumang => $phantucon) {
                            if(empty($_SERVER['PATH_INFO']) === true){
            
                                echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'> " .$phantucon['mssv']. " </a></h3></td></tr>";
                            } 
                            else{
                                $phantucon['url']='undefined';
                            }
                        }   
                    } 
                    else{
                        if(($_SERVER['PATH_INFO'] == '/sapxep')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['id']);
                            }
                            sort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['id']){
                                                echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['mssv']. " </a></h3></td></tr>";   
                                            }
            
                                    }
                                }
                        }
            
                        else if(($_SERVER['PATH_INFO']== '/year')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['time']);
                            }
                            rsort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['time']){
                                                echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['mssv']. " </a></h3></td></tr>";   
                                            }
            
                                    }
                                }
                        }
            
                        else if(($_SERVER['PATH_INFO'] == '/msv')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['mssv']);
                            }
                            rsort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['mssv']){
                                            echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['mssv']. " </a></h3></td></tr>";
                                        }
                                    }
                                }
                        }
                    }      
                ?>
                </table>
            </td>
            <td>
                <table>
                <?php
                    if(empty($_SERVER['PATH_INFO']) == 'sapxep'){
                        foreach ($arrayJson as $phantumang => $phantucon) {
                            if(empty($_SERVER['PATH_INFO']) === true){
                                if($phantucon['img']==''){
                                    $phantucon['img']="_";
                                }
                                echo "<tr><td><h3> <a href='http://localhost/bai_json/index.php/".$phantucon['url']."'> " .$phantucon['img']. " </a></h3></td></tr>";
                            } 
                            else{
                                $phantucon['url']='undefined';
                            }
                        }   
                    } 
                    else{
                        if(($_SERVER['PATH_INFO'] == '/sapxep')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['id']);
                            }
                            sort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['id']){
                                            if($phantucon['img']==''){
                                                $phantucon['img']="_";
                                            }
                                            echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['img']. " </a></h3></td></tr>";   
                                        }
            
                                    }
                                }
                        }
            
                        else if(($_SERVER['PATH_INFO']== '/year')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['time']);
                            }
                            rsort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['time']){
                                            if($phantucon['img']==''){
                                                $phantucon['img']="_";
                                            }
                                                echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['img']. " </a></h3></td></tr>";   
                                            }
            
                                    }
                                }
                        }
            
                        else if(($_SERVER['PATH_INFO'] == '/msv')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['mssv']);
                            }
                            rsort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['mssv']){
                                            if($phantucon['img']==''){
                                                $phantucon['img']="_";
                                            }
                                            echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['img']. " </a></h3></td></tr>";
                                        }
                                    }
                                }
                        }
                    }      
                ?>
                </table>
            </td>
            <td>
                <table>
                <?php
                    if(empty($_SERVER['PATH_INFO']) == 'sapxep'){
                        foreach ($arrayJson as $phantumang => $phantucon) {
                            if(empty($_SERVER['PATH_INFO']) === true){
                                if($phantucon['web']==''){
                                    $phantucon['web']="_";
                                }
                                echo "<tr><td><h3> <a href='http://localhost/bai_json/index.php/".$phantucon['url']."'> " .$phantucon['web']. " </a></h3></td></tr>";
                            } 
                            else{
                                $phantucon['url']='undefined';
                            }
                        }   
                    } 
                    else{
                        if(($_SERVER['PATH_INFO'] == '/sapxep')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['id']);
                            }
                            sort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['id']){
                                            if($phantucon['web']==''){
                                                $phantucon['web']="_";
                                            }
                                            else;
                                            echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['web']. " </a></h3></td></tr>";   
                                            }
            
                                    }
                                }
                        }
            
                        else if(($_SERVER['PATH_INFO']== '/year')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['time']);
                            }
                            rsort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['time']){
                                            if($phantucon['web']==''){
                                                $phantucon['web']="_";
                                            }
                                            echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['web']. " </a></h3></td></tr>";   
                                            }
            
                                    }
                                }
                        }
            
                        else if(($_SERVER['PATH_INFO'] == '/msv')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['mssv']);
                            }
                            rsort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['mssv']){
                                            if($phantucon['web']==''){
                                                $phantucon['web']="_";
                                            }
                                            echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['web']. " </a></h3></td></tr>";
                                        }
                                    }
                                }
                        }
                    }      
                ?>
                </table>
            </td>
            <td>
                <table>
                <?php
                    if(empty($_SERVER['PATH_INFO']) == 'sapxep'){
                        foreach ($arrayJson as $phantumang => $phantucon) {
                            if(empty($_SERVER['PATH_INFO']) === true){
            
                                echo "<tr><td><h3> <a href='http://localhost/bai_json/index.php/".$phantucon['url']."'> " .$phantucon['time']. " </a></h3></td></tr>";
                            } 
                            else{
                                $phantucon['url']='undefined';
                            }
                        }   
                    } 
                    else{
                        if(($_SERVER['PATH_INFO'] == '/sapxep')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['id']);
                            }
                            sort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['id']){
                                            echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['time']. " </a></h3></td></tr>";   
                                        }
            
                                    }
                                }
                        }
            
                        else if(($_SERVER['PATH_INFO'] == '/year')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['time']);
                            }
                            rsort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['time']){
                                            echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['time']. " </a></h3></td></tr>";   
                                        }
            
                                    }
                                }
                        }
            
                        else if(($_SERVER['PATH_INFO'] == '/msv')){
                            $a=[];
                            foreach ($arrayJson as $phantumang => $phantucon){
                                array_push($a,$phantucon['mssv']);
                            }
                            rsort($a);
                            $ad = array_unique($a);
                                foreach ($ad as $key => $value){
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        // var_dump($phantucon['id']);
                                        if($value == $phantucon['mssv']){
                                            echo "<tr><td><h3><a href='http://localhost/bai_json/index.php/".$phantucon['url']."'>" .$phantucon['time']. " </a></h3></td></tr>";
                                        }
                                    }
                                }
                        }
                    }      
                ?>
                </table>
            </td>
            </tr>
        </tbody>
    </table>

    <table class="table2">
        <tr>
            <td>
            <?php
                    if(empty($_SERVER['PATH_INFO']) === true){
                        $_SERVER['PATH_INFO']='undefined';
                    } 
                    else{
                        if($_SERVER['PATH_INFO'] != ''){
                            $hostNew=trim($_SERVER['PATH_INFO'],"/");
                            foreach($arrayJson as $phantumang => $phantucon){
                                foreach($phantucon as $key => $inform){
                                    if($inform==$hostNew){
                                        echo "<style>.ahihi{
                                            display: none;
                                        }</style>";
                                        echo "<h1> " .$phantucon['name']. " </h1>";
                                        foreach($phantucon as $key => $inform){
                                            echo "".$key. ":" .$inform. "<br>";
                                        }
                                    }
                                }
                            }
                        }
                    } 
                ?>      
            </td>
        </tr>
    </table>
    
    <table class="table3">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
            <tr>
                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                            echo "id";
                        }
                    ?>
                </td>

                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                            echo "<input type='text' name='id'>";
                        }
                    ?>
                    <span class='error'>
                    <?php
                        
                        if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                            echo "*";
                        }
                        
                    ?>
                    <?php echo $nameErr;?></span>
                </td>
            </tr>

            <tr>
                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                            echo "name";
                        }
                    ?>
                </td>

                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                            echo "<input type='text' name='name'>";
                        }
                    ?>
                    <span class='error'>
                    <?php
                        
                        if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                            echo "*";
                        }
                        
                    ?>
                    <?php echo $emailErr;?></span>
                </td>
            </tr>

            <tr>
                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                            echo "url";
                        }
                    ?>
                </td>

                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                            echo "<input type='text' name='url'>";
                        }
                    ?>
                    <span class='error'>
                    <?php
                        
                        if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                            echo "*";
                        }
                        
                    ?>
                    <?php echo $websiteErr;?></span>
                </td>
            </tr>

            <tr>
                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                            echo "mssv";
                        }
                    ?>
                </td>

                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                            echo "<input type='text' name='mssv'>";
                        }
                    ?>
                    <span class='error'>
                    <?php
                        
                        if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                            echo "*";
                        }
                        
                    ?>
                    <?php echo $commentErr;?></span>
                </td>
            </tr>

            <tr>
                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                            echo "img";
                        }
                    ?>
                </td>

                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                            echo "<input type='text' name='img'>";
                        }
                    ?>
                    <span class='error'>
                    <?php echo $new1Err;?></span>
                </td>
            </tr>

            <tr>
                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                            echo "web";
                        }
                    ?>
                </td>

                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                            echo "<input type='text' name='web'>";
                        }
                    ?>
                    <span class='error'>
                    <?php echo $new2Err;?></span>
                </td>
            </tr>

            <tr>
                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                            echo "time";
                        }
                    ?>
                </td>

                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                            echo "<input type='text' name='time'>";
                        }
                    ?>
                    <span class='error'>
                    <?php
                        
                        if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                            echo "*";
                        }
                        
                    ?>
                    <?php echo $genderErr;?></span>
                </td>
            </tr>  
            
            <tr>
                <?php  
                    if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                        echo "<td><input type='submit' name='submit' value='thêm mới'></td>";
                    }
                ?>
            </tr>
        </form>
    </table>
    
        <?php   
                if (isset($_GET['xoa_theo_id'])){
                    $agent_id = $_GET['xoa_theo_id'];
                    foreach($arrayJson as $key => $value){
                        if($value['id'] == $agent_id){
                            unset($arrayJson[$key]);
                        }
                    }
                    // var_dump($arrayJson);

                    $newJson2 = json_encode($arrayJson);

                    $fp2 = fopen('datajson.txt','w')or die("File không tồn tại");
                    fwrite($fp2, $newJson2);
                    fclose($fp2);
                }
        ?>

        <?php 
            if(($_SERVER['PATH_INFO'] == '/them_du_lieu')){
                echo "<br>";
                    if(empty($comment==$phantucon['mssv'])){
                        do{
                            // $bientam=[];


                                // $maxbt=max($bientam);
                            
                                    $a=[];
                                    foreach ($arrayJson as $phantumang => $phantucon){
                                        array_push($a,$phantucon['id']);
                                    }
                                    sort($a);
                                    $ad = array_unique($a);
                                        foreach ($ad as $key => $value){
                                            foreach ($arrayJson as $phantumang => $phantucon){
                                                // var_dump($phantucon['id']);
                                                if($value == $phantucon['id']){
                                                    $aa=$phantucon['id'];
                                                }
                                            }
                            

                                // if($name==$value['id']){
                                //     $name++;                                                                      
                            // }
                                        }

                                        foreach ($arrayJson as $phantumang => $phantucon){
                                            if($name==$phantucon['id']){
                                                $name = $aa+1;
                                            }
                                        }
                                                  
                                        
                        }
                        while($name==$phantucon['id']);
                            if(is_numeric($name)  && $email !='' && $website !='' && is_numeric($comment) && is_numeric($gender)){
                                $newArray = array(
                                    array(
                                        'id' => "$name",
                                        'name' => "$email",
                                        'url' => "$website",
                                        'mssv' => "$comment",
                                        'img' => "$new1",
                                        'web' => "$new2",
                                        'time' => "$gender",
                                    )
                                );
            
                                $newArrayJson = array_merge($arrayJson, $newArray);
            
                                $newJson = json_encode($newArrayJson);
            
                                var_dump($newJson);
            
                                $fp = fopen('datajson.txt','w')or die("File không tồn tại");
                                fwrite($fp, $newJson);
                                fclose($fp);
                                echo "<br>";
                                echo "Bạn đã thêm thành công !!!";
                            }
                            else{
                                echo "Rất tiếc bạn đã thất bại . Xin mời nhập lại !!!!";
                            }
                    }
                    else{
                        echo "Rất tiếc mã số sinh viên đã tồn tại!!!!";
                    }
                } 
        ?>

    <form method="get" action="?xoa_theo_id=&submit=Xoá+dữ+liệu">
        <table>
            <tr>
                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/xoa_du_lieu')){
                            echo "<h1>XOÁ DỮ LIỆU</h1>";
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/xoa_du_lieu')){
                            echo "<h4>Chọn id cần xoá :</h4>";
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/xoa_du_lieu')){
                            echo "<select name='xoa_theo_id' >";
                            foreach($arrayJson as $phantumang => $phantucon){
                                echo "<option name='" .$phantucon['id']. "' value='" .$phantucon['id']. "'>" .$phantucon['id']. "</option>";
                            }   
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/xoa_du_lieu')){
                            echo    "<input type='submit' name='submit' value='Xoá dữ liệu'>";                            
                        }
                    ?>
                </td>
            </tr>
        </table>   
    </form>
    
    <form method="get" action="?sua_theo_id=&submit=Sửa+dữ+liệu">
        <table>
            <tr>
                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/sua_du_lieu')){
                            echo "<h1>SỬA DỮ LIỆU</h1>";
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/sua_du_lieu')){
                            echo "<h4>Chọn id cần sửa :</h4>";
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/sua_du_lieu')){
                            echo "<select name='sua_theo_id' >";
                            foreach($arrayJson as $phantumang => $phantucon){
                                echo "<option name='" .$phantucon['id']. "' value='" .$phantucon['id']. "'>" .$phantucon['id']. "</option>";
                            }   
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td>
                    <?php
                        if(($_SERVER['PATH_INFO'] == '/sua_du_lieu')){
                            echo    "<input type='submit' name='submit' value='Sửa dữ liệu'>";                            
                        }
                    ?>
                </td>
            </tr>
        </table>
    </form>

            <!-- ----------------------------------------------------------------------------------------- -->

    <form method="get" action="?submit=Đồng+ý">
        <table>
            <tr>
                <td>
                    <table class='hhhh'>
                        <tr>
                            <?php   
                                if (isset($_GET['sua_theo_id'])){
                                    $agent_id = $_GET['sua_theo_id'];
                                    foreach($arrayJson as $key => $value){ 
                                        if($value['id'] == $agent_id){
                                            echo "<td>ID : <input type='text' name='id' value='" .$value['id']. "' readonly><b>*</b></td>";
                                        }
                                    }
                                }
                            ?>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <table class='hhhh'>
                        <tr>
                            <?php   
                                if (isset($_GET['sua_theo_id'])){
                                    $agent_id = $_GET['sua_theo_id'];
                                    foreach($arrayJson as $key => $value){ 
                                        if($value['id'] == $agent_id){
                                            echo "<td>Name : <input type='text' name='name' value='" .$value['name']. "'><b>*</b></td>";
                                        }
                                    }

                                }
                            ?>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <table class='hhhh'>
                        <tr>
                            <?php   
                                if (isset($_GET['sua_theo_id'])){
                                    $agent_id = $_GET['sua_theo_id'];
                                    foreach($arrayJson as $key => $value){ 
                                        if($value['id'] == $agent_id){
                                            echo "<td>Url : <input type='text' name='url' value='" .$value['url']. "'><b>*</b></td>";
                                        }
                                    }

                                }
                            ?>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <table class='hhhh'>
                        <tr>
                            <?php   
                                if (isset($_GET['sua_theo_id'])){
                                    $agent_id = $_GET['sua_theo_id'];
                                    foreach($arrayJson as $key => $value){ 
                                        if($value['id'] == $agent_id){
                                            echo "<td>Mssv : <input type='text' name='mssv' value='" .$value['mssv']. "'><b>*</b></td>";
                                        }
                                    }

                                }
                            ?>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <table class='hhhh'>
                        <tr>
                            <?php   
                                if (isset($_GET['sua_theo_id'])){
                                    $agent_id = $_GET['sua_theo_id'];
                                    foreach($arrayJson as $key => $value){ 
                                        if($value['id'] == $agent_id){
                                            echo "<td>Img   : <input type='text' name='img' value='" .$value['img']. "'></td>";
                                        }
                                    }

                                }
                            ?>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <table class='hhhh'>
                        <tr>
                            <?php   
                                if (isset($_GET['sua_theo_id'])){
                                    $agent_id = $_GET['sua_theo_id'];
                                    foreach($arrayJson as $key => $value){ 
                                        if($value['id'] == $agent_id){
                                            echo "<td>Web  : <input type='text' name='web' value='" .$value['web']. "'></td>";
                                        }
                                    }

                                }
                            ?>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <table class='hhhh'>
                        <tr>
                            <?php   
                                if (isset($_GET['sua_theo_id'])){
                                    $agent_id = $_GET['sua_theo_id'];
                                    foreach($arrayJson as $key => $value){ 
                                        if($value['id'] == $agent_id){
                                            echo "<td>Time : <input type='text' name='time' value='" .$value['time']. "' readonly><b>*</b></td>";
                                        }
                                    }

                                }
                            ?>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <table class='hhhh'>
                        <tr>
                            <td>
                                <?php
                                    if(isset($_GET['sua_theo_id'])){
                                        echo "<input type='submit' name='submit' value='Thay đổi'>";                            
                                    }
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <?php   
                if(isset($_GET['id'])){
                    $sua_theo_id = $_GET['id'];
                    $sua_theo_name = $_GET['name'];
                    $sua_theo_url = $_GET['url'];
                    $sua_theo_mssv = $_GET['mssv'];
                    $sua_theo_img = $_GET['img'];
                    $sua_theo_web = $_GET['web'];
                    $sua_theo_time = $_GET['time'];
                    if($sua_theo_url !=''){
                        if($sua_theo_name !=''){
                            if(is_numeric($sua_theo_mssv)){
                                $newArray = array(
                                    array(
                                        'id' => "$sua_theo_id",
                                        'name' => "$sua_theo_name",
                                        'url' => "$sua_theo_url",
                                        'mssv' => "$sua_theo_mssv",
                                        'img' => "$sua_theo_img",
                                        'web' => "$sua_theo_web",
                                        'time' => "$sua_theo_time",
                                    )
                                );
            
                                foreach($arrayJson as $key => $value){
                                    if($value['id']== $sua_theo_id){
                                        array_splice( $arrayJson, $key, 0, $newArray );
                                        unset($arrayJson[$key-1]);
                                    }
                                }
            
                                $newJson3 = json_encode($arrayJson);
                                $fp3 = fopen('datajson.txt','w')or die("File không tồn tại");
                                fwrite($fp3, $newJson3);
                                fclose($fp3);
                            }
    
                            else{
                                echo "<br>";
                                echo "Mã số sinh viên phải được nhập và phải là 1 số !!!";
                                echo "<br>";
                            }
                        }
                        else{
                            echo "<br>";
                            echo "Name chưa được nhập !!!";
                            echo "<br>";
                        }
                    }
                    else{
                        echo "<br>";
                        echo "Url chưa được nhập !!!";
                        echo "<br>";
                    }
                    
                }
            ?>  

        </table>   
    </form>
</body>
</html>