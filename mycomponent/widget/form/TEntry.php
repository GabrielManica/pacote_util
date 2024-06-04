<?php

class TEntry extends \Adianti\Widget\Form\TEntry
{
    function setEnterAction(TAction $action)
    {
        if ($action->isStatic())
        {
            $string_action = $action->serialize(FALSE);
            $this->setProperty('onfocus', "__adianti_post_lookup('{$this->formName}', '{$string_action}', '{$this->id}', 'callback')");
        }
        else
        {
            $string_action = $action->toString();
            throw new Exception(AdiantiCoreTranslator::translate('Action (^1) must be static to be used in ^2', $string_action, __METHOD__));
        }
    }
}