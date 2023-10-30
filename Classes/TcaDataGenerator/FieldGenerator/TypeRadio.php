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

use TYPO3\CMS\Styleguide\TcaDataGenerator\FieldGeneratorInterface;

/**
 * Generate data for type=radio fields
 */
final class TypeRadio extends AbstractFieldGenerator implements FieldGeneratorInterface
{
    /**
     * @var array General match if type=check
     */
    protected $matchArray = [
        'fieldConfig' => [
            'config' => [
                'type' => 'radio',
            ],
        ],
    ];

    /**
     * Returns the generated value to be inserted into DB for this field
     *
     * @param array $data
     * @return string
     */
    public function generate(array $data): string
    {
        // Nothing by default
        $value = '';
        // Set second value selected if there is more than one item
        if (isset($data['fieldConfig']['config']['items'])
            && is_array($data['fieldConfig']['config']['items'])
            && count($data['fieldConfig']['config']['items']) > 1
        ) {
            $values = $data['fieldConfig']['config']['items'];
            array_shift($values);
            $value = array_shift($values);
            $value = $value['value'];
        }
        return (string)$value;
    }
}
