<?php
namespace TYPO3\CMS\Styleguide\Tests\Functional\TcaDataGenerator;

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

use TYPO3\CMS\Core\Core\Bootstrap;
use TYPO3\CMS\Styleguide\TcaDataGenerator\Generator;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

/**
 * Test case
 */
class GeneratorTest extends FunctionalTestCase
{
    /**
     * @var array Have styleguide loaded
     */
    protected $testExtensionsToLoad = [
        'typo3conf/ext/styleguide',
    ];

    /**
     * Just a dummy to show that at least one test is actually executed on mssql
     *
     * @test
     */
    public function dummy()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     * @group not-mssql
     * @todo Generator does not work using mssql DMBS yet ... fix this
     */
    public function generatorCreatesBasicRecord()
    {
        // styleguide generator uses DataHandler for some parts. DataHandler needs an
        // initialized BE user with admin right and the live workspace.
        Bootstrap::initializeBackendUser();
        $GLOBALS['BE_USER']->user['admin'] = 1;
        $GLOBALS['BE_USER']->user['uid'] = 1;
        $GLOBALS['BE_USER']->workspace = 0;
        Bootstrap::initializeLanguageObject();

        // Verify there is no tx_styleguide_elements_basic yet
        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable('tx_styleguide_elements_basic');
        $queryBuilder->getRestrictions()->removeAll();
        $count = $queryBuilder->count('uid')
            ->from('tx_styleguide_elements_basic')
            ->execute()
            ->fetchColumn(0);
        $this->assertEquals(0, $count);

        $generator = new Generator();
        $generator->create();

        // Verify there is at least one tx_styleguide_elements_basic record now
        $queryBuilder = $this->getConnectionPool()->getQueryBuilderForTable('tx_styleguide_elements_basic');
        $queryBuilder->getRestrictions()->removeAll();
        $count = $queryBuilder->count('uid')
            ->from('tx_styleguide_elements_basic')
            ->execute()
            ->fetchColumn(0);
        $this->assertGreaterThan(0, $count);
    }
}
