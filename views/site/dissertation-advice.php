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
        $doctorant = $items['doctorant_full_name'];
        $diss[$doctorant][] = $items;

    }
    ?>
    <?php if ($secretary !== null && is_array($secretary)): ?>
        <div class="title-content">
            Учёный секретарь диссовета по - <strong><?= $dissertation_name ?></strong> Карагандинского университета имени
            академика Е. А. Букетова
            <div class="person-section my-5">
                <div class="person-img">
                    <img width="100%"
                        src="https://st4.depositphotos.com/7541698/30595/v/450/depositphotos_305955306-stock-illustration-people-icon-person-vector-icon.jpg"
                        alt="">
                </div>
                <div class="person-info">
                    <p class="person-fio">
                        <?php
                        $fullName = ($secretary['surname'] ?? '') . ' ' .
                            ($secretary['name'] ?? '') . ' ' .
                            ($secretary['patronymic'] ?? '');

                        ?>
                        <?= $fullName ? $fullName : 'не задано' ?>
                    </p>
                    <p class="person-position"><i>
                            <?=

                                $secretary['job_title'] ?? 'не задано';
                            ?>
                        </i></p>
                    <p class="person-info"><i>
                            <?= $secretary['information'] ?? 'не задано'; ?>
                        </i></p>
                    <strong class="person-info">
                        График работы:
                        <i> Понедельник – пятница 09:00 - 17:00</i>
                        </i></strong>



                </div>
                <div class="person-email">
                    <div class="email"><img src="/bg-images/svg/iconEmail.svg"> <a
                            href="mailto:<?= $secretary['email'] ?? 'не задано'; ?>"><?= $secretary['email'] ?? 'не задано'; ?></a>
                    </div>
                    <div class="phone"><img src="/bg-images/svg/iconPhone.svg"> <a
                            href="tel:<?= $secretary['phone'] ?? 'не задано'; ?>"><?= $secretary['phone'] ?? 'не задано'; ?></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="title-content"><?= Yii::t('app', 'Regulatory documents') ?></div>
    <div class="button-section">
        <?php foreach ($normative as $document): ?>
            <button
                onclick="openGeneralRulesPdf('<?= str_replace(['/var/www/html/yii2/', '..'], '', $document->path_file) ?>','.first')"><?= $document->fileName ?></button>
        <?php endforeach; ?>
    </div>
    <div id="pdfModal" class="modal-pdf">
        <span class="close-pdf-btn" onclick="document.getElementById('pdfModal').style.display='none';">&times;</span>

        <div class="modal-content-pdf">
            <iframe id="pdfIframe" src="" type="application/pdf"
                style="width: 100%; height: 100%; border: none; display: block;">
            </iframe>
        </div>
    </div>
    <div class="title-content"><?= Yii::t('app', 'Doctoral students` documents') ?></div>


    <?php if (empty($diss)): ?>
        <div class="button-section">

            <h1 style="color:var(--indigoblue-font);text-align:center">Докторантов нет</h1>
        </div>
    <?php else: ?>
        <div class="button-section">
            <?php foreach ($diss as $doctorant => $items): ?>
                <button onclick="openDissJob('<?= str_replace(['  '], '-', $doctorant) ?>')"><?= $doctorant ?></button>
            <?php endforeach; ?>
        </div>
        <?php foreach ($diss as $doctorant => $items): ?>
            <div class="document" id="staff-<?= str_replace(['  '], '-', $doctorant) ?>">
                <div class="title-content"><?= "<h2>" . Yii::t('app', 'Document`s') . "</h2>" . '<p>' . $doctorant . "</p>" ?>

                    <div class="button-section">
                        <?php foreach ($items as $item): ?>
                            <button
                                onclick="openGeneralRulesPdf('<?= str_replace(['/var/www/html/yii2/', '..'], '', $item['path_file']) ?>','.second')"><?= $item['fileName'] ?></button>

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