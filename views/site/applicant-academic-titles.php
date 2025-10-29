<?php
use app\assets\ApplicantAsset;
ApplicantAsset::register($this);
?>
<div class="my-5 p-5">
    <h1 class="title-page"><span><?= Yii::t('app', 'Applicants for academic titles') ?> </span></h1>
    <div class="title-content">
        <span> <?= Yii::t("app", "Academic Secretary of the Council") ?></span>
        <div class="person-section my-5">
            <div class="person-img">
                <img width="100%"
                    src="https://st4.depositphotos.com/7541698/30595/v/450/depositphotos_305955306-stock-illustration-people-icon-person-vector-icon.jpg"
                    alt="">
            </div>
            <div class="person-info">
                <p class="person-fio"> <?= Yii::t("app", "Tutinova Nurgul Yerkanatovna") ?> </p>

                <p class="person-position">
                    <i><?= Yii::t("app", "Scientific Secretary of the Council") ?></i>
                </p>

                <p class="person-info">
                    <i>
                        <?= Yii::t("app", "Tutinova Nurgul Yerkanatovna is an Associate Professor of the Department of Philosophy and Theory of Culture, PhD, Scientific Secretary.") ?>
                    </i>
                </p>
            </div>

            <div class="person-email">
                <div class="phone"><img src="/bg-images/svg/iconPhone.svg"> <a href="tel:+77777777777">+7(777) -
                        777 - 77 - 77</a></div>
                <div class="email"><img src="/bg-images/svg/iconEmail.svg"> <a
                        href="mailto:ucheniesovety@gmail.com">ucheniesovety@gmail.com</a></div>
            </div>
        </div>
    </div>
    <?php
    $professor_sort = [];
    $assoc_prof = [];
    foreach ($professors as $professor) {
        if ($professor['ref_files_id'] === 3) {
            $full_name = $professor['surname'] . " " . $professor['name'] . " " . $professor['patronymic'];
            $professor_sort[$full_name][] = $professor;
        } elseif ($professor['ref_files_id'] === 4) {
            $full_name = $professor['surname'] . " " . $professor['name'] . " " . $professor['patronymic'];

            $assoc_prof[$full_name][] = $professor;
        }

    } ?>
    <h1 class="title-content">
        <?= Yii::t('app', 'Professors') ?>
    </h1>
    <div class="button-section">
        <?php foreach ($professor_sort as $full_name => $item): ?>
            <button onclick="openDocsProf('<?= str_replace([' '], '-', trim($full_name)) ?>')"><?= $full_name ?></button>
        <?php endforeach; ?>
    </div>
    <?php foreach ($professor_sort as $full_name => $item): ?>
        <div class=" title-content professor-<?= str_replace([' '], '-', trim($full_name)) ?>">
            <?= $item[0]['date'] ?>
            <div class="button-section">
                <?php foreach ($item as $item) {
                    echo "<button onclick=''>" . $item['fileName'] . " " . $item['date'] . "</button>";

                } ?>
            </div>
        </div>

    <?php endforeach; ?>
    <h1 class="title-content">
        <?= Yii::t('app', 'Associative professors') ?>
    </h1>
    <div class="button-section">
        <?php foreach ($assoc_prof as $full_name => $item): ?>
            <button onclick="openDocsProf('<?= str_replace([' '], '-', trim($full_name)) ?>')"><?= $full_name ?></button>
        <?php endforeach; ?>
    </div>
    <?php foreach ($assoc_prof as $full_name => $item): ?>
        <div class=" title-content professor-<?= str_replace([' '], '-', trim($full_name)) ?>">
            <?= $item[0]['date'] ?>
            <div class="button-section">
                <?php foreach ($item as $item) {
                    echo "<button onclick=''>" . $item['fileName'] . "</button>";

                } ?>
            </div>
        </div>

    <?php endforeach; ?>
</div>