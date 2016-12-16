$('.files_reports_select').change(function (){
  $('.files_id_filter').hide();
  $('.files_date_filter').hide();
  if($(this).val() == 'file_id') {
     $('.files_id_filter').show();
     $('.files_date_filter').show();
  } else  {
     $('.files_date_filter').show();
  }
  return false;
});
$('.sales_reports_select').change(function (){
  $('.image_id_filter').hide();
  $('.date_filter').hide();
  if($(this).val() == 'id_filter') {
     $('.image_id_filter').show();
  } else if ($(this).val() == 'date_filter') {
     $('.date_filter').show();
  }
  return false;
});
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