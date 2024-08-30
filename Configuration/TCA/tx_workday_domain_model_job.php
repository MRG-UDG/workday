<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:workday/Resources/Private/Language/locallang_db.xlf:tx_workday_domain_model_job',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'workday_id,title,description,location,department',
        'iconfile' => 'EXT:workday/Resources/Public/Icons/tx_workday_domain_model_job.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'workday_id, title, description, location, department, salary_range, application_deadline, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden'],
    ],
    'columns' => [
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ]
        ],
        'workday_id' => [
            'exclude' => true,
            'label' => 'LLL:EXT:workday/Resources/Private/Language/locallang_db.xlf:tx_workday_domain_model_job.workday_id',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,unique'
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
            ],
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
        'department' => [
            'exclude' => false,
            'label' => 'LLL:EXT:workday/Resources/Private/Language/locallang_db.xlf:tx_workday_domain_model_job.department',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'salary_range' => [
            'exclude' => false,
            'label' => 'LLL:EXT:workday/Resources/Private/Language/locallang_db.xlf:tx_workday_domain_model_job.salary_range',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'application_deadline' => [
            'exclude' => false,
            'label' => 'LLL:EXT:workday/Resources/Private/Language/locallang_db.xlf:tx_workday_domain_model_job.application_deadline',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 10,
                'eval' => 'datetime',
                'default' => 0
            ],
        ],
    ],
];
