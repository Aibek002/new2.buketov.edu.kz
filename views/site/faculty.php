<div class="faculty-hero">
    <div class="faculty-overlay">
        <h1><?= htmlspecialchars($faculty->name) ?></h1>
        <p>Факультеты</p>
    </div>
</div>


<div class="first-flex-faculty p-5 my-5">

<div class="faculty-container">
    <div class="faculty-text">
        <h2><?= nl2br(htmlspecialchars($faculty->welcome)) ?></h2>
        <p><?= nl2br(htmlspecialchars($faculty->information)) ?></p>

        <p><strong>Айгүл Сейткалиева</strong>, декан факультета биологии и географии, кандидат биологических наук.</p>
        <p>Email: <a href="mailto:bgf@buketov.edu.kz">bgf@buketov.edu.kz</a></p>
        <p>Для просмотра истории факультета перейдите по ссылке</p>
    </div>

    <div class="faculty-image">
        <img src="https://backend.narxozedu.kz/uploads/February2025/d3cf0e53-c298-4ca1-b4a4-bca50a2c8595/thumbnail.webp" alt="Декан факультета" />
    </div>
</div>

</div>