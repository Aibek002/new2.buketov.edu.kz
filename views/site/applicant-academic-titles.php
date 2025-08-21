<div class="my-5 p-5">
    <h1 class="title-content">Applicant for the Academic titles</h1>

    <?php
    $professor_sort = [];
    foreach ($professors as $professor) {
        echo $professor['ref_files_id'] ;
        if ($professor['ref_files_id'] === 3) {
            $full_name = $professor['full_name'];
            $professor_sort[$full_name][] = $professor;
        }

    } ?>
    <h1 class="title-content">
        Professors
    </h1>
    <div class="button-section">
        <?php foreach ($professor_sort as $full_name => $item): ?>
            <button><?= $full_name ?></button>
        <?php endforeach; ?>
    </div>
    <?php foreach ($professor_sort as $full_name => $item): ?>
        <div class="button-section <?= trim($full_name) ?>">
            <?php foreach ($item as $item) {
                echo "<button onclick=''>" . $item['fileName'] . "</button>";

            } ?>
        </div>

    <?php endforeach; ?>
</div>