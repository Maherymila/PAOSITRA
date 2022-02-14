<?php
    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;

    use Symfony\Component\Routing\Annotation\Route;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    class DefaultController extends AbstractController
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
            $answers = ['Hello world','ça va?','troisieme ligne'];

            dump($slug,$this);

            return $this->render('question/show.html.twig', [
                'question' => ucwords(str_replace('-', ' ', $slug)),
                'answers' => $answers
            ]);
            

        }
    }