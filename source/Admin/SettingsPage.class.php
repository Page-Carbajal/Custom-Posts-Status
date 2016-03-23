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

        $atts = array( 'cols' => 40, 'rows' => 10, 'placeholder' => __('Use comma separated values', 'custom-status') );

        $this->fields->addTextArea('custom-status-list')
            ->setValue($value)
            ->setAttributes($atts)
            ->addLabel(__('Custom Status List', 'custom-status'));
    }
}