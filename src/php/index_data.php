<?php

require_once "php/SoboSingletonTrait.php";
require_once "php/ExactAccessorMethodTrait.php";

class PortfolioPlaceHolders
{
    use Soboutils\SoboSingletonTrait;
    use Soboutils\ExactAccessorMethodTrait;

    private $fullName = "";

    private $aboutMeFirstLine   = "";
    private $aboutMeSecondLine  = "";
    private $aboutMeDescription = "";
    private $moreAboutMe        = "";

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

    // $portfolio->setEmail("name@example.com");
    // $portfolio->setPhone("+1-202-555-0124");

    $portfolio->setGitHub("username");
    $portfolio->setLinkedIn("username");
    // $portfolio->setMessenger("username");
    // $portfolio->setSkype("username");
    // $portfolio->setTelegram("username");


    $portfolio->makeSocialUrls();

    return $portfolio;
}
