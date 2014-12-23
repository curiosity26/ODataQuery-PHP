<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 10:33 AM
 */

namespace ODataQuery\Filter;


abstract class ODataQueryFilter implements ODataQueryFilterInterface {
  protected $property;
  protected $operator;

  public function __get($name) {
    if (property_exists($this, $name)) {
      return $this->$name;
    }
    return NULL;
  }

  public function __set($name, $value) {
    if (property_exists($this, $name)) {
      $this->$name = $value;
    }
  }

  public function __isset($name) {
    return property_exists($this, $name) && isset($this->$name);
  }

  public function __unset($name) {
    if(property_exists($this, $name)) {
      unset($this->$name);
    }
  }
}