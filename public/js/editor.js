function select(id) {
	$(".selected").removeClass("selected");
	$(".selectedItemDescription").hide();
	$(event.target).addClass("selected");
	$("#select_"+id).show();
}

function selectBlock(){
	$(".selectedBlock").removeClass("selectedBlock");
	$(event.target).addClass("selectedBlock");
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
			$(".imageItem").show();
			$(".OriginalSummonersRift").hide();
			$(".SummonersRift").hide();
		break;
		case 2 :
			$(".imageItem").show();
			$(".TwistedTreeline").hide();
		break;
		case 3 :
			$(".imageItem").show();
			$(".HowlingAbyss").hide();
		break;
	}
}

function add_set_item(){
	if ($('.selectedBlock').length !==0 && $('.selected').length !==0){
		alert("Item ajouté en théorie");
		$('.selectedBlock').html($('.selectedBlock').html() + $('.selected').parent().html());
		//$('.selected').html()
	}
	else {
		alert("Non trouvé");
	}
}

function add_set_block(){
	//alert("Adding the object YEAH !");
	$('#sets_zone').html($('#sets_zone').html() + '<div class="setBlock" onclick="selectBlock()"></div>');
}

function delete_selected(){
	if ($('.selectedBlock')!==0){
		$('.selectedBlock').remove();
	}
}

$(document).ready(function() {
    
});