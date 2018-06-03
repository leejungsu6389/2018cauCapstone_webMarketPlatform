<?php
if(!isset($_POST['user_id']) || !isset($_POST['user_pw'])) exit('상점코드, 아이디 또는 비밀번호가 누락되었습니다.');
$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];
$store_code = $_POST['store_code'];
        
        
        
      /* import db connection header */
      require_once("./db_connect.php");
      
      /* using prepared statement */
      /* block the SQL injection */
      $sql = "SELECT * 
              FROM admin 
              WHERE name = ? AND pswd = ? AND bigdreamCode = ?";
  
      /* prepare */
      $stmt = $s->prepare($sql);
      
      /* bind */
      $stmt->bind_param("sss", $b_id, $b_pswd, $b_big);
                        
      /* set parameters */
      $b_id = $user_id;  
      $b_pswd = $user_pw;
      $b_big = $store_code;
      
      /* execute */
      $stmt->execute();
      
      /* get result */
      $result = $stmt->get_result();
      
      if($result->num_rows==0){
      
        echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.');history.back();</script>";
        exit('아이디 또는 비밀번호가 잘못되었습니다.');
        
      }
      
      while($row = $result->fetch_assoc()){
      
        $ids[] = $row['name'];
        $pswds[] = $row['pswd'];
        $store[] = $row['bigdreamCode'];
      
      }
      
      print "\n접속 id: ".$ids[0];
      print "\n".$names[0]."님 환영합니다.";
      print "\n상점 번호: ".$store[0];
      
         
      $stmt->close();
      
      /* disconnect db */ 
      mysqli_close($s);  
      
      $id = $ids[0];
      $pw = $pswds[0];
        
        
    

session_start();
$_SESSION['store_code'] = $store[0];
$_SESSION['admin_name'] = $ids[0];
?>
<meta http-equiv='refresh' content='0;url=index_admin.php'>