<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 10:52 PM
 */

namespace ODataQuery\Filter\Operators\Logical;


interface ODataLogicalOperatorInterface {
    public function value($value = NULL);
}