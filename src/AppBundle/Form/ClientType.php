<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //Need to add client, should I add the option to choose from existing? If so, how should I make it look alongside the create client form
            ->add('name', TextType::class)
            ->add('phone', NumberType::class)
            ->add('fax', NumberType::class, ['required' => false ])
            ->add('financeNumber', NumberType::class , ['required' => false ])
            ->add('contactPerson', TextType::class, ['required' => false ])
            ->add('mobile', NumberType::class, ['required' => false ])
            ->add('accContact', TextType::class, array('label' => 'Acc. Contact' , 'required' => false))
            ->add('submit', SubmitType::class, array('label' => 'Submit'))
        ;



        parent::buildForm($builder,$options);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Client',
        ]);
    }
}