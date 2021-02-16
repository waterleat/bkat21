/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/src/sass/admin.scss":
/*!************************************!*\
  !*** ./assets/src/sass/admin.scss ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./assets/src/sass/style.scss":
/*!************************************!*\
  !*** ./assets/src/sass/style.scss ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./assets/src/scripts/app.js":
/*!***********************************!*\
  !*** ./assets/src/scripts/app.js ***!
  \***********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_app_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/app.js */ "./assets/src/scripts/modules/app.js");
/* harmony import */ var _modules_smallNav_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/smallNav.js */ "./assets/src/scripts/modules/smallNav.js");
/**
 * Manage global libraries like jQuery or THREE from the package.json file
 */
// Import libraries
// import 'slick-carousel';
// Import custom modules

 // import Carousel from './modules/carousel.js';

var app = new _modules_app_js__WEBPACK_IMPORTED_MODULE_0__["default"]();
var smallNav = new _modules_smallNav_js__WEBPACK_IMPORTED_MODULE_1__["default"](); // const carousel = new Carousel();
// const matchMediaResult = window.matchMedia("(max-width: 767px)");

var matchMediaResult = window.matchMedia('(prefers-color-scheme: dark)');
console.log(matchMediaResult.matches);

/***/ }),

/***/ "./assets/src/scripts/modules/app.js":
/*!*******************************************!*\
  !*** ./assets/src/scripts/modules/app.js ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var App = /*#__PURE__*/function () {
  function App() {
    _classCallCheck(this, App);

    this.el = document.querySelector('.el');
    this.listeners();
    this.init();
  }

  _createClass(App, [{
    key: "init",
    value: function init() {
      console.info('App Initialized');
    }
  }, {
    key: "listeners",
    value: function listeners() {
      if (this.el) {
        this.el.addEventListener('click', this.elClick);
      }
    }
  }, {
    key: "elClick",
    value: function elClick(e) {
      e.target.classList.add('text-gray-700');
      e.target.addEventListener('transitionend', function (e) {
        return 'color' === e.propertyName ? e.target.classList.remove('text-gray-700') : '';
      });
    }
  }]);

  return App;
}();

/* harmony default export */ __webpack_exports__["default"] = (App);

/***/ }),

/***/ "./assets/src/scripts/modules/smallNav.js":
/*!************************************************!*\
  !*** ./assets/src/scripts/modules/smallNav.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var SmallNav = /*#__PURE__*/function () {
  function SmallNav() {
    _classCallCheck(this, SmallNav);

    this.dropNav = document.querySelector("#drop-nav"); // this.options = this.dropNav.querySelectorAll('option')

    this.listeners();
    this.init();
  }

  _createClass(SmallNav, [{
    key: "init",
    value: function init() {
      console.info('dropNav Initialized');
    }
  }, {
    key: "listeners",
    value: function listeners() {
      if (this.dropNav) {
        this.dropNav.addEventListener('click', this.dropNavClick);
      }
    }
  }, {
    key: "dropNavClick",
    value: function dropNavClick(e) {
      console.log(e.target.value);
      window.location.href = e.target.value;
    }
  }]);

  return SmallNav;
}();

/* harmony default export */ __webpack_exports__["default"] = (SmallNav);

/***/ }),

/***/ 0:
/*!***************************************************************************************************!*\
  !*** multi ./assets/src/scripts/app.js ./assets/src/sass/style.scss ./assets/src/sass/admin.scss ***!
  \***************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /home/d/sites/bka2021/assets/src/scripts/app.js */"./assets/src/scripts/app.js");
__webpack_require__(/*! /home/d/sites/bka2021/assets/src/sass/style.scss */"./assets/src/sass/style.scss");
module.exports = __webpack_require__(/*! /home/d/sites/bka2021/assets/src/sass/admin.scss */"./assets/src/sass/admin.scss");


/***/ })

/******/ });