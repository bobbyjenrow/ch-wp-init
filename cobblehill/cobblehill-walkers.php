<?php

// Example Walker Function
class Mobile_Walker_Nav_Menu_First extends Walker_Nav_Menu {

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "";
  }
  function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
    $object = $item->object;
    $type = $item->type;
    $title = $item->title;
    $description = $item->description;
    $permalink = $item->url;

    if ($depth == 0){
      $output .= "<li class='" .  implode(" ", $item->classes) . "'><a href=" . $permalink . ">". $title ."</a>";
    }
    else{
      $output .= "";
    }
  }
  function end_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
    if ($depth == 0){
      $output .= "</li>";
    }
    else{
      $output .= "";
    }
  }
  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "";
  }

}


?>
