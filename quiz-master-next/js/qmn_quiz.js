/**************************
 * Quiz And Survey Master 
 *************************/

/**************************
 * This object contains the newer functions. All global functions under are slowly 
 * being deprecated and replaced with rewritten newer functions
 **************************/
var QSM;
(function ($) {
	QSM = {
		/**
		 * Initializes all quizzes or surveys on the page
		 */
		init: function() {
			// Makes sure we have quizzes on this page
			if ( typeof qmn_quiz_data != 'undefined' && qmn_quiz_data) {
				// Cycle through all quizzes
				_.each( qmn_quiz_data, function( quiz ) {
					quizID = parseInt( quiz.quiz_id );
					QSM.initPagination( quizID );
					if ( quiz.hasOwnProperty( 'timer_limit' ) && 0 != quiz.timer_limit ) {
						QSM.initTimer( quizID );
					}				
				});
			}
		},

		/**
		 * Sets up timer for a quiz
		 * 
		 * @param int quizID The ID of the quiz
		 */
		initTimer: function( quizID ) {

			// Gets our form
			$quizForm = QSM.getQuizForm( quizID );

			// If we are using the newer pagination system...
			if ( 0 < $quizForm.children( '.qsm-page' ).length ) {
				// If there is a first page...
				if ( qmn_quiz_data[quizID].hasOwnProperty('first_page') && qmn_quiz_data[quizID].first_page ) {
					// ... attach an event handler to the click event to activate the timer.
					jQuery( '#quizForm' + quizID ).closest( '.qmn_quiz_container' ).find( '.mlw_next' ).on( 'click', function(event) {
						event.preventDefault();
						if ( !qmn_timer_activated && qmnValidatePage( 'quizForm' + quizID ) ) {
							qmnActivateTimer( quizID );
						}
					});
				// ...else, activate the timer on page load.
				} else {
					qmnActivateTimer( quizID );
				}
			// ...else, we must be using the questions per page option.
			} else {
				if ( qmn_quiz_data[quizID].hasOwnProperty('pagination') && qmn_quiz_data[quizID].first_page ) {
					jQuery( '#quizForm' + quizID ).closest( '.qmn_quiz_container' ).find( '.mlw_next' ).on( 'click', function(event) {
						event.preventDefault();
						if ( !qmn_timer_activated && ( 0 == $( '.quiz_begin:visible' ).length || ( 1 == $( '.quiz_begin:visible' ).length && qmnValidatePage( 'quizForm' + quizID ) ) ) ) {
							qmnActivateTimer( quizID );
						}
					});
				} else {
					qmnActivateTimer( quizID );
				}
			}
		},
		/**
		 * Sets up pagination for a quiz
		 * 
		 * @param int quizID The ID of the quiz.
		 */
		initPagination: function( quizID ) {
			$quizForm = QSM.getQuizForm( quizID );
			if ( 0 < $quizForm.children( '.qsm-page' ).length ) {
				$quizForm.children( '.qsm-page' ).hide();
				template = wp.template( 'qsm-pagination' );
				$quizForm.append( template() );
				if ( '1' == qmn_quiz_data[ quizID ].progress_bar ) {
					$( '#qsm-progress-bar' ).show();
					qmn_quiz_data[ quizID ].bar = new ProgressBar.Line('#qsm-progress-bar', {
						strokeWidth: 2,
						easing: 'easeInOut',
						duration: 1400,
						color: '#3498db',
						trailColor: '#eee',
						trailWidth: 1,
						svgStyle: {width: '100%', height: '100%'},
						text: {
						  style: {
							// color: '#999',
							position: 'absolute',
							padding: 0,
							margin: 0,
							top: 0,
							right: '10px',
							'font-size': '13px',
							'font-weight': 'bold',
							transform: null
						  },
						  autoStyleContainer: false
						},
						from: {color: '#3498db'},
						to: {color: '#ED6A5A'},
						step: function(state, bar) {
						  bar.setText(Math.round(bar.value() * 100) + ' %');
						}
					});
				}
				QSM.goToPage( quizID, 1 );
				$quizForm.find( '.qsm-pagination .qsm-next' ).on( 'click', function( event ) {
					event.preventDefault();
					QSM.nextPage( quizID );
				});
				$quizForm.find( '.qsm-pagination .qsm-previous' ).on( 'click', function( event ) {
					event.preventDefault();
					QSM.prevPage( quizID );
				});
			}			
		},
		/**
		 * Navigates quiz to specific page
		 *
		 * @param int pageNumber The number of the page
		 */
		goToPage: function( quizID, pageNumber ) {
			var $quizForm = QSM.getQuizForm( quizID );
			var $pages = $quizForm.children( '.qsm-page' );
			$pages.hide();
			$quizForm.children( '.qsm-page:nth-of-type(' + pageNumber + ')' ).show();
			$quizForm.find( '.qsm-previous' ).hide();
			$quizForm.find( '.qsm-next' ).hide();
			$quizForm.find( '.qsm-submit-btn' ).hide();
			if ( pageNumber < $pages.length ) {
				$quizForm.find( '.qsm-next' ).show();
			} else {
				$quizForm.find( '.qsm-submit-btn' ).show();
			}
			if ( 1 < pageNumber ) {
				$quizForm.find( '.qsm-previous' ).show();
			}
			if ( '1' == qmn_quiz_data[ quizID ].progress_bar ) {
				qmn_quiz_data[ quizID ].bar.animate( pageNumber / $pages.length );
			}
			QSM.savePage( quizID, pageNumber );
		},
		/**
		 * Moves forward or backwards through the pages
		 *
		 * @param int quizID The ID of the quiz
		 * @param int difference The number of pages to forward or back
		 */
		changePage: function( quizID, difference ) {
			var page = QSM.getPage( quizID );
			page += difference;
			QSM.goToPage( quizID, page );
		},
		nextPage: function( quizID ) {
			if ( qmnValidatePage( 'quizForm' + quizID ) ) {
				QSM.changePage( quizID, 1 );
			}			
		},
		prevPage: function( quizID ) {
			QSM.changePage( quizID, -1 );
		},
		savePage: function( quizID, pageNumber ) {
			sessionStorage.setItem( 'quiz' + quizID + 'page', pageNumber );
		},
		getPage: function( quizID ) {
			pageNumber = parseInt( sessionStorage.getItem( 'quiz' + quizID + 'page' ) );
			if ( isNaN( pageNumber ) || null == pageNumber ) {
				pageNumber = 1;
			}
			return pageNumber;
		},
		/**
		 * Scrolls to the top of supplied element
		 *
		 * @param jQueryObject The jQuery version of an element. i.e. $('#quizForm3')
		 */
		scrollTo: function( $element ) {
			jQuery( 'html, body' ).animate( 
				{ 
					scrollTop: $element.offset().top - 150
				}, 
			1000 );
		},
		/**
		 * Gets the jQuery object of the quiz form
		 */
		getQuizForm: function( quizID ) {
			return $( '#quizForm' + quizID );
		}
	};

	// On load code
	$(function() {

		// Legacy init.
		qmnInit();

		// Call main initialization.
		QSM.init();
	});
}(jQuery));

