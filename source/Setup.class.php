<?php


namespace CustomPostStatus;


class Setup
{

    public function __construct()
    {
        $this->registerStylesAndScripts()->registerTextDomain();
    }

    public function registerStylesAndScripts()
    {
        add_filter('template_redirect', array( __CLASS__, 'enqueueScripts' ));
        return $this;
    }

    public function registerTextDomain()
    {
        add_filter('plugins_loaded', array( $this, 'registerPluginTextDomain' ));
        return $this;
    }

    public function registerPluginTextDomain()
    {
        if( $path = self::getResourceDirectory('', 'languages') ) {
            load_plugin_textdomain('custom-status', false, $path);
        }
    }

    // Static methods
    public static function enqueueStyles()
    {
        if( is_admin() ) {
            if( $stylePath = self::getResourceURL('admin-styles.css', 'css') ) {
                wp_enqueue_style('your-plugin-name-admin-styles', $stylePath);
            }
        }

        if( $stylePath = self::getResourceURL('front-end.css', 'css') ) {
            wp_enqueue_style('your-plugin-name-front-end-styles', $stylePath);
        }
    }

    public static function enqueueScripts()
    {
        if( is_admin() ) {
            if( $scriptPath = self::getResourceURL('admin-script.js', 'javascript') ) {
                wp_enqueue_script('your-plugin-name-admin-script', $scriptPath, array( 'jquery' ));
            }
        }

        if( $scriptPath = self::getResourceURL('front-end.js', 'javascript') ) {
            wp_enqueue_script('your-plugin-name-front-end-script', $scriptPath, array( 'jquery' ));
        }
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
