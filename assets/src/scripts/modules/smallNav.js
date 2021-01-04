class SmallNav {

  constructor() {
		this.dropNav = document.querySelector( "#drop-nav" );
    // this.options = this.dropNav.querySelectorAll('option')

		this.listeners();
		this.init();
	}

	init() {
		console.info( 'dropNav Initialized' );
	}

	listeners() {
		if ( this.dropNav ) {
			this.dropNav.addEventListener( 'click', this.dropNavClick );
		}
	}

	dropNavClick( e ) {
    console.log(e.target.value)
    window.location.href = e.target.value
	}
}

export default SmallNav;
