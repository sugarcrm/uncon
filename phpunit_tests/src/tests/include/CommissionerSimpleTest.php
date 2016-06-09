<?php
require_once 'include/Commissioner.php';

class CommissionerSimpleTest extends Sugar_PHPUnit_Framework_TestCase
{
    public function testMultiply()
    {
        $commissioner = new Commissioner;
        $actual = $commissioner->multiply(2, 3);
        $this->assertEquals(6, $actual);

        $actual = $commissioner->multiply(3, 4);
        $this->assertEquals(12, $actual);
    }

    public function testAdd()
    {
        $commissioner = new Commissioner;
        $actual = $commissioner->add(2, 3);
        $this->assertEquals(5, $actual);

        $actual = $commissioner->add(10, 9);
        $this->assertEquals(19, $actual);
    }

    public function testSubtract()
    {
        $commissioner = new Commissioner;
        $actual = $commissioner->subtract(12, 8);
        $this->assertEquals(4, $actual);

        $actual = $commissioner->subtract(20, 20);
        $this->assertEquals(0, $actual);
    }

    public function testGetOpenerCommission()
    {
        $commissioner = new Commissioner(500);
        $actual = $commissioner->getOpenerCommission();
        $this->assertEquals(150, $actual);
    }

    public function testGetCloserCommission()
    {
        $commissioner = new Commissioner(500);
        $actual = $commissioner->getCloserCommission();
        $this->assertEquals(50, $actual);

        $commissioner->setBase(1200);
        $actual = $commissioner->getCloserCommission();
        // 1200 * .1 = 120
        // 200 * .05 = 10
        $this->assertEquals(130, $actual);
    }

    public function testGetManagerCommission()
    {
        $commissioner = new Commissioner(500);
        $actual = $commissioner->getManagerCommission();
        // (150 + 50) * .1 = 20
        $this->assertEquals(20, $actual);

        $commissioner->setBase(1200);
        $actual = $commissioner->getManagerCommission();
        // (360 + 130) * .1 = 49
        $this->assertEquals(49, $actual);
    }
}
