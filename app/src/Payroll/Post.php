<?php

namespace Payroll;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post", indexes={@ORM\Index(name="IDX_5A8A6C8DAE80F5DF", columns={"department_id"})})
 * @ORM\Entity
 */
class Post extends \App\Contract\Entity
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
     * @var string|null
     *
     * @ORM\Column(name="descr", type="string", length=255, nullable=true)
     */
    private $descr;

    /**
     * @var \Payroll\Department
     *
     * @ORM\ManyToOne(targetEntity="Payroll\Department")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     * })
     */
    private $department;


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
     * @return Post
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
     * @param string|null $descr
     *
     * @return Post
     */
    public function setDescr($descr = null)
    {
        $this->descr = $descr;

        return $this;
    }

    /**
     * Get descr.
     *
     * @return string|null
     */
    public function getDescr()
    {
        return $this->descr;
    }

    /**
     * Set department.
     *
     * @param \Payroll\Department|null $department
     *
     * @return Post
     */
    public function setDepartment(\Payroll\Department $department = null)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department.
     *
     * @return \Payroll\Department|null
     */
    public function getDepartment()
    {
        return $this->department;
    }
}
