<?php
require_once 'include/Commissioner.php';

class CommissionerTest extends Sugar_PHPUnit_Framework_TestCase
{
    /**
     * The commission object, as a static property since it is set in a static
     * method
     * @var Commissioner
     */
    protected static $commissioner;

    /**
     * Used for testing proper commission for unknown salesperson types
     * @var integer
     */
    protected static $junkType = 27;

    /**
     * Sets up the Commission object once so we don't need to keep getting a fresh
     * instance
     */
    public static function setupBeforeClass()
    {
        self::$commissioner = new Commissioner;
    }

    /**
     * Tears down each test method setup... used to clear out current user
     */
    public function tearDown()
    {
        SugarTestHelper::tearDown();
    }

    /**
     * Tests the multiply method
     * @param integer $x
     * @param integer $y
     * @param integer $expect
     * @dataProvider multiplyProvider
     */
    public function testMultiply($x, $y, $expect)
    {
        $actual = self::$commissioner->multiply($x, $y);
        $this->assertEquals($expect, $actual);
    }

    public function multiplyProvider()
    {
        return array(
            array('x' => 2, 'y' => 3, 'expect' => 6),
            array('x' => 12, 'y' => 4, 'expect' => 48),
            array('x' => 0, 'y' => 1000, 'expect' => 0),
        );
    }

    /**
     * Tests the multiply method
     * @param integer $x
     * @param integer $y
     * @param integer $expect
     * @dataProvider addProvider
     */
    public function testAdd($x, $y, $expect)
    {
        $actual = self::$commissioner->add($x, $y);
        $this->assertEquals($expect, $actual);
    }

    public function addProvider()
    {
        return array(
            array('x' => 9, 'y' => 9, 'expect' => 18),
            array('x' => 300, 'y' => 275, 'expect' => 575),
            array('x' => 0, 'y' => 1000, 'expect' => 1000),
        );
    }

    /**
     * Tests the multiply method
     * @param integer $x
     * @param integer $y
     * @param integer $expect
     * @dataProvider subtractProvider
     */
    public function testSubtract($x, $y, $expect)
    {
        $actual = self::$commissioner->subtract($x, $y);
        $this->assertEquals($expect, $actual);
    }

    public function subtractProvider()
    {
        return array(
            array('x' => 20, 'y' => 8, 'expect' => 12),
            array('x' => 400, 'y' => 250, 'expect' => 150),
            array('x' => 3, 'y' => 3, 'expect' => 0),
        );
    }

    /**
     * Tests proper commission calculation
     * @param integer $type
     * @param integer $base
     * @param integer $expect
     * @dataProvider getCommissionProvider
     */
    public function testGetCommission($type, $base, $expect)
    {
        // We really do not need to save data, so set save as false
        $current_user = SugarTestHelper::setUp('current_user', array('save' => false));
        $current_user->salesperson_type = $type;

        self::$commissioner->setBase($base);
        $actual = self::$commissioner->getCommission();
        $this->assertEquals($expect, $actual);
    }

    public function getCommissionProvider()
    {
        return array(
            // Tests Opener commission... 30% of base
            array('type' => Commissioner::OPENER, 'base' => 500, 'expect' => 150),
            array('type' => Commissioner::OPENER, 'base' => 800, 'expect' => 240),
            // Tests Closer commission... 10% of base + 5% of anything over 1000
            array('type' => Commissioner::CLOSER, 'base' => 500, 'expect' => 50),
            array('type' => Commissioner::CLOSER, 'base' => 700, 'expect' => 70),
            array('type' => Commissioner::CLOSER, 'base' => 1200, 'expect' => 130),
            array('type' => Commissioner::CLOSER, 'base' => 1500, 'expect' => 175),
            // Tests Manager commission... 10% of the Opener and Closer combined
            array('type' => Commissioner::MANAGER, 'base' => 500, 'expect' => 20),
            array('type' => Commissioner::MANAGER, 'base' => 600, 'expect' => 24),
            array('type' => Commissioner::MANAGER, 'base' => 1200, 'expect' => 49),
            array('type' => Commissioner::MANAGER, 'base' => 2000, 'expect' => 85),
            // Tests unknown commission... always 0
            array('type' => self::$junkType, 'base' => 500, 'expect' => 0),
            array('type' => self::$junkType, 'base' => 1500, 'expect' => 0),
        );
    }
}
