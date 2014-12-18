<?php
/**
 * @author Alberto Maturano <alberto@maturano.mx>
 */

namespace Mensa\Util;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Email;


class Cleaner
{
    /**
     * Corrige codificación y espacios en un texto
     *
     * @param  string $input
     * @return string|null
     */
    public function text($input)
    {
        $equivs = [
            'Ã¡'    => 'á',
            'Ã©'    => 'é',
            'ÃƒÂ©'  => 'é',
            'Ã'     => 'í',
            'Ã³'    => 'ó',
            'Ãº'    => 'ú',
            'ÃƒÂº'  => 'ú',
            'Ã±'    => 'ñ',
            'Ã' => 'A',
        ];

        $text = trim(strtr($input, $equivs));

        return ($text) ?: null;
    }

    /**
     * Convierte una fecha en texto a su tipo de dato \DateTime
     *
     * @param  string $input
     * @return \DateTime
     */
    static public function date($input)
    {
        if (empty(trim($input))) {
            return null;
        }

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

            '/(\d{1,2}) ?(de )?(\d{2}) ?(de )?(\d{4})/i' => '\5-\3-\1',
            '/(\d{2})\/?(\d{2})\/?(\d{4})/i' => '\3-\1-\2',
        ];

        // Convierte cualquier entrada al formato yyyy-mm-dd
        $date = preg_replace(
            array_keys($replacements),
            array_values($replacements),
            $input
        );

        return new \DateTime($date);
    }

    static public function deliver($input)
    {
        return explode(' ', $input)[0];
    }

    /**
     * Valida correo electrónico
     *
     * @param  string $input
     * @return string|null La cadena original o null si no es válido
     */
    static public function email($input)
    {
        $validator = Validation::createValidator();
        $violations = $validator->validate($input, new Email([ 'checkMX' => true ]));

        return ($violations->count() === 0) ? $input : null;
    }

    /**
     * Identifica el sexo a partir de un nombre
     *
     * @param  string $input Nombre de la persona
     * @return string        MASCULINO|FEMENINO
     */
    static public function gender($input)
    {
        $names = explode(' ', $input);
        $name  = (strlen($names[0]) < 4 && isset($names[1]))
               ? $names[1]
               : $names[0];

        $name   = strtr($name, 'áéíóú', 'aeiou'); // Funciona mejor sin acentos
        $gender = trim(shell_exec('python scripts/gender_detector.py ' . ucfirst($name)));

        switch ($gender) {
            case 'MALE':
            case 'MOSTLY_MALE':
            case 'ANDY': // Desconocido
                $gender = 'MASCULINO';
                break;

            case 'FEMALE':
            case 'MOSTLY_FEMALE':
                $gender = 'FEMENINO';
                break;
        }

        return $gender;
    }
}
