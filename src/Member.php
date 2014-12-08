<?php

namespace Mensa;

use Doctrine\Common\Collections\ArrayCollection;


/**
 * Member
 *
 * @author: Alberto Maturano <alberto@maturano.mx>
 *
 * @Entity
 * @Table("members")
 */
class Member
{
    use Setter;

    /**
     * @var integer
     *
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="seq_member_id")
     */
    protected $id;

    /**
     * @var string
     *
     * @Column(name="firstName", type="string", length=100)
     */
    protected $firstName;

    /**
     * @var string
     *
     * @Column(name="lastName", type="string", length=100, nullable=true)
     */
    protected $lastName;

    /**
     * @var string
     *
     * @Column(name="gender", type="string", length=10)
     */
    protected $gender;

    /**
     * @var string
     *
     * @Column(name="birthdate", type="string", length=20, nullable=true)
     */
    protected $birthdate;

    /**
     * @var string
     *
     * @Column(name="email", type="string", length=255, nullable=true)
     */
    protected $email;

    /**
     *
     * @var string
     *
     * @Column(name="admission_type", type="string", length=50)
     */
    protected $admissionType;

    /**
     * @var Address
     *
     * @OneToOne(targetEntity="Address", inversedBy="member")
     * @JoinColumn(name="address_id", referencedColumnName="id")
     */
    private $address;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @OneToMany(targetEntity="Membership", mappedBy="member")
     */
    private $memberships;

    /**
     * @var string
     *
     * @Column(name="created", type="string", length=20)
     */
    protected $created;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->memberships = new ArrayCollection();
    }

    /**
     * Set id
     *
     * @param  integer $id
     * @return Member
     *
     * @FIXME Durante el proceso de recuperación se están asignando IDs de manera manual.
     *  Eliminar cuando ya no sea así.
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get Id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param  string $firstName
     * @return Member
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param  string $lastName
     * @return Member
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set gender
     *
     * @param  string $gender
     * @return Member
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set birthdate
     *
     * @param  string $birthdate
     * @return Member
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return string
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set email
     *
     * @param  string $email
     * @return Member
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set admissionType
     *
     * @param  string $admissionType
     * @return Member
     */
    public function setAdmissionType($admissionType)
    {
        $this->admissionType = $admissionType;

        return $this;
    }

    /**
     * Get admissionType
     *
     * @return string
     */
    public function getAdmissionType()
    {
        return $this->admissionType;
    }

    /**
     * Set address
     *
     * @param  Address $address
     * @return Member
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Add memberships
     *
     * @param  Membership $membership
     * @return Member
     */
    public function addMembership(Membership $membership)
    {
        $this->memberships[] = $membership;

        return $this;
    }

    /**
     * Remove memberships
     *
     * @param Membership $membership
     */
    public function removeMembership(Membership $membership)
    {
        $this->memberships->removeElement($membership);
    }

    /**
     * Get memberships
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMemberships()
    {
        return $this->memberships;
    }

    /**
     * Set created
     *
     * @param  string $created
     * @return Member
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return string
     */
    public function getCreated()
    {
        return $this->created;
    }
}
