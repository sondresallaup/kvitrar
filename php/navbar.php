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
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-success"><?php echo loggedInUser()->getNumberUnSeenNotifications(); ?></span> Notifikasjoner <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <?php echo loggedInUser()->getNotificationsInDropdown(); ?>
          <li class="divider"></li>
          <li><a href="/connect/">Se alle notifikasjoner</a></li>
        </ul>
      </li>
        <li <?php if('/messages/index.php' == findCurrentPage()): ?>
            class = "active" <?php endif; ?>><a href = "/messages"><span class="glyphicon glyphicon-envelope"></span> Meldinger</a></li>
        <li <?php if('/' .  loggedInUser()->username . '/index.php' == findCurrentPage()): ?>
            class = "active" <?php endif; ?> ><a href = "/<?php echo loggedInUser()->username; ?>"><?php loggedInUser()->getProfilePicture(20);?> Meg</a></li>
        <li <?php if('/transactions/index.php' == findCurrentPage()): ?>
            class = "active" <?php endif; ?> ><a href = "/transactions"><span class="label label-default">(NOK <?php echo loggedInUser()->getWalletValue(); ?>)</span> </a></li>
        
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
<?php 
createRow();
createContentBoxtoRight();
if(loggedInUser()->getNumberUnSeenNotifications()!= 0 ){
    echo '<div class="alert alert-info alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  Du har fått en <a href="/notifications" class="alert-link">notifikasjon</a>
</div>';
}
echo '</div>';
echo '</div>';

?>
