/** 
 * This js script will be run on every pageview
 */
jQuery(document).ready(function($) {
  init();


  /**
   * Inits stuff
   * 
   * 1. The tooltip fom Bootstrap must be initialized, use like this:
   * <a href="#" data-toggle="tooltip" class="rep-tooltip" title="This is Kaptens tooltip" data-placement="top">Hover over me</a>
   * 
   * @returns {undefined}
   */
  function init() {
    $(".rep-tooltip").tooltip();
  }

});



