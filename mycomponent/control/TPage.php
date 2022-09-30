<?php
namespace Mycomponent\Control;

use Adianti\Registry\TSession;

if (!defined('conexao')) {
    define('conexao', TSession::getValue('conexao'));
}

class TPage extends \Adianti\Control\TPage
{
    protected static $database = conexao;

    // public function __construct()
    // {
    //     parent::__construct('div');
    //     $this->constructed = TRUE;

    //     $this->{'page-name'} = $this->getClassName();
    //     $this->{'page_name'} = $this->getClassName();
    // }

}
