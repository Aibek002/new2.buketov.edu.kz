<?php
use app\components\LanguageHelper;
use yii\helpers\Html;
use app\assets\ArticleAsset;
ArticleAsset::register($this);
?>
<div class="title-content p-5 m-5">
    <h1 class="title-content-text"><?= Yii::t('app', 'History of the University') ?></h1>
<div class="history-university d-flex flex-nowrap justify-content-center align-items-center flex-wrap gap-3">
    <div class=" history-box first p-5">
        <div class="element d-flex flex-column align-items-end justify-content-end gap-3">
            <h2 class="title-history text-end">
                <?= Yii::t('app', 'History of the University 1938-1992') ?>
            </h2>
            <button onclick="openModal('first_item')"><?= Yii::t('app', 'View') ?></button>
        </div>
    </div>
    <div class=" history-box second p-5">
        <div class="element d-flex flex-column align-items-end justify-content-end gap-3">
            <h2 class="title-history text-end"><?= Yii::t('app', 'Important events of 2000-2009') ?></h2>
            <button onclick="openModal('second_item')"><?= Yii::t('app', 'View') ?></button>
        </div>
    </div>
    <div class=" history-box third p-5">
        <div class="element d-flex flex-column align-items-end justify-content-end gap-3">
            <h2 class="title-history text-end"><?= Yii::t('app', 'University today 2010-2025') ?></h2>
            <button onclick="openModal('third_item')"><?= Yii::t('app', 'View') ?></button>
        </div>
    </div>
</div>
<div id="first_item" class="modal-overlay" onclick="closeModal(event)">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal()">×</button>


        <h3><?= Yii::t('app', 'Key milestones in the history of the university') ?></h3>

        <ul class="history-timeline">
            <li><strong>1938</strong> — <?= Yii::t('app', 'Opening of the Karaganda Teachers Institute') ?></li>
            <li><strong>1952</strong> —
                <?= Yii::t('app', 'The Karaganda Teachers Institute was transformed into a Pedagogical Institute') ?>
            </li>
            <li><strong>1972</strong> —
                <?= Yii::t('app', 'The Pedagogical Institute was transformed into Karaganda State University') ?>
            </li>
            <li><strong>1992</strong> —
                <?= Yii::t('app', 'Karaganda State University was named after Academician Evney Arstanovich Buketov') ?>
            </li>
        </ul>

        <p>
            <?= Yii::t('app', 'The first enrollment of students at the Karaganda Teachers Institute consisted of only 117 people. The institute trained teachers of history, Kazakh language and literature, and Russian language and literature. There were only four departments: Marxism-Leninism, pedagogy, language and literature, and history.') ?>
        </p>

        <p>
            <?= Yii::t('app', 'The teaching staff included historians and philologists with pre-revolutionary pedagogical experience who had been released from the Karlag labor camp. They and their students laid the foundation of higher education in the region.') ?>
        </p>

        <p>
            <?= Yii::t('app', 'The first library collection consisted of 7,000 books donated by the Herzen Leningrad Pedagogical Institute. The institute was headed by R.R. Repalova, a former secondary school principal.') ?>
        </p>

        <p>
            <?= Yii::t('app', 'The Karaganda Pedagogical Institute had eight departments, including Marxism-Leninism, history, Kazakh and Russian language and literature, pedagogy and psychology, physics and mathematics, chemistry and biology, and physical education.') ?>
        </p>

        <p>
            <?= Yii::t('app', 'The institute employed 82 teachers, including one Doctor of Sciences and 16 Candidates of Sciences. The rector was mathematician S.B. Baimurzin. The first graduation numbered 318 students.') ?>
        </p>

        <p>
            <?= Yii::t('app', 'In 1958, the first collection of scientific papers titled "Scholarly Notes" was published. In 1962, the first postgraduate programs were opened in four departments: Russian and foreign literature, pedagogy and psychology, chemistry, and zoology.') ?>
        </p>

        <p>
            <?= Yii::t('app', 'By the early 1970s, the Karaganda Pedagogical Institute had become a first-category university with 22 departments, six faculties, and 5,440 students. The institute trained 890 specialists.') ?>
        </p>

        <p>
            <?= Yii::t('app', 'In March 1972, the grand opening of Karaganda State University took place, attended by the renowned Kazakh writer Sabit Mukanov. Doctor of Technical Sciences, Professor Evney Arstanovich Buketov, was appointed rector.') ?>
        </p>

        <p>
            <?= Yii::t('app', 'Under his leadership, a modern material and technical base and scientific infrastructure were created. E.A. Buketov authored more than 200 scientific works, nine monographs, and 90 patented inventions in the USA, Canada, Australia, Sweden, Finland, Germany, Italy, and Japan. In 1991, the university was named after him.') ?>
        </p>

        <p>
            <?= Yii::t('app', 'The 1990s marked a new stage in the university’s development. New faculties, master’s programs, and specializations were opened, and student enrollment increased to 20,000. The Pedagogical State Institute became part of the university.') ?>
        </p>

        <p>
            <?= Yii::t('app', 'As a result, the university comprised 14 faculties and 72 departments. A major contribution to the reform was made by Rector Professor Zhambyl Saulebekovich Akylbayev, who led the university for 13 years.') ?>
        </p>

        <p>
            <?= Yii::t('app', 'At different times, the university was headed by professors Zeynulla Muldakhmetovich Muldakhmetov, Aitkhozha Bigalievich Bigaliyev, Erkin Kinoyatovich Kubeyev, and Azamat Tirzhanovich Yedrisov.') ?>
        </p>
    </div>
