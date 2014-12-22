<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 10:05 PM
 */

namespace ODataQuery\Search;


interface ODataQuerySearchInterface {
    public function _and(ODataQuerySearchInterface $conditional);
    public function _or(ODataQuerySearchInterface $conditional);
    public function __toString();
}