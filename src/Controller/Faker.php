<?php

namespace App\Controller;
use App\Entity\Client;
use App\Entity\Compte;
use App\Entity\Operation;
use App\Entity\Typeoperation;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Faker\Factory;
class Faker extends AbstractController
{
    /**
     * @Route("/client", name="listeclient")
     */
     
    
    public function index()
    {
        $faker = Factory::create();
    $em = $this->getDoctrine()->getManager(); 
        for ($i=0; $i < 10; $i++) { 
       
           $client = new Client();
       
           $client->setPrenom($faker->firstNameMale);
           $client->setNom($faker->lastName);
           $client->setAdresse($faker->address);
           $client->setEmail($faker->email);
           $client->setTelephone($faker->e164PhoneNumber);
           // var_dump($client->getPrenom());
           // echo("<br>");
           $em->persist($client);
           $em->flush();
           echo $client->getId();
           echo("<br>");
       } 
       return new Response();
    }
    /**
     * @Route("/compte", name="insertcompte")
     */
     
    public function insertcompte()
    {

        $faker = Factory::create();
    $em = $this->getDoctrine()->getManager(); 
        for ($i = 0; $i < 50; $i++) {

            $compte = new Compte();
        
            $compte->setNumcompte('N001' . str_shuffle(date('YmdHim')));
            $compte->setNumagence('N100' . str_shuffle(date('Ymd')));
            $compte->setSolde((int)$faker->numberBetween(150000, 1500000));
            $compte->setClerib((int)$faker->numberBetween(1, 97));
            $compte->setClient($em->getRepository(Client::class)->find((int)$faker->numberBetween(1, 10)));
        
            $em->persist($compte);
            $em->flush();
            echo $compte->getId();
            echo("<br>");
        } 
        return new Response();
    }

    /**
     * @Route("/operation", name="insertoperation")
     */
     
     public function insertoperation()
     {
 
         $faker = Factory::create();
     $em = $this->getDoctrine()->getManager(); 
     for ($i = 0; $i < 100; $i++) {

        $operation = new Operation();
    
        $operation->setMontant($faker->numberBetween(1000, 20000));
        $operation->setDate($faker->date());
    
        $operation->setTypeOperation($em->getRepository(Typeoperation::class)->find($faker->numberBetween(1, 2)));
        $operation->setCompte($em->getRepository(Compte::class)->find($faker->numberBetween(3, 52)));
    
    
    
        $em->persist($operation);
        $em->flush();
    } 
         return new Response();
     }

   
}
