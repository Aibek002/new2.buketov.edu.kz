<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вакансии | Университет</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">


    <!-- Vacancies Section -->
    <section class="max-w-6xl mx-auto p-6 py-12">
        <div class="title-content text-center">
            <p class="title-content-text"><?= Yii::t('app', 'Vacancies') ?></p>
            <br>
            <p class="text-center text-lg mb-12 text-white-600 m-0">
                <?= Yii::t('app', 'We invite talented specialists to join our team!') ?>
            </p>
        </div>

        <div class="mx-auto bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-2xl p-6 shadow-lg mb-8">
            <h3 class="text-2xl font-semibold text-center mb-2">
                <?= Yii::t('app', 'Contacts for applications') ?>
            </h3>

            <p class="text-center text-sm opacity-90 mb-4">
                <?= Yii::t('app', 'If you want to apply for a vacancy, use a convenient way to contact us') ?>
            </p>

            <div class="flex flex-col md:flex-row items-center md:justify-between gap-4">
                <div class="flex items-center gap-3">
                    <!-- Phone icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24"
                        aria-hidden="true" fill="currentColor">
                        <path
                            d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 01.99-.24c1.21.35 2.5.54 3.83.54a1 1 0 011 1V21a1 1 0 01-1 1A17 17 0 013 5a1 1 0 011-1h3.5a1 1 0 011 1c0 1.33.19 2.62.54 3.83a1 1 0 01-.24.99l-2.2 2.2z" />
                    </svg>

                    <a href="tel:+77212356396" class="font-medium hover:underline">+7 7212 35-63-96</a>
                </div>

                <div class="flex items-center gap-3">
                    <!-- Mail icon -->
                    <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-18 8V8a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z">
                        </path>
                    </svg>
                    <a href="mailto:up@karnu-buketov.edu.kz"
                        class="font-medium hover:underline">Up@karnu-buketov.edu.kz</a>
                </div>

                <div class="flex items-center gap-3">
                    <!-- Location icon -->
                    <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 21s8-5.5 8-11a8 8 0 10-16 0c0 5.5 8 11 8 11z"></path>
                    </svg>
                    <span class="text-sm">
                        <?= Yii::t('app', '28 University Street, Main Building, Room 228') ?>
                    </span>
                </div>
            </div>

            <?php
            $subject = urlencode(Yii::t('app', 'Application for vacancy'));
            ?>
            <div class="mt-4 text-center">
                <a href="mailto:up@karnu-buketov.edu.kz"
                    class="inline-block bg-white text-blue-700 px-4 py-2 rounded-lg font-semibold shadow hover:opacity-95">
                    <?= Yii::t('app', 'Apply now') ?>
                </a>
            </div>

        </div>

        <div class="grid md:grid-cols-2 gap-8">

            <div class="bg-white shadow-lg rounded-2xl p-8">
                <h3 class="text-xl font-semibold mb-3">
                    <?= Yii::t('app', 'Computer Science Teacher') ?>
                </h3>
                <p class="mb-4 text-gray-600">
                    <?= Yii::t('app', 'A teacher is required for the specialty "Computer Science". Work experience of at least 2 years.') ?>
                </p>
                <h3 class="text-xl font-semibold mb-3">
                    <?= Yii::t('app', 'Computer Science Teacher') ?>
                </h3>
                <p class="mb-4 text-gray-600">
                    <?= Yii::t('app', 'A teacher is required for the specialty "Computer Science". Work experience of at least 2 years.') ?>
                </p>
                <ul class="mb-4 list-disc list-inside text-gray-600 space-y-1">
                    <li><?= Yii::t('app', 'Higher education') ?></li>
                    <li><?= Yii::t('app', 'Teaching experience') ?></li>
                    <li><?= Yii::t('app', 'Knowledge of modern IT technologies') ?></li>
                    <li><?= Yii::t('app', 'Higher education') ?></li>
                    <li><?= Yii::t('app', 'Teaching experience') ?></li>
                    <li><?= Yii::t('app', 'Knowledge of modern IT technologies') ?></li>
                </ul>
            </div>

            <div class="bg-white shadow-lg rounded-2xl p-8">
                <h3 class="text-xl font-semibold mb-3">
                    <?= Yii::t('app', 'Accountant') ?>
                </h3>
                <p class="mb-4 text-gray-600">
                    <?= Yii::t('app', 'We are looking for a responsible accountant to manage financial reporting.') ?>
                </p>
                <h3 class="text-xl font-semibold mb-3">
                    <?= Yii::t('app', 'Accountant') ?>
                </h3>
                <p class="mb-4 text-gray-600">
                    <?= Yii::t('app', 'We are looking for a responsible accountant to manage financial reporting.') ?>
                </p>
                <ul class="mb-4 list-disc list-inside text-gray-600 space-y-1">
                    <li><?= Yii::t('app', 'Higher economic education') ?></li>
                    <li><?= Yii::t('app', 'Knowledge of 1C') ?></li>
                    <li><?= Yii::t('app', 'Work experience of at least 3 years') ?></li>
                    <li><?= Yii::t('app', 'Higher economic education') ?></li>
                    <li><?= Yii::t('app', 'Knowledge of 1C') ?></li>
                    <li><?= Yii::t('app', 'Work experience of at least 3 years') ?></li>
                </ul>
            </div>

            <div class="bg-white shadow-lg rounded-2xl p-8">
                <h3 class="text-xl font-semibold mb-3">
                    <?= Yii::t('app', 'Student Affairs Manager') ?>
                </h3>
                <p class="mb-4 text-gray-600">
                    <?= Yii::t('app', 'A manager is required to organize the educational process and interact with students.') ?>
                </p>
                <h3 class="text-xl font-semibold mb-3">
                    <?= Yii::t('app', 'Student Affairs Manager') ?>
                </h3>
                <p class="mb-4 text-gray-600">
                    <?= Yii::t('app', 'A manager is required to organize the educational process and interact with students.') ?>
                </p>
                <ul class="mb-4 list-disc list-inside text-gray-600 space-y-1">
                    <li><?= Yii::t('app', 'Communication skills') ?></li>
                    <li><?= Yii::t('app', 'Responsibility') ?></li>
                    <li><?= Yii::t('app', 'Ability to work with documents') ?></li>
                    <li><?= Yii::t('app', 'Communication skills') ?></li>
                    <li><?= Yii::t('app', 'Responsibility') ?></li>
                    <li><?= Yii::t('app', 'Ability to work with documents') ?></li>
                </ul>
            </div>

            <div class="bg-white shadow-lg rounded-2xl p-8">
                <h3 class="text-xl font-semibold mb-3">
                    <?= Yii::t('app', 'System Administrator') ?>
                </h3>
                <p class="mb-4 text-gray-600">
                    <?= Yii::t('app', 'A system administrator is required to support the university\'s IT infrastructure.') ?>
                </p>
                <h3 class="text-xl font-semibold mb-3">
                    <?= Yii::t('app', 'System Administrator') ?>
                </h3>
                <p class="mb-4 text-gray-600">
                    <?= Yii::t('app', 'A system administrator is required to support the university\'s IT infrastructure.') ?>
                </p>
                <ul class="mb-4 list-disc list-inside text-gray-600 space-y-1">
                    <li><?= Yii::t('app', 'Work experience in IT for at least 2 years') ?></li>
                    <li><?= Yii::t('app', 'Knowledge of network technologies') ?></li>
                    <li><?= Yii::t('app', 'Server administration') ?></li>
                    <li><?= Yii::t('app', 'Work experience in IT for at least 2 years') ?></li>
                    <li><?= Yii::t('app', 'Knowledge of network technologies') ?></li>
                    <li><?= Yii::t('app', 'Server administration') ?></li>
                </ul>
            </div>


        </div>


    </section>

    <!-- Форма отклика
    <section id="apply" class="bg-white max-w-4xl mx-auto p-6 py-12 shadow-lg rounded-2xl mt-12">
        <h3 class="text-2xl font-bold mb-6 text-[#4a90e2]">Отклик на вакансию</h3>
        <form class="space-y-4">
            <input type="text" placeholder="ФИО"
                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4a90e2]">
            <input type="email" placeholder="Email"
                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4a90e2]">
            <input type="tel" placeholder="Телефон"
                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4a90e2]">
            <textarea rows="5" placeholder="Сопроводительное письмо"
                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4a90e2]"></textarea>
            <button type="submit"
                class="w-full bg-[#4a90e2] text-white py-3 rounded-lg font-semibold hover:bg-blue-600 transition">
                Отправить заявку
            </button>
        </form>
    </section> -->



</body>

</html>