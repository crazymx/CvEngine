<?php

namespace CrazyMx\Test\CvEngine;

use CrazyMx\CvEngine\CvNotFoundException;
use CrazyMx\CvEngine\InMemoryCvRepository;
use CrazyMx\CvEngine\Model\CV;
use Ramsey\Uuid\Uuid;

class InMemoryCvRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var InMemoryCvRepository
     */
    private $SUT;

    protected function setUp()
    {
        $this->SUT = new InMemoryCvRepository();
    }

    /**
     * @test
     */
    public function it_stores_cvs()
    {
        $uuid = Uuid::uuid4();
        $cv = new CV($uuid);

        $this->SUT->store($cv);

        $this->assertEquals($cv, $this->SUT->get($uuid));
    }

    /**
     * @test
     */
    public function it_throws_an_exception_when_uuid_isnt_known()
    {
        $this->expectException(CvNotFoundException::class);
        $this->SUT->get(Uuid::uuid4());
    }
}