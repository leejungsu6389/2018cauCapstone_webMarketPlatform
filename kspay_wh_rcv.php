<? 
   if (function_exists("mb_http_input")) mb_http_input("euc-kr"); 
   if (function_exists("mb_http_output")) mb_http_output("euc-kr");
?>

        <script>
          location.href='index.php?clearCart=1';
        </script>
      
<?
    $rcid       = $_POST["reCommConId"];
    $rctype     = $_POST["reCommType"];
    $rhash      = $_POST["reHash"];
	
	$p_protocol = "http";
	if (strlen($_SERVER['SERVER_PROTOCOL'])>4 && "https" == substr($_SERVER['SERVER_PROTOCOL'],0,5) )
	{
		$p_protocol = "https";
	}
?>
<html>
<head>
<meta http-equiv="Cache-Control" content="no-cache"> 
<meta http-equiv="Pragma" content="no-cache"> 
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<title>KSPay(<?echo($rcid)?>)</title>
<script language="JavaScript">
<!--
    function init()
	{
 		if (typeof(top.opener) == "undefined" || typeof(top.opener.eparamSet) == "undefined" || typeof(top.opener.goResult) == "undefined")
 		{
 			alert("ERROR: �ֹ��������� Ȯ���� �� ���� ������ �ߴ��մϴ�!!");
 			self.close();
 			return;
 		}
<? if (!empty($rcid) && 10 > strlen($rcid)) { ?>
		alert("ERROR: ������û����(<?echo($rcid)?>)�� Ȯ���� �� ���� ������ �ߴ��մϴ�!!");
		self.close();
		return;
<? }else{ ?>
        top.opener.eparamSet("<?echo($rcid)?>","<?echo($rctype)?>","<?echo($rhash)?>");
        top.opener.goResult();
<? } ?>
		setTimeout( 'self.close()', '3000' );
    }

    init();
-->
</script>
</head>
<body>
 	<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
        <td valign="middle" align="center"><table width="450" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="<?echo($p_protocol)?>://kspay.ksnet.to/store/KSPayFlashV1.3/mall/imgs/processing.gif" width="450" height="141"></td>
          </tr>
          <tr>
            <td><img src="<?echo($p_protocol)?>://kspay.ksnet.to/store/KSPayFlashV1.3/mall/imgs/process_step.gif" width="456" height="20"></td>
          </tr>
        </table>		
		</td>
      </tr>
    </table>
</body>
</html>