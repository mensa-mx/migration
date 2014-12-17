<?php
/**
 * @author Alberto Maturano <alberto@maturano.mx>
 */

namespace Mensa\Clean;

use Mensa\Util\Cleaner;


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

    public function testDetectGender()
    {
        $males   = ['José', 'Alberto', 'Armando'];
        $females = ['Alejandra', 'Marisol', 'Maria'];

        foreach ($males as $input) {
            $this->assertEquals('MASCULINO', Cleaner::gender($input));
        }

        foreach ($females as $input) {
            $this->assertEquals('FEMENINO', Cleaner::gender($input));
        }
    }
}
