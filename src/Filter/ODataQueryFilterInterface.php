<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 10:53 PM
 */

namespace ODataQuery\Filter;


interface ODataQueryFilterInterface {
    public function __get($name);
    public function __set($name, $value);
    public function __toString();
}