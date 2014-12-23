<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 12:08 PM
 */

namespace ODataQuery\Select;

use ODataQuery\ODataQueryOptionInterface;
use ODataQuery\ODataResource;
use ODataQuery\ODataResourceInterface;

class ODataQuerySelect implements ODataQueryOptionInterface {
    protected $properties = array();

    public function __construct(array $properties = array()) {
        $this->properties = $properties;
    }

    public function add($property) {
        if (array_search($property, $this->properties) === FALSE) {
            $this->properties[] = $property;
        }
        return $this;
    }

    public function remove($property) {
        if (($index = array_search($property, $this->properties)) !== FALSE) {
            unset($this->properties[$index]);
        }
        return $this;
    }

    public function get() {
        return $this->properties;
    }

    public function __toString() {
        return implode(',', $this->properties);
    }
}