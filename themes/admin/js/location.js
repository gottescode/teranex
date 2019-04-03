//get State List
$('#country_id').on('change', function() {
	var country_id = $("#country_id").val();
		 $.ajax({
		  type: "GET",
		  url: site_url+"/location/api/getStateList/"+country_id,
		  data: {},
			success: function(result){ 
				$('#state_id').empty();
				 if(result){ 					
						var state_list=result.result; 
						$('#state_id')
							.append($("<option></option>")
							.attr("value",'')
							.text('Select State'));	
						$.each(state_list, function(key, value) { 
							$('#state_id')
							.append($("<option></option>")
							.attr("value",value.sid)
							.text(value.state_name));
						});		
					}
				else if(result.error){
				
				} 
			}
			
		});
});
//get city list
$('#state_id').on('change', function() {
	var country_id = $("#state_id").val();
		 $.ajax({
		  type: "GET",
		  url: site_url+"/location/api/getCityList/"+country_id,
		  data: {},
			success: function(result){ 
				$('#city_id').empty();
				 if(result){ 					
						var city_list= result.result;  
						$.each(city_list, function(key, value) { 
							$('#city_id')
							.append($("<option></option>")
							.attr("value",value.id)
							.text(value.city_name));
						});		
					}
				else if(result.error){
				
				} 
			}
		});
});


  function countryAddress(country_id,appendId) { 
		 $.ajax({
		  type: "GET",
		  url: site_url+"/location/api/getStateList/"+country_id,
		  data: {},
			success: function(result){ 
				$('#stateAddress'+appendId).empty();
				 if(result){ 					
						var state_list=result.result; 
						$('#stateAddress'+appendId)
							.append($("<option></option>")
							.attr("value",'')
							.text('Select State'));	
						$.each(state_list, function(key, value) { 
							$('#stateAddress'+appendId)
							.append($("<option></option>")
							.attr("value",value.sid)
							.text(value.state_name));
						});		
					}
				else if(result.error){
				
				} 
			}
			
		});
	};
	
	
//get city list
function stateAddress(state_id,appendId) { 

//debugger;
		 $.ajax({
		  type: "GET",
		  url: site_url+"/location/api/getCityList/"+state_id,
		  data: {},
			success: function(result){ 
				$('#cityAddress'+appendId).empty();
				 if(result){ 					
						var city_list= result.result;  
						$.each(city_list, function(key, value) { 
							$('#cityAddress'+appendId)
							.append($("<option></option>")
							.attr("value",value.cid)
							.text(value.city_name));
						});		
					}
				else if(result.error){
				
				} 
			}
		});
};

