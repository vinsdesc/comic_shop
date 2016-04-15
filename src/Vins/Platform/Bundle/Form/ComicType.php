<?php

namespace Vins\Platform\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ComicType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('format')
            ->add('price', 'money')
            ->add('publicationDate' , 'date', array(
                  'widget' => 'choice',
                  'years' => range(1975,2016),
                  'format' => 'dd-MM-yyyy',
                   'placeholder' => array(
                        'year' => 'Year', 'month' => 'Month', 'day' => 'Day'
                    )
                  ))
            ->add('stock')
            ->add('summary', 'textarea')
            ->add('categories', 'entity', array(
                  'class'    => 'VinsPlatformBundle:Category',
                  'property' => 'name',
                  'multiple' => true,
                  'expanded' => true
                ))
            ->add('image', new ImageType())
            ->add('artistComics', 'collection', array(
                  'type'         => new ArtistComicType(),
                  'allow_add'    => true,
                  'allow_delete' => true,
                  'by_reference' => false,

              ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vins\Platform\Bundle\Entity\Comic'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vins_platform_bundle_comic';
    }
}
