<?php

return [
    'name'        => 'Custom Form Alter',
    'description' => 'Add or modify field in Mautic default Form',
    'version'     => '1.0.1',
    'author'      => 'Sylvain Decalogne',
    'routes'      => [],
    'menu'        => [],
    'services'    => [
        'others' => [
            // Form extensions
            'mautic.customformalter.form.extension.custom' => [
                'class'        => \MauticPlugin\CustomFormAlterBundle\Form\Extension\CustomFormExtension::class,
                'arguments'    => [
                    'event_dispatcher',
                ],
                'tag'          => 'form.type_extension',
                'tagArguments' => [
                    'extended_type' => Symfony\Component\Form\Extension\Core\Type\FormType::class,
                ],
            ],
        ],
        'integrations' => [
            // Basic definitions with name, display name and icon
            'mautic.integration.customformalter' => [
                'class' => \MauticPlugin\CustomFormAlterBundle\Integration\CustomFormAlterIntegration::class,
                'tags'  => [
                    'mautic.integration',
                    'mautic.basic_integration',
                ],
            ],
            // Provides the form types to use for the configuration UI
            'customformalter.integration.configuration' => [
                'class'     => \MauticPlugin\CustomFormAlterBundle\Integration\Support\ConfigSupport::class,
                'tags'      => [
                    'mautic.config_integration',
                ],
            ],
        ],
    ],
];