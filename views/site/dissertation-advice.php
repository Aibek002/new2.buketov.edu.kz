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
            <span>


            </span>

            <div class="person-section my-5">
                <div class="person-img">
                    <img width="100%" style="padding: block 15px;"
                        src="<?= $secretary['image'] ?? "https://st4.depositphotos.com/7541698/30595/v/450/depositphotos_305955306-stock-illustration-people-icon-person-vector-icon.jpg" ?>"
                        alt="">
                    <div class="icon">
                        🎓
                    </div>
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
                    <!-- <p class="person-info"><i>
                            <?= $secretary['information'] ?? 'не задано'; ?>
                        </i></p> -->
                    <strong class="person-info">
                        <?= Yii::t("app", "Working hours:") ?>
                        <i>
                            <?= Yii::t("app", "Monday – Friday 09:00 - 17:00") ?>
                        </i>
                    </strong>



                </div>
                <div class="person-email">
                    <div class="email"><img src="/bg-images/svg/iconEmail.svg"> <a
                            href="mailto:<?= $secretary['email'] ?? 'не задано'; ?>"><?= $secretary['email'] ?? 'не задано'; ?></a>
                    </div>
                    <!-- <div class="phone"><img src="/bg-images/svg/iconPhone.svg"> <a
                            href="tel:<?= $secretary['phone'] ?? 'не задано'; ?>"><?= $secretary['phone'] ?? 'не задано'; ?></a>
                    </div> -->
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="title-content">
        <span><?= Yii::t('app', 'Regulatory documents') ?></span>
        <div class="button-section">
            <?php foreach ($normative as $document): ?>
                <button
                    onclick="openGeneralRulesPdf('<?= str_replace(['/var/www/html/yii2/', '..'], '', $document->path_file) ?>','.first')"><?= str_replace([".pdf", ".doc", ".docx", "(1)"], '', $document->fileName) ?></button>
            <?php endforeach; ?>
        </div>
    </div>
    <div id="pdfModal" class="modal-pdf">
        <span class="close-pdf-btn" onclick="document.getElementById('pdfModal').style.display='none';">&times;</span>

        <div class="modal-content-pdf">
            <iframe id="pdfIframe" src="" type="application/pdf"
                style="width: 100%; height: 100%; border: none; display: block;">
            </iframe>
        </div>
    </div>
    <div class="title-content">
        <span><?= Yii::t('app', 'Doctoral students` documents') ?></span>
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
                <div class="my-3 document" id="staff-<?= str_replace(['  '], '-', $doctorant) ?>">
                    <?= "<span>" . Yii::t('app', 'Document`s') . ' - ' . $doctorant . "</span>" ?>

                    <div class="button-section">
                        <?php foreach ($items as $item): ?>
                            <button
                                onclick="openGeneralRulesPdf('<?= str_replace(['/var/www/html/yii2/', '..'], '', $item['path_file']) ?>','.second')"><?= str_replace([".pdf", ".doc", ".docx", "(1)"], '', $item['fileName']) ?></button>

                        <?php endforeach; ?>
                    </div>
                </div>

            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

</div>