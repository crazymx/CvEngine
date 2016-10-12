<?php

namespace CrazyMx\CvEngine\Converter;

use Ramsey\Uuid\Uuid;

class UuidGenerator
{
    public function __invoke()
    {
        return Uuid::uuid4();
    }

}