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
              echo "<tr>";
              echo "<td>아이디</td>";
              echo "<td>";
              echo "<input type='text' name='user_id' tabindex='1'/>";
              echo "</td>";
              echo "<td rowspan='2'>";
              echo "<input type='submit' tabindex='3' value='로그인' style='height:50px'/>";
              echo "</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>비밀번호</td>";
              echo "<td>";
              echo "<input type='password' name='user_pw' tabindex='2'/>";
              echo "</td>";
              echo "</tr>";
              echo "</table>";
              echo "</form>";
            
            }
            
            /* 로그인 상태 */
            else{
              $user_id = $_SESSION['user_id'];
              $user_name = $_SESSION['user_name'];
              echo "<p>안녕하세요. $user_name($user_id)님</p>";
              echo "<p><a href='s_logout.php'>로그아웃</a></p>";
              echo "<br/>";
              echo "test<br/>";
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
            if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {

              echo '<li><a href="index.php?menu=join" class="nav">회원가입</a></li>';
              echo '<li class="divider"></li>';
            }
            
            /* 로그인 상태 */
            else{
              echo '<li><a href="index.php?menu=myinfo" class="nav">개인정보</a></li>';
              echo '<li class="divider"></li>';
              echo '<li><a href="index.php?menu=cart" class="nav">장바구니</a></li>';
              echo '<li class="divider"></li>';
              echo '<li><a href="index.php?menu=uorder" class="nav">주문조회</a></li>';
              echo '<li class="divider"></li>';
              echo '<li><a href="index.php?menu=quit" class="nav">회원탈퇴</a></li>';
            }

          ?>
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






	  
	  <?php




		/* 초기 페이지 */
		if(!isset($_GET["menu"])){
		
		echo "<div class='center_content'>";

				if(!isset($_GET["category"])){
					echo "카테고리안누름";
					}
					else{
						echo "카테고리 누름";
				}
		

			echo"
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

				  				         <!--상품창-->
      <div class='center_title_bar'>인기 상품</div>
      <div class='prod_box'>
        <div class='center_prod_box'>
          <div class='product_title'><a href='#'>Makita 156 MX-VL</a></div>
          <div class='product_img'><a href='#'><img src='images/p1.jpg' alt='' border='0' /></a></div>
          <div class='prod_price'><span class='reduce'>350$</span> <span class='price'>270$</span></div>
        </div>
        <div class='prod_details_tab'> <a href='#' class='prod_buy'>Add to Cart</a> <a href='#' class='prod_details'>Details</a> </div>
      </div>
      <div class='prod_box'>
        <div class='center_prod_box'>
          <div class='product_title'><a href='#'>Bosch XC</a></div>
          <div class='product_img'><a href='#'><img src='images/p2.jpg' alt='' border='0' /></a></div>
          <div class='prod_price'><span class='reduce'>350$</span> <span class='price'>270$</span></div>
        </div>
        <div class='prod_details_tab'> <a href='#' class='prod_buy'>Add to Cart</a> <a href='#' class='prod_details'>Details</a> </div>
      </div>
      <div class='prod_box'>
        <div class='center_prod_box'>
          <div class='product_title'><a href='#'>Lotus PP4</a></div>
          <div class='product_img'><a href='#'><img src='images/p4.jpg' alt='' border='0' /></a></div>
          <div class='prod_price'><span class='reduce'>350$</span> <span class='price'>270$</span></div>
        </div>
        <div class='prod_details_tab'> <a href='#' class='prod_buy'>Add to Cart</a> <a href='#' class='prod_details'>Details</a> </div>
      </div>
      <div class='prod_box'>
        <div class='center_prod_box'>
          <div class='product_title'><a href='#'>Makita 156 MX-VL</a></div>
          <div class='product_img'><a href='#'><img src='images/p3.jpg' alt='' border='0' /></a></div>
          <div class='prod_price'><span class='reduce'>350$</span> <span class='price'>270$</span></div>
        </div>
        <div class='prod_details_tab'> <a href='#' class='prod_buy'>Add to Cart</a> <a href='#' class='prod_details'>Details</a> </div>
      </div>
      <div class='prod_box'>
        <div class='center_prod_box'>
          <div class='product_title'><a href='#'>Bosch XC</a></div>
          <div class='product_img'><a href='#'><img src='images/p5.jpg' alt='' border='0' /></a></div>
          <div class='prod_price'><span class='reduce'>350$</span> <span class='price'>270$</span></div>
        </div>
        <div class='prod_details_tab'> <a href='#' class='prod_buy'>Add to Cart</a> <a href='#' class='prod_details'>Details</a> </div>
      </div>
      <div class='prod_box'>
        <div class='center_prod_box'>
          <div class='product_title'><a href='#'>Lotus PP4</a></div>
          <div class='product_img'><a href='#'><img src='images/p6.jpg' alt='' border='0' /></a></div>
          <div class='prod_price'><span class='reduce'>350$</span> <span class='price'>270$</span></div>
        </div>
        <div class='prod_details_tab'> <a href='#' class='prod_buy'>Add to Cart</a> <a href='#' class='prod_details'>Details</a> </div>
      </div>


        <!--추천 상품-->
      <div class='center_title_bar'>추천 상품</div>
      <div class='prod_box'>
        <div class='center_prod_box'>
          <div class='product_title'><a href='#'>Makita 156 MX-VL</a></div>
          <div class='product_img'><a href='#'><img src='images/p7.jpg' alt='' border='0' /></a></div>
          <div class='prod_price'><span class='reduce'>350$</span> <span class='price'>270$</span></div>
        </div>
        <div class='prod_details_tab'> <a href='#' class='prod_buy'>Add to Cart</a> <a href='#' class='prod_details'>Details</a> </div>
      </div>
      <div class='prod_box'>
        <div class='center_prod_box'>
          <div class='product_title'><a href='#'>Bosch XC</a></div>
          <div class='product_img'><a href='#'><img src='images/p1.jpg' alt='' border='0' /></a></div>
          <div class='prod_price'><span class='reduce'>350$</span> <span class='price'>270$</span></div>
        </div>
        <div class='prod_details_tab'> <a href='#' class='prod_buy'>Add to Cart</a> <a href='#' class='prod_details'>Details</a> </div>
      </div>
      <div class='prod_box'>
        <div class='center_prod_box'>
          <div class='product_title'><a href='#'>Lotus PP4</a></div>
          <div class='product_img'><a href='#'><img src='images/p3.jpg' alt='' border='0' /></a></div>
          <div class='prod_price'><span class='reduce'>350$</span> <span class='price'>270$</span></div>
        </div>
        <div class='prod_details_tab'> <a href='#' class='prod_buy'>Add to Cart</a> <a href='#' class='prod_details'>Details</a> </div>
      </div>
    </div>
    <!-- end of center content -->



			";
			
		}

		/* 세부 페이지 */
		else {

			$qr = $_GET["menu"];


			/* 회원가입 */
			if($qr == "join"){
			
				echo '            

					<table>
					<tr>
					<td>
						여기에 약관 구현
					</td>
					</tr>
					<tr>
					<td>
					<! Account - Join>
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

					<td>
						여기에 유저취향 체크 구현
					</td>
					</tr>
					</table>
				';
			
			}
		}



	  ?>



    <div class="right_content">



        <!--장바구니-->
      <div class="shopping_cart">
        <div class="title_box">Shopping cart</div>
        <div class="cart_details"> 3 items <br />
          <span class="border_cart"></span> Total: <span class="price">350$</span> </div>
        <div class="cart_icon"><a href="#"><img src="images/shoppingcart.png" alt="" width="35" height="35" border="0" /></a></div>
      </div>


        <!--그냥빈칸-->
      <div class="border_box">
      </div>

      <!-- 광고 -->
      <div class="banner_adds"> <a href="#"><img src="images/bann1.jpg" alt="" border="0" /></a> </div>

      <!-- 추천 사이트 -->
      <div class="title_box">추천 사이트</div>
      <ul class="left_menu">
        <li class="odd"><a href="#">Bosch</a></li>
        <li class="even"><a href="#">Samsung</a></li>
        <li class="odd"><a href="#">Makita</a></li>
        <li class="even"><a href="#">LG</a></li>
        <li class="odd"><a href="#">Fujitsu Siemens</a></li>
        <li class="even"><a href="#">Motorola</a></li>
        <li class="odd"><a href="#">Phillips</a></li>
        <li class="even"><a href="#">Beko</a></li>
      </ul>

    </div>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->

    <!--하단 정보-->
  <div class="footer">

    <!--가운데정렬하기-->
    <div class="center_footer">

      <!--get the company Info from DB-->
      <?php 
        require_once("./h_companyInfo.php");
    ?>

    </div>
  </div>
</div>
<!-- end of main_container -->
</body>
</html>
