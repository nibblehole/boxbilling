<?php
/**
 * @group Core
 */
class Box_EventsManagerTest extends PHPUnit\Framework\TestCase
{

    public function testEmptyFire()
    {
        $manager = new Box_EventManager();
        $manager->fire(array());
        $this->assertTrue(true);
    }

    public function testFire()
    {
        $db_mock = $this->getMockBuilder('Box_Database')->getMock();
        $db_mock->expects($this->atLeastOnce())
            ->method('getAll')
            ->will($this->returnValue(array()));


        $di = new Box_Di();
        $di['logger'] = new Box_Log();
        $di['db'] = $db_mock;


        $manager = new Box_EventManager();
        $manager->setDi($di);

        $manager->fire(array('event'=>'onBeforeClientSignup'));
    }
}