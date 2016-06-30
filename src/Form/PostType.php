<?php
namespace Application\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Application\Helpers\CustomConstraintValidator as CustomAssert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, array(
                'required' => true,
                'constraints' => array( new Assert\Regex(array(
                    'pattern'=>"/\d/",
                    'match'=>false,
                    'message'=>"Name cannot contain numbers")))))
            ->add('lastName', TextType::class, array(
                'required' => false,
                'constraints' => array( new Assert\Regex(array(
                    'pattern'=>"/\d/",
                    'match'=>false,
                    'message'=>"Last name cannot contain numbers")))))
            ->add('email', TextType::class, array(
                'required' => true,
                'constraints' => array(new Assert\Email())))
            ->add('phoneNumber', TextType::class, array(
                'required' => false,
                'constraints' => array( new Assert\Regex(array(
                    'pattern'=>"/\+?[0-9]+\s+(?=\d)/",
                    'match'=>true,
                    'message'=>"Invalid phone number")))))
            ->add('comment', TextareaType::class, array(
                'required' => false,
                'constraints' => array( new Assert\Length(array('max' => 50)))));
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Application\Entity\Post',
        ));
    }

    public function getName()
    {
        return 'postform';
    }
}
