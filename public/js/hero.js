$(document).ready(function(){

$('select[name=class]').on('change', function(){

var heroClass = $('select[name=class]').val();
var health;
if (heroClass == 'warrior') {
	health = 100;
	atack = Math.floor(Math.random() * 20) + 10;
	speed = Math.floor(Math.random() * 10) + 5;
	luck = Math.floor(Math.random() * 5) + 1;
	$('.haroHealth').empty().val(health);
	$('.haroAtack').empty().val(atack);
	$('.haroSpeed').empty().val(speed);
	$('.haroLuck').empty().val(luck);
}else if (heroClass == 'wizard') {
	health = 80;
	$('.haroHealth').empty().val(health)
	atack = Math.floor(Math.random() * 10) + 5;
	speed = Math.floor(Math.random() * 8) + 3;
	luck = Math.floor(Math.random() * 15) + 7;
	$('.haroAtack').empty().val(atack);
	$('.haroSpeed').empty().val(speed);
	$('.haroLuck').empty().val(luck);
}else if (heroClass == 'rogue') {
	health = 50;
	$('.haroHealth').empty().val(health);
	atack = Math.floor(Math.random() * 15) + 7;
	speed = Math.floor(Math.random() * 5) + 1;
	luck = Math.floor(Math.random() * 20) + 10;
	$('.heroAtack').empty().val(atack);
	$('.heroSpeed').empty().val(speed);
	$('.heroLuck').empty().val(luck);
}


});

});