<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Университет — Главная</title>
  <meta name="description" content="Официальный сайт университета: поступление, факультеты, мобильность, конференции, новости." />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root { --primary: #4a90e2; }
    .btn-primary { background: var(--primary); color:#fff; }
    .btn-primary:hover { filter: brightness(0.9); }
    .link-primary { color: var(--primary); }
    .badge { border:1px solid rgba(0,0,0,.08); padding:.25rem .5rem; border-radius:.5rem; font-size:.75rem; }
  </style>
</head>
<body class="bg-gray-50 text-gray-800">


  <!-- Hero -->
  <section class="max-w-6xl mx-auto px-4 py-12 md:py-16 grid md:grid-cols-2 gap-10 items-center">
    <div>
      <h1 class="text-3xl md:text-5xl font-extrabold leading-tight mb-4">
        Университет будущего: <span class="link-primary">наука</span>, инновации и международное сотрудничество
      </h1>
      <p class="text-gray-600 mb-6 text-base md:text-lg">
        Поступай, учись, исследуй и строй карьеру вместе с нами. Бакалавриат, магистратура, PhD,
        академическая мобильность и стажировки с ведущими партнёрами.
      </p>
      <div class="flex flex-col sm:flex-row gap-3">
        <a href="#apply" class="btn-primary px-6 py-3 rounded-2xl font-semibold shadow text-center">Подать заявку</a>
        <a href="#video" class="px-6 py-3 rounded-2xl font-semibold border text-center" style="color:var(--primary); border-color:var(--primary);">Видео о вузе ▶</a>
      </div>
    </div>
    <div class="bg-white rounded-3xl shadow p-6 md:p-8">
      <div class="grid grid-cols-3 gap-4 text-center">
        <div class="p-4 rounded-2xl bg-gray-50">
          <div class="text-3xl font-extrabold">12k+</div>
          <div class="text-xs text-gray-500">Обучающихся</div>
        </div>
        <div class="p-4 rounded-2xl bg-gray-50">
          <div class="text-3xl font-extrabold">500+</div>
          <div class="text-xs text-gray-500">ППС</div>
        </div>
        <div class="p-4 rounded-2xl bg-gray-50">
          <div class="text-3xl font-extrabold">120+</div>
          <div class="text-xs text-gray-500">Партнёров</div>
        </div>
      </div>
      <!-- Быстрые ссылки -->
      <div class="mt-6 grid grid-cols-2 gap-3 text-sm">
        <a href="#apply" class="p-4 rounded-2xl border bg-gray-50 hover:bg-white hover:shadow transition">
          <div class="font-semibold link-primary">Абитуриентам</div>
          <div class="text-gray-500">Поступление и приём</div>
        </a>
        <a href="#schools" class="p-4 rounded-2xl border bg-gray-50 hover:bg-white hover:shadow transition">
          <div class="font-semibold link-primary">Факультеты</div>
          <div class="text-gray-500">Направления и кафедры</div>
        </a>
        <a href="#jobs" class="p-4 rounded-2xl border bg-gray-50 hover:bg-white hover:shadow transition">
          <div class="font-semibold link-primary">Вакансии</div>
          <div class="text-gray-500">Работа в университете</div>
        </a>
        <a href="#mobility" class="p-4 rounded-2xl border bg-gray-50 hover:bg-white hover:shadow transition">
          <div class="font-semibold link-primary">Мобильность</div>
          <div class="text-gray-500">Обмены и визиты</div>
        </a>
      </div>
    </div>
  </section>

  <!-- Блок факультетов -->
  <section id="schools" class="max-w-6xl mx-auto px-4 py-12">
    <div class="flex items-end justify-between mb-6">
      <h2 class="text-2xl md:text-3xl font-bold link-primary">Факультеты и программы</h2>
      <a href="#" class="text-sm font-semibold link-primary">Все программы →</a>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
      <div class="bg-white rounded-2xl p-6 shadow hover:shadow-lg transition">
        <div class="text-xl font-semibold mb-2">Информатика</div>
        <p class="text-gray-600 text-sm mb-4">Программирование, ИИ, анализ данных, кибербезопасность.</p>
        <a href="#" class="font-semibold link-primary">Подробнее →</a>
      </div>
      <div class="bg-white rounded-2xl p-6 shadow hover:shadow-lg transition">
        <div class="text-xl font-semibold mb-2">Экономика</div>
        <p class="text-gray-600 text-sm mb-4">Финансы, бухгалтерский учёт, аналитика, менеджмент.</p>
        <a href="#" class="font-semibold link-primary">Подробнее →</a>
      </div>
      <div class="bg-white rounded-2xl p-6 shadow hover:shadow-lg transition">
        <div class="text-xl font-semibold mb-2">Педагогика</div>
        <p class="text-gray-600 text-sm mb-4">Современные методики, EdTech, инклюзивное образование.</p>
        <a href="#" class="font-semibold link-primary">Подробнее →</a>
      </div>
    </div>
  </section>

  <!-- Мобильность и Конференции -->
  <section id="mobility" class="max-w-6xl mx-auto px-4 py-12">
    <div class="grid md:grid-cols-2 gap-6">
      <div class="bg-white rounded-2xl p-7 shadow">
        <h3 class="text-xl font-bold mb-2 link-primary">Академическая мобильность</h3>
        <p class="text-gray-600 mb-4">Исходящая и входящая мобильность для студентов и ППС. Перезачёт кредитов, визиты гостевых лекторов, партнёрские вузы.</p>
        <div class="flex gap-3">
          <a href="#" class="btn-primary px-5 py-2 rounded-xl font-semibold">Подать заявку</a>
          <a href="#" class="px-5 py-2 rounded-xl font-semibold border link-primary" style="border-color:var(--primary);">Требования</a>
        </div>
      </div>
      <div id="confs" class="bg-white rounded-2xl p-7 shadow">
        <h3 class="text-xl font-bold mb-2 link-primary">Международные конференции</h3>
        <p class="text-gray-600 mb-4">Форумы, симпозиумы и научные конференции. Регистрация докладов и публикации.</p>
        <ul class="space-y-2 text-sm">
          <li class="flex items-center justify-between bg-gray-50 p-3 rounded-xl">
            <span>Цифровые технологии — 15–17.10.2025</span><span class="badge">Регистрация</span>
          </li>
          <li class="flex items-center justify-between bg-gray-50 p-3 rounded-xl">
            <span>Устойчивое развитие — 02–04.12.2025</span><span class="badge">Скоро</span>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <!-- Новости и События -->
  <section class="max-w-6xl mx-auto px-4 py-12 grid md:grid-cols-2 gap-8">
    <div>
      <h3 class="text-2xl font-bold mb-4 link-primary">Новости</h3>
      <div class="space-y-4">
        <article class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
          <div class="text-sm text-gray-500">02.09.2025 • Образование</div>
          <h4 class="font-semibold mt-1">Запуск новой магистерской программы по Data Science</h4>
        </article>
        <article class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
          <div class="text-sm text-gray-500">28.08.2025 • Рейтинг</div>
          <h4 class="font-semibold mt-1">Университет вошёл в топ-300 QS EECA</h4>
        </article>
        <article class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
          <div class="text-sm text-gray-500">21.08.2025 • Партнёрство</div>
          <h4 class="font-semibold mt-1">Подписан меморандум с ТУ Берлина</h4>
        </article>
      </div>
    </div>
    <div>
      <h3 class="text-2xl font-bold mb-4 link-primary">События</h3>
      <ul class="space-y-4">
        <li class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
          <div class="flex items-center justify-between">
            <div>
              <div class="font-semibold">День открытых дверей</div>
              <div class="text-sm text-gray-500">20.09.2025 • Главный корпус</div>
            </div>
            <a href="#apply" class="btn-primary px-4 py-2 rounded-xl font-semibold">Регистрация</a>
          </div>
        </li>
        <li class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
          <div class="flex items-center justify-between">
            <div>
              <div class="font-semibold">Карьерная ярмарка</div>
              <div class="text-sm text-gray-500">05.11.2025 • Спорткомплекс</div>
            </div>
            <a href="#apply" class="px-4 py-2 rounded-xl font-semibold border link-primary" style="border-color:var(--primary);">Подробнее</a>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <!-- Блок видео -->
  <section id="video" class="max-w-6xl mx-auto px-4 py-12">
    <div class="bg-white rounded-2xl shadow p-6 md:p-8">
      <h3 class="text-2xl font-bold mb-4 link-primary">Видео о университете</h3>
      <div class="aspect-video w-full bg-gray-200 rounded-xl grid place-items-center text-gray-500">
        Вставьте сюда iframe YouTube (1980×1080)
      </div>
    </div>
  </section>

  <!-- Контакты + Карта -->
  <section id="contacts" class="max-w-6xl mx-auto px-4 py-12 grid md:grid-cols-2 gap-6">
    <div class="bg-white rounded-2xl shadow p-6">
      <h3 class="text-2xl font-bold mb-4 link-primary">Контакты</h3>
      <ul class="space-y-3 text-gray-700">
        <li><span class="font-semibold">Адрес:</span> г. Караганда, ул. Академическая 1</li>
        <li><span class="font-semibold">Телефон:</span> +7 (7212) 12-34-56</li>
        <li><span class="font-semibold">Email:</span> info@university.kz</li>
        <li><span class="font-semibold">Часы работы:</span> Пн–Пт: 9:00–18:00</li>
      </ul>
    </div>
    <div class="rounded-2xl overflow-hidden shadow">
      <iframe class="w-full h-80 border-0"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2922.4340703741213!2d73.09927421567362!3d49.80609497939333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4243488c0aeb8a1f%3A0x3aafd5a92e2e5c3b!2z0JrQvtC70LvQtdC00LYg0Lgg0KLQvtGA0LPQvtCz0LjRh9C10YHQutCw0Y8g0YPQuy4g0JDQu9GC0LDQvdC40LrQsA!5e0!3m2!1sru!2skz!4v1661340959383!5m2!1sru!2skz"
        allowfullscreen="" loading="lazy"></iframe>
    </div>
  </section>

  <!-- Заявка -->
  <section id="apply" class="bg-white max-w-4xl mx-auto px-6 py-12 shadow-lg rounded-2xl mt-6">
    <h3 class="text-2xl font-bold mb-6 link-primary">Оставить заявку</h3>
    <form class="space-y-4">
      <input type="text" placeholder="ФИО" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2" style="--tw-ring-color: var(--primary);" />
      <input type="email" placeholder="Email" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2" style="--tw-ring-color: var(--primary);" />
      <input type="tel" placeholder="Телефон" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2" style="--tw-ring-color: var(--primary);" />
      <textarea rows="5" placeholder="Комментарий" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2" style="--tw-ring-color: var(--primary);"></textarea>
      <button type="submit" class="btn-primary w-full py-3 rounded-lg font-semibold">Отправить</button>
    </form>
  </section>

  
  <script>
    // простое мобильное меню
    const btn = document.getElementById('menuBtn');
    const menu = document.getElementById('mobileMenu');
    btn?.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });
  </script>
</body>
</html>
