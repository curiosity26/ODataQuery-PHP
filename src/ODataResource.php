<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 11:05 PM
 */

namespace ODataQuery;


use ODataQuery\Expand\ODataExpandableCollectionInterface;
use ODataQuery\Expand\ODataExpandableInterface;
use ODataQuery\Filter\ODataQueryFilterInterface;
use ODataQuery\Pager\ODataQueryPager;
use ODataQuery\Search\ODataQuerySearch;
use ODataQuery\Select\ODataQuerySelect;

class ODataResource implements ODataQueryOptionInterface, ODataResourceInterface {
    protected $pager;
    protected $filter;
    protected $search;
    protected $select;
    protected $expand;
    protected $count = FALSE;
    protected $orderBy;

    public function __construct(ODataQueryFilterInterface $filter = NULL, ODataQuerySelect $select = NULL,
        ODataResource $expand = NULL, ODataQueryPager $pager = NULL,
        ODataQuerySearch $search = NULL, $orderBy = NULL) {

        $this->setSelect($select);
        $this->setPager($pager);
        $this->setFilter($filter);
        $this->setSearch($search);
        $this->setExpand($expand);
        $this->setOrderBy($orderBy);
    }

    /**
     * Use getter or setter
     * Retained for backward compatibility
     * @param ODataQueryPager|null $pager
     * @return $this|mixed
     * @deprecated
     */
    public function pager(ODataQueryPager $pager = NULL) {
        if (isset($pager)) {
            $this->setPager($pager);
            return $this;
        }
        return $this->getPager();
    }

    /**
     * Use getter or setter
     * Retained for backward compatibility
     * @param ODataQueryFilterInterface|null $filter
     * @return $this|mixed
     * @deprecated
     */
    public function filter(ODataQueryFilterInterface $filter = NULL) {
        if (isset($filter)) {
            $this->setFilter($filter);
            return $this;
        }
        return $this->getFilter();
    }

    /**
     * Use getter or setter
     * Retained for backward compatibility
     * @param ODataQuerySearch|null $search
     * @return $this|mixed
     * @deprecated
     */
    public function search(ODataQuerySearch $search = NULL) {
        if (isset($search)) {
            $this->setSearch($search);
            return $this;
        }
        return $this->getSearch();
    }

    /**
     * Use getter or setter
     * Retained for backward compatibility
     * @param ODataQuerySelect|null $select
     * @return $this
     * @deprecated
     */
    public function select(ODataQuerySelect $select = NULL) {
        if (isset($select)) {
            $this->setSelect($select);
            return $this;
        }
        return $this->getSelect();
    }

    /**
     * Use getter or setter
     * Retained for backward compatibility
     * @param ODataExpandableCollectionInterface|null $expand
     * @return $this
     * @deprecated
     */
    public function expand(ODataExpandableCollectionInterface $expand = NULL) {
        if (isset($expand)) {
            $this->setExpand($expand);
            return $this;
        }
        return $this->getExpand();
    }

    /**
     * Retained for backward compatibility
     * @param null $orderBy
     * @return $this
     * @deprecated
     */
    public function orderBy($orderBy = NULL) {
        if (isset($orderBy)) {
            $this->setOrderBy($orderBy);
            return $this;
        }
        return $this->getOrderBy();
    }

    /**
     * Use getter or setter
     * Retained for backward compatibility
     * @param bool|true $enable
     * @return $this
     * @deprecated
     */
    public function count($enable = TRUE) {
        $this->count = $enable === TRUE;
        return $this;
    }

    public function build() {
        $build = array(
                '$select' => $this->getSelect(),
                '$filter' => $this->getFilter(),
                '$search' => $this->getSearch(),
                '$expand' => $this->getExpand(),
                '$orderby' => $this->getOrderBy(),
            );

        $pager = $this->getPager();
        if (isset($pager)) {
            $build += $pager->build();
        }

        // Count Overrides other parameters
        if ($this->count === TRUE) {
            $build = array('$count' => TRUE);
        }
        return array_filter($build);
    }

    public function __toString() {
       $build = $this->build();
        $args = array();
        if (!empty($build)) {
            foreach ($build as $name => $value) {
                $args[] = "$name=$value";
            }
        }
       return implode('&', $args);
    }

    /**
     * @return ODataQueryPager
     */
    public function getPager()
    {
        return $this->pager;
    }

    /**
     * @param ODataQueryPager|null $pager
     * @return ODataResource
     */
    public function setPager(ODataQueryPager $pager = NULL)
    {
        $this->pager = $pager;
        return $this;
    }

    /**
     * @return ODataQueryFilterInterface
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param ODataQueryFilterInterface|null $filter
     * @return ODataResource
     */
    public function setFilter(ODataQueryFilterInterface $filter = NULL)
    {
        $this->filter = $filter;
        return $this;
    }

    /**
     * @return ODataQuerySearch
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * @param ODataQuerySearch|null $search
     * @return ODataResource
     */
    public function setSearch(ODataQuerySearch $search = NULL)
    {
        $this->search = $search;
        return $this;
    }

    /**
     * @return ODataQuerySelect
     */
    public function getSelect()
    {
        return $this->select;
    }

    /**
     * @param ODataQuerySelect|null $select
     * @return ODataResource
     */
    public function setSelect(ODataQuerySelect $select = NULL)
    {
        $this->select = $select;
        return $this;
    }

    /**
     * @return ODataExpandableCollectionInterface
     */
    public function getExpand()
    {
        return $this->expand;
    }

    /**
     * @param ODataExpandableCollectionInterface|null $expand
     * @return ODataResource
     */
    public function setExpand(ODataExpandableCollectionInterface $expand = NULL)
    {
        $this->expand = $expand;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isCount()
    {
        return $this->count;
    }

    /**
     * @param boolean $count
     * @return ODataResource
     */
    public function setCount($count)
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrderBy()
    {
        return $this->orderBy;
    }

    /**
     * @param mixed $orderBy
     * @return ODataResource
     */
    public function setOrderBy($orderBy = NULL)
    {
        $this->orderBy = $orderBy;
        return $this;
    }

}