function captureRadioValue(nextPage) {
		// console.log("ama");
   	let selectedValue = "";
   var radioButtons = document.querySelectorAll('input[name="exampleRadios"]');

  for(const radioButton of radioButtons){
   	
				if(radioButton.checked){

   		selectedValue = radioButton.value;
   		
			// console.log(selectedValue);
   			$.ajax({
   			type:"POST",
   			url: "part3_selected_radio.php",
   			
   			data:{
   				selectedValue: selectedValue,
   				},
   			success: function(response){
   				// console.log(response);
   				// go the next page
			location.href = nextPage;

   			},
   			error:function(error){
   				console.log("Error:", error);
   			}

   		});
 		
   	}
   	// end of if statement

   	}

   
   	
   	
   }