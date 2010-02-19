<?php
defined('IN_EZRPG') or exit;

class Admin_Index extends Base_Module
{
    public function start()
    {
        $this->tpl->display('admin/index.tpl');
    }
}
?>