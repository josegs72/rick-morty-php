<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MortyController extends AbstractController{

    #[Route('/personaje' , name : 'showCard')]
   public function showCard(){

 $personaje = [
    'nombre' => 'Rick Sanchez',
    'edad' => 70,
    'planeta' => 'Tierra',
    'especie' => 'Humano',
    'profesion' => 'Cientifico',
    'estado' => 'Vivo',
    'imagen' => 'https://rickandmortyapi.com/api/character/avatar/1.jpeg',
    'codigo' => 'S01E01'
 ];

    return $this->render('personajes/showCard.html.twig', ['personaje' => $personaje]);
    }
    #[Route('/personajes', name: 'listPersonajes')]
    public function listPersonajes(){
      $personajes = [
         [
            'nombre' => 'Rick Sanchez',
            'edad' => 70,
            'planeta' => 'Tierra',
            'especie' => 'Humano',
            'profesion' => 'Cientifico',
            'estado' => 'Vivo',
            'imagen' => 'https://rickandmortyapi.com/api/character/avatar/1.jpeg',
            'codigo' => 'S01E01'
         ],
         [
            'nombre' => 'Morty Smith',
            'edad' => 14,
            'planeta' => 'Tierra',
            'especie' => 'Humano',
            'profesion' => 'Estudiante',
            'estado' => 'Vivo',
            'imagen' => 'https://rickandmortyapi.com/api/character/avatar/2.jpeg',
            'codigo' => 'S01E01'
         ],
         [
            'nombre' => 'Summer Smith',
            'edad' => 17,
            'planeta' => 'Tierra',
            'especie' => 'Humano',
            'profesion' => 'Estudiante',
            'estado' => 'Vivo',
            'imagen' => 'https://rickandmortyapi.com/api/character/avatar/3.jpeg',
            'codigo' => 'S01E01'
         ],
         [
            'nombre' => 'Beth Smith',
            'edad' => 38,
            'planeta' => 'Tierra',
            'especie' => 'Humano',
            'profesion' => 'Cientifica',
            'estado' => 'Vivo',
            'imagen' => 'https://rickandmortyapi.com/api/character/avatar/4.jpeg',
            'codigo' => 'S01E01'
         ],
         [
            'nombre' => 'Jerry Smith',
            'edad' => 40,
            'planeta' => 'Tierra',
            'especie' => 'Humano',
            'profesion' => 'Cientifico',
            'estado' => 'Vivo',
            'imagen' => 'https://rickandmortyapi.com/api/character/avatar/5.jpeg',
            'codigo' => 'S01E01'
         ],
         [
            'nombre' => 'Abadango Cluster Princess',
            'edad' => 1000000,
            'planeta' => 'Abadango',
            'especie' => 'Alien',
            'profesion' => 'Reina',
            'estado' => 'Vivo',
            'imagen' => 'https://rickandmortyapi.com/api/character/avatar/6.jpeg',
            'codigo' => 'S01E01'
         ],
         [
            'nombre' => 'Abradolf Lincler',
            'edad' => 70,        
            'planeta' => 'Tierra',
            'especie' => 'Humano',
            'profesion' => 'Cientifico',
            'estado' => 'Vivo',
            'imagen' => 'https://rickandmortyapi.com/api/character/avatar/7.jpeg',
            'codigo' => 'S01E01'
         ],

      ];
      return $this->render('personajes/listPersonajes.html.twig', ['personajes' => $personajes]);
    }
    
}