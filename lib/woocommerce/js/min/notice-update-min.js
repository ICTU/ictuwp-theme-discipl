/**
 * This script adds notice dismissal to the Author Pro theme.
 *
 * @package discipl-2019\JS
 * @author StudioPress
 * @license GPL-2.0+
 */
jQuery(document).on("click",".author-woocommerce-notice .notice-dismiss",function(){jQuery.ajax({url:ajaxurl,data:{action:"author_dismiss_woocommerce_notice"}})});