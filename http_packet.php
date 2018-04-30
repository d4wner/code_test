<body bgcolor='#00FFFF'>
<?php
/** 
* 获取HTTP请求原文 
* @return string 
*/
function get_http_raw() { 
$raw = ''; 
 
// (1) 请求行 
$raw .= $_SERVER['REQUEST_METHOD'].' '.$_SERVER['REQUEST_URI'].' '.$_SERVER['SERVER_PROTOCOL']."<br />"; 
 
// (2) 请求Headers 
foreach($_SERVER as $key => $value) { 
if(substr($key, 0, 5) === 'HTTP_') { 
$key = substr($key, 5); 
$key = str_replace('_', '-', $key); 
 
$raw .= $key.': '.$value."<br />"; 
} 
} 
 
// (3) 空行 
$raw .= "<br />"; 
 
// (4) 请求Body 
$raw .= file_get_contents('php://input'); 
 
return $raw; 
}

echo get_http_raw()
?>
</body>