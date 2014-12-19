<?php
/**
 * @author Alberto Maturano <alberto@maturano.mx>
 */

namespace Mensa\Migration;
use Mensa\Util\Cleaner;


/**
 * Pruebas con datos reales
 */
class CleanerTest extends \PHPUnit_Framework_TestCase
{
    public function testRegularTextInput()
    {
        $data = [
            '15 de marzo de 2015'       => '2015-03-15',
            '6 de abril de 2019'        => '2019-04-06',
            '31 de diciembre de 2014'   => '2014-12-31',
            '4 de enero de 2015'        => '2015-01-04',
            '19 de octubre de 2015'     => '2015-10-19',
        ];

        foreach ($data as $input => $output) {
            $this->assertEquals($output, Cleaner::date($input)->format('Y-m-d'));
        }
    }

    public function testUnusualTextInput()
    {
        $dates = [
            '18FEB2021'         => '2021-02-18',
            '16 de ENEro 2024'  => '2024-01-16',
        ];
        $deliveries = [
            'Enviada / Cambió de domicilio' => 'Enviada',
        ];

        foreach ($dates as $input => $output) {
            $this->assertEquals($output, Cleaner::date($input)->format('Y-m-d'));
        }

        foreach ($deliveries as $input => $output) {
            $this->assertEquals($output, Cleaner::deliver($input));
        }

    }

    public function testRegularNumberInput()
    {
        $data = [
            '10/16/2024'    => '2024-10-16',
            '12/6/2007'     => '2007-12-06',
            '12/13/2009'    => '2009-12-13',
        ];

        foreach ($data as $input => $output) {
            $this->assertEquals($output, Cleaner::date($input)->format('Y-m-d'));
        }
    }

    public function testEmtpyMustBeNull()
    {
        $data = ['', ' ', false, null];

        foreach ($data as $input) {
            $this->assertNull(Cleaner::date($input));
            $this->assertNull(Cleaner::text($input));
            $this->assertNull(Cleaner::state($input));
        }
    }

    public function testConvertInvalidEmailToNull()
    {
        // Casos reales :)
        $invalidEmails = [
            'sincorreo@gmail.com',
            'kjdskasdf@kasdfj.dss',
            'a@b.com',
            'safsasdf@fasdfsl.com',
            'lwkejrowerj@fjsodifjl.com',
            'no@quieresermiemb.ro',
            'noquieresercontactada@conspamm.com',
            'noquieresercontactado@telojuro.com',
        ];

        $validEmails = [
            'alberto@maturano.mx',
            'some.user@gmail.com',
        ];

        foreach ($invalidEmails as $input) {
            $this->assertNull(Cleaner::email($input));
        }

        foreach ($validEmails as $input) {
            $this->assertEquals($input, Cleaner::email($input));
        }
    }
}
