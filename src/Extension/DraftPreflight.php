<?php

/**
 * @package     Plagx Draft Preflight
 * @copyright   (C) 2026 Plagiarism Checker X
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Plagx\Plugin\System\DraftPreflight\Extension;

\defined('_JEXEC') or die;

use Joomla\CMS\Event\Model\PrepareFormEvent;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Event\SubscriberInterface;

/**
 * Adds the Draft Preflight tab to the article edit form in the administrator.
 */
final class DraftPreflight extends CMSPlugin implements SubscriberInterface
{
    /**
     * Load the plugin language files automatically.
     *
     * @var bool
     */
    protected $autoloadLanguage = true;

    public static function getSubscribedEvents(): array
    {
        return ['onContentPrepareForm' => 'onContentPrepareForm'];
    }

    public function onContentPrepareForm(PrepareFormEvent $event): void
    {
        $form = $event->getForm();

        if ($form->getName() !== 'com_content.article' || !$this->getApplication()->isClient('administrator')) {
            return;
        }

        $form->loadFile(JPATH_PLUGINS . '/system/plagxdraftpreflight/forms/article.xml', false);
    }
}
