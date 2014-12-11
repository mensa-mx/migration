<?php

namespace Mensa;

trait Setter
{
    public function setFromArray(array $params)
    {
        foreach ($params as $property => $value) {
            $method = 'set' . ucfirst($property);

            if (method_exists($this, $method) && ! empty($value)) {
                $this->{$method}($value);
            }
        }

        return $this;
    }
}
