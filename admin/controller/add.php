<?php
  require("model/model.php");

  function create(){

    if(isset($_POST['submit'])){
      $add = insertnew($_POST['submit']);
      $addimg = addimg();
  }
}
