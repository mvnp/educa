$(document).ready(function(){
	$('.username').mask('@AAAAAAAAAAAAAAAAAAAA', {'translation': {A: {pattern: /[A-Za-z0-9_-]/}}});
	$('.money').mask("#.##0.00", {reverse: true});
})
