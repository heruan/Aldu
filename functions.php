<?php

if (!function_exists('get_public_vars')) {
  function get_public_vars($class)
  {
    $result = array();
    foreach (get_class_vars($class) as $name => $default) {
      if (!isset($class::$$name)) {
        $result[$name] = $default;
      }
    }
    return $result;
  }
}
