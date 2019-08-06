<?php

namespace FondOfSpryker\Zed\PriceProductPriceListGui\Communication\Form;

use FondOfSpryker\Shared\PriceProductPriceList\PriceProductPriceListConstants;
use Generated\Shared\Transfer\PriceProductDimensionTransfer;
use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @method \FondOfSpryker\Zed\PriceProductPriceListGui\PriceProductPriceListGuiConfig getConfig()
 * @method \FondOfSpryker\Zed\PriceProductPriceListGui\Communication\PriceProductPriceListGuiCommunicationFactory getFactory()
 */
class PriceListPriceDimensionForm extends AbstractType
{
    public const OPTION_VALUES_PRICE_LIST_CHOICES = 'price_list_choices';

    protected const FIELD_PLACEHOLDER_PRICE_LIST = 'Default';
    protected const FIELD_LABEL_PRICE_LIST = 'Price List Price Dimension';
    protected const TEMPLATE_PATH = '@PriceProductPriceListGui/ProductManagement/price_dimension.twig';

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addPriceListCollectionField($builder, $options);
    }

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);
        $resolver->setRequired(static::OPTION_VALUES_PRICE_LIST_CHOICES);
        $resolver->setDefaults([
            'label' => false,
            'mapped' => false,
        ]);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return $this
     */
    protected function addPriceListCollectionField(FormBuilderInterface $builder, array $options)
    {
        $builder->add(PriceProductDimensionTransfer::ID_PRICE_LIST, ChoiceType::class, [
            'choices' => $options[static::OPTION_VALUES_PRICE_LIST_CHOICES],
            'placeholder' => static::FIELD_PLACEHOLDER_PRICE_LIST,
            'label' => static::FIELD_LABEL_PRICE_LIST,
            'attr' => [
                'template_path' => $this->getTemplatePath(),
                'data-type' => PriceProductPriceListConstants::PRICE_DIMENSION_PRICE_LIST,
            ],
        ]);
        return $this;
    }

    /**
     * @return string
     */
    protected function getTemplatePath(): string
    {
        return static::TEMPLATE_PATH;
    }
}
