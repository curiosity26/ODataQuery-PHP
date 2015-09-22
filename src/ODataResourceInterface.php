<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 11:47 PM
 */

namespace ODataQuery;


use ODataQuery\Expand\ODataExpandableCollectionInterface;
use ODataQuery\Filter\ODataQueryFilterInterface;
use ODataQuery\Pager\ODataQueryPager;
use ODataQuery\Search\ODataQuerySearch;
use ODataQuery\Select\ODataQuerySelect;

interface ODataResourceInterface {
    public function setSelect(ODataQuerySelect $select = NULL);
    public function setFilter(ODataQueryFilterInterface $filter = NULL);
    public function setExpand(ODataExpandableCollectionInterface $expand = NULL);
    public function setSearch(ODataQuerySearch $search = NULL);
    public function setPager(ODataQueryPager $pager = NULL);
    public function setOrderBy($orderBy = NULL);
    public function getSelect();
    public function getFilter();
    public function getExpand();
    public function getSearch();
    public function getPager();
    public function getOrderBy();
}