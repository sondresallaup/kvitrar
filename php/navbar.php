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
        <li class = "active"><a href = "http://sondresallaup.com">Heim</a></li>
        <li><a href = "#">Samhandlingar</a></li>
        <li><a href = "#">Oppdag</a></li>
        <li><a href = "/profile.php?i=<?php echo $_SESSION['user_id']; ?>">Meg</a></li>
      </ul>
      <ul class = "nav navbar-nav navbar-right">
        <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Søk">
      </div>
      <button type="submit" class="btn btn-default">søk</button>
    </form>
        <li><a href = "php/functions/logout.php">Logg ut</a></li>
      </ul>
    </div>
  </div>
</div>
<?php ?>