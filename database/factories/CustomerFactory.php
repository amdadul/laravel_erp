<?php

/** @var Factory $factory */

use App\Modules\Crm\Models\Customers;
use App\Modules\SupplyChain\Models\Area;
use App\Modules\SupplyChain\Models\Territory;
use Carbon\Carbon;
use Faker\Generator as Faker;
use App\Model;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Customers::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'max_sn' => $maxSlNo =  $faker->unique()->numberBetween(1, 150),
        'address' => $faker->address,
        'contact_no' => $faker->phoneNumber,
        'territory_id' => 1,
        'store_id' => 2,
        'created_by' => 1,
        'status' => 1,
        'code' => "S01-". str_pad($maxSlNo, 3, '0', STR_PAD_LEFT),
        'created_at' => Carbon::now()->toDateTimeString(),
    ];
});

$factory->define(Area::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'store_id' => 2,
        'max_sn' => $maxSlNo =  $faker->unique()->numberBetween(1, 150),
        'address' => $faker->address,
        'contact_no' => $faker->phoneNumber,
        'created_by' => 1,
//        'status' => 1,
        'code' => "AM01-". str_pad($maxSlNo, 3, '0', STR_PAD_LEFT),
        'created_at' => Carbon::now()->toDateTimeString(),
    ];
});

$factory->define(Territory::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'area_id' => 1,
        'max_sn' => $maxSlNo =  $faker->unique()->numberBetween(1, 150),
        'address' => $faker->address,
        'contact_no' => $faker->phoneNumber,
        'created_by' => 1,
//        'status' => 1,
        'code' => "TSO01-". str_pad($maxSlNo, 3, '0', STR_PAD_LEFT),
        'created_at' => Carbon::now()->toDateTimeString(),
    ];
});

/*$factory->define(Customers::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'max_sn' => $maxSlNo =  $faker->unique()->numberBetween(151, 350),
        'address' => $faker->address,
        'contact_no' => $faker->phoneNumber,
        'store_id' => 2,
        'created_by' => 1,
        'status' => 1,
        'code' => "S02-". str_pad($maxSlNo, 3, '0', STR_PAD_LEFT),
        'created_at' => Carbon::now()->toDateTimeString(),
    ];
});*/


/*$factory->define(Customers::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'max_sn' => $maxSlNo =  $faker->unique()->numberBetween(351, 500),
        'address' => $faker->address,
        'contact_no' => $faker->phoneNumber,
        'store_id' => 2,
        'created_by' => 1,
        'status' => 1,
        'code' => "S03-". str_pad($maxSlNo, 3, '0', STR_PAD_LEFT),
        'created_at' => Carbon::now()->toDateTimeString(),
    ];
});*/
