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
use Symfony\Component\Validator\Constraints\File;
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
                'label' => 'Anexo1',
                'required' => false,
                'constraints' => [
                    new File([
                        'mimeTypes' => [
                            'image/*',
                            'application/pdf',
                            'application/msword',
                            'application/vnd.ms-excel',
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                            'text/plain'
                        ],
                        'mimeTypesMessage' => 'Archivo no admitido'
                    ])
                ]            
            ])

            ->add('anexo2', FileType::class, [
                'mapped' => false,
                'label' => 'Anexo2',
                'required' => false,
                'constraints' => [
                    new File([
                        'mimeTypes' => [
                            'image/*',
                            'application/pdf',
                            'application/msword',
                            'application/vnd.ms-excel',
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                            'text/plain'
                        ],
                        'mimeTypesMessage' => 'Archivo no admitido'
                    ])
                ]
            ])
            ->add('anexo3', FileType::class, [
                'mapped' => false,
                'label' => 'Anexo3',
                'required' => false,
                'constraints' => [
                    new File([
                        'mimeTypes' => [
                            'image/*',
                            'application/pdf',
                            'application/msword',
                            'application/vnd.ms-excel',
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                            'text/plain'
                        ],
                        'mimeTypesMessage' => 'Archivo no admitido'
                    ])
                ]
            ]);
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