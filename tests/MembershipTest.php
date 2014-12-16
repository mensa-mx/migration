<?php
/**
 * @author Alberto Maturano <alberto@maturano.mx>
 */

namespace Mensa\Clean;


class MembershipTest extends \PHPUnit_Framework_TestCase
{
    public function testStartMustBeDateTime()
    {
        $start = new \DateTime();

        $member = (new Membership())
            ->setStart($start);

        $this->assertEquals($member->getStart(), $start);
    }

    public function testEndMustBeDateTime()
    {
        $end = new \DateTime();

        $member = (new Membership())
            ->setEnd($end);

        $this->assertEquals($member->getEnd(), $end);
    }

    public function testCreatedMustBeDateTime()
    {
        $birthday = new \DateTime();

        $member = (new Member())
            ->setCreated($birthday);

        $this->assertEquals($member->getCreated(), $birthday);
    }
}

