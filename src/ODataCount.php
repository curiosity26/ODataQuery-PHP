<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 3:57 PM
 */

namespace ODataQuery;


class ODataCount implements ODataQueryOptionInterface {
    protected $property;

    public function __construct($property = NULL) {
        $this->property($property);
    }

    public function property($property = NULL) {
        if (isset($property)) {
            $this->property = $property;
            return $this;
        }
        return $this->property;
    }

    public function __toString() {
        $property = $this->property();
        return "$property/\$count";
    }
}