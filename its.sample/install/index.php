<?php

use Bitrix\Main\Application;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Localization\Loc;

class its_sample extends CModule {
    public $MODULE_ID = 'its.sample';
    public $MODULE_NAME;
    public $MODULE_DESCRIPTION;
    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;
    public $PARTNER_NAME;
    public $PARTNER_URI;

    public function __construct()
    {
        $arModuleVersion = [];
        include __DIR__ . '/version.php';

        if (is_array($arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }

        $this->MODULE_ID = 'its.sample';
        $this->MODULE_NAME = Loc::GetMessage("its.sample:MODULE_NAME");
        $this->MODULE_DESCRIPTION = Loc::GetMessage("its.sample:MODULE_DESC");
        $this->MODULE_GROUP_RIGHTS = 'N';

        $this->PARTNER_NAME = Loc::GetMessage("its.sample:PARTNER_NAME");
        $this->PARTNER_URI = Loc::GetMessage("its.sample:PARTNER_URI");
    }

    public function doUninstall()
    {
        if (!$this->UnInstallDB()) {
            return false;
        }

        $this->UnInstallEvents();
        $this->UnInstallFiles();

        ModuleManager::unRegisterModule($this->MODULE_ID);
        return true;
    }

    public function doInstall()
    {
        ModuleManager::registerModule($this->MODULE_ID);

        if (!$this->InstallDB()) {
            return false;
        }

        if (!$this->InstallEvents()) {
            $this->UninstallDB();
            return false;
        }

        if (!$this->InstallFiles()) {
            $this->UninstallDB();
            $this->UninstallFiles();
            return false;
        }

        return true;
    }

    public function InstallDB()
    {
        return true;
    }

    public function UninstallDB()
    {
        return true;
    }

    public function InstallEvents()
    {
        return true;
    }

    public function UninstallEvents()
    {
        return true;
    }

    public function InstallFiles()
    {
        return true;
    }

    public function UninstallFiles()
    {
        return true;
    }
}
