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

    use Psr\Log\LoggerInterface;
    
        /**
        * @Route("/productos")
        */
    class Productos extends AbstractController
    {
        
        /**
        * @Route("/registrar", name="registro_producto")
        */
        public function registrarProducto(Request $request,LoggerInterface $logger)
        {
           // $request=new Request($_POST);
            $datos=json_decode($request->getContent(),true);
            $producto = new Producto();
            $producto->setNombre($datos['nombre']);
            $producto->setDescripcion($datos['descripcion']);
            $producto->setStock($datos['stock']);
            $producto->setImagen($datos['imagen']);
            $producto->setProveedor($datos['proveedor']);
            $em = $this->getDoctrine()->getManager();
            $categoria=$em->getRepository(Categoria::class)->find($datos['categoria']);
            $producto->setCategoria($categoria);

            $em->persist($producto);
            $em->flush();
            $logger->info("----PRODUCTO ID ----".$producto->getId().$datos['nombre'].$datos['descripcion'].$datos['stock'].$datos['imagen'].$datos['proveedor']);
            return new JsonResponse(['id'=>$producto->getId()]);
        }

        /**
        * @Route("/actualizar", name="actualizar_producto")
        */
        public function actualizarProducto(Request $request){
            $datos=json_decode($request->getContent(),true);
            $em= $this->getDoctrine()->getManager();
            $producto=$em->getRepository(Producto::class)
            ->find($datos['id']);
            $producto->setNombre($datos['nombre']);
            $producto->setDescripcion($datos['descripcion']);
            $producto->setStock($datos['stock']);
            $producto->setImagen($datos['imagen']);
            $producto->setProveedor($datos['proveedor']);
            $categoria=$em->getRepository(Categoria::class)->find($datos['categoria']);
            $producto->setCategoria($categoria);
            $em->persist($producto);
            $em->flush();
            return new JsonResponse(['Resultado'=>'Actualizado!']);
        }

         /**
        * @Route("/consultar", name="consultar")
        */
        public function consultaProductos(Request $request)
        {
           $productos=$this->getDoctrine()
           ->getRepository(Producto::class)
           ->findProductos();
         
           return new JsonResponse($productos);
            
        }

        /**
        * @Route("/consultarnombre/{nombre}", name="consultar_nombre")
        */
        public function consultaProductosNombre($nombre)
        {
           $respuesta=[];
           $producto=$this->getDoctrine()
           ->getRepository(Producto::class)
           ->findProductoByName($nombre);
           return new JsonResponse($producto);
        }

         /**
        * @Route("/consultar/{id}", name="consultar_id")
        */
        public function consultaProductosId($id)
        {
           $producto=$this->getDoctrine()
           ->getRepository(Producto::class)
           ->findProductoById($id);
           return new JsonResponse($producto[0]);
        }

        /**
        * @Route("/eliminar/{id}", name="eliminar_id")
        */
        public function eliminarProducto($id)
        {
           $producto=$this->getDoctrine()
           ->getRepository(Producto::class)
           ->remove($id);
           return new JsonResponse($producto);
        }
    }
?>