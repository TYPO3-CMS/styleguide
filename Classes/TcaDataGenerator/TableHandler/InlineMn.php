<?php

declare(strict_types=1);
namespace TYPO3\CMS\Styleguide\TcaDataGenerator\TableHandler;

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

use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Styleguide\TcaDataGenerator\RecordData;
use TYPO3\CMS\Styleguide\TcaDataGenerator\RecordFinder;
use TYPO3\CMS\Styleguide\TcaDataGenerator\TableHandlerInterface;

/**
 * Generate data for table tx_styleguide_inline_mn
 */
class InlineMn extends AbstractTableHandler implements TableHandlerInterface
{
    /**
     * @var string Table name to match
     */
    protected $tableName = 'tx_styleguide_inline_mn';

    /**
     * Create 1 main row, 4 child child rows, add 2 child child rows in mn
     *
     * @param string $tableName
     */
    public function handle(string $tableName): void
    {
        $recordFinder = GeneralUtility::makeInstance(RecordFinder::class);
        $pidOfMainTable = $recordFinder->findPidOfMainTableRecord($tableName);
        $recordData = GeneralUtility::makeInstance(RecordData::class);
        $context = GeneralUtility::makeInstance(Context::class);

        $childRelationUids = [];
        $numberOfChildRelationsToCreate = 2;
        $numberOfChildRows = 4;
        $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
        for ($i = 0; $i < $numberOfChildRows; $i ++) {
            $fieldValues = [
                'pid' => $pidOfMainTable,
                'tstamp' => $context->getAspect('date')->get('timestamp'),
                'crdate' => $context->getAspect('date')->get('timestamp'),
                'cruser_id' => $context->getAspect('backend.user')->get('id'),
            ];
            $connection = $connectionPool->getConnectionForTable('tx_styleguide_inline_mn_child');
            $connection->insert('tx_styleguide_inline_mn_child', $fieldValues);
            $fieldValues['uid'] = $connection->lastInsertId('tx_styleguide_inline_mn_child');
            if (count($childRelationUids) < $numberOfChildRelationsToCreate) {
                $childRelationUids[] = $fieldValues['uid'];
            }
            $fieldValues = $recordData->generate('tx_styleguide_inline_mn_child', $fieldValues);
            // Do not update primary identifier uid anymore, db's choke on that for good reason
            $updateValues = $fieldValues;
            unset($updateValues['uid']);
            $connection->update(
                'tx_styleguide_inline_mn_child',
                $updateValues,
                [ 'uid' => (int)$fieldValues['uid'] ]
            );
        }

        $fieldValues = [
            'pid' => $pidOfMainTable,
            'tstamp' => $context->getAspect('date')->get('timestamp'),
            'crdate' => $context->getAspect('date')->get('timestamp'),
            'cruser_id' => $context->getAspect('backend.user')->get('id'),
            'inline_1' => $numberOfChildRelationsToCreate,
        ];
        $connection = $connectionPool->getConnectionForTable($tableName);
        $connection->insert($tableName, $fieldValues);
        $parentid = $fieldValues['uid'] = $connection->lastInsertId($tableName);
        $fieldValues = $recordData->generate($tableName, $fieldValues);
        // Do not update primary identifier uid anymore, db's choke on that for good reason
        $updateValues = $fieldValues;
        unset($updateValues['uid']);
        $connection->update(
            $tableName,
            $updateValues,
            [ 'uid' => (int)$fieldValues['uid'] ]
        );

        $this->generateTranslatedRecords($tableName, $fieldValues);

        foreach ($childRelationUids as $uid) {
            $mmFieldValues = [
                'pid' => $pidOfMainTable,
                'tstamp' => $context->getAspect('date')->get('timestamp'),
                'crdate' => $context->getAspect('date')->get('timestamp'),
                'cruser_id' => $context->getAspect('backend.user')->get('id'),
                'parentid' => $parentid,
                'childid' => $uid,
            ];
            $connection = $connectionPool->getConnectionForTable('tx_styleguide_inline_mn_mm');
            $connection->insert('tx_styleguide_inline_mn_mm', $mmFieldValues);
        }
    }
}
