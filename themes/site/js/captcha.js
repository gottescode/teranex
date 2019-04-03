 function captcha_refresh(){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200){
				document.getElementById("captcha").src = "data:image/png;base64," + xhttp.responseText;
				document.getElementById("captcha_image").value ='';
			}else{
				
			}
		};
		xhttp.open("GET", captchaUrl, true);
		xhttp.send();
		
	}
	captcha_refresh();