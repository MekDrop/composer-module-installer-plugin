<?php
/**
 * Created by PhpStorm.
 * User: fiammy
 * Date: 29/08/14
 *
 *
 */

namespace ImpressCMS\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class LanguageInstaller extends LibraryInstaller
{
    /**
     * getPackageBasePath
     *
     * @param PackageInterface $package package being installed
     *
     * @return string install path relative to composer.json
     */
    public function getPackageBasePath(PackageInterface $package)
    {
        $transdir = explode('/', $package->getName());
        $icms_translations = './language/';
        $extra = $this->composer->getPackage()->getExtra();
        if (isset($extra['icms_translations_path'])) {
            $icms_root = $extra['icms_translations_path'];
        }
        return $icms_translations . $transdir[1];
    }
    /**
     * supports - determine if this supports a given package type
     *
     * @param string $packageType package type name
     *
     * @return boolean true if packageType is supported
     */
    public function supports($packageType)
    {
        return 'impresscms-translation' === $packageType;
    }
} 