// Global Variables
var qmn_timer_activated = false;
var qsmTitleText = window.document.title;

function qmnTimeTakenTimer() {
	var x = +jQuery( '#timer' ).val();
	if ( NaN === x ) {
		x = 0;
	}
	x = x + 1;
	jQuery( '#timer' ).val( x );
}

function qsmEndTimeTakenTimer() {
	clearInterval( qsmTimerInterval );
}

function qmnClearField( field ) {
	if ( field.defaultValue == field.value ) field.value = '';
}

function qsmScrollTo( $element ) {
	jQuery( 'html, body' ).animate( { scrollTop: $element.offset().top - 150 }, 1000 );
}

function qmnDisplayError( message, field, quiz_form_id ) {
	jQuery( '#' + quiz_form_id + ' .qmn_error_message_section' ).addClass( 'qmn_error_message' );
	jQuery( '#' + quiz_form_id + ' .qmn_error_message' ).text( message );
	field.closest( '.quiz_section' ).addClass( 'qmn_error' );
}

function qmnResetError( quiz_form_id ) {
	jQuery( '#' + quiz_form_id + ' .qmn_error_message' ).text( '' );
	jQuery( '#' + quiz_form_id + ' .qmn_error_message_section' ).removeClass( 'qmn_error_message' );
	jQuery( '#' + quiz_form_id + ' .quiz_section' ).removeClass( 'qmn_error' );
}

