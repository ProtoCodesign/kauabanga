/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is not neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/glider-js/glider.js":
/*!******************************************!*\
  !*** ./node_modules/glider-js/glider.js ***!
  \******************************************/
/***/ ((module, exports, __webpack_require__) => {

eval("var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;/* @preserve\n    _____ __ _     __                _\n   / ___// /(_)___/ /___  ____      (_)___\n  / (_ // // // _  // -_)/ __/_    / /(_-<\n  \\___//_//_/ \\_,_/ \\__//_/  (_)__/ //___/\n                              |___/\n\n  Version: 1.7.3\n  Author: Nick Piscitelli (pickykneee)\n  Website: https://nickpiscitelli.com\n  Documentation: http://nickpiscitelli.github.io/Glider.js\n  License: MIT License\n  Release Date: October 25th, 2018\n\n*/\n\n/* global define */\n\n(function (factory) {\n   true\n    ? !(__WEBPACK_AMD_DEFINE_FACTORY__ = (factory),\n\t\t__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?\n\t\t(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :\n\t\t__WEBPACK_AMD_DEFINE_FACTORY__),\n\t\t__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__))\n    : 0\n})(function () {\n  ('use strict') // eslint-disable-line no-unused-expressions\n\n  /* globals window:true */\n  var _window = typeof window !== 'undefined' ? window : this\n\n  var Glider = (_window.Glider = function (element, settings) {\n    var _ = this\n\n    if (element._glider) return element._glider\n\n    _.ele = element\n    _.ele.classList.add('glider')\n\n    // expose glider object to its DOM element\n    _.ele._glider = _\n\n    // merge user setting with defaults\n    _.opt = Object.assign(\n      {},\n      {\n        slidesToScroll: 1,\n        slidesToShow: 1,\n        resizeLock: true,\n        duration: 0.5,\n        // easeInQuad\n        easing: function (x, t, b, c, d) {\n          return c * (t /= d) * t + b\n        }\n      },\n      settings\n    )\n\n    // set defaults\n    _.animate_id = _.page = _.slide = 0\n    _.arrows = {}\n\n    // preserve original options to\n    // extend breakpoint settings\n    _._opt = _.opt\n\n    if (_.opt.skipTrack) {\n      // first and only child is the track\n      _.track = _.ele.children[0]\n    } else {\n      // create track and wrap slides\n      _.track = document.createElement('div')\n      _.ele.appendChild(_.track)\n      while (_.ele.children.length !== 1) {\n        _.track.appendChild(_.ele.children[0])\n      }\n    }\n\n    _.track.classList.add('glider-track')\n\n    // start glider\n    _.init()\n\n    // set events\n    _.resize = _.init.bind(_, true)\n    _.event(_.ele, 'add', {\n      scroll: _.updateControls.bind(_)\n    })\n    _.event(_window, 'add', {\n      resize: _.resize\n    })\n  })\n\n  var gliderPrototype = Glider.prototype\n  gliderPrototype.init = function (refresh, paging) {\n    var _ = this\n\n    var width = 0\n\n    var height = 0\n\n    _.slides = _.track.children;\n\n    [].forEach.call(_.slides, function (_) {\n      _.classList.add('glider-slide')\n    })\n\n    _.containerWidth = _.ele.clientWidth\n\n    var breakpointChanged = _.settingsBreakpoint()\n    if (!paging) paging = breakpointChanged\n\n    if (\n      _.opt.slidesToShow === 'auto' ||\n      typeof _.opt._autoSlide !== 'undefined'\n    ) {\n      var slideCount = _.containerWidth / _.opt.itemWidth\n\n      _.opt._autoSlide = _.opt.slidesToShow = _.opt.exactWidth\n        ? slideCount\n        : Math.floor(slideCount)\n    }\n    if (_.opt.slidesToScroll === 'auto') {\n      _.opt.slidesToScroll = Math.floor(_.opt.slidesToShow)\n    }\n\n    _.itemWidth = _.opt.exactWidth\n      ? _.opt.itemWidth\n      : _.containerWidth / _.opt.slidesToShow;\n\n    // set slide dimensions\n    [].forEach.call(_.slides, function (__) {\n      __.style.height = 'auto'\n      __.style.width = _.itemWidth + 'px'\n      width += _.itemWidth\n      height = Math.max(__.offsetHeight, height)\n    })\n\n    _.track.style.width = width + 'px'\n    _.trackWidth = width\n    _.isDrag = false\n    _.preventClick = false\n\n    _.opt.resizeLock && _.scrollTo(_.slide * _.itemWidth, 0)\n\n    if (breakpointChanged || paging) {\n      _.bindArrows()\n      _.buildDots()\n      _.bindDrag()\n    }\n\n    _.updateControls()\n\n    _.emit(refresh ? 'refresh' : 'loaded')\n  }\n\n  gliderPrototype.bindDrag = function () {\n    var _ = this\n    _.mouse = _.mouse || _.handleMouse.bind(_)\n\n    var mouseup = function () {\n      _.mouseDown = undefined\n      _.ele.classList.remove('drag')\n      if (_.isDrag) {\n        _.preventClick = true\n      }\n      _.isDrag = false\n    }\n\n    var events = {\n      mouseup: mouseup,\n      mouseleave: mouseup,\n      mousedown: function (e) {\n        e.preventDefault()\n        e.stopPropagation()\n        _.mouseDown = e.clientX\n        _.ele.classList.add('drag')\n      },\n      mousemove: _.mouse,\n      click: function (e) {\n        if (_.preventClick) {\n          e.preventDefault()\n          e.stopPropagation()\n        }\n        _.preventClick = false\n      }\n    }\n\n    _.ele.classList.toggle('draggable', _.opt.draggable === true)\n    _.event(_.ele, 'remove', events)\n    if (_.opt.draggable) _.event(_.ele, 'add', events)\n  }\n\n  gliderPrototype.buildDots = function () {\n    var _ = this\n\n    if (!_.opt.dots) {\n      if (_.dots) _.dots.innerHTML = ''\n      return\n    }\n\n    if (typeof _.opt.dots === 'string') {\n      _.dots = document.querySelector(_.opt.dots)\n    } else _.dots = _.opt.dots\n    if (!_.dots) return\n\n    _.dots.innerHTML = ''\n    _.dots.classList.add('glider-dots')\n\n    for (var i = 0; i < Math.ceil(_.slides.length / _.opt.slidesToShow); ++i) {\n      var dot = document.createElement('button')\n      dot.dataset.index = i\n      dot.setAttribute('aria-label', 'Page ' + (i + 1))\n      dot.className = 'glider-dot ' + (i ? '' : 'active')\n      _.event(dot, 'add', {\n        click: _.scrollItem.bind(_, i, true)\n      })\n      _.dots.appendChild(dot)\n    }\n  }\n\n  gliderPrototype.bindArrows = function () {\n    var _ = this\n    if (!_.opt.arrows) {\n      Object.keys(_.arrows).forEach(function (direction) {\n        var element = _.arrows[direction]\n        _.event(element, 'remove', { click: element._func })\n      })\n      return\n    }\n    ['prev', 'next'].forEach(function (direction) {\n      var arrow = _.opt.arrows[direction]\n      if (arrow) {\n        if (typeof arrow === 'string') arrow = document.querySelector(arrow)\n        arrow._func = arrow._func || _.scrollItem.bind(_, direction)\n        _.event(arrow, 'remove', {\n          click: arrow._func\n        })\n        _.event(arrow, 'add', {\n          click: arrow._func\n        })\n        _.arrows[direction] = arrow\n      }\n    })\n  }\n\n  gliderPrototype.updateControls = function (event) {\n    var _ = this\n\n    if (event && !_.opt.scrollPropagate) {\n      event.stopPropagation()\n    }\n\n    var disableArrows = _.containerWidth >= _.trackWidth\n\n    if (!_.opt.rewind) {\n      if (_.arrows.prev) {\n        _.arrows.prev.classList.toggle(\n          'disabled',\n          _.ele.scrollLeft <= 0 || disableArrows\n        )\n      }\n      if (_.arrows.next) {\n        _.arrows.next.classList.toggle(\n          'disabled',\n          Math.ceil(_.ele.scrollLeft + _.containerWidth) >=\n            Math.floor(_.trackWidth) || disableArrows\n        )\n      }\n    }\n\n    _.slide = Math.round(_.ele.scrollLeft / _.itemWidth)\n    _.page = Math.round(_.ele.scrollLeft / _.containerWidth)\n\n    var middle = _.slide + Math.floor(Math.floor(_.opt.slidesToShow) / 2)\n\n    var extraMiddle = Math.floor(_.opt.slidesToShow) % 2 ? 0 : middle + 1\n    if (Math.floor(_.opt.slidesToShow) === 1) {\n      extraMiddle = 0\n    }\n\n    // the last page may be less than one half of a normal page width so\n    // the page is rounded down. when at the end, force the page to turn\n    if (_.ele.scrollLeft + _.containerWidth >= Math.floor(_.trackWidth)) {\n      _.page = _.dots ? _.dots.children.length - 1 : 0\n    }\n\n    [].forEach.call(_.slides, function (slide, index) {\n      var slideClasses = slide.classList\n\n      var wasVisible = slideClasses.contains('visible')\n\n      var start = _.ele.scrollLeft\n\n      var end = _.ele.scrollLeft + _.containerWidth\n\n      var itemStart = _.itemWidth * index\n\n      var itemEnd = itemStart + _.itemWidth;\n\n      [].forEach.call(slideClasses, function (className) {\n        /^left|right/.test(className) && slideClasses.remove(className)\n      })\n      slideClasses.toggle('active', _.slide === index)\n      if (middle === index || (extraMiddle && extraMiddle === index)) {\n        slideClasses.add('center')\n      } else {\n        slideClasses.remove('center')\n        slideClasses.add(\n          [\n            index < middle ? 'left' : 'right',\n            Math.abs(index - (index < middle ? middle : extraMiddle || middle))\n          ].join('-')\n        )\n      }\n\n      var isVisible =\n        Math.ceil(itemStart) >= start && Math.floor(itemEnd) <= end\n      slideClasses.toggle('visible', isVisible)\n      if (isVisible !== wasVisible) {\n        _.emit('slide-' + (isVisible ? 'visible' : 'hidden'), {\n          slide: index\n        })\n      }\n    })\n    if (_.dots) {\n      [].forEach.call(_.dots.children, function (dot, index) {\n        dot.classList.toggle('active', _.page === index)\n      })\n    }\n\n    if (event && _.opt.scrollLock) {\n      clearTimeout(_.scrollLock)\n      _.scrollLock = setTimeout(function () {\n        clearTimeout(_.scrollLock)\n        // dont attempt to scroll less than a pixel fraction - causes looping\n        if (Math.abs(_.ele.scrollLeft / _.itemWidth - _.slide) > 0.02) {\n          if (!_.mouseDown) {\n            _.scrollItem(_.round(_.ele.scrollLeft / _.itemWidth))\n          }\n        }\n      }, _.opt.scrollLockDelay || 250)\n    }\n  }\n\n  gliderPrototype.scrollItem = function (slide, dot, e) {\n    if (e) e.preventDefault()\n\n    var _ = this\n\n    var originalSlide = slide\n    ++_.animate_id\n\n    if (dot === true) {\n      slide = slide * _.containerWidth\n      slide = Math.round(slide / _.itemWidth) * _.itemWidth\n    } else {\n      if (typeof slide === 'string') {\n        var backwards = slide === 'prev'\n\n        // use precise location if fractional slides are on\n        if (_.opt.slidesToScroll % 1 || _.opt.slidesToShow % 1) {\n          slide = _.round(_.ele.scrollLeft / _.itemWidth)\n        } else {\n          slide = _.slide\n        }\n\n        if (backwards) slide -= _.opt.slidesToScroll\n        else slide += _.opt.slidesToScroll\n\n        if (_.opt.rewind) {\n          var scrollLeft = _.ele.scrollLeft\n          slide =\n            backwards && !scrollLeft\n              ? _.slides.length\n              : !backwards &&\n                scrollLeft + _.containerWidth >= Math.floor(_.trackWidth)\n                ? 0\n                : slide\n        }\n      }\n\n      slide = Math.max(Math.min(slide, _.slides.length), 0)\n\n      _.slide = slide\n      slide = _.itemWidth * slide\n    }\n\n    _.scrollTo(\n      slide,\n      _.opt.duration * Math.abs(_.ele.scrollLeft - slide),\n      function () {\n        _.updateControls()\n        _.emit('animated', {\n          value: originalSlide,\n          type:\n            typeof originalSlide === 'string' ? 'arrow' : dot ? 'dot' : 'slide'\n        })\n      }\n    )\n\n    return false\n  }\n\n  gliderPrototype.settingsBreakpoint = function () {\n    var _ = this\n\n    var resp = _._opt.responsive\n\n    if (resp) {\n      // Sort the breakpoints in mobile first order\n      resp.sort(function (a, b) {\n        return b.breakpoint - a.breakpoint\n      })\n\n      for (var i = 0; i < resp.length; ++i) {\n        var size = resp[i]\n        if (_window.innerWidth >= size.breakpoint) {\n          if (_.breakpoint !== size.breakpoint) {\n            _.opt = Object.assign({}, _._opt, size.settings)\n            _.breakpoint = size.breakpoint\n            return true\n          }\n          return false\n        }\n      }\n    }\n    // set back to defaults in case they were overriden\n    var breakpointChanged = _.breakpoint !== 0\n    _.opt = Object.assign({}, _._opt)\n    _.breakpoint = 0\n    return breakpointChanged\n  }\n\n  gliderPrototype.scrollTo = function (scrollTarget, scrollDuration, callback) {\n    var _ = this\n\n    var start = new Date().getTime()\n\n    var animateIndex = _.animate_id\n\n    var animate = function () {\n      var now = new Date().getTime() - start\n      _.ele.scrollLeft =\n        _.ele.scrollLeft +\n        (scrollTarget - _.ele.scrollLeft) *\n          _.opt.easing(0, now, 0, 1, scrollDuration)\n      if (now < scrollDuration && animateIndex === _.animate_id) {\n        _window.requestAnimationFrame(animate)\n      } else {\n        _.ele.scrollLeft = scrollTarget\n        callback && callback.call(_)\n      }\n    }\n\n    _window.requestAnimationFrame(animate)\n  }\n\n  gliderPrototype.removeItem = function (index) {\n    var _ = this\n\n    if (_.slides.length) {\n      _.track.removeChild(_.slides[index])\n      _.refresh(true)\n      _.emit('remove')\n    }\n  }\n\n  gliderPrototype.addItem = function (ele) {\n    var _ = this\n\n    _.track.appendChild(ele)\n    _.refresh(true)\n    _.emit('add')\n  }\n\n  gliderPrototype.handleMouse = function (e) {\n    var _ = this\n    if (_.mouseDown) {\n      _.isDrag = true\n      _.ele.scrollLeft +=\n        (_.mouseDown - e.clientX) * (_.opt.dragVelocity || 3.3)\n      _.mouseDown = e.clientX\n    }\n  }\n\n  // used to round to the nearest 0.XX fraction\n  gliderPrototype.round = function (double) {\n    var _ = this\n    var step = _.opt.slidesToScroll % 1 || 1\n    var inv = 1.0 / step\n    return Math.round(double * inv) / inv\n  }\n\n  gliderPrototype.refresh = function (paging) {\n    var _ = this\n    _.init(true, paging)\n  }\n\n  gliderPrototype.setOption = function (opt, global) {\n    var _ = this\n\n    if (_.breakpoint && !global) {\n      _._opt.responsive.forEach(function (v) {\n        if (v.breakpoint === _.breakpoint) {\n          v.settings = Object.assign({}, v.settings, opt)\n        }\n      })\n    } else {\n      _._opt = Object.assign({}, _._opt, opt)\n    }\n\n    _.breakpoint = 0\n    _.settingsBreakpoint()\n  }\n\n  gliderPrototype.destroy = function () {\n    var _ = this\n\n    var replace = _.ele.cloneNode(true)\n\n    var clear = function (ele) {\n      ele.removeAttribute('style');\n      [].forEach.call(ele.classList, function (className) {\n        /^glider/.test(className) && ele.classList.remove(className)\n      })\n    }\n    // remove track\n    replace.children[0].outerHTML = replace.children[0].innerHTML\n    clear(replace);\n    [].forEach.call(replace.getElementsByTagName('*'), clear)\n    _.ele.parentNode.replaceChild(replace, _.ele)\n    _.event(_window, 'remove', {\n      resize: _.resize\n    })\n    _.emit('destroy')\n  }\n\n  gliderPrototype.emit = function (name, arg) {\n    var _ = this\n\n    var e = new _window.CustomEvent('glider-' + name, {\n      bubbles: !_.opt.eventPropagate,\n      detail: arg\n    })\n    _.ele.dispatchEvent(e)\n  }\n\n  gliderPrototype.event = function (ele, type, args) {\n    var eventHandler = ele[type + 'EventListener'].bind(ele)\n    Object.keys(args).forEach(function (k) {\n      eventHandler(k, args[k])\n    })\n  }\n\n  return Glider\n})\n\n\n//# sourceURL=webpack://@kauabanga/js/./node_modules/glider-js/glider.js?");

/***/ }),

