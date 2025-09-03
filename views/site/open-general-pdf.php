<div class="d-flex justify-content-center p-5 my-5">
    <embed style="width: 100vw;height: 80vh;" class="general-rules-pdf"
        src='<?= $params['path'] ?><?= isset($params['year']) ? '/' . $params['year'] . '' : '' ?>/<?= Yii::$app->language ?>/<?= $params['url'] ?>.pdf'
        width="100vw" height="100vh" type="application/pdf">
</div>