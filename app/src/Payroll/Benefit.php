<?php

namespace Payroll;

use Doctrine\ORM\Mapping as ORM;

/**
 * Benefit
 *
 * @ORM\Table(name="benefit")
 * @ORM\Entity
 */
class Benefit extends \App\Contract\Entity
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="descr", type="string", length=255, nullable=false)
     */
    private $descr;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="string", length=255, nullable=false)
     */
    private $amount;

    /**
     * @var bool
     *
     * @ORM\Column(name="perc", type="boolean", nullable=false)
     */
    private $perc;

    /**
     * @var bool
     *
     * @ORM\Column(name="deduct", type="boolean", nullable=false)
     */
    private $deduct;

    /**
     * @var bool
     *
     * @ORM\Column(name="taxable", type="boolean", nullable=false)
     */
    private $taxable;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false, options={"default"="1"})
     */
    private $active = true;


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
     * Set name.
     *
     * @param string $name
     *
     * @return Benefit
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set descr.
     *
     * @param string $descr
     *
     * @return Benefit
     */
    public function setDescr($descr)
    {
        $this->descr = $descr;

        return $this;
    }

    /**
     * Get descr.
     *
     * @return string
     */
    public function getDescr()
    {
        return $this->descr;
    }

    /**
     * Set amount.
     *
     * @param string $amount
     *
     * @return Benefit
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

    /**
     * Set perc.
     *
     * @param bool $perc
     *
     * @return Benefit
     */
    public function setPerc($perc)
    {
        $this->perc = $perc;

        return $this;
    }

    /**
     * Get perc.
     *
     * @return bool
     */
    public function getPerc()
    {
        return $this->perc;
    }

    /**
     * Set deduct.
     *
     * @param bool $deduct
     *
     * @return Benefit
     */
    public function setDeduct($deduct)
    {
        $this->deduct = $deduct;

        return $this;
    }

    /**
     * Get deduct.
     *
     * @return bool
     */
    public function getDeduct()
    {
        return $this->deduct;
    }

    /**
     * Set taxable.
     *
     * @param bool $taxable
     *
     * @return Benefit
     */
    public function setTaxable($taxable)
    {
        $this->taxable = $taxable;

        return $this;
    }

    /**
     * Get taxable.
     *
     * @return bool
     */
    public function getTaxable()
    {
        return $this->taxable;
    }

    /**
     * Set active.
     *
     * @param bool $active
     *
     * @return Benefit
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active.
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }
}