/***/ "./src/dom/ChangeTab.ts":
/*!******************************!*\
  !*** ./src/dom/ChangeTab.ts ***!
  \******************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";
eval("\r\nObject.defineProperty(exports, \"__esModule\", ({ value: true }));\r\nvar ChangeTab = (function () {\r\n    function ChangeTab(elements) {\r\n        this._description = document.querySelector(elements.descriptionData);\r\n        this._descriptionContent = document.querySelector(elements.descriptionContent);\r\n        this._review = document.querySelector(elements.reviewsData);\r\n        this._reviewContent = document.querySelector(elements.reviewsContent);\r\n        if (!this._description) {\r\n            return;\r\n        }\r\n        this._addEvent();\r\n    }\r\n    ChangeTab.prototype._addEvent = function () {\r\n        var _this = this;\r\n        this._description.addEventListener('click', function () {\r\n            if (_this._review.classList.contains('active')) {\r\n                _this._review.classList.remove('active');\r\n                _this._reviewContent.classList.add('hidden');\r\n                _this._description.classList.add('active');\r\n                _this._descriptionContent.classList.remove('hidden');\r\n            }\r\n        });\r\n        this._review.addEventListener('click', function () {\r\n            if (_this._description.classList.contains('active')) {\r\n                _this._description.classList.remove('active');\r\n                _this._descriptionContent.classList.add('hidden');\r\n                _this._review.classList.add('active');\r\n                _this._reviewContent.classList.remove('hidden');\r\n            }\r\n        });\r\n    };\r\n    return ChangeTab;\r\n}());\r\nexports.default = ChangeTab;\r\n\n\n//# sourceURL=webpack://@kauabanga/js/./src/dom/ChangeTab.ts?");

/***/ }),

