<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:workday/Resources/Private/Language/locallang_db.xlf:tx_workday_domain_model_job',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'title,description,location,salary,job_type',
        'iconfile' => 'EXT:workday/Resources/Public/Icons/tx_workday_domain_model_job.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'title, description, location, salary, job_type, workday_id, application_link, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, sys_language_uid, l10n_parent, l10n_diffsource'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_workday_domain_model_job',
                'foreign_table_where' => 'AND tx_workday_domain_model_job.pid=###CURRENT_PID### AND tx_workday_domain_model_job.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:core/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'title' => [
            'exclude' => false,
            'label' => 'LLL:EXT:workday/Resources/Private/Language/locallang_db.xlf:tx_workday_domain_model_job.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'description' => [
            'exclude' => false,
            'label' => 'LLL:EXT:workday/Resources/Private/Language/locallang_db.xlf:tx_workday_domain_model_job.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'location' => [
            'exclude' => false,
            'label' => 'LLL:EXT:workday/Resources/Private/Language/locallang_db.xlf:tx_workday_domain_model_job.location',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'salary' => [
            'exclude' => false,
            'label' => 'LLL:EXT:workday/Resources/Private/Language/locallang_db.xlf:tx_workday_domain_model_job.salary',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'job_type' => [
            'exclude' => false,
            'label' => 'LLL:EXT:workday/Resources/Private/Language/locallang_db.xlf:tx_workday_domain_model_job.job_type',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'workday_id' => [
            'exclude' => true,
            'label' => 'LLL:EXT:workday/Resources/Private/Language/locallang_db.xlf:tx_workday_domain_model_job.workday_id',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'application_link' => [
            'exclude' => false,
            'label' => 'LLL:EXT:workday/Resources/Private/Language/locallang_db.xlf:tx_workday_domain_model_job.application_link',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
    ],
];
