<?php ?>
<div class = "navbar navbar-inverse navbar-static-top">
  <div class = "container">
    <a href = "http://sondresallaup.com" class = "navbar-brand">Kvitrar</a>
     <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
      <span class = "icon-bar"></span>
      <span class = "icon-bar"></span>
      <span class = "icon-bar"></span>
    </button>
     <div class = "collapse navbar-collapse navHeaderCollapse">
      <ul class = "nav navbar-nav">
        <li <?php if('index.php' == findCurrentPage()): ?>
            class = "active" <?php endif; ?> ><a href = "http://sondresallaup.com"><span class="glyphicon glyphicon-home"></span> Heim</a></li>
        <?php if(isLoggedIn()): ?>
        <li><a href = "#"><span class="glyphicon glyphicon-record"></span> Samhandlingar</a></li>
        <li><a href = "#"><span class="glyphicon glyphicon-eye-open"></span> Oppdag</a></li>
        <li <?php if('profile.php' == findCurrentPage()): ?>
            class = "active" <?php endif; ?> ><a href = "profile.php?i=<?php echo loggedInUsersId(); ?>"><span class="glyphicon glyphicon-user"></span> Meg</a></li>
        <?php endif; ?>
        
      </ul>
      <ul class = "nav navbar-nav navbar-right">
        <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Søk">
      </div>
      <button type="submit" class="btn btn-default">søk</button>
    </form>
          <?php if(isLoggedIn()): ?>
    <div class="btn-group">
          <li><button type="button" class="btn btn-default" data-toggle="dropdown">
                  <span class="glyphicon glyphicon-cog"></span></button></li>
          <ul class="dropdown-menu" role="menu">
            <li><a href="php/functions/logout.php">Logg ut</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
    </div>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</div>
<?php ?>