<?php

namespace Vins\Platform\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CartLineType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantity')
            ->add('available')

            ->add('comic', 'entity', array(
                'class' => 'VinsPlatformBundle:Comic',
                'property' => 'title',
                'multiple' => false,
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vins\Platform\Bundle\Entity\CartLine'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vins_platform_bundle_cartline';
    }
}
