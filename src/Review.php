<?php
/**
 * @file Review.php
 * @project flipkey
 * @author Josh Houghtelin <josh@findsomehelp.com>
 * @created 3/24/15 11:15 AM
 */

namespace FlipKey;


class Review {
    protected $id;
    protected $userName;
    protected $userLocation;
    protected $title;
    protected $date;
    protected $fdate;
    protected $text;
    protected $displayname;
    protected $rating;
    protected $status;
    protected $mgrtext;
    protected $mgrdate;
    protected $advancedUrl;


    public function __construct(\SimpleXMLElement $review = null)
    {
        if(is_null($review)) {
            return;
        }

        return $this->setupObject($review);
    }

    protected function setupObject(\SimpleXMLElement $review)
    {
        $this->setId($review->id);
        $this->setUserName($review->username);
        $this->setuserLocation($review->userLocation);
        $this->setTitle($review->title);
        $this->setDate($review->date);
        $this->setFdate($review->fdate);
        $this->setText($review->text);
        $this->setDisplayName($review->displayname);
        $this->setRating($review->rating);
        $this->setStatus($review->status);
        $this->setMgrText($review->mgrtext);
        $this->setMgrdate($review->mgrdate);
        $this->setAdvancedUrl($review->advancedurl);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = (string) $id;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = (string) $userName;
    }

    /**
     * @return mixed
     */
    public function getUserLocation()
    {
        return $this->userLocation;
    }

    /**
     * @param mixed $userLocation
     */
    public function setUserLocation($userLocation)
    {
        $this->userLocation = (string) $userLocation;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = (string) $title;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = (string) $date;
    }

    /**
     * @return mixed
     */
    public function getFdate()
    {
        return $this->fdate;
    }

    /**
     * @param mixed $fdate
     */
    public function setFdate($fdate)
    {
        $this->fdate = (string) $fdate;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = (string) $text;
    }

    /**
     * @return mixed
     */
    public function getDisplayname()
    {
        return $this->displayname;
    }

    /**
     * @param mixed $displayname
     */
    public function setDisplayname($displayname)
    {
        $this->displayname = (string) $displayname;
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
        $this->rating = (string) $rating;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = (string) $status;
    }

    /**
     * @return mixed
     */
    public function getMgrtext()
    {
        return $this->mgrtext;
    }

    /**
     * @param mixed $mgrtext
     */
    public function setMgrtext($mgrtext)
    {
        $this->mgrtext = (string) $mgrtext;
    }

    /**
     * @return mixed
     */
    public function getMgrdate()
    {
        return $this->mgrdate;
    }

    /**
     * @param mixed $mgrdate
     */
    public function setMgrdate($mgrdate)
    {
        $this->mgrdate = (string) $mgrdate;
    }

    /**
     * @return mixed
     */
    public function getAdvancedUrl()
    {
        return $this->advancedUrl;
    }

    /**
     * @param mixed $advancedUrl
     */
    public function setAdvancedUrl($advancedUrl)
    {
        $this->advancedUrl = (string) $advancedUrl;
    }

    /**
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}