<?php
    namespace App\Controller;

    use App\Entity\Restaurantes;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Doctrine\Bundle\DoctrineBundle\Registry;
    
    /**
     * @Route ("/restaurantes")
     */
    class RestaurantesController extends AbstractController{

        /**
         * @Route ("/", name="lista_restaurantes")
         */
        public function listarRestaurantes(){
            $restaurantes=$this->getDoctrine()->getRepository(Restaurantes::class)
            ->findRestaurantes();
            return new JsonResponse($restaurantes);
        }
    }
?>