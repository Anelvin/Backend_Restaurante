<?php

    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\JsonResponse;

        /**
         * @Route("/api")
         */

    class ApiController
    {
        /**
         * @Route("/almacenes", name="listarAlmacenes", methods={"GET"})
         */
        public function listarAlmacenes()
        {
            return new JsonResponse(['data'=>'1234']);
        }
      
    }
?>