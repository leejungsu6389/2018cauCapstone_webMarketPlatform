<!DOCTYPE html>
<meta charset="utf-8" />

<head>
<title>#shopNAME</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />

<!--include style sheet-->
<link rel="stylesheet" type="text/css" href="style.css" />

<script type="text/javascript" src="js/boxOver.js"></script>
</head>

<?php 
	require_once("./db_storeid.php");
?>


<body>
<div id="main_container">
  <div id="header">
    <table>
      <tr>
        <td>
          <!-- 로고 -->
          <div id="logo">
            <a href="index_init.php">
              <img src="images/logo.png" alt="" border="0" width="182" height="85" />
            </a>
          </div>
        </td>

        <!-- 로그인, 아웃 세션-->
        <td>
          <?php
            session_start();
            
            /* 세션=null 비로그인 상태 */
            if(!isset($_SESSION['store_code'])) {
              echo "<form method='post' action='s_login_ok_init.php'>";
              echo "<table>";

				echo"
					<tr><td>
					
					<br>

					<div class='jLabel'><label> 상점코드</label></div>
					<input type='text' name='store_code' value='' style=' width:200px;'>
					<br>

					</td>
						
					<td>
						<input type='submit' value='로그인' style='height:50px'/>
					</td></tr></table>
					</form>
				";

            
            }
            
            /* 로그인 상태 */
            else{
              $store_code = $_SESSION['store_code'];
              echo "<p>안녕하세요. 상점번호: ".$store_code."님</p>";
              echo "<p><a href='s_logout_init.php'>로그아웃</a></p>";
              echo "<br/>";
              echo "쇼핑몰 생성 페이지입니다.<br/>";
              echo "<br/>";
            
            }

          ?>
          
          
        </td>
      </tr>

    </table>
  </div>

  <div id="main_content">

    <!-- 상단메뉴 -->
    <div id="menu_tab">
      <ul class="menu">

        <?php
            
            /* 세션=null 비로그인 상태 */
            if(!isset($_SESSION['store_code'])) {
				echo'
					</ul>
					</div>
					<!-- end of menu tab -->
				';
              
            }
            
            /* 로그인 상태 */
            else{

              echo '<li><a href="index_init.php?menu=create" class="nav">쇼핑몰 생성</a></li>';
              echo '<li class="divider"></li>';


				echo'
				</ul>
				</div>
				<!-- end of menu tab -->
				<div><br/></div>

	

				';


            }

          ?>
	  
	  <?php

		/* 테마 */
		if(isset($_GET['skin'])){
		
			$ip = $_GET['skin'];

			
			require_once("./dirMakeTest.php");

			$inp = $_SESSION['store_code'];

			exec_mkdir($_SESSION['store_code']);
			fileCP($_SESSION['store_code'], $ip);

			rewrite_dbname($inp);

			echo './상점ID/index_admin.php 경로로 접속하여 초기설정을 하세요.';
		
		}


		/* 초기 페이지 */
		if(!isset($_GET["menu"])){
		
			echo"
				<div class='center_content'>

			";
			
		}

		/* 세부 페이지 */
		else {
			echo "<div class='center_content'>";

			$qr = $_GET["menu"];

			/* 카테고리 추가 */
			if($qr == "create"){

				echo '            

					<table>
					<tr>
					<td><img src="./images/skin1.png"></td>
					<td><img src="./images/skin2.png"></td>
					<td><img src="./images/skin3.png"></td>

					</tr>
					<tr>
					<td><a href="index_init.php?skin=1">하늘 테마</a></td>
					<td><a href="index_init.php?skin=2">석양 테마</a></td>
					<td><a href="index_init.php?skin=3">베이지 테마</a></td>
					</tr>
					</table>
				';
			
			}

		}



	  ?>


  </div>
  <!-- end of main content -->

    <!--하단 정보-->
  <div class="footer">

    <!--가운데정렬하기-->
    <div class="center_footer">    

    </div>
  </div>
</div>
<!-- end of main_container -->
</body>
</html>
