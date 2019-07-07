<?php

namespace Payroll;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paye
 *
 * @ORM\Table(name="paye")
 * @ORM\Entity
 */
class Paye extends \App\Contract\Entity
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
     * @ORM\Column(name="mlbound", type="string", length=255, nullable=false)
     */
    private $mlbound;

    /**
     * @var string
     *
     * @ORM\Column(name="mubound", type="string", length=255, nullable=false)
     */
    private $mubound;

    /**
     * @var string
     *
     * @ORM\Column(name="albound", type="string", length=255, nullable=false)
     */
    private $albound;

    /**
     * @var string
     *
     * @ORM\Column(name="aubound", type="string", length=255, nullable=false)
     */
    private $aubound;

    /**
     * @var string
     *
     * @ORM\Column(name="rate", type="string", length=255, nullable=false)
     */
    private $rate;


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
     * Set mlbound.
     *
     * @param string $mlbound
     *
     * @return Paye
     */
    public function setMlbound($mlbound)
    {
        $this->mlbound = $mlbound;

        return $this;
    }

    /**
     * Get mlbound.
     *
     * @return string
     */
    public function getMlbound()
    {
        return $this->mlbound;
    }

    /**
     * Set mubound.
     *
     * @param string $mubound
     *
     * @return Paye
     */
    public function setMubound($mubound)
    {
        $this->mubound = $mubound;

        return $this;
    }

    /**
     * Get mubound.
     *
     * @return string
     */
    public function getMubound()
    {
        return $this->mubound;
    }

    /**
     * Set albound.
     *
     * @param string $albound
     *
     * @return Paye
     */
    public function setAlbound($albound)
    {
        $this->albound = $albound;

        return $this;
    }

    /**
     * Get albound.
     *
     * @return string
     */
    public function getAlbound()
    {
        return $this->albound;
    }

    /**
     * Set aubound.
     *
     * @param string $aubound
     *
     * @return Paye
     */
    public function setAubound($aubound)
    {
        $this->aubound = $aubound;

        return $this;
    }

    /**
     * Get aubound.
     *
     * @return string
     */
    public function getAubound()
    {
        return $this->aubound;
    }

    /**
     * Set rate.
     *
     * @param string $rate
     *
     * @return Paye
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate.
     *
     * @return string
     */
    public function getRate()
    {
        return $this->rate;
    }
}
