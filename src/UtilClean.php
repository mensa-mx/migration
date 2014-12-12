<?php
/**
 * @author Alberto Maturano <alberto@maturano.mx>
 */

namespace Mensa;


class UtilClean
{
    /**
     * Convierte una fecha en texto a su tipo de dato \DateTime
     *
     * @param  string $input
     * @return \DateTime
     */
    static public function date($input)
    {
        $replacements = [
            '/ene(ro)?/i'       => '01',
            '/feb(rero)?/i'     => '02',
            '/mar(zo)?/i'       => '03',
            '/abr(il)?/i'       => '04',
            '/may(o)?/i'        => '05',
            '/jun(io)?/i'       => '06',
            '/jul(io)?/i'       => '07',
            '/ago(sto)?/i'      => '08',
            '/sep(tiembre)?/i'  => '09',
            '/oct(ubre)?/i'     => '10',
            '/nov(iembre)?/i'   => '11',
            '/dic(iembre)?/i'   => '12',

            '/(\d{1,2}) (de )?(\d{2}) (de )?(\d{4})/i'  => '\5-\3-\1',
            '/(\d{2})\/?(\d{2})\/?(\d{4})/i'            => '\3-\2-\1',
        ];

        // Convierte cualquier entrada al formato yyyy-mm-dd
        $date = preg_replace(
            array_keys($replacements),
            array_values($replacements),
            $input
        );

        return new \DateTime($date);
    }
}
