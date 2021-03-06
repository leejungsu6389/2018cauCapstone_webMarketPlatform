﻿<!DOCTYPE html>
<meta charset="utf-8" />

<head>
<title>#shopNAME</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />

<!--include style sheet-->
<link rel="stylesheet" type="text/css" href="style.css" />

<script type="text/javascript" src="js/boxOver.js"></script>
</head>

<?php 
	require_once("./db_connect.php");
?>


<body>
<div id="main_container">
  <div id="header">
    <table>
      <tr>
        <td>
          <!-- 로고 -->
          <div id="logo">
            <a href="index_admin.php">
              <img src="images/logo.png" alt="" border="0" width="182" height="85" />
            </a>
          </div>
        </td>

        <!-- 로그인, 아웃 세션-->
        <td>
          <?php
            session_start();
            
            /* 세션=null 비로그인 상태 */
            if(!isset($_SESSION['store_code']) || !isset($_SESSION['admin_name'])) {
              echo "<form method='post' action='s_login_ok_admin.php'>";
              echo "<table>";

				echo"
					<tr><td>
					
					<div class='jLabel'><label> 관리자 아이디 </label></div>
					<input type='text' name='user_id' value='' style=' width:200px;'>
					<br>

					<div class='jLabel'><label> 비밀번호</label></div>
					<input type='password' name='user_pw' value='' style=' width:200px;'>
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
              $admin_name = $_SESSION['admin_name'];
              echo "<p>안녕하세요. $admin_name(상점번호: $store_code)님</p>";
              echo "<p><a href='s_logout_admin.php'>로그아웃</a></p>";
              echo "<br/>";
              echo "관리자 페이지입니다.<br/>";
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
            if(!isset($_SESSION['store_code']) || !isset($_SESSION['admin_name'])) {
				echo'
					</ul>
					</div>
					<!-- end of menu tab -->
				';
              
            }
            
            /* 로그인 상태 */
            else{

              echo '<li><a href="index_admin.php?menu=addC" class="nav">카테고리추가</a></li>';
              echo '<li class="divider"></li>';
              echo '<li><a href="index_admin.php?menu=delC" class="nav">카테고리삭제</a></li>';
              echo '<li class="divider"></li>';
			  echo '<li><a href="index_admin.php?menu=orderCheck" class="nav">주문조회</a></li>';
              echo '<li class="divider"></li>';
			  echo '<li><a href="index_admin.php?menu=swapLogo" class="nav">로고변경</a></li>';
              echo '<li class="divider"></li>';
			  echo '<li><a href="index_admin.php?menu=modComInfo" class="nav">하단정보변경</a></li>';
              echo '<li class="divider"></li>';
			  echo '<li><a href="index_admin.php?menu=addItem" class="nav">물품 추가</a></li>';
              echo '<li class="divider"></li>';
			  echo '<li><a href="index_admin.php?menu=modItem" class="nav">물품 수정</a></li>';
              echo '<li class="divider"></li>';
			  echo '<li><a href="index_admin.php?menu=addImg" class="nav">이미지 등록</a></li>';
              echo '<li class="divider"></li>';


				echo'
				</ul>
				</div>
				<!-- end of menu tab -->
				<div><br/></div>

				<div class="left_content">
				<div class="title_box">카테고리</div>
				<ul class="left_menu">
     
				<!--get the category List from DB-->        
				<?php 
					require_once("./h_categoryShow.php");
				?>
        

				</ul>
				</div>
				<!-- end of left content -->

				';


            }

          ?>





	  
	  <?php


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

			/* 주문 조회 */
			if($qr == "orderCheck"){
			
				require_once("./h_show_adminOrder.php");
				
				show_orderA(1);
			
			}



			/* 카테고리 추가 */
			if($qr == "addC"){
			
				echo '            

					<table>
					<tr>
					<td>
					<form action="server_test.php" method="post">
						<br>

					
						<input type="hidden" name="_WHAT_TO_DO" value="ADD_CATEGORY">

						
						<div class="jLabel"><label> <b>[추가할 카테고리]</b></label></div>
						<div class="jLabel"><label> category: 이름</label></div>
						<input type="text" name="_categoryName" value="" style=" width:200px;">
						<br>


						<input type="submit" value="추가">
						<br>
					</form>
					</td>

					</tr>
					</table>
				';
			
			}
			/* 카테고리 추가 */
			else if($qr == "delC"){
			
				echo '            

					<table>
					<tr>
					<td>
					<form action="server_test.php" method="post">
						<br>

					
						<input type="hidden" name="_WHAT_TO_DO" value="DEL_CATEGORY">

						
						<div class="jLabel"><label> <b>[카테고리 목록을 삭제합니다.]</b></label></div>
						<div class="jLabel"><label> category: 삭제</label></div>
						<br>


						<input type="submit" value="모두 삭제">
						<br>
					</form>
					</td>

					</tr>
					</table>
				';
			
			}
			/* 로고 변경 */
			else if($qr =="swapLogo"){
				echo"
					<form enctype='multipart/form-data' action='h_changeLogo.php' method='post'>
					<input type='file' name='myfile'>
					<button>보내기</button>
					</form>
				";
			}
		
			/* 하단 정보 변경 */
			else if($qr == "modComInfo"){
			
				echo '            
					<table>
					<tr>
					<td>
					<form action="index_admin.php" method="post">
						<br>

					
						<input type="hidden" name="_WHAT_TO_DO" value="MOD_BOT_INFO">

						
						<div class="jLabel"><label> <b>[하단 정보 변경]</b></label></div>
						<div class="jLabel"><label> companyName: 회사명</label></div>
						<input type="text" name="cName" value="" style=" width:200px;">
						<br>

						<div class="jLabel"><label> address: 회사주소</label></div>
						<input type="text" name="cAddr" value="" style=" width:200px;">
						<br>

						<div class="jLabel"><label> Tel: 전화번호</label></div>
						<input type="text" name="cTel" value="" style=" width:200px;">
						<br>

						<div class="jLabel"><label> Account: 계좌번호</label></div>
						<input type="text" name="cBank" value="" style=" width:200px;">
						<br>


						<br>


						<input type="submit" value="변경">
						<br>
					</form>
					</td>
					</tr>
					</table>
				';
			
			}
			/* 엑셀 물품 추가 */
			else if($qr == "addItem"){
				echo"엑셀(xlsx) 파일을 이용하여 물품을 등록해주세요.<br>
					<table><tr><td>";

					require_once("../readExcel/excelReader.php");

					echo"</td></tr></table>
				";
			}

			/* 엑셀 물품 편집 */
			else if($qr == "modItem"){
				echo"엑셀(xlsx) 파일을 이용하여 물품을 수정해주세요.<br>
					<table><tr><td>";

					require_once("../readExcel/excelReader_EDIT.php");

					echo"</td></tr></table>
				";

			}			
			/* 물품 사진 등록 */
			else if($qr == "addImg"){
				echo"사진의 이름은 아이템번호와 동일해야하며 png만 지원합니다.<br>
					<table><tr><td>";


									echo"
					<form enctype='multipart/form-data' action='h_imgupload.php' method='post'>
					<input type='file' name='myfile'>
					<button>보내기</button>
					</form>
				";


					echo"</td></tr></table>
				";
			}

			/* 아이템 목록 조회 */
			else if($qr == "itemList"){

				require("./h_showItemList.php");

			}
		}



	  ?>




  </div>
  <!-- end of main content -->

    <!--하단 정보-->
  <div class="footer">

    <!--가운데정렬하기-->
    <div class="center_footer">

	

      <!--get the company Info-->
      <?php 

		if(!isset($_POST["_WHAT_TO_DO"])){
			
			require_once("./h_companyInfo.php");
		
		}
		
		else {
			$cInfo = $_POST["_WHAT_TO_DO"];

			if($cInfo == "MOD_BOT_INFO"){

				/* create infoPage */
				$f = fopen("h_companyInfo.php", "w");


				/* original file name */
				$_fn = "h_companyInfo.php";


				/* read original html */
				$buffer = file("$_fn");
				

				$v = "<?php\n";
				fwrite($f, $v);

				

				$v = "echo '".$_POST["cName"]."'.'<br/>'".";\n";
				fwrite($f, $v);
				$v = "echo '".$_POST["cAddr"]."'.'<br/>'".";\n";
				fwrite($f, $v);
				$v = "echo '".$_POST["cTel"]."'.'<br/>'".";\n";
				fwrite($f, $v);
				$v = "echo '".$_POST["cBank"]."'.'<br/>'".";\n";
				fwrite($f, $v);

				

				$v = "\n?>";
				fwrite($f, $v);

				/* close file */
				fclose($f);

				require_once("./h_companyInfo.php");

			}

		}

        
	?>

    </div>
  </div>
</div>
<!-- end of main_container -->
</body>
</html>
