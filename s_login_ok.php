<?php
if(!isset($_POST['user_id']) || !isset($_POST['user_pw'])) exit('아이디 또는 비밀번호가 누락되었습니다.');
$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];
        
        
        
      /* import db connection header */
      require_once("./db_connect.php");
      
      /* using prepared statement */
      /* block the SQL injection */
      $sql = "SELECT * 
              FROM user 
              WHERE userID = ? AND pswd = ?";
  
      /* prepare */
      $stmt = $s->prepare($sql);
      
      /* bind */
      $stmt->bind_param("ss", $b_id, $b_pswd);
                        
      /* set parameters */
      $b_id = $user_id;  
      $b_pswd = $user_pw;
      
      /* execute */
      $stmt->execute();
      
      /* get result */
      $result = $stmt->get_result();
      
      if($result->num_rows==0){
      
        echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.');history.back();</script>";
        exit('아이디 또는 비밀번호가 잘못되었습니다.');
        
      }
      
      while($row = $result->fetch_assoc()){
      
        $ids[] = $row['userID'];
        $pswds[] = $row['pswd'];
        $names[] = $row['name'];
      
      }
      
      print "\n접속 id: ".$ids[0];
      print "\n".$names[0]."님 환영합니다.";
      
         
      $stmt->close();
      
      /* disconnect db */ 
      mysqli_close($s);  
      
      $id = $ids[0];
      $pw = $pswds[0];
        
        
    

session_start();
$_SESSION['user_id'] = $ids[0];
$_SESSION['user_name'] = $names[0];
?>
<meta http-equiv='refresh' content='0;url=index.php'>