<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    // const SEASONS = [
    //     [
    //         'refprogram' => 'program_4',
    //         'number' => '1',
    //         'year' => '2019',
    //         'description' => 'La première saison de Demon Slayer: Kimetsu no Yaiba, une série d\'animation japonaise pour la télévision et la vidéo à la demande, basée sur la série de mangas du même nom.',
    //     ],
    //     [
    //         'refprogram' => 'program_4',
    //         'number' => '2',
    //         'year' => '2021',
    //         'description' => 'La deuxième saison de Demon Slayer: Kimetsu no Yaiba, officiellement nommée Demon Slayer: Kimetsu no Yaiba – Yūkaku-hen, une série d\'animation japonaise pour la télévision et la vidéo à la demande, basée sur la série de mangas du même nom.',
    //     ],
    //     [
    //         'refprogram' => 'program_4',
    //         'number' => '3',
    //         'year' => '2023',
    //         'description' => 'Demon Slayer: Kimetsu no Yaiba est une série animée japonaise basée sur la série manga du même titre, écrite et illustrée par Koyoharu Gotouge. À la fin de la finale de la deuxième saison, une troisième saison couvrant l\'arc "Swordsmith Village" du manga a été annoncée.',
    //     ],
    //     [
    //         'refprogram' => 'program_0',
    //         'number' => '1',
    //         'year' => '2021',
    //         'description' => 'Souffrance, regrets, humiliations… les sentiments négatifs que ressentent les humains se transforment peu à peu en fléaux se cachant dans notre existence. Sévissant dans le monde entier, ils sont capables d\'entraîner les gens dans de terribles malheurs et, parfois même, jusqu\'à la mort. De plus, ces créatures ne peuvent être exorcisées que par un autre fléau.',
    //     ],
    //     [
    //         'refprogram' => 'program_0',
    //         'number' => '2',
    //         'year' => '2023',
    //         'description' => 'Après leur victoire contre de terribles fléaux de classe S, Yuji Itadori, Megumi Fushiguro et Nobara Kugisaki sont chargé par leur professeur d\'enquêter sur une possible taupe qui travaillerait en étroite collaboration avec un maître des fléaux.',
    //     ],

    // ];

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 25; $i++) {
            $season = new Season();
            $season->setNumber($faker->numberBetween(1, 5));
            $season->setYear($faker->numberBetween(1995, 2025));
            $season->setDescription($faker->paragraphs(3, true));
            $season->setProgram($this->getReference('program_' . $faker->numberBetween(0, 4)));
            $manager->persist($season);
            $this->addReference('season_' . $i, $season);
        }
        $manager->flush();

        // foreach (self::SEASONS as $key => $seasonNumber) {
        //     $season = new Season();
        //     $season->setNumber($seasonNumber['number']);
        //     $season->setYear($seasonNumber['year']);
        //     $season->setDescription($seasonNumber['description']);
        //     $season->setProgram($this->getReference($seasonNumber['refprogram']));
        //     $manager->persist($season);
        //     $this->addReference('season_' . $key, $season);
        // }
        // $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProgramFixtures::class,
        ];
    }
}
