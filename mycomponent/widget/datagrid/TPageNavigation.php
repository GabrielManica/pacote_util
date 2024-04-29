<?php
namespace Mycomponent\Widget\Datagrid;

use Adianti\Registry\TSession;
class TPageNavigation extends \Adianti\Widget\Datagrid\TPageNavigation
{
    /**
     * Keep the last user pagination in session
     * @param $listName the name of the page list to be used as a session key
     */
    public function keepLastPagination($listName = '')
    {
        if($this->action)
        {
            $this->action->setParameter('keep_pagination', '1');
        }

        if(!empty($_REQUEST['keep_pagination']))
        {
            TSession::setValue($listName.'_pagination_properties', $_REQUEST);
        }
        else
        {
            $pagination_properties = TSession::getValue($listName.'_pagination_properties');
            if($pagination_properties)
            {
                if( !isset($_REQUEST['offset']))
                {
                    $_REQUEST['offset'] = $pagination_properties['offset'];
                }
                elseif($_REQUEST['offset'] == 0 && empty($_REQUEST['page']))
                {
                    $_REQUEST['page'] = 1;
                }

                if(!empty($_REQUEST['order']) && !empty($_REQUEST['direction']) && empty($_REQUEST['page']))
                {
                    $_REQUEST['page'] = 1;
                    $_REQUEST['offset'] = 0;
                }

                if(empty($_REQUEST['limit']))
                {
                    $_REQUEST['limit'] = $pagination_properties['limit'];
                }
                if(empty($_REQUEST['page']))
                {
                    $_REQUEST['page'] = $pagination_properties['page'];
                }
                if(empty($_REQUEST['first_page']))
                {
                    $_REQUEST['first_page'] = $pagination_properties['first_page'];
                }
                if(empty($_REQUEST['order']))
                {
                    $_REQUEST['order'] = $pagination_properties['order'] ?? null;
                }
                if(empty($_REQUEST['direction']))
                {
                    $_REQUEST['direction'] = $pagination_properties['direction'];
                }
            }
        }
    }
}