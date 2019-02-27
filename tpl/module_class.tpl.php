<?php

// Load DolibarrModules class
include_once DOL_DOCUMENT_ROOT.'/core/modules/DolibarrModules.class.php';

// Load module lib
dol_include_once('${module_folder}/lib/module.lib.php');

/**
 * Class to describe and enable module
 */
class mod${module_class_name} extends DolibarrModules
{
    /**
     * Constructor. Define names, constants, directories, boxes, permissions
     *
     * @param      DoliDB      $db      Database handler
     */
    public function __construct($db)
    {
        // Module configuration
        $this->db              = $db;
        $this->editor_name     = '${author_name}';
        $this->editor_url      = '${author_url}';
        $this->numero          = '${module_number}';
        $this->rights_class    = '${module_rights_class}';
        $this->family          = '${module_family}';
        $this->module_position = '${module_position}';
        $this->name            = '${module_name}';
        $this->description     = '${module_desc}';
        $this->version         = '${module_version}';
        $this->const_name      = 'MAIN_MODULE_'.strtoupper($this->name);
        $this->special         = 0;
        $this->picto           = '${module_picture}@${module_folder}';

        // Module parts (css, js, ...)
        $this->module_parts    = array(
            'css'   => array(),
            'js'    => array(),
            'hooks' => array(),
            //'triggers' => 1,
        );

        // Config page
        $this->config_page_url = array('${module_setup_page}@${module_folder}');

        // Dependencies
        $this->need_dolibarr_version = array(${module_dolibarr_min});
        $this->phpmin                = array(${module_php_min});
        $this->depends               = array(${module_depends});
        $this->requiredby            = array(${module_required_by});
        $this->conflictwith          = array(${module_conflict_with});
        $this->langfiles             = array(${module_lang_files});
    }

    /**
     * Function called when module is enabled.
     * The init function add constants, boxes, permissions and menus
     * (defined in constructor) into Dolibarr database.
     * It also creates data directories
     *
     * @param string $options Options when enabling module ('', 'noboxes')
     * @return int 1 if OK, 0 if KO
     */
    public function init($options = '')
    {
        // Load module tables
        $result = $this->_load_tables('/${module_folder}/sql/');

        return $this->_init(array(), $options);
    }

    /**
     * Function called when module is disabled.
     * Remove from database constants, boxes and permissions from Dolibarr database.
     * Data directories are not deleted
     *
     * @param string $options Options when enabling module ('', 'noboxes')
     * @return int 1 if OK, 0 if KO
     */
    public function remove($options = '')
    {
        return $this->_remove(array(), $options);
    }
}
