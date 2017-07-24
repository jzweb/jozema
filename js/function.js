$(document).ready(function(){
    

	//****** Efecto de fotos!
	$("#pic1-1").hide();$("#pic2-1").hide();
	$("#pic3-1").hide();$("#pic4-1").hide();
	

		  $("#pic1").mouseenter(function(){
		    $("#pic1-1").show();
		    //$("#pic1").hide();
		});

		  $("#pic1-1").mouseleave(function(){
		    $("#pic1-1").hide();
		    //$("#pic1").show();
		});

		 $("#pic2").mouseenter(function(){
		    $("#pic2-1").show();
		    //$("#pic2").hide();
		});

		  $("#pic2-1").mouseleave(function(){
		    $("#pic2-1").hide();
		    //$("#pic2").show();
		}); 

		 $("#pic3").mouseenter(function(){
		    $("#pic3-1").show();
		    //$("#pic1").hide();
		});

		  $("#pic3-1").mouseleave(function(){
		    $("#pic3-1").hide();
		    //$("#pic1").show();
		});

		 $("#pic4").mouseenter(function(){
		    $("#pic4-1").show();
		    //$("#pic2").hide();
		});

		  $("#pic4-1").mouseleave(function(){
		    $("#pic4-1").hide();
		    //$("#pic2").show();
		});
  });