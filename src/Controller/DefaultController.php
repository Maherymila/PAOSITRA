<?php
    namespace App\Controller;
    use Symfony\Component\HttpFoundation\Response;

    use Symfony\Component\Routing\Annotation\Route;

    use symfony\Component\HttpFoundation\Request;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    class DefaultController extends AbstractController
    {
     /**
     * @Route("/home", name="app_homepage")
     */
        public function homepage()
        {
            return $this->render('question/homepage.html.twig');
        }

         /**
      * @Route("/questions/new", name="blog_create")
      */

      public function create()
      {
          
          return  $this->render('question/form.html.twig');
      }

      /**
      * @Route("/questions/{slug}", name="app_question_show")
      */
        public function show($slug)
        {
            $answers = ['Hello world','ça va?','troisieme ligne'];

            dump($this);

            return $this->render('question/show.html.twig', [
                'question' => ucwords(str_replace('-', ' ', $slug)),
                'answers' => $answers
            ]);
        }

    }