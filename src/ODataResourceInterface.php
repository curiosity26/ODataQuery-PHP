<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 11:47 PM
 */

namespace ODataQuery;


use ODataQuery\Expand\ODataExpandableInterface;
use ODataQuery\Filter\ODataQueryFilterInterface;
use ODataQuery\Pager\ODataQueryPager;
use ODataQuery\Search\ODataQuerySearch;
use ODataQuery\Select\ODataQuerySelect;

interface ODataResourceInterface {
    public function select(ODataQuerySelect $select = NULL);
    public function filter(ODataQueryFilterInterface $filter = NULL);
    public function expand(ODataExpandableInterface $expand = NULL);
    public function search(ODataQuerySearch $search = NULL);
    public function pager(ODataQueryPager $pager = NULL);
    public function orderBy($orderBy = NULL);
}