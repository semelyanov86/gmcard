<?php

declare(strict_types=1);

namespace Database\Seeders\Promo;

use App\Models\Promo as PromoModel;
use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    public function run(): void
    {
        $promos = [
            [
                'name' => 'Летний обед',
                'type' => 'simple',
                'code' => 'PROMO-1001',
                'img' => null,
                'amount' => 15,
                'description' => 'Скидка на бизнес-ланч по будням.',
                'extra_conditions' => 'Минимальный заказ: 500 ₽; Ограничения: только будни',
                'video_link' => null,
                'smm_links' => ['vk' => 'https://vk.com/food_club'],
                'days_availability' => ['пн', 'вт', 'ср', 'чт', 'пт'],
                'availabe_from' => '2025-01-10',
                'available_to' => '23:59:59',
                'started_at' => '2025-01-10 09:00:00',
                'available_till' => '2025-03-10 23:59:59',
                'show_on_home' => true,
                'raise_on_top_hours' => 12,
                'restart_after_finish_days' => 0,
                'sales_order_from' => 500,
                'free_delivery_from' => 1000,
                'free_delivery' => false,
                'approved_at' => '2025-01-09 12:00:00',
                'approving_notes' => 'Ок',
                'crmid' => 2001,
                'adv_campaign_id' => 1,
                'organisation_id' => 1,
                'dicsount' => '10',
                'user_id' => 1,
            ],
            [
                'name' => 'Кэшбэк выходного дня',
                'type' => 'cashback',
                'code' => 'PROMO-1002',
                'img' => null,
                'amount' => 5,
                'description' => 'Кэшбэк за покупки по выходным.',
                'extra_conditions' => 'Ограничения: сб-вс',
                'video_link' => null,
                'smm_links' => ['vk' => 'https://vk.com/weekend_cashback'],
                'days_availability' => ['сб', 'вс'],
                'availabe_from' => '2025-01-15',
                'available_to' => '23:59:59',
                'started_at' => '2025-01-18 00:00:00',
                'available_till' => '2025-04-01 23:59:59',
                'show_on_home' => true,
                'raise_on_top_hours' => 24,
                'restart_after_finish_days' => 0,
                'sales_order_from' => 0,
                'free_delivery_from' => 0,
                'free_delivery' => false,
                'approved_at' => '2025-01-16 10:00:00',
                'approving_notes' => 'Ок',
                'crmid' => 2002,
                'adv_campaign_id' => 2,
                'organisation_id' => 2,
                'dicsount' => '0',
                'user_id' => 2,
            ],
            [
                'name' => 'Подарок к заказу',
                'type' => 'gift',
                'code' => 'PROMO-1003',
                'img' => null,
                'amount' => 1,
                'description' => 'Подарок при покупке от 2000 ₽.',
                'extra_conditions' => 'Минимальный заказ: 2000 ₽',
                'video_link' => null,
                'smm_links' => null,
                'days_availability' => ['пн', 'вт', 'ср', 'чт', 'пт', 'сб', 'вс'],
                'availabe_from' => '2025-02-01',
                'available_to' => '23:59:59',
                'started_at' => '2025-02-01 10:00:00',
                'available_till' => '2025-05-01 23:59:59',
                'show_on_home' => false,
                'raise_on_top_hours' => 0,
                'restart_after_finish_days' => 7,
                'sales_order_from' => 2000,
                'free_delivery_from' => 3000,
                'free_delivery' => true,
                'approved_at' => '2025-01-28 09:00:00',
                'approving_notes' => null,
                'crmid' => 2003,
                'adv_campaign_id' => 3,
                'organisation_id' => 3,
                'dicsount' => '0',
                'user_id' => 3,
            ],
            [
                'name' => 'Утренний кофе', 'type' => 'simple', 'code' => 'PROMO-1004', 'img' => null, 'amount' => 10, 'description' => 'Скидка на кофе до 12:00.', 'extra_conditions' => 'Ограничения: только до 12:00', 'video_link' => null, 'smm_links' => null, 'days_availability' => ['пн', 'вт', 'ср', 'чт', 'пт'], 'availabe_from' => '2025-01-05', 'available_to' => '23:59:59', 'started_at' => '2025-01-05 08:00:00', 'available_till' => '2025-02-28 23:59:59', 'show_on_home' => true, 'raise_on_top_hours' => 8, 'restart_after_finish_days' => 0, 'sales_order_from' => 0, 'free_delivery_from' => 0, 'free_delivery' => false, 'approved_at' => '2025-01-04 12:00:00', 'approving_notes' => null, 'crmid' => 2004, 'adv_campaign_id' => 4, 'organisation_id' => 4, 'dicsount' => '10', 'user_id' => 4],
            ['name' => 'Бесплатная доставка', 'type' => 'simple', 'code' => 'PROMO-1005', 'img' => null, 'amount' => 0, 'description' => 'Бесплатная доставка от 1500 ₽.', 'extra_conditions' => 'Минимальный заказ: 1500 ₽', 'video_link' => null, 'smm_links' => null, 'days_availability' => ['пн', 'вт', 'ср', 'чт', 'пт', 'сб', 'вс'], 'availabe_from' => '2025-01-20', 'available_to' => '23:59:59', 'started_at' => '2025-01-20 10:00:00', 'available_till' => '2025-03-31 23:59:59', 'show_on_home' => true, 'raise_on_top_hours' => 0, 'restart_after_finish_days' => 0, 'sales_order_from' => 0, 'free_delivery_from' => 1500, 'free_delivery' => true, 'approved_at' => '2025-01-18 12:00:00', 'approving_notes' => null, 'crmid' => 2005, 'adv_campaign_id' => 5, 'organisation_id' => 5, 'dicsount' => '0', 'user_id' => 5],
            ['name' => '-20% на электронику', 'type' => 'simple', 'code' => 'PROMO-1006', 'img' => null, 'amount' => 20, 'description' => 'Скидка на выбранные категории.', 'extra_conditions' => 'Категории: Электроника', 'video_link' => null, 'smm_links' => null, 'days_availability' => ['пн', 'вт', 'ср', 'чт', 'пт', 'сб', 'вс'], 'availabe_from' => '2025-02-10', 'available_to' => '23:59:59', 'started_at' => '2025-02-10 10:00:00', 'available_till' => '2025-05-10 23:59:59', 'show_on_home' => false, 'raise_on_top_hours' => 0, 'restart_after_finish_days' => 0, 'sales_order_from' => 0, 'free_delivery_from' => 0, 'free_delivery' => false, 'approved_at' => '2025-02-08 12:00:00', 'approving_notes' => null, 'crmid' => 2006, 'adv_campaign_id' => 6, 'organisation_id' => 6, 'dicsount' => '20', 'user_id' => 6],
            ['name' => 'Пицца 1+1', 'type' => 'gift', 'code' => 'PROMO-1007', 'img' => null, 'amount' => 1, 'description' => 'Вторая пицца в подарок.', 'extra_conditions' => 'Ограничения: по промокоду', 'video_link' => null, 'smm_links' => null, 'days_availability' => ['пт', 'сб', 'вс'], 'availabe_from' => '2025-02-14', 'available_to' => '23:59:59', 'started_at' => '2025-02-14 12:00:00', 'available_till' => '2025-03-31 23:59:59', 'show_on_home' => true, 'raise_on_top_hours' => 0, 'restart_after_finish_days' => 0, 'sales_order_from' => 1000, 'free_delivery_from' => 2000, 'free_delivery' => true, 'approved_at' => '2025-02-12 10:00:00', 'approving_notes' => null, 'crmid' => 2007, 'adv_campaign_id' => 7, 'organisation_id' => 7, 'dicsount' => '0', 'user_id' => 7],
            ['name' => '-10% на одежду', 'type' => 'simple', 'code' => 'PROMO-1008', 'img' => null, 'amount' => 10, 'description' => 'Скидка на новую коллекцию.', 'extra_conditions' => 'Категории: Одежда', 'video_link' => null, 'smm_links' => null, 'days_availability' => ['сб', 'вс'], 'availabe_from' => '2025-02-20', 'available_to' => '23:59:59', 'started_at' => '2025-02-22 10:00:00', 'available_till' => '2025-04-15 23:59:59', 'show_on_home' => false, 'raise_on_top_hours' => 0, 'restart_after_finish_days' => 0, 'sales_order_from' => 0, 'free_delivery_from' => 0, 'free_delivery' => false, 'approved_at' => '2025-02-19 09:00:00', 'approving_notes' => null, 'crmid' => 2008, 'adv_campaign_id' => 8, 'organisation_id' => 8, 'dicsount' => '10', 'user_id' => 8],
            ['name' => 'Тур выходного дня', 'type' => 'cashback', 'code' => 'PROMO-1009', 'img' => null, 'amount' => 7, 'description' => 'Кэшбэк на путешествия по РФ.', 'extra_conditions' => 'Ограничения: по России', 'video_link' => null, 'smm_links' => null, 'days_availability' => ['пт', 'сб', 'вс'], 'availabe_from' => '2025-03-01', 'available_to' => '23:59:59', 'started_at' => '2025-03-01 10:00:00', 'available_till' => '2025-06-01 23:59:59', 'show_on_home' => true, 'raise_on_top_hours' => 0, 'restart_after_finish_days' => 0, 'sales_order_from' => 5000, 'free_delivery_from' => 0, 'free_delivery' => false, 'approved_at' => '2025-02-27 12:00:00', 'approving_notes' => null, 'crmid' => 2009, 'adv_campaign_id' => 9, 'organisation_id' => 9, 'dicsount' => '0', 'user_id' => 9],
            ['name' => 'Аптека — скидка 5%', 'type' => 'simple', 'code' => 'PROMO-1010', 'img' => null, 'amount' => 5, 'description' => 'Скидка на все товары аптеки.', 'extra_conditions' => 'Исключения: рецептурные', 'video_link' => null, 'smm_links' => null, 'days_availability' => ['пн', 'вт', 'ср', 'чт', 'пт', 'сб'], 'availabe_from' => '2025-03-05', 'available_to' => '23:59:59', 'started_at' => '2025-03-05 09:00:00', 'available_till' => '2025-07-01 23:59:59', 'show_on_home' => false, 'raise_on_top_hours' => 0, 'restart_after_finish_days' => 0, 'sales_order_from' => 0, 'free_delivery_from' => 1000, 'free_delivery' => true, 'approved_at' => '2025-03-03 10:00:00', 'approving_notes' => null, 'crmid' => 2010, 'adv_campaign_id' => 10, 'organisation_id' => 10, 'dicsount' => '5', 'user_id' => 10],
        ];

        $categoryIds = range(1, 10);
        $cityIds = range(1, 10);
        $addressIds = range(1, 10);

        foreach ($promos as $i => $data) {
            $promo = PromoModel::query()->create($data);

            // детерминированные привязки
            $promo->categories()->sync(array_slice($categoryIds, $i % 7, 3));
            $promo->cities()->sync(array_slice($cityIds, $i % 8, 2));
            $promo->addresses()->sync(array_slice($addressIds, $i % 6, 2));
        }
    }
}