/***/ "./src/dom/ClickButton.ts":
/*!********************************!*\
  !*** ./src/dom/ClickButton.ts ***!
  \********************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";
eval("\r\nObject.defineProperty(exports, \"__esModule\", ({ value: true }));\r\nvar ClickButton = (function () {\r\n    function ClickButton(elements) {\r\n        this._menuOpen = false;\r\n        this._dropDownMenu = document.querySelector(elements.dropDownMenu);\r\n        this._dropDownMenuBtn = document.querySelector(elements.dropDownMenuBtn);\r\n        this._menuMobile = document.querySelector(elements.menuMobile);\r\n        this._menuMobileAnim = document.querySelector(elements.menuMobileAnim);\r\n        this._menuMobileBtn = document.querySelector(elements.menuMobileBtn);\r\n        this._filter = document.querySelector(elements.filter);\r\n        this._filterBtn = document.querySelector(elements.filterBtn);\r\n        this._filterCloseBtn = document.querySelector(elements.filterCloseBtn);\r\n        this._onRemoveClickOut = this._onRemoveClickOut.bind(this);\r\n        this._onRemoveScroll = this._onRemoveScroll.bind(this);\r\n        this._addEvents();\r\n    }\r\n    ClickButton.prototype._addEvents = function () {\r\n        var _this = this;\r\n        var eventTypes = ['touchmove', 'click'];\r\n        eventTypes.forEach(function (eventType) {\r\n            _this._menuMobileBtn.addEventListener(eventType, function () {\r\n                if (_this._menuOpen) {\r\n                    _this._menuOpen = false;\r\n                    _this._menuMobile.classList.remove('active');\r\n                    _this._menuMobileAnim.classList.remove('open');\r\n                }\r\n                else {\r\n                    _this._menuOpen = true;\r\n                    _this._menuMobile.classList.add('active');\r\n                    _this._menuMobileAnim.classList.add('open');\r\n                    window.addEventListener('scroll', _this._onRemoveScroll);\r\n                }\r\n            });\r\n        });\r\n        this._dropDownMenuBtn.addEventListener('click', function () {\r\n            if (_this._menuOpen) {\r\n                _this._menuOpen = false;\r\n                _this._dropDownMenu.classList.remove('active');\r\n            }\r\n            else {\r\n                _this._menuOpen = true;\r\n                _this._dropDownMenu.classList.add('active');\r\n                window.addEventListener('scroll', _this._onRemoveScroll);\r\n            }\r\n        });\r\n        if (this._filterBtn) {\r\n            this._filterBtn.addEventListener('click', function () {\r\n                _this._menuOpen = true;\r\n                _this._filter.classList.add('active');\r\n                window.addEventListener('scroll', _this._onRemoveScroll);\r\n            });\r\n            this._filterCloseBtn.addEventListener('click', function () {\r\n                if (_this._menuOpen) {\r\n                    _this._menuOpen = false;\r\n                    _this._filter.classList.remove('active');\r\n                }\r\n            });\r\n        }\r\n    };\r\n    ClickButton.prototype._onRemoveScroll = function () {\r\n        this._menuOpen = false;\r\n        this._dropDownMenu.classList.remove('active');\r\n        this._menuMobile.classList.remove('active');\r\n        this._menuMobileAnim.classList.remove('open');\r\n        this._filter.classList.remove('active');\r\n        window.removeEventListener('scroll', this._onRemoveScroll);\r\n    };\r\n    ClickButton.prototype._onRemoveClickOut = function (e) {\r\n        if (e.target === e.currentTarget && this._menuOpen) {\r\n            this._menuOpen = false;\r\n            this._dropDownMenu.classList.remove('active');\r\n            this._menuMobile.classList.remove('active');\r\n            this._menuMobileAnim.classList.remove('open');\r\n            this._filter.classList.remove('active');\r\n        }\r\n    };\r\n    return ClickButton;\r\n}());\r\nexports.default = ClickButton;\r\n\n\n//# sourceURL=webpack://@kauabanga/js/./src/dom/ClickButton.ts?");

/***/ }),

