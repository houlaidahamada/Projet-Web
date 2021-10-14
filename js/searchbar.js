function afficherBarre(){
		var display = $(".Barre").css("display");
		
		if(display == "none"){
			$(".Barre").show("Slow");
			$(".Barre").css("display: flex; flex-direction:row;");
		}
		else
		{
			$(".Barre").hide("Slow");
		}
      };