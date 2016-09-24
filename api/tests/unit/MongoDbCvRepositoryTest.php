<?php

namespace CrazyMx\Test\CvEngine;

use CrazyMx\CvEngine\CvRepository;
use CrazyMx\CvEngine\Model\CV;
use CrazyMx\CvEngine\MongoDbCvRepository;
use MongoDB\Collection;
use Phake;
use Ramsey\Uuid\Uuid;

class MongoDbCvRepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $collection;

    /**
     * @var CvRepository
     */
    private $SUT;

    protected function setUp()
    {
        $this->collection = Phake::mock(Collection::class);
        $this->SUT = new MongoDbCvRepository($this->collection);
    }

    /**
     * @test
     */
    public function it_stores_cv()
    {
        $uuid = Uuid::uuid4();
        $cv = new CV($uuid);

        $this->SUT->store($cv);

        Phake::verify($this->collection)->insertOne(['_id' => (string) $uuid]);
    }

    /**
     * @test
     */
    public function it_retrieves_an_existing_cv()
    {
        $uuid = Uuid::uuid4();

        Phake::when($this->collection)->findOne(['_id' => (string) $uuid])
            ->thenReturn(['_id' => (string) $uuid]);

        $this->assertEquals(new CV($uuid), $this->SUT->get($uuid));
    }
}