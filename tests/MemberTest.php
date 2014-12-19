<?php
/**
 * @author Alberto Maturano <alberto@maturano.mx>
 */

namespace Mensa\Clean;

use Mensa\Util\Cleaner;


class MemberTest extends \PHPUnit_Framework_TestCase
{
    public function testNamesMustBeNormalized()
    {
        $values = [
            ['ALBERTO  ', '  maturano ',        'Alberto', 'Maturano'], // Typos comunes
            ['Pablo García', '',                'Pablo', 'García'], // Un nombre y un apellido
            ['luis perez prado', '',            'Luis', 'Perez Prado'], // Un nombre dos apellidos
            ['Cesar Armando Guerra', '',        'Cesar Armando', 'Guerra'], // Dos nombres un apellido
            ['Luis Gerardo Sánchez Cortez', '', 'Luis Gerardo', 'Sánchez Cortez'], // Dos y dos
            ['Juan ', 'García Y Fuente',        'Juan', 'García y Fuente'], // Y copulativa
            ['Rodrigo Dante De Andorra', '',    'Rodrigo', 'Dante de Andorra'], // de
            ['Maria', 'Valle De los Angeles',   'Maria', 'Valle de los Angeles'], // de los
            ['Paul ', 'McCartney',              'Paul', 'McCartney'], // McPato, McDonals, McHammer...
            ['Francisco   Jose', 'Mala-Bares',  'Francisco Jose', 'Mala-Bares'], // Espacios y guiones
            [' Sántos McCarrones  y de-mas ', '', 'Sántos', 'McCarrones y De-Mas'], // Super combo...
        ];

        foreach ($values as $value) {
            $this->assertEquals(
                [$value[2], $value[3]],
                Cleaner::names($value[0], $value[1]),
                'Falla para sujeto: "' . $value[0] . '" / "' . $value[1] . '"'
            );
        }
    }

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
        $males   = ['José', 'Alberto', 'Armando', 'Eli Alejandro'];
        $females = ['Alejandra', 'Marisol', 'Maria'];

        foreach ($males as $input) {
            $this->assertEquals('MASCULINO', Cleaner::gender($input));
        }

        foreach ($females as $input) {
            $this->assertEquals('FEMENINO', Cleaner::gender($input));
        }
    }
}
