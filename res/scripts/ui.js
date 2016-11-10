$("body").on("click", "[data-toggle]", function(e){
	var $toggleElement = $("#" + $(e.target).data("toggle"));
	$toggleElement.toggleClass("open");

	if ($toggleElement.hasClass("open")) {
		$toggleElement.find("[autofocus]").eq(0).focus();
	}
});

$("body").on("mousewheel", function(e){
	var direction = e.originalEvent.wheelDelta > 0 ? -1 : 1;
	var potential = $(e.target).closest(".modal .dialog .content").get(0);
	if (potential && (
		(direction == -1 && potential.scrollTop == 0)
		|| (direction == 1 && potential.scrollTop == potential.scrollHeight - potential.offsetHeight)
	)) {
		e.preventDefault();
	}
});

$("body").on("reset", ".modal form", function(e){
	$(e.target).closest(".modal").removeClass("open");
});

document.body.addEventListener("click", function(e){
	if ($(e.target).is("[data-confirm]") && !confirm($(e.target).data("confirm"))) {
		e.stopImmediatePropagation();
	}
}, true);
