<?php

namespace CrazyMx\CvEngine;

use CrazyMx\CvEngine\Model\CV;
use Ramsey\Uuid\UuidInterface;

class InMemoryCvRepository
{
    private $store = [];

    public function store(CV $cv)
    {
        $this->store[(string) $cv->uuid()] = $cv;
    }

    public function get(UuidInterface $uuid)
    {
        if (!array_key_exists((string) $uuid, $this->store)) {
            throw new CvNotFoundException();
        }
        return $this->store[(string) $uuid];
    }
}