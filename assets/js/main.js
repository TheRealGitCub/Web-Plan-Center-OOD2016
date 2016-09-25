/* global confirm,alert */

var toastTimeout;

function toast(message) {
	$("#toast-inner").text(message);
	$("#toast").addClass("active");
	clearTimeout(toastTimeout);
	toastTimeout = window.setTimeout(function () {
		$("#toast").removeClass("active");
	}, 3000);
}

$(document).ready(function() {
	$("#action-clear-all").click(function(){
		var r = confirm("Are you sure you want to clear all pages? This cannot be undone!");
		if (r) {
			$.ajax({
				url: "/WebPlanCenter/ajax/clearPages.php",
				success: function() {
					$.ajax({
						url: '/WebPlanCenter/ajax/getPages.php',
						success: function(data) {
							$("#content").html(data);
							toast("Pages cleared!");
						}
					});
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
	
	$("[id^='action-new-']").click(function() {
		$("#dialog-add-item").addClass("active");
		$("#dialog-add-item .dialog-page-type").text($(this).find(".action-text").text());
		
		var type = $(this).attr("id").replace("action-new-","");
		
		$("#add-item-name").val("");
		$("#add-item-link").val("");
		$("#add-item-page-type").val(type);
		
		if (type === "external") {
			$("#form-group-add-item-link").removeClass("hidden");
		}
		else {
			$("#form-group-add-item-link").addClass("hidden");
		}
	});
	
	$("#action-about").click(function() {
		$("#dialog-about").addClass("active");
	});
	
});