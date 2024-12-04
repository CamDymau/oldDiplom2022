<?php

namespace Database\Seeders;

use App\Models\DeliveryStatus;
use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('categories')->insert([
            'name' => 'Измерительное оборудование',
        ]);
        DB::table('categories')->insert([
            'name' => 'Дрели, шуруповерты',
        ]);
        DB::table('categories')->insert([
            'name' => 'Бензоинструмент и генераторы',
        ]);
        DB::table('categories')->insert([
            'name' => 'Пилы, рубанки, лобзики',
        ]);

        DB::table('products')->insert([
            'image'=>'Makita_LD030P.jpg',
            'name' => 'Лазерный дальномер Makita LD03OP',
            'category_id' => 1,
            'price' => 2000,
            'pricePledge' => 200,
            'height' => 2000,
            'weight' => 200,
            'description' => 'Норм мерило',
        ]);
        DB::table('products')->insert([
            'image'=>'Boshgms120.jpg',
            'name' => 'Детектор Bosch GMS 120',
            'category_id' => 1,
            'price' => 2500,
            'pricePledge' => 250,
            'height' => 2000,
            'weight' => 200,
            'description' => 'Норм мерило',
        ]);
        DB::table('products')->insert([
            'image'=>'geoboxn7.jpg',
            'name' => 'Нивелир оптический GEOBOX N7-32 TRIO (комплект)',
            'category_id' => 1,
            'price' => 4500,
            'pricePledge' => 450,
            'height' => 2000,
            'weight' => 200,
            'description' => 'Норм мерило',
        ]);
        DB::table('products')->insert([
            'image'=>'Boshgol.jpg',
            'name' => 'Нивелир оптический BOSCH GOL 20 D (комплект)',
            'category_id' => 1,
            'price' => 5500,
            'pricePledge' => 5500,
            'height' => 550,
            'weight' => 200,
            'description' => 'Супер мерило мерило',
        ]);
        DB::table('products')->insert([
            'image'=>'cube360.jpg',
            'name' => 'Лазерный построитель плоскостей Cube 360 Professinal',
            'category_id' => 1,
            'price' => 3000,
            'pricePledge' => 300,
            'height' => 2000,
            'weight' => 200,
            'description' => 'Норм мерило',
        ]);
        DB::table('products')->insert([
            'image'=>'makitask.jpg',
            'name' => 'Лазерный Уровень Makita SK102Z',
            'category_id' => 1,
            'price' => 3000,
            'pricePledge' => 300,
            'height' => 2000,
            'weight' => 200,
            'description' => 'Норм мерило',
        ]);
        DB::table('products')->insert([
            'image'=>'cube360UE.jpg',
            'name' => 'Лазерный построитель плоскостей Cube 360 Ultimate Edition',
            'category_id' => 1,
            'price' => 3500,
            'pricePledge' => 350,
            'height' => 2000,
            'weight' => 200,
            'description' => 'Норм мерило',
        ]);
        DB::table('products')->insert([
            'image'=>'condtrol.jpg',
            'name' => 'Лазерный уровень CONDTROL MX2',
            'category_id' => 1,
            'price' => 2000,
            'pricePledge' => 200,
            'height' => 550,
            'weight' => 200,
            'description' => 'Супер мерило мерило',
        ]);



        DB::table('products')->insert([
            'image'=>'Makita_DS4011.jpg',
            'name' => 'Дрель-миксер Makita DS4011',
            'category_id' => 2,
            'price' => 40000,
            'pricePledge' => 4000,
            'height' => 400,
            'weight' => 500,
            'description' => 'Норм вертило',
        ]);
        DB::table('products')->insert([
            'image'=>'Makita_UT1401.jpg',
            'name' => 'Дрель-миксер Makita UT1401',
            'category_id' => 2,
            'price' => 5500,
            'pricePledge' => 550,
            'height' => 100,
            'weight' => 200,
            'description' => 'Супер вертило',
        ]);
        DB::table('products')->insert([
            'image'=>'dde_gg1300.jpg',
            'name' => 'Аренда Бензогенератор DDE GG1300',
            'category_id' => 3,
            'price' => 5500,
            'pricePledge' => 550,
            'height' => 1000,
            'weight' => 2500,
            'description' => 'Супер генератор',
        ]);
        DB::table('products')->insert([
            'image'=>'HUTER_DY2500L.jpg',
            'name' => 'Аренда Бензогенератор HUTER DY2500L',
            'category_id' => 3,
            'price' => 6000,
            'pricePledge' => 600,
            'height' => 800,
            'weight' => 1500,
            'description' => 'Супер генератор, даже лучше чем за 5500',
        ]);
        DB::table('products')->insert([
            'image'=>'Makita_4329K.jpg',
            'name' => 'Аренда Электролобзик Makita 4329K',
            'category_id' => 4,
            'price' => 2500,
            'pricePledge' => 250,
            'height' => 600,
            'weight' => 500,
            'description' => 'Мега-хароший лобзик',
        ]);
        DB::table('products')->insert([
            'image'=>'Makita_1911B.jpg',
            'name' => 'Аренда Рубанок Makita 1911B',
            'category_id' => 4,
            'price' => 4500,
            'pricePledge' => 450,
            'height' => 800,
            'weight' => 700,
            'description' => 'РУБАЧИЩЕ',
        ]);


        DB::table('statuses')->insert([
            'name' => 'Создана',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Обрабатывается',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Ожидает выдачи',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Выдан',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Отменен',
        ]);


        DB::table('users')->insert([
            'name'=>'admin',
            'email' => 'admin@admin.ru',
            'login' => 'admin',
            'role' => true,
            'password' => Hash::make('admin123'),
        ]);


    }
}
