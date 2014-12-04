<?php
/**
 * @author Alberto Maturano <alberto@maturano.mx>
 */


/**
 * Membership
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $start
     * @return Membership
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param  string $end
     * @return Membership
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
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
     * @param  Member $member
     * @return Membership
     */
    public function setMember(Member $member)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * @return Member
     */
    public function getMember()
    {
        return $this->member;
    }
}
