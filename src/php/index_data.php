<?php

require_once "index_classes.php";


function set_portfolio_data(): PortfolioPlaceHolders
{

    $portfolio = PortfolioPlaceHolders::instance();

    $res = $portfolio->updateSkillsFromJsonFile();

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
        "imageSrc"      => "images/education-01.png",
        "imageSrcSet"   => "images/education-01.png 1x, images/education-01@2x.png 2x",
        "eduTitle"      => "M.Sc. Computer Science",
        "eduSchool"     => "ETH Zürich",
        "eduClue"       => "Thesis: “Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas, itaque.“",
        "dtFrom"        => new_dt(2012, 9, 1),
        "dtTo"          => new_dt(2014, 6, 1),

        "moreInfoTitle" => "Lorem Ipsum",
        "moreInfoDesc"  => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil adipisci
                                            eius esse necessitatibus veniam asperiores in pariatur dolorum cum sapiente
                                            sequi earum laboriosam officiis maiores a suscipit, consectetur rerum
                                            repellat excepturi est. Ullam quis quae atque soluta quia quas debitis enim
                                            voluptatibus excepturi eligendi incidunt quibusdam animi sunt ipsam odit,
                                            laudantium repudiandae mollitia odio. Ad reiciendis incidunt distinctio
                                            voluptas amet quo ab atque, neque esse architecto nostrum accusantium sint
                                            recusandae quibusdam quisquam sed a quas minima natus impedit quis eius.",
    ]);

    $portfolio->addEduHistoryItem([
        "imageSrc"      => "images/education-02.png",
        "imageSrcSet"   => "images/education-02.png 1x, images/education-02@2x.png 2x",
        "eduTitle"      => "B.Sc. Computer Science",
        "eduSchool"     => "The University of Tokyo",
        "eduClue"       => "Thesis: “Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas, itaque.”",
        "dtFrom"        => new_dt(2008, 9, 1),
        "dtTo"          => new_dt(2012, 6, 1),

        "moreInfoTitle" => "",
        "moreInfoDesc"  => "",
    ]);

    $portfolio->addExperienceItem([
        "logoSrc"       => "images/experience-01.png",
        "logoSrcSet"    => "images/experience-01.png 1x, images/experience-01@2x.png 2x",
        "jobName"       => "Sr. Front-End JavaScript Engineer",
        "companyName"   => "PayPal",
        "location"      => "San Jose, CA",
        "dtFrom"        => new_dt(2008, 9, 1),
        "dtTo"          => new_dt(2012, 6, 1),
        "moreInfoTitle" => "Lorem Ipsum",
        "moreInfoDesc"  => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil adipisci
                                            eius esse necessitatibus veniam asperiores in pariatur dolorum cum sapiente
                                            sequi earum laboriosam officiis maiores a suscipit, consectetur rerum
                                            repellat excepturi est. Ullam quis quae atque soluta quia quas debitis enim
                                            voluptatibus excepturi eligendi incidunt quibusdam animi sunt ipsam odit,
                                            laudantium repudiandae mollitia odio. Ad reiciendis incidunt distinctio
                                            voluptas amet quo ab atque, neque esse architecto nostrum accusantium sint
                                            recusandae quibusdam quisquam sed a quas minima natus impedit quis eius.",
    ]);

    /*

    Jan 2016 - Sep 2018

    */
    $portfolio->addExperienceItem([
        "logoSrc"       => "images/experience-02.png",
        "logoSrcSet"    => "images/experience-02.png 1x, images/experience-02@2x.png 2x",
        "jobName"       => "Front-End Software Engineer",
        "companyName"   => "Microsoft",
        "location"      => "Redmond, WA",
        "dtFrom"        => new_dt(2016, 1, 1),
        "dtTo"          => new_dt(2018, 9, 1),
        "moreInfoTitle" => "Lorem Ipsum",
        "moreInfoDesc"  => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil adipisci
                                            eius esse necessitatibus veniam asperiores in pariatur dolorum cum sapiente
                                            sequi earum laboriosam officiis maiores a suscipit, consectetur rerum
                                            repellat excepturi est. Ullam quis quae atque soluta quia quas debitis enim
                                            voluptatibus excepturi eligendi incidunt quibusdam animi sunt ipsam odit,
                                            laudantium repudiandae mollitia odio. Ad reiciendis incidunt distinctio
                                            voluptas amet quo ab atque, neque esse architecto nostrum accusantium sint
                                            recusandae quibusdam quisquam sed a quas minima natus impedit quis eius.",
    ]);
    $portfolio->addExperienceItem([
        "logoSrc"       => "images/experience-3.png",
        "logoSrcSet"    => "images/experience-03.png 1x, images/experience-03@2x.png 2x",
        "jobName"       => "Jr. Front-End Software Engineer",
        "companyName"   => "Amazon",
        "location"      => "Seattle, WA",
        "dtFrom"        => new_dt(2014, 9, 1),
        "dtTo"          => new_dt(2015, 12, 1),
        "moreInfoTitle" => "Lorem Ipsum",
        "moreInfoDesc"  => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil adipisci
                                            eius esse necessitatibus veniam asperiores in pariatur dolorum cum sapiente
                                            sequi earum laboriosam officiis maiores a suscipit, consectetur rerum
                                            repellat excepturi est. Ullam quis quae atque soluta quia quas debitis enim
                                            voluptatibus excepturi eligendi incidunt quibusdam animi sunt ipsam odit,
                                            laudantium repudiandae mollitia odio. Ad reiciendis incidunt distinctio
                                            voluptas amet quo ab atque, neque esse architecto nostrum accusantium sint
                                            recusandae quibusdam quisquam sed a quas minima natus impedit quis eius.",
    ]);

    $portfolio->addExperienceItem([
        "logoSrc"       => "images/experience-01.png",
        "logoSrcSet"    => "images/experience-01.png 1x, images/experience-01@2x.png 2x",
        "jobName"       => "Sr. Front-End JavaScript Engineer",
        "companyName"   => "PayPal",
        "location"      => "San Jose, CA",
        "dtFrom"        => new_dt(2008, 9, 1),
        "dtTo"          => new_dt(2012, 6, 1),
        "moreInfoTitle" => "Lorem Ipsum",
        "moreInfoDesc"  => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil adipisci
                                            eius esse necessitatibus veniam asperiores in pariatur dolorum cum sapiente
                                            sequi earum laboriosam officiis maiores a suscipit, consectetur rerum
                                            repellat excepturi est. Ullam quis quae atque soluta quia quas debitis enim
                                            voluptatibus excepturi eligendi incidunt quibusdam animi sunt ipsam odit,
                                            laudantium repudiandae mollitia odio. Ad reiciendis incidunt distinctio
                                            voluptas amet quo ab atque, neque esse architecto nostrum accusantium sint
                                            recusandae quibusdam quisquam sed a quas minima natus impedit quis eius.",
    ]);

    /*

    Jan 2016 - Sep 2018

    */
    $portfolio->addExperienceItem([
        "logoSrc"       => "images/experience-02.png",
        "logoSrcSet"    => "images/experience-02.png 1x, images/experience-02@2x.png 2x",
        "jobName"       => "Front-End Software Engineer",
        "companyName"   => "Microsoft",
        "location"      => "Redmond, WA",
        "dtFrom"        => new_dt(2016, 1, 1),
        "dtTo"          => new_dt(2018, 9, 1),
        "moreInfoTitle" => "Lorem Ipsum",
        "moreInfoDesc"  => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil adipisci
                                            eius esse necessitatibus veniam asperiores in pariatur dolorum cum sapiente
                                            sequi earum laboriosam officiis maiores a suscipit, consectetur rerum
                                            repellat excepturi est. Ullam quis quae atque soluta quia quas debitis enim
                                            voluptatibus excepturi eligendi incidunt quibusdam animi sunt ipsam odit,
                                            laudantium repudiandae mollitia odio. Ad reiciendis incidunt distinctio
                                            voluptas amet quo ab atque, neque esse architecto nostrum accusantium sint
                                            recusandae quibusdam quisquam sed a quas minima natus impedit quis eius.",
    ]);

    $portfolio->addExperienceItem([
        "logoSrc"       => "images/experience-3.png",
        "logoSrcSet"    => "images/experience-03.png 1x, images/experience-03@2x.png 2x",
        "jobName"       => "Jr. Front-End Software Engineer",
        "companyName"   => "Amazon",
        "location"      => "Seattle, WA",
        "dtFrom"        => new_dt(2014, 9, 1),
        "dtTo"          => new_dt(2015, 12, 1),
        "moreInfoTitle" => "",
        "moreInfoDesc"  => "",
    ]);

    $portfolio->addTestimonialItem([
        "desc"   => "Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Optio adipisci amet voluptate rerum possimus repellendus molestiae consequuntur
                                    reprehenderit dicta quisquam.",
        "person" => "John Smith, CEO, Wire Inc.",
    ]);

    $portfolio->addTestimonialItem([
        "desc"   => "Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Optio adipisci amet voluptate rerum possimus repellendus molestiae consequuntur
                                    reprehenderit dicta quisquam.",
        "person" => "Agnes Jackson, CTO, Acme Computers Ltd.",
    ]);

    $portfolio->addProjectItem([
        "imgSrc"        => "images/project-01.png",
        "imgSrcSet"     => "images/project-01.png 1x, images/project-01@2x.png 2x",
        "title"         => "Project Title",
        "desc"          => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        "demoUrl"       => "https://www.example.com/proj1/demo/",
        "sourceUrl"     => "https://www.example.com/proj1/src/",
    //     "moreInfoTitle" => "Lorem Ipsum",
    //     "moreInfoDesc"  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aut
    //                             velit aspernatur nam magnam, inventore minima totam ut illo quas!
    //                             Aperiam, similique. Culpa quod possimus debitis et repellendus sequi ex
    //                             incidunt. Doloribus nobis itaque reiciendis quidem dolor at similique
    //                             quod cumque ea dolorem, nostrum molestiae ab sit omnis odio repudiandae?
    // ",
    ]);

    $portfolio->addProjectItem([
        "imgSrc"        => "images/project-02.png",
        "imgSrcSet"     => "images/project-02.png 1x, images/project-02@2x.png 2x",
        "title"         => "Project Title",
        "desc"          => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        "demoUrl"       => "https://www.example.com/proj2/demo/",
        // "sourceUrl"     => "https://www.example.com/proj2/src/",
        "moreInfoTitle" => "Lorem Ipsum",
        "moreInfoDesc"  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aut
                                velit aspernatur nam magnam, inventore minima totam ut illo quas!
                                Aperiam, similique. Culpa quod possimus debitis et repellendus sequi ex
                                incidunt. Doloribus nobis itaque reiciendis quidem dolor at similique
                                quod cumque ea dolorem, nostrum molestiae ab sit omnis odio repudiandae?
    ",
    ]);

    $portfolio->addProjectItem([
        "imgSrc"        => "images/project-03.png",
        "imgSrcSet"     => "images/project-03.png 1x, images/project-03@2x.png 2x",
        "title"         => "Project Title",
        "desc"          => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        // "demoUrl"       => "https://www.example.com/proj3/demo/",
        "sourceUrl"     => "https://www.example.com/proj3/src/",
        "moreInfoTitle" => "Lorem Ipsum",
        "moreInfoDesc"  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aut
                                velit aspernatur nam magnam, inventore minima totam ut illo quas!
                                Aperiam, similique. Culpa quod possimus debitis et repellendus sequi ex
                                incidunt. Doloribus nobis itaque reiciendis quidem dolor at similique
                                quod cumque ea dolorem, nostrum molestiae ab sit omnis odio repudiandae?
    ",
    ]);

    $portfolio->addProjectItem([
        "imgSrc"        => "images/project-04.png",
        "imgSrcSet"     => "images/project-04.png 1x, images/project-04@2x.png 2x",
        "title"         => "Project Title",
        "desc"          => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        "demoUrl"       => "https://www.example.com/proj4/demo/",
        "sourceUrl"     => "https://www.example.com/proj4/src/",
        "moreInfoTitle" => "Lorem Ipsum",
        "moreInfoDesc"  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aut
                                velit aspernatur nam magnam, inventore minima totam ut illo quas!
                                Aperiam, similique. Culpa quod possimus debitis et repellendus sequi ex
                                incidunt. Doloribus nobis itaque reiciendis quidem dolor at similique
                                quod cumque ea dolorem, nostrum molestiae ab sit omnis odio repudiandae?
    ",
    ]);

    $portfolio->addProjectItem([
        "imgSrc"        => "images/project-05.png",
        "imgSrcSet"     => "images/project-05.png 1x, images/project-05@2x.png 2x",
        "title"         => "Project Title",
        "desc"          => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        "demoUrl"       => "https://www.example.com/proj5/demo/",
        "sourceUrl"     => "https://www.example.com/proj5/src/",
        "moreInfoTitle" => "Lorem Ipsum",
        "moreInfoDesc"  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aut
                                velit aspernatur nam magnam, inventore minima totam ut illo quas!
                                Aperiam, similique. Culpa quod possimus debitis et repellendus sequi ex
                                incidunt. Doloribus nobis itaque reiciendis quidem dolor at similique
                                quod cumque ea dolorem, nostrum molestiae ab sit omnis odio repudiandae?
    ",
    ]);

    $portfolio->addProjectItem([
        "imgSrc"        => "images/project-06.png",
        "imgSrcSet"     => "images/project-06.png 1x, images/project-06@2x.png 2x",
        "title"         => "Project Title",
        "desc"          => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        "demoUrl"       => "https://www.example.com/proj6/demo/",
        "sourceUrl"     => "https://www.example.com/proj6/src/",
        "moreInfoTitle" => "Lorem Ipsum",
        "moreInfoDesc"  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aut
                                velit aspernatur nam magnam, inventore minima totam ut illo quas!
                                Aperiam, similique. Culpa quod possimus debitis et repellendus sequi ex
                                incidunt. Doloribus nobis itaque reiciendis quidem dolor at similique
                                quod cumque ea dolorem, nostrum molestiae ab sit omnis odio repudiandae?
    ",
    ]);

    $portfolio->addProjectItem([
        "imgSrc"        => "images/project-07.png",
        "imgSrcSet"     => "images/project-07.png 1x, images/project-07@2x.png 2x",
        "title"         => "Project Title",
        "desc"          => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        "demoUrl"       => "https://www.example.com/proj7/demo/",
        "sourceUrl"     => "https://www.example.com/proj7/src/",
        "moreInfoTitle" => "Lorem Ipsum",
        "moreInfoDesc"  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aut
                                velit aspernatur nam magnam, inventore minima totam ut illo quas!
                                Aperiam, similique. Culpa quod possimus debitis et repellendus sequi ex
                                incidunt. Doloribus nobis itaque reiciendis quidem dolor at similique
                                quod cumque ea dolorem, nostrum molestiae ab sit omnis odio repudiandae?
    ",
    ]);

    $portfolio->addProjectItem([
        "imgSrc"        => "images/project-08.png",
        "imgSrcSet"     => "images/project-08.png 1x, images/project-08@2x.png 2x",
        "title"         => "Project Title",
        "desc"          => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        "demoUrl"       => "https://www.example.com/proj8/demo/",
        "sourceUrl"     => "https://www.example.com/proj8/src/",
        "moreInfoTitle" => "Lorem Ipsum",
        "moreInfoDesc"  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aut
                                velit aspernatur nam magnam, inventore minima totam ut illo quas!
                                Aperiam, similique. Culpa quod possimus debitis et repellendus sequi ex
                                incidunt. Doloribus nobis itaque reiciendis quidem dolor at similique
                                quod cumque ea dolorem, nostrum molestiae ab sit omnis odio repudiandae?
    ",
    ]);

    $portfolio->addProjectItem([
        "imgSrc"        => "images/project-01.png",
        "imgSrcSet"     => "images/project-01.png 1x, images/project-01@2x.png 2x",
        "title"         => "Project Title",
        "desc"          => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        "demoUrl"       => "https://www.example.com/proj9/demo/",
        "sourceUrl"     => "https://www.example.com/proj9/src/",
        "moreInfoTitle" => "Lorem Ipsum",
        "moreInfoDesc"  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aut
                                velit aspernatur nam magnam, inventore minima totam ut illo quas!
                                Aperiam, similique. Culpa quod possimus debitis et repellendus sequi ex
                                incidunt. Doloribus nobis itaque reiciendis quidem dolor at similique
                                quod cumque ea dolorem, nostrum molestiae ab sit omnis odio repudiandae?
    ",
    ]);

    $portfolio->addProjectItem([
        "imgSrc"        => "images/project-02.png",
        "imgSrcSet"     => "images/project-02.png 1x, images/project-02@2x.png 2x",
        "title"         => "Project Title",
        "desc"          => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        "demoUrl"       => "https://www.example.com/proj10/demo/",
        "sourceUrl"     => "https://www.example.com/proj10/src/",
        "moreInfoTitle" => "Lorem Ipsum",
        "moreInfoDesc"  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aut
                                velit aspernatur nam magnam, inventore minima totam ut illo quas!
                                Aperiam, similique. Culpa quod possimus debitis et repellendus sequi ex
                                incidunt. Doloribus nobis itaque reiciendis quidem dolor at similique
                                quod cumque ea dolorem, nostrum molestiae ab sit omnis odio repudiandae?
    ",
    ]);

    $portfolio->addProjectItem([
        "imgSrc"        => "images/project-03.png",
        "imgSrcSet"     => "images/project-03.png 1x, images/project-03@2x.png 2x",
        "title"         => "Project Title",
        "desc"          => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        "demoUrl"       => "https://www.example.com/proj11/demo/",
        "sourceUrl"     => "https://www.example.com/proj11/src/",
        "moreInfoTitle" => "Lorem Ipsum",
        "moreInfoDesc"  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aut
                                velit aspernatur nam magnam, inventore minima totam ut illo quas!
                                Aperiam, similique. Culpa quod possimus debitis et repellendus sequi ex
                                incidunt. Doloribus nobis itaque reiciendis quidem dolor at similique
                                quod cumque ea dolorem, nostrum molestiae ab sit omnis odio repudiandae?
    ",
    ]);

    $portfolio->addProjectItem([
        "imgSrc"        => "images/project-04.png",
        "imgSrcSet"     => "images/project-04.png 1x, images/project-04@2x.png 2x",
        "title"         => "Project Title",
        "desc"          => "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        "demoUrl"       => "https://www.example.com/proj12/demo/",
        "sourceUrl"     => "https://www.example.com/proj12/src/",
        "moreInfoTitle" => "Lorem Ipsum",
        "moreInfoDesc"  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aut
                                velit aspernatur nam magnam, inventore minima totam ut illo quas!
                                Aperiam, similique. Culpa quod possimus debitis et repellendus sequi ex
                                incidunt. Doloribus nobis itaque reiciendis quidem dolor at similique
                                quod cumque ea dolorem, nostrum molestiae ab sit omnis odio repudiandae?
    ",
    ]);



    return $portfolio;
}

function set_portfolio_labels()
{
    $lb = PortfolioLabels::instance();
    $lb->setPageTitle("Home | Developer Portfolio");
    $lb->setPageMetaDescription("Personal portfolio template based on Google Material Design guidelines");

    $privacyPolicyUrl = "/privacy-policy/";
    $consentText      = str_replace("[PRIVACY_POLICY_URL]", $privacyPolicyUrl, $lb->getConsentInfoTpl());
    $lb->setConsentInfo($consentText);

    return $lb;
}
