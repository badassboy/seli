function captureRadioValue(nextPage,questionId,lastPage) {
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
   				// console.log(response.html);
   				// go the next page
			location.href = nextPage;
			if (nextPage == lastPage) {
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