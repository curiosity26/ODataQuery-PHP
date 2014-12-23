<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/22/14
 * Time: 10:43 PM
 */

namespace ODataQuery\Expand;


interface ODataExpandableCollectionInterface {
    public function add(ODataQueryExpand $item);
    public function remove(ODataQueryExpand $item);
    public function get($property = NULL);
}