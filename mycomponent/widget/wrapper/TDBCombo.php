<?php
namespace Mycomponent\Widget\Wrapper;

class TDBCombo extends \Adianti\Widget\Wrapper\TDBCombo
{
    public function __construct($name, $database, $model, $key, $value, $ordercolumn = NULL, TCriteria $criteria = NULL)
    {
        // executes the parent class constructor
        parent::__construct($name, $database, $model, $key, $value, $ordercolumn, $criteria);

        // load items
        parent::addItems( array_map("utf8_encode", self::getItemsFromModel($database, $model, $key, $value, $ordercolumn, $criteria) ));
    }
}
