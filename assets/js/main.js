/* global confirm,alert */
$(document).ready(function() {
	$("#action-clear-all").click(function(){
		var r = confirm("Are you sure you want to clear all pages? This cannot be undone!");
		if (r) {
			$.ajax({
				url: "/WebPlanCenter/ajax/clearPages.php",
				success: function() {
					location.reload();
				},
				error: function() {
					alert("Oops! Something went wrong.");
				}
			});
		}
	});
	
	$("#form-add-item").submit(function() {
		$.ajax({
			url: '/WebPlanCenter/ajax/newPage.php',
			data: {
				name: $("#add-item-name").val(),
				typeString: $("#add-item-page-type").val(),
				children: []
			},
			beforeSend: function() {
				if ($("#add-item-name").val() === "") {
					alert("Please provide a page name");
					return false;
				}
			},
			success: function() {
				$.ajax({
					url: '/WebPlanCenter/ajax/getPages.php',
					success: function(data) {
						$("#content").html(data);
						$("#dialog-add-item").removeClass("active");
					}
				});
			}
		});
		return false;
	});
	
	$(".dialog-cancel").click(function() {
		$(".dialog-outer.active").removeClass("active");
	});
	
});