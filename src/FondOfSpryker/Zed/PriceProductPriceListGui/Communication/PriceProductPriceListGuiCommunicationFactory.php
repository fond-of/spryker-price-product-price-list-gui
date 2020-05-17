<?php

namespace FondOfSpryker\Zed\PriceProductPriceListGui\Communication;

use FondOfSpryker\Zed\PriceProductPriceListGui\Communication\Form\DataProvider\PriceListPriceDimensionFormDataProvider;
use FondOfSpryker\Zed\PriceProductPriceListGui\Dependency\Facade\PriceProductPriceListGuiToPriceListFacadeInterface;
use FondOfSpryker\Zed\PriceProductPriceListGui\PriceProductPriceListGuiDependencyProvider;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

/**
 * @method \FondOfSpryker\Zed\PriceProductPriceListGui\PriceProductPriceListGuiConfig getConfig()
 */
class PriceProductPriceListGuiCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \FondOfSpryker\Zed\PriceProductPriceListGui\Communication\Form\DataProvider\PriceListPriceDimensionFormDataProvider
     */
    public function createPriceListPriceDimensionFormDataProvider(): PriceListPriceDimensionFormDataProvider
    {
        return new PriceListPriceDimensionFormDataProvider(
            $this->getPriceListFacade()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\PriceProductPriceListGui\Dependency\Facade\PriceProductPriceListGuiToPriceListFacadeInterface
     */
    public function getPriceListFacade(): PriceProductPriceListGuiToPriceListFacadeInterface
    {
        return $this->getProvidedDependency(PriceProductPriceListGuiDependencyProvider::FACADE_PRICE_LIST);
    }
}
