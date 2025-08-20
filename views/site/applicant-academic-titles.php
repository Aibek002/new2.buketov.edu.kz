<div class="my-5 p-5">
    <h1 class="title-content">Applicant for the Academic titles</h1>
    <?php
    $professor_sort = [];
    foreach ($professors as $professor) {
        $full_name = $professor['full_name'];
        $professor_sort[$full_name][] = $professor;
    } ?>
    <div class="button-section">
        <?php foreach ($professor_sort as $full_name => $item): ?>
            <button><?= $full_name ?></button>
        <?php endforeach; ?>
    </div>
</div>