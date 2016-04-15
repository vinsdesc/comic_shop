<?php
namespace Vins\Platform\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ComicResearchType extends AbstractType
{
    public function buildForm(FormbuilderInterface $builder, array $option)
    {
        $builder->add('research','text', array('label' => false,
                                                'attr' => array('class' => 'input-medium search-query')));
    }
    
    public function getName()
    {
        return 'vins_platformbundle_research';
    }
}