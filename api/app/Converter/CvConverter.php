<?php

namespace CrazyMx\CvEngine\Converter;

use CrazyMx\CvEngine\Model\CV;
use Ramsey\Uuid\Uuid;

class CvConverter
{
    public function __invoke()
    {
        return new CV(Uuid::uuid4());
    }

}