<?php

/**
 * @package     Plagx Draft Preflight
 * @copyright   (C) 2026 Plagiarism Checker X
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Plagx\Plugin\System\DraftPreflight\Field;

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Form\FormField;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\Registry\Registry;

/**
 * The Draft Preflight panel. It renders controls only: nothing in it has a name,
 * so nothing is saved with the article.
 */
class PreflightField extends FormField
{
    /**
     * The form field type.
     *
     * @var string
     */
    protected $type = 'Preflight';

    /**
     * Every check the Preflight rules support.
     */
    private const CHECKS = ['length', 'references', 'punctuation', 'grammar', 'passive-voice'];

    protected function getInput()
    {
        $plugin = PluginHelper::getPlugin('system', 'plagxdraftpreflight');
        $params = new Registry($plugin->params ?? '');

        $min    = max(0, (int) $params->get('min_words', 0));
        $max    = max(0, (int) $params->get('max_words', 0));
        $style  = $params->get('style') === 'mla' ? 'mla' : 'apa';
        // Saved options hold a list; the install defaults hold a comma-separated string.
        $checks = $params->get('checks', 'length,references,punctuation,grammar');
        $checks = \is_string($checks) ? explode(',', $checks) : (array) $checks;
        $checks = array_values(array_intersect(self::CHECKS, array_map('trim', $checks)));

        $wa = Factory::getApplication()->getDocument()->getWebAssetManager();
        $wa->getRegistry()->addExtensionRegistryFile('plg_system_plagxdraftpreflight');
        $wa->useStyle('plg_system_plagxdraftpreflight.panel')->useScript('plg_system_plagxdraftpreflight.panel');

        $e    = static fn ($value) => htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
        $icon = HTMLHelper::_('image', 'plg_system_plagxdraftpreflight/pcx-icon.png', '', ['width' => 20, 'height' => 20], true);
        $opt  = static fn ($value, $label) => '<option value="' . $value . '"' . ($style === $value ? ' selected' : '') . '>' . $label . '</option>';

        return '<div class="plagx-preflight" data-checks="' . $e(implode(',', $checks)) . '">'
            . '<div class="plagx-preflight__brand">' . $icon . '<span>' . $e(Text::_('PLG_SYSTEM_PLAGXDRAFTPREFLIGHT_TAGLINE')) . '</span></div>'
            . '<div class="plagx-preflight__fields">'
            . '<label class="plagx-field"><span>' . $e(Text::_('PLG_SYSTEM_PLAGXDRAFTPREFLIGHT_MIN_WORDS')) . '</span>'
            . '<input type="number" min="0" step="1" inputmode="numeric" placeholder="0" data-field="minWords" value="' . ($min ?: '') . '"></label>'
            . '<label class="plagx-field"><span>' . $e(Text::_('PLG_SYSTEM_PLAGXDRAFTPREFLIGHT_MAX_WORDS')) . '</span>'
            . '<input type="number" min="0" step="1" inputmode="numeric" placeholder="0" data-field="maxWords" value="' . ($max ?: '') . '"></label>'
            . '<label class="plagx-field plagx-field--wide"><span>' . $e(Text::_('PLG_SYSTEM_PLAGXDRAFTPREFLIGHT_STYLE')) . '</span>'
            . '<select data-field="style">' . $opt('apa', 'APA') . $opt('mla', 'MLA') . '</select></label>'
            . '</div>'
            . '<button type="button" class="plagx-button" data-action="check">' . $e(Text::_('PLG_SYSTEM_PLAGXDRAFTPREFLIGHT_CHECK')) . '</button>'
            . '<div class="plagx-preflight__result" aria-live="polite"></div>'
            . '<p class="plagx-preflight__note">' . $e(Text::_('PLG_SYSTEM_PLAGXDRAFTPREFLIGHT_NOTE')) . '</p>'
            . '</div>';
    }
}
