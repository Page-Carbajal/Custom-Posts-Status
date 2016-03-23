<?php


namespace CustomPostStatus\Admin;


use WPExpress\Admin\BaseSettingsPage;


class SettingsPage extends BaseSettingsPage
{
    public function __construct()
    {
        parent::__construct(__('Custom Status Settings', 'custom-status'));

        $this->myOptions();
    }

    private function myOptions()
    {
        $value = $this->getOptionValue('custom-status-list');

        $this->fields->addTextArea('custom-status-list')
            ->setValue($value)
            ->addLabel(__('Custom Status List', 'custom-status'));
    }
}