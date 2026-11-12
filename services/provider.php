<?php

/**
 * @package     Plagx Draft Preflight
 * @copyright   (C) 2026 Plagiarism Checker X
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Extension\PluginInterface;
use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Event\DispatcherInterface;
use Plagx\Plugin\System\DraftPreflight\Extension\DraftPreflight;

return new class () implements ServiceProviderInterface {
    public function register(Container $container): void
    {
        $container->set(
            PluginInterface::class,
            function (Container $container) {
                $plugin = new DraftPreflight(
                    $container->get(DispatcherInterface::class),
                    (array) PluginHelper::getPlugin('system', 'plagxdraftpreflight')
                );
                $plugin->setApplication(Factory::getApplication());

                return $plugin;
            }
        );
    }
};
