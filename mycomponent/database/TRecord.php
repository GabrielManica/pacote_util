<?php
namespace Mycomponent\Database;

class TRecord extends \Adianti\Database\TRecord
{
    public function default_values(){

    }

    public function onAfterLoad($object)
    {
        foreach ($object as $key => $value) {
            $object->$key = trim($value);
        }
    }

    public function onAfterLoadCollection($object)
    {
        foreach ($object as $key => $value) {
            $object->$key = trim($value);
        }
    }
}
