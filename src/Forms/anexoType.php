<?php
namespace App\Forms;
use App\Entity\Anexos;
use App\Repository\AnexosRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\File;
use function Sodium\add;

class anexoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){

        $fecha = $options['fecha'];
        $hora = $options['hora'];

        $builder
            ->add('fecha', DateType::class,array('data' => $fecha, 'html5'=>true,'widget'=>'single_text'))
            ->add('hora', TimeType::class, array('data' => $hora, 'html5'=>true, 'widget' => 'single_text',))

            ->add('anexo1', FileType::class, [
                'mapped' => false,
                'label' => 'archivo',
                'required' => 'false',
                'constraints' => [
                    new File([
                        'mimeTypes' => [
                            'application/pdf', 
                            'application/x-pdf',
                            'image/png',
                            'image/jpg',
                            'image/svg+xml' 
                        ],
                        'mimeTypesMessage' => 'Archivo no admitido'
                    ])
                ]            
            ])

            ->add('anexo2', FileType::class, array( 'required' => false))
            ->add('anexo3', FileType::class, array( 'required' => false));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Anexos::class,           
            'fecha' => null,
            'hora' => null,
            
        ]);
    }
}