function qmnValidation( element, quiz_form_id ) {
	var result = true;
	var quiz_id = +jQuery( '#' + quiz_form_id ).find( '.qmn_quiz_id' ).val();
	var email_error = qmn_quiz_data[ quiz_id ].error_messages.email;
	var number_error = qmn_quiz_data[ quiz_id ].error_messages.number;
	var empty_error = qmn_quiz_data[ quiz_id ].error_messages.empty;
	var incorrect_error = qmn_quiz_data[ quiz_id ].error_messages.incorrect;
	qmnResetError( quiz_form_id );
	jQuery( element ).each(function(){
		if ( jQuery( this ).attr( 'class' )) {
			if( jQuery( this ).attr( 'class' ).indexOf( 'mlwEmail' ) > -1 && this.value !== "" ) {
				var x = this.value;
				var atpos = x.indexOf('@');
				var dotpos = x.lastIndexOf( '.' );
				if ( atpos < 1 || dotpos < atpos + 2 || dotpos + 2>= x.length ) {
					qmnDisplayError( email_error, jQuery( this ), quiz_form_id );
					result = false;
				}
			}
			if ( ( qmn_quiz_data[quiz_id].hasOwnProperty('pagination') && qmn_quiz_data[quiz_id].first_page ) || ( window.localStorage.getItem( 'mlw_time_quiz' + quiz_id ) === null ||
			window.localStorage.getItem( 'mlw_time_quiz'+quiz_id ) > 0.08 ) ) {

				if( jQuery( this ).attr( 'class' ).indexOf( 'mlwRequiredNumber' ) > -1 && this.value === "" && +this.value != NaN ) {
					qmnDisplayError( number_error, jQuery( this ), quiz_form_id );
					result =  false;
				}
				if( jQuery( this ).attr( 'class' ).indexOf( 'mlwRequiredText' ) > -1 && this.value === "" ) {
					qmnDisplayError( empty_error, jQuery( this ), quiz_form_id );
					result =  false;
				}
				if( jQuery( this ).attr( 'class' ).indexOf( 'mlwRequiredCaptcha' ) > -1 && this.value != mlw_code ) {
					qmnDisplayError( incorrect_error, jQuery( this ), quiz_form_id );
					result =  false;
				}
				if( jQuery( this ).attr( 'class' ).indexOf( 'mlwRequiredAccept' ) > -1 && ! jQuery( this ).prop( 'checked' ) ) {
					qmnDisplayError( empty_error, jQuery( this ), quiz_form_id );
					result =  false;
				}
				if( jQuery( this ).attr( 'class' ).indexOf( 'mlwRequiredRadio' ) > -1 ) {
					check_val = jQuery( this ).find( 'input:checked' ).val();
					if ( check_val == "No Answer Provided" ) {
						qmnDisplayError( empty_error, jQuery( this ), quiz_form_id );
						result =  false;
					}
				}
				if( jQuery( this ).attr( 'class' ).indexOf( 'qsmRequiredSelect' ) > -1 ) {
					check_val = jQuery( this ).val();
					if ( check_val == "No Answer Provided" ) {
						qmnDisplayError( empty_error, jQuery( this ), quiz_form_id );
						result =  false;
					}
				}
				if( jQuery( this ).attr( 'class' ).indexOf( 'mlwRequiredCheck' ) > -1 ) {
					if ( ! jQuery( this ).find( 'input:checked' ).length ) {
						qmnDisplayError( empty_error, jQuery( this ), quiz_form_id );
						result =  false;
					}
				}
			}
		}
	});
	return result;
}

