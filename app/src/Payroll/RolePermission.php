<?php

namespace Payroll;

use Doctrine\ORM\Mapping as ORM;

/**
 * RolePermission
 *
 * @ORM\Table(name="role_permission", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_6F7DF886D60322ACFED90CCA", columns={"role_id", "permission_id"})}, indexes={@ORM\Index(name="IDX_6F7DF886D60322AC", columns={"role_id"}), @ORM\Index(name="IDX_6F7DF886FED90CCA", columns={"permission_id"})})
 * @ORM\Entity
 */
class RolePermission extends \App\Contract\Entity
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
     * @var \Payroll\Role
     *
     * @ORM\ManyToOne(targetEntity="Payroll\Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     * })
     */
    private $role;

    /**
     * @var \Payroll\Permission
     *
     * @ORM\ManyToOne(targetEntity="Payroll\Permission")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="permission_id", referencedColumnName="id")
     * })
     */
    private $permission;


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
     * Set role.
     *
     * @param \Payroll\Role|null $role
     *
     * @return RolePermission
     */
    public function setRole(\Payroll\Role $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role.
     *
     * @return \Payroll\Role|null
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set permission.
     *
     * @param \Payroll\Permission|null $permission
     *
     * @return RolePermission
     */
    public function setPermission(\Payroll\Permission $permission = null)
    {
        $this->permission = $permission;

        return $this;
    }

    /**
     * Get permission.
     *
     * @return \Payroll\Permission|null
     */
    public function getPermission()
    {
        return $this->permission;
    }
}
