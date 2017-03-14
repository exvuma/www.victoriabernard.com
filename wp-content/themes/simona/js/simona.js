/**
 * Theme functions file.
 *
 * @package simona
 */

(function ($) {

	'use strict';

	/**
	* Load
	*/
	$( window ).load( function () {
		$( 'body' ).fadeIn().addClass( 'loaded' );
	} )

	$( document ).ready( function () {

		// Vars.
		var id, target, nonce, instaok, admin;

		// Admin bar?
		if ( $( 'body' ).hasClass( 'admin-bar' ) ) {
			admin = 32;
		} else {
			admin = 0;
		}

		// Initialize Header Slick slider.
		$( '.header-slider' ).slick( {
			speed: 600,
			fade: true,
			autoplay: true,
			autoplaySpeed: 4000
		} );

		// Initialize Slabtext.
		$( '.single .simona-slab' ).slabText();
		$( '.error-404 .simona-slab' ).slabText();

		// Initialize Match Height.
		$( '.post' ).matchHeight();

		// Initialize Fitvids.
		$( '#content' ).fitVids();

		// Initialize nanoScroller.
		$( '.nano' ).nanoScroller();

		/**
		* Add dropdown toggle that display child menu items.
		*/
		$( '.main-navigation .menu-item-has-children > a' ).after( '<button class="dropdown-toggle" aria-expanded="false"></button>' );
		/**
		* Toggle buttons and submenu items with active children menu items.
		*/
		$( '.main-navigation .current-menu-ancestor > button' ).addClass( 'toggle-on' );
		$( '.main-navigation .current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );
		$( '.dropdown-toggle' ).click( function( e ) {
			var _this = $( this );
			e.preventDefault();
			_this.toggleClass( 'toggle-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );
			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
		} );

		// Swipebox on galleries.
		$( '.gallery-icon a' ).each( function() {
			$( this ).attr( 'href', $( this ).find( 'img' ).attr( 'src' ).replace( '-800x600', '' ) );
			$( this ).attr( 'title', $( this ).parent( '.gallery-icon' ).next( 'figcaption' ).text() );
		} );
		$( '.gallery-icon a' ).swipebox();

		/**
		* Search & menu
		*/
		// Close menu.
		$( '.close-menu i' ).on( 'click' ,function() {
			$( '#site-navigation' ).removeClass( 'menu-open' );
			$( '#overlay' ).removeClass( 'overlay-open' );
		} );
		// Close search.
		$( '.close-search i' ).on( 'click', function() {
			$( '#simona-search-window' ).removeClass( 'search-open' );
			$( '#overlay' ).removeClass( 'overlay-open' );
		} );
		// Close search & menu on overlay click.
		$( '#overlay' ).on( 'click', function() {
			$( '#site-navigation' ).removeClass( 'menu-open' );
			$( '#simona-search-window' ).removeClass( 'search-open' );
			$( '#overlay' ).removeClass( 'overlay-open' );
		} );
		// Open menu.
		$( '#simona-menu' ).on( 'click', function() {
			$( '#overlay' ).addClass( 'overlay-open' );
			$( '#site-navigation' ).addClass( 'menu-open' );
			return false;
		} );
		// Open search.
		$( '#simona-search' ).on( 'click', function() {
			$( '#overlay' ).addClass( 'overlay-open' );
			$( '#simona-search-window' ).addClass( 'search-open' );
			$( '.simona-search input.search-field' ).focus();
			return false;
		} );

		/**
		* Social share
		*/
		$( '.post-social-wrapper' ).hover( function() { $( this ).find( $( '.post-social' ) ).fadeIn(); }, function() { $( this ).find( $( '.post-social' ) ).fadeOut(); } );
		if ( $( 'a.facebook-share' ).length > 0 || $( 'a.twitter-share' ).length > 0 || $( 'a.googleplus-share' ).length > 0) {
			$( '.facebook-share' ).click( simona_facebookShare );
			$( '.twitter-share' ).click( simona_twitterShare );
			$( '.googleplus-share' ).click( simona_googlePlusShare );
		}

	} );

	function simona_facebookShare() {
		window.open( 'https://www.facebook.com/sharer/sharer.php?u=' + $( this ).attr( 'href' ), "facebookWindow",                        "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" )
		return false;
	}
	function simona_googlePlusShare() {
		window.open( 'https://plus.google.com/share?url=' + $( this ).attr( 'href' ), "googleplusWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" )
		return false;
	}
	function simona_twitterShare() {
		var $page_title = encodeURIComponent( $( this ).attr( 'data-title' ) );
		window.open( 'http://twitter.com/intent/tweet?text=' + $page_title + ' ' + $( this ).attr( 'href' ), "twitterWindow", "height=370,width=600,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" )
		return false;
	}

} )( jQuery );
