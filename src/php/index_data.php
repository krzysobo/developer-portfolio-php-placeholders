<?php

require_once "php/SoboSingletonTrait.php";
require_once "php/ExactAccessorMethodTrait.php";

class PortfolioLabels
{
    use Soboutils\SoboSingletonTrait;
    use Soboutils\ExactAccessorMethodTrait;

    private $contact             = "Contact";
    private $about               = "About";
    private $moreAboutMe         = "More About Me";
    private $experience          = "Experience";
    private $projects            = "Projects";
    private $testimonials        = "Testimonials";
    private $skills              = "Skills";
    private $education           = "Education";
    private $resumeFile          = "RESUME";
    private $email               = "Email";
    private $showMore            = "Show more";
    private $backToTop           = "Back to top";
    private $pageTitle           = "";
    private $pageMetaDescription = "";

    private $requiredFields = "Required fields";
    private $name           = "Name";
    private $subject        = "Subject";
    private $message        = "Message";
    private $submit         = "Submit";
    private $phone          = "Phone";
    private $privacyPolicy  = "Privacy Policy";

    private $consentInfoTpl = " *I consent to have this website collect my submitted information so
        they can respond to my inquiry. I have also read and agree to the <a href=\"[PRIVACY_POLICY_URL]\" target=\"_blank\">Privacy Policy</a>.";

    private $consentInfo = "";

    private $myWork    = "My work";
    private $contactMe = "Contact me";

}

class PortfolioPlaceHolders
{
    use Soboutils\SoboSingletonTrait;
    use Soboutils\ExactAccessorMethodTrait;

    private $fullName      = "";
    private $copyrightLine = "© 2025 Your Name. All rights reserved.";

    private $aboutMeFirstLine   = "";
    private $aboutMeSecondLine  = "";
    private $aboutMeDescription = "";
    private $moreAboutMe        = "";
    private $contactDescription = "";

    // social sites logins
    private $email     = "";
    private $phone     = "";
    private $gitHub    = "";
    private $linkedIn  = "";
    private $messenger = "";
    private $skype     = "";
    private $telegram  = "";

    // social sites URLs
    private $gitHubUrl   = "";
    private $linkedInUrl = "";

    private $messengerUrl = "";
    private $skypeUrl     = "";
    private $telegramUrl  = "";

    // files
    private $resumeFilePath = "";
    private $logoUrl        = "";
    private $logoUrlSrcSet  = "";
    private $coverImageUrl  = "";

    private $eduHistory = [];

    private $testimonials = [];

    public function addEduHistoryItem($item)
    {
        $this->eduHistory[] = $item;
    }

    public function addTestimonialItem($item)
    {
        $this->testimonials[] = $item;
    }

    // booleans
    private $showContactForm = true;

    public function makeSocialUrls()
    {
        if ($this->getGitHub()) {
            $this->setGitHubUrl("https://github.com/{$this->getGitHub()}/");
        }

        if ($this->getLinkedIn()) {
            $this->setLinkedInUrl("https://www.linkedin.com/in/{$this->getLinkedIn()}");
        }

        if ($this->getMessenger()) {
            $this->setMessengerUrl("https://m.me/{$this->getMessenger()}");
        }

        if ($this->getSkype()) {
            $this->setSkypeUrl("skype:{$this->getSkype()}?chat");
        }

        if ($this->getTelegram()) {
            $this->setTelegramUrl("https://t.me/{$this->getTelegram()}");
        }

    }
}

