<?php

/*
 * @copyright   2016 Mautic Contributors. All rights reserved
 * @author      Mautic, Inc.
 *
 * @link        https://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace MauticPlugin\CustomFormAlterBundle\Form\Extension;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;

class CustomFormExtension extends AbstractTypeExtension
{
    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    /**
     * FormTypeCaptchaExtension constructor.
     */
    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $name = $builder->getName();
        if($name === "emailform") {
            $formModifier = function (FormEvent $event) use ($options) {
                //Exemple add custom header by default on mail form /s/emails/edit/1
                $headers = [];
                $headers['MY_CUSTOM_HEADER'] = 'custom string';
                $data = $event->getData();
                $currentHeaders = $data->getHeaders();
                foreach ($currentHeaders as $k => $value){
                    $headers[$k] = $value;
                }
               $data->setHeaders($headers);
            };

            $builder->addEventListener(FormEvents::PRE_SET_DATA, $formModifier);
        }
    }

    /**
     * @return string
     */
    public function getExtendedType()
    {
        return FormType::class;
    }
}