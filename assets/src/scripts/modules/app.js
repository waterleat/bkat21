class App {

	constructor() {
		this.el = document.querySelector( '.el' );

		this.listeners();
		this.init();
	}

	init() {
		console.info( 'App Initialized' );
	}

	listeners() {
		if ( this.el ) {
			this.el.addEventListener( 'click', this.elClick );
		}
	}

	elClick( e ) {
		e.target.classList.add( 'text-gray-700' );
		e.target.addEventListener( 'transitionend', ( e ) => ( 'color' === e.propertyName ) ? e.target.classList.remove( 'text-gray-700' ) : '' );
	}

}

export default App;
