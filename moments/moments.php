<?php
createContainer();
createRow();
createContentBoxtoLeft();?>
<br><br><br>
<div class="well hidden-sm hidden-xs hidden-md">
    <a href="/moments/capturemoment">Opprett nytt moment</a>
</div>
<?php
echo "</div>";
createContentBoxtoRight();
echo '<h3>Moments <span class="label label-default">Beta</span></h3>';

printAllMoments();

endBox();

?>
