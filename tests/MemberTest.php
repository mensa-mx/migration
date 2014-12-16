<?php
/**
 * @author Alberto Maturano <alberto@maturano.mx>
 */

namespace Mensa\Clean;


class MemberTest extends \PHPUnit_Framework_TestCase
{
    public function testBirthdayMustBeDateTime()
    {
        $birthday = new \DateTime();

        $member = (new Member())
            ->setBirthdate($birthday);

        $this->assertEquals($member->getBirthdate(), $birthday);
    }

    public function testCreatedMustBeDateTime()
    {
        $created = new \DateTime();

        $member = (new Member())
            ->setCreated($created);

        $this->assertEquals($member->getCreated(), $created);
    }
}
