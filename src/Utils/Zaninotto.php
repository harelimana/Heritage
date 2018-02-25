<?php
namespace Axxa\Utils;

use \Faker;

/**
 * Created by PhpStorm.
 * User: axxa
 * Date: 19.02.18
 * Time: 22:33
 */


class Zaninotto
{
    static function generateFake() {
        
        $faker = Faker\Factory::create('fr_FR');
        $data = [];
        foreach ($faker as $key => $value){
            $data[$key] = $faker->$value;
        }
        return $data;
    }
}