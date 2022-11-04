<?php

namespace App\DataFixtures;

use App\Entity\Prix;
use App\Entity\User;
use App\Entity\Partner;
use App\Entity\Products;
use App\Entity\Categories;
use App\Entity\Quantities;
use App\Service\ProductSlugger;
use App\Entity\HistoricMovement;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    protected $slugger;
    protected $manager;

    public function __construct(ProductSlugger $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        $users = [];
        $usersList = $this->user();

        foreach($usersList AS $u) {
            $user = new User();
            $user->setEmail($u['email']);
            $user->setFirstname($u['firstname']);
            $user->setLastname($u['lastname']);
            $user->setRoles([$u['roles']]);
            $user->setPassword('Abcd1234!');

            $manager->persist($user);
            $users[] = $user;
        }
       // dump($users);
        $categoriesList = $this->categories();
        $categories = [];

        for($i = 0; $i < count($categoriesList); $i ++) {
            $category = new Categories();
            $category->setName($categoriesList[$i]);
            $manager->persist($category);
            $categories[] = $category;
            
            $historic = new HistoricMovement();
            $historic->setUser($users[0]);
            $historic->setCategory($category);
            $historic->setName('Création');
            $historic->setCreatedAt(new \DateTimeImmutable());
            $manager->persist($historic);
        }

        $quantitiesList = $this->quantities();
        $quantities = [];

        for($i = 0; $i < count($quantitiesList); $i ++){
            $quantity = new Quantities();
            $quantity->setQuantity($quantitiesList[$i]);
            $manager->persist($quantity);
            $quantities[] = $quantity;
        }

        $productsList = $this->products();

        foreach($productsList AS $products) {
            $product = new Products();
            $product->setCategorie($categories[$products['category']]);
            $product->setName($products['name']);
            $product->setSlug($this->slugger->slugify($products['name']));
            $product->setSubtitle($products['subtitle']);
            $product->setDescription($products['description']);
            $product->setContent($products['content']);
            $product->setImage($products['image']);
            $product->setDegre($products['degre']);
            $product->setNote($products['note']);
            $product->setCreatedAt(new \DateTimeImmutable());

            $manager->persist($product);

            $historic = new HistoricMovement();
            $historic->setUser($users[0]);
            $historic->setProduct($product);
            $historic->setName('Création');
            $historic->setCreatedAt(new \DateTimeImmutable());
            $manager->persist($historic);

            for($i = 0; $i < count($quantities); $i ++) {
                $price = new Prix();
                $price->setQuantity($quantities[$i]);
                $price->setProduct($product);
                $price->setPrix('');
                $manager->persist($price);
            }
        }

        $partnersList =$this->partner();
       
       foreach($partnersList AS $p) {
            $partner = new Partner();
            $partner->setName($p['name']);
            $partner->setAdress($p['adresse']);
            $partner->setDescription($p['description']);
            $partner->setCreatedAt(new \DateTimeImmutable());
            $partner->setPhone($p['tel']);
            $partner->setUrl($p['site']);
            $partner->setActive(($p['active']));

            $manager->persist($partner);

            $historic = new HistoricMovement();
            $historic->setName('Création');
            $historic->setCreatedAt(new \DateTimeImmutable());
            $historic->setPartner($partner);
            $historic->setUser($users[1]);

            $manager->persist($historic);
        }

        $manager->flush();
    }

    public function user()
    {
        $users = [
            1 => [
                "email" => "mathieusiaudeau@gmail.com",
                "firstname" => "Mathieu",
                "lastname" => "Siaudeau",
                "roles" => "ROLE_SUPADMIN",

            ],
            2 => [
                "email" => "contact@brasseriedifre.fr",
                "firstname" => "Brasserie",
                "lastname" => "Difré",
                "roles" => "ROLE_ADMIN"
            ]
        ];

        return $users;
    }

    public function categories()
    {
        $categories = [
            "Bière à l'année",
            "Bière temporaire",
            "Fut",
            "Goodies"
        ];

        return $categories;
    }

    public function products()
    {
        $products = [
            1 => [
                "category" => 0,
                "name" => "La béré",
                "subtitle" => "Contient du gluten. Ingrédients : eau, malts d'orge, houblons, levure.",
                "description" => "Une pale ale toute en rondeurs, maltée, avec des notes légèrement fleuries et fruitées, sa robe est blonde dorée, l’amertume est moyenne.",
                "content" => "En saintongeais, le patois poitevin du sud qui était parlé jusqu'à Chauvigny, la bére dau poetou raffraichit les gosiers.",
                "image" => "bere.jpg",
                "degre" => "5,3",
                "note" => 3,
            ]
            ];

            return $products;
    }

    public function quantities()
    {
        $quantities = [
                "Prix unique (goodies)",
                "33",
                "75",
                "Basique 5l",
                "Basique 15l",
                "Basique 30l",
                "Médium 5l",
                "Médium 15l",
                "Médium 30l",
                "Luxe 5l",
                "Luxe 15l",
                "Luxe 30l"
            
        ];

        return $quantities;
    }

    public function partner()
    {
        $partners= [
            1=> [
                "name" => "Le kiosque",
                "description" => null,
                "adresse" => "13 bis place de Trino, 86300 Chauvigny",
                "tel" => "05.49.13.64.49",
                "site" => "https://lekiosqueachauvigny.eatbu.com/?lang=fr",
                "active" => 1
            ],
            2 => [
                "name" => "La Belle Epoque",
                "description" => null,
                "adresse" => "1 rue Saint-Pierre, 86300 Chauvigny",
                "tel"=> "05.49.46.55.23",
                "site" => "http://www.la-belle-epoque.fr/",
                "active" => 1
            ]
            ];

            return $partners;
    }
 
}
