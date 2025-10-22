<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Контент из изображений с Динамическим Выделением Справа Налево</title>
    
    <style>
        /* --- CSS СТИЛИ (для Grid, Hover и Адаптивности) --- */

        :root {
            --primary-blue: #1f3b6e;
            --light-gray: #f0f2f5;
            --box-bg: #ffffff;
            --box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            --large-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            --accent-blue: #2c5ca9;
            --transition-speed: 0.4s;
        }

        /* КОНТЕЙНЕР: ИЗМЕНЕНИЕ ДЛЯ ВЫРАВНИВАНИЯ СПРАВА НАЛЕВО */
        .ratings-container {
            display: flex;
            /* Ключевое изменение: выравнивание справа налево */
            flex-direction: row-reverse; 
            
            flex-wrap: nowrap; 
            justify-content: flex-start; /* В сочетании с row-reverse это начнет элементы справа */
            
            padding: 20px;
            margin: 20px auto;
            gap: 15px; /* Сохраняем gap в CSS */
            overflow-x: auto; 
            scroll-snap-type: x mandatory;
            max-width: 100%;
        }
        
        /* СТИЛЬ ДЛЯ ВЫДЕЛЕННОГО БОЛЬШОГО БЛОКА (large-box) */
        .ratings-box.large-box {
            min-width: 350px; 
            max-width: 450px; 
            transform: scale(1.05);
            box-shadow: var(--large-shadow);
            border: 3px solid var(--accent-blue);
            background: var(--light-gray);
        }

        /* Эффект hover для неактивных элементов */
        .ratings-box:hover:not(.large-box) {
             box-shadow: 0 7px 18px rgba(0, 0, 0, 0.15);
             transform: translateY(-2px);
        }
        
        /* На мобильных устройствах, чтобы прокрутка была справа налево */
        @media (max-width: 768px) {
            .ratings-container {
                 /* Ключевое изменение для правильной прокрутки на мобильных */
                direction: rtl; /* Устанавливаем направление текста справа налево */
            }
            .ratings-box {
                direction: ltr; /* Возвращаем текст внутри блока к стандартному направлению */
            }
        }

    </style>
