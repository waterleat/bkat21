/**
 * Manage global libraries like jQuery or THREE from the package.json file
 */

// Import libraries
// import 'slick-carousel';

// Import custom modules
import App from './modules/app.js';
import SmallNav from './modules/smallNav.js';
// import Carousel from './modules/carousel.js';

const app = new App();
const smallNav = new SmallNav();
// const carousel = new Carousel();

// const matchMediaResult = window.matchMedia("(max-width: 767px)");
const matchMediaResult = window.matchMedia( '(prefers-color-scheme: dark)' );
console.log( matchMediaResult.matches );
