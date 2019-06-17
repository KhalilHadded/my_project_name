<?php

namespace AppBundle\Form;

//use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PatientType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, ['required'=> true,'attr' => ['maxlength' => 15]])
            ->add('prenom', TextType::class, ['required'=> true,'attr' => ['maxlength' => 15]])
            ->add('maladie',TextType::class, ['required'=> true,'attr' => ['maxlength' => 30]])
            ->add('description', TextType::class, ['required'=> true,'attr' => ['maxlength' => 150]])
            ->add('dateNaissance', DateType::class, ['widget' => 'single_text'])
            ->add('cin',TextType::class, ['required'=> true,'attr' => ['maxlength' => 8]]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Patient'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_patient';
    }


}