function qmnFormSubmit( quiz_form_id ) {
	var quiz_id = +jQuery( '#' + quiz_form_id ).find( '.qmn_quiz_id' ).val();
	var $container = jQuery( '#' + quiz_form_id ).closest( '.qmn_quiz_container' );
	var result = qmnValidation( '#' + quiz_form_id + ' *', quiz_form_id );

	if ( ! result ) { return result; }

	jQuery( '.mlw_qmn_quiz input:radio' ).attr( 'disabled', false );
	jQuery( '.mlw_qmn_quiz input:checkbox' ).attr( 'disabled', false );
	jQuery( '.mlw_qmn_quiz select' ).attr( 'disabled', false );
	jQuery( '.mlw_qmn_question_comment' ).attr( 'disabled', false );
	jQuery( '.mlw_answer_open_text' ).attr( 'disabled', false );

	var data = {
		action: 'qmn_process_quiz',
		quizData: jQuery( '#' + quiz_form_id ).serialize()
	};

	qsmEndTimeTakenTimer();

	if ( qmn_quiz_data[quiz_id].hasOwnProperty( 'timer_limit' ) ) {
		qmnEndTimer( quiz_id );
	}

	jQuery( '#' + quiz_form_id + ' input[type=submit]' ).attr( 'disabled', 'disabled' );
	qsmDisplayLoading( $container );

	jQuery.post( qmn_ajax_object.ajaxurl, data, function( response ) {
		qmnDisplayResults( JSON.parse( response ), quiz_form_id, $container );
	});

	return false;
}

function qsmDisplayLoading( $container ) {
	$container.empty();
	$container.append( '<div class="qsm-spinner-loader"></div>' );
	qsmScrollTo( $container );
}

function qmnDisplayResults( results, quiz_form_id, $container ) {
	$container.empty();
	if ( results.redirect ) {
		window.location.replace( results.redirect_url );
	} else {
		$container.append( '<div class="qmn_results_page"></div>' );
		$container.find( '.qmn_results_page' ).html( results.display );
		qsmScrollTo( $container );
	}
}

function qmnInit() {
	if ( typeof qmn_quiz_data != 'undefined' && qmn_quiz_data ) {
		for ( var key in qmn_quiz_data ) {
			if ( qmn_quiz_data[key].ajax_show_correct === '1' ) {
				jQuery( '#quizForm' + qmn_quiz_data[key].quiz_id + ' .qmn_quiz_radio').change(function() {
					var chosen_answer = jQuery(this).val();
					var question_id = jQuery(this).attr('name').replace(/question/i,'');
					var chosen_id = jQuery(this).attr('id');
					jQuery.each( qmn_quiz_data[key].question_list, function( i, value ) {
						if ( question_id == value.question_id ) {
							jQuery.each( value.answers, function(j, answer ) {
								if ( answer[0] === chosen_answer ) {
									if ( answer[2] !== 1) {
										jQuery( '#'+chosen_id ).parent().addClass( "qmn_incorrect_answer" );
									}
								}
								if ( answer[2] === 1) {
									jQuery( ':radio[name=question'+question_id+'][value="'+answer[0]+'"]' ).parent().addClass( "qmn_correct_answer" );
								}
							});
						}
					});
				});
			}

			if ( qmn_quiz_data[key].disable_answer === '1' ) {
				jQuery( '#quizForm' + qmn_quiz_data[key].quiz_id + ' .qmn_quiz_radio').change(function() {
					var radio_group = jQuery(this).attr('name');
					jQuery('input[type=radio][name='+radio_group+']').prop('disabled',true);
				});
			}

			if ( qmn_quiz_data[key].hasOwnProperty('pagination') ) {
		    qmnInitPagination( qmn_quiz_data[key].quiz_id );
			}
		}
	}
}

function qmnActivateTimer( quiz_id ) {
	jQuery( '#quizForm' + quiz_id + ' .mlw_qmn_timer').show();
	qmn_timer_activated = true;
	var minutes = 0;
	if ( window.localStorage.getItem( 'mlw_started_quiz' + quiz_id ) == "yes" &&
	window.localStorage.getItem( 'mlw_time_quiz' + quiz_id ) >= 0 ) {
		minutes = window.localStorage.getItem( 'mlw_time_quiz' + quiz_id );
	} else {
		minutes = qmn_quiz_data[quiz_id].timer_limit;
	}
	window.amount = minutes * 60;

	jQuery( '#quizForm' + quiz_id + ' .mlw_qmn_timer').html( window.amount );
	window.qsmCounter = setInterval( qmnTimer, 1000, quiz_id );
}

