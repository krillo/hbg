<?php
$post = $wp_query->get_queried_object();
//print_r($post);
?>

<script type="text/javascript" charset="utf-8">
  jQuery(document).ready(function($) {

    function show_form() {
      $("#un-feedback-form-wrapper").show();
      $("#rep-thankyou").hide();
      $(".un-feedback-errors-wrapper").hide();
      $("#un-feedback-loader").hide();
    }

    function show_error() {
      $(".un-feedback-errors-wrapper").show('slow');
    }

    function show_ajax() {
      $("#un-feedback-loader").show();
    }

    function show_thx() {
      $("#un-feedback-form-wrapper").hide();
      $("#rep-thankyou").show('slow');
    }


    function isValidEmailAddress(emailAddress) {
      var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
      return pattern.test(emailAddress);
    }



    //show feedback dialog
    $("#rep-feedback").click(function(event) {
      event.preventDefault();
      $("#un-feedback-wrapper").show('slow');
      $("#un-feedback-wrapper").dialog({
        height: 300,
        width: 380,
        modal: true
      });
      show_form();
    });

    //submit - ajax
    $("#rep-submit").click(function(event) {
      event.preventDefault();
      email = $('#rep_email').val();
      if (!isValidEmailAddress(email)) {
        show_error();
      } else {
        var data = {
          action: 'rep_feedback',
          pagename: $('#rep_pagename').val(),
          guid: $('#rep_guid').val(),
          to_email: $('#to_email').val(),
          email: email,
          msg: $('#rep-msg').val(),
          type: $('#rep-type').val()
        };
        $.post('/wp-admin/admin-ajax.php', data, function(response) {
          if (response.success) {
            show_thx();
          }
        });
      }
    });

    //handle type
    $(".feedback-type").click(function(event) {
      event.preventDefault();
      $(".feedback-type").removeClass("selected");
      $(this).addClass("selected");
      $("#rep-type").val($(this).attr("data-type"));
    });

    $('input, textarea').placeholder();

  });
</script> 






<!--button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button-->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Skicka din feedback</h4>
      </div>
      <div class="modal-body">
        <form action="#" method="post" class="un-feedback-form">
          <input value="<?php echo $post->post_title; ?>" id='rep_pagename' name="pagename" type="hidden" />				
          <input value="<?php echo $post->guid; ?>" id='rep_guid' name="guid" type="hidden" />				
          <input value="<?php the_field('to_email'); ?>" id='to_email' name="to_email" type="hidden" />
          <input value="Ide" id="rep-type" name="type" type="hidden" />
          <div class="types-wrapper">
            <a href="#" class="feedback-type selected" data-type="Ide"><i class="fa fa-lightbulb-o"></i>Idé</a>
            <a href="#" class="feedback-type" data-type="Fråga"><i class="fa fa-question-circle"></i>Fråga</a>
            <a href="#" class="feedback-type" data-type="Problem"><i class="fa fa-exclamation-circle"></i>Problem</a>
            <a href="#" class="feedback-type" data-type="Tack"><i class="fa fa-heart"></i>Tack</a>
          </div>
          <textarea id="rep-msg"  name="description" placeholder="Din feedback" class="form-control"></textarea>
          <input id="rep_email"  value="" name="email" type="text" placeholder="Din e-postadress" class="form-control">												
          <input type="submit" class="un-feedback-submit" value="Skicka" id="rep-submit">
          &nbsp;<img src="http://wp.dev/wp-content/plugins/usernoise/images/loader.gif" id="un-feedback-loader" class="loader" style="display: none;">
          <div class="un-feedback-errors-wrapper" style="display: none;">
            <div class="un-errors">Ogiltig emailadress</div>
          </div>
        </form>


        <div id="rep-thankyou" style="display: none;">
          <h2>Tack</h2>
          <p>
            <span style="float:left;">Din feedback är skickad.</span><span  style="float:left;margin-left: 20px;" class="ui-icon  ui-icon-check"></span>
          </p>
        </div>



      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



