<?php

namespace CrazyMx\CvEngine;

use CrazyMx\CvEngine\Model\CV;
use Ramsey\Uuid\UuidInterface;

interface CvRepository
{
    public function store(CV $cv);

    public function get(UuidInterface $uuid);
}