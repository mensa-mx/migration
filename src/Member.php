<?php
/**
 * @author: Alberto Maturano <alberto@maturano.mx>
 */

use Doctrine\Common\Collections\ArrayCollection;


/**
 * Member
 *
 * @Entity
 * @Table("members")
 */
class Member
{
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
     * @var Membership
     *
     * @ORM\OneToMany(targetEntity="Membership", mappedBy="member")
     */
    private $memberships;


    public function __construct()
    {
        $this->memberships = new ArrayCollection();
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * @return string
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $admissionType
     */
    public function setAdmissionType($admissionType)
    {
        $this->admissionType = $admissionType;

        return $this;
    }

    /**
     * @return string
     */
    public function getAdmissionType()
    {
        return $this->admissionType;
    }

    /**
     * @param  Membership $memberships
     * @return Member
     */
    public function addMembership(Membership $membership)
    {
        $this->memberships[] = $membership;

        return $this;
    }

    /**
     * @param Membership $membership
     */
    public function removeMembership(Membership $membership)
    {
        $this->memberships->removeElement($membership);
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMemberships()
    {
        return $this->memberships;
    }
}
