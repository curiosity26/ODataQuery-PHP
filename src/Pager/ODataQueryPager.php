<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 12:08 PM
 */

namespace ODataQuery\Pager;


use ODataQuery\ODataQueryOptionInterface;

class ODataQueryPager implements ODataQueryOptionInterface
{
    protected $top = 500;
    protected $page = 0;

    public function __construct($limit = null, $page = 0)
    {
        $this->setLimit($limit);
        $this->setPage($page);
    }

    /**
     * Use getter or setter
     * Retained for backward compatibility
     * @param null $limit
     * @return $this|int
     * @deprecated
     */
    public function limit($limit = null)
    {
        if (isset($limit)) {
            $this->setLimit($limit);

            return $this;
        }

        return $this->getLimit();
    }

    /**
     * Use getter or setter
     * Retained for backward compatibility
     * @param null $page
     * @return $this|int
     * @deprecated
     */
    public function page($page = null)
    {
        if (isset($page)) {
            $this->setPage($page);

            return $this;
        }

        return $this->getPage();
    }

    public function skip($skip = null, $limit = null)
    {
        if (isset($skip) && $skip >= 0) {
            $this->top = isset($limit) && $limit > 0 ? $limit : $this->top;
            $this->page = floor($skip / $this->top);

            return $this;
        }

        return $this->top * $this->page;
    }


    public function build()
    {
        return array(
            '$top' => $this->getLimit(),
            '$skip' => $this->skip()
        );
    }

    public function __toString()
    {
        $output = array();
        foreach ($this->build() as $param => $value) {
            $output[] = "$param=$value";
        }

        return implode('&', $output);
    }

    /**
     * @return int
     */
    public function getTop()
    {
        return $this->top;
    }

    /**
     * @param int $top
     */
    public function setTop($top)
    {
        $this->top = $top;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param $page
     * @return $this
     */
    public function setPage($page)
    {
        if (isset($page)) {
            if ($page > 0) {
                $this->page = $page;
            }
        }

        return $this;
    }

    /**
     * @param null $limit
     * @return $this
     * @see setTop
     */
    public function setLimit($limit = null)
    {
        if (isset($limit)) {
            if ($limit > 0) {
                $this->setTop($limit);
            }
        }

        return $this;
    }

    /**
     * @return int
     * @see getTop
     */
    public function getLimit()
    {
        return $this->getTop();
    }
}