function qmnTimer( quiz_id ) {
	window.amount = window.amount - 1;
	if (window.amount < 0) {
		window.amount = 0;
	}
	window.localStorage.setItem( 'mlw_time_quiz' + quiz_id, window.amount / 60 );
	window.localStorage.setItem( 'mlw_started_quiz' + quiz_id, "yes" );
	jQuery( '#quizForm' + quiz_id + ' .mlw_qmn_timer').html( qmnMinToSec( window.amount ) );
	window.document.title = qmnMinToSec( window.amount ) + " " + qsmTitleText;
	if ( window.amount <= 0 ) {
		clearInterval( window.qsmCounter );
		jQuery( ".mlw_qmn_quiz input:radio" ).attr( 'disabled',true );
		jQuery( ".mlw_qmn_quiz input:checkbox" ).attr( 'disabled',true );
		jQuery( ".mlw_qmn_quiz select" ).attr( 'disabled',true );
		jQuery( ".mlw_qmn_question_comment" ).attr( 'disabled',true );
		jQuery( ".mlw_answer_open_text" ).attr( 'disabled',true );
		jQuery( ".mlw_answer_number" ).attr( 'disabled',true );
		jQuery( '#quizForm' + quiz_id ).closest( '.qmn_quiz_container' ).addClass( 'qsm_timer_ended' );
		//document.quizForm.submit();
		return;
	}
}

function qmnEndTimer( quiz_id ) {
	window.localStorage.setItem('mlw_time_quiz' + quiz_id, 'completed');
	window.localStorage.setItem('mlw_started_quiz' + quiz_id, 'no');
	window.document.title = qsmTitleText;
	if ( typeof window.qsmCounter != 'undefined' ) {
		clearInterval( window.qsmCounter );
	}
}

function qmnMinToSec( amount ) {
	var timer_display = '';
	var hours = Math.floor(amount/3600);
	if (hours == '0')
	{
		timer_display = timer_display +"00:";
	}
	else if (hours < 10)
	{
		timer_display = timer_display + '0' + hours + ":";
	}
	else
	{
		timer_display = timer_display + hours + ":";
	}
	var minutes = Math.floor((amount % 3600)/60);
	if (minutes == '0')
	{
		timer_display = timer_display +"00:";
	}
	else if (minutes < 10)
	{
		timer_display = timer_display + '0' + minutes + ":";
	}
	else
	{
		timer_display = timer_display + minutes + ":";
	}
	var seconds = Math.floor(amount % 60);
	if (seconds == '0')
	{
		timer_display = timer_display +"00";
	}
	else if (seconds < 10)
	{
		timer_display = timer_display +'0' + seconds;
	}
	else
	{
		timer_display = timer_display + seconds;
	}
	return timer_display;
}

//Function to validate the answers provided in quiz
function qmnValidatePage( quiz_form_id ) {
	var result = qmnValidation( '#' + quiz_form_id + ' .quiz_section:visible *', quiz_form_id );
	return result;
}

//Function to advance quiz to next page
function qmnNextSlide( pagination, go_to_top, quiz_form_id ) {
	var quiz_id = +jQuery( quiz_form_id ).find( '.qmn_quiz_id' ).val();
	var $container = jQuery( quiz_form_id ).closest( '.qmn_quiz_container' );
	var slide_number = +$container.find( '.slide_number_hidden' ).val();
	var previous = +$container.find( '.previous_amount_hidden' ).val();
	var section_totals = +$container.find( '.total_sections_hidden' ).val();

	jQuery( quiz_form_id + " .quiz_section" ).hide();
	for ( var i = 0; i < pagination; i++ ) {
		if (i === 0 && previous === 1 && slide_number > 1) {
			slide_number = slide_number + pagination;
		} else {
			slide_number++;
		}
		if (slide_number < 1) {
			slide_number = 1;
		}
		$container.find( ".mlw_qmn_quiz_link.mlw_previous" ).hide();

    if ( qmn_quiz_data[ quiz_id ].first_page ) {
      if (slide_number > 1) {
				$container.find( ".mlw_qmn_quiz_link.mlw_previous" ).show();
      }
    } else {
			if (slide_number > pagination) {
				$container.find( ".mlw_qmn_quiz_link.mlw_previous" ).show();
			}
    }
		if (slide_number == section_totals) {
			$container.find( ".mlw_qmn_quiz_link.mlw_next" ).hide();
		}
		if (slide_number < section_totals) {
			$container.find( ".mlw_qmn_quiz_link.mlw_next" ).show();
		}
		jQuery( quiz_form_id + " .quiz_section.slide" + slide_number ).show();
	}

	jQuery( quiz_form_id ).closest( '.qmn_quiz_container' ).find( '.slide_number_hidden' ).val( slide_number );
	jQuery( quiz_form_id ).closest( '.qmn_quiz_container' ).find( '.previous_amount_hidden' ).val( 0 );

	qmnUpdatePageNumber( 1, quiz_form_id );

	if (go_to_top == 1) {
		qsmScrollTo( $container );
	}
}