function set_portfolio_data(): PortfolioPlaceHolders
{

    $portfolio = PortfolioPlaceHolders::instance();

    $portfolio->setFullName("Olivia Williams");
    $portfolio->setAboutMeFirstLine("<span>Hi I'm</span> {$portfolio->getFullName()} de PHPse.");
    $portfolio->setAboutMeSecondLine("I'm a JavaScript Engineer from the UK.");
    $portfolio->setAboutMeDescription(
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit quos,consectetur cupiditate " .
        "iure dolorum molestiae asperiores maiores explicabo quia autem molestias labore quae laborum eos.");
    $portfolio->setMoreAboutMe("
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione asperiores, vero
        sit aliquid odit esse velit ab obcaecati deserunt nostrum minima debitis non,
        expedita, eos assumenda officiis doloribus distinctio alias pariatur ducimus optio
        nesciunt enim recusandae. Accusamus distinctio ducimus eveniet facere magnam! Veniam
        magnam nostrum nisi eius ex impedit! Molestiae repellendus dolor omnis ad maiores
        molestias sit, vitae in ex totam nobis impedit suscipit. Blanditiis perspiciatis
        placeat molestiae soluta fugit similique quasi numquam dolorum nostrum saepe?
        Architecto commodi nisi corrupti quibusdam. Adipisci facere error expedita
        asperiores quae ab nihil ducimus tempora corporis eveniet tenetur consectetur amet
        repudiandae modi quibusdam dolor, ipsum natus iure eligendi, nulla repellendus
        reiciendis voluptatem. Nam explicabo dolor amet! Itaque eos, sint ullam labore
        dolores sit possimus illo saepe ab. Minima fugit vero saepe molestiae? Reiciendis
        quasi reprehenderit maiores quae nesciunt non quos at laboriosam dolorum excepturi
        ducimus impedit, eum earum nisi tempore nemo esse! Maiores, architecto?");

    $portfolio->setResumeFilePath("images/dummy.pdf");
    $portfolio->setLogoUrl("images/logo-02.png");
    $portfolio->setCoverImageUrl("images/cover.jpg");
    $portfolio->setLogoUrlSrcSet("images/logo-02.png 1x, images/logo-02@2x.png 2x");

    $portfolio->setEmail("name@example.com");
    $portfolio->setPhone("+1-202-555-0124");

    $portfolio->setGitHub("username");
    $portfolio->setLinkedIn("username");
    $portfolio->setMessenger("username");
    $portfolio->setSkype("username");
    $portfolio->setTelegram("username");

    $portfolio->makeSocialUrls();

    $portfolio->setContactDescription("Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur debitis magnam
                            perferendis quis fugiat porro saepe. Fugit adipisci cupiditate corrupti maiores dicta quas
                            in nobis eius recusandae?");

    // $portfolio->setShowContactForm(false);

    $portfolio->addEduHistoryItem([
        "imageSrc"         => "images/education-01.png",
        "imageSrcSet"      => "images/education-01.png 1x, images/education-01@2x.png 2x",
        "eduTitle"         => "M.Sc. Computer Science",
        "eduSchool"        => "ETH Zürich",
        "eduClue"          => "Thesis: “Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas, itaque.“",
        "eduYearMonthFrom" => [2012, 9],
        "eduYearMonthTo"   => [2014, 6],

        "moreInfoTitle"    => "Lorem Ipsum",
        "moreInfoDesc"     => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil adipisci
                                            eius esse necessitatibus veniam asperiores in pariatur dolorum cum sapiente
                                            sequi earum laboriosam officiis maiores a suscipit, consectetur rerum
                                            repellat excepturi est. Ullam quis quae atque soluta quia quas debitis enim
                                            voluptatibus excepturi eligendi incidunt quibusdam animi sunt ipsam odit,
                                            laudantium repudiandae mollitia odio. Ad reiciendis incidunt distinctio
                                            voluptas amet quo ab atque, neque esse architecto nostrum accusantium sint
                                            recusandae quibusdam quisquam sed a quas minima natus impedit quis eius.",
    ]);

    $portfolio->addEduHistoryItem([
        "imageSrc"         => "images/education-02.png",
        "imageSrcSet"      => "images/education-02.png 1x, images/education-02@2x.png 2x",
        "eduTitle"         => "B.Sc. Computer Science",
        "eduSchool"        => "The University of Tokyo",
        "eduClue"          => "Thesis: “Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas, itaque.”",
        "eduYearMonthFrom" => [2008, 9],
        "eduYearMonthTo"   => [2012, 6],

        "moreInfoTitle"    => "Lorem Ipsum",
        "moreInfoDesc"     => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil adipisci
                                            eius esse necessitatibus veniam asperiores in pariatur dolorum cum sapiente
                                            sequi earum laboriosam officiis maiores a suscipit, consectetur rerum
                                            repellat excepturi est. Ullam quis quae atque soluta quia quas debitis enim
                                            voluptatibus excepturi eligendi incidunt quibusdam animi sunt ipsam odit,
                                            laudantium repudiandae mollitia odio. Ad reiciendis incidunt distinctio
                                            voluptas amet quo ab atque, neque esse architecto nostrum accusantium sint
                                            recusandae quibusdam quisquam sed a quas minima natus impedit quis eius.",
    ]);

    $portfolio->addTestimonialItem(
        [
            "desc"   => "Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Optio adipisci amet voluptate rerum possimus repellendus molestiae consequuntur
                                    reprehenderit dicta quisquam.",
            "person" => "John Smith, CEO, Wire Inc.",
        ]
    );

    $portfolio->addTestimonialItem(
        [
            "desc"   => "Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Optio adipisci amet voluptate rerum possimus repellendus molestiae consequuntur
                                    reprehenderit dicta quisquam.",
            "person" => "Agnes Jackson, CTO, Acme Computers Ltd.",
        ],                                       
    );

    return $portfolio;
}

function set_portfolio_labels()
{
    $lb = PortfolioLabels::instance();
    $lb->setPageTitle("Home | Developer Portfolio");
    $lb->setPageMetaDescription("Personal portfolio template based on Google Material Design guidelines");

    $privacyPolicyUrl = "/privacy-policy/";
    $consentText      = str_replace("[PRIVACY_POLICY_URL]", $privacyPolicyUrl, $lb->getConsentInfoTpl());
    $lb->setConsentInfo($privacyPolicyUrl);

    return $lb;
}
