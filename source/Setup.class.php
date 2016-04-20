<?php


namespace CustomPostStatus;


use CustomPostStatus\Admin\SettingsPage;


class Setup
{

    public function __construct()
    {
        // Settings Page
        new SettingsPage();
        // Register Filters
        $this->registerFilters();
    }

    public function registerFilters()
    {
        // Scripts and Styles
        add_filter('admin_enqueue_scripts', array( __CLASS__, 'enqueueScriptsAndStyles' ));
        // TextDomain
        add_filter('init', array( $this, 'registerPluginTextDomain' ));
        // Register Custom Status
        add_filter('init', array( $this, 'registerCustomStatus' ));
        return $this;
    }

    public function registerCustomStatus()
    {

        $options = new SettingsPage();
        $customStatusList = $options->getOptionValue('custom-status-list');
        $list = explode(',', $customStatusList);

        foreach($list as $status){
            $sanitizedStatus = sanitize_title($status);
            register_post_status($sanitizedStatus, array(
                'label'                     => _x($status, 'post'),
                'public'                    => null,
                'exclude_from_search'       => true,
                'show_in_admin_all_list'    => true,
                'show_in_admin_status_list' => true,
                '_builtin'                  => null,
                'internal'                  => null,
                'protected'                 => null,
                'private'                   => true,
                'publicly_queryable'        => null,
                'label_count'               => _n_noop("{$status} <span class=\"count\">(%s)</span>", "{$status} <span class=\"count\">(%s)</span>"),
            ));

        }

    }

    public function registerPluginTextDomain()
    {
        if( $path = self::getResourceDirectory('', 'languages') ) {
            load_plugin_textdomain('custom-status', false, $path);
        }
    }

    // Static methods

    public static function enqueueScriptsAndStyles()
    {
        $screen = get_current_screen();
        if( is_admin() && isset( $screen->post_type ) && 'post' == $screen->post_type ) {

            // Load only for Add Post and Edit Post screens
            if( 'post' == $screen->post_type && ( ( isset( $screen->action ) && $screen->action == 'add' ) || ( isset( $screen->base ) && 'post' == $screen->base && empty( $screen->action ) ) ) ) {

                if( $scriptPath = self::getResourceURL('custom-status-script.js', 'javascript') ) {
                    wp_enqueue_script('custom-status-script', $scriptPath, array( 'jquery' ), false, true);
                    wp_localize_script('custom-status-script', 'customPostStatusList', self::getCustomPostStatus());
                }

            }
        }

    }

    private static function getCustomPostStatus()
    {
        global $post, $wp_post_statuses;

        $exceptions = array( 'inherit', 'trash', 'auto-draft' );

        $currentStatus = false;
        if( isset( $post->post_status ) ) {
            $currentStatus = ( 'auto-draft' == $post->post_status ? 'draft' : $post->post_status );
        }

        $list = array();

        foreach( $wp_post_statuses as $value => $status ) {
            if( !in_array($value, $exceptions) ) {
                $list[] = array( 'text'     => $status->label,
                                 'value'    => $value,
                                 'selected' => ( $value == $currentStatus ) );
            }
        }

        return $list;
    }

    public static function getResourceDirectory( $fileName, $subDirectory = 'css' )
    {
        $filePath = trailingslashit(plugin_dir_path(__FILE__)) . "../resources/{$subDirectory}/{$fileName}";
        if( file_exists($filePath) ) {
            return $filePath;
        }
        return false;
    }

    public static function getResourceURL( $fileName, $subDirectory = 'css' )
    {
        if( self::getResourceDirectory($fileName, $subDirectory) !== false ) {
            return trailingslashit(plugin_dir_url(__FILE__)) . "../resources/{$subDirectory}/{$fileName}";
        }

        return false;
    }

}
