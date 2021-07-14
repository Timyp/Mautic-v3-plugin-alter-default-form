<?php

declare(strict_types=1);

namespace MauticPlugin\CustomFormAlterBundle\Integration\Support;

use Mautic\IntegrationsBundle\Integration\DefaultConfigFormTrait;
use Mautic\IntegrationsBundle\Integration\Interfaces\ConfigFormInterface;
use MauticPlugin\CustomFormAlterBundle\Integration\CustomFormAlterIntegration;

class ConfigSupport extends CustomFormAlterIntegration implements ConfigFormInterface
{
    use DefaultConfigFormTrait;
}
