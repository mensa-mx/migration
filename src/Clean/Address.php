<?php

namespace Mensa\Clean;


/**
 * Address
 *
 * @author: Alberto Maturano <alberto@maturano.mx>
 *
 * @Entity
 * @Table("addresses")
 */
class Address
{
    /**
     * @var integer
     *
     * @Id
     * @Column(name="id", type="integer")
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="seq_address_id")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="address_line_1", type="string", length=255, nullable=true)
     */
    private $addressLine1;

    /**
     * @var string
     *
     * @Column(name="address_line_2", type="string", length=255, nullable=true)
     */
    private $addressLine2;

    /**
     * @var string
     *
     * @Column(name="colony", type="string", length=255, nullable=true)
     */
    private $colony;

    /**
     * @var string
     *
     * @Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @Column(name="state", type="string", length=255, nullable=true)
     */
    private $state;

    /**
     *
     * @var integer
     *
     * @Column(name="postal_code", type="integer", nullable=true)
     */
    private $postalCode;

    /**
     * @var Member
     *
     * @OneToOne(targetEntity="Member", mappedBy="address")
     */
    private $member;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set addressLine1
     *
     * @param  string $addressLine1
     * @return Address
     */
    public function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    /**
     * Get addressLine1
     *
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * Set addressLine2
     *
     * @param  string $addressLine2
     * @return Address
     */
    public function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    /**
     * Get addressLine2
     *
     * @return string
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * Set colony
     *
     * @param  string $colony
     * @return Address
     */
    public function setColony($colony)
    {
        $this->colony = $colony;

        return $this;
    }

    /**
     * Get colony
     *
     * @return string
     */
    public function getColony()
    {
        return $this->colony;
    }

    /**
     * Set city
     *
     * @param  string $city
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param  string $state
     * @return Address
     */
    public function setState( $state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set postalCode
     *
     * @param  integer $postalCode
     * @return Address
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return integer
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set member
     *
     * @param  Member $member
     * @return Address
     */
    public function setMember(Member $member)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * Get member
     *
     * @return Member
     */
    public function getMember()
    {
        return $this->member;
    }
}
