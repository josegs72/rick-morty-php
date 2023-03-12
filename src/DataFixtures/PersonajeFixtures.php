<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Personaje;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use App\Entity\Episodios;

class PersonajeFixtures extends Fixture
{  
     protected $client;
    public function __construct(HttpClientInterface $client)
    {
      $this -> client = $client;
    }
    public function load(ObjectManager $manager)
    {
       $faker = Factory::create();
       
         for ($i=0; $i<100; $i++){
          $numPersonaje = $faker -> numberBetween(1,400);
          $response = $this->client->request(
              'GET',
              "https://rickandmortyapi.com/api/character/$numPersonaje/"
          );
          $contenido = $response->toArray();
          $personaje = new Personaje();
          $personaje->setNombre($contenido['name']);
          $personaje->setStatus($contenido['status']);
          $personaje->setImage("https://rickandmortyapi.com/api/character/avatar/$numPersonaje.jpeg");
          $personaje->setGender($contenido['gender']);
           $personaje->setSpecies($contenido['species']);

         

            $manager->persist($personaje);
        

          
         }



        $manager->flush();
    }
}