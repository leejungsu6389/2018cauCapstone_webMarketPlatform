<?php

  /* input string */
  $s = $_POST["testInput"];
  
  /* 1. prevent html special characters */

  /* block XSS */
  /* replace suspicious input to error code */
  
  /* ASCII character */
  $s = str_replace("&", "_ERR: no typical input: ASCII", $s);
  $s = str_replace("<", "_ERR: no typical input: ASCII", $s);
  $s = str_replace(">", "_ERR: no typical input: ASCII", $s);
  $s = str_replace("\"", "_ERR: no typical input: ASCII", $s);
  
  $s = str_replace("\'", "_ERR: no typical input: ASCII", $s);
  $s = str_replace("/", "_ERR: no typical input: ASCII", $s);
  $s = str_replace("(", "_ERR: no typical input: ASCII", $s);
  $s = str_replace(")", "_ERR: no typical input: ASCII", $s);
  
  
  /* reference character */
  $s = str_replace("&amp;", "_ERR: no typical input: ASCII", $s);
  $s = str_replace("&lt;", "_ERR: no typical input: ASCII", $s);
  $s = str_replace("&gt;", "_ERR: no typical input: ASCII", $s);
  $s = str_replace("&quot;", "_ERR: no typical input: ASCII", $s);
  
  $s = str_replace("&#x27;", "_ERR: no typical input: ASCII", $s);
  $s = str_replace("&#x2F;", "_ERR: no typical input: ASCII", $s);
  $s = str_replace("&#40;", "_ERR: no typical input: ASCII", $s);
  $s = str_replace("&#41;", "_ERR: no typical input: ASCII", $s);


  /* Error code searching */
  if(strpos($s, "_ERR")){
	  print "error detected";
  }
  else{
    print "do something";
  }
  
  
  
  /* 2. use strip_tags() */
  
  $s = $_POST["testInput2"];
  
  strip_tags($_POST["testInput2"]);

?>