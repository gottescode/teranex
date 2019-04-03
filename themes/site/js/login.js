//login form validation 
 $("#loginPopop").validate({ 
 
	rules:  {  
				user_email: {
					required:true
				},
				user_password: {
					required:true
				} 
			},
			messages: { 
				user_email: {
					required:"Please enter email id"
				},
				user_password: {
					required:"Please enter password"
				}, 
			}, 
			submitHandler: function(loginPopop){  
				$(".loader").show();
				dataUrl = $("#loginPopop").serialize();
				$.ajax({
					type : "POST",
					 url : site_url + "pages/ajaxLogin",
					data : dataUrl,
					dataType: 'json', 
					success : function(result){ 
						$(".loader").fadeOut("slow"); 
						if(result.success=='success'){
							location.reload();
						}
						else if(result.fail=='fail'){
							alert('Login Failed ');
						}
					}
				});
			}
		});  
//reset form validation
$("#reset_form").validate({
   rules: {  
			r_email: "required" 
		},
		messages: { 
			r_email: "Please enter registered email "
		}
	}); 