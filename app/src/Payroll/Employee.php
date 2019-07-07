<?php

namespace Payroll;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employee
 *
 * @ORM\Table(name="employee", indexes={@ORM\Index(name="IDX_5D9F75A14B89032C", columns={"post_id"})})
 * @ORM\Entity
 */
class Employee extends \App\Contract\Entity
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
     * @var int
     *
     * @ORM\Column(name="idno", type="integer", nullable=false)
     */
    private $idno;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255, nullable=false)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="othernames", type="string", length=255, nullable=false)
     */
    private $othernames;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="text", length=0, nullable=false)
     */
    private $address;

    /**
     * @var string|null
     *
     * @ORM\Column(name="other_address", type="text", length=0, nullable=true)
     */
    private $otherAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="text", length=0, nullable=false)
     */
    private $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="other_phone", type="text", length=0, nullable=true)
     */
    private $otherPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="other_email", type="string", length=255, nullable=true)
     */
    private $otherEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="nssf", type="string", length=255, nullable=false)
     */
    private $nssf;

    /**
     * @var string
     *
     * @ORM\Column(name="nhif", type="string", length=255, nullable=false)
     */
    private $nhif;

    /**
     * @var string
     *
     * @ORM\Column(name="pin", type="string", length=255, nullable=false)
     */
    private $pin;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255, nullable=false)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=false)
     */
    private $city;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="date", nullable=false)
     */
    private $dob;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="date", nullable=false)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="date", nullable=false)
     */
    private $endDate;

    /**
     * @var string
     *
     * @ORM\Column(name="bank", type="text", length=0, nullable=false)
     */
    private $bank;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="active", type="boolean", nullable=true, options={"default"="1"})
     */
    private $active = '1';

    /**
     * @var \Payroll\Post
     *
     * @ORM\ManyToOne(targetEntity="Payroll\Post")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="post_id", referencedColumnName="id")
     * })
     */
    private $post;


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
     * Set idno.
     *
     * @param int $idno
     *
     * @return Employee
     */
    public function setIdno($idno)
    {
        $this->idno = $idno;

        return $this;
    }

    /**
     * Get idno.
     *
     * @return int
     */
    public function getIdno()
    {
        return $this->idno;
    }

    /**
     * Set surname.
     *
     * @param string $surname
     *
     * @return Employee
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname.
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set othernames.
     *
     * @param string $othernames
     *
     * @return Employee
     */
    public function setOthernames($othernames)
    {
        $this->othernames = $othernames;

        return $this;
    }

    /**
     * Get othernames.
     *
     * @return string
     */
    public function getOthernames()
    {
        return $this->othernames;
    }

    /**
     * Set address.
     *
     * @param string $address
     *
     * @return Employee
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set otherAddress.
     *
     * @param string|null $otherAddress
     *
     * @return Employee
     */
    public function setOtherAddress($otherAddress = null)
    {
        $this->otherAddress = $otherAddress;

        return $this;
    }

    /**
     * Get otherAddress.
     *
     * @return string|null
     */
    public function getOtherAddress()
    {
        return $this->otherAddress;
    }

    /**
     * Set phone.
     *
     * @param string $phone
     *
     * @return Employee
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set otherPhone.
     *
     * @param string|null $otherPhone
     *
     * @return Employee
     */
    public function setOtherPhone($otherPhone = null)
    {
        $this->otherPhone = $otherPhone;

        return $this;
    }

    /**
     * Get otherPhone.
     *
     * @return string|null
     */
    public function getOtherPhone()
    {
        return $this->otherPhone;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return Employee
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set otherEmail.
     *
     * @param string|null $otherEmail
     *
     * @return Employee
     */
    public function setOtherEmail($otherEmail = null)
    {
        $this->otherEmail = $otherEmail;

        return $this;
    }

    /**
     * Get otherEmail.
     *
     * @return string|null
     */
    public function getOtherEmail()
    {
        return $this->otherEmail;
    }

    /**
     * Set nssf.
     *
     * @param string $nssf
     *
     * @return Employee
     */
    public function setNssf($nssf)
    {
        $this->nssf = $nssf;

        return $this;
    }

    /**
     * Get nssf.
     *
     * @return string
     */
    public function getNssf()
    {
        return $this->nssf;
    }

    /**
     * Set nhif.
     *
     * @param string $nhif
     *
     * @return Employee
     */
    public function setNhif($nhif)
    {
        $this->nhif = $nhif;

        return $this;
    }

    /**
     * Get nhif.
     *
     * @return string
     */
    public function getNhif()
    {
        return $this->nhif;
    }

    /**
     * Set pin.
     *
     * @param string $pin
     *
     * @return Employee
     */
    public function setPin($pin)
    {
        $this->pin = $pin;

        return $this;
    }

    /**
     * Get pin.
     *
     * @return string
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * Set gender.
     *
     * @param string $gender
     *
     * @return Employee
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender.
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set country.
     *
     * @param string $country
     *
     * @return Employee
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country.
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set city.
     *
     * @param string $city
     *
     * @return Employee
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set dob.
     *
     * @param \DateTime $dob
     *
     * @return Employee
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get dob.
     *
     * @return \DateTime
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set startDate.
     *
     * @param \DateTime $startDate
     *
     * @return Employee
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate.
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate.
     *
     * @param \DateTime $endDate
     *
     * @return Employee
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate.
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set bank.
     *
     * @param string $bank
     *
     * @return Employee
     */
    public function setBank($bank)
    {
        $this->bank = $bank;

        return $this;
    }

    /**
     * Get bank.
     *
     * @return string
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * Set active.
     *
     * @param bool|null $active
     *
     * @return Employee
     */
    public function setActive($active = null)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active.
     *
     * @return bool|null
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set post.
     *
     * @param \Payroll\Post|null $post
     *
     * @return Employee
     */
    public function setPost(\Payroll\Post $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post.
     *
     * @return \Payroll\Post|null
     */
    public function getPost()
    {
        return $this->post;
    }
}
