<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 9:56 PM
 */

namespace ODataQuery\Filter\Operators\Logical;


interface ODataConditionalInterface {
    public function _and($value);
    public function _or($value);
}