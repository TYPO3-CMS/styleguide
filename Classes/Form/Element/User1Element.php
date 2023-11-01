<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace TYPO3\CMS\Styleguide\Form\Element;

use TYPO3\CMS\Backend\Form\Behavior\OnFieldChangeTrait;
use TYPO3\CMS\Backend\Form\Element\AbstractFormElement;
use TYPO3\CMS\Core\Page\JavaScriptModuleInstruction;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * A user function rendering a type=user TCA type used in user_1
 *
 * @internal
 */
final class User1Element extends AbstractFormElement
{
    use OnFieldChangeTrait;

    /**
     * @return array<string, array<int, string|JavaScriptModuleInstruction>|string> As defined in initializeResultArray() of AbstractNode
     */
    public function render(): array
    {
        $result = $this->initializeResultArray();
        $parameters = $this->data['parameterArray'];
        $html = [];
        $html[] = '<div style="border: 1px dashed ' . htmlspecialchars($parameters['fieldConf']['config']['parameters']['color'] ?? '') . '" >';
        $html[] = '<h2>Own form field using a parameter</h2>';

        $attrs = array_merge(
            [
                'type' => 'input',
                'name' => $parameters['itemFormElName'],
                'value' => $parameters['itemFormElValue'],
            ],
            $this->getOnFieldChangeAttrs('change', $parameters['fieldChangeFunc'] ?? [])
        );
        $html[] = sprintf('<input %s>', GeneralUtility::implodeAttributes($attrs, true));
        $html[] = '</div>';
        $result['html'] = implode(chr(10), $html);
        return $result;
    }
}
