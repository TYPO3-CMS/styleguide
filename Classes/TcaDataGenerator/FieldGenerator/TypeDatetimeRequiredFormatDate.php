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
 * Generate data for mandatory type=datetime fields with format=date
 *
 * @internal
 */
final class TypeDatetimeRequiredFormatDate extends AbstractFieldGenerator implements FieldGeneratorInterface
{
    /**
     * General match if type=datetime, format=date and required=true
     *
     * @var array
     */
    protected $matchArray = [
        'fieldConfig' => [
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
                'required' => true,
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
        return (string)$this->kauderwelschService->getDateTimestamp();
    }
}
