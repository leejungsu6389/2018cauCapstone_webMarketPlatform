<?php

  /* import classes */
  require_once("./bigDreamClasses.php");

  /* server decides the action with this variable */
  /* server acts with many if-else statements */



  function exec_user_account($_WHAT_TO_DO){

  
    /* ============================================ */
    /* USER PAGE */
    /* ============================================ */


    /* ============================================ */
    /* Account Module */


    /* Account: join */
    if($_WHAT_TO_DO == 'JOIN_ACCOUNT'){
  
      /* create new object */
      $userO = new User();
      
      $dd = date("Y-m-d");
      $init_p = 1000;
    
      /* set object member variable */
      $userO->setID($_POST["_userID"]);
      $userO->setPswd($_POST["_pswd"]);
      $userO->setName($_POST["_name"]);
      
      $userO->setDate($dd);
      
      $userO->setZipCode($_POST["_zipCode"]);
      $userO->setAddress($_POST["_address"]);
      $userO->setEmail($_POST["_email"]);
      $userO->setTelNum($_POST["_telNum"]);
      
      $userO->setPoint($init_p);
  

      
      
      /* import db connection header */
      require_once("./db_connect.php");
  
      
      /* using prepared statement */
      /* block the SQL injection */
      $sql = "INSERT INTO user(userID, pswd, name, joined_date, zipCode, address, email, telNum, mileage) 
              VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
  
      /* prepare */
      $stmt = $s->prepare($sql);
      
      /* bind */
      $stmt->bind_param("ssssssssi", $b_id, $b_pswd, $b_name, $b_joined_date, $b_zipCode, 
                        $b_address, $b_email, $b_telNum, $b_mileage);
                        
      /* set parameters */
      $b_id = $userO->getID();  
      $b_pswd = $userO->getPswd();  
      $b_name = $userO->getName();  
      $b_joined_date = $userO->getDate();  
      $b_zipCode = $userO->getZipCode();  
      
      $b_address = $userO->getAddress();  
      $b_email = $userO->getEmail();  
      $b_telNum = $userO->getTelNum();  
      $b_mileage = $userO->getPoint();  
      
      /* execute */
      $stmt->execute();
      
      $stmt->close();
      
      /* disconnect db */ 
      mysqli_close($s);
      
      echo"
        <script>
          alert('회원가입이 완료되었습니다. 로그인해주세요.');
          location.href='index.php';
        </script>
      
      ";
  
    }


    /* Account: Login */
    else if($_WHAT_TO_DO == 'LOGIN_ACCOUNT'){
  
      /* create new object */
      $userO = new User();
    
      /* set object member variable */
      $userO->setID($_POST["_userID"]);
      $userO->setPswd($_POST["_pswd"]);
  
  
      echo "<br/>----------Unit Test----------";
	    echo "<br/>"."What To Do: ".$_WHAT_TO_DO;
	    echo "<br/>".$userO->getID();
	    echo "<br/>".$userO->getPswd();
      
      
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
      $b_id = $userO->getID();  
      $b_pswd = $userO->getPswd();
      
      /* execute */
      $stmt->execute();
      
      /* get result */
      $result = $stmt->get_result();
      
      if($result->num_rows==0) exit('No rows');
      
      while($row = $result->fetch_assoc()){
      
        $ids[] = $row['userID'];
        $pswds[] = $row['pswd'];
      
      }
      
      var_export($ids);
      var_export($pswds);
      
      print $ids[0];
      print $pswds[0];
         
      $stmt->close();
      
      /* disconnect db */ 
      mysqli_close($s);
      

  
  
    }
    else if($_WHAT_TO_DO == 'SHOW_ACCOUNT'){
    

    
      /* create new object */
      $userO = new User();
    
      /* set object member variable */
      $userO->setID($_POST["_userID"]);
      $userO->setPswd($_POST["_pswd"]);
  
  

      
      
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
      $b_id = $userO->getID();  
      $b_pswd = $userO->getPswd();
      
      /* execute */
      $stmt->execute();
      
      /* get result */
      $result = $stmt->get_result();
      
      if($result->num_rows==0){
      
        echo"
        <script>
          alert('비밀번호가 틀립니다.');
          location.href='index.php?menu=myinfo';
        </script>
      
      ";
      
      }
      
      while($row = $result->fetch_assoc()){
      
					$na[] = $row['name'];
					$zc[] = $row['zipCode'];
					$ad[] = $row['address'];
					$em[] = $row['email'];
					$te[] = $row['telNum'];
      }
      
      
      $stmt->close();
      
      /* disconnect db */ 
      mysqli_close($s);
      
       $uinfo = array($na[0], $zc[0], $ad[0], $em[0], $te[0]);

       
       echo "<br/>이름: ".$na[0];
       echo "<br/>우편: ".$zc[0];
       echo "<br/>주소: ".$ad[0];
       echo "<br/>이메일: ".$em[0];
       echo "<br/>전화번호: ".$te[0];
       
       echo"<br/><br/>
        
        <a href ='javascript:history.back();'>뒤로가기</a>
      
      ";
    }


    /* Account: Edit */
    else if($_WHAT_TO_DO == 'EDIT_ACCOUNT'){
  
      /* create new object */
      $userO = new User();
      
    
      /* set object member variable */
      $userO->setID($_POST["_userID"]);
      $userO->setPswd($_POST["_pswd"]);
      
      $new_pswd = $_POST["_pswd2"];
       
      $userO->setZipCode($_POST["_zipCode"]);
      $userO->setAddress($_POST["_address"]);
      $userO->setEmail($_POST["_email"]);
      $userO->setTelNum($_POST["_telNum"]);
      


      
      /* import db connection header */
      require_once("./db_connect.php");
  
      
      /* using prepared statement */
      /* block the SQL injection */
      $sql = "UPDATE user
              SET pswd = ?, zipCode = ?, address = ?, email = ?, telNum = ?
              WHERE userID = ? AND pswd = ?";
  
      /* prepare */
      $stmt = $s->prepare($sql);
      
      
      /* bind */
      $stmt->bind_param("sssssss", 
                        $b_pswd2, $b_zipCode, $b_address, $b_email, $b_telNum,
                        $b_id, $b_pswd);
                        
      /* set parameters */
      $b_id = $userO->getID();  
      $b_pswd = $userO->getPswd();  
      
      $b_pswd2 = $new_pswd; 
      
      $b_zipCode = $userO->getZipCode();      
      $b_address = $userO->getAddress();  
      $b_email = $userO->getEmail();  
      $b_telNum = $userO->getTelNum();  
      
      /* execute */
      $stmt->execute();
      
      $stmt->close();
      
      /* disconnect db */ 
      mysqli_close($s);
  
  
      echo"
        <script>
          alert('회원정보 수정 완료.');
          location.href='index.php';
        </script>
      
      ";
  
    }


    /* Account: Quit */
    else if($_WHAT_TO_DO == 'QUIT_ACCOUNT'){
  
      /* create new object */
      $userO = new User();
 
    
      /* set object member variable */
      $userO->setID($_POST["_userID"]);
      $userO->setPswd($_POST["_pswd"]);
      
      $sig = $_POST["_signature"];
      

       
      if($sig == '동의'){
     
        /* create new object */
        $userO = new User();
      
    
        /* set object member variable */
        $userO->setID($_POST["_userID"]);
        $userO->setPswd($_POST["_pswd"]);
      

      
        /* import db connection header */
        require_once("./db_connect.php");
  
      
        /* using prepared statement */
        /* block the SQL injection */
        $sql = "UPDATE user
                SET pswd = ?, zipCode = ?, address = ?, email = ?, telNum = ?
                WHERE userID = ? AND pswd = ?";
  
        /* prepare */
        $stmt = $s->prepare($sql);
      
      
        /* bind */
        $stmt->bind_param("sssssss", 
                          $b_pswd2, $b_zipCode, $b_address, $b_email, $b_telNum,
                          $b_id, $b_pswd);
                        
        /* set parameters */
        $b_id = $userO->getID();  
        $b_pswd = $userO->getPswd();  
      
        $b_pswd2 = ""; 
      
        $b_zipCode = "";      
        $b_address = "";  
        $b_email = "";  
        $b_telNum = "";  
      
        /* execute */
        $stmt->execute();
      
        $stmt->close();
      
        /* disconnect db */ 
        mysqli_close($s);
  
  
        echo"
          <script>
            alert('회원탈퇴 완료.');
            location.href='index.php';
          </script>
      
        ";
  
      }
      else{
         echo"
          <script>
            alert('서명란에 동의하지 않아 회원탈퇴가 중지됩니다.');
            location.href='index.php';
          </script>
      
        ";
      }
  
    }
  
  }


?>