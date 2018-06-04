<?php




?>

<body>

  <form action="server_test.php" method="post">


  <input type="hidden" name="_WHAT_TO_DO" value="JOIN_ACCOUNT">


    A결제방법

    A성공여부 ()  :성공여부값은 영어 대문자 O,X입니다.

    응답코드

    A주문번호

    A금액

    거래번호  :KSNET에서 부여한 고유번호입니다.

    A거래일자

    A거래시간

    카드사 승인번호/은행 코드번호 :카드사에서 부여한 번호로 고유한값은 아닙니다.





    <div class="jLabel">
  <label> 결제방법</label>
  </div>
  <input type="text" name="_name" value="" style=" width:200px;">
  <br>

  <div class="jLabel">
  <label> 성공여부 </label>
  </div>
  <input type="text" name="_zipCode" value="" style=" width:200px;">
  <br>

  <div class="jLabel">
  <label> address: 상세주소</label>
  </div>
  <input type="text" name="_address" value="" style=" width:200px;">
  <br>

  <div class="jLabel">
  <label> email: 이메일</label>
  </div>
  <input type="text" name="_email" value="" style=" width:200px;">
  <br>

  <div class="jLabel">
  <label> telNum: 전화번호</label>
  </div>
  <input type="text" name="_telNum" value="" style=" width:200px;">
  <br>

  <input type="submit" value="회원가입">
  <br>
  </form>
  
</body>