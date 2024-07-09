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

namespace TYPO3\CMS\Styleguide\TcaDataGenerator;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Find matching field generator class instance
 *
 * @internal
 */
final class FieldGeneratorResolver
{
    /**
     * List of field generators to be called for values.
     * Order is important: Each class is called top-bottom until one returns
     * true on match(), then generate() is called on it.
     */
    protected array $fieldValueGenerators = [
        // dbType = date / datetime have ['config']['default'] set, so match them before general ConfigDefault
        FieldGenerator\TypeDatetimeFormatDateDbTypeDate::class,
        FieldGenerator\TypeDatetimeDbTypeDatetime::class,

        // p/w generators are *before* 'default', so hashing kicks in, even if default is set.
        FieldGenerator\TypePasswordHashedFalse::class,
        FieldGenerator\TypePassword::class,

        // Use value from ['config']['default'] if given
        FieldGenerator\ConfigDefault::class,

        // Specific type=input generator
        FieldGenerator\TypeInputMax4Min4::class,
        FieldGenerator\TypeInputMax4::class,
        FieldGenerator\TypeInputEvalAlphanum::class,
        FieldGenerator\TypeEmail::class,
        FieldGenerator\TypeInputEvalIsIn::class,
        FieldGenerator\TypeInputEvalMd5::class,
        FieldGenerator\TypeInputEvalNum::class,
        FieldGenerator\TypeInputEvalUpper::class,
        FieldGenerator\TypeInputEvalYear::class,
        FieldGenerator\TypeInputWizardSelect::class,
        FieldGenerator\TypeInputDynamicTextWithRecordUid::class,
        FieldGenerator\TypeInputForceL10nParent::class,
        // General type=input generator
        FieldGenerator\TypeInput::class,

        // Specific type=datetime generator
        FieldGenerator\TypeDatetimeFormatDate::class,
        FieldGenerator\TypeDatetimeRequiredFormatDate::class,
        FieldGenerator\TypeDatetimeFormatTime::class,
        FieldGenerator\TypeDatetimeFormatTimesec::class,
        // General type=datetime generator
        FieldGenerator\TypeDatetime::class,

        // General type=link generator
        FieldGenerator\TypeLink::class,

        // General type=color generator
        FieldGenerator\TypeColor::class,

        // Specific type=number generator
        FieldGenerator\TypeNumberFormatDecimal::class,
        // General type=number generator
        FieldGenerator\TypeNumber::class,

        FieldGenerator\TypeTextDefaultExtrasRichtext::class,
        FieldGenerator\TypeTextFormatDatetime::class,
        FieldGenerator\TypeTextFormatCodeEditor::class,
        FieldGenerator\TypeTextMax30::class,
        FieldGenerator\TypeTextWizardSelect::class,
        FieldGenerator\TypeTextWizardTable::class,
        // General type=text generator
        FieldGenerator\TypeText::class,

        // General type=check generator
        FieldGenerator\TypeCheck::class,
        // General type=radio generator
        FieldGenerator\TypeRadio::class,

        // General type=none generator
        FieldGenerator\TypeNoneFormatDateTime::class,
        FieldGenerator\TypeNone::class,

        // l10n_source is type=passthrough but needs an int
        FieldGenerator\TypePassthroughFieldL10nSource::class,
        // General type=passthrough generator
        FieldGenerator\TypePassthrough::class,

        // General type=user generator
        FieldGenerator\TypeUser::class,
        // General type=uuid generator
        FieldGenerator\TypeUuid::class,

        // type=group
        FieldGenerator\TypeGroupFal::class,
        FieldGenerator\TypeGroupAllowedBeUsersBeGroups::class,
        FieldGenerator\TypeGroupAllowedBeUsers::class,
        FieldGenerator\TypeGroupAllowedStaticdata::class,
        FieldGenerator\TypeGroupAllowedPages::class,
        FieldGenerator\TypeGroupAllowedSysFiles::class,

        // type=folder
        FieldGenerator\TypeFolder::class,

        // type=select
        FieldGenerator\TypeSelectRenderTypeSingleForeignTable::class,
        FieldGenerator\TypeSelectRenderTypeSingleForeignTableGroupField::class,
        FieldGenerator\TypeSelectRenderTypeSingleForeignTableForType::class,
        FieldGenerator\TypeSelectRenderTypeSelectTree::class,
        FieldGenerator\TypeSelectStaticData::class,
        FieldGenerator\TypeSelect::class,

        // type=inline
        FieldGenerator\TypeInlineFalSelectSingle12Foreign::class,
        FieldGenerator\TypeInlineExpandsingle::class,
        FieldGenerator\TypeInlineUsecombination::class,
        FieldGenerator\TypeInlineUsecombinationGroup::class,

        // type=file
        FieldGenerator\TypeFile::class,

        // type=imageManipulation
        FieldGenerator\TypeImageManipulation::class,

        // General type=inline for simple 1:n parent child relations
        FieldGenerator\TypeInline1n::class,

        // General type=flex generator
        FieldGenerator\TypeFlex::class,
    ];

    /**
     * Resolve a generator class and return its instance.
     * Either returns an instance of FieldGeneratorInterface or throws exception
     *
     * @param array $data Criteria data
     * @throws GeneratorNotFoundException|Exception
     */
    public function resolve(array $data): FieldGeneratorInterface
    {
        $generator = null;
        foreach ($this->fieldValueGenerators as $fieldValueGenerator) {
            $generator = GeneralUtility::makeInstance($fieldValueGenerator);
            if (!$generator instanceof FieldGeneratorInterface) {
                throw new Exception(
                    'Field value generator ' . $fieldValueGenerator . ' must implement FieldGeneratorInterface',
                    1457693564
                );
            }
            if ($generator->match($data)) {
                break;
            }
            $generator = null;
        }
        if (is_null($generator)) {
            throw new GeneratorNotFoundException(
                'No generator found',
                1457873493
            );
        }
        return $generator;
    }
}
