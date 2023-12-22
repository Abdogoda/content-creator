<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesSeeder extends Seeder{

    public function run(): void{
        $pages_en =[
            [
                'title' => 'Home Page',
                'slug' => 'home',
                'meta_title' => 'home page',
                'meta_keywords' => 'homepage, Rubik Studio',
                'meta_description' => 'this is the home page description that shows under the url in search engines',
                'description' => 'Balloons are pretty and come in different colors, different shapes, different sizes, and they can even adjust sizes as needed. But dont make them too big or they might just pop, and then bye-bye balloon. It will be gone and lost for the rest of mankind. They can serve a variety of purposes, from decorating to water balloon wars. You just have to use your head to think a little bit about what to do with them.'
            ],
            [
                'title' => 'About Us',
                'slug' => 'about-us',
                'meta_title' => 'about us',
                'meta_keywords' => 'aboutus, Rubik Studio',
                'meta_description' => 'this is the about us page description that shows under the url in search engines',
                'description' => 'Sometimes it is simply better to ignore the haters. That is the lesson that Toms dad had been trying to teach him, but Tom still could not let it go. He latched onto them and their hate and couldn not let it go, but he also realized that this was not healthy. That is when he came up with his devious plan.'
            ],
            [
                'title' => 'Contact Us',
                'slug' => 'contact-us',
                'meta_title' => 'contact us',
                'meta_keywords' => 'contactus, Rubik Studio, phone, email',
                'meta_description' => 'this is the contact us page description that shows under the url in search engines',
                'description' => '  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab, saepe animi? Modi, neque enim quaerat alias provident eaque hic eos soluta ipsa nihil quis minima nesciunt sapiente magni ex fugiat.'
            ],
            [
                'title' => 'Portfolio',
                'slug' => 'portfolio',
                'meta_title' => 'portfolio',
                'meta_keywords' => 'portfolio, Rubik Studio',
                'meta_description' => 'this is the portfolio page description that shows under the url in search engines',
                'description' => 'There was a time and a place for Stephanie to use her magic. The problem was that she had a difficult time determining this. She wished she could simply use it when the desire hit and there wouldnot be any unforeseen consequences. Unfortunately, thats not how it worked and the consequences could be devastating if she accidentally used her magic at the wrong time.'
            ],
            [
                'title' => 'All Services',
                'slug' => 'services',
                'meta_title' => 'services',
                'meta_keywords' => 'services, allservices, Rubik Studio',
                'meta_description' => 'this is the services page description that shows under the url in search engines',
                'description' => '  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab, saepe animi? Modi, neque enim quaerat alias provident eaque hic eos soluta ipsa nihil quis minima nesciunt sapiente magni ex fugiat.'
            ],
        ];
        $pages_ar =[
            [
                'title' => 'الصفحة الرئيسية',
                'meta_title' => 'الصفحة الرئيسية',
                'meta_keywords' => 'الصفحة الرئيسية, Rubik Studio',
                'meta_description' => 'هذا هو وصف الصفحة الرئيسية الذي يظهر تحت عنوان URL في محركات البحث',
                'description' => 'لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار  النشوة وتمجيد الألم نشأت بالفعل، وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب الشعور بالسعادة، ولكن بفضل هؤلاء الأشخاص الذين لا يدركون بأن السعادة لا بد أن نستشعرها بصورة أكثر عقلانية ومنطقية فيعرضهم هذا لمواجهة الظروف الأليمة، وأكرر بأنه لا يوجد من يرغب في الحب ونيل المنال ويتلذذ بالآلام، الألم هو الألم ولكن نتيجة لظروف ما قد تكمن السعاده فيما نتحمله من كد وأسي.'
            ],
            [
                'title' => 'معلومات عنا',
                'meta_title' => 'معلومات عنا',
                'meta_keywords' => 'معلومات عنا, Rubik Studio',
                'meta_description' => 'هذا هو وصف الصفحة الرئيسية الذي يظهر تحت عنوان URL في محركات البحث',
                'description' => 'لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار  النشوة وتمجيد الألم نشأت بالفعل، وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب الشعور بالسعادة، ولكن بفضل هؤلاء الأشخاص الذين لا يدركون بأن السعادة لا بد أن نستشعرها بصورة أكثر عقلانية ومنطقية فيعرضهم هذا لمواجهة الظروف الأليمة، وأكرر بأنه لا يوجد من يرغب في الحب ونيل المنال ويتلذذ بالآلام، الألم هو الألم ولكن نتيجة لظروف ما قد تكمن السعاده فيما نتحمله من كد وأسي.'
            ],
            [
                'title' => 'تواصل معنا',
                'meta_title' => 'تواصل معنا',
                'meta_keywords' => 'contactus, Rubik Studio, phone, email',
                'meta_description' => 'هذا هو وصف الصفحة التواصل الذي يظهر تحت عنوان URL في محركات البحث',
                'description' => 'سأعرض مثال حي لهذا، من منا لم يتحمل جهد بدني شاق إلا من أجل الحصول على ميزة أو فائدة؟ ولكن من لديه الحق أن ينتقد شخص ما أراد أن يشعر بالسعادة التي لا تشوبها عواقب أليمة أو آخر أراد أن يتجنب الألم الذي ربما تنجم عنه بعض المتعة ؟ 
                علي الجانب الآخر نشجب ونستنكر هؤلاء الرجال المفتونون بنشوة اللحظة الهائمون في رغباتهم فلا يدركون ما يعقبها من الألم والأسي المحتم، واللوم كذلك يشمل هؤلاء الذين أخفقوا في واجباتهم نتيجة لضعف إرادتهم فيتساوي مع هؤلاء الذين يتجنبون وينأون عن تحمل الكدح والألم .'
            ],
            [
                'title' => 'معرض الاعمال',
                'meta_title' => 'معرض الاعمال',
                'meta_keywords' => 'معرض الاعمال, Rubik Studio',
                'meta_description' => 'هذا هو وصف الصفحة معرض الاعمال الذي يظهر تحت عنوان URL في محركات البحث',
                'description' => 'و سأعرض مثال حي لهذا، من منا لم يتحمل جهد بدني شاق إلا من أجل الحصول على ميزة أو فائدة؟ ولكن من لديه الحق أن ينتقد شخص ما أراد أن يشعر بالسعادة التي لا تشوبها عواقب أليمة أو آخر أراد أن يتجنب الألم الذي ربما تنجم عنه بعض المتعة ؟ 
                علي الجانب الآخر نشجب ونستنكر هؤلاء الرجال المفتونون بنشوة اللحظة الهائمون في رغباتهم فلا يدركون ما يعقبها من الألم والأسي المحتم، واللوم كذلك يشمل هؤلاء الذين أخفقوا في واجباتهم نتيجة لضعف إرادتهم فيتساوي مع هؤلاء الذين يتجنبون وينأون عن تحمل الكدح والألم .'
            ],
            [
                'title' => 'جميع الخدمات',
                'meta_title' => 'الخدمات',
                'meta_keywords' => 'الخدمات, كل الخدمات, Rubik Studio',
                'meta_description' => 'هذا هو وصف الصفحة الخدمات الذي يظهر تحت عنوان URL في محركات البحث',
                'description' => 'لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار  النشوة وتمجيد الألم نشأت بالفعل، وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب الشعور بالسعادة، ولكن بفضل هؤلاء الأشخاص الذين لا يدركون بأن السعادة لا بد أن نستشعرها بصورة أكثر عقلانية ومنطقية فيعرضهم هذا لمواجهة الظروف الأليمة، وأكرر بأنه لا يوجد من يرغب في الحب ونيل المنال ويتلذذ بالآلام، الألم هو الألم ولكن نتيجة لظروف ما قد تكمن السعاده فيما نتحمله من كد وأسي.'
            ],
        ];
        for ($i=0; $i < count($pages_en); $i++) { 
            $p = new Page();
            $p->slug = $pages_en[$i]['slug'];
            $p->save();
            DB::table('page_translations')->insert([
                'page_id' => $p->id,
                'locale' => 'en',
                'title' => $pages_en[$i]['title'],
                'meta_title' => $pages_en[$i]['meta_title'],
                'meta_keywords' => $pages_en[$i]['meta_keywords'],
                'meta_description' => $pages_en[$i]['meta_description'],
                'description' => $pages_en[$i]['description'],
            ]);
            DB::table('page_translations')->insert([
                'page_id' => $p->id,
                'locale' => 'ar',
                'title' => $pages_ar[$i]['title'],
                'meta_title' => $pages_ar[$i]['meta_title'],
                'meta_keywords' => $pages_ar[$i]['meta_keywords'],
                'meta_description' => $pages_ar[$i]['meta_description'],
                'description' => $pages_ar[$i]['description'],
            ]);
        }
    }
}