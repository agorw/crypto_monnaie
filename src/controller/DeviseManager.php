<?php

namespace app;

use Devise;

class DeviseManager extends Manager
{
    private $devise;

    public function __construct(Devise $devise)
    {
        $this->setDevise($devise);
    }

    /**
     * Get the value of devise
     */
    public function getDevise()
    {
        return $this->devise;
    }

    /**
     * Set the value of devise
     *
     * @return  self
     */
    public function setDevise(Devise $devise)
    {
        $this->devise = $devise;

        return $this;
    }
}
