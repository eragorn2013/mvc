$(document).ready(function(){	

	/*function message(mess, redirect=false)
	{
		var background = $('<div class="background_modal">');
		var win_mess = $('<div class="mess_modal">');
		var message = $('<span>'+mess+'</span>');
		var close = $('<a class="close_modal_win" href="#js">Закрыть</a>')
		
		win_mess.prepend(message);
		win_mess.append(close);
		background.prepend(win_mess);

		$('.wrapper').prepend(background);
		$('.background_modal').fadeIn();

		$('.wrapper').on('click', '.close_modal_win, .background_modal', function(){
			$('.background_modal').fadeOut(function(){
				$(this).remove();
			});	
			if(redirect)
			{window.location.href = '/';}	

			return false;		
		});
		$('.wrapper').on('click', '.mess_modal', function(e){
			e.stopPropagation();
		});
	}*/
});