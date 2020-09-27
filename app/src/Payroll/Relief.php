<?php

namespace Payroll;

use Doctrine\ORM\Mapping as ORM;

/**
 * Relief
 *
 * @ORM\Table(name="relief")
 * @ORM\Entity
 */
class Relief extends \App\Contract\Entity
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
     * @ORM\Column(name="monthly", type="string", length=255, nullable=false)
     */
    private $monthly;

    /**
     * @var string
     *
     * @ORM\Column(name="annual", type="string", length=255, nullable=false)
     */
    private $annual;

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
     * @return Relief
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
     * Set monthly.
     *
     * @param string $monthly
     *
     * @return Relief
     */
    public function setMonthly($monthly)
    {
        $this->monthly = $monthly;

        return $this;
    }

    /**
     * Get monthly.
     *
     * @return string
     */
    public function getMonthly()
    {
        return $this->monthly;
    }

    /**
     * Set annual.
     *
     * @param string $annual
     *
     * @return Relief
     */
    public function setAnnual($annual)
    {
        $this->annual = $annual;

        return $this;
    }

    /**
     * Get annual.
     *
     * @return string
     */
    public function getAnnual()
    {
        return $this->annual;
    }

    /**
     * Set active.
     *
     * @param bool $active
     *
     * @return Relief
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