function qmnPrevSlide( pagination, go_to_top, quiz_form_id ) {
	var quiz_id = +jQuery( quiz_form_id ).find( '.qmn_quiz_id' ).val();
	var $container = jQuery( quiz_form_id ).closest( '.qmn_quiz_container' );
	var slide_number = +$container.find( '.slide_number_hidden' ).val();
	var previous = +$container.find( '.previous_amount_hidden' ).val();
	var section_totals = +$container.find( '.total_sections_hidden' ).val();

	jQuery( quiz_form_id + " .quiz_section" ).hide();
	for (var i = 0; i < pagination; i++) {
		if (i === 0 && previous === 0)	{
			slide_number = slide_number - pagination;
		} else {
			slide_number--;
		}
		if (slide_number < 1) {
			slide_number = 1;
		}

		$container.find( ".mlw_qmn_quiz_link.mlw_previous" ).hide();

		if ( qmn_quiz_data[ quiz_id ].first_page ) {
			if (slide_number > 1) {
				$container.find( ".mlw_qmn_quiz_link.mlw_previous" ).show();
			}
		} else {
			if (slide_number > pagination) {
				$container.find( ".mlw_qmn_quiz_link.mlw_previous" ).show();
			}
		}
		if (slide_number == section_totals) {
			$container.find( ".mlw_qmn_quiz_link.mlw_next" ).hide();
		}
		if (slide_number < section_totals) {
			$container.find( ".mlw_qmn_quiz_link.mlw_next" ).show();
		}
		jQuery( quiz_form_id + " .quiz_section.slide" + slide_number ).show();
	}

	qmnUpdatePageNumber( -1, quiz_form_id );

	jQuery( quiz_form_id ).closest( '.qmn_quiz_container' ).find( '.slide_number_hidden' ).val( slide_number );
	jQuery( quiz_form_id ).closest( '.qmn_quiz_container' ).find( '.previous_amount_hidden' ).val( 0 );

	if (go_to_top == 1) {
		qsmScrollTo( $container );
	}
}

function qmnUpdatePageNumber( amount, quiz_form_id ) {
	var current_page = +jQuery( quiz_form_id ).closest( '.qmn_quiz_container' ).find( '.current_page_hidden' ).val();
	var total_pages = jQuery( quiz_form_id ).closest( '.qmn_quiz_container' ).find( '.total_pages_hidden' ).val();
	current_page += amount;
	//jQuery( quiz_form_id ).siblings( '.qmn_pagination' ).find( " .qmn_page_counter_message" ).text( current_page + "/" + total_pages );
}

