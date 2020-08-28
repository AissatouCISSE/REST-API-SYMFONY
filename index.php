<?php

require_once '/path/to/Faker/src/autoload.php';
 $faker = Factory::create();
$em = $entityManager; */
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
 
/* for ($i = 0; $i < 50; $i++) {

    $compte = new Compte();

    $compte->setNumcompte('N001' . str_shuffle(date('YmdHim')));
    $compte->setNumagence('N100' . str_shuffle(date('Ymd')));
    $compte->setSolde((int)$faker->numberBetween(150000, 1500000));
    $compte->setClerib((int)$faker->numberBetween(1, 97));
    $compte->setClient($em->getRepository('Client')->find((int)$faker->numberBetween(1, 10)));

    $em->persist($compte);
    $em->flush();
    echo $compte->getId();
    echo("<br>");
} */
/* for ($i = 0; $i < 100; $i++) {

    $operation = new Operation();

    $operation->setMontant($faker->numberBetween(1000, 20000));
    $operation->setDate($faker->date());

    $operation->setTypeOperation($em->getRepository("Typeoperation")->find($faker->numberBetween(1, 2)));
    $operation->setCompte($em->getRepository("Compte")->find($faker->numberBetween(3, 52)));



    $em->persist($operation);
    $em->flush();
} */