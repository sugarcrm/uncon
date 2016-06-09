<?php
require_once 'include/Commissioner.php';

class CommissionerBetterTest extends Sugar_PHPUnit_Framework_TestCase
{
    protected $commissioner;

    public function setup()
    {
        $this->commissioner = new Commissioner;
    }

    public function tearDown()
    {
        SugarTestHelper::tearDown();
    }

    public function testMultiply()
    {
        $actual = $this->commissioner->multiply(2, 3);
        $this->assertEquals(6, $actual);

        $actual = $this->commissioner->multiply(3, 4);
        $this->assertEquals(12, $actual);
    }

    public function testAdd()
    {
        $actual = $this->commissioner->add(2, 3);
        $this->assertEquals(5, $actual);

        $actual = $this->commissioner->add(10, 9);
        $this->assertEquals(19, $actual);
    }

    public function testSubtract()
    {
        $actual = $this->commissioner->subtract(12, 8);
        $this->assertEquals(4, $actual);

        $actual = $this->commissioner->subtract(20, 20);
        $this->assertEquals(0, $actual);
    }

    public function testGetOpenerCommission()
    {
        $this->commissioner->setBase(500);
        $actual = $this->commissioner->getOpenerCommission();
        $this->assertEquals(150, $actual);
    }

    public function testGetCloserCommission()
    {
        $this->commissioner->setBase(500);
        $actual = $this->commissioner->getCloserCommission();
        $this->assertEquals(50, $actual);

        $this->commissioner->setBase(1200);
        $actual = $this->commissioner->getCloserCommission();
        // 1200 * .1 = 120
        // 200 * .05 = 10
        $this->assertEquals(130, $actual);
    }

    public function testGetManagerCommission()
    {
        $this->commissioner->setBase(500);
        $actual = $this->commissioner->getManagerCommission();
        // (150 + 50) * .1 = 20
        $this->assertEquals(20, $actual);

        $this->commissioner->setBase(1200);
        $actual = $this->commissioner->getManagerCommission();
        // (360 + 130) * .1 = 49
        $this->assertEquals(49, $actual);
    }

    public function testGetCommission()
    {
        $current_user = SugarTestHelper::setUp('current_user');
        $current_user->salesperson_type = Commissioner::OPENER;

        $this->commissioner->setBase(800);
        $actual = $this->commissioner->getCommission();
        $this->assertEquals(240, $actual);

        $this->commissioner->setBase(1500);
        $actual = $this->commissioner->getCommission();
        $this->assertEquals(450, $actual);

        // Test closer commission
        $current_user->salesperson_type = Commissioner::CLOSER;

        $this->commissioner->setBase(700);
        $actual = $this->commissioner->getCommission();
        $this->assertEquals(70, $actual);

        $this->commissioner->setBase(1500);
        $actual = $this->commissioner->getCommission();
        // 1500 * .1 = 150
        // 500 * .05 = 25
        $this->assertEquals(175, $actual);

        // Test Manager commission
        $current_user->salesperson_type = Commissioner::MANAGER;

        $this->commissioner->setBase(600);
        $actual = $this->commissioner->getCommission();
        // (180 + 60) * .1 = 24
        $this->assertEquals(24, $actual);

        $this->commissioner->setBase(2000);
        $actual = $this->commissioner->getCommission();
        // (600 + 250) * .1 = 85
        $this->assertEquals(85, $actual);
    }
}