function qmnInitPagination( quiz_id ) {

	var qmn_section_total = +qmn_quiz_data[quiz_id].pagination.total_questions + 1;
	if ( qmn_quiz_data[quiz_id].pagination.section_comments === '0' ) {
		qmn_section_total += 1;
	}
	var qmn_total_pages = Math.ceil( qmn_section_total / +qmn_quiz_data[quiz_id].pagination.amount );
	if ( qmn_quiz_data[quiz_id].first_page ) {
		qmn_total_pages += 1;
		qmn_section_total += 1;
	}

	jQuery( '#quizForm' + quiz_id + ' .quiz_section' ).hide();
	jQuery( '#quizForm' + quiz_id + ' .quiz_section' ).append( "<br />" );
	jQuery( '#quizForm' + quiz_id ).closest( '.qmn_quiz_container' ).append( '<div class="qmn_pagination border margin-bottom"></div>' );
	jQuery( '#quizForm' + quiz_id ).closest( '.qmn_quiz_container' ).find( '.qmn_pagination' ).append( '<input type="hidden" value="0" name="slide_number" class="slide_number_hidden" />')
		.append( '<input type="hidden" value="0" name="current_page" class="current_page_hidden" />')
		.append( '<input type="hidden" value="' + qmn_total_pages + '" name="total_pages" class="total_pages_hidden" />')
		.append( '<input type="hidden" value="' + qmn_section_total + '" name="total_sections" class="total_sections_hidden" />')
		.append( '<input type="hidden" value="0" name="previous_amount" class="previous_amount_hidden" />')
		.append( '<a class="qmn_btn mlw_qmn_quiz_link mlw_previous" href="#">' + qmn_quiz_data[quiz_id].pagination.previous_text + '</a>' )
		.append( '<span class="qmn_page_message"></span>' )
		.append( '<div class="qmn_page_counter_message"></div>' )
		.append( '<a class="qmn_btn mlw_qmn_quiz_link mlw_next" href="#">' + qmn_quiz_data[quiz_id].pagination.next_text + '</a>' );

	jQuery(".mlw_next").click(function(event) {
		event.preventDefault();
		var quiz_id = +jQuery( this ).closest( '.qmn_quiz_container' ).find( '.qmn_quiz_id' ).val();
		if ( qmnValidatePage( 'quizForm' + quiz_id ) ) {
			qmnNextSlide( qmn_quiz_data[quiz_id].pagination.amount, 1, '#quizForm' + quiz_id );
		}
	});
	
	jQuery(".mlw_previous").click(function(event) {
		event.preventDefault();
		var quiz_id = +jQuery( this ).closest( '.qmn_quiz_container' ).find( '.qmn_quiz_id' ).val();
		qmnPrevSlide( qmn_quiz_data[quiz_id].pagination.amount, 1, '#quizForm' + quiz_id );
	});
	
	if ( qmn_quiz_data[quiz_id].first_page ) {
		qmnNextSlide( 1, 0, '#quizForm' + quiz_id );
	} else {
		qmnNextSlide( qmn_quiz_data[quiz_id].pagination.amount, 0, '#quizForm' + quiz_id );
	}
}

function qmnSocialShare( network, mlw_qmn_social_text, mlw_qmn_title, facebook_id ) {
	var sTop = window.screen.height / 2 - ( 218 );
	var sLeft = window.screen.width / 2 - ( 313 );
	var sqShareOptions = "height=400,width=580,toolbar=0,status=0,location=0,menubar=0,directories=0,scrollbars=0,top=" + sTop + ",left=" + sLeft;
	var pageUrl = window.location.href;
	var pageUrlEncoded = encodeURIComponent( pageUrl );
	var url = '';
	if ( network == 'facebook' ) {
		url = "https://www.facebook.com/dialog/feed?"	+ "display=popup&" + "app_id="+facebook_id +
			"&" + "link=" + pageUrlEncoded + "&" + "name=" + encodeURIComponent(mlw_qmn_social_text) +
			"&" + "description=  &" + "redirect_uri=http://www.mylocalwebstop.com/mlw_qmn_close.html";
	}
	if ( network == 'twitter' )	{
		url = "https://twitter.com/intent/tweet?text=" + encodeURIComponent(mlw_qmn_social_text);
	}
	window.open( url, "Share", sqShareOptions );
	return false;
}

jQuery(function() {	
	jQuery( '.qmn_quiz_container' ).tooltip();
	
	jQuery( '.qmn_quiz_container input' ).on( 'keypress', function ( e ) {
		if ( e.which === 13 ) {
			e.preventDefault();
		}
	});
	
	jQuery( '.qmn_quiz_form' ).on( "submit", function( event ) {
	  event.preventDefault();
		qmnFormSubmit( this.id );
	});
});

var qsmTimerInterval = setInterval( qmnTimeTakenTimer, 1000 );
