<?php
function createActiveMomentBox(){
    return '<div class="panel panel-success">';
}

function createInactiveMomentBox(){
    return '<div class="panel panel-default">';
}

function createMomentBoxHeader($title){
    return '<div class="panel-heading">
    <h3 class="panel-title">'.$title.'</h3>
  </div>';
}

function startMomentBoxBody(){
    return '<div class="panel-body">';
}

function endMomentBox(){
    return '</div></div>';
}
?>