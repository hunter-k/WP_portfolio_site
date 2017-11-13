$( document ).ready(function() {
	newPageLoad = true;
	function changeMenu () {
		var curUrl = ($(location).prop('href'));
		curPage = curUrl.substring(curUrl.indexOf('#') + 1, curUrl.length);
		if (curPage.indexOf(':') === -1) {
			if (curPage.indexOf('/') > 0) {
				curPage = curPage.substring(0, curPage.indexOf('/'));
			}
			$("#menu li").css({"background-color": "rgba(157, 167, 183, 0.5)"});
			$("." + curPage).css({"background-color": "rgba(157, 167, 183, 0.9)"});
			// $("#" + curPage + "-page").fadeIn(500);
			if (curPage === "Portfolio") {
				$("#fp-nav").fadeOut(500);
			} else {
				$("#fp-nav").fadeIn(500);
			}
		} else {
			$(".Me").css({"background-color": "rgba(157, 167, 183, 0.9)"});
		}
	}
	changeMenu();
	$(window).on('hashchange', function(e){
		changeMenu();	
	});
});