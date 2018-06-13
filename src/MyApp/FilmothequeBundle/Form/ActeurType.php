<?php

namespace MyApp\FilmothequeBundle\Form;

use MyApp\FilmothequeBundle\Repository\FilmRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ActeurType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $pattern = '%';
        $builder
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('dateNaissance', BirthdayType::class)
            ->add('sexe', ChoiceType::class, [ 'choices' =>[
	            'F' => 'F',
	            'M' => 'M',
            ]])
	        ->add('image',     ImageType::class, ['required' => false])
	        ->add('films', EntityType::class, array(
		        'class'         => 'MyAppFilmothequeBundle:Film',
		        'choice_label'  => 'titre',
		        'multiple'      => true,
		        'query_builder' => function(FilmRepository $repository) use($pattern) {
			        return $repository->getLikeQueryBuilder($pattern);
		        }
	        ))
            ->add('ajouter', SubmitType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyApp\FilmothequeBundle\Entity\Acteur'
        ));
    }
}
