<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Seller;
use Faker\Generator as Faker;
use Spatie\Geocoder\Facades\Geocoder;

$factory->define(Seller::class, function (Faker $faker) {
    $ruesParis=
    ['Rue de la Fidélité',
    'Rue la Fayette',
    'Rue de Charbol',
    'Rue des Vinaigriers',
    'Boulevard de Magenta',
    'Rue de l\'Echiquier',
    'Boulevard Saint-Martin',
    'Rue de Cléry',
    'Rue de Paradis',
    'Rue du Faubourg Poissonnière',
    'Rue d\'Alsace',
    'Cité de Trévise',
    'Rue du Conservatoire',
    'Rue de Marseille',
    'Rue Notre-Dame de Nazareth',
    'Rue Meslay',
    'Rue des Messageries',
    'Rue la Fayette',
    'Rue Bleue',
    'Boulevard de Strasboug',
    'Rue du Faubourg Saint-Martin',
    'Rue des Récollets',
    'Rue des Jeûneurs',
    'Rue des Vinaigriers',
    'Rue d\'Aboukir',
    'Rue Blondel',
    'Rue d\'Hauteville',
    'Rue Montholon',
    'Rue Lamartine',
    'Rue Pierre Semard',
    'Rue de Nancy',
    'Rue des Petites Écuries',
    'Rue Gabriel Laumain',
    'Rue de Chantilly',
    'Rue de Charbol',

];

    $cp = "75010";
    $voie = $ruesParis[rand(0,count($ruesParis)-1)];
    $commune = "Paris";
    $num = rand(1,50);

   /* $geocoder=Geocoder::getCoordinatesForAddress($num.' '.$voie.' '.$cp.' '.$commune);
    $position=json_encode([
        "lat"=> $geocoder["lat"],
        "long"=> $geocoder["lng"],
    ]); */

    return [
        'address' => json_encode(["cp" => $cp,"voie"=>$voie,"commune"=> $commune,"num"=> $num]),
        'phone_number' => "0612345678",
        // 'position' => $position
    ];
});
