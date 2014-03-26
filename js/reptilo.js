/** 
 * This js script will be run on every pageview
 * @author Kristian Erendi
 */
jQuery(document).ready(function($) {
  init();


  /**
   * Inits stuff
   * 
   * 1. The tooltip fom Bootstrap must be initialized, use like this:
   * <a href="#" data-toggle="tooltip" class="rep-tooltip" title="This is Kaptens tooltip" data-placement="top">Hover over me</a>
   * 
   * 2. Get placeholder to work on IE, jquery.placeholder.js,  http://mths.be/placeholder v2.0.7 by @mathias
   * 
   * 
   * @returns {undefined}
   */
  function init() {
    $(".rep-tooltip").tooltip();
    $('input, textarea').placeholder();
    rep_page_hierarchy();
  }




  /**
   * Catch event - expand list in the rep-page-hierarchy navigation
   * Part of rep-page-hierarchy functionality
   */
  $(".rep-caret").click(function() {
    var postId = $(this).attr("data");
    var ulId = '#rep-children-to-' + postId;
    $(ulId).toggle('slow');
  });


  function rep_page_hierarchy() {
    $(".page_item_has_children ul").hide();
    $(".page_item_has_children.current_page_ancestor ul").show();
//  $(".page_item_has_children").prepend('<i class="fa fa-caret-down rep-caret-extra rep-closed" style="float:right;"></i>');


    $(".page_item_has_children").prepend('<i class="fa fa-caret-right rep-caret-extra rep-closed" style="float:right;"></i>');
  }




  $(".rep-caret-extra").click(function() {
    if ($(this).hasClass('rep-open')) {
      $(this).addClass('rep-closed');
      $(this).removeClass('rep-open');
      $(this).toggleClass("fa-caret-down fa-caret-right");
      $a = $(this).next();
      $ul = $a.next();
      $ul.hide('slow');
    } else {
      $(this).addClass('rep-open');
      $(this).removeClass('rep-closed');
      $(this).toggleClass("fa-caret-down fa-caret-right");
      $a = $(this).next();
      $ul = $a.next();
      $ul.show('slow');


    }


    /*    
     var postId = $(this).attr("data");
     var ulId = '#rep-children-to-' + postId;
     //$('.rep-top-children').hide('slow');
     $(ulId).toggle('slow');
     */
  });




});
