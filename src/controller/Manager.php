<?php

namespace app;

use \PDO;

class Manager
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->setPdo($pdo);
    }

    /**
     * Get the value of pdo
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * Set the value of pdo
     *
     * @return  self
     */
    public function setPdo(PDO $pdo)
    {
        $this->pdo = $pdo;

        return $this;
    }
}
