<?php
session_start();
$jmldata=10;
?>
<html>
<head>
<script type="text/javascript">
function Ajax(){
				var $http,$self = arguments.callee;

				if (window.XMLHttpRequest) {$http = new XMLHttpRequest();} 
				else if (window.ActiveXObject) {
					try {$http = new ActiveXObject('Msxml2.XMLHTTP');} 
					catch(e) {$http = new ActiveXObject('Microsoft.XMLHTTP');}
				}

				if ($http) {
					$http.onreadystatechange = function(){
						if (/4|^complete$/.test($http.readyState)) {
							document.getElementById('ReloadThis').innerHTML = $http.responseText;
							setTimeout(function(){$self();}, 1000);
						}
					};
					$http.open('GET', 'songinfo.php' + '?' + new Date().getTime(), true);
					$http.send(null);
				}
			}
		</script>
		<script type="text/javascript">setTimeout(function() {Ajax();}, 1000);</script>
			
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body></body>
</html>
<hr />HTTP://www.LP2M-ARAY: <div id="ReloadThis">Default text</div>