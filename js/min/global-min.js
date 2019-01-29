/**
 * This script adds the jquery effects to the ICTU Theme discipl.org (2019) theme.
 *
 * @package discipl-2019\JS
 * @author StudioPress
 * @license GPL-2.0+
 */
!function(r,i){"use strict";function a(){0<i(r).scrollTop()&&"relative"!==i(".genesis-responsive-menu").css("position")?(i(".site-header").addClass("shrink"),i(".nav-secondary").addClass("shrink")):(i(".site-header").removeClass("shrink"),i(".nav-secondary").removeClass("shrink"))}function o(){var e;i(r).scrollTop()>=i(".front-page-1").height()+40&&"relative"!==i(".js nav").css("position")?i(".nav-secondary").addClass("fixed"):i(".nav-secondary").removeClass("fixed")}function t(e,s){var n=i(".menu-toggle").is(":visible");0==e.length&&0<s.length&&n?s.insertAfter(".title-area"):0==e.length&&0<s.length&&!n&&s.insertBefore(".content-sidebar-wrap")}i(r).ready(function(){var e=i(".nav-primary"),s=i(".nav-secondary, #genesis-mobile-nav-secondary");0==e.length&&0<s.length&&i(window).on("resize.moveNavs",function(){t(e,s)}).trigger("resize.moveNavs");var n=i("body");(n.hasClass("content-sidebar")||n.hasClass("sidebar-content"))&&i(".content, .sidebar").matchHeight({property:"min-height"}),a(),i(window).resize(a),i(window).resize(o),i(r).on("scroll",a),i(window).scroll(o)})}(document,jQuery);