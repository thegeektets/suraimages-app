function set_session() {
	console.log('setting session');
	sessionStorage.setItem('onReload', 'activateContributor');
}
$(".approve_img").click(function(){
	if ($(this).attr('id') == "approve") {
		$(this).parents(".approve").find(".file_status").val(1);
		$(this).parentsUntil(".edit_item").css({'background':'#d6de23'});
	} else if ($(this).attr('id') == "decline") {
		$(this).parents(".approve").find(".file_status").val(2);
		$(this).parentsUntil(".edit_item").css({'background':'#f8991c'});
	}
	console.log($(this).parents(".approve").find(".file_status").val());
	return false;
});