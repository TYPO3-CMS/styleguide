<?php
declare(strict_types = 1);

namespace TYPO3\CMS\Styleguide\UserFunctions\FormEngine;

/**
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

/**
 * A user function to compare two fields
 */
class DisplayConditionUserFunc
{
    /**
     * compare two fields
     *
     * @param array $parameter
     */
    public function lessThen($parameter): bool
    {
        return (int) $parameter['record'][$parameter['conditionParameters'][0]] <
            (int) $parameter['record'][$parameter['conditionParameters'][1]];
    }
}
