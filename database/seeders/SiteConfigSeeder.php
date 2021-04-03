<?php

namespace Database\Seeders;

use App\Models\SiteConfig;
use Illuminate\Database\Seeder;

class SiteConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
            [
                'logo' => '0',
                'facebook' => 'https://facebook.com/',
                'twitter' => 'https://twitter.com/',
                'google' => 'http://google.com/',
                'github' => 'http://github.com/',
                'policy' => <<<POLICY
                                <div class="article" id="intro">
                                <h1>Privacy Policy</h1>
                                <p>Practically every single website worth anything out there has a Privacy Policy page that it can turn to whenever issues about privacy come up with users. That's why you really need to have a privacy policy, but it's not exactly that easy to make one, not if you really want to cover all of your bases. This is why you may want to look into the matter of <strong>privacy policy template generator</strong> (like ours here!) since it comes with quite a few benefits.</p>
                                <p><strong>A privacy policy</strong> is a legal document that details how a website gathers, stores, shares, and sells data about its visitors. This data typically includes items such as a user's name, address, birthday, marital status, medical history, and consumer behavior.</p>
                                <p>The specific contents of a privacy policy document depend upon the laws in the legal jurisdiction in which your business operates. Most countries have their own set of guidelines regarding what information is eligible for collection, and how that information may be used. Privacy laws include GDPR, CCPA, CalOPPA, PIPEDA, Australia Privacy Act and many more.</p>
                                <p>When it comes to legal documents, it is best not to take chances. Fortunately, <strong>it's easy to get a free privacy policy in just a few minutes.</strong> All you have to do is fill up the blank spaces on the right and we will create help you create <strong>your own personalized privacy policy template for your business.</strong></p>
                                <p class="text-muted"><em>The accuracy of the generated document on this website is not legally binding. Use at your own risk.</em></p>
                                <hr>
                                <p><strong>Looking for a Terms and Conditions Template?</strong> Check out <a href="https://www.privacypolicyonline.com/terms-conditions-generator/" rel="noopener noreferrer">Terms and Conditions Generator</a>.</p>
                                </div>
                            POLICY,
                'about' => <<<HTML
                                    <div class="section-row">
                        <p>Lorem ipsum dolor sit amet, ea eos tibique expetendis, tollit viderer ne nam. No ponderum accommodare eam, purto nominavi cum ea, sit no dolores tractatos. Scripta principes quaerendum ex has, ea mei omnes eruditi. Nec ex nulla mandamus, quot omnesque mel et. Amet habemus ancillae id eum, justo dignissim mei ea, vix ei tantas aliquid. Cu laudem impetus conclusionemque nec, velit erant persius te mel. Ut eum verterem perpetua scribentur.</p>
                        <figure class="figure-img">
                            <img class="img-responsive" src="https://preview.colorlib.com/theme/webmag/img/about-1.jpg" alt="">
                        </figure>
                        <p>Vix mollis admodum ei, vis legimus voluptatum ut, vis reprimique efficiendi sadipscing ut. Eam ex animal assueverit consectetuer, et nominati maluisset repudiare nec. Rebum aperiam vis ne, ex summo aliquando dissentiunt vim. Quo ut cibo docendi. Suscipit indoctum ne quo, ne solet offendit hendrerit nec. Case malorum evertitur ei vel.</p>
                    </div>

                    <div class="row section-row">
                        <div class="col-md-6">
                            <figure class="figure-img">
                                <img class="img-responsive" src="https://preview.colorlib.com/theme/webmag/img/about-2.jpg" alt="">
                            </figure>
                        </div>
                        <div class="col-md-6">
                            <h3>Our Mission</h3>
                            <p>Id usu mutat debet tempor, fugit omnesque posidonium nec ei. An assum labitur ocurreret qui, eam aliquid ornatus tibique ut.</p>
                            <ul class="list-style">
                                <li><p>Vix mollis admodum ei, vis legimus voluptatum ut.</p></li>
                                <li><p>Cu cum alia vide malis. Vel aliquid facilis adolescens.</p></li>
                                <li><p>Laudem rationibus vim id. Te per illum ornatus.</p></li>
                            </ul>
                        </div>
                    </div>
                    HTML,
                'email' => 'minlwinkyaw@gmail.com',
                'phone' => '+90551234567',
                'address' => 'Yenibosna, Istanbul, TURKEY',
                'contact_message' => 'Please fill form to contact us. We will response you soon'
            ]
        ];

        SiteConfig::truncate();
        SiteConfig::insert($rows);
    }
}
