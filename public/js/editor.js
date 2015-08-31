function light() {
	//alert("Test");
}

function hide_description(id) {
	$("#"+id).hide();
}

function show_description(id){
	$("#"+id).show();
}

function page_loaded(){
	$(".TwistedTreeline").hide();
	$(".HowlingAbyss").hide();
}

function show_map(chosen_class){
	switch(chosen_class){
		case 1 :
			$(".image_item").hide();
			$(".OriginalSummonersRift").hide();
			$(".SummonersRift").hide();
		break;
		case 2 :
			$(".image_item").show();
			$(".TwistedTreeline").hide();
		break;
		case 3 :
			$(".image_item").show();
			$(".HowlingAbyss").hide();
		break;
	}
}

$(document).ready(function() {
    
});