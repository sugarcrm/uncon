<?php

/**
 * Simple sample class for calculating commissions based on a salesperson_type
 * property on a User bean
 */
class Commissioner
{
    /**
     * Class constants that define each salesperson type
     */
    const OPENER = 1;
    const CLOSER = 2;
    const MANAGER = 3;

    /**
     * Salesperson type map, mapped to each constant
     * @var array
     */
    protected $salesPersonTypes = array(
        1 => 'Opener',
        2 => 'Closer',
        3 => 'Manager',
    );

    /**
     * The base on which to calculate the commission
     * @var integer
     */
    protected $base = 0;

    /**
     * Object constructor, simply sets the base
     * @param integer $base
     */
    public function __construct($base = 0)
    {
        $this->setBase($base);
    }

    /**
     * Sets the commission base
     * @param integer $base
     */
    public function setBase($base)
    {
        $this->base = $base;
    }

    /**
     * Gets the commission base
     * @return integer
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * Gets a calculated commission based on the users salesperson type
     * @return integer
     */
    public function getCommission()
    {
        $type = $this->getSalesPersonType();
        return $this->getCommissionByType($type);
    }

    /**
     * Calculates a commission by salesperson type
     * @param string $type
     * @return integer
     */
    public function getCommissionByType($type)
    {
        // Make OPENER into Opener
        $type = ucfirst(strtolower($type));
        $method = 'get' . $type . 'Commission';
        return method_exists($this, $method) ? $this->$method() : 0;
    }

    /**
     * Calculates an openers commission, which is 30% of the base.
     * @return integer
     */
    public function getOpenerCommission()
    {
        return $this->multiply($this->getBase(), .3);
    }

    /**
     * Calculates a Closers commission, which is 10% of base plus 5% of anything
     * over 1000
     * @return integer
     */
    public function getCloserCommission()
    {
        // Default our addend, since we will always need this
        $add = 0;
        $base = $this->getBase();

        // Check if there is anything over 1000 that needs to be handled
        if ($base > 1000) {
            $add = $this->multiply($this->subtract($base, 1000), .05);
        }

        return $this->add($this->multiply($base, .1), $add);
    }

    /**
     * Calculates a Managers commission, which is 10% of whatever the combined
     * commission of an Opener and a Closer is
     * @return integer
     */
    public function getManagerCommission()
    {
        return $this->multiply(
            $this->add($this->getOpenerCommission(), $this->getCloserCommission()),
            .1
        );
    }

    /**
     * Simple addition calculator
     * @param integer $x
     * @param integer $y
     */
    public function add($x, $y)
    {
        return $x + $y;
    }

    /**
     * Simple subtraction calculator
     * @param integer $x
     * @param integer $y
     */
    public function subtract($x, $y)
    {
        return $x - $y;
    }

    /**
     * Simple multiplication calculator
     * @param integer $x
     * @param integer $y
     */
    public function multiply($x, $y)
    {
        return $x * $y;
    }

    /**
     * Gets the current user bean
     * @return User
     */
    protected function getCurrentUser()
    {
        global $current_user;
        return $current_user;
    }

    /**
     * Gets a string representation of a salesperson type
     * @return string
     */
    protected function getSalesPersonType()
    {
        $user = $this->getCurrentUser();
        if (isset($user->salesperson_type) && isset($this->salesPersonTypes[$user->salesperson_type])) {
            return $this->salesPersonTypes[$user->salesperson_type];
        }

        return 'Unknown';
    }
}
