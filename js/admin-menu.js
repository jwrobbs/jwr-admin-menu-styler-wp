(function ($) {
	// Toggle function.
	$("[class*='-section-header']").on("click", function () {
		let text = this.className;
		let stem = /\s([^\s]+)-section-header/.exec(text);
		// console.log(stem[1]);

		if (stem[1]) {
			let target = $("li." + stem[1] + "-section-item");
			$(target).toggle();
		}
	});

	// "Open" section if item is active.
	var classList = $("li.wp-menu-open").attr("class").split(/\s+/);
	for (var i = 0; i < classList.length; i++) {
		// console.log(classList[i]);
		if (classList[i].includes("-menu-section-item")) {
			// console.log(classList[i] + " match");
			target = $("li." + classList[i]);
			$(target).toggle();
		}
	}
})(jQuery);
