<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 10:05 PM
 */

namespace ODataQuery\Search;


interface ODataQuerySearchInterface {
    public function _and($conditional);
    public function _or($conditional);
    public function clear();
    public function __toString();
}