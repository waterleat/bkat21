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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/src/scripts/front.js":
/*!*************************************!*\
  !*** ./assets/src/scripts/front.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

document.addEventListener('DOMContentLoaded', function (e) {
  console.log('dom loaded');
  var kendoBtn = document.getElementById('kendoBtn'),
      iaidoBtn = document.getElementById('iaidoBtn'),
      jodoBtn = document.getElementById('jodoBtn'),
      csBtn = document.getElementById('csBtn'),
      startupContainer = document.getElementById('startupContainer'),
      kendoContainer = document.getElementById('kendoContainer'),
      iaidoContainer = document.getElementById('iaidoContainer'),
      jodoContainer = document.getElementById('jodoContainer'),
      csContainer = document.getElementById('csContainer');
  kendoBtn.addEventListener('click', function () {
    console.log('kendo button');
    kendoContainer.classList.remove('hidden');
    startupContainer.classList.add('hidden');
    iaidoContainer.classList.add('hidden');
    jodoContainer.classList.add('hidden');
    csContainer.classList.add('hidden');
  });
  iaidoBtn.addEventListener('click', function () {
    console.log('iaido button');
    iaidoContainer.classList.remove('hidden');
    startupContainer.classList.add('hidden');
    kendoContainer.classList.add('hidden');
    jodoContainer.classList.add('hidden');
    csContainer.classList.add('hidden');
  });
  jodoBtn.addEventListener('click', function () {
    jodoContainer.classList.remove('hidden');
    startupContainer.classList.add('hidden');
    kendoContainer.classList.add('hidden');
    iaidoContainer.classList.add('hidden');
    csContainer.classList.add('hidden');
  });
  csBtn.addEventListener('click', function () {
    csContainer.classList.remove('hidden');
    startupContainer.classList.add('hidden');
    kendoContainer.classList.add('hidden');
    iaidoContainer.classList.add('hidden');
    jodoContainer.classList.add('hidden');
  }); // // append more posts
  //   const postdivcs = document.getElementById('my-postscs'),
  //       loadmorecs = document.getElementById('loadmorecs');
  //
  //   const ajaxurl = "<?php echo admin_url( '/admin-ajax.php' ); ?>";
  //   // var page = 2;
  //
  //   loadmorecs.addEventListener('click',(c) => {
  //     var page = loadmorecs.dataset.page;
  //       console.log('pressed</br>',page);
  //     // console.log(page);
  //     // try {
  //     //   const fetchResult =
  //       fetch(ajaxurl, {
  //         method: "POST",
  //         body: params
  //       })
  //       .then(result => result.json())
  //       .catch(error => {
  //
  //       })
  //       .then(response => {
  //         console.log(response.message);
  //         // postdivcs.innerHTML = response.message;
  //       })
  //     // } catch (e) {
  //     //
  //     // } finally {
  //     //
  //     // }
  //
  // kendo tabs

  var skTabs = document.getElementById("k-s"),
      skLiTabs = skTabs.querySelectorAll("li"),
      kPanes = document.querySelectorAll(".tab-pane-front.kendo");
  skTabs.addEventListener("click", function (sk) {
    if (sk.target.tagName == "LI") {
      var targetTab = sk.target.dataset.target;
      var targetPane = document.querySelector(targetTab);
      kPanes.forEach(function (pane) {
        if (pane == targetPane) {
          pane.classList.add('active');
        } else {
          pane.classList.remove('active');
        }
      });
      skLiTabs.forEach(function (tab) {
        if (tab.dataset.target == targetTab) {
          tab.classList.add('active');
        } else {
          tab.classList.remove('active');
        }
      });
    }
  }); // iaido tabs

  var siTabs = document.getElementById("i-s"),
      siLiTabs = siTabs.querySelectorAll("li"),
      iPanes = document.querySelectorAll(".tab-pane-front.iaido");
  siTabs.addEventListener("click", function (si) {
    if (si.target.tagName == "LI") {
      var targetTab = si.target.dataset.target;
      var targetPane = document.querySelector(targetTab);
      iPanes.forEach(function (pane) {
        if (pane == targetPane) {
          pane.classList.add('active');
        } else {
          pane.classList.remove('active');
        }
      });
      siLiTabs.forEach(function (tab) {
        if (tab.dataset.target == targetTab) {
          tab.classList.add('active');
        } else {
          tab.classList.remove('active');
        }
      });
    }
  }); // jodo tabs

  var sjTabs = document.getElementById('j-s'),
      sjLiTabs = sjTabs.querySelectorAll("li"),
      jPanes = document.querySelectorAll(".tab-pane-front.jodo");
  sjTabs.addEventListener("click", function (sj) {
    if (sj.target.tagName == "LI") {
      var targetTab = sj.target.dataset.target;
      var targetPane = document.querySelector(targetTab);
      jPanes.forEach(function (pane) {
        if (pane == targetPane) {
          pane.classList.add('active');
        } else {
          pane.classList.remove('active');
        }
      });
      sjLiTabs.forEach(function (tab) {
        if (tab.dataset.target == targetTab) {
          tab.classList.add('active');
        } else {
          tab.classList.remove('active');
        }
      });
    }
  }); // central services tabs

  var scsTabs = document.getElementById('cs-s'),
      scsLiTabs = scsTabs.querySelectorAll("li"),
      csPanes = document.querySelectorAll(".tab-pane-front.cs");
  scsTabs.addEventListener("click", function (scs) {
    console.log('click: ', scs);

    if (scs.target.tagName == "LI") {
      var targetTab = scs.target.dataset.target;
      var targetPane = document.querySelector(targetTab);
      csPanes.forEach(function (pane) {
        if (pane == targetPane) {
          pane.classList.add('active');
        } else {
          pane.classList.remove('active');
        }
      });
      scsLiTabs.forEach(function (tab) {
        if (tab.dataset.target == targetTab) {
          tab.classList.add('active');
        } else {
          tab.classList.remove('active');
        }
      });
    }
  }); // function xlSwitchTab(xlevent) {
  //   xlevent.preventDefault();
  //   // console.log('xlSwitchTab')
  //
  //   var xlclickedTab = xlevent.currentTarget;
  //   console.log(xlclickedTab);
  //
  //   document.querySelector("ul.nav-tabs-xl-right li.active").classList.remove("active");
  //   document.querySelector(".tab-pane-xl-right.active").classList.remove("active");
  //
  //   var anchor = xlevent.target;
  //   console.log(anchor.nodeName);
  // if ( anchor.nodeName == 'H2' ){
  //   anchor = anchor.parent;
  //   console.log(anchor.nodeName);
  // }
  //     var activePaneID = anchor.getAttribute("href");
  // console.log(activePaneID);
  //     xlclickedTab.classList.add("active");
  //     document.querySelector(activePaneID).classList.add("active");
  //
  //   };
}); // const postdiv = document.getElementById('my-posts');
// const    loadmore = document.getElementById('loadmore');
//
// var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
// var page = 2;
//
// loadmore.addEventListener('click',() => {
//   console.log('pressed');
//   // var data = {
//   //     'action': 'load_posts_by_ajax',
//   //     'page': page,
//   //     'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
//   // };
//   // post(ajaxurl, data, function((response) {
//   //     postdiv.append(response);
//   var para = document.createElement("P");
//     var t = document.createTextNode("This is a paragraph.");
//     para.appendChild(t);
//   postdiv.appendChild(para);
//       // page++;
//   });
// });
// var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
// var page = 2;
// jQuery(function($) {
//     $('body').on('click', '.loadmore', function() {
//         var data = {
//             'action': 'load_posts_by_ajax',
//             'page': page,
//             'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
//         };
//
//         $.post(ajaxurl, data, function(response) {
//             $('.my-posts').append(response);
//             page++;
//         });
//     });
// });
// });
// function sticky_relocate() {
//     var window_top = $(window).scrollTop();
//     var div_top = $('#sticky-anchor').offset().top;
//     if (window_top > div_top)
//         $('#sticky-element').addClass('sticky');
//     else
//         $('#sticky-element').removeClass('sticky');
// }
//
// $(function() {
//     $(window).scroll(sticky_relocate);
//     sticky_relocate();
// });

/***/ }),

/***/ 1:
/*!*******************************************!*\
  !*** multi ./assets/src/scripts/front.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/d/sites/bka2021/assets/src/scripts/front.js */"./assets/src/scripts/front.js");


/***/ })

/******/ });