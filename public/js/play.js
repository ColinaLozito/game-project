$(document).ready(function(){

function getEnemy(){
	
}

getEnemy();

var enemy = getEnemy();

$('.playBtn').on('click', function(){
	var heroIndex = $.parseJSON($(this).val());
    playgame(heroIndex, enemy);
    $('#heroAvailable').empty();


});


function playgame(hero, enemy){
	var hID = hero.id;
	var hName = hero.name;
	var hClass = hero.class;
	var hAtack = hero.atack;
	var hSpeed = hero.speed;
	var hLock = hero.luck;
	var hHealth = hero.health;

	$('.gameContent').show();
	$('#heroID').empty().append(hID);
	$('#heroN').empty().append(hName);
	$('#heroC').empty().append(hClass);
	$('#heroA').empty().append(hAtack);
	$('#heroS').empty().append(hSpeed);
	$('#heroL').empty().append(hLock);
	$('#heroH').empty().append(hHealth);

	var hID = parseInt($('#heroID').empty().append(hID));
	var hName = $('#heroN').text();
	var hClass = $('#heroC').text();
	var hAtack = parseInt($('#heroA').text());
	var hSpeed = parseInt ($('#heroS').text());
	var hLock = parseInt ($('#heroL').text());
	var hHealth = parseInt ($('#heroH').text());

	var warriorImg = '<img src="https://s-media-cache-ak0.pinimg.com/originals/74/3d/bc/743dbcae0940fb56f25a37d50bd003c2.gif">';
	var wizardImg = '<img src="https://s-media-cache-ak0.pinimg.com/originals/3f/17/34/3f173486753fa3dca648e290d8015cc9.gif">';
	var rogueImg = '<img src="http://k37.kn3.net/taringa/6/4/1/4/7/8/5/soyjimmy/62B.gif?6838">';
	if (hClass == 'warrior') {
		$('.heroAnimat').append(warriorImg)
	}else if (hClass == 'wizard') {
		$('.heroAnimat').append(wizardImg)
	}else if (hClass == 'rogue') {
		$('.heroAnimat').append(rogueImg)
	}

	if (hHealth <= 0) {
		console.log(hHealth);
		$('.enemyInfo').hide();
		$('.buttonsOption').hide();
		$('#heroH').empty().append('DEAD');
		$('.heroAnimat').empty().append('<img src="https://cdn3.iconfinder.com/data/icons/halloween-29/64/grave-512.png">');
	}else{
		// 	
		$('.enemyInfo').show();
		$('.buttonsOption').show();
	}

	$('#find').on('click', function(){

		$.get('play/enemies', function (data) {
			var dataLength = data.length;
			var enemy = Math.floor(Math.random() * dataLength+1) + 1;
			if (enemy == 4) {
				$('#enemyC').empty();
				$('#enemyH').empty();	
				console.log('there is no enemy around');
			}else{
				$('#atack').show();
				$('#run').show();
				$('#find').hide();
				$('#luck').hide();
				var enemy = data[enemy-1];
				var enemyDefense = enemy.defense;
				var enemyDamage;
				if (enemy.class == 'ghost'){
					var ghostImg = '<img src="https://68.media.tumblr.com/bd172c9b6928e5b148be37d5a13e739a/tumblr_o21bscL3FW1uf5cjoo1_400.gif">';
					$('.enemyAnimat').empty().append(ghostImg);
					enemyDamage = Math.floor(Math.random() * 5) + 1;
					$('#enemyD').empty().append(enemyDamage);
					console.log('you found a' + enemy.class);	
				}else if (enemy.class == 'zombie'){
					var zombieImg = '<img src="https://s-media-cache-ak0.pinimg.com/originals/37/b0/48/37b04822a0289888d4423f6daabe04a6.gif">';
					$('.enemyAnimat').empty().append(zombieImg);
					enemyDamage = Math.floor(Math.random() * 8) + 3;
					$('#enemyD').empty().append(enemyDamage);
					console.log('you found a' + enemy.class);
				}else if (enemy.class == 'thief'){
					var thiefImg = '<img src="https://s-media-cache-ak0.pinimg.com/originals/17/ff/eb/17ffebb04981d2273ea00195ea2bfdcf.jpg">';
					$('.enemyAnimat').empty().append(thiefImg);
					enemyDamage = Math.floor(Math.random() * 15) + 5;
					$('#enemyD').empty().append(enemyDamage);
					console.log('you found a' + enemy.class);
				}

				$('#enemyC').empty().append(enemy.class);
				$('#enemyH').empty().append(enemyDefense);	
			}
			
		});

	})

	$('#atack').on('click', function(){
		var heroHealth = parseInt($('#heroH').text());
		var enemyHealth = parseInt($('#enemyH').text());
		var heroAtack = parseInt($('#heroA').text());
		var heroAtack = Math.floor(Math.random() * heroAtack) + 1;
		var enemyDamage = parseInt($('#enemyD').text());
		var enemyDamage = Math.floor(Math.random() * enemyDamage) + 1;

		if (heroHealth > 0) {
			$('.logsContent').append('Your damage is '+ heroAtack);
			console.log('Your damage is '+ heroAtack)
			enemyHealth = enemyHealth - heroAtack;
			$('.logsContent').append('enemy life is ' + enemyHealth);
			console.log('enemy life is ' + enemyHealth);
	

			if (heroAtack == parseInt($('#heroA').text())) {
				$('.enemyAnimat').empty().append('<img src="https://www.karyasarma.com/wp-content/uploads/2016/12/poof.png"');
				console.log('you have doned ' +heroAtack+ ' of damage to the enemy and he left');
				$('#enemyC').empty();
				$('#enemyH').empty();
				$('#enemyD').empty();
				$('#find').show();
				$('#luck').show();
				$('#atack').hide();
				$('#run').hide();
			}

			$('#enemyH').empty().append(enemyHealth);
			if (enemyHealth > 0) {
				heroHealth = heroHealth - enemyDamage;
				$('#heroH').empty().append(heroHealth);	

				heroID = parseInt($('#heroID').text());
				heroName= $('#heroN').text();
				heroHealth=$('#heroH').text();

				$.ajax({
	                url: 'play/heroUpdate',
	                type: 'GET',
	                data: { id: heroID, health: heroHealth },
	                success: function(response)
	                {
	                    // console.log(response);
	                }
	            });

	            if (parseInt($('.heroH').text())<=0) {
	            	$('#heroH').empty().append('DEAD');
	            	$('.heroAnimat').empty().append('<img src="https://cdn3.iconfinder.com/data/icons/halloween-29/64/grave-512.png">');
	            	$('.buttonsOption').hide();
	            }
			}else{
				$('.logsContent').append('you have killed the ' + $('#enemyC').text());
				console.log('you have killed the ' + $('#enemyC').text());
				$('.enemyAnimat').empty().append('<img src="http://disney.com.au/competitions/marvel-xd-prize-grab/assets/img/custom/win.png?v9">');
				$('#enemyC').empty();
				$('#enemyH').empty();
				$('#enemyD').empty();
				$('#find').show();
				$('#luck').show();
				$('#atack').hide();
				$('#run').hide();

			}
		}else if(heroHealth <= 0){
			$('#heroH').empty().append('DEAD');
			$('.heroAnimat').empty().append('<img src="https://cdn3.iconfinder.com/data/icons/halloween-29/64/grave-512.png">');
			$('.buttonsOption').hide();
		}

	})

	$('#run').on('click', function(){
		$('#enemyC').text();
		var run = Math.floor(Math.random() * (hSpeed+(hSpeed/2) )) + 1;
		if (run >= hSpeed ) {
			$('#enemyC').empty();
			$('#enemyH').empty();
			$('#find').show();
			$('#luck').show();
			$('#atack').hide();
			$('#run').hide();
			$('#enemyD').empty()
			console.log('you have scaped from the enemy');
		}else if(run == hSpeed-1){
			var enemyDamage = $('#enemyD').text();
			enemyDamage = parseInt(enemyDamage);
			hHealth = hHealth - enemyDamage;
			$('#heroH').empty().append(hHealth);
			console.log('enemy done to yo ' + enemyDamage  + ' of damage');
		}else if(run <= hSpeed-2){
			var loseLife = Math.floor(Math.random() * ((hSpeed+hAtack)/2) ) + 1;
			console.log('you run and to fast and you have get ' + loseLife + ' of damage');
			hHealth = hHealth - loseLife;
			$('#heroH').empty().append(hHealth);
		}

	})

	$('#luck').on('click', function(){
		var luck = parseInt($('#heroL').text());
		luckyRand = Math.floor(Math.random() * ( luck+ (luck/2)) ) + 1;
		console.log('your lock is ' + luckyRand);
		if (luckyRand == luck) {
			console.log('you found a shiny TREASURE');
		}else if (luckyRand >= (luck - 4)) {
			console.log('You found a HORDER of enemies, you die');
			var heroHealth = parseInt($('#heroH').text());
			heroHealth = heroHealth - heroHealth;
			$('#heroH').empty().append(heroHealth);
			heroID = parseInt($('#heroID').text());
			heroHealth = parseInt($('#heroH').text());
			// console.log(heroID + ' - ' + heroHealth);

			$.ajax({
                url: 'play/heroUpdate',
                type: 'GET',
                data: { id: heroID, health: heroHealth },
                success: function(response)
                {
                    console.log(response);
                    $('#heroH').empty().append('DEAD');
                    $('.heroAnimat').empty().append('<img src="https://cdn3.iconfinder.com/data/icons/halloween-29/64/grave-512.png">');
                    $('.buttonsOption').hide();

                }
            });
		}else{
			console.log('Your luck never gonna change!!!!!');
		}
	});

	


	
}

});