( function () {
	'use strict';

	var data = window.wdgamesData || {};

	function setMessage( root, text ) {
		var out = root.querySelector( '.wdgames-result' );
		if ( out ) {
			out.textContent = text;
		}
	}

	function showResult( root, result ) {
		var stage = root.querySelector( '.wdgames-stage' );
		if ( stage ) {
			stage.style.setProperty( '--wdgames-turn', ( 720 + Math.floor( Math.random() * 360 ) ) + 'deg' );
			stage.classList.add( 'is-played' );
		}
		setMessage( root, result.coupon ? result.message + ' ' + result.coupon : result.message );
	}

	function play( root, button ) {
		button.disabled = true;

		window.fetch( data.endpoint, {
			method: 'POST',
			headers: { 'Content-Type': 'application/json' },
			body: JSON.stringify( { game: root.getAttribute( 'data-game' ) } )
		} )
			.then( function ( response ) {
				return response.json();
			} )
			.then( function ( result ) {
				if ( typeof result.won === 'undefined' ) {
					setMessage( root, result.message || data.error );
					return;
				}
				showResult( root, result );
			} )
			.catch( function () {
				setMessage( root, data.error );
				button.disabled = false;
			} );
	}

	document.addEventListener( 'DOMContentLoaded', function () {
		var games = document.querySelectorAll( '.wdgames-game' );

		Array.prototype.forEach.call( games, function ( root ) {
			var button = root.querySelector( '.wdgames-play' );
			if ( button ) {
				button.addEventListener( 'click', function () {
					play( root, button );
				} );
			}
		} );
	} );
}() );

