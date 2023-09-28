let  c

function captureRadioValue(nextPage,questionId,page,totalPage) {
		// console.log("ama");
   	let selectedValue = "";
   var radioButtons = document.querySelectorAll('input[name="exampleRadios"]');

  for(const radioButton of radioButtons){
   	
				if(radioButton.checked){
					// console.log("checked");
   		selectedValue = radioButton.value;
   		console.log("hi");
			// console.log(selectedValue);
   			$.ajax({
   			type:"POST",
   			url: "process_selected_radio.php",
   			
   			data:{
   				selectedValue: selectedValue,
   				questionId: questionId
   				},
   			success: function(response){

   				 // Check if there is a next page
                    if (page < totalPage) {
                        // Go to the next page
                        // location.href = 'part2.php?page=' + (currentPage + 1) + '&questionId=<?php echo $questionId; ?>';
                        location.href = nextPage;
                    } else {
                        // If there are no more pages, go to the last page
                        location.href = 'part2_end.php';
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