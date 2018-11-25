<?php

/**
 * Contao Open Source CMS
 *
 * @copyright  MEN AT WORK 2018
 * @package    clipboard
 * @author     Stefan Heimes <stefan_heimes@hotmail.com>
 * @license    GNU/LGPL
 */

namespace MenAtWork\MultiColumnWizardBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

/**
 * Class MultiColumnWizardExtension
 *
 * @package MenAtWork\MultiColumnWizardBundle\DependencyInjection
 */
class MultiColumnWizardExtension extends ConfigurableExtension
{
    /**
     * @var array
     */
    private $files = [
//        'commands.yml',
//        'listener.yml',
        'services.yml',
    ];

    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return 'multicolumnwizard';
    }

    /**
     * {@inheritdoc}
     */
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );

        foreach ($this->files as $file) {
            $loader->load($file);
        }
    }
}
