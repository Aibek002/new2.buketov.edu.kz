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
        <h2 class="title-content text-center">Вакансии

            <p class="text-center text-lg mb-12 text-gray-600">
                Мы приглашаем талантливых специалистов присоединиться к нашей команде!
            </p>
        </h2>
        <div class="grid md:grid-cols-2 gap-8">

            <!-- Вакансия 1 -->
            <div class="bg-white shadow-lg rounded-2xl p-8">
                <h3 class="text-xl font-semibold mb-3">Преподаватель информатики</h3>
                <p class="mb-4 text-gray-600">Требуется преподаватель по специальности "Информатика". Опыт работы от 2
                    лет.</p>
                <ul class="mb-4 list-disc list-inside text-gray-600 space-y-1">
                    <li>Высшее образование</li>
                    <li>Опыт преподавания</li>
                    <li>Знание современных IT-технологий</li>
                </ul>
                <a href="#apply"
                    class="inline-block bg-[#4a90e2] text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                    Подать заявку
                </a>
            </div>

            <!-- Вакансия 2 -->
            <div class="bg-white shadow-lg rounded-2xl p-8">
                <h3 class="text-xl font-semibold mb-3">Бухгалтер</h3>
                <p class="mb-4 text-gray-600">Ищем ответственного бухгалтера для ведения финансовой отчетности.</p>
                <ul class="mb-4 list-disc list-inside text-gray-600 space-y-1">
                    <li>Высшее экономическое образование</li>
                    <li>Знание 1С</li>
                    <li>Опыт работы от 3 лет</li>
                </ul>
                <a href="#apply"
                    class="inline-block bg-[#4a90e2] text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                    Подать заявку
                </a>
            </div>

            <!-- Вакансия 3 -->
            <div class="bg-white shadow-lg rounded-2xl p-8">
                <h3 class="text-xl font-semibold mb-3">Менеджер по работе с студентами</h3>
                <p class="mb-4 text-gray-600">Требуется менеджер для организации учебного процесса и взаимодействия со
                    студентами.</p>
                <ul class="mb-4 list-disc list-inside text-gray-600 space-y-1">
                    <li>Коммуникабельность</li>
                    <li>Ответственность</li>
                    <li>Умение работать с документами</li>
                </ul>
                <a href="#apply"
                    class="inline-block bg-[#4a90e2] text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                    Подать заявку
                </a>
            </div>

            <!-- Вакансия 4 -->
            <div class="bg-white shadow-lg rounded-2xl p-8">
                <h3 class="text-xl font-semibold mb-3">Системный администратор</h3>
                <p class="mb-4 text-gray-600">Требуется системный администратор для поддержки IT-инфраструктуры
                    университета.</p>
                <ul class="mb-4 list-disc list-inside text-gray-600 space-y-1">
                    <li>Опыт работы в IT от 2 лет</li>
                    <li>Знание сетевых технологий</li>
                    <li>Администрирование серверов</li>
                </ul>
                <a href="#apply"
                    class="inline-block bg-[#4a90e2] text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                    Подать заявку
                </a>
            </div>
        </div>
    </section>

    <!-- Форма отклика -->
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
    </section>



</body>

</html>