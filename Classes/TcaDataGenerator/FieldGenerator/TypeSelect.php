<?php
declare(strict_types=1);
namespace TYPO3\CMS\Styleguide\TcaDataGenerator\FieldGenerator;

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

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Styleguide\TcaDataGenerator\FieldGeneratorInterface;
use TYPO3\CMS\Styleguide\TcaDataGenerator\RecordFinder;

/**
 * Generate data for type=select fields
 */
class TypeSelect extends AbstractFieldGenerator implements FieldGeneratorInterface
{
    /**
     * @var array General match if type=select
     */
    protected $matchArray = [
        'fieldConfig' => [
            'config' => [
                'type' => 'select',
            ],
        ],
    ];

    /**
     * Selects the second item from a static item list if there are
     * at least two items.
     *
     * @param array $data
     * @return string
     */
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
                if (isset($item[1]) && $item[1] !== '--div--') {
                    if (count($result) <= $numberOfItemsToSelect) {
                        $result[] = $item[1];
                    }
                    if (count($result) === $numberOfItemsToSelect) {
                        break;
                    }
                }
            }
        }
        return implode(',', $result);
    }
}
