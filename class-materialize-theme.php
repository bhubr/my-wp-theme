<?php
namespace bhubr;

class MaterializeTheme {

    protected $hasWPML;

    protected $activeLanguages = [];

    /**
     * Constructor
     */
    function __construct() {
        //$activePlugins = \get_option('active_plugins');
        $this->hasWPML = function_exists('icl_object_id'); // array_search('sitepress-multilingual-cms/sitepress.php', $activePlugins) !== false;
        if ( is_admin() ){
            add_action( 'admin_menu', [$this, 'create_options_menu'] );
            if($this->hasWPML) {
                global $wpdb;
                $this->activeLanguages = $wpdb->get_results("SELECT code, english_name from {$wpdb->prefix}icl_languages WHERE active = 1");
                //echo "SELECT code, english_name from {$wpdb->prefix}icl_languages WHERE active = 1";
                // foreach($activeLanguages as $lang) {
                //   $this->activeLanguages[] = $lang['code'];
                // }
            }
            else {
                $lang = new stdClass();
                $lang->code = substr( get_locale(), 0, 2 );
                $lang->english_name = 'Current language';
                $this->activeLanguages[] = $lang;
            }
            add_action( 'update_option', [$this, 'update_option'] );
        } else {
            add_action( 'wp_enqueue_scripts', [$this, 'enqueue_front_styles'] );
        }
    }

    /**
     * Front-end styles
     */
    function enqueue_front_styles() {
        wp_enqueue_style('main', get_template_directory_uri() . '/style.css?ts=' . time());
    }


    /**
     * Register options page in menu and register settings
     */
    function create_options_menu() {

        //create new top-level menu
        add_theme_page('MaterializeCSS Theme Settings', 'MaterializeCSS Theme Settings', 'administrator', 'matcss_theme_settings_page', [$this, 'settings_page'],  plugins_url('/images/icon.png', __FILE__) );

        //call register settings function
        add_action( 'admin_init', [$this, 'register_options'] );
    }


    /**
     * Process options
     */
    function update_option() {
        //var_dump($_POST);die();
    }

    /**
     * Options page settings
     */
    function register_options() {
        foreach($this->activeLanguages as $lang) {
            register_setting( 'myoption-group', "{$lang->code}_position_title1" );
            register_setting( 'myoption-group', "{$lang->code}_position_title2" );
            register_setting( 'myoption-group', "{$lang->code}_position_description" );
//            register_setting( 'myoption-group', 'option_etc' );
        }
    }

    /**
     * Render settings page
     */
    function settings_page() {
      if( function_exists('wpml_active_languages') ) {
        var_dump(wpml_active_languages());
      }
    ?>
    <div class="wrap">
    <h1><?php _e('MaterializeCSS options', 'bhu_matcss'); ?></h1>

    <form method="post" action="options.php">
        <?php settings_fields( 'myoption-group' ); ?>
        <?php do_settings_sections( 'myoption-group' ); ?>
        <table class="form-table">
        <?php foreach($this->activeLanguages as $lang): ?>
            <tr><td><h3>Options for <?php echo $lang->english_name; ?></h3></td></tr>
            <tr valign="top">
            <th scope="row">Position title</th>
            <td>
            <input type="text" name="<?php echo $lang->code; ?>_position_title1" value="<?php echo esc_attr( get_option("{$lang->code}_position_title1") ); ?>" /><br>
            <input type="text" name="<?php echo $lang->code; ?>_position_title2" value="<?php echo esc_attr( get_option("{$lang->code}_position_title2") ); ?>" />
            </td>
            </tr>
             
            <tr valign="top">
            <th scope="row">Position description</th>
            <td><textarea type="text" name="<?php echo $lang->code; ?>_position_description"><?php echo esc_attr( get_option("{$lang->code}_position_description") ); ?></textarea></td>
            </tr>
            
        <?php endforeach; ?>
            <tr valign="top">
            <th scope="row">Options, Etc.</th>
            <td><input type="text" name="option_etc" value="<?php echo esc_attr( get_option('option_etc') ); ?>" /></td>
            </tr>
        </table>
        
        <?php submit_button(); ?>

    </form>
    </div>
    <?php
    }
}