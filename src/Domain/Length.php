<?php

namespace Santore\Fish\Domain;

class Length
{
    private int $inches;

    public static function inches(int $inches): Length
    {
        $length = new static();
        $length->inches = $inches;

        return $length;
    }

    public function getImperial()
    {
        return $this->inches;
    }
}