<?php
    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;

    use Symfony\Component\Routing\Annotation\Route;
    class DefaultController
    {
     /**
     * @Route("/")
     */
        public function homepage()
        {
            return new Response('Bienvenue Elyna');
        }
      /**
      * @Route("/questions/{slug}")
      */
        public function show($slug)
        {
            return new Response(sprintf(
                'My first page "%s"!',
                $slug
            ));
        }
    }