</div>
<div id="second_item" class="modal-overlay" onclick="closeModal(event)">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal()">×</button>

        <h3><?= Yii::t('app', 'Important events of the early 2000s') ?></h3>

        <p><strong>2003</strong> –
            <?= Yii::t('app', 'The university began implementing the credit-based education system and the master’s program.') ?>
        </p>

        <p><strong>2004</strong> –
            <?= Yii::t('app', 'The first experience of inviting guest lecturers from foreign universities for teaching appeared. The university joined the Central Asian Fund for Management Development.') ?>
        </p>

        <p><strong>2005</strong> –
            <?= Yii::t('app', 'The university, among the first in Kazakhstan, signed the Magna Charta Universitatum in Bologna; implemented ISO 9001 quality management system; opened a college.') ?>
        </p>

        <p><strong>2006</strong> –
            <?= Yii::t('app', 'The university received the first Erasmus Mundus grant and began implementing distance learning. Graduates for the first time became holders of the Bolashak scholarship.') ?>
        </p>

        <p><strong>2007</strong> –
            <?= Yii::t('app', 'The university entered the top three of the NKAOKO ranking, became a participant in the PhD program. A monument to Academician E.A. Buketov was opened.') ?>
        </p>

        <p><strong>2008</strong> –
            <?= Yii::t('app', 'Implementation of multilingual education, participation in international associations, first Erasmus Mundus and DAAD internships.') ?>
        </p>

        <p><strong>2009</strong> –
            <?= Yii::t('app', 'Received 10 scientific grants, opened the "Physical-Chemical Research Methods" laboratory, and established the School of Public Administration.') ?>
        </p>
    </div>
