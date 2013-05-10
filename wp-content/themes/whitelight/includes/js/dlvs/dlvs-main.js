jQuery.noConflict();
(function($){

	// execute when DOM is ready
	$(document).ready(function() {

		travelguide();

		// search feature on FAQ archive
		searchFaq();

		// accordion slidedown
		$( ".accordion" ).accordion({
			header: 'h4',
			active: false,
			collapsible: false,
			autoHeight: true,
			clearStyle: true
		});

		// add tabs on frontpage
		$("#tabs").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 7000, true);

		// booking iframe
		$('.template.booking a.button-book.iframe').click(function(e){
			e.preventDefault();
			var booking_url = $(this).attr('href');
			loadBookingIframe(booking_url);
		});

		// vaccination lightbox
		vaccinationLightbox();

		// toolstips
		$( '.vaccination-group' ).tooltip();
	});

	/*
	 * functions begin
	 **************************************************************************************/


	/******************
	 * Search as you type: find country
	 ******************/
	function travelguide(){
		// hide submit button for js-enabled users
		$('.map-form [type=submit]').hide();


		// old-school change page on click
		$('#country-selector').change(function(){
			var url = $(this).val();
			window.location.href = url;
		});

		// search as you type on country finder
		//$('select#country-selector').selectToAutocomplete();
	}

	/******************
	 * On single-country a list of vaccinations is shown. When clicked they will fetch the single-vaccination page with ajax
	 ******************/
	function vaccinationLightbox(){

		// close dialog when click outside
		$(".ui-widget-overlay").live("click", function () {
				$(".vaccinationModal").dialog( "close" );
		});

		// bind modal window (jQueryUI dialog) to vaccination-links
		$('.vaccination-name a').click(function() {

			// set url
			var url = this.href + "?ajax=true";

			// create new modal window
			var vaccinationModalElm = $('<div></div>').addClass('vaccinationModal').attr('title', 'Vaccination details').appendTo('body');

			// lightbox options
			vaccinationModalElm.dialog({
			modal: true,
			draggable: false,
			resizable: false,
			width: 600,
				show: "fade",
				hide: "fade",
				position: ['center', 100]
			});

			// load content into window
			vaccinationModalElm.load(url,	function(responseText, textStatus, XMLHttpRequest) {
				$(vaccinationModalElm).dialog('open');

				// remove id attribute "content" ot remove fixed width
				$(this).children('#content').removeAttr('id');

				// bind accordion
				$( ".accordion" ).accordion({ header: 'h4', active: false, collapsible: true });
			});

			// prevent the browser from following the link
			return false;
		});
	}

	/******************
	 * FAQ: search through questions and answers
	 ******************/
	function searchFaq(){
		// during text input
		$('#searchFaq').keyup(function() {

			var search_word = $(this).val();

			// clear when input is empty
			if(search_word === ""){
				$('#clearSearch').trigger('click');
				return false;
			}

			// length of word must be above 3 to trigger search
			if(search_word.length < 3){
				return false;
			}

			// hide and close all
			$(".accordion h4, .faq h3").hide();
			$('.accordion').accordion( "activate" , false );

			// find matches
			var matches = $(".accordion h4:contains("+search_word+")");
			var contentMatches = $(".accordion div:contains("+search_word+")").prev('h4');
			matches = matches.add(contentMatches);

			// show matches
			matches.show();
			matches.parent('.accordion').prev('h3').show();
		});

	/******************
	 * FAQ: clear search results
	 ******************/
		$('#clearSearch').click(function() {
			// hide answers
			$('.accordion').accordion( "activate" , false );

			// show containers and headings
			$(".accordion h4, .faq h3").fadeIn();


			// clear input field
			$("#searchFaq").val("");
			return false;
		});

		// extending jquery - case-insensitive ":contains"
		jQuery.expr[':'].contains = function(a, i, m) {
		return jQuery(a).text().toUpperCase()
			.indexOf(m[3].toUpperCase()) >= 0;
		};
	} // search faq end

})(jQuery);


var loadBookingIframe = function(booking_url){
	jQuery('.zebra').fadeOut('fast', function() {
		jQuery('.template.booking iframe').attr('src', booking_url).show();
	});
};