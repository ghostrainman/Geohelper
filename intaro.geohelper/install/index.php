<?php
//global $MESS;
IncludeModuleLangFile(__FILE__);
if (class_exists('intaro_geohelper')) {
    return;
}

class intaro_geohelper extends CModule
{
    var $MODULE_ID = 'intaro.geohelper';
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $PARTNER_NAME;
    var $PARTNER_URI;
    var $MODULE_GROUP_RIGHTS = 'N';
    
    var $API_KEY = 'api_key';

    function intaro_geohelper()
    {
        $arModuleVersion = array();
        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
        $this->INSTALL_PATH = $path;
        include($path . "/version.php");

        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];

        $this->MODULE_NAME = GetMessage('GEOHELPER_INDEX');
        $this->MODULE_DESCRIPTION = GetMessage('GEOHELPER_DESCRIPTION');
        $this->PARTNER_NAME = GetMessage('GEOHELPER_PARTNER_NAME');
        $this->PARTNER_URI = GetMessage('GEOHELPER_PARTNER_URI');
    }

    function DoInstall()	{
        RegisterModule($this->MODULE_ID);
        $this->InstallFiles();
    }

    function DoUninstall()	{
        COption::RemoveOption($this->MODULE_ID, $this->API_KEY);
        UnRegisterModule($this->MODULE_ID);
        $this->UnInstallFiles();
    }
}