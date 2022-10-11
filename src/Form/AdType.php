<?php
 
namespace App\Form;

use App\Entity\Ad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AdType extends AbstractType
{
    /**
     * permet la configuration de base d'un champ
     *
     * @param string $label
     * @param string $placeholder
     * @return array
     */
    private function getConfiguration($label, $placeholder){
       return [
        'label' => $label,
        'attr'  => [
            'placeholder' => $placeholder
        ]
        ];
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('tittle', TextType::class, $this -> getConfiguration("Titre","Tapez un super titre pour 
            votre annonce "))
            ->add('slug', TextType::class, $this -> getConfiguration("Adresse web","Votre adresse web"))
            ->add('coverImage', UrlType::class, $this -> getConfiguration("Url de l'image rincipale","Adresse de l'image"))
            ->add('introduction', TextType::class, $this -> getConfiguration("intro","Intro global"))
            ->add('content', TextareaType::class, $this -> getConfiguration("details","votre description"))
            ->add('rooms', IntegerType::class, $this -> getConfiguration("nombres de chambres","nombres de chambres dispo"))
            ->add('price', MoneyType::class, $this -> getConfiguration("tarif par nuit","Le prix que vous voulez pour une nuit"))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}
