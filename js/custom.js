/*
 * FitVids 1.1
 * Copyright 2013, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
 * Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
 * Released under the WTFPL license - http://sam.zoy.org/wtfpl/
*/
!function(t){"use strict";t.fn.fitVids=function(e){var i={customSelector:null,ignore:null};if(!document.getElementById("fit-vids-style")){var r=document.head||document.getElementsByTagName("head")[0],a=".fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}",d=document.createElement("div");d.innerHTML='<p>x</p><style id="fit-vids-style">'+a+"</style>",r.appendChild(d.childNodes[1])}return e&&t.extend(i,e),this.each(function(){var e=['iframe[src*="player.vimeo.com"]','iframe[src*="youtube.com"]','iframe[src*="youtube-nocookie.com"]','iframe[src*="kickstarter.com"][src*="video.html"]',"object","embed"];i.customSelector&&e.push(i.customSelector);var r=".fitvidsignore";i.ignore&&(r=r+", "+i.ignore);var a=t(this).find(e.join(","));a=a.not("object object"),a=a.not(r),a.each(function(e){var i=t(this);if(!(i.parents(r).length>0||"embed"===this.tagName.toLowerCase()&&i.parent("object").length||i.parent(".fluid-width-video-wrapper").length)){i.css("height")||i.css("width")||!isNaN(i.attr("height"))&&!isNaN(i.attr("width"))||(i.attr("height",9),i.attr("width",16));var a="object"===this.tagName.toLowerCase()||i.attr("height")&&!isNaN(parseInt(i.attr("height"),10))?parseInt(i.attr("height"),10):i.height(),d=isNaN(parseInt(i.attr("width"),10))?i.width():parseInt(i.attr("width"),10),o=a/d;if(!i.attr("id")){var h="fitvid"+e;i.attr("id",h)}i.wrap('<div class="fluid-width-video-wrapper"></div>').parent(".fluid-width-video-wrapper").css("padding-top",100*o+"%"),i.removeAttr("height").removeAttr("width")}})})}}(window.jQuery||window.Zepto);

(function($) {
	$(document).ready(function() {
		var $menuToggle = $('#menu-toggle'),
			$menuIcon = $menuToggle.find('i'),
			$menuContainer = $('.menu-wrap');

		var $navToggle = $('#nav-toggle'),
			$navIcon = $navToggle,
			$navContainer = $('.nav-wrap');

		// Navigation menu toggle
		$menuToggle.click(function(){
			if ( $menuIcon.hasClass('icon-plus') )
				$menuIcon.removeClass('icon-plus').addClass('icon-minus');
			else
				$menuIcon.removeClass('icon-minus').addClass('icon-plus');
			$menuContainer.slideToggle();
			return false;
		});
		// Navigation menu toggle
		$navToggle.click(function () {
			if ($navIcon.hasClass('nav-is-visible'))
				$navIcon.removeClass('nav-is-visible');
			else
				$navIcon.addClass('nav-is-visible');
			$navContainer.slideToggle();
			return false;
		});

		$(window).bind('resize orientationchange', function() {
			if ( ! $('body').hasClass('animated-navigation') ) {
				if ( $menuToggle.is(':hidden') ) {
					$menuContainer.show();
				} else {
					$menuIcon.removeClass('icon-minus').addClass('icon-plus');
					$menuContainer.hide();
				}
			}
		});
		$(window).bind('resize orientationchange', function () {
			if (!$('body').hasClass('animated-navigation')) {
				if ($navToggle.is(':hidden')) {
					$navContainer.show();
				} else {
					$navIcon.addClass('nav-is-visible');
					$navContainer.hide();
				}
			}
		});

		// Scroll to top
		$('#back-to-top').on('click', function(e) {
			$('html, body').animate({'scrollTop': 0});
			e.preventDefault();
		});

		// Responsive video embeds
		$('.hentry').fitVids({
			ignore: '.wp-block-embed__wrapper'
		});

		// Search field focus scroll to
		$('#search-trigger').on('click', function (e) {
			$('.search-field').focus();
			$("html, body").animate({ scrollTop: $('#search').offset().top });
			e.preventDefault();
		});

		//Custom Drilldown Menu
		$(".nav-wrap ul.menu > li.menu-item-has-children > a").click(function() {
			var content = $(this).html();
			$(this).next('.sub-menu').addClass("open");
			//$(".sub-menu.open").prepend('<li><a href="#" class="back" data-drilldown-back>'+ content +'</a></li>');
			$(".nav-wrap ul.menu > li a").addClass("close");
			$(".nav-wrap .sub-menu.open > li a").removeClass("close");
			$(".nav-wrap ul.menu .menu-item-description").addClass("close");
			//$(".nav-wrap").css("height", $('.nav-wrap .sub-menu.open').outerHeight())
			return false;
		});
		$(document).on("click", ".sub-menu.open li:eq(0) > a" , function() {
            $('.sub-menu.open').removeClass("open");
			$(".nav-wrap ul.menu > li a").removeClass("close");
			$(".nav-wrap ul.menu .menu-item-description").removeClass("close");
			//$(".nav-wrap").css("height", "auto");
			return false;
		});
		$(document).on("click", ".sub-menu.open > li.menu-item-has-children > a" , function() {
			$(this).toggleClass('is-active').next(".sub-menu").stop().slideToggle();

			//$(".nav-wrap").css("height", $('.nav-wrap .sub-menu.open').outerHeight())
			return false;
		});

		//Add spans to Free for Site Description
		$('#desc').html("Learn from industry's best for <span>FREE!</span>");
		$('li.av-select > a').html("How A<span>V</span>endorz Works");
		$('li.av-select2 > a').html("Why Join A<span>V</span>endorz");

	});

})(jQuery);
