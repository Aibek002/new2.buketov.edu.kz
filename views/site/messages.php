<div class="p-5 m-5">
    <?php foreach ($questions as $question): ?>
        <div style="margin-bottom: 30px; padding: 20px; border: 1px solid #ddd; border-radius: 10px; background: #f9f9f9;">
            <p style="font-weight: bold; color: #333; margin-bottom: 10px;">
                ❓ Вопрос: <?= htmlspecialchars($question->message) ?>
            </p>
            <?php if ($question->answers): ?>
                <?php foreach ($question->answers as $answer): ?>
                    <p style="margin-left: 20px; color: #2a7;">
                        💬 Ответ: <?= htmlspecialchars($answer->message) ?>
                    </p>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="margin-left: 20px; color: #aaa;">(Ответа пока нет)</p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>