function select(id) {
	$(".selected").removeClass("selected");
	$(".selected_item_description").hide();
	$(event.target).addClass("selected");
	$("#select_"+id).show();
}

function hide_description(id) {
	$("#desc_"+id).hide();
}

function show_description(id){
	$("#desc_"+id).show();
}

function page_loaded(){
	$(".TwistedTreeline").hide();
	$(".HowlingAbyss").hide();
}

function show_map(chosen_class){
	switch(chosen_class){
		case 1 :
			$(".image_item").show();
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