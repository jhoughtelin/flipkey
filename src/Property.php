<?php
/**
 * @file Property.php
 * @project flipkey
 * @author Josh Houghtelin <josh@findsomehelp.com>
 * @created 3/24/15 11:33 AM
 */

namespace FlipKey;


class Property {
    protected $propName;
    protected $propStatus;
    protected $reviews = [];
    protected $reviewCount;
    protected $rating;
    protected $page;
    protected $searchSize;
    protected $totalPages;

    public function __construct(\SimpleXMLElement $property = null)
    {
        if(is_null($property)) {
            return;
        }

        return $this->setupObject($property);
    }

    private function setupObject($property)
    {
        $this->setPropName($property->propname);
        $this->setPropStatus($property->propstatus);
        $this->createReviewObjects($property->reviews->review);
        $this->setReviewCount($property->stats->reviewcount);
        $this->setRating($property->stats->rating);
        $this->setPage($property->stats->page);
        $this->setSearchSize($property->stats->searchsize);
        $this->setTotalPages($property->stats->totalpages);

        return $this;
    }

    private function createReviewObjects($reviews)
    {
        foreach($reviews as $a_review) {
            $reviewObj = new Review($a_review);
            $this->reviews[] = $reviewObj;
        }

        return $this->reviews;
    }

    /**
     * @return mixed
     */
    public function getPropName()
    {
        return $this->propName;
    }

    /**
     * @param mixed $propName
     */
    public function setPropName($propName)
    {
        $this->propName = (string) $propName;
    }

    /**
     * @return mixed
     */
    public function getPropStatus()
    {
        return $this->propStatus;
    }

    /**
     * @param mixed $propStatus
     */
    public function setPropStatus($propStatus)
    {
        $this->propStatus = (string) $propStatus;
    }

    /**
     * @return mixed
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * @return mixed
     */
    public function getReviewCount()
    {
        return $this->reviewCount;
    }

    /**
     * @param mixed $reviewCount
     */
    public function setReviewCount($reviewCount)
    {
        $this->reviewCount = (int) $reviewCount;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = (float) $rating;
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page)
    {
        $this->page = (int) $page;
    }

    /**
     * @return mixed
     */
    public function getSearchSize()
    {
        return $this->searchSize;
    }

    /**
     * @param mixed $searchSize
     */
    public function setSearchSize($searchSize)
    {
        $this->searchSize = (int) $searchSize;
    }

    /**
     * @return mixed
     */
    public function getTotalPages()
    {
        return $this->totalPages;
    }

    /**
     * @param mixed $totalPages
     */
    public function setTotalPages($totalPages)
    {
        $this->totalPages = (int) $totalPages;
    }


}