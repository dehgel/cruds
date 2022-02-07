(function ($) {

	$(document).ready(function() {


		$('.sub-menu .nav-newcontact a').click(function() {

			$('.row .newcontact').css('display','block');

		});
		$('.sub-menu .nav-editcontact a').click(function() {

			$('.row .editcontact').css('display','block');

		});


	});
	
})(jQuery);