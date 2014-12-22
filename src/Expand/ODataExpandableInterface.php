<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 11:06 PM
 */

namespace ODataQuery\Expand;


interface ODataExpandableInterface {
    public function add(ODataQueryExpand $item);
    public function remove(ODataQueryExpand $item);
    public function get($property = NULL);
}