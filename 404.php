<?php get_header();
?>
<div class="container">
  <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
  <div class="row">
  <div class="col-md-3" id="nav-sidebar">
    <?php if (function_exists('pageHiearachy')) pageHiearachy(); ?>
  </div>
  <div class="col-md-7">  
    <h1>Beklagar, sidan du försöker visa finns tyvärr inte!</h1>
    <div class="row search-area-large">
      <div class="col-md-1">&nbsp;</div>
      <div class="col-md-10">
        <form action="/" method="get" role="search" id="hbg-search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Vad söker du?" autocomplete="off" type="text" name="s">
            <span class="input-group-btn">
              <input class="btn btn-default" type="submit" value="Sök!">
            </span>
          </div>
        </form>
      </div>
      <div class="col-md-1">&nbsp;</div>
    </div>         
  </div>
  <div class="col-md-2" id="second-sidebar">
    tjoho
  </div>     
</div>
</div>  <!-- end container -->
<?php get_footer(); ?>