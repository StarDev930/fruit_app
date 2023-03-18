<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use App\Entity\Fruits;
use App\Entity\FavFruits;
use Doctrine\ORM\EntityManagerInterface;

class FruitController extends AbstractController
{
    public function list(EntityManagerInterface $em): Response
    {
        $repository = $em->getRepository(Fruits::class);
        $allFruits = $repository->findAllBy();
        return $this->render('fruits.html.twig',[ 'allFruits' => $allFruits, 'index' => 1]);
    }
    public function add(EntityManagerInterface $em,MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('faheem.fiaz@snexus.com')
            ->to('faheem.fiaz@snexus.com')
            ->priority(Email::PRIORITY_HIGH)
            ->subject('Successfully added a new Fruit')
            ->html('<p>Congratulations! you have successfully added a new Fruit</p>');

        $mailer->send($email);
        $name = $_POST['name'];
        $family = $_POST['family'];
        $orders = $_POST['order'];
        $genus = $_POST['genus'];
        $carbohydrates = $_POST['carbohydrates'];
        $protein = $_POST['protein'];
        $fat = $_POST['fat'];
        $calories = $_POST['calories'];
        $sugar = $_POST['sugar'];
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
        $em->persist($fruits);
        $em->flush();

        return $this->redirectToRoute('fruit_list');
    }
    public function addFavourite(EntityManagerInterface $em): Response
    {
        if(!isset($_GET['fruit_id'])){
            // its required
            return $this->redirectToRoute('fruit_list');
        }
        $fruit_id = $_GET['fruit_id'];
        $repository = $em->getRepository(FavFruits::class);
        $favFruits = $repository->findAll();
        if(count($favFruits) >= 10){
            // not more than 10
            return $this->redirectToRoute('fruit_list');
        }else{
            $repository = $em->getRepository(FavFruits::class);
            $favFruits = $repository->findOneBy(['fruit_id' => $fruit_id]);
            if(!$favFruits){
                $fruitsFav = new FavFruits();
                $fruitsFav->setFruitId($fruit_id);
                $em->persist($fruitsFav);
                $em->flush();
            }
        }
        return $this->redirectToRoute('fruit_list');
    }

    public function favFruitsList(EntityManagerInterface $em){
        $sql = "SELECT * FROM fav_fruits as ff JOIN fruits as f ON f.id = ff.fruit_id ";
        $stmt = $em->getConnection()->prepare($sql);
        $result = $stmt->executeQuery()->fetchAllAssociative();
        return $this->render('favFruit.html.twig',[ 'allFruits' => $result, 'index' => 1]);        
    }
}