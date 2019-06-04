<?php

namespace FondOfSpryker\Zed\PriceProductPriceListGui\Communication\Plugin\ProductManagement;

use FondOfSpryker\Shared\PriceProductPriceList\PriceProductPriceListConstants;
use FondOfSpryker\Zed\PriceProductPriceListGui\Communication\Form\PriceListPriceDimensionForm;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductManagementExtension\Dependency\Plugin\ProductAbstractFormExpanderPluginInterface;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @method \FondOfSpryker\Zed\PriceProductPriceListGui\PriceProductPriceListGuiConfig getConfig()
 * @method \FondOfSpryker\Zed\PriceProductPriceListGui\Communication\PriceProductPriceListGuiCommunicationFactory getFactory()
 */
class PriceListProductAbstractFormExpanderPlugin extends AbstractPlugin implements ProductAbstractFormExpanderPluginInterface
{
    /**
     * @uses \Spryker\Zed\ProductManagement\Communication\Form\ProductFormAdd::FORM_PRICE_DIMENSION
     */
    protected const FORM_PRICE_DIMENSION = 'price_dimension';

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return \Symfony\Component\Form\FormBuilderInterface
     */
    public function expand(FormBuilderInterface $builder, array $options): FormBuilderInterface
    {
        $options = $this->getFactory()
            ->createPriceListPriceDimensionFormDataProvider()
            ->getOptions();

        $builder->get(static::FORM_PRICE_DIMENSION)->add(
            PriceProductPriceListConstants::PRICE_DIMENSION_PRICE_LIST,
            PriceListPriceDimensionForm::class,
            $options
        );

        return $builder;
    }
}