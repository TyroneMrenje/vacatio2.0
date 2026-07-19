<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\ServiceMenu;

class SpaServiceMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $spaServices=[
            ['service_name'=>'Spa', 'name'=>'Swedish Massage', 'price'=>12500.00, 'time'=>'60 mins', 'title'=>'TREATMENTS', 'description'=>"A full body massage that gives energy and total healing relaxation with a different use of techniques such as long kneading rhythmic strokes that allows the body to absorb more oxygen and for detoxification."],

            ['service_name'=>'Spa', 'name'=>'Deep Tissue Massage', 'price'=>15000.00, 'time'=>'90 mins', 'title'=>'TREATMENTS', 'description'=>"This therapy involves applying sustained pressure using slow, deep strokes to target the inner layer of your muscles and connective tissues. It helps to reduce tension in muscle and soft tissues."],

            ['service_name'=>'Spa', 'name'=>'Hot Stone Massage', 'price'=>12000.00, 'time'=>'60 mins', 'title'=>'TREATMENTS', 'description'=>"The heat from warmed volcanic stones combined with therapeutic oils ease muscles and damaged soft tissues throughout the body, leaving you relaxed and rejuvenated."],

            ['service_name'=>'Spa', 'name'=>'AromaTherapy Massage', 'price'=>12000.00, 'time'=>'60 mins', 'title'=>'TREATMENTS', 'description'=>"A therapeutic massage treatment with the use of essential oils to promote healing, a feeling of well- being and total relaxation. We select essential oils extracted from parts of the herbs and plants that contain properties to cater to your individual needs and concerns."],

            ['service_name'=>'Spa', 'name'=>'Four Hand Massage', 'price'=>18000.00, 'time'=>'75 mins', 'title'=>'TREATMENTS', 'description'=>"Using unique combination of techniques, two therapists work simultaneously on your body, for 75mins of harmony and healing."],

            ['service_name'=>'Spa', 'name'=>'Big Mama Massage', 'price'=>10000.00, 'time'=>'60 mins', 'title'=>'TREATMENTS', 'description'=>"Mother To Be Massage promotes relaxation, soothes nerves, and relieves strained back and leg muscles in expectant mothers. This is especially beneficial in the second and third trimesters. The massage therapist will take extra care to make sure your body gets the cushioning and support it needs."],

            ['service_name'=>'Spa', 'name'=>'Couples Retreat Package', 'price'=>50000.00, 'time'=>'180 mins', 'title'=>'VACATIO BODY CEREMONIES', 'description'=>"The perfect way to relax with your loved one! Our signature couples’ spa therapy begins with a 10 mins Jacuzzi bath, accompanied by Tranquility Body Scrub that will aid in removing all the dead skin from your Body, followed up with a relaxing charcoal activated body mask and finally finish off with a soothing and rejuvenating Tulia Bamboo signature massage."],

            ['service_name'=>'Spa', 'name'=>'Spa Ritual', 'price'=>13500.00, 'time'=>'90 mins', 'title'=>'VACATIO BODY CEREMONIES', 'description'=>"A restorative and soothing spa treatment that begins with a 10-minute foot cleanse, followed by body exfoliation and our Signature 60 minutes body massage. This treatment will leave you completely relaxed and your skin feeling soft, smooth, and supple."],

            ['service_name'=>'Spa', 'name'=>'Skin Detox Full Body Treatment', 'price'=>16500.00, 'time'=>'150 mins', 'title'=>'VACATIO BODY CEREMONIES', 'description'=>"Indulge in our Skin Detox Full Body Treatment, a revitalizing exfoliates, detoxifies, and nourishes your skin. From gentle exfoliation to a purifying mask and hydrating massage, this luxurious treatment leaves your skin refreshed and radiant. Suitable for all Skin types, it’s the perfect escape for a healthier, glowing complexion."],

            ['service_name'=>'Spa', 'name'=>'Beach Retreat', 'price'=>25000.00, 'time'=>'180 mins', 'title'=>'VACATIO BODY CEREMONIES', 'description'=>"Involves a choice of Sea mineral body Polish, body wrap, hydrating mini facial, massage treatment to relax, inspire and transport you to a world of sensual delight."],

            ['service_name'=>'Spa', 'name'=>'Mini Facial', 'price'=>6000.00, 'time'=>'30 mins', 'title'=>'FACIAL TREATMENTS', 'description'=>"This 30 mins facial is a connvenient option for people with busy schedules and little time to spare. It comprises of cleansing, toning, exfoliating, application of a mask and moisturizing."],

            ['service_name'=>'Spa', 'name'=>'Deep Cleanse Facial', 'price'=>9500.00, 'time'=>'75 mins', 'title'=>'FACIAL TREATMENTS', 'description'=>"A deep cleansing facial that will leave the skin looking refreshed and more youthful. By using gentle enzyme exfoliator, we purify the skin without the long-term damage usually caused by harsh products. An enzyme exfoliation with a massage that stimulates and uplifts tired and dull skin and clears problematic skin."],

            ['service_name'=>'Spa', 'name'=>'Eternal Youth Anti-Aging Facial', 'price'=>15000.00, 'time'=>'75 mins', 'title'=>'FACIAL TREATMENTS', 'description'=>"Using natural ingredients, this anti-aging technique is to slow down the aging process and is combined with the best products to restore firmness, brighten the skin, reduce wrinkles, and smoothen skin appearance, giving resistance and suppleness to your complexion."],

            ['service_name'=>'Spa', 'name'=>'Enzyme Empowered Facial', 'price'=>15000.00, 'time'=>'90 mins', 'title'=>'FACIAL TREATMENTS', 'description'=>"A high-performance, specialized, and results-driven facial designed for cellular rejuvenation gently stimulates skin cell renewal on deeper skin levels. The presence of a high dosage of vitamin C actively boosts skin regeneration and combats aging. The unique delivery of active ingredients, including peptides, hyaluronic acid, enzymes, and probiotics, provides highly nourishing results."],

            ['service_name'=>'Spa', 'name'=>'Nourishing Facial', 'price'=>6000.00, 'time'=>'30 mins', 'title'=>'FACIAL TREATMENTS', 'description'=>"Specially customized to the needs of man skin, this facial gives the skin a fresh and rejuvenated look."],
          
        ];

        foreach($spaServices as $spaService){

            $service= Service::where('name',$spaService['service_name'])->first();

            if($service){

                $serviceId = $service->id;

                ServiceMenu::firstOrCreate([
                    'service_id'=>$serviceId,
                    'name'=>$spaService['name']
                ],[
                    'title'=>$spaService['title'],
                    'price'=>$spaService['price'],
                    'time'=>$spaService['time'],
                    'description'=>$spaService['description'],
                              
                ]);
            }

        }
    }
}
