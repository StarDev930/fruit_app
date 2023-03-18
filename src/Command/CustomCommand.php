<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use App\Entity\Fruits;
use App\Repository\FruitsRepository;
use Doctrine\ORM\EntityManagerInterface;

class CustomCommand extends Command
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        parent::__construct();
    }
    protected function configure(): void
    {
        $this->setName('import-fruits')
            ->setDescription('Run this command to import all the fruits from fruityvice.')
            ->setHelp('Run this command to import all the fruits from fruityvice.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Importing fruits from fruityvice.com ... ');
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://fruityvice.com/api/fruit/all',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response,true);
        
        for ($i=0; $i < count($response); $i++) { 
            $single = $response[$i];
            $name = $single['name'];
            $family = $single['family'];
            $orders = $single['order'];
            $genus = $single['genus'];
            $carbohydrates = $single['nutritions']['carbohydrates'];
            $protein = $single['nutritions']['protein'];
            $fat = $single['nutritions']['fat'];
            $calories = $single['nutritions']['calories'];
            $sugar = $single['nutritions']['sugar'];
            // insert to db
            $fruits = new Fruits();
            $fruits->setName($name);
            $fruits->setFamily($family);
            $fruits->setOrders($orders);
            $fruits->setGenus($genus);
            $fruits->setCarbohydrates($carbohydrates);
            $fruits->setProtein($protein);
            $fruits->setFat($fat);
            $fruits->setCalories($calories);
            $fruits->setSugar($sugar);
            // FruitsRepository::add($fruits, true);
            $this->entityManager->persist($fruits);
            $this->entityManager->flush();
        }
        
        $output->writeln('All fruits are imported from fruityvice.com to our db');

        return Command::SUCCESS;
    }
}