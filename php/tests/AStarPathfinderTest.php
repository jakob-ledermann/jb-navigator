<?php
/**
 * Created by PhpStorm.
 * User: Jakob
 * Date: 14.10.2014
 * Time: 21:17
 */

namespace tests {

    use entities\System;
    use Pathfinders\AStarPathfinder;

    class AStarPathfinderTest extends \PHPUnit_Framework_TestCase
    {
        public function testFindsDirectConnectedRoute()
        {
            $start = new System();

            $start->setName("jita");
            $start->setX(0);
            $start->setY(0);
            $start->setZ(0);

            $destination = new System();

            $destination->setName("system2");
            $destination->setX(10);
            $destination->setY(10);
            $destination->setZ(10);

            $repositoryStub = $this->getMock('ISystemRepository');

            $repositoryStub->method('GetNeighbors')
                ->willReturn($destination);

            $target = new AStarPathfinder($repositoryStub);

            $route = $target->SearchRoute($start, $destination);

            $this->assertCount(1, $route);
            $this->assertContains($destination, $route);

        }
    }
}
 