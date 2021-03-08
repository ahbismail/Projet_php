<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
         body{margin: 0px;background-color: #fff;}
         .form-db{height: 100px;width: 40%;background-color:#FAFAFA;position: relative;top:150px;left:25%;border-radius: 10px;}
         .file{position: relative;left:25%;top:20%}
         .inputfile{font-size: 16px;background: #8BF9DE;border-radius: 10px;box-shadow: 5px 5px 5px black;width: 300px;outline: none;}
         ::-webkit-file-upload-button{background-color: #B8EADD;color: white;padding: 20px;border-radius: 10px;border: none;box-shadow: 0px 1px 1px #7ECEBA;}
       .btn{outline: none;height: 40px;width: 180px;background-color: #8BF9DE;color:white;border: NONE;border-radius: 10px;position: relative;left: 40%;top:45%;}
       .msg{position: relative;font-size: 16px;left:45%;top: 60%;font-family: sans-serif;font-weight: 700;}
  </style>
</head>
<body>
 <form class="form-db" method="POST">
           <div class="file" >
           <input type="file" name="file" id="file" class="inputfile"  />      
        </div>
        <input type="submit" value="import" class="btn" name="btn">
        <div class="msg">
        <?php 
                        require 'bd.php';
                        $db =new  dbase();
                        $con=$db->connect();
                        @$path =$_POST['file'];
 if(isset($_POST['btn'])) 
 {
   $counter=0;
          if($path !="")
          {
                        $data =file_get_contents($path);
                        $array =json_decode($data,true);
                        
                        foreach($array as $row)
                                {
                                  $sql="INSERT INTO Tbl_user (name, gender, designation) VALUES ('".$row["name"]."', '".$row["gender"]."', '".$row["designation"]."'); ";
                                  if($db->query_insert($sql))
                                   $counter++;
                                }     
                                if($counter>0)  echo "<p style='color:green;'>Inserted</p>";
                                 
          }
          else
          echo "<p style='color:red;'>Please Try Again</p>";

 }

?>
 </div>
 </form>
</body>
</html>