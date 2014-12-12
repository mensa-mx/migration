<?php
/**
 * @author Alberto Maturano <alberto@maturano.mx>
 */

namespace Mensa;


/**
 * Pruebas con datos reales
 */
class UtilCleanTest extends \PHPUnit_Framework_TestCase
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
            $this->assertEquals($output, UtilClean::date($input)->format('Y-m-d'));
        }
    }

    public function testUnusualTextInput()
    {
        $data = [
            '18FEB2021'         => '2021-02-18',
            '16 de ENEro 2024'  => '2024-01-16',
        ];

        foreach ($data as $input => $output) {
            $this->assertEquals($output, UtilClean::date($input)->format('Y-m-d'));
        }
    }

    public function testRegularNumberInput()
    {
        $data = [
            '16/10/2024'    => '2024-10-16',
        ];

        foreach ($data as $input => $output) {
            $this->assertEquals($output, UtilClean::date($input)->format('Y-m-d'));
        }
    }
}
