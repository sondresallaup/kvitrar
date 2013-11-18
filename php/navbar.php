<?php ?>
<div class = "navbar navbar-inverse navbar-fixed-top">
  <div class = "container">
    <a href = "http://sondresallaup.com" class = "navbar-brand hidden-sm">Kvitrar</a>
     <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
      <span class = "icon-bar"></span>
      <span class = "icon-bar"></span>
      <span class = "icon-bar"></span>
    </button>
     <div class = "collapse navbar-collapse navHeaderCollapse">
      <ul class = "nav navbar-nav">
        <li <?php if('/index.php' == findCurrentPage()): ?>
            class = "active" <?php endif; ?> ><a href = "http://sondresallaup.com"><span class="glyphicon glyphicon-home"></span> Hjem</a></li>
        <?php if(isLoggedIn()): ?>
        <li <?php if('/connect/index.php' == findCurrentPage()): ?> 
            class = "active" <?php endif; ?>><a href = "/connect"><span class="glyphicon glyphicon-record"></span> Notifikasjoner</a></li>
        <li <?php if('/messages/index.php' == findCurrentPage()): ?>
            class = "active" <?php endif; ?>><a href = "/messages"><span class="glyphicon glyphicon-envelope"></span> Meldinger</a></li>
        <li <?php if('/moments/index.php' == findCurrentPage()): ?>
            class = "active" <?php endif; ?>><a href = "/moments"><span class="glyphicon glyphicon-calendar"></span> Moments <span class="label label-default">Beta</span></a></li>
        <li <?php if('/' .  loggedInUser()->username . '/index.php' == findCurrentPage()): ?>
            class = "active" <?php endif; ?> ><a href = "/<?php echo loggedInUser()->username; ?>"><span class="glyphicon glyphicon-user"></span> Meg</a></li>
        <?php endif; ?>
        
      </ul>
      <ul class = "nav navbar-nav navbar-right">
          <form class="navbar-form navbar-left" role="search" method="post" action="/search/index.php"  id="searchform">
      <div class="form-group">
          <input type="typeahead" class="form-control" placeholder="Søk" name="search">
      </div>
    </form>
          <?php if(isLoggedIn()): ?>
            <li><a href="/php/functions/logout.php">Logg ut</a></li>
            
        <?php endif; ?>
      </ul>
    </div>
  </div>
</div>
<?php ?>