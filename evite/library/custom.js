(function() {
	
		$( ".event_sub_template" ).click(function(e) {
			var newTemplate = $(this).attr("src");
			$("#event_main_template").attr("src",newTemplate);
			var imagepath=newTemplate.substring(2,newTemplate.length);
			$("#imgpath").val(imagepath);
		});
		
		$("#event_host_name,#event_start,#event_start_time,#event_location").keyup(function(e) {
			var t = "#" + $(this).attr('id') + "_append";
			var m = $(this).attr('id');
			var k = $("#" + m).val();
			$(t).html(k); 		
		});
		
		// this is the id of the form
		$("#event_data").submit(function(e) {
			
			loading();
 
				var formURL = "controller/sendmail.php";
				$.ajax({
					url: formURL,
					type: 'POST',
					dataType:"text",
					contentType: "application/json; charset=utf-8",
					data:  $('#event_data').serialize(),
					mimeType:"multipart/form-data",
					cache: false,
					success: function(data, textStatus, jqXHR)
					{
						 if(data==1){
						 $(event_mail_result).html("mail successfully sent");
						 }
						 else { $(event_mail_result).html("mail not successfully sent"); 
						 }
						 unloading();
					},
					 error: function(jqXHR, textStatus, errorThrown) 
					 {
						$(event_mail_result).html("error to sending mail");
						unloading();
					 }          
					});
					e.preventDefault(); //Prevent Default action. 
					//e.unbind();

		});	
		
		function loading(){
			$(".loader").show();
			$(event_mail_result).show();
		}
		
		function unloading(){
			$(".loader").hide();
			setTimeout(function(){
				$(event_mail_result).hide();
			},3000);
			
		}
		
})()