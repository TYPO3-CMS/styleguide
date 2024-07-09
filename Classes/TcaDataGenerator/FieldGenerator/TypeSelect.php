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

namespace TYPO3\CMS\Styleguide\TcaDataGenerator\FieldGenerator;

use TYPO3\CMS\Styleguide\TcaDataGenerator\FieldGeneratorInterface;

/**
 * Generate data for type=select fields
 *
 * @internal
 */
final class TypeSelect extends AbstractFieldGenerator implements FieldGeneratorInterface
{
    protected array $matchArray = [
        'fieldConfig' => [
            'config' => [
                'type' => 'select',
            ],
        ],
    ];

    public function generate(array $data): string
    {
        $result = [];
        if (isset($data['fieldConfig']['config']['items']) && count($data['fieldConfig']['config']['items']) > 1) {
            $numberOfItemsToSelect = 1;
            if (isset($data['fieldConfig']['config']['minitems'])) {
                $numberOfItemsToSelect = $data['fieldConfig']['config']['minitems'];
            }
            $isFirst = true;
            foreach ($data['fieldConfig']['config']['items'] as $item) {
                if ($isFirst) {
                    // Ignore first item
                    $isFirst = false;
                    continue;
                }
                // Ignore divider
                if (isset($item['value'])) {
                    $value = $item['value'];
                    if ($value !== '--div--') {
                        if (count($result) <= $numberOfItemsToSelect) {
                            $result[] = $value;
                        }
                        if (count($result) === $numberOfItemsToSelect) {
                            break;
                        }
                    }
                }
            }
        }
        return implode(',', $result);
    }
}
