$(document).ready(function() {
	$(".rate_dialog").dialog({
      modal: true,
      autoOpen: false,
      resizable: false,
      width: 400,
      show: {
        effect: "blind",
        duration: 500
      },
      hide: {
        effect: "blind",
        duration: 500
      }
    });
})


function enable_voting() {
	$badges = $(".badges");

	$badges.hover(function() {
		$(this).css('background-color', 'rgb(40, 44, 47)');
	}, function() {
		$(this).css('background-color', 'rgb(83, 117, 155)');
	});

	$badges.attr('title', 'Click to rate the article');

    $(".badges").click(function() {
    	var id = $(this).attr('id');
    	$('#dialog_' + id).dialog("open");
    });
}