<?php
class Unites2 {
  const Sunday = 0;
  const Monday = 1;
  const Tuesday = 2;
  const Wednesday = 3;
  const Thursday = 4;
  const Friday = 5;
  const Saturday = 6;

  static function getConstants() {
      $oClass = new ReflectionClass(__CLASS__);
      return $oClass->getConstants();
  }
}
?>
