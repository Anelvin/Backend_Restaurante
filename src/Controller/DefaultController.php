<?php

    namespace App\Controller;

    use App\Entity\Producto;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Doctrine\Bundle\DoctrineBundle\Registry;

    class DefaultController extends AbstractController
    {
        /**
         * @Route("/", name="homepage")
         */
        public function registrarProducto(Request $request)
        {
           $datos=$request->getContent();
            return new JsonResponse(['data'=>$datos]);
        }

     
        public function obtenerRegistro($id)
        {
            $producto=$this->getDoctrine()
            ->getRepository(Producto::class)
            ->find($id);
            if(!$producto){
                throw $this->createNotFoundException(
                    'No hay producto con este id-'.$id
                );
            }

            /*$response = new JsonResponse(['Nombre'=>$producto->getnombre(),'Desdripcion'=>$producto->getDescripcion(),'Categoria'=>$producto->getCategoria()]);
       $response->headers->set('Access-Control-Allow-Origin', '*');
       return $response;*/
            return new JsonResponse(['Nombre'=>$producto->getnombre(),'Desdripcion'=>$producto->getDescripcion(),'Categoria'=>$producto->getCategoria()]);
            //return new Response($producto->getNombre());
        }
    }
?>