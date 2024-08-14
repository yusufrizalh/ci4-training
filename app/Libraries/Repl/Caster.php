<?php

namespace App\Libraries\Repl;

class Caster
{
    public static function castEntity($entity)
    {
        return $entity->toArray();
    }
}
