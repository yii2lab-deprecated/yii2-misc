
$(function() {
	if (Boolean(sessionStorage.getItem("sidebar-toggle-collapsed"))) {
		$("body").addClass("sidebar-collapse");
	}
	
	$(".sidebar-toggle").click(function(e) {
		e.preventDefault();
		if (Boolean(sessionStorage.getItem("sidebar-toggle-collapsed"))) {
			sessionStorage.setItem("sidebar-toggle-collapsed", "");
		} else {
			sessionStorage.setItem("sidebar-toggle-collapsed", "1");
		}
	});
});
