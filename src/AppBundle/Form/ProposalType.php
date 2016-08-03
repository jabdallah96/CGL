<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProposalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //Need to add client, should I add the option to choose from existing? If so, how should I make it look alongside the create client form
            ->add('number', TextType::class)
            ->add('status', ChoiceType::class, array('choices' => ['Approved'=>0, 'Pending'=> 1, 'Rejected' => 2] , 'label' => 'Status: '))
            ->add('proposal_doc', FileType::class, array('label' => 'Proposal Document'))
            ->add('submit', SubmitType::class, array('label' => 'Submit'))
        ;

        parent::buildForm($builder,$options);

    }
}