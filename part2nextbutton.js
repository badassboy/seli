function captureRadioValue(nextPage,questionId,
    questionLetter,page,totalPage) {

// alert(nextPage + questionId + questionLetter + page + totalPage);
// alert(nextPage);

		// console.log("ama");
   	let selectedValue = "";
   var radioButtons = document.querySelectorAll('input[name="exampleRadios"]');
 console.log(page);
                // console.log(nextPage);
                // console.log(totalPage);
  for(const radioButton of radioButtons){
   	
				if(radioButton.checked){
					// console.log("checked");
   		selectedValue = radioButton.value;
   		// console.log("hi");
			// console.log(selectedValue);
   			$.ajax({
   			type:"POST",
   			url: "process_selected_radio.php",
   			
   			data:{
   				selectedValue: selectedValue,
   				questionId: questionId,
                questionLetter:questionLetter
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