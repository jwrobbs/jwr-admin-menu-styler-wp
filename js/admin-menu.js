(function ($) {
	$("[class*='-section-header']").on("click", function () {
		let text = this.className;
		let stem = /\s([^\s]+)-section-header/.exec(text);
		console.log(stem[1]);

		if (stem[1]) {
			let target = $("li." + stem[1] + "-section-item");
			$(target).toggle();
		}
	});
})(jQuery);
