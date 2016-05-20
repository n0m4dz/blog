$(function(){
	alert('Hello jQuery');
	console.info('working with elixir tool');

	var el = helloUglify();
	console.log(el);
	
});


var helloUglify = function(){
	var el = document.getElementById('jqueryDiv');
	return el;
}