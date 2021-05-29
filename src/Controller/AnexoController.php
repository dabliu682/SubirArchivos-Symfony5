<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Anexos;
use App\Forms\anexoType;
use Symfony\Component\HttpFoundation\Request;

class AnexoController extends AbstractController
{  
    public function listar()
    {
        $bd = $this->getDoctrine()->getManager();
        
        $reqs = $bd->getRepository(Anexos::class)->findAll();

            
       return $this->render('Anexos/anexos.html.twig', array('reqs' => $reqs));
    }
    
    public function registro()
    {
        $anexo = new Anexos();

        $fecha = new \DateTime();

        date_default_timezone_set("America/Bogota");
        $hora = new \DateTime();
       
        $FORMA=$this->createForm(anexoType::class, $anexo, array('fecha' => $fecha, 'hora' => $hora,'method'=>'POST', 'action'=>$this->generateUrl('anexos_actionRegistrar')) );

        return $this->render('Anexos/registroAnexos.html.twig', array('fecha' => $fecha, 'hora' => $hora, 'form'=>$FORMA->createView()));
    }

    public function actionRegistroAnexo (Request $request)
    {        
        $anexo = new Anexos();        
        $fecha = new \DateTime();

        date_default_timezone_set("America/Bogota");
        $hora =  new \DateTime();
        

        $FORMA=$this->createForm(anexoType::class, $anexo, array('fecha' => $fecha, 'hora' => $hora, 'method'=>'POST', 'action'=>$this->generateUrl('anexos_actionRegistrar')));

        $FORMA->handleRequest($request);

        try
        {
            if ($FORMA->isSubmitted() && $FORMA->isValid())
            {
                
                $em = $this->getDoctrine()->getManager();


                if(!empty($FORMA['anexo1']->getData()))
                {
                    $anexo1 = $FORMA['anexo1']->getData();
                    $anexo->setAnexo1(base64_encode(file_get_contents($anexo1)));
                    $anexo->setExt1($anexo1->guessExtension());
                }

                if(!empty($FORMA['anexo2']->getData()))
                {
                    $anexo2 = $FORMA['anexo2']->getData();
                    $anexo->setAnexo2(base64_encode(file_get_contents($anexo2)));
                    $anexo->setExt2($anexo2->guessExtension());
                }

                if(!empty($FORMA['anexo3']->getData()))
                {
                    $anexo3 = $FORMA['anexo3']->getData();
                    $anexo->setAnexo3(base64_encode(file_get_contents($anexo3)));
                    $anexo->setExt3($anexo3->guessExtension());
                }

                $em->persist($anexo);
                $em->flush();                   

                $this->addFlash('mensaje', 'Requerimiento registrado correctamente');

                return $this->redirectToRoute('anexos_listar');

            }
        }
        catch (\Exception $e) {

            $this->addFlash('mensaje', $e);

            return $this->render('Anexos/registroAnexos.html.twig', array('fecha' => $fecha, 'hora' => $hora, 'form'=>$FORMA->createView()));

        }
    
    }
}
