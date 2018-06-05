<!DOCTYPE html>
<meta charset="utf-8" />



<head>
<title>#shopNAME</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />

<!--include style sheet-->
<link rel="stylesheet" type="text/css" href="style.css" />

<script type="text/javascript" src="js/boxOver.js"></script>
</head>


<body>
<div id="main_container">
  <div id="header">
    <table>
      <tr>
        <td>
          <!-- 로고 -->
          <div id="logo">
            <a href="index.php">
              <img src="images/logo.png" alt="" border="0" width="182" height="85" />
            </a>
          </div>
        </td>

        <!-- 로그인, 아웃 세션-->
        <td>
          <?php
            session_start();
            
            /* 세션=null 비로그인 상태 */
            if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {

				    echo "<form method='post' action='s_login_ok.php'>";
					echo "<table>";

				echo"
					<tr><td>
					
					<div class='jLabel'><label> 아이디 </label></div>
					<input type='text' name='user_id' value='' style=' width:200px;'>
					<br>

					<div class='jLabel'><label> 비밀번호</label></div>
					<input type='password' name='user_pw' value='' style=' width:200px;'>
					<br>


					</td>
						
					<td>
						<div class='jLabel'><label> Login </label></div>
						<input type='submit' value='로그인' style='height:50px'/>
					</td></tr></table>
					</form>


					";


            
            }
            
            /* 로그인 상태 */
            else{
              $user_id = $_SESSION['user_id'];
              $user_name = $_SESSION['user_name'];
              echo "<p>안녕하세요. $user_name($user_id)님</p>";
              echo "<p><a href='s_logout.php'>로그아웃</a></p>";
            
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
            if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {

              echo '<li><a href="index.php?menu=join" class="nav">회원가입</a></li>';
              echo '<li class="divider"></li>';
            }
            
            /* 로그인 상태 */
            else{
              echo '<li><a href="index.php?menu=myinfo" class="nav">회원정보</a></li>';
              echo '<li class="divider"></li>';
              echo '<li><a href="index.php?menu=uorder" class="nav">주문조회</a></li>';
              echo '<li class="divider"></li>';
              echo '<li><a href="index.php?menu=userQ" class="nav">설문조사</a></li>';
              echo '<li class="divider"></li>';
              echo '<li><a href="index.php?menu=quit" class="nav">회원탈퇴</a></li>';
            }

          ?>
      </ul>
    </div>
    <!-- end of menu tab -->
    <div><br/></div>


	<?php
		require_once("./h_show.php");
	?>




	  
	  <?php


		/* 초기 페이지 */
		if(!isset($_GET["menu"])){
		
			echo "<div class='center_content'>
				<div class='center_title_bar'>상품 검색</div>
				  <div>
					<form method='get' action='index.php'>
					  <table>
						<tr>
						  <td>
							<input type='text' name='search'/>
						  </td>
						  <td>
							<input type='submit' tabindex='3' value='검색' style='height:25px'/>
						  </td>
						</tr>
            
					  </table>
					</form>
				  </div>
		
		
			";

				if(!isset($_GET["category"])){
					
					/* 메인 페이지 최신상품 표시 */
					if(!isset($_GET["search"])){
				

						if(isset($_SESSION["user_id"])){


							/* 큐레이팅(설문조사) */
							if(isset($_GET["UQ"])){

							
								/* 예외 처리 */
								if(!isset($_GET["1"])){

									  echo"
										<script>
										  alert('모든 설문을 클릭해주세요');
										  location.href='index.php';
										</script>
      
									  ";								
								}
								if(!isset($_GET["2"])){

									  echo"
										<script>
										  alert('모든 설문을 클릭해주세요');
										  location.href='index.php';
										</script>
      
									  ";								
								}
								if(!isset($_GET["3"])){

									  echo"
										<script>
										  alert('모든 설문을 클릭해주세요');
										  location.href='index.php';
										</script>
      
									  ";								
								}
								if(!isset($_GET["4"])){

									  echo"
										<script>
										  alert('모든 설문을 클릭해주세요');
										  location.href='index.php';
										</script>
      
									  ";								
								}
								if(!isset($_GET["5"])){

									  echo"
										<script>
										  alert('모든 설문을 클릭해주세요');
										  location.href='index.php';
										</script>
      
									  ";								
								}

								add_UQ($_SESSION["user_id"], $_GET["1"], $_GET["2"], $_GET["3"], $_GET["4"], $_GET["5"]);

								echo"
								<script>
									alert('설문에 감사드립니다.');
									location.href='index.php';
								</script>
      
								";				
							}


						
							/* 주문창 */
							if(isset($_GET["doOrder"])){							
								echo "<br><div class='center_title_bar'>주문 신청서</div>";

								echo "<div class='center_content'>";			
								echo '            
								<table><tr><td>
								<form action="server_test.php" method="post">
								<br>
					
								<input type="hidden" name="_WHAT_TO_DO" value="DO_ORDER">

						
								<div class="jLabel"><label> <b>[주문자]</b></label></div>
								<div class="jLabel"><label> id: 아이디</label></div>
								<input type="text" name="_userID" value="'.$_SESSION["user_id"];
								
								echo '" style=" width:200px;"readonly>
								<br>

								<div class="jLabel"><label> name: 이름</label></div>
								<input type="text" name="_pswd" value="'.$_SESSION["user_name"];
								
								echo '" style=" width:200px;">
								<br>
								<br>
								<br>

						
								<div class="jLabel"><label> <b>[수령인]</b></label></div>

								<div class="jLabel"><label> name: 이름</label></div>
								<input type="text" name="_name" value="" style=" width:200px;">
								<br>

								<div class="jLabel"> <label> zipCode: 우편번호</label></div>
								<input type="text" name="_zipCode" value="" style=" width:200px;">
								<br>

								<div class="jLabel"><label> address: 상세주소</label></div>
								<input type="text" name="_address" value="" style=" width:200px;">
								<br>

								<div class="jLabel"><label> telNum: 전화번호</label></div>
								<input type="text" name="_telNum" value="" style=" width:200px;">
								<br><br>

								<input type="submit" value="결제">
								<br>
								</form>
								</td>


								</tr>
								</table>

								</div>
								';

							}
							
						}
						else{
							recent_item();
						}
					}
					/* search by itemName */
					else{

						$nm = $_GET["search"];
					
						search_n($nm);
					}

				}
				/* search by category */
				else{

					$ctgr = $_GET["category"];

					search_c($ctgr);
				}
		

			echo"



    </div>
    <!-- end of center content -->



			";

			


			
		}

		/* 세부 페이지 */
		/* menu 셋 */
		else {

			$qr = $_GET["menu"];


			/* 큐레이팅(설문조사) */
			if($qr == "userQ"){
				echo "<div class='center_content'>";
			
				echo '            

					<table>
					<tr>
					<td>

					<form method="get" action="index.php">

					<input type="hidden" name="UQ" value="1">
                    <br><br>
                    1<br>
                    락 <input type="radio" name="1" value="rock">
                    발라드 <input type="radio" name="1" value="balad">
                    선택포기 <input type="radio" name="1" value="abandonment"><br><br>


                    2<br>
                    독서 <input type="radio" name="2" value="book">
                    산책 <input type="radio" name="2" value="walk">
                    선택포기 <input type="radio" name="2" value="abandonment"><br><br>

                    3<br>
                    산 <input type="radio" name="3" value="mountain">
                    바다 <input type="radio" name="3" value="sea">
                    선택포기 <input type="radio" name="3" value="abandonment"><br><br>

                    4<br>
                    여름 <input type="radio" name="4" value="sunny">
                    겨울 <input type="radio" name="4" value="winter">
                    선택포기 <input type="radio" name="4" value="abandonment"><br><br>

                    5<br>
                    육류 <input type="radio" name="5" value="meat">
                    어류 <input type="radio" name="5" value="fish">
                    선택포기 <input type="radio" name="5" value="abandonment"><br><br>

					
                    <input type="submit" value="제출">
                </form>
						
					</td>
					</tr>
					</table>

					    </div>
    <!-- end of center content -->
				';
			
			}






			/* 회원가입 */
			if($qr == "join"){
				echo "<div class='center_content'>";
			
				echo '            

					<table>
					<tr>
					<td>
					</td>
					</tr>
					<tr>
					<td>
					<form action="server_test.php" method="post">
						<br>

					
						<input type="hidden" name="_WHAT_TO_DO" value="JOIN_ACCOUNT">

						
						<div class="jLabel"><label> <b>[필수 정보]</b></label></div>
						<div class="jLabel"><label> userID: 아이디</label></div>
						<input type="text" name="_userID" value="" style=" width:200px;">
						<br>

						<div class="jLabel"><label> pswd: 비밀번호</label></div>
						<input type="password" name="_pswd" value="" style=" width:200px;">
						<br>
						<br>
						<br>

						
						<div class="jLabel"><label> <b>[선택 정보]</b></label></div>

						<div class="jLabel"><label> name: 이름</label></div>
						<input type="text" name="_name" value="" style=" width:200px;">
						<br>

						<div class="jLabel"> <label> zipCode: 우편번호</label></div>
						<input type="text" name="_zipCode" value="" style=" width:200px;">
						<br>

						<div class="jLabel"><label> address: 상세주소</label></div>
						<input type="text" name="_address" value="" style=" width:200px;">
						<br>

						<div class="jLabel"><label> email: 이메일</label></div>
						<input type="text" name="_email" value="" style=" width:200px;">
						<br>

						<div class="jLabel"><label> telNum: 전화번호</label></div>
						<input type="text" name="_telNum" value="" style=" width:200px;">
						<br>

						<input type="submit" value="회원가입">
						<br>
					</form>
					</td>


					</tr>
					<tr><td>
					';

					
						require_once("./rule.html");

					echo'
					</td></tr>
					</table>

					    </div>
    <!-- end of center content -->
				';
			
			}
			/* 회원정보 */
			else if($qr == "myinfo"){

				$sid = $_SESSION['user_id'];
				$sn = $_SESSION['user_name'];



						
				echo '            

					<table>

					<tr>

					</tr>
					<tr>
					<td>
					<form action="server_test.php" method="post">
						<br>

					
						<input type="hidden" name="_WHAT_TO_DO" value="SHOW_ACCOUNT">

						
						<div class="jLabel"><label> <b>[필수 정보]</b></label></div>
						<div class="jLabel"><label> userID: 아이디</label></div>
						<input type="text" name="_userID" value="'.$sid.'" style=" width:200px;" readonly>
						<br>				

						<div class="jLabel"><label> name: 이름</label></div>
						<input type="text" name="_name" value="'.$sn.'" style=" width:200px;" readonly>
						<br>

						<br>
						<div class="jLabel"><label> <b>pswd: 비밀번호 확인</b></label></div>
						<input type="password" name="_pswd" value="" style=" width:200px;">
						<br>
						<br>
						<input type="submit" value="회원정보 확인">
						<br>
					</form>
					</td>


					</tr>


					<tr>

					</tr>
					<tr>
					<td>
					<form action="server_test.php" method="post">
						<br>

					
						<input type="hidden" name="_WHAT_TO_DO" value="EDIT_ACCOUNT">

						
						<div class="jLabel"><label> <b>[필수 정보]</b></label></div>
						<div class="jLabel"><label> userID: 아이디</label></div>
						<input type="text" name="_userID" value="'.$sid.'" style=" width:200px;" readonly>
						<br>
						<div class="jLabel"><label> <b>pswd: 비밀번호 변경</b></label></div>
						<input type="password" name="_pswd2" value="" style=" width:200px;">
						<br>

						<br>
						<br>

						

						<div class="jLabel"><label> name: 이름</label></div>
						<input type="text" name="_name" value="'.$sn.'" style=" width:200px;" readonly>
						<br>

						<div class="jLabel"> <label> zipCode: 우편번호</label></div>
						<input type="text" name="_zipCode" value="" style=" width:200px;">
						<br>

						<div class="jLabel"><label> address: 상세주소</label></div>
						<input type="text" name="_address" value="" style=" width:200px;">
						<br>

						<div class="jLabel"><label> email: 이메일</label></div>
						<input type="text" name="_email" value="" style=" width:200px;">
						<br>

						<div class="jLabel"><label> telNum: 전화번호</label></div>
						<input type="text" name="_telNum" value="" style=" width:200px;">
						<br>

						<br>
						<div class="jLabel"><label> <b>pswd: 비밀번호 확인</b></label></div>
						<input type="password" name="_pswd" value="" style=" width:200px;">
						<br>
						<br>
						<input type="submit" value="정보 수정하기">
						<br>
					</form>
					</td>


					</tr>
					</table>
				';

			
			}

			/* 주문 조회 */
			else if($qr == "uorder"){

				$sid = $_SESSION['user_id'];

				show_order($sid);
			}


			/* 회원탈퇴 */
			/* 이름, 이메일 등 개인정보 파기 */
			/* 거래 내역 보존을 위해 id값을 제외하고는 전부 날려버림 */
			else if($qr == "quit"){

				$sid = $_SESSION['user_id'];
						
				echo '            

					<table>
					<tr>

					</tr>
					<tr>
					<td>
					<form action="server_test.php" method="post">
						<br>

					
						<input type="hidden" name="_WHAT_TO_DO" value="QUIT_ACCOUNT">

						
						<div class="jLabel"><label> <b>[회원 탈퇴]</b></label></div>
						<div class="jLabel"><label> 탈퇴 시 거래 내역을 제외한 모든 회원 정보가 파기됩니다.</label></div>
						<br>
						<div class="jLabel"><label> userID: 아이디</label></div>
						<input type="text" name="_userID" value="'.$sid.'" style=" width:200px;" readonly>
						<br>
						<div class="jLabel"><label> <b>pswd: 비밀번호 확인</b></label></div>
						<input type="password" name="_pswd" value="" style=" width:200px;">
						<br>
						<br>


						<div class="jLabel"><label> <b>[탈퇴 서명]</b></label></div>
						<div class="jLabel"><label> 서명란에 "동의"를 입력하세요.</label></div>
						<input type="text" name="_signature" value="" style=" width:200px;">
						<br>
						<br>
						<input type="submit" value="회원 탈퇴">
						<br>
					</form>
					</td>


					</tr>
					</table>
				';
			}
		}



	  ?>



    <div class="right_content">

	<table><tr><td>

       <!--장바구니-->
      <div class="shopping_cart">
        <div class="title_box">장바구니</div>
		
		<!-- 장바구니 물품 리스트 -->
        <div class="cart_details"> 
		
		<?php
			if(isset($_SESSION['user_id'])){


				/* 장바구니 비우기 */
				if(isset($_GET["clearCart"])){
					clear_cart($_SESSION['user_id']);
				}

				/* 장바구니 넣기 */
				if(isset($_GET["addCart"])){
					add_cart($_SESSION['user_id'], $_GET["addCart"]);
				}

				/* 로그인 상태에서만 카트 표시 */
				show_cart($_SESSION['user_id']);
			}
		?>
	
		<br />

		</div>
      </div>
	
	</td></tr>

	<tr><td>

	     <div class='prod_details_tab'>
		 
		 <a href='index.php?doOrder=1' class='prod_buy'>구매하기</a> 
          
         <a href='index.php?clearCart=1' class='prod_details'>비우기</a> </div>

		
	</td></tr>


		<tr><td>
      <!-- 광고 -->
	  <div class="title_box">광고 배너</div>
      <div class="#"> <a href="addLink.com"><img src="images/add.jpg" alt="" border="0" /></a> </div>

		</td></tr>

		<tr><td>

      <!-- 추천 사이트 -->
      <div class="title_box">추천 사이트</div>
      <ul class="left_menu">
        <li class="odd"><a href="#">-</a></li>
        <li class="even"><a href="#">-</a></li>
        <li class="odd"><a href="#">-</a></li>
        <li class="even"><a href="#">-</a></li>
        <li class="odd"><a href="#">-</a></li>
        <li class="even"><a href="#">-</a></li>
        <li class="odd"><a href="#">-</a></li>
        <li class="even"><a href="#">-</a></li>
      </ul>

    </div>
		</td></tr>

	</table>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->

    <!--하단 정보-->
  <div class="footer">

    <!--가운데정렬하기-->
    <div class="center_footer">
	
	<table class ="centered"><tr><td>
      <!--get the company Info from DB-->
      <?php 
        require_once("./h_companyInfo.php");
	 ?>
	 </td></tr></table>

    </div>
  </div>
</div>
<!-- end of main_container -->
</body>
</html>

