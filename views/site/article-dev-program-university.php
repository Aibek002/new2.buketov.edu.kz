<?php
use app\components\LanguageHelper;
use yii\helpers\Html;
use app\assets\ArticleAsset;
ArticleAsset::register($this);
?>
<div class="bg-light p-5 mb-4 rounded-3">
    <div class="title-content d-flex flex-column ">
        <h1 class="title-content-text"><?= Yii::t('app', 'Development Program of the University') ?></h1>

        <div class="welcome-box">
            <p>
                <?= Yii::t('app', 'By the Resolution of the Government of the Republic of Kazakhstan dated April 5, 2024 No. 258, in accordance with subparagraph 8) of Article 3 of the Law of the Republic of Kazakhstan "On Science" and subparagraph 21-6) of Article 1 of the Law of the Republic of Kazakhstan "On Education", the Government of the Republic of Kazakhstan RESOLVES: 1. To grant the status of a research university to the Non-Profit Joint-Stock Company "Karaganda University named after Academician E. A. Buketov". 2. To approve the Development Program of the Non-Profit Joint-Stock Company "Karaganda University named after Academician E. A. Buketov" for 2024–2028. 3. This Resolution shall enter into force from the date of its signing.') ?>
            </p>

            <div class="row mb-2">

                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">
                                <?= Yii::t('app', 'KarNRU') ?>
                            </strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="#">
                                    <?= Yii::t('app', 'Development Program Overview') ?>
                                </a>
                            </h3>
                            <p class="card-text mb-auto">
                                <?= Yii::t('app', 'An overview of the development program defining the university’s strategic directions, goals, and key priorities.') ?>
                            </p><br>
                            <p>
                                <a class="btn btn-secondary" href="#" role="button" data-bs-toggle="modal"
                                    data-bs-target="#readMoreOverviewModal">
                                    <?= Yii::t('app', 'Read more') ?>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-success">
                                <?= Yii::t('app', 'KarNRU') ?>
                            </strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="#">
                                    <?= Yii::t('app', 'Current Status and Achievements') ?>
                                </a>
                            </h3>
                            <p class="card-text mb-auto">
                                <?= Yii::t('app', 'A brief overview of the university’s current development level, key achievements, potential, and future opportunities.') ?>
                            </p><br>
                            <p>
                                <a class="btn btn-secondary" href="#" role="button" data-bs-toggle="modal"
                                    data-bs-target="#readMoreNOWModal">
                                    <?= Yii::t('app', 'Read more') ?>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">
                                <?= Yii::t('app', 'KarNRU') ?>
                            </strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="#">
                                    <?= Yii::t('app', 'Action Plan for Target Indicators Implementation') ?>
                                </a>
                            </h3>
                            <p class="card-text mb-auto">
                                <?= Yii::t('app', 'Action plan for implementing the target indicators of the Development Program of Karaganda University named after Academician E. A. Buketov (2024–2028).') ?>
                            </p><br>
                            <p>
                                <a class="btn btn-secondary" href="#" role="button" data-bs-toggle="modal"
                                    data-bs-target="#readMore1Modal">
                                    <?= Yii::t('app', 'Read more') ?>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-success">
                                <?= Yii::t('app', 'KarNRU') ?>
                            </strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="#">
                                    <?= Yii::t('app', 'Target Indicators of the Development Program') ?>
                                </a>
                            </h3>
                            <p class="card-text mb-auto">
                                <?= Yii::t('app', 'Target indicators of the Development Program of the Non-Profit Joint-Stock Company "Karaganda University named after Academician E. A. Buketov".') ?>
                            </p><br>
                            <p>
                                <a class="btn btn-secondary" href="#" role="button" data-bs-toggle="modal"
                                    data-bs-target="#readMore2Modal">
                                    <?= Yii::t('app', 'Read more') ?>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
</div>

</div>

