<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    // const EPISODES = [
    //     ['refseason' => 'season_0', 'title' => 'Cruauté', 'number' => '1', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Urokodaki Sakonji, le formateur', 'number' => '2', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Sabito et Makomo', 'number' => '3', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'La sélection finale', 'number' => '4', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Chacun son acier', 'number' => '5', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Le chasseur accompagné d\'un démon', 'number' => '6', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Kibutsuji Muzan', 'number' => '7', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Le parfum du sang d\'envoûtement', 'number' => '8', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Les démons aux ballons et aux flèches', 'number' => '9', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Nous resterons ensemble', 'number' => '10', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'La maison aux tambours', 'number' => '11', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Zen\'itsu dort, le sanglier montre les crocs', 'number' => '12', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Ce à quoi il tient plus qu\'à la vie', 'number' => '13', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Le blason des glycines', 'number' => '14', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Le mont Natagumo', 'number' => '15', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Faire passer les autres avant soi', 'number' => '16', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Parfaire une seule technique', 'number' => '17', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Des liens factices', 'number' => '18', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Le dieu du feu', 'number' => '19', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Une famille improvisée', 'number' => '20', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Violation du code', 'number' => '21', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Le maître', 'number' => '22', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'La réunion des piliers', 'number' => '23', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'L\'entraînement récupérateur', 'number' => '24', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Tsuyuri Kanao, la successeuse', 'number' => '25', 'synopsis' => '...',],
    //     ['refseason' => 'season_0', 'title' => 'Nouvelle mission', 'number' => '26', 'synopsis' => '...',],

    //     ['refseason' => 'season_1', 'title' => 'Rengoku Kyôjurô, le pilier de la flamme', 'number' => '1', 'synopsis' => '...',],
    //     ['refseason' => 'season_1', 'title' => 'Un sommeil profond', 'number' => '2', 'synopsis' => '...',],
    //     ['refseason' => 'season_1', 'title' => 'Si c’était réel', 'number' => '3', 'synopsis' => '...',],
    //     ['refseason' => 'season_1', 'title' => 'Affront', 'number' => '4', 'synopsis' => '...',],
    //     ['refseason' => 'season_1', 'title' => 'À l’avant du train', 'number' => '5', 'synopsis' => '...',],
    //     ['refseason' => 'season_1', 'title' => 'Akaza', 'number' => '6', 'synopsis' => '...',],
    //     ['refseason' => 'season_1', 'title' => 'Enflamme ton âme', 'number' => '7', 'synopsis' => '...',],
    //     ['refseason' => 'season_1', 'title' => 'Uzui Tengen, le pilier du son', 'number' => '8', 'synopsis' => '...',],
    //     ['refseason' => 'season_1', 'title' => 'Infiltration au quartier des plaisirs', 'number' => '9', 'synopsis' => '...',],
    //     ['refseason' => 'season_1', 'title' => 'Qui es-tu ?', 'number' => '10', 'synopsis' => '...',],
    //     ['refseason' => 'season_1', 'title' => 'Cette nuit', 'number' => '11', 'synopsis' => '...',],
    //     ['refseason' => 'season_1', 'title' => 'Combattre avec panache !', 'number' => '12', 'synopsis' => '...',],
    //     ['refseason' => 'season_1', 'title' => 'Des souvenirs accumulés', 'number' => '13', 'synopsis' => '...',],
    //     ['refseason' => 'season_1', 'title' => 'Métamorphose', 'number' => '14', 'synopsis' => '...',],
    //     ['refseason' => 'season_1', 'title' => 'Union', 'number' => '15', 'synopsis' => '...',],
    //     ['refseason' => 'season_1', 'title' => 'Après avoir abattu une lune supérieure', 'number' => '16', 'synopsis' => '...',],
    //     ['refseason' => 'season_1', 'title' => 'Je n’abandonnerai jamais', 'number' => '17', 'synopsis' => '...',],
    //     ['refseason' => 'season_1', 'title' => 'À chaque réincarnation', 'number' => '18', 'synopsis' => '...',],

    //     ['refseason' => 'season_2', 'title' => 'Le rêve d\'un étranger', 'number' => '1', 'synopsis' => '...',],

    //     ['refseason' => 'season_3', 'title' => 'Ryomen Sukuna', 'number' => '1', 'synopsis' => '...',],

    //     ['refseason' => 'season_4', 'title' => '...', 'number' => '1', 'synopsis' => '...',],


    // ];

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $season = new Episode();
            $season->setTitle($faker->words(3, true));
            $season->setNumber($faker->numberBetween(1, 10));
            $season->setSynopsis($faker->paragraphs(3, true));
            $season->setSeason($this->getReference('season_' . $faker->numberBetween(0, 24)));
            $manager->persist($season);
        }
        $manager->flush();
        // foreach (self::EPISODES as $episodeNumber) {
        //     $episode = new Episode();
        //     $episode->setTitle($episodeNumber['title']);
        //     $episode->setNumber($episodeNumber['number']);
        //     $episode->setSynopsis($episodeNumber['synopsis']);
        //     $episode->setSeason($this->getReference($episodeNumber['refseason']));
        //     $manager->persist($episode);
        // }
        // $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SeasonFixtures::class,
        ];
    }
}
