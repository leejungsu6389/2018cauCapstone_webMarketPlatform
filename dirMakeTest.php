<?php


$mydir = "dir"; 
  if(@mkdir($mydir, 0777)) { 
     if(is_dir($mydir)) { 
         @chmod($mydir, 0777); 
         echo "${mydir} 디렉토리를 생성하였습니다."; 
     } 
  } 
  else { 
     echo "${mydir} 디렉토리를 생성하지 못했습니다."; 
  } 






?>