<?php

declare(strict_types=1);

namespace MauticPlugin\CustomFormAlterBundle\Integration;

use Mautic\IntegrationsBundle\Integration\BasicIntegration;
use Mautic\IntegrationsBundle\Integration\ConfigurationTrait;
use Mautic\IntegrationsBundle\Integration\Interfaces\BasicInterface;

class CustomFormAlterIntegration extends BasicIntegration implements BasicInterface
{
    use ConfigurationTrait;

    public function getIcon(): string
    {
        return 'plugins/CustomFormAlterBundle/Assets/img/logo.png';
    }

    public function getName(): string
    {
        return 'customformalter';
    }
}