</head>
<body>

    <div class="ratings-container">

        <div class="ratings-box" onclick="activateNextBox(this)"
            style="
                /* ИНЛАЙН СТИЛИ: Базовые */
                min-width: 250px; 
                max-width: 300px;
                background: #ffffff; 
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); 
                transition: all 0.4s ease-in-out; 
                cursor: pointer;
                flex-shrink: 0; 
                scroll-snap-align: start;
            ">
            <div class="logo" style="
                height: 80px;
                display: flex;
                justify-content: center;
                align-items: center;
                margin-bottom: 15px;
            ">
                <img src="WhatsApp Image 2025-10-08 at 11.29.34(1).jpeg" alt="Девушка в магазине" style="height: 100%; width: auto; border-radius: 50%; object-fit: cover;">
            </div>
            <div class="text" style="
                text-align: center;
                min-height: 70px;
                display: flex;
                align-items: center;
                justify-content: center;
            ">
                <h2 class="title" style="
                    font-size: 1.1rem;
                    color: #1f3b6e; 
                    font-weight: 700;
                    margin: 0;
                    line-height: 1.3;
                ">Наш выпускник (IT-специалист)</h2>
            </div>
        </div>

        <div class="ratings-box" onclick="activateNextBox(this)"
            style="
                /* ИНЛАЙН СТИЛИ: Базовые */
                min-width: 250px; 
                max-width: 300px;
                background: #ffffff; 
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); 
                transition: all 0.4s ease-in-out; 
                cursor: pointer;
                flex-shrink: 0; 
                scroll-snap-align: start;
            ">
            <div class="logo" style="
                height: 80px;
                display: flex;
                justify-content: center;
                align-items: center;
                margin-bottom: 15px;
            ">
                <img src="WhatsApp Image 2025-10-08 at 11.42.20.jpeg" alt="Портрет молодого человека" style="height: 100%; width: auto; border-radius: 50%; object-fit: cover;">
            </div>
            <div class="text" style="
                text-align: center;
                min-height: 70px;
                display: flex;
                align-items: center;
                justify-content: center;
            ">
                <h2 class="title" style="
                    font-size: 1.1rem;
                    color: #1f3b6e; 
                    font-weight: 700;
                    margin: 0;
                    line-height: 1.3;
                ">Консультант по программам MBA</h2>
            </div>
        </div>

        <div class="ratings-box" onclick="activateNextBox(this)"
            style="
                /* ИНЛАЙН СТИЛИ: Базовые */
                min-width: 250px; 
                max-width: 300px;
                background: #ffffff; 
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); 
                transition: all 0.4s ease-in-out; 
                cursor: pointer;
                flex-shrink: 0; 
                scroll-snap-align: start;
            ">
            <div class="logo" style="
                height: 80px;
                display: flex;
                justify-content: center;
                align-items: center;
                margin-bottom: 15px;
            ">
                <img src="изображение.jpg" alt="Барикова Алена Рудольфовна" style="height: 100%; width: auto; border-radius: 50%; object-fit: cover;">
            </div>
            <div class="text" style="
                text-align: center;
                min-height: 70px;
                display: flex;
                align-items: center;
                justify-content: center;
            ">
                <h2 class="title" style="
                    font-size: 1.1rem;
                    color: #1f3b6e; 
                    font-weight: 700;
                    margin: 0;
                    line-height: 1.3;
                ">Барикова Алёна Рудольфовна</h2>
            </div>
        </div>
        
        <div class="ratings-box" onclick="activateNextBox(this)"
            style="
                /* ИНЛАЙН СТИЛИ: Базовые */
                min-width: 250px; 
                max-width: 300px;
                background: #ffffff; 
                border-radius: 12px;
                padding: 20px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); 
                transition: all 0.4s ease-in-out; 
                cursor: pointer;
                flex-shrink: 0; 
                scroll-snap-align: start;
            ">
            <div class="logo" style="
                height: 80px;
                display: flex;
                justify-content: center;
                align-items: center;
                margin-bottom: 15px;
                background-color: #e60033; /* Красный цвет из источника */
                border-radius: 8px;
            ">
                <p style="font-size: 2.5rem; color: white; font-weight: 900; margin: 0;">95%</p>
            </div>
            <div class="text" style="
                text-align: center;
                min-height: 70px;
                display: flex;
                align-items: center;
                justify-content: center;
            ">
                <h2 class="title" style="
                    font-size: 1.1rem;
                    color: #1f3b6e; 
                    font-weight: 700;
                    margin: 0;
                    line-height: 1.3;
                "><p style="margin: 0;">ӘЛЕМДІК РЕЙТИНГІЛЕРДЕГІ ОРНЫ</p></h2>
            </div>
        </div>

    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.querySelector('.ratings-container');
            const boxes = container.querySelectorAll('.ratings-box');

            // Инициализация: Делаем ПОСЛЕДНИЙ элемент в DOM-порядке (который отображается как ПЕРВЫЙ СПРАВА) большим.
            if (boxes.length > 0) {
                boxes[boxes.length - 1].classList.add('large-box');
            }
        });

        /**
         * Всегда активирует ПРЕДЫДУЩИЙ элемент в ряду, двигаясь справа налево.
         * @param {HTMLElement} clickedBox - Элемент, по которому был произведен клик (используется как триггер).
         */
        function activateNextBox(clickedBox) {
            const container = clickedBox.closest('.ratings-container');
            const boxes = Array.from(container.querySelectorAll('.ratings-box'));
            
            // 1. Находим текущий активный элемент
            const currentActiveBox = container.querySelector('.ratings-box.large-box');
            let currentIndex = -1;

            if (currentActiveBox) {
                currentIndex = boxes.indexOf(currentActiveBox);
                currentActiveBox.classList.remove('large-box'); // Снимаем класс с текущего
            } else {
                // Если нет активного, начинаем с последнего (который справа)
                currentIndex = boxes.length; 
            }

            // 2. Определяем индекс ПРЕДЫДУЩЕГО элемента (справа налево).
            // (currentIndex - 1 + boxes.length) % boxes.length - это корректный способ для цикличности назад.
            let nextIndex = (currentIndex - 1 + boxes.length) % boxes.length;
            
            // 3. Активируем предыдущий элемент
            const nextBox = boxes[nextIndex];
            nextBox.classList.add('large-box');

            // 4. Прокручиваем контейнер к новому активному элементу
            // Используем 'end' для выравнивания по правой стороне (наиболее актуально для row-reverse)
             container.scrollTo({
                 left: nextBox.offsetLeft + nextBox.offsetWidth - container.offsetWidth,
                 behavior: 'smooth'
             });
        }
    </script>
</body>
</html>