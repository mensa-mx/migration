<?php

namespace Mensa\Clean;


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
     * @var \DateTime
     *
     * @Column(name="start", type="date")
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @Column(name="ends", type="date")
     */
    private $end;

    /**
     * @var string
     *
     * @Column(name="delivery", type="string", length=20, nullable=true)
     */
    private $delivery;

    /**
     * @var \DateTime
     *
     * @Column(name="created", type="datetime")
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
     * @param  \DateTime $start
     * @return Membership
     */
    public function setStart(\DateTime $start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start date
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end date
     *
     * @param  \DateTime $end
     * @return Membership
     */
    public function setEnd(\DateTime $end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end date
     *
     * @return \DateTime
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
     * @param  \DateTime created
     * @return Membership
     */
    public function setCreated(\DateTime $created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
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
