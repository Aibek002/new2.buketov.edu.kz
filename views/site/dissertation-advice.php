<?php
use app\components\LanguageHelper;
use app\assets\DessertationJobAsset;
use function PHPUnit\Framework\isEmpty;

DessertationJobAsset::register($this);

?>
<div class="p-5">
    <?php
    $diss = [];
    foreach ($dissertation as $items) {
        $staff = $items['surname'] . " " . $items['name'];
        $diss[$staff][] = $items;

    }
    ?>
    <div class="title-content">
        Профессор кафедры <strong>(название_кафедры)</strong> Карагандинского университета имени академика Е.А. Букетова
        <div class="person-section my-5">
            <div class="person-img">
                <img width="100%"
                    src="https://st4.depositphotos.com/7541698/30595/v/450/depositphotos_305955306-stock-illustration-people-icon-person-vector-icon.jpg"
                    alt="">
            </div>
            <div class="person-info">
                <p class="person-fio"> Фамилия Имя Отчество </p>
                <p class="person-position"><i>(название_должности) </i></p>
                <p class="person-info"><i>
                        (приветственные_слова)
                    </i></p>
                <strong class="person-info">
                    График работы:
                    <i> Понедельник – пятница 09:00 - 17:00</i>
                    </i></strong>



            </div>
            <div class="person-email">
                <div class="email"><img src="/bg-images/svg/iconEmail.svg"> <a
                        href="mailto:ucheniesovety@gmail.com">dessertation_job@buketov.edu.kz</a></div>
                <div class="phone"><img src="/bg-images/svg/iconPhone.svg"> <a href="tel:+77777777777">+7 7212
                        90-02-70</a></div>
                <div class="phone"><img src="/bg-images/svg/iconPhone.svg"> <a href="tel:+77777777777">+7 7212
                        35-64-05</a></div>
            </div>
        </div>
    </div>
    <div class="title-content"><?= Yii::t('app', 'Regulatory documents') ?></div>
    <div class="button-section">
        <?php for ($i = 1; $i < 9; $i++): ?>
            <button onclick="openGeneralRulesPdf('/pdf/file1.pdf','.first')"><?= Yii::t('app', 'File ' . $i) ?></button>
        <?php endfor; ?>
    </div>
    <div class="d-flex justify-content-center first">
        <embed class=" general-rules-pdf" src="" width="50%" height="600" type="application/pdf">
    </div>
    <div class="title-content"><?= Yii::t('app', 'Doctoral students` documents') ?></div>


    <?php if (empty($diss)): ?>
        <div class="button-section">
        <h1 class="text-content">Докторантов нет</h1>
        </div>
    <?php else: ?>
        <div class="button-section">
            <?php foreach ($diss as $staff => $items): ?>
                <button onclick="openDissJob('<?= str_replace(['  '], '-', $staff) ?>')"><?= $staff ?></button>
            <?php endforeach; ?>
        </div>
        <?php foreach ($diss as $staff => $items): ?>
            <div class="document" id="staff-<?= str_replace(['  '], '-', $staff) ?>">
                <div class="title-content"><?= Yii::t('app', 'Document`s') . ' - ' . $staff ?>
                    <div class="button-section">
                        <?php foreach ($items as $item): ?>
                            <button
                                onclick="openDissPdf('<?= str_replace(['/var/www/html/yii2/', '..'], '', $item['path_file']) ?>','.second')"><?= $item['fileName'] ?></button>

                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <div class="d-flex justify-content-center second">
        <embed class="general-ds-pdf" src="" width="50%" height="600" type="application/pdf">
    </div>
</div>