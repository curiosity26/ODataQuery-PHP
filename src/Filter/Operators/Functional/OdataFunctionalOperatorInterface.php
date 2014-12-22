<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 10:56 PM
 */

namespace ODataQuery\Filter\Operators\Functional;


interface ODataFunctionalOperatorInterface {
    public function property($prop = NULL);
    public function __toString();
}