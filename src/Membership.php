<?php

namespace Mensa;


/**
 * Membership
 *
 * @author Alberto Maturano <alberto@maturano.mx>
 *
 * @Entity
 * @Table("memberships")
 */
class Membership
{
    /**
     * @var integer
     *
     * @id
     * @Column(type="integer")
     * @GeneratedValue(strategy="SEQUENCE")
     * @SequenceGenerator(sequenceName="seq_membership_id")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="start", type="string", length=20)
     */
    private $start;

    /**
     * @var string
     *
     * @Column(name="ends", type="string", length=20)
     */
    private $end;

    /**
     * @var string
     *
     * @Column(name="delivery", type="string", length=20, nullable=true)
     */
    private $delivery;

    /**
     * @var string
     *
     * @Column(name="created", type="string", length=20)
     */
    private $created;

    /**
     * @var Member
     *
     * @ManyToOne(targetEntity="Member", inversedBy="memberships")
     * @JoinColumn(name="member_id", referencedColumnName="id")
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
     * Set start date
     *
     * @param  string $start
     * @return Membership
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start date
     *
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end date
     *
     * @param  string $end
     * @return Membership
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end date
     *
     * @return string
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set delivery
     *
     * @param  string $delivery
     * @return Membership
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;

        return $this;
    }

    /**
     * Get delivery
     *
     * @return string
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * Set created
     *
     * @param  string created
     * @return Membership
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

    /**
     * Set Member
     *
     * @param  Member $member
     * @return Membership
     */
    public function setMember(Member $member)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * Get Member
     *
     * @return Member
     */
    public function getMember()
    {
        return $this->member;
    }
}