</div>
<div id="third_item" class="modal-overlay" onclick="closeModal(event)">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal()">×</button>

        <h3><?= Yii::t('app', 'Important events of the early 2010s') ?></h3>

        <p><strong>2010</strong> –
            <?= Yii::t('app', 'The university entered the QS World University Rankings for the first time, taking 601st place. The internal project "Electronic University" began.') ?>
        </p>

        <p><strong>2011</strong> –
            <?= Yii::t('app', 'The university entered the top ten innovative universities of Kazakhstan. The engineering laboratory "Physical-Chemical Research Methods" was opened, currently accredited.') ?>
        </p>

        <p><strong>2012</strong> –
            <?= Yii::t('app', 'The university’s educational programs were accredited by the German Institute ACQUIN: Physics, Chemistry, Economics. The university entered the Webometrics ranking for the first time. A PhD dissertation council in nanomaterials and nanotechnology was opened. The French Alliance office was opened and cooperation with the British Council began. Student internal academic mobility programs started.') ?>
        </p>

        <p><strong>2013</strong> –
            <?= Yii::t('app', 'The university signed a Memorandum of Cooperation with Nazarbayev University. Dual education programs began. The university received over 2 billion tenge for budget programs. Educational and scientific activities were awarded the state diploma "Altyn Sapa". 53 branch departments operated based on educational and production organizations.') ?>
        </p>

        <p><strong>2014</strong> –
            <?= Yii::t('app', 'The university became a member of the European University Association. The Center for Technology and Innovation Support was opened. An experimental batch of grain moisture measuring devices was produced. A technological line for road bitumen production was built by the Faculty of Chemistry with JSC "Dorstroymaterials".') ?>
        </p>

        <p><strong>2015</strong> –
            <?= Yii::t('app', 'The state program "Serpin" was implemented. Research funding amounted to 335 million tenge. The university ranked first among multidisciplinary universities in external evaluation. Nine research projects in green economy and alternative energy were conducted. The 3-D Technology laboratory was opened. 15 teachers received "Best University Teacher" awards.') ?>
        </p>

        <p><strong>2016</strong> –
            <?= Yii::t('app', 'Archaeologists discovered the Kazakhstan pyramid – a unique pre-Saka burial complex in Central Kazakhstan, attracting international attention. The International Scientific Forum "Language Education in Socio-Cultural Transformation" was held with OSCE and embassies participation.') ?>
        </p>

        <p><strong>2017</strong> –
            <?= Yii::t('app', 'Dissertation councils in "Primary Education", "Foreign Language", "Mathematics", "Biology" were opened. Youth Entrepreneurship Center was established. Five university projects were presented at EXPO-2017. The university received recognition from Springer Nature and Clarivate Analytics. Student teams won entrepreneurship competitions.') ?>
        </p>

        <p><strong>2018</strong> –
            <?= Yii::t('app', 'IT Competence Center and Student & Staff Service Center were opened. All nine series of "Karaganda University Bulletin" included in the Ministry of Education and Science publication list.') ?>
        </p>

        <p><strong>2019</strong> –
            <?= Yii::t('app', 'The university signed an agreement with Kazakhmys Corporation for rare and non-ferrous metal extraction technology development. The "Zhashtar" Alley with recreational areas, football field, and coworking center was opened.') ?>
        </p>

        <p><strong>2020</strong> –
            <?= Yii::t('app', 'The university joined the ETS "Global Preferred Associate Network". Accredited TOEFL exam center opened. Military department opened. "Internationalization Strategy 2020-2025" approved. Partnerships with 150 foreign universities established.') ?>
        </p>

        <p><strong>2021-2022</strong> –
            <?= Yii::t('app', 'Risk management policy introduced. 9 international projects implemented, including 6 jointly with Shihezi University (China). Rebranding of Karaganda Buketov University started. 5 joint dual-degree programs launched.') ?>
        </p>

        <p><strong>2022</strong> –
            <?= Yii::t('app', 'University reached QS World University Ranking 801+. Increased academic mobility of students: 57 students supported abroad. 8 international projects launched with Chinese and Central Asian universities.') ?>
        </p>

        
        <p><strong>2024</strong> –
            <?= Yii::t('app', 'Karaganda University named after academician E. A. Buketov was awarded the status of a research university') ?>
        </p>
        <p><strong>2025</strong> –
            <?= Yii::t('app', 'Karaganda research university named after academician E. A. Buketov awarded national status.') ?>
        </p>
    </div>
</div>


<script>
    function openModal(id) {
        document.getElementById(id).classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(event) {
        if (!event || event.target.classList.contains('modal-overlay')) {
            document.querySelectorAll('.modal-overlay').forEach(m => m.classList.remove('active'));
            document.body.style.overflow = '';
        }
    }
</script>