function isScrolledIntoView(elem, partial) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return partial
		? (elemTop >= docViewTop && elemTop <= docViewBottom) || (elemBottom >= docViewTop && elemBottom <= docViewBottom)
		: (elemBottom <= docViewBottom && elemTop >= docViewTop);
	;
}

$(window).on("scroll", (function(){
	var footer = document.querySelector("body > footer nav");
	return function(){
		if (isScrolledIntoView(footer)) {
			document.body.classList.add("at-end");
		} else {
			document.body.classList.remove("at-end");
		}
	};
})());

(function(){
	var slides = document.querySelectorAll("#hero li");
	var last;
	var secondLast;

	function step(index) {
		if (secondLast) {
			secondLast.classList.remove("last");
		}
		if (last) {
			last.classList.remove("current");
			last.classList.add("last");
			secondLast = last;
		}
		slides[index].classList.add("current");
		last = slides[index];
		setTimeout(step, 4000, (index + 1) % slides.length);
	}

	step(0);
})();
