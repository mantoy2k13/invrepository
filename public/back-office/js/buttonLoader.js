/*A jQuery plugin which add loading indicators into buttons
* By Minoli Perera
* MIT Licensed.
*/
!function(t){t(".has-spinner").attr("disabled",!1),t.fn.buttonLoader=function(a){var s=t(this);if("start"==a){if("disabled"==t(s).attr("disabled"))return!1;t(".has-spinner").attr("disabled",!0),t(s).attr("data-btn-text",t(s).text());var e="Loading";if(t(s).attr("data-load-text"),void 0!=t(s).attr("data-load-text")&&""!=t(s).attr("data-load-text"))var e=t(s).attr("data-load-text");t(s).html('<span class="spinner"><i class="fa fa-spinner fa-spin" title="button-loader"></i></span> '+e),t(s).addClass("active")}"stop"==a&&(t(s).html(t(s).attr("data-btn-text")),t(s).removeClass("active"),t(".has-spinner").attr("disabled",!1))}}(jQuery);