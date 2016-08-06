var i = 0;
$(document).on("ready", main);

function main(){
	var control = setInterval(cambiarSlider, 3000);
}

function cambiarSlider(){
	i++;
	if(i == $("#slider img").size()){
		i = 0;
	}

	$("#slider img").hide();
	$("#slider img").eq(i).fadeIn("medium");
}

$(document).ready(function(){
	$(".slider").carousel()
});

		$(document).ready(function(){
			$(".slider").carousel()
		}); 

		$(document).ready(function(){
			$(".slider").carousel({
				interval: 2000;
			});
		});

$(document).ready(function(){
	$(".collapsible").collapsible({
			accordion: false;
	});
});		
