<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Accommodation;

class AccommodationsSeeder extends Seeder
{
    public function run()
    {
        Accommodation::create([
            'title' => 'شقة فاخرة في مسقط',
            'description' => 'شقة مفروشة بالكامل مع إطلالة رائعة على البحر',
            'type' => 'شقة',
            'capacity' => 4,
            'city' => 'مسقط',
            'district' => 'القرم',
            'address' => 'شارع السلطان قابوس، مجمع الواحة',
            'price_monthly' => 450.00,
            'contact_phone' => '96812345678',
            'contact_email' => 'info@accommodation.om',
            'is_available' => true
        ]);

        Accommodation::create([
            'title' => 'غرفة مريحة في صلالة',
            'description' => 'غرفة نظيفة ومريحة قريبة من الشاطئ',
            'type' => 'غرفة',
            'capacity' => 2,
            'city' => 'صلالة',
            'district' => 'الحافة',
            'address' => 'طريق الشاطئ، بناية النخيل',
            'price_monthly' => 180.00,
            'contact_phone' => '96887654321',
            'contact_email' => null,
            'is_available' => true
        ]);

        Accommodation::create([
            'title' => 'استوديو حديث في صحار',
            'description' => 'استوديو جديد بالكامل مع أثاث عصري',
            'type' => 'استوديو',
            'capacity' => 2,
            'city' => 'صحار',
            'district' => 'صحار الجديدة',
            'address' => 'شارع الكورنيش، برج الأفق',
            'price_monthly' => 320.00,
            'contact_phone' => '96891234567',
            'contact_email' => 'studio@rent.om',
            'is_available' => true
        ]);

        Accommodation::create([
            'title' => 'فيلا واسعة في نزوى',
            'description' => 'فيلا كبيرة مع حديقة وموقف سيارات',
            'type' => 'فيلا',
            'capacity' => 8,
            'city' => 'نزوى',
            'district' => 'البركة',
            'address' => 'حي السلام، فيلا رقم 15',
            'price_monthly' => 650.00,
            'contact_phone' => '96899887766',
            'contact_email' => 'villa.nizwa@gmail.com',
            'is_available' => false
        ]);
    }
}