<?php

require_once "php/SoboSingletonTrait.php";
require_once "php/ExactAccessorMethodTrait.php";

function new_dt($year, $month, $day)
{
    $dt = new DateTime();
    $dt->setDate($year, $month, $day);
    return $dt;
}

function no_rows_for_cols_items($noCols, $noItems)
{
    return ceil($noItems / $noCols);
}

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
    private $myWork      = "My work";
    private $contactMe   = "Contact me";
    private $present     = "Present";

    private $demo   = "Demo";
    private $source = "Source";

    private $showList  = "SHOW LIST";
    private $showChart = "SHOW CHART";

    private $yearSince = "Since";

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
    private $experience   = [];
    private $projects     = [];

    private $skills = [];

    private $skillsShowChartDefault = false;

    private $showContactForm = true;

    public function addEduHistoryItem($item)
    {
        $this->eduHistory[] = $item;
    }

    public function addTestimonialItem($item)
    {
        $this->testimonials[] = $item;
    }
    public function addExperienceItem($item)
    {
        $this->experience[] = $item;
    }

    public function addProjectItem($item)
    {
        $this->projects[] = $item;
    }

    public function addSkillItem($item)
    {
        $this->skills[] = $item;
    }

    public function updateSkillsFromJsonFile($filePath = "js/config/data.json")
    {
        if (! file_exists($filePath)) {
            return [];
        }

        $skillsText = file_get_contents($filePath);
        if (empty($skillsText)) {
            return [];
        }

        $skillsList = json_decode($skillsText, true);

        if (empty($skillsList)) {
            return [];
        }

        foreach ($skillsList as $skill) {
            if (empty($skill["name"])) {
                continue;
            }

            $itemOut = [
                "name"          => $skill["name"],
                "yearSince"     => "",
                "children"      => [],
                "childrenNames" => [],
            ];

            if (! empty($skill["yearSince"])) {
                $itemOut["yearSince"] = strval($skill["yearSince"]);
            }

            if (! empty($skill["children"])) {
                foreach ($skill["children"] as $childSkill) {
                    if (empty($childSkill["name"])) {
                        continue;
                    }
                    $itemOut["children"][]      = $childSkill;
                    $itemOut["childrenNames"][] = $childSkill["name"];
                }
            }
            $this->addSkillItem($itemOut);
        }

        return $this->skills;
    }

    // booleans

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
