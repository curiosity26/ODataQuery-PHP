<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 10:53 PM
 */

namespace ODataQuery\Filter;


interface ODataQueryFilterInterface {
    public function property($property = NULL);
    public function __toString();
}