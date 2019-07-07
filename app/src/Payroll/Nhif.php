<?php

namespace Payroll;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nhif
 *
 * @ORM\Table(name="nhif")
 * @ORM\Entity
 */
class Nhif extends \App\Contract\Entity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="lbound", type="string", length=255, nullable=false)
     */
    private $lbound;

    /**
     * @var string
     *
     * @ORM\Column(name="ubound", type="string", length=255, nullable=false)
     */
    private $ubound;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="string", length=255, nullable=false)
     */
    private $amount;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set lbound.
     *
     * @param string $lbound
     *
     * @return Nhif
     */
    public function setLbound($lbound)
    {
        $this->lbound = $lbound;

        return $this;
    }

    /**
     * Get lbound.
     *
     * @return string
     */
    public function getLbound()
    {
        return $this->lbound;
    }

    /**
     * Set ubound.
     *
     * @param string $ubound
     *
     * @return Nhif
     */
    public function setUbound($ubound)
    {
        $this->ubound = $ubound;

        return $this;
    }

    /**
     * Get ubound.
     *
     * @return string
     */
    public function getUbound()
    {
        return $this->ubound;
    }

    /**
     * Set amount.
     *
     * @param string $amount
     *
     * @return Nhif
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount.
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }
}
