function captureRadioValue(nextPage,questionId,lastPage,
	page,totalPage) {
		// console.log("ama");
   	let selectedValue = "";
   var radioButtons = document.querySelectorAll('input[name="exampleRadios"]');

  for(const radioButton of radioButtons){
   	
				if(radioButton.checked){

   		selectedValue = radioButton.value;
   		
			console.log(selectedValue);
   			$.ajax({
   			type:"POST",
   			url: "process_selected_radio.php",
   			
   			data:{
   				selectedValue: selectedValue,
   				questionId: questionId
   				
   				},
   			success: function(response){
   				if (page < totalPage) {
   					location.href = nextPage;
   				}else{
   					location.href = "part1_end.php";
   				}
   				
			
			

   			},
   			error:function(error){
   				console.log("Error:", error);
   			}

   		});
 		
   	}
   	// end of if statement

   	}

   
   	
   	
   }