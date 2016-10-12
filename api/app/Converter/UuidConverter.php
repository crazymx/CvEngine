<?php

namespace CrazyMx\CvEngine\Converter;

use Ramsey\Uuid\Uuid;

class UuidConverter
{
    public function __invoke(string $uuid)
    {
        return Uuid::fromString($uuid);
    }
}