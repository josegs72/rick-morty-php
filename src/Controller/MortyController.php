<?php

namespace App\Controller;

use App\Entity\Episodios;
use App\Entity\Personaje;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Form\PersonajeType;
use App\Manager\PersonajeManager;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class MortyController extends AbstractController
{

   #[Route('/personaje/{id}', name: 'showCard')]
   public function showPerson(EntityManagerInterface $doctrine, $id)
   {
      $repositorio = $doctrine->getRepository(Personaje::class);
      $personaje = $repositorio->find($id);
      return $this->render('personajes/showCard.html.twig', ['personaje' => $personaje]);
   }

   #[Route('/personajes', name: 'listPersonajes')]
   public function listPersonajes(EntityManagerInterface $doctrine)
   {
      $repositorio = $doctrine->getRepository(Personaje::class);
      $personajes = $repositorio->findAll();
      return $this->render('personajes/listPersonajes.html.twig', ['personajes' => $personajes]);
   }

   #[Route('/new/personaje')]
   public function newPersonajes(EntityManagerInterface $doctrine)
   {
      $personaje1 = new Personaje();
      $personaje1->setNombre('Rick Sanchez');
      $personaje1->setStatus('Vivo');
      $personaje1->setGender('hombre');
      $personaje1->setImage('https://rickandmortyapi.com/api/character/avatar/1.jpeg');

      $personaje1->setSpecies('Human');


      $personaje2 = new Personaje();
      $personaje2->setNombre('Morty Smith');
      $personaje2->setStatus('Vivo');
      $personaje2->setGender('hombre');
      $personaje2->setImage('https://rickandmortyapi.com/api/character/avatar/2.jpeg');

      $personaje2->setSpecies('Human');

      $personaje3 = new Personaje();
      $personaje3->setNombre('Summer Smith');
      $personaje3->setStatus('Vivo');
      $personaje3->setGender('mujer');
      $personaje3->setImage('https://rickandmortyapi.com/api/character/avatar/3.jpeg');
      $personaje3->setSpecies('Human');

      $personaje4 = new Personaje();
      $personaje4->setNombre('Beth Smith');
      $personaje4->setStatus('Vivo');
      $personaje4->setGender('mujer');
      $personaje4->setImage('https://rickandmortyapi.com/api/character/avatar/4.jpeg');
      $personaje4->setSpecies('Human');

      $personaje5 = new Personaje();
      $personaje5->setNombre('Jerry Smith');
      $personaje5->setStatus('Vivo');
      $personaje5->setGender('hombre');
      $personaje5->setImage('https://rickandmortyapi.com/api/character/avatar/5.jpeg');
      $personaje5->setSpecies('Human');

      $personaje6 = new Personaje();
      $personaje6->setNombre('Abadango Cluster Princess');
      $personaje6->setStatus('Vivo');
      $personaje6->setGender('mujer');
      $personaje6->setImage('https://rickandmortyapi.com/api/character/avatar/6.jpeg');
      $personaje6->setSpecies('Alien');

      $personaje7 = new Personaje();
      $personaje7->setNombre('Abradolf Lincler');
      $personaje7->setStatus('Vivo');
      $personaje7->setGender('hombre');
      $personaje7->setImage('https://rickandmortyapi.com/api/character/avatar/7.jpeg');
      $personaje7->setSpecies('Alien');

      $personaje8 = new Personaje();
      $personaje8->setNombre('Adjudicator Rick');
      $personaje8->setStatus('Vivo');
      $personaje8->setGender('hombre');
      $personaje8->setImage('https://rickandmortyapi.com/api/character/avatar/8.jpeg');
      $personaje8->setSpecies('Humanoid');

      $personaje9 = new Personaje();
      $personaje9->setNombre('Agency Director');
      $personaje9->setStatus('Vivo');
      $personaje9->setGender('hombre');
      $personaje9->setImage('https://rickandmortyapi.com/api/character/avatar/9.jpeg');
      $personaje9->setSpecies('Humanoid');

      $personaje10 = new Personaje();
      $personaje10->setNombre('Alan Rails');
      $personaje10->setStatus('Vivo');
      $personaje10->setGender('hombre');
      $personaje10->setImage('https://rickandmortyapi.com/api/character/avatar/10.jpeg');
      $personaje10->setSpecies('Human');



      $episodio1 = new Episodios();
      $episodio1->setEpisodio('Temporada1');

      $episodio2 = new Episodios();
      $episodio2->setEpisodio('Temporada2');

      $episodio3 = new Episodios();
      $episodio3->setEpisodio('Temporada3');

      $personaje1->addEpisodio($episodio1);
      $personaje1->addEpisodio($episodio2);
      $personaje2->addEpisodio($episodio3);
      $personaje3->addEpisodio($episodio1);
      $personaje4->addEpisodio($episodio2);
      $personaje5->addEpisodio($episodio3);
      $personaje6->addEpisodio($episodio1);
      $personaje7->addEpisodio($episodio2);
      $personaje8->addEpisodio($episodio3);
      $personaje9->addEpisodio($episodio1);
      $personaje10->addEpisodio($episodio2);





      $doctrine->persist($personaje1);
      $doctrine->persist($personaje2);
      $doctrine->persist($personaje3);
      $doctrine->persist($personaje4);
      $doctrine->persist($personaje5);
      $doctrine->persist($personaje6);
      $doctrine->persist($personaje7);
      $doctrine->persist($personaje8);
      $doctrine->persist($personaje9);
      $doctrine->persist($personaje10);


      $doctrine->persist($episodio1);
      $doctrine->persist($episodio2);
      $doctrine->persist($episodio3);


      $doctrine->flush();
      return new Response('Todos Personajes creados');
   }

   #[Route('/insert/personaje', name: 'insertPersonaje')]
   public function insertPersonaje(Request $request, EntityManagerInterface $doctrine, PersonajeManager $manager) {
      $form = $this->createForm(PersonajeType::class);
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
         $personaje = $form->getData();
         $personajeImage =$form->get('imagenPersonaje') ->getData();
         if ($personajeImage){
            $personImage = $manager -> load($personajeImage, $this->getParameter('kernel.project_dir').'/public/asset/image');
            $personaje -> setImage('/asset/image/'.$personImage);
         }
         $doctrine->persist($personaje);
         $doctrine->flush();
         $this->addFlash('success', 'Personaje creado correctamente');
         return $this->redirectToRoute('listPersonajes');
      }

      return $this->renderForm('personajes/createPersonajes.html.twig', [
         'personajeForm' => $form
      ]);
   }

   #[Route('/edit/personaje/{id}', name: 'editPersonaje')]
   public function editPersonaje(Request $request, EntityManagerInterface $doctrine, $id)
   {
      $repositorio = $doctrine->getRepository(Personaje::class);
      $personaje = $repositorio->find($id);

      $form = $this->createForm(PersonajeType::class, $personaje);
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
         $personaje = $form->getData();
         $doctrine->persist($personaje);
         $doctrine->flush();
         $this->addFlash('success', 'Personaje creado correctamente');
         return $this->redirectToRoute('listPersonajes');
      }
      return $this->renderForm('personajes/createPersonajes.html.twig', [
         'personajeForm' => $form
      ]);
   }
   #[IsGranted('ROLE_ADMIN')]
   #[Route('/delete/personaje/{id}', name: 'deletePersonaje')]
   public function deletePersonaje(EntityManagerInterface $doctrine, $id)
   {
      $repositorio = $doctrine->getRepository(Personaje::class);
      $personaje = $repositorio->find($id);
      $doctrine -> remove($personaje);
      $doctrine -> flush();
      $this->addFlash('success', 'Personaje eliminado correctamente');
      return $this->redirectToRoute('listPersonajes');
   }
}
