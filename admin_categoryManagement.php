<?php

  /* import classes */
  require_once("./bigDreamClasses.php");

  /* server decides the action with this variable */
  /* server acts with many if-else statements */



  function exec_admin_addCategory($_WHAT_TO_DO){

    /* Admin Page */
  
        /* add item */
        if($_WHAT_TO_DO == 'ADD_CATEGORY'){
    
   
          /* create new object */
          $ct = $_POST["_categoryName"];
    
          echo "<br/>----------Unit Test----------";
	        echo "<br/>"."What To Do: ".$_WHAT_TO_DO;
	        echo "<br/>".$ct;
      
      
          /* import db connection header */
          require_once("./db_connect.php");
        
        
          /* 카테고리 갯수 count */
          $sql = "SELECT * 
          FROM categoryList
          ORDER BY orderNumber ASC";
  
          /* prepare */
          $stmt = $s->prepare($sql);
          
          /* execute */
          $stmt->execute();
      
          /* get result */
          $result = $stmt->get_result();
     
          /* count the category List */
          if($result->num_rows==0){
            $arrLeng = 0;
          }
          else{
            while($row = $result->fetch_assoc()){   
              $od[] = $row['orderNumber'];
            }
  
            $arrLeng = count($od);
          }
      
         
          $stmt->close();
      
      
          /* using prepared statement */
          /* block the SQL injection */
          $sql = "INSERT INTO categorylist(orderNumber, cName) 
                  VALUES(?, ?)";
  
          /* prepare */
          $stmt = $s->prepare($sql);
      
          /* bind */
          $stmt->bind_param("is", 
                            $b_od, $b_name);
                        
          /* set parameters */
          $b_od = $arrLeng;  
          $b_name = $ct;


          /* execute */
          $stmt->execute();
      
          $stmt->close();
      
          /* disconnect db */ 
          mysqli_close($s);
  
        



        echo"
          <script>
            alert('카테고리 추가 완료되었습니다.');
            location.href='index_admin.php';
          </script>
      
        ";

      }
      /* delete categoryList */
      else if($_WHAT_TO_DO == 'DEL_CATEGORY'){
      
          echo "<br/>----------Unit Test----------";
	        echo "<br/>"."What To Do: ".$_WHAT_TO_DO;
      
      
          /* import db connection header */
          require_once("./db_connect.php");
        
        
          /* 카테고리 갯수 count */
          $sql = "DELETE  
                  FROM categoryList
                  WHERE 1";
  
          /* prepare */
          $stmt = $s->prepare($sql);
          
          /* execute */
          $stmt->execute();
      
         
          $stmt->close();

          /* disconnect db */ 
          mysqli_close($s);
          
          echo"
          <script>
            alert('카테고리 삭제 완료되었습니다.');
            location.href='index_admin.php';
          </script>
      
        ";
  
        }




      
      }
  


?>