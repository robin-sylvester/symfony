<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CombinedType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('movie', MovieType::class, array(
            'action' => MovieType::class
        ));

        $builder->add('people', CollectionType::class, array(
            'entry_type' => PeopleType::class,
            'allow_delete' => true,
        ));

        $builder->add('save',SubmitType::class, array('label' => 'Save movie', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom:15px')));
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Combined'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_combined';
    }


}
