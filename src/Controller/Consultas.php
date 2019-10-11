<?php

    namespace App\Controller;
    use App\Entity\Producto;
    use App\Entity\Categoria;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Doctrine\Bundle\DoctrineBundle\Registry;

    class Consultas extends AbstractController
    {
        /**
         * @Route("/categorias", name="categorias")
         */
        public function categorias(Request $request)
        {
            $categorias = $this->getDoctrine()
            ->getRepository(Categoria::class)
            ->findCategorias();
            return new JsonResponse($categorias);
        }

    }
?>