<?php

/*
 * This file is part of the FSi Component package.
 *
 * (c) Szczepan Cieślik <szczepan@fsi.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FSi\Component\DataSource\Extension\Symfony\Form\Driver;

use FSi\Component\DataSource\Driver\DriverAbstractExtension;
use FSi\Component\DataSource\Extension\Symfony\Form\Field;
use Symfony\Component\Form\FormFactory;

/**
 * Driver extension for form that loads fields extension.
 *
 */
class DriverExtension extends DriverAbstractExtension
{
    /**
     * @var FormFactory
     */
    private $formFactory;

    /**
     * Constructor.
     *
     * @param FormFactory $formFactory
     */
    public function __construct(FormFactory $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    /**
     * {@inheritdoc}
     */
    protected function loadFieldTypesExtensions()
    {
        return array(
            new Field\BaseFieldExtension(),
            new Field\TextFieldExtension($this->formFactory),
            new Field\NumberFieldExtension($this->formFactory),
            new Field\DateTimeFieldExtension($this->formFactory),
            new Field\EntityFieldExtension($this->formFactory),
        );
    }
}