<div class="modal fade" id="readMoreOverviewModal" tabindex="-1" aria-labelledby="readMoreModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="readMoreModalLabel">
                    <?= Yii::t('app', 'Development Program Overview') ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p><?= Yii::t('app', 'On approval of the Development Program of Karaganda National Research University named after Academician E. A. Buketov for 2024–2028') ?>
                </p>
                <p><?= Yii::t('app', 'By Resolution of the Government of the Republic of Kazakhstan dated April 5, 2024 No. 258, in accordance with subparagraph 8) of Article 3 of the Law of the Republic of Kazakhstan "On Science" and subparagraph 21-6) of Article 1 of the Law of the Republic of Kazakhstan "On Education", the Government of the Republic of Kazakhstan RESOLVES:') ?>
                </p>
                <p><?= Yii::t('app', 'To grant the status of a research university to the Non-Profit Joint-Stock Company "Karaganda National Research University named after Academician E. A. Buketov".') ?>
                </p>
                <p><?= Yii::t('app', 'To approve the attached Development Program of the Non-Profit Joint-Stock Company "Karaganda National Research University named after Academician E. A. Buketov" for 2024–2028.') ?>
                </p>
                <p><?= Yii::t('app', 'This Resolution shall enter into force from the date of its signing.') ?></p>
                <p><?= Yii::t('app', 'DEVELOPMENT PROGRAM of Karaganda National Research University named after Academician E. A. Buketov for 2024–2028') ?>
                </p>
                <p><?= Yii::t('app', 'Basis for the development of the Program') ?></p>
                <p><?= Yii::t('app', 'The Program was developed on the basis of the following regulatory and strategic documents:') ?>
                </p>
                <p><?= Yii::t('app', 'Law of the Republic of Kazakhstan "On Science";') ?></p>
                <p><?= Yii::t('app', 'Law of the Republic of Kazakhstan "On Education";') ?></p>
                <p><?= Yii::t('app', 'Address of the President of the Republic of Kazakhstan K. K. Tokayev to the People of Kazakhstan dated September 1, 2023 "The Economic Course of a Fair Kazakhstan";') ?>
                </p>
                <p><?= Yii::t('app', 'Order of the Minister of Education and Science of the Republic of Kazakhstan No. 590 dated October 25, 2018.') ?>
                </p>
                <p><?= Yii::t('app', 'Developer of the Program') ?></p>
                <p><?= Yii::t('app', 'The Program was developed by the Ministry of Science and Higher Education of the Republic of Kazakhstan.') ?>
                </p>
                <p><?= Yii::t('app', 'Purpose of the Program') ?></p>
                <p><?= Yii::t('app', 'To transform Karaganda National Research University named after Academician E. A. Buketov into a modern research university that meets international standards.') ?>
                </p>
                <p><?= Yii::t('app', 'Objectives of the Program') ?></p>
                <p><?= Yii::t('app', 'Effective integration of scientific activity and the educational process;') ?></p>
                <p><?= Yii::t('app', 'Development of scientific research and implementation of its results at all levels of higher and postgraduate education;') ?>
                </p>
                <p><?= Yii::t('app', 'Ensuring equal access to quality education and attracting talented youth;') ?></p>
                <p><?= Yii::t('app', 'Strengthening the intellectual potential of the country through fundamental and applied research;') ?>
                </p>
                <p><?= Yii::t('app', 'Commercialization of research results and their integration into the regional economy;') ?>
                </p>
                <p><?= Yii::t('app', 'Enhancing the university’s contribution to social development and public engagement.') ?>
                </p>
                <p><?= Yii::t('app', 'Implementation period of the Program') ?></p>
                <p><?= Yii::t('app', '2024–2028') ?></p>
                <p><?= Yii::t('app', 'Sources of financing') ?></p>
                <p><?= Yii::t('app', 'The Program shall be implemented using the university’s own funds and attracted budgetary investments.') ?>
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <?= Yii::t('app', 'Close') ?>
                </button>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="readMoreNOWModal" tabindex="-1" aria-labelledby="readMoreModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="readMoreModalLabel">
                    <?= Yii::t('app', 'Development Program Overview') ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <br><?= Yii::t('app', 'The Development Program of Karaganda National Research University named after Academician E.A. Buketov (hereinafter – KarNRU) was approved by Resolution No. 248 of the Government of the Republic of Kazakhstan dated March 28, 2023.') ?>

                <br><?= Yii::t('app', 'It was developed in accordance with the "Concept for the Development of Higher Education and Science in the Republic of Kazakhstan for 2023–2029" (hereinafter – the Concept).') ?>

                <br><?= Yii::t('app', 'KarNRU actively contributes to the scientific, technical, and socio-economic development of the Karaganda region and serves as a leader in higher and postgraduate education in the region.') ?>

                <br>
                <?= Yii::t('app', 'The University creates conditions aimed at training qualified specialists who can contribute to regional and national progress, while ensuring a full integration of academic activity and innovative projects.') ?>

                <br><?= Yii::t('app', 'The Development Program of KarNRU aims at sustainable development as a classical research university, providing opportunities for personnel training, conducting advanced research, and implementing new social, humanitarian, and creative projects, in line with the priorities of scientific and technological development in the northern and central regions of Kazakhstan and nationwide.') ?>

                <br><?= Yii::t('app', 'KarNRU researchers carry out fundamental and applied research in priority areas defined by state policy in science and education.') ?>

                <br><?= Yii::t('app', 'According to indicators of scientific activity and the transfer of technologies to the real sector of the economy, KarNRU ensures a leading position among higher and postgraduate educational institutions in Kazakhstan.') ?>

                <br><?= Yii::t('app', 'The University develops cooperation with enterprises, large state companies, and scientific institutes within the framework of contract research and commercialization of scientific developments.') ?>

                <br><?= Yii::t('app', 'KarNRU implements educational programs at all levels that allow graduates to acquire fundamental knowledge, develop research creativity, master competencies in the digital economy, and apply research results to the regional economy and social sphere.') ?>

                <br><?= Yii::t('app', 'Training highly qualified personnel in master’s and PhD programs is a key priority.') ?>

                <br><?= Yii::t('app', 'KarNRU is a major scientific and methodological center that trains highly qualified personnel for all sectors of the economy. For this purpose, extensive educational programs are implemented at the bachelor, master, and doctoral levels.') ?>

                <br><?= Yii::t('app', 'The University continues to update educational programs in accordance with the priorities of the scientific and technological development strategy of Kazakhstan and the requirements of the digital economy.') ?>
                <br><?= Yii::t('app', 'KarNRU has a balanced and creative personnel composition. By creating an advanced incentive system, the policy of attracting and retaining staff becomes a key direction of personnel management.') ?>

                <br><?= Yii::t('app', 'During the transformation into a research university, the synergy of education and scientific activity is ensured. This strengthens key aspects determining the socio-economic value of KarNRU:') ?>

                <br><?= Yii::t('app', 'Improvement of education quality – students gain access to modern research and innovative teaching methods, enhancing their professional skills and competitiveness in the labor market.') ?>
                <br><?= Yii::t('app', 'Development of scientific research – opportunities increase to conduct large-scale and significant studies through attracting external funding and strengthening the University’s scientific schools.') ?>

                <br><?= Yii::t('app', 'Strengthening industry ties – integration of science and education contributes to the development of innovative solutions and technologies demanded by the market, enhancing cooperation with enterprises and organizations.') ?>

                <br><?= Yii::t('app', 'University ranking positions – thanks to achievements in research and education, KarNRU’s positions in national and international rankings are strengthened.') ?>

                <br><?= Yii::t('app', 'International cooperation and attractiveness – expanding ties with foreign universities and research organizations and participating in international scientific projects enhances the University’s reputation globally.') ?>

                <br><?= Yii::t('app', 'Social responsibility – the University’s contribution to regional and national socio-economic development is strengthened through applied research and projects aimed at solving current societal problems and involving young scientists and students in scientific, educational, and social initiatives.') ?>

                <br><?= Yii::t('app', 'The goals and objectives set out in the KarNRU Development Program are aimed at coordinating scientific research with practical industrial activities and enhancing the level of higher education.') ?>
                <br><?= Yii::t('app', 'This approach contributes to sustainable economic development and progress in the Karaganda region, as well as strengthens the University as a scientific and technological leader in Kazakhstan and the region.') ?>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <?= Yii::t('app', 'Close') ?>
                </button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="readMore1Modal" tabindex="-1" aria-labelledby="readMoreModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="readMoreModalLabel">
                    <?= Yii::t('app', 'Development Program Overview') ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <?= Yii::t('app', 'Karaganda National Research University named after Academician E.A. Buketov (hereinafter – KarNRU) is one of the largest and most multidisciplinary universities in the Republic of Kazakhstan.') ?>

                <?= Yii::t('app', 'The University trains bachelors in 28 fields, masters in 24 fields, and PhD doctors in 10 fields of study.') ?>

                <?= Yii::t('app', 'Currently, about 14,000 students, master’s students, and PhD doctoral students study at 12 faculties of KarNRU.') ?>

                <?= Yii::t('app', 'KarNRU implements more than 140 educational programs at the bachelor’s, master’s, and PhD levels, all of which have passed institutional and specialized accreditation.') ?>

                <?= Yii::t('app', 'The University develops in accordance with the key principles of the Bologna Declaration and modern trends of the global educational space.') ?>

                <?= Yii::t('app', 'At the same time, systematic work is carried out in the areas of humanization of education, prioritization of universal human values, internationalization, and globalization of the educational process.') ?>

                <?= Yii::t('app', 'Curricula and educational program content widely apply multidisciplinary and interdisciplinary approaches.') ?>

                <?= Yii::t('app', 'Certain course modules are taught in English.') ?>

                <?= Yii::t('app', 'In particular, PhD doctoral programs in Chemistry, as well as master’s programs such as "Foreign Language: Two Foreign Languages", "Foreign Philology", and "World Economy", are fully delivered in English.') ?>

                <?= Yii::t('app', 'KarNRU pays special attention to the development and implementation of new and innovative educational programs, including projects in cooperation with leading domestic and foreign universities.') ?>

                <?= Yii::t('app', 'The University successfully implements trilingual programs, dual degree programs, as well as formal, non-formal, and informal educational mechanisms.') ?>

                <?= Yii::t('app', 'Forty-nine percent of educational programs are implemented using distance learning technologies.') ?>

                <?= Yii::t('app', 'The international activities of KarNRU are actively developing.') ?>

                <?= Yii::t('app', 'The University has established cooperation with more than 150 foreign universities and research centers through agreements, contracts, and memoranda.') ?>

                <?= Yii::t('app', 'Academic mobility of students and faculty members is actively implemented within the framework of internationalization of the educational process.') ?>

                <?= Yii::t('app', 'The attractiveness of KarNRU for foreign citizens is growing annually.') ?>

                <?= Yii::t('app', 'Approximately 60 foreign students from Azerbaijan, Armenia, Germany, China, Mongolia, Russia, Ukraine, Uzbekistan, and other countries are admitted annually.') ?>

                <?= Yii::t('app', 'Within academic mobility programs, about 100 foreign students study at KarNRU each year for one to two semesters.') ?>

                <?= Yii::t('app', 'Within the program "Attracting Foreign Scientists Funded by the Republican Budget", 16 foreign scientists from Bulgaria, Finland, Russia, Italy, Estonia, and other countries were invited in 2020–2023.') ?>

                <?= Yii::t('app', 'Under free cooperation agreements, 33 scientists and lecturers from the USA, Finland, Poland, Hungary, Greece, Turkey, Kyrgyzstan, and other countries were invited to deliver lectures and exchange experience.') ?>

                <?= Yii::t('app', 'In addition, 98 foreign scientists were invited at the expense of KarNRU funds during 2020–2023.') ?>

                <?= Yii::t('app', 'KarNRU consistently holds leading positions in national and international rankings.') ?>

                <?= Yii::t('app', 'The University is among the leaders according to the rankings of the Independent Agency for Quality Assurance in Education and accreditation and independent rating agencies.') ?>

                <?= Yii::t('app', 'In the QS World University Rankings, the University is ranked 851+, and in the QS Asia Rankings it holds the 206th position.') ?>

                <?= Yii::t('app', 'The academic staff of KarNRU possesses strong scientific potential.') ?>

                <?= Yii::t('app', 'The University employs 921 faculty members, including 62 Doctors of Science, 277 Candidates of Science, 117 PhD holders, and 447 Masters of Science.') ?>

                <?= Yii::t('app', 'The faculty includes 47 graduates of the Bolashak international scholarship program.') ?>

                <?= Yii::t('app', 'KarNRU lecturers have received the title "Best University Teacher" 196 times and "Best Researcher" 7 times.') ?>

                <?= Yii::t('app', 'The scientific infrastructure of KarNRU includes 20 research institutes, centers, and laboratories.') ?>

                <?= Yii::t('app', 'The University conducts fundamental and applied research in nanotechnology, synthesis of new materials, biotechnology, social sciences, law, archaeology, green energy, and digital economy.') ?>

                <?= Yii::t('app', 'KarNRU is implementing 112 scientific projects with a total value of 1.6 billion tenge, including grant-funded and program-targeted projects.') ?>

                <?= Yii::t('app', 'Three major megagrants for 2023–2025 further demonstrate the high level of the University’s scientific potential.') ?>

                <?= Yii::t('app', 'To support young scientists, KarNRU annually holds internal grant competitions.') ?>

                <?= Yii::t('app', 'In 2023, more than 57 million tenge were allocated for these purposes.') ?>

                <?= Yii::t('app', 'The University operates a Council of Young Scientists uniting 359 young researchers, as well as 38 student scientific clubs.') ?>

                <?= Yii::t('app', 'KarNRU hosts 11 dissertation councils authorized to award PhD and профиль doctoral degrees, further strengthening its scientific and educational potential.') ?>

                <?= Yii::t('app', 'The University publishes 10 scientific journals, some of which are indexed in international databases such as Web of Science and Scopus, ensuring international recognition of KarNRU’s scientific publications.') ?>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <?= Yii::t('app', 'Close') ?>
                </button>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="readMore2Modal" tabindex="-1" aria-labelledby="readMoreModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="readMoreModalLabel">
                    <?= Yii::t('app', 'Development Program Overview') ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
               <?= Yii::t('app', 'In the context of accelerating globalization processes, the formation of a green economy, and the promotion of sustainable development principles, innovation policy is defined as a decisive factor in the diversification of the national economy and the formation of a competitive innovation model. In the era of the Fourth Industrial Revolution, the priorities of scientific knowledge are shifting toward the close integration of natural and engineering sciences with life sciences. According to the founder of the World Economic Forum, K. Schwab, the key megatrends of the 21st century are characterized by scientific and technological breakthroughs at the intersection of biology, physics, and information technologies. The implementation of transdisciplinary and interdisciplinary technologies requires significant material and intellectual resources; however, such investments are fully justified economically and socially in the long term. This, in turn, creates the need to train highly qualified specialists capable of working with high-tech equipment, comprehensively analyzing acquired data, and understanding the advantages of transdisciplinary interaction alongside narrow professional specialization. The most favorable institutional environment for training such specialists is provided by multidisciplinary classical universities with diversified research centers. An analysis of the experience of leading foreign research universities (Stanford University, the University of Texas at Austin, Manchester Metropolitan University, and others) makes it possible to identify the following key characteristics: attracting faculty with strong scientific reputations; developing modern research infrastructure; offering a wide range of research programs that reflect the interests of the university community; stimulating interdisciplinary research and collaboration among professional teams; establishing effective mechanisms for transferring scientific discoveries and innovations to the real sector of the economy; maintaining a stable position in the international scientific and educational space; and actively participating in addressing the economic, social, and cultural challenges of society.') ?>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <?= Yii::t('app', 'Close') ?>
                </button>
            </div>

        </div>
    </div>
</div>