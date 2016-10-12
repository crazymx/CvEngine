<?php

namespace CrazyMx\CvEngine;

use CrazyMx\CvEngine\Model\CV;
use MongoDB\Collection;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class MongoDbCvRepository implements CvRepository
{
    /**
     * @var mixed|Collection
     */
    private $collection;

    /**
     * MongoDbCvRepository constructor.
     * @param mixed $collection
     */
    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    public function store(CV $cv)
    {
        $this->collection->insertOne(['_id' => (string) $cv->uuid()]);
    }

    public function get(UuidInterface $uuid)
    {
        $result = $this->collection->findOne(['_id' => (string) $uuid]);
        if(empty($result)) {
            throw new CvNotFoundException();
        }
        return new CV(Uuid::fromString($result['_id']));
    }
}