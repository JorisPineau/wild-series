<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    const PROGRAMS = [
        [
            'title' => 'Jujutsu Kaisen',
            'synopsis' => 'Lorsqu\'il était enfant, Yuta Okkotsu a vu son amie Rika Orimoto perdre la vie dans un terrible accident. Depuis, Rika vient hanter Yuta qui a même souhaité sa propre mort après avoir souffert des années de cette malédiction. ',
            'category' => 'category_Animation',
        ],
        [
            'title' => 'La casa de papel',
            'synopsis' => 'Huit voleurs font une prise d\'otages dans la Maison royale de la Monnaie d\'Espagne, tandis qu\'un génie du crime manipule la police pour mettre son plan à exécution.',
            'category' => 'category_Action',
        ],
        [
            'title' => 'Walking dead',
            'synopsis' => 'Des zombies envahissent la terre',
            'category' => 'category_Horreur',
        ],
        [
            'title' => 'Vikings',
            'synopsis' => 'Scandinavie, à la fin du 8ème siècle. Ragnar Lodbrok, un jeune guerrier viking, est avide d\'aventures et de nouvelles conquêtes. Lassé des pillages sur les terres de l\'Est, il se met en tête d\'explorer l\'Ouest par la mer.',
            'category' => 'category_Action',
        ],
        [
            'title' => 'Demon slayer',
            'synopsis' => 'L\'histoire suit le périple de Kamado Tanjirō qui cherche un moyen de rendre sa petite sœur Nezuko de nouveau humaine après sa transformation en démon.',
            'category' => 'category_Animation',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::PROGRAMS as $key => $programItem) {
            $program = new Program();
            $program->setTitle($programItem['title']);
            $program->setSynopsis($programItem['synopsis']);
            $program->setCategory($this->getReference($programItem['category']));
            $manager->persist($program);
            $this->addReference('program_' . $key, $program);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            CategoryFixtures::class,
        ];
    }
}
