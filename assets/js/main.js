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
});