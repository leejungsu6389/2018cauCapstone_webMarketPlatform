<?php
if(!isset($_POST['store_code'])) exit('상점코드, 아이디 또는 비밀번호가 누락되었습니다.');
$store_code = $_POST['store_code'];
        
       echo $store_code;
        
        
      /* import db connection header */
      require_once("./db_storeid.php");
      
      /* using prepared statement */
      /* block the SQL injection */
      $sql = "SELECT * 
              FROM storeid 
              WHERE id = ?";
  
      /* prepare */
      $stmt = $s->prepare($sql);
      
      /* bind */
      $stmt->bind_param("s", $b_big);
                        
      /* set parameters */
      $b_big = $store_code;
      
      /* execute */
      $stmt->execute();
      
      /* get result */
      $result = $stmt->get_result();
      
      if($result->num_rows==0){
      
        echo "<script>alert('상점코드가 잘못되었습니다.');history.back();</script>";
        exit('상점코드가 잘못되었습니다.');
        
      }
      
      while($row = $result->fetch_assoc()){
        $store[] = $row['id'];
      
      }
      
      print "\n상점번호 id: ".$store[0];
      print "님 환영합니다.";
      
         
      $stmt->close();
      
      /* disconnect db */ 
      mysqli_close($s);  
      
        
        
    

session_start();
$_SESSION['store_code'] = $store[0];
?>
<meta http-equiv='refresh' content='0;url=index_init.php'>