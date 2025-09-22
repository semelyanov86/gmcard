<?php

declare(strict_types=1);

namespace Database\Seeders\Business;

use App\Models\Organisation;
use Illuminate\Database\Seeder;

class OrganisationSeeder extends Seeder
{
    public function run(): void
    {
        $organisations = [
            ['name' => 'ООО «Альфа»', 'owner_role' => 'Владелец', 'inn' => '7701234567', 'ogrn' => '1027700123456', 'contact' => '+7 495 111-11-11', 'contact_fio' => 'Иван Иванов'],
            ['name' => 'ООО «Бета»', 'owner_role' => 'Менеджер', 'inn' => '7802345678', 'ogrn' => '1037800234567', 'contact' => '+7 812 222-22-22', 'contact_fio' => 'Мария Петрова'],
            ['name' => 'ООО «Гамма»', 'owner_role' => 'Секретарь', 'inn' => '5403456789', 'ogrn' => '1045400345678', 'contact' => '+7 383 333-33-33', 'contact_fio' => 'Алексей Смирнов'],
            ['name' => 'ООО «Дельта»', 'owner_role' => 'Владелец', 'inn' => '6604567890', 'ogrn' => '1056600456789', 'contact' => '+7 343 444-44-44', 'contact_fio' => 'Елена Соколова'],
            ['name' => 'ООО «Эпсилон»', 'owner_role' => 'Менеджер', 'inn' => '1605678901', 'ogrn' => '1061600567890', 'contact' => '+7 843 555-55-55', 'contact_fio' => 'Дмитрий Кузнецов'],
            ['name' => 'ООО «Зета»', 'owner_role' => 'Другое', 'inn' => '5206789012', 'ogrn' => '1075200678901', 'contact' => '+7 831 666-66-66', 'contact_fio' => 'Ольга Попова'],
            ['name' => 'ООО «Эта»', 'owner_role' => 'Владелец', 'inn' => '7407890123', 'ogrn' => '1087400789012', 'contact' => '+7 351 777-77-77', 'contact_fio' => 'Сергей Васильев'],
            ['name' => 'ООО «Тета»', 'owner_role' => 'Менеджер', 'inn' => '6308901234', 'ogrn' => '1096300890123', 'contact' => '+7 846 888-88-88', 'contact_fio' => 'Анна Морозова'],
            ['name' => 'ООО «Иота»', 'owner_role' => 'Секретарь', 'inn' => '0209012345', 'ogrn' => '1100200901234', 'contact' => '+7 347 999-99-99', 'contact_fio' => 'Павел Зайцев'],
            ['name' => 'ООО «Каппа»', 'owner_role' => 'Владелец', 'inn' => '6100123456', 'ogrn' => '1116100012345', 'contact' => '+7 863 000-00-00', 'contact_fio' => 'Наталья Волкова'],
        ];

        foreach ($organisations as $i => $data) {
            Organisation::query()->create(array_merge($data, [
                'opening_hours' => [
                    'пн-пт' => '10:00-20:00',
                    'сб' => '11:00-18:00',
                    'вс' => 'выходной',
                ],
                'user_id' => $i + 1,
                'address_id' => $i + 1,
            ]));
        }
    }
}
