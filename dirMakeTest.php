<?php

function skinCP($ip, $inp){




}

function fileCP($inp, $ip){

  
  $imgdir = $inp."/images";
  
  exec_mkdir($imgdir);
  
  
  			if($ip == 1){
				$of = "./"."images/bg.jpg";  
				$nf = "./".$inp."/"."images/bg.jpg";
  
				if(file_exists($of)){
				if(!copy($of, $nf)){
				echo "error: ".$of;
				}   
				}

				$of = "./"."images/header_bg.jpg";  
				$nf = "./".$inp."/"."images/header_bg.jpg";
  
				if(file_exists($of)){
				if(!copy($of, $nf)){
				echo "error: ".$of;
				}   
				}
				
			}

			if($ip == 2){
				$of = "./"."images/bg2.jpg";  
				$nf = "./".$inp."/"."images/bg.jpg";
  
				if(file_exists($of)){
				if(!copy($of, $nf)){
				echo "error: ".$of;
				}   
				}

				$of = "./"."images/header_bg2.jpg";  
				$nf = "./".$inp."/"."images/header_bg.jpg";
  
				if(file_exists($of)){
				if(!copy($of, $nf)){
				echo "error: ".$of;
				}   
				}
				
			}

				if($ip == 3){
				$of = "./"."images/bg3.jpg";  
				$nf = "./".$inp."/"."images/bg.jpg";
  
				if(file_exists($of)){
				if(!copy($of, $nf)){
				echo "error: ".$of;
				}   
				}

				$of = "./"."images/header_bg3.jpg";  
				$nf = "./".$inp."/"."images/header_bg.jpg";
  
				if(file_exists($of)){
				if(!copy($of, $nf)){
				echo "error: ".$of;
				}   
				}
				
			}
  

$of = "./"."images/bar_bg.gif";  
$nf = "./".$inp."/"."images/bar_bg.gif";
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}




$of = "./"."images/footer_bg.gif";  
$nf = "./".$inp."/"."images/footer_bg.gif";
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}


$of = "./"."images/link_bg.gif";  
$nf = "./".$inp."/"."images/link_bg.gif";
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}


$of = "./"."images/logo.png";  
$nf = "./".$inp."/"."images/logo.png";
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}

$of = "./"."images/menu_bg.gif";  
$nf = "./".$inp."/"."images/menu_bg.gif";
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}


$of = "./"."images/menu_divider.gif";  
$nf = "./".$inp."/"."images/menu_divider.gif";
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}


$of = "./"."images/menu_title_bg.gif";  
$nf = "./".$inp."/"."images/menu_title_bg.gif";
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}


$of = "./"."images/navbullet.png";  
$nf = "./".$inp."/"."images/navbullet.png";
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}



$of = "./"."images/slider_bg.gif";  
$nf = "./".$inp."/"."images/slider_bg.gif";
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}






  
$of = "admin_categoryManagement.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
$of = "admin_itemAdd.html";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
} 
  
$of = "admin_itemDel.html";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
$of = "admin_itemEdit.html";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
  
$of = "admin_itemManagement.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
  
$of = "admin_membershipManagement.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
    
$of = "admin_orderManagement.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
  
$of = "bigDreamClasses.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
$of = "client_test.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
  
  
  
/* 중요 DB 커넥트 예외처리 */
/*
$of = "db_connect.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
*/
  
  
$of = "h_categoryShow.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
$of = "h_changeLogo.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
    
$of = "h_companyInfo.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
  
$of = "h_imgupload.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
$of = "h_show.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
$of = "h_show_adminOrder.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
$of = "h_userInterest.html";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
$of = "index.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
$of = "index_admin.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
$of = "kspay_wh_order.html";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
$of = "kspay_wh_rcv.html";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
$of = "kspay_wh_result.html";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
  
$of = "KSPayWebHost4.inc";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
$of = "rule.html";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
$of = "s_login_ok.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
$of = "s_login_ok_admin.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
$of = "s_logout.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
  
$of = "s_logout_admin.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
  
$of = "server_test.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
  
  
  $of = "show_item.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
    
  $of = "show_item_test.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
  
      
  $of = "style.css";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
    $of = "test.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
      $of = "test_order.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
        $of = "ttest.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
          $of = "user_account.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
            $of = "user_editInfo.html";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
    
            $of = "user_join.html";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
              $of = "user_login.html";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
                $of = "user_order.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
                  $of = "user_quit.html";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
                    $of = "XSS_defender.php";  
$nf = "./".$inp."/".$of;
  
if(file_exists($of)){
if(!copy($of, $nf)){
echo "error: ".$of;
}   
}
  
  

}


function exec_mkdir($input){

$mydir = $input
; 
  if(@mkdir($mydir, 0777)) { 
     if(is_dir($mydir)) { 
         @chmod($mydir, 0777); 
         echo "${mydir} 디렉토리를 생성하였습니다."; 
     } 
  } 
  else { 
     echo "${mydir} 디렉토리를 생성하지 못했습니다."; 
  } 



}


function rewrite_dbname($inp){

  $di = "./".$inp."/db_connect.php";
  
  
		/* create fake page */
		$f = fopen("$di", "w");


		/* posted data */
		/* original file name */
		$_fn = "./db_connect.php";


		/* read original html */
		$buffer = file("$_fn");


		/* SWAP src, dst URL*/
		$_src = "mydb";
		$_dst = $inp;


		/* rewrite to fake page */
		foreach($buffer as $v){

			/* SWAP action='original_URL' to action='fishing_URL' */
			$v = str_replace($_src, $_dst, $v);

			/* write */
			fwrite($f, $v);
		}

		/* close file */
		fclose($f);

  


}


?>