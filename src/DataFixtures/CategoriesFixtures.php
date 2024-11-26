<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\Mapping\Cache;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{
    private $counter = 1;

    public function __construct(private SluggerInterface $slugger)
    {
        
    }

    public function load(ObjectManager $manager): void
    {
        $parent = $this->createCategories('Informatique', null, $manager);
        $this->createCategories('Ordinateur portables', $parent, $manager);
        $this->createCategories('Ecrans', $parent, $manager);
        $this->createCategories('Souris', $parent, $manager);

        $parent = $this->createCategories('Mode', null, $manager);
        $this->createCategories('Homme', $parent, $manager);
        $this->createCategories('Femme', $parent, $manager);
        $this->createCategories('Enfant', $parent, $manager);

        $manager->flush();
    }

    public function createCategories(string $name, Categories $parent = null, ObjectManager $manager)
    {
        $category = new Categories();
        $category->setName($name);
        $category->setSlug($this->slugger->slug($category->getName())->lower());
        $category->setParent($parent);
        $manager->persist($category);

        $this->addReference('cat-'.$this->counter, $category);
        $this->counter++;

        return $category;
    }
}