/***/ "./src/dom/Gallery.ts":
/*!****************************!*\
  !*** ./src/dom/Gallery.ts ***!
  \****************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";
eval("\r\nObject.defineProperty(exports, \"__esModule\", ({ value: true }));\r\nvar Gallery = (function () {\r\n    function Gallery(elements) {\r\n        this._gallery = document.querySelector(elements.gallery);\r\n        this._galleryMain = document.querySelector(elements.galleryMain);\r\n        this._galleryList = document.querySelectorAll(elements.galleryList);\r\n        if (!this._gallery)\r\n            return;\r\n        this._changeImage = this._changeImage.bind(this);\r\n        this._addEvents();\r\n    }\r\n    Gallery.prototype._addEvents = function () {\r\n        var _this = this;\r\n        this._galleryList.forEach(function (img) {\r\n            var eventTypes = ['click', 'mouseover'];\r\n            eventTypes.forEach(function (eventType) {\r\n                img.addEventListener(eventType, function (e) {\r\n                    _this._changeImage(e);\r\n                });\r\n            });\r\n        });\r\n    };\r\n    Gallery.prototype._changeImage = function (e) {\r\n        if (e.currentTarget.src) {\r\n            this._galleryMain.src = e.currentTarget.src;\r\n        }\r\n    };\r\n    return Gallery;\r\n}());\r\nexports.default = Gallery;\r\n\n\n//# sourceURL=webpack://@kauabanga/js/./src/dom/Gallery.ts?");

/***/ }),

/***/ "./src/dom/Glider.ts":
/*!***************************!*\
  !*** ./src/dom/Glider.ts ***!
  \***************************/
/***/ (function(__unused_webpack_module, exports, __webpack_require__) {

"use strict";
eval("\r\nvar __importDefault = (this && this.__importDefault) || function (mod) {\r\n    return (mod && mod.__esModule) ? mod : { \"default\": mod };\r\n};\r\nObject.defineProperty(exports, \"__esModule\", ({ value: true }));\r\nvar glider_js_1 = __importDefault(__webpack_require__(/*! glider-js */ \"./node_modules/glider-js/glider.js\"));\r\nvar element = document.getElementById('brands-slider');\r\nexports.default = element &&\r\n    new glider_js_1.default(element, {\r\n        slidesToScroll: 1,\r\n        slidesToShow: 'auto',\r\n        draggable: true,\r\n        duration: 0.25,\r\n        arrows: {\r\n            prev: '.prev',\r\n            next: '.next',\r\n        },\r\n        responsive: [\r\n            {\r\n                breakpoint: 360,\r\n                settings: {\r\n                    slidesToScroll: 1,\r\n                    slidesToShow: 'auto',\r\n                    draggable: true,\r\n                    duration: 0.25,\r\n                    itemWidth: 150,\r\n                },\r\n            },\r\n            {\r\n                breakpoint: 775,\r\n                settings: {\r\n                    slidesToScroll: 1,\r\n                    slidesToShow: 'auto',\r\n                    draggable: true,\r\n                    itemWidth: 150,\r\n                },\r\n            },\r\n            {\r\n                breakpoint: 1024,\r\n                settings: {\r\n                    slidesToScroll: 1,\r\n                    slidesToShow: 'auto',\r\n                    draggable: true,\r\n                    itemWidth: 150,\r\n                },\r\n            },\r\n        ],\r\n    });\r\n\n\n//# sourceURL=webpack://@kauabanga/js/./src/dom/Glider.ts?");

/***/ }),

/***/ "./src/dom/NextElement.ts":
/*!********************************!*\
  !*** ./src/dom/NextElement.ts ***!
  \********************************/
/***/ ((__unused_webpack_module, exports) => {

"use strict";
eval("\r\nObject.defineProperty(exports, \"__esModule\", ({ value: true }));\r\nvar NextElement = (function () {\r\n    function NextElement(element) {\r\n        this._mainElement = document.querySelector(element);\r\n        this._mainElementHeight = this._mainElement.offsetHeight;\r\n        this._applyMargin(this._mainElement.nextElementSibling);\r\n    }\r\n    NextElement.prototype._applyMargin = function (element) {\r\n        element.style.marginTop = this._mainElementHeight + \"px\";\r\n    };\r\n    return NextElement;\r\n}());\r\nexports.default = NextElement;\r\n\n\n//# sourceURL=webpack://@kauabanga/js/./src/dom/NextElement.ts?");

/***/ }),

/***/ "./src/dom/index.ts":
/*!**************************!*\
  !*** ./src/dom/index.ts ***!
  \**************************/
/***/ (function(__unused_webpack_module, exports, __webpack_require__) {

"use strict";
eval("\r\nvar __importDefault = (this && this.__importDefault) || function (mod) {\r\n    return (mod && mod.__esModule) ? mod : { \"default\": mod };\r\n};\r\nObject.defineProperty(exports, \"__esModule\", ({ value: true }));\r\n__webpack_require__(/*! ./Glider */ \"./src/dom/Glider.ts\");\r\nvar ChangeTab_1 = __importDefault(__webpack_require__(/*! ./ChangeTab */ \"./src/dom/ChangeTab.ts\"));\r\nvar ClickButton_1 = __importDefault(__webpack_require__(/*! ./ClickButton */ \"./src/dom/ClickButton.ts\"));\r\nvar Gallery_1 = __importDefault(__webpack_require__(/*! ./Gallery */ \"./src/dom/Gallery.ts\"));\r\nvar NextElement_1 = __importDefault(__webpack_require__(/*! ./NextElement */ \"./src/dom/NextElement.ts\"));\r\nnew ChangeTab_1.default({\r\n    descriptionData: '[data-tab=\"description\"]',\r\n    descriptionContent: '[data-tab=\"description-content\"]',\r\n    reviewsData: '[data-tab=\"reviews\"]',\r\n    reviewsContent: '[data-tab=\"reviews-content\"]',\r\n});\r\nnew ClickButton_1.default({\r\n    menuMobile: '.container-dropdown',\r\n    menuMobileBtn: '.btn-menu',\r\n    menuMobileAnim: '.btn-menu-mobile',\r\n    dropDownMenu: '.navigation-header .nav-dropdown .container-dropdown',\r\n    dropDownMenuBtn: '.navigation-header .nav-dropdown',\r\n    filter: '.filters',\r\n    filterBtn: '.btn-filter',\r\n    filterCloseBtn: '.btn-close',\r\n});\r\nnew NextElement_1.default('header');\r\nnew Gallery_1.default({\r\n    gallery: '[data-gallery=\"gallery\"]',\r\n    galleryMain: '[data-gallery=\"main\"]',\r\n    galleryList: '[data-gallery=\"list\"]',\r\n});\r\n\n\n//# sourceURL=webpack://@kauabanga/js/./src/dom/index.ts?");

/***/ }),

/***/ "./src/index.ts":
/*!**********************!*\
  !*** ./src/index.ts ***!
  \**********************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";
eval("\r\nObject.defineProperty(exports, \"__esModule\", ({ value: true }));\r\n__webpack_require__(/*! ./dom/index */ \"./src/dom/index.ts\");\r\n\n\n//# sourceURL=webpack://@kauabanga/js/./src/index.ts?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		if(__webpack_module_cache__[moduleId]) {
/******/ 			return __webpack_module_cache__[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	// startup
/******/ 	// Load entry module
/******/ 	__webpack_require__("./src/index.ts");
/******/ 	// This entry module used 'exports' so it can't be inlined
/******/ })()
;