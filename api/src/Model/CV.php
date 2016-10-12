<?php

namespace CrazyMx\CvEngine\Model;

use Ramsey\Uuid\UuidInterface;

class CV implements \JsonSerializable
{
    private $uuid;

    /**
     * CV constructor.
     * @param $uuid
     */
    public function __construct(UuidInterface $uuid)
    {
        $this->uuid = $uuid;
    }

    public function uuid()
    {
        return $this->uuid;
    }

    public function jsonSerialize()
    {
        return [
            'id' => (string) $this->uuid
        ];
    }
}
