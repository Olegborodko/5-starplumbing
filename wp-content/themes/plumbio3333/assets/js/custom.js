(function($) {
	"use strict";
	
	// Classes and attributes
	function addClass(className) {
		var this$1 = this;
	  
		if (typeof className === 'undefined') {
		  return this;
		}
		var classes = className.split(' ');
		for (var i = 0; i < classes.length; i += 1) {
		  for (var j = 0; j < this.length; j += 1) {
			if (typeof this$1[j].classList !== 'undefined') { this$1[j].classList.add(classes[i]); }
		  }
		}
		return this;
	  }
	  function removeClass(className) {
		var this$1 = this;
	  
		var classes = className.split(' ');
		for (var i = 0; i < classes.length; i += 1) {
		  for (var j = 0; j < this.length; j += 1) {
			if (typeof this$1[j].classList !== 'undefined') { this$1[j].classList.remove(classes[i]); }
		  }
		}
		return this;
	  }
	  function hasClass(className) {
		if (!this[0]) { return false; }
		return this[0].classList.contains(className);
	  }
	  function toggleClass(className) {
		var this$1 = this;
	  
		var classes = className.split(' ');
		for (var i = 0; i < classes.length; i += 1) {
		  for (var j = 0; j < this.length; j += 1) {
			if (typeof this$1[j].classList !== 'undefined') { this$1[j].classList.toggle(classes[i]); }
		  }
		}
		return this;
	  }
	
	  
	var accordion = (function(){
		var objAccordeon = document.querySelectorAll("#tt-pageContent .js-accordeon"),
			objAccordeonArray = Array.prototype.slice.call(objAccordeon);
		if(objAccordeon){
			objAccordeonArray.forEach(function(el) {
				el.addEventListener("click", function(e) {
					if(e.target.classList.contains('tt-collapse__title') && e.target.parentNode.classList.contains('tt-show')){
						e.target.parentNode.classList.remove('tt-show');
					} else if(e.target.classList.contains('tt-collapse__title') && !e.target.parentNode.classList.contains('tt-show')){
						var wrapper = e.target.closest('.js-accordeon');
						wrapper.querySelectorAll(".tt-collapse__item").forEach(function(el) {
							if(el.classList.contains('tt-show')){
								el.classList.remove('tt-show');
							}
						});
						e.target.parentNode.classList.add('tt-show');
					};
				});
			});
		}
	}());
	
	(function(){
		function alignLayout(){
			var height=0;
			var objWraper = document.querySelectorAll("#tt-pageContent .js-align-layout"),
				objWraperArray = Array.prototype.slice.call(objWraper);
			if(objWraper){
				objWraperArray.forEach(function(item) {
					item.querySelectorAll(".js-align-layout__item").forEach(function(element){
						element.removeAttribute("style");
					});
					var heightOffset = 0;
					item.querySelectorAll(".js-align-layout__item").forEach(function(element) {
						height = getAbsoluteHeight(element);
						if(height > heightOffset){
							heightOffset = height;
						}
					});
					item.querySelectorAll(".js-align-layout__item").forEach(function(element){
						element.style.minHeight = heightOffset + 'px'
					});
				});
			};
			function getAbsoluteHeight(el) {
				el = (typeof el === 'string') ? document.querySelector(el) : el;
				var styles = window.getComputedStyle(el);
				return el.offsetHeight;
			};
		};
		var timer01;
		if (timer01) {
			clearTimeout(timer01);
		}
		timer01 = setTimeout(function(){
			alignLayout();
		}, 300);
		window.addEventListener('resize', function (){
			var timer02;
			if (timer02) {
				clearTimeout(timer02);
			}
			timer02 = setTimeout(function(){
				alignLayout();
			}, 300);
		});
	})();
	(function(){
		var btnTop = document.getElementById('js-backtotop');
		if(!btnTop) return;
		window.addEventListener('scroll', showBtn);
		btnTop.addEventListener('click', scrollTop);
		function showBtn(){
			var bodyScrollTop = document.documentElement.scrollTop || document.body.scrollTop;
			bodyScrollTop > 1000 ? btnTop.classList.add('tt-show') : btnTop.classList.remove('tt-show');
		};
		function scrollTop(){
			if(!window.pageYOffset > 0) return;
			window.scrollTo({top: 0, behavior: 'smooth'});
		};
	})();
	
	function debounce(func, wait, immediate) {
		var timeout;
		return function() {
			var context = this, args = arguments;
			var later = function() {
				timeout = null;
				if (!immediate) func.apply(context, args);
			};
			var callNow = immediate && !timeout;
			clearTimeout(timeout);
			timeout = setTimeout(later, wait);
			if (callNow) func.apply(context, args);
		};
	};
	/* Form Init Data*/
	flatpickr(".tt-flatpickr", {
		wrap: true,
	});
	/* Form Init Time */
	flatpickr(".tt-flatpickr-time", {
		enableTime: true,
		noCalendar: true,
		dateFormat: "H:i",
	});
	/* Blog Init alendar */
	flatpickr("#init-calendar", {
		inline: true
	});
	var $body = document.body;
	var supportsTouch = 'ontouchstart' in window || navigator.msMaxTouchPoints;
	if(supportsTouch === true) $body.classList.add('touch-device');
	if(/iPhone|iPad|iPod/i.test(navigator.userAgent))  $body.classList.add('is-ios');
	
	
	jQuery( window ).on( "load", function() {
		document.addEventListener('lazybeforeunveil', function(e){
			var bg = e.target.getAttribute('data-bg');
			if(bg){
				e.target.style.backgroundImage = 'url(' + bg + ')';
			}
		});
	});
	
	(function(){
		var objPopup = document.querySelectorAll("#tt-pageContent .glightbox");
		if(typeof objPopup === 'object' && objPopup !== null && !/iPad/i.test(navigator.userAgent)){
			var lightboxVideo = GLightbox({
				selector: '.glightbox3'
			});
			var lightbox = GLightbox({
				autoplayVideos: true
			});
		}
	}());
	var menuDesktop = (function(){
		function dropdownHandler(){
			if(window.innerWidth >= 1100){
		  var dropdown_delay=0;
				document.querySelectorAll('#js-desktop-menu li').forEach(function(dropdownItem){
					dropdownItem.querySelectorAll('ul').forEach(function(itemUl){
						var objUl = itemUl.parentNode;
						objUl.classList.add('has-submenu');
					});
					dropdownItem.onmouseenter = function(event, dropdownItem){
						var $this = (this);
						dropdown_delay = setTimeout(function(dropdownItem){
							if(!event.target) return false;
							dropdownItem.classList.add('is-active');
						}, 200, $this);
					};
					dropdownItem.onmouseleave = function(event, dropdownItem){
						clearTimeout(dropdown_delay);
						(this).classList.remove('is-active');
					};
				});
			};
		};
		dropdownHandler();
		window.addEventListener("resize", dropdownHandler);
	})();
	function menuMobile(){
		var objMenu = document.getElementById("js-mobile-menu"),
			objMenuNav =  objMenu.querySelector("nav"),
			objMenuHeight = objMenu.offsetHeight;
	
		Array.prototype.slice.call(objMenu.querySelectorAll('li')).forEach(function(itemUl){
			var obj = itemUl.querySelectorAll('ul').length;
			if(obj > 0){
				itemUl.classList.add('has-submenu');
				itemUl.insertAdjacentHTML('afterbegin', `<div class="link__open-submenu"></div>`)
			}
		});
		objMenu.addEventListener('click', function(e){
			if(e.target && e.target.classList.contains('link__open-submenu')) showSubmenu(e.target);
			if(e.target && e.target.classList.contains('tt-mobile-menu__back')) stepBack();
		});
		function showSubmenu($target){
	
			$target.parentNode.classList.add('active');
			setHeight($target);
	
			var getValueLeft = objMenuNav.style.left || 0,
				setNewValue = parseInt(getValueLeft) - 100;
	
			objMenuNav.style.left=setNewValue + "%";
			if(!objMenu.classList.contains('submenu-visible')){
				objMenu.classList.add('submenu-visible');
			};
	
		};
		function setHeight($target){
			$target.parentNode.classList.add('active');
			var objMenuHeightNew = $target.parentNode.querySelector("ul").offsetHeight;
			if(objMenuHeight < objMenuHeightNew){
				objMenu.style.minHeight = objMenuHeightNew + 40 + 'px';
			}
		};
		function stepBack(){
			var getValueLeft = objMenuNav.style.left || 0,
				setNewValue = parseInt(getValueLeft) + 100;
	
			objMenuNav.style.left=setNewValue + "%";
			if(setNewValue == 0){
				objMenu.classList.remove('submenu-visible');
				document.querySelectorAll('#js-mobile-menu li').forEach(function(item){
					if(item.classList.contains('active')) {
						item.classList.remove('active');
					};
				});
			};
			var actives = Array.prototype.slice.call(objMenu.querySelectorAll('li.active'));
			var lastActive = actives[(actives.length - 1)] || false;
			if(lastActive){
				lastActive.classList.remove('active');
			}
			objMenu.style.minHeight = objMenuHeight + 'px';
		};
	}
	
	var modal = (function(options){
		var modalLinks = document.querySelectorAll('div[data-modal]'),
			$objLockOffsetRight = document.querySelector("#js-init-sticky"),
			$body = document.body;
		if(modalLinks){
			document.addEventListener('click', function(e){
				if (event.target.hasAttribute('data-modal')) {
					var nameModal = event.target.dataset.modal,
						sizeModal = event.target.dataset.modalSize,
						srcModal = event.target.dataset.modalSrc;
					initModal(nameModal, sizeModal, srcModal);
				};
			}, false);
		};
		function initModal(nameModal, sizeModal, srcModal){
			if($body.classList.contains('tt-pupup-open')){
				document.querySelector('#js-popup .tt-popup__toggle').click();
			};
			createModalWrapper(nameModal, sizeModal);
			includeLayout(nameModal, srcModal);
			setTimeout(function() {
				flatpickr(".tt-flatpickr-time", {
					enableTime: true,
					noCalendar: true,
					dateFormat: "H:i",
				});
				flatpickr(".tt-flatpickr", {
					wrap: true,
				});
			}, 400)
		};
		function createModalWrapper(nameModal, sizeModal){
			$body.insertAdjacentHTML('beforeend', `<div class="tt-modal" id="${nameModal}">
				<div class="tt-modal__wrapper"></div>
				<div class="tt-modal__body ${sizeModal}">
					<div class="tt-modal__close icon-748122"><label>Close</label></div>
					<div class="tt-modal__layout"></div>
				</div>
			</div>`);
			return modal;
		};
		function includeLayout(nameModal, srcModal){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.querySelector("#" + nameModal+  ' .tt-modal__layout').innerHTML =
					this.responseText;
				}
			};
	  
			jQuery.ajax({
			type: "POST",
			dataType: "html",
			url: ajax_content_object.ajax_url,
			data: {
				action: 'plumbio_ajax_modal_schedule',
				security: ajax_content_object.ajax_nonce_plumbio_ajax_modal_schedule
				},
				success: function(data) {
					jQuery('.tt-modal__layout').html('');
					jQuery('.tt-modal__layout').append(data);
			
					document.querySelectorAll(".wpcf7 > form").forEach((
						function(e){
						return wpcf7.init(e)
						}
					));
					/* Form Init Data*/
					flatpickr(".tt-flatpickr", {
					
					});
					/* Form Init Time */
					flatpickr(".tt-flatpickr-time", {
						enableTime: true,
						noCalendar: true,
						dateFormat: "H:i",
					});
					/* Blog Init alendar */
					flatpickr("#init-calendar", {
						inline: true
					});
				
				}
			});
	
			var withScroll = window.innerWidth - document.documentElement.clientWidth;
			setTimeout(function(){
				showModal(nameModal, withScroll);
			}, 200);
		};
		function showModal(nameModal, withScroll){
			$body.classList.add('show-modal');
			document.getElementById(nameModal).classList.add('tt-modal__open');
			hangHandlerClose(nameModal);
			lockOffsetRight(withScroll);
			clickoutside(nameModal);
			setTimeout(function(){
				uploadFile(nameModal);
			}, 100);
			setTimeout(function(){
				initScroll(nameModal);
			
			}, 200);
			var checkWidth = window.innerWidth;
			window.addEventListener("resize", function(){
				var newWidth = window.innerWidth;
				if(newWidth !== checkWidth){
					closeModal(nameModal);
				}
			});
		};
		function closeModal(nameModal){
			$body.classList.remove('show-modal');
			$body.removeAttribute("style");
			$objLockOffsetRight.removeAttribute("style");
			document.getElementById(nameModal).classList.remove('tt-modal__open');
			enableScroll();
			setTimeout(function(){
				var elem = document.getElementById(nameModal);
				if (elem.length > 0) {
					elem.remove();
				}
			}, 1400);
		};
		function hangHandlerClose(nameModal){
			let objAsideClose = document.getElementById(nameModal);
			objAsideClose.querySelector(".tt-modal__close").addEventListener("click", function(e){
				closeModal(nameModal);
			});
	  };
	
	
		function lockOffsetRight(withScroll){
			$body.style.paddingRight = withScroll + 'px';
			if($objLockOffsetRight.classList.contains('sticky-header')){
				$objLockOffsetRight.style.paddingRight = withScroll + 'px';
			}
	  };
	  
		function clickoutside(nameModal){
			if(document.body.classList.contains('touch-device')){
				var objEvents = 'touchstart';
			} else {
				var objEvents = 'click';
			};
			document.addEventListener(objEvents, function(event) {
				if (event.target.classList.contains("tt-modal__wrapper")){
					closeModal(nameModal);
				}
			});
		};
		function uploadFile(nameModal){
			document.querySelectorAll("#" + nameModal +" .tt-upload__item").forEach(function(objItem){
				objItem.addEventListener("click", function(e) {
					var $this = this;
					$this.querySelector('input').click();
					$this.addEventListener('change', changeInput);
				});
			});
		};
		function initScroll(nameModal){
			var obj = document.querySelector("#" + nameModal),
				pointInitScroll = obj.querySelector(".tt-modal__body"),
				pointHeight = pointInitScroll.clientHeight,
				viewportHeight = window.innerHeight;
	
			if(viewportHeight <= pointHeight){
				disableScroll();
				obj.querySelector(".tt-modal__close").classList.add('btn-close__inner');
				pointInitScroll.classList.add('fixed-height');
				new PerfectScrollbar(pointInitScroll);
			};
		};
		function changeInput(event){
			if(event.target.files.length > 0){
				event.target.parentNode.classList.add("tt-files-uploaded");
			}
		};
		function preventDefault(e){
			e.preventDefault();
		};
		function disableScroll(){
			window.addEventListener('touchmove', preventDefault, { passive: false });
		};
		function enableScroll(){
			window.removeEventListener('touchmove', preventDefault,  { passive: false });
		};
	}());
	
	
	  
	  (function(){
		  if (!Element.prototype.matches) Element.prototype.matches = Element.prototype.msMatchesSelector;
		  if (!Element.prototype.closest) Element.prototype.closest = function (selector) {
			  var el = this;
			  while (el) {
				  if (el.matches(selector)) {
					  return el;
				  }
				  el = el.parentElement;
			  }
		  };
		  if (window.NodeList && !NodeList.prototype.forEach) {
			  NodeList.prototype.forEach = Array.prototype.forEach;
		  };
	  
	  })();
	  function hasClass(elem, className) {
		  return elem.classList.contains(className);
	  };
	
	var popupDropdown = (function(){
		if ($('.tt-popup').length) {
		var obj = document.querySelector("#js-header .tt-popup"),
			$body = document.body,
			$objLockOffsetRight = document.querySelector("#js-init-sticky");
		document.addEventListener('click', function (e) {
			var $target = e.target,
				objWrapper = document.getElementById('js-popup-wrapper'),
				withScroll = window.innerWidth - document.documentElement.clientWidth;
	
		checkInclude($target);
			if(!objWrapper){
				createPopupWrapper();
			};
			openPopup($target, withScroll);
			closePopup($target);
		}, false);
		function createPopupWrapper(){
			obj.insertAdjacentHTML('beforeend', '<div class="tt-popup__wrapper" id="js-popup-wrapper"></div>');
		};
		function openPopup($target, withScroll){
			if (hasClass($target, 'tt-popup__toggle')) {
				lockOffsetRight(withScroll);
				lockOffsetTop();
				$target.closest('.tt-popup').classList.toggle('to-show');
				$body.classList.toggle('tt-pupup-open');
				disableScroll();
			};
		};
		function lockOffsetTop(){
			var valueScroll = $body.scrollTop || document.documentElement.scrollTop;
			$body.style.top = valueScroll + 'px';
		}
		function lockOffsetRight(withScroll){
			$body.style.paddingRight = withScroll + 'px';
			if($objLockOffsetRight.classList.contains('sticky-header')){
				$objLockOffsetRight.style.paddingRight = withScroll + 'px';
			}
		};
		function closePopup($target){
			if (hasClass($target, 'tt-popup__toggle') && !hasClass(obj, 'to-show')){
				document.querySelector("#js-popup-wrapper").click();
			};
			if (hasClass($target, 'tt-popup__close')) {
				$target.closest('.tt-popup').classList.remove('to-show');
				$body.classList.remove('tt-pupup-open');
				$body.removeAttribute("style");
				$objLockOffsetRight.removeAttribute("style");
				enableScroll();
			};
		};
		function checkInclude($target){
	   
			if ($target.classList.contains('tt-popup__toggle')){
				var valueInclude = $target.closest('.tt-popup').dataset.ajaxCheck;
				if(valueInclude === 'true'){
			include();
			
				};
			};
	  };
	  
		function include(){
		
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var pointInclude = document.querySelector("#js-popup .tt-popup__dropdown");
					pointInclude.innerHTML = this.responseText;
					menuMobile();
					new PerfectScrollbar(pointInclude, {
						wheelSpeed: 2,
						wheelPropagation: true,
						minScrollbarLength: 20
					});
				}
			};
	
			jQuery.ajax({
				type: "POST",
				dataType: "html",
				url: ajax_content_object.ajax_url,
				data: {
					action: 'plumbio_ajax_header_popup',
					security: ajax_content_object.ajax_nonce_plumbio_ajax_header_popup
				},
				success: function(data) {
					jQuery('.tt-popup__dropdown').html('');
					jQuery('.tt-popup__dropdown').append(data);
					menuMobile();
					var pointInclude = document.querySelector("#js-popup .tt-popup__dropdown");
					new PerfectScrollbar(pointInclude, {
					wheelSpeed: 2,
					wheelPropagation: true,
					minScrollbarLength: 20
					});
				}
			});
		};
	
		window.addEventListener("resize", close);
		function close(){
			if (hasClass($body, 'tt-pupup-open')) {
				obj.querySelector(".tt-popup__toggle").touchstart();
			};
		};
		document.addEventListener('click', function(event) {
			var e = document.getElementById('js-popup-wrapper');
			if (e.contains(event.target)){
				document.querySelector("#js-header .tt-popup__close").click();
			};
		});
		function preventDefault(e){
			e.preventDefault();
		};
		function disableScroll(){
			document.body.addEventListener('touchmove', preventDefault, { passive: false });
		};
		function enableScroll(){
			document.body.removeEventListener('touchmove', preventDefault);
		};
	}
	}());
	
	
	
	/*
		Carusel
	*/
	(function(){
		function initCarusel(searchpoint){
			document.querySelectorAll('#' + searchpoint + ' [data-carousel="swiper"]').forEach(function(objCarusel){
				var slidesXXl = objCarusel.dataset.slidesXxl,
					slidesXl = objCarusel.dataset.slidesXl,
					slidesLg = objCarusel.dataset.slidesLg,
					slidesMd = objCarusel.dataset.slidesMd,
					slidesSm = objCarusel.dataset.slidesSm,
					slidesSm = objCarusel.dataset.slidesSm,
					autoplayDelay = objCarusel.dataset.autoplayDelay,
					spaceBetween = Number(objCarusel.dataset.spaceBetween),
					arrowLeft = objCarusel.getElementsByClassName("swiper-next")[0],
					arrowRight = objCarusel.getElementsByClassName("swiper-prev")[0];
	
	
				var swiper = new Swiper(objCarusel, {
					watchOverflow:true,
					spaceBetween:  spaceBetween  || 15,
					pagination: {
						el: '.swiper-pagination',
						clickable: true,
					},
					navigation: {
						nextEl: arrowLeft,
						prevEl: arrowRight,
						clickable: true
					},
					autoplay:{
						delay:autoplayDelay || 5000,
						stopOnLastSlide: false,
						disableOnInteraction: false
					},
					autoHeight:true,
	
					speed: 1000,
					breakpoints: {
						320: {
							slidesPerView: slidesSm || 2
						},
						576: {
							slidesPerView: slidesMd || 2,
							autoHeight: true,
						},
						768: {
							slidesPerView: slidesLg || 2,
							spaceBetween:  spaceBetween  || 30,
						},
						1025: {
							slidesPerView: slidesXl || 3
						},
						1500: {
							slidesPerView: slidesXXl || 3
						}
					},
					preloadeImages: false
	
				});
				window.addEventListener('resize', function () {
					var timer;
					if (timer) {
						clearTimeout(timer);
					}
					timer = setTimeout(function(){
						swiper.updateAutoHeight();
					}, 200);
				});
				window.addEventListener('DOMContentLoaded', function () {
					var timer;
					if (timer) {
						clearTimeout(timer);
					}
					timer = setTimeout(function(){
						swiper.update();
					}, 200);
				});
			});
		};
		initCarusel('tt-pageContent');
	})();
	
	(function(){
		var caruselGalleryLarge = document.querySelector('.gallery-large'),
			caruselGalleryThumbs = document.querySelector('.gallery-thumbs');
	
		if(caruselGalleryLarge && caruselGalleryThumbs){
			var galleryTop = new Swiper(caruselGalleryLarge, {
				spaceBetween: 10,
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				},
				loop: true,
				loopedSlides: 4,
				onSlideChangeEnd: function (s) {
					console.log('onSlideChangeEnd');
				}
			});
			var galleryThumbs = new Swiper(caruselGalleryThumbs, {
				spaceBetween: 14,
				slidesPerView: 4,
				slideToClickedSlide: true,
				loop: true,
				loopedSlides: 4,
				on:{
					progress: function() {
						Array.prototype.slice.call(caruselGalleryLarge.querySelectorAll('video')).forEach(function(obj) {
							obj.pause();
							obj.parentNode.classList.remove('tt-show-video');
						});
					}
				}
			});
			galleryTop.controller.control = galleryThumbs;
			galleryThumbs.controller.control = galleryTop;
	
			window.addEventListener('DOMContentLoaded', function () {
					var timer;
					if (timer) {
						clearTimeout(timer);
					}
					timer = setTimeout(function(){
						galleryTop.update();
						galleryThumbs.update();
					}, 500);
				});
	
	
			function playVideoLinks(){
				var linkVideo = document.querySelectorAll("#tt-pageContent .tt-link-video video"),
					linkVideoArray = Array.prototype.slice.call(linkVideo);
				if(linkVideo){
					if(document.body.classList.contains('touch-device')){
						var objEvents = 'touchstart';
					} else {
						var objEvents = 'click';
					};
					linkVideoArray.forEach(function(el) {
						el.addEventListener(objEvents, function(e) {
							event.preventDefault();
							var objWrapper = e.target.parentNode;
							if(!objWrapper.classList.contains('tt-show-video')){
								objWrapper.classList.add('tt-show-video');
								this.play();
							} else if(objWrapper.classList.contains('tt-show-video')){
								this.pause();
								objWrapper.classList.remove('tt-show-video');
							};
						});
					});
				}
			}
			playVideoLinks();
		};
	})();
	
	var interleaveOffset = 0.5,
	mainSlider =  document.getElementById('js-mainslider');
	  
	  if(mainSlider){
		  var swiperOptions = {
			  loop: true,
			  speed: 1500,
			  watchOverflow:true,
			  grabCursor: true,
			  watchSlidesProgress: true,
			  mousewheelControl: true,
			  keyboardControl: true,
			  loop: true,
			  observer: true,
			  observeParents: true,
			  slidesPerView: 'auto',
			  navigation: {
				  nextEl: ".mainslider__button-next",
				  prevEl: ".mainslider__button-prev"
			  },
			  autoplay: {
				  delay: 3000
			  },
			  on: {
				  progress: function() {
					  var swiper = this;
					  for (var i = 0; i < swiper.slides.length; i++) {
					  var slideProgress = swiper.slides[i].progress;
					  var innerOffset = swiper.width * interleaveOffset;
					  var innerTranslate = slideProgress * innerOffset;
					  swiper.slides[i].querySelector(".mainslider__imgbg").style.transform =
						  "translate3d(" + innerTranslate + "px, 0, 0)";
					  }
				  },
				  touchStart: function() {
					  var swiper = this;
					  for (var i = 0; i < swiper.slides.length; i++) {
					  swiper.slides[i].style.transition = "";
					  }
				  },
				  setTransition: function(speed) {
					  var swiper = this;
					  for (var i = 0; i < swiper.slides.length; i++) {
					  swiper.slides[i].style.transition = speed + "ms";
					  swiper.slides[i].querySelector(".mainslider__imgbg").style.transition =
						  speed + "ms";
					  }
				  }
			  },
			  breakpoints: {
				  600: {
					  speed: 1200
				  },
			  }
		  };
		  var swiper = new Swiper(mainSlider, swiperOptions);
	  }
	  
	  
	  var sticHeader = document.getElementById('js-init-sticky');
	  if( ajax_content_object.sticky_header_on == 1 && sticHeader != null ){
	
		function findOffset(element) {
			var top = 0, left = 0;
			do {
			top += element.offsetTop  || 0;
			left += element.offsetLeft || 0;
			element = element.offsetParent;
			} while(element);
			return {
			top: top,
			left: left
			};
		}
	 
		  window.onload = function () {
			var stickyHeader = document.getElementById('js-init-sticky');
			var headerOffset = findOffset(stickyHeader);
	  
			if(stickyHeader && headerOffset){
			  window.onscroll = function() {
				initStickyheader();
			  };
			  initStickyheader();
			};
			function initStickyheader(){
			  var bodyScrollTop = document.documentElement.scrollTop || document.body.scrollTop;
	  
			  if (bodyScrollTop >= headerOffset.top) {
				stickyHeader.classList.add('sticky-header');
			  } else {
				stickyHeader.classList.remove('sticky-header');
			  }
			};
		  };
	  }
	  
	  
	  var tabs = (function(){
		  if(document.body.classList.contains('touch-device')){
			  var objEvents = 'touchstart';
		  } else {
			  var objEvents = 'click';
		  };
		  document.body.addEventListener(objEvents, function(event) {
			  if(event.target.classList.contains('tabs__nav-item')){
				  var $target = event.target;
				  checkInclude($target);
				  checkNavActive($target);
				  checkTabActive($target);
				  checkIncludeFalse($target);
			  };
			  function checkNavActive($target){
				  var navItem = $target.parentNode.querySelectorAll('.tabs__nav-item'),
					  navItemArray = Array.prototype.slice.call(navItem);
	  
				  navItemArray.forEach(function(navItem){
					  if(navItem.classList.contains('active')){
						  navItem.classList.remove("active");
					  }
				  });
				  $target.classList.add("active");
			  };
			  function checkTabActive($target){
				  var pathtabActive = $target.dataset.pathtab,
					  srcItem = document.querySelector("#" + pathtabActive),
					  layouyItem = srcItem.parentNode.querySelectorAll('.tabs__layout-item'),
					  layouyItemArray = Array.prototype.slice.call(layouyItem);
	  
				  layouyItemArray.forEach(function(tabItem){
					  if(tabItem.classList.contains('active')){
						  tabItem.classList.remove("active");
					  }
				  });
				  srcItem.classList.add("active");
			  };
			  function checkInclude(el){
				  var vaueInclude = el.closest('.js-tabs').dataset.ajaxcheck;
				  if(vaueInclude){
					  var layouyItem = el.closest('.js-tabs').querySelectorAll('.tabs__container .tabs__layout-item'),
						  layouyItemArray = Array.prototype.slice.call(layouyItem);
					  layouyItemArray.forEach(function(item){
						  var valueSrc = item.dataset.include;
						  if(valueSrc){
							  var xhttp = new XMLHttpRequest();
							  xhttp.onreadystatechange = function() {
								  if (this.readyState == 4 && this.status == 200) {
									  item.innerHTML = this.responseText;
								  }
							  };
							  xhttp.open("GET", valueSrc, true);
							  xhttp.send();
						  }
					  });
				  }
			  };
			  function checkIncludeFalse($target){
				  $target.closest('.js-tabs').dataset.ajaxcheck = 'false';
			  };
		  }, false);
	  }());
	
	
	
		/* Sidebar Categories Class Add*/
		$('.widget_categories ul').addClass('tt-list tt-list__color01');
		$('.widget_product_categories ul.product-categories').addClass('tt-list tt-list__color01');
	
		/* Sidebar TagCloud Class Add */
		$('ul.wp-tag-cloud').addClass('tt-list02');
	
		//ttInputCounter
		var inputCounter = $('.tt-input-counter');
		if (inputCounter.length){
			inputCounter.find('.minus-btn, .plus-btn').on('click',function(e) {
				var $input = $(this).parent().find('input');
				var count = parseInt($input.val(), 10) + parseInt(e.currentTarget.className === 'plus-btn' ? 1 : -1, 10);
				$input.val(count).change();
			});
			inputCounter.find("input").change(function() {
				var _ = $(this);
				var min = 1;
				var val = parseInt(_.val(), 10);
				var max = parseInt(_.attr('size'), 10);
				val = Math.min(val, max);
				val = Math.max(val, min);
				_.val(val);
			})
			.on("keypress", function( e ) {
				if (e.keyCode === 13) {
					e.preventDefault();
				}
			});
		}
		  
		$('.google-business-reviews-rating .listing').slick({
			 infinite: true,
			  dots: true,
			 slidesToShow: 3,
			 slidesToScroll: 3
		});
	})(jQuery);