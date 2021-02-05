(()=>{var e={575:e=>{e.exports=function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}},913:e=>{function t(e,t){for(var i=0;i<t.length;i++){var o=t[i];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}e.exports=function(e,i,o){return i&&t(e.prototype,i),o&&t(e,o),e}},713:e=>{e.exports=function(e,t,i){return t in e?Object.defineProperty(e,t,{value:i,enumerable:!0,configurable:!0,writable:!0}):e[t]=i,e}},474:(e,t,i)=>{var o,n;void 0===(n="function"==typeof(o=function(){var e="undefined"!=typeof window?window:this,t=e.Glider=function(t,i){var o=this;if(t._glider)return t._glider;if(o.ele=t,o.ele.classList.add("glider"),o.ele._glider=o,o.opt=Object.assign({},{slidesToScroll:1,slidesToShow:1,resizeLock:!0,duration:.5,easing:function(e,t,i,o,n){return o*(t/=n)*t+i}},i),o.animate_id=o.page=o.slide=0,o.arrows={},o._opt=o.opt,o.opt.skipTrack)o.track=o.ele.children[0];else for(o.track=document.createElement("div"),o.ele.appendChild(o.track);1!==o.ele.children.length;)o.track.appendChild(o.ele.children[0]);o.track.classList.add("glider-track"),o.init(),o.resize=o.init.bind(o,!0),o.event(o.ele,"add",{scroll:o.updateControls.bind(o)}),o.event(e,"add",{resize:o.resize})},i=t.prototype;return i.init=function(e,t){var i=this,o=0,n=0;i.slides=i.track.children,[].forEach.call(i.slides,(function(e){e.classList.add("glider-slide")})),i.containerWidth=i.ele.clientWidth;var r=i.settingsBreakpoint();if(t||(t=r),"auto"===i.opt.slidesToShow||void 0!==i.opt._autoSlide){var l=i.containerWidth/i.opt.itemWidth;i.opt._autoSlide=i.opt.slidesToShow=i.opt.exactWidth?l:Math.floor(l)}"auto"===i.opt.slidesToScroll&&(i.opt.slidesToScroll=Math.floor(i.opt.slidesToShow)),i.itemWidth=i.opt.exactWidth?i.opt.itemWidth:i.containerWidth/i.opt.slidesToShow,[].forEach.call(i.slides,(function(e){e.style.height="auto",e.style.width=i.itemWidth+"px",o+=i.itemWidth,n=Math.max(e.offsetHeight,n)})),i.track.style.width=o+"px",i.trackWidth=o,i.isDrag=!1,i.preventClick=!1,i.opt.resizeLock&&i.scrollTo(i.slide*i.itemWidth,0),(r||t)&&(i.bindArrows(),i.buildDots(),i.bindDrag()),i.updateControls(),i.emit(e?"refresh":"loaded")},i.bindDrag=function(){var e=this;e.mouse=e.mouse||e.handleMouse.bind(e);var t=function(){e.mouseDown=void 0,e.ele.classList.remove("drag"),e.isDrag&&(e.preventClick=!0),e.isDrag=!1},i={mouseup:t,mouseleave:t,mousedown:function(t){t.preventDefault(),t.stopPropagation(),e.mouseDown=t.clientX,e.ele.classList.add("drag")},mousemove:e.mouse,click:function(t){e.preventClick&&(t.preventDefault(),t.stopPropagation()),e.preventClick=!1}};e.ele.classList.toggle("draggable",!0===e.opt.draggable),e.event(e.ele,"remove",i),e.opt.draggable&&e.event(e.ele,"add",i)},i.buildDots=function(){var e=this;if(e.opt.dots){if("string"==typeof e.opt.dots?e.dots=document.querySelector(e.opt.dots):e.dots=e.opt.dots,e.dots){e.dots.innerHTML="",e.dots.classList.add("glider-dots");for(var t=0;t<Math.ceil(e.slides.length/e.opt.slidesToShow);++t){var i=document.createElement("button");i.dataset.index=t,i.setAttribute("aria-label","Page "+(t+1)),i.className="glider-dot "+(t?"":"active"),e.event(i,"add",{click:e.scrollItem.bind(e,t,!0)}),e.dots.appendChild(i)}}}else e.dots&&(e.dots.innerHTML="")},i.bindArrows=function(){var e=this;e.opt.arrows?["prev","next"].forEach((function(t){var i=e.opt.arrows[t];i&&("string"==typeof i&&(i=document.querySelector(i)),i._func=i._func||e.scrollItem.bind(e,t),e.event(i,"remove",{click:i._func}),e.event(i,"add",{click:i._func}),e.arrows[t]=i)})):Object.keys(e.arrows).forEach((function(t){var i=e.arrows[t];e.event(i,"remove",{click:i._func})}))},i.updateControls=function(e){var t=this;e&&!t.opt.scrollPropagate&&e.stopPropagation();var i=t.containerWidth>=t.trackWidth;t.opt.rewind||(t.arrows.prev&&t.arrows.prev.classList.toggle("disabled",t.ele.scrollLeft<=0||i),t.arrows.next&&t.arrows.next.classList.toggle("disabled",Math.ceil(t.ele.scrollLeft+t.containerWidth)>=Math.floor(t.trackWidth)||i)),t.slide=Math.round(t.ele.scrollLeft/t.itemWidth),t.page=Math.round(t.ele.scrollLeft/t.containerWidth);var o=t.slide+Math.floor(Math.floor(t.opt.slidesToShow)/2),n=Math.floor(t.opt.slidesToShow)%2?0:o+1;1===Math.floor(t.opt.slidesToShow)&&(n=0),t.ele.scrollLeft+t.containerWidth>=Math.floor(t.trackWidth)&&(t.page=t.dots?t.dots.children.length-1:0),[].forEach.call(t.slides,(function(e,i){var r=e.classList,l=r.contains("visible"),s=t.ele.scrollLeft,a=t.ele.scrollLeft+t.containerWidth,c=t.itemWidth*i,d=c+t.itemWidth;[].forEach.call(r,(function(e){/^left|right/.test(e)&&r.remove(e)})),r.toggle("active",t.slide===i),o===i||n&&n===i?r.add("center"):(r.remove("center"),r.add([i<o?"left":"right",Math.abs(i-(i<o?o:n||o))].join("-")));var u=Math.ceil(c)>=s&&Math.floor(d)<=a;r.toggle("visible",u),u!==l&&t.emit("slide-"+(u?"visible":"hidden"),{slide:i})})),t.dots&&[].forEach.call(t.dots.children,(function(e,i){e.classList.toggle("active",t.page===i)})),e&&t.opt.scrollLock&&(clearTimeout(t.scrollLock),t.scrollLock=setTimeout((function(){clearTimeout(t.scrollLock),Math.abs(t.ele.scrollLeft/t.itemWidth-t.slide)>.02&&(t.mouseDown||t.scrollItem(t.round(t.ele.scrollLeft/t.itemWidth)))}),t.opt.scrollLockDelay||250))},i.scrollItem=function(e,t,i){i&&i.preventDefault();var o=this,n=e;if(++o.animate_id,!0===t)e*=o.containerWidth,e=Math.round(e/o.itemWidth)*o.itemWidth;else{if("string"==typeof e){var r="prev"===e;if(e=o.opt.slidesToScroll%1||o.opt.slidesToShow%1?o.round(o.ele.scrollLeft/o.itemWidth):o.slide,r?e-=o.opt.slidesToScroll:e+=o.opt.slidesToScroll,o.opt.rewind){var l=o.ele.scrollLeft;e=r&&!l?o.slides.length:!r&&l+o.containerWidth>=Math.floor(o.trackWidth)?0:e}}e=Math.max(Math.min(e,o.slides.length),0),o.slide=e,e=o.itemWidth*e}return o.scrollTo(e,o.opt.duration*Math.abs(o.ele.scrollLeft-e),(function(){o.updateControls(),o.emit("animated",{value:n,type:"string"==typeof n?"arrow":t?"dot":"slide"})})),!1},i.settingsBreakpoint=function(){var t=this,i=t._opt.responsive;if(i){i.sort((function(e,t){return t.breakpoint-e.breakpoint}));for(var o=0;o<i.length;++o){var n=i[o];if(e.innerWidth>=n.breakpoint)return t.breakpoint!==n.breakpoint&&(t.opt=Object.assign({},t._opt,n.settings),t.breakpoint=n.breakpoint,!0)}}var r=0!==t.breakpoint;return t.opt=Object.assign({},t._opt),t.breakpoint=0,r},i.scrollTo=function(t,i,o){var n=this,r=(new Date).getTime(),l=n.animate_id,s=function(){var a=(new Date).getTime()-r;n.ele.scrollLeft=n.ele.scrollLeft+(t-n.ele.scrollLeft)*n.opt.easing(0,a,0,1,i),a<i&&l===n.animate_id?e.requestAnimationFrame(s):(n.ele.scrollLeft=t,o&&o.call(n))};e.requestAnimationFrame(s)},i.removeItem=function(e){var t=this;t.slides.length&&(t.track.removeChild(t.slides[e]),t.refresh(!0),t.emit("remove"))},i.addItem=function(e){var t=this;t.track.appendChild(e),t.refresh(!0),t.emit("add")},i.handleMouse=function(e){var t=this;t.mouseDown&&(t.isDrag=!0,t.ele.scrollLeft+=(t.mouseDown-e.clientX)*(t.opt.dragVelocity||3.3),t.mouseDown=e.clientX)},i.round=function(e){var t=1/(this.opt.slidesToScroll%1||1);return Math.round(e*t)/t},i.refresh=function(e){this.init(!0,e)},i.setOption=function(e,t){var i=this;i.breakpoint&&!t?i._opt.responsive.forEach((function(t){t.breakpoint===i.breakpoint&&(t.settings=Object.assign({},t.settings,e))})):i._opt=Object.assign({},i._opt,e),i.breakpoint=0,i.settingsBreakpoint()},i.destroy=function(){var t=this,i=t.ele.cloneNode(!0),o=function(e){e.removeAttribute("style"),[].forEach.call(e.classList,(function(t){/^glider/.test(t)&&e.classList.remove(t)}))};i.children[0].outerHTML=i.children[0].innerHTML,o(i),[].forEach.call(i.getElementsByTagName("*"),o),t.ele.parentNode.replaceChild(i,t.ele),t.event(e,"remove",{resize:t.resize}),t.emit("destroy")},i.emit=function(t,i){var o=this,n=new e.CustomEvent("glider-"+t,{bubbles:!o.opt.eventPropagate,detail:i});o.ele.dispatchEvent(n)},i.event=function(e,t,i){var o=e[t+"EventListener"].bind(e);Object.keys(i).forEach((function(e){o(e,i[e])}))},t})?o.call(t,i,t,e):o)||(e.exports=n)},521:function(e,t,i){"use strict";var o=this&&this.__importDefault||function(e){return e&&e.__esModule?e:{default:e}};Object.defineProperty(t,"__esModule",{value:!0});var n=o(i(575)),r=o(i(913)),l=o(i(713)),s=function(){function e(t){n.default(this,e),l.default(this,"_description",void 0),l.default(this,"_descriptionContent",void 0),l.default(this,"_review",void 0),l.default(this,"_reviewContent",void 0),this._description=document.querySelector(t.descriptionData),this._descriptionContent=document.querySelector(t.descriptionContent),this._review=document.querySelector(t.reviewsData),this._reviewContent=document.querySelector(t.reviewsContent),this._description&&this._addEvent()}return r.default(e,[{key:"_addEvent",value:function(){var e=this;this._description.addEventListener("click",(function(){e._review.classList.contains("active")&&(e._review.classList.remove("active"),e._reviewContent.classList.add("hidden"),e._description.classList.add("active"),e._descriptionContent.classList.remove("hidden"))})),this._review.addEventListener("click",(function(){e._description.classList.contains("active")&&(e._description.classList.remove("active"),e._descriptionContent.classList.add("hidden"),e._review.classList.add("active"),e._reviewContent.classList.remove("hidden"))}))}}]),e}();t.default=s},518:function(e,t,i){"use strict";var o=this&&this.__importDefault||function(e){return e&&e.__esModule?e:{default:e}};Object.defineProperty(t,"__esModule",{value:!0});var n=o(i(575)),r=o(i(913)),l=o(i(713)),s=function(){function e(t){n.default(this,e),l.default(this,"_menuOpen",void 0),l.default(this,"_dropDownMenu",void 0),l.default(this,"_dropDownMenuBtn",void 0),l.default(this,"_menuMobile",void 0),l.default(this,"_menuMobileAnim",void 0),l.default(this,"_menuMobileBtn",void 0),l.default(this,"_filter",void 0),l.default(this,"_filterBtn",void 0),l.default(this,"_filterCloseBtn",void 0),this._menuOpen=!1,this._dropDownMenu=document.querySelector(t.dropDownMenu),this._dropDownMenuBtn=document.querySelector(t.dropDownMenuBtn),this._menuMobile=document.querySelector(t.menuMobile),this._menuMobileAnim=document.querySelector(t.menuMobileAnim),this._menuMobileBtn=document.querySelector(t.menuMobileBtn),this._filter=document.querySelector(t.filter),this._filterBtn=document.querySelector(t.filterBtn),this._filterCloseBtn=document.querySelector(t.filterCloseBtn),this._onRemoveClickOut=this._onRemoveClickOut.bind(this),this._onRemoveScroll=this._onRemoveScroll.bind(this),this._addEvents()}return r.default(e,[{key:"_addEvents",value:function(){var e=this;["touchmove","click"].forEach((function(t){e._menuMobileBtn.addEventListener(t,(function(){e._menuOpen?(e._menuOpen=!1,e._menuMobile.classList.remove("active"),e._menuMobileAnim.classList.remove("open")):(e._menuOpen=!0,e._menuMobile.classList.add("active"),e._menuMobileAnim.classList.add("open"),window.addEventListener("scroll",e._onRemoveScroll))}))})),this._dropDownMenuBtn.addEventListener("click",(function(){e._menuOpen?(e._menuOpen=!1,e._dropDownMenu.classList.remove("active")):(e._menuOpen=!0,e._dropDownMenu.classList.add("active"),window.addEventListener("scroll",e._onRemoveScroll))})),this._filterBtn&&(this._filterBtn.addEventListener("click",(function(){e._menuOpen=!0,e._filter.classList.add("active"),window.addEventListener("scroll",e._onRemoveScroll)})),this._filterCloseBtn.addEventListener("click",(function(){e._menuOpen&&(e._menuOpen=!1,e._filter.classList.remove("active"))})))}},{key:"_onRemoveScroll",value:function(){this._menuOpen=!1,this._dropDownMenu.classList.remove("active"),this._menuMobile.classList.remove("active"),this._menuMobileAnim.classList.remove("open"),this._filter.classList.remove("active"),window.removeEventListener("scroll",this._onRemoveScroll)}},{key:"_onRemoveClickOut",value:function(e){e.target===e.currentTarget&&this._menuOpen&&(this._menuOpen=!1,this._dropDownMenu.classList.remove("active"),this._menuMobile.classList.remove("active"),this._menuMobileAnim.classList.remove("open"),this._filter.classList.remove("active"))}}]),e}();t.default=s},279:function(e,t,i){"use strict";var o=this&&this.__importDefault||function(e){return e&&e.__esModule?e:{default:e}};Object.defineProperty(t,"__esModule",{value:!0});var n=o(i(575)),r=o(i(913)),l=o(i(713)),s=function(){function e(t){var i=this;n.default(this,e),l.default(this,"_mainSalePrice",void 0),l.default(this,"_mainRegularPrice",void 0),l.default(this,"_price",void 0),l.default(this,"_salePrice",void 0),l.default(this,"_regularPrice",void 0),this._mainSalePrice=document.querySelector(t.mainSalePrice),this._mainRegularPrice=document.querySelector(t.mainRegularPrice),setInterval((function(){i._price=document.querySelector(t.price),i._salePrice=document.querySelector(t.salePrice),i._regularPrice=document.querySelector(t.regularPrice),i._price&&i._switchPrices()}),550)}return r.default(e,[{key:"_switchPrices",value:function(){this._price&&(this._mainRegularPrice.innerText="",this._mainSalePrice.innerText=this._price.innerText),this._regularPrice&&(this._mainRegularPrice.innerText=this._regularPrice.innerText,this._mainSalePrice.innerText=this._salePrice.innerText)}}]),e}();t.default=s},519:function(e,t,i){"use strict";var o=this&&this.__importDefault||function(e){return e&&e.__esModule?e:{default:e}};Object.defineProperty(t,"__esModule",{value:!0});var n=o(i(575)),r=o(i(913)),l=o(i(713)),s=function(){function e(t){n.default(this,e),l.default(this,"_gallery",void 0),l.default(this,"_galleryMain",void 0),l.default(this,"_galleryList",void 0),this._gallery=document.querySelector(t.gallery),this._galleryMain=document.querySelector(t.galleryMain),this._galleryList=document.querySelectorAll(t.galleryList),this._gallery&&(this._changeImage=this._changeImage.bind(this),this._addEvents())}return r.default(e,[{key:"_addEvents",value:function(){var e=this;this._galleryList.forEach((function(t){["click","mouseover"].forEach((function(i){t.addEventListener(i,(function(t){e._changeImage(t)}))}))}))}},{key:"_changeImage",value:function(e){e.currentTarget.src&&(this._galleryMain.src=e.currentTarget.src)}}]),e}();t.default=s},920:function(e,t,i){"use strict";var o=this&&this.__importDefault||function(e){return e&&e.__esModule?e:{default:e}};Object.defineProperty(t,"__esModule",{value:!0});var n=o(i(474)),r=document.getElementById("brands-slider");t.default=r&&new n.default(r,{slidesToScroll:1,slidesToShow:"auto",draggable:!0,duration:.25,arrows:{prev:".prev",next:".next"},responsive:[{breakpoint:360,settings:{slidesToScroll:1,slidesToShow:"auto",draggable:!0,duration:.25,itemWidth:150}},{breakpoint:775,settings:{slidesToScroll:1,slidesToShow:"auto",draggable:!0,itemWidth:150}},{breakpoint:1024,settings:{slidesToScroll:1,slidesToShow:"auto",draggable:!0,itemWidth:150}}]})},679:function(e,t,i){"use strict";var o=this&&this.__importDefault||function(e){return e&&e.__esModule?e:{default:e}};Object.defineProperty(t,"__esModule",{value:!0});var n=o(i(575)),r=o(i(913)),l=o(i(713)),s=function(){function e(t){n.default(this,e),l.default(this,"_mainElement",void 0),l.default(this,"_mainElementHeight",void 0),this._mainElement=document.querySelector(t),this._mainElementHeight=this._mainElement.offsetHeight,this._applyMargin(this._mainElement.nextElementSibling)}return r.default(e,[{key:"_applyMargin",value:function(e){e.style.marginTop="".concat(this._mainElementHeight,"px")}}]),e}();t.default=s},979:function(e,t,i){"use strict";var o=this&&this.__importDefault||function(e){return e&&e.__esModule?e:{default:e}};Object.defineProperty(t,"__esModule",{value:!0}),i(920);var n=o(i(521)),r=o(i(518)),l=o(i(279)),s=o(i(519)),a=o(i(679));new n.default({descriptionData:'[data-tab="description"]',descriptionContent:'[data-tab="description-content"]',reviewsData:'[data-tab="reviews"]',reviewsContent:'[data-tab="reviews-content"]'}),new r.default({menuMobile:".container-dropdown",menuMobileBtn:".btn-menu",menuMobileAnim:".btn-menu-mobile",dropDownMenu:".navigation-header .nav-dropdown .container-dropdown",dropDownMenuBtn:".navigation-header .nav-dropdown",filter:".filters",filterBtn:".btn-filter",filterCloseBtn:".btn-close"}),new l.default({mainSalePrice:".product-head .price .current-price",mainRegularPrice:".product-head .price .older-price",price:".woocommerce-variation .woocommerce-variation-price .price bdi",salePrice:".woocommerce-variation .woocommerce-variation-price .price ins bdi",regularPrice:".woocommerce-variation .woocommerce-variation-price .price del bdi"}),new a.default("header"),new s.default({gallery:'[data-gallery="gallery"]',galleryMain:'[data-gallery="main"]',galleryList:'[data-gallery="list"]'})},68:(e,t,i)=>{"use strict";i(979)}},t={};!function i(o){if(t[o])return t[o].exports;var n=t[o]={exports:{}};return e[o].call(n.exports,n,n.exports,i),n.exports}(68)})();