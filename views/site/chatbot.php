<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Документы диссертанта (Обновленный дизайн)</title>
    <style>
        /* Переменная для примера, чтобы инлайн-стили выглядели корректно */
        :root {
            --indigoblue: #1f3b6e; /* Темный синий фон */
            --light-blue-accent: #2c5ca9; /* Средний синий для акцентов */
        }
        
        /* Стили для :hover, которые должны быть во внешнем блоке */
        .title-content:hover {
            transform: scale(1.01); 
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.5); 
        }
        
        /* Стили для кнопок, которые не могут быть инлайн (hover) */
        .button-section button:hover {
            background-color: #2c5ca9 !important; /* Насыщенный синий при наведении */
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
        }
    </style>
</head>
<body>

    <div class="title-content" 
        style="
            /* Исходные стили с заменой переменной */
            background: #1f3b6e; 
            padding: 20px 30px; 
            border-radius: 15px; 
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4); 
            margin: 30px auto; 
            color: #ffffff;
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: default;
            max-width: 900px; 
            line-height: 1.4;
        ">
        
        <h2 style="
            font-size: 1.8rem; 
            font-weight: 700;
            color: #ffc107; /* Золотистый акцент */
            margin-bottom: 5px; 
        ">
            Document`s
        </h2>
        
        <p style="
            font-size: 1.5rem; 
            font-weight: 600; 
            margin-top: 0;
            color: #ffffff;
            border-bottom: 2px solid #2c5ca9; 
            padding-bottom: 10px;
            margin-bottom: 25px; /* Увеличил отступ перед кнопками */
        ">
            Шакирова Алтынай Боранкулкызы
        </p>

        <div class="button-section" 
            style="
                /* ИСПОЛЬЗУЕМ FLEXBOX ДЛЯ КРАСИВОГО ВЫРАВНИВАНИЯ */
                display: flex; 
                flex-wrap: wrap; 
                justify-content: space-evenly; /* Равномерно распределяет кнопки */
                align-items: stretch; /* Важно, чтобы кнопки вытягивались по высоте */
                gap: 12px; /* Расстояние между кнопками */
                margin-top: 20px;
            ">
            
            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Аннотация.pdf','.second')"
                style="
                    /* УЛУЧШЕННАЯ ЧИТАБЕЛЬНОСТЬ и ВИД */
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; /* Увеличил padding для лучшей читабельности */
                    border-radius: 8px; 
                    font-size: 1rem; /* Увеличил шрифт */
                    font-weight: 600; /* Сделал шрифт жирнее */
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    
                    /* ВЫРАВНИВАНИЕ */
                    flex: 1 1 280px; /* flex-grow: 1, flex-shrink: 1, flex-basis: 280px */
                    min-width: 280px; /* Минимальная ширина для хорошего размещения в 2-3 столбца */
                    line-height: 1.2; /* Улучшает вертикальное выравнивание текста */
                ">
                Аннотация.pdf
            </button>

            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Диссертационная работа.pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Диссертационная работа.pdf
            </button>

            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Заключение этической комиссии.pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Заключение этической комиссии.pdf
            </button>

            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Объявление.pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Объявление.pdf
            </button>
            
            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Отзыв зарубежного научного консультанта.pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Отзыв зарубежного научного консультанта.pdf
            </button>

            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Отзыв отечественного научного консультанта 1.pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Отзыв отечественного научного консультанта 1.pdf
            </button>

            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Отзыв отечественного научного консультанта 2 .pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Отзыв отечественного научного консультанта 2 .pdf
            </button>

            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Приказ о назначении временных членов .pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Приказ о назначении временных членов .pdf
            </button>

            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Рецензия 1.pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Рецензия 1.pdf
            </button>

            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Рецензия 2.pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Рецензия 2.pdf
            </button>

            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Сопроводительное письмо.pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Сопроводительное письмо.pdf
            </button>

            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Список научных трудов.pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Список научных трудов.pdf
            </button>
            
            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Аннотация.pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Аннотация.pdf
            </button>

            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Диссертационная работа.pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Диссертационная работа.pdf
            </button>

            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Заключение этической комиссии.pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Заключение этической комиссии.pdf
            </button>

            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Объявление.pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Объявление.pdf
            </button>
            
            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Отзыв зарубежного научного консультанта.pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Отзыв зарубежного научного консультанта.pdf
            </button>

            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Отзыв отечественного научного консультанта 1.pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Отзыв отечественного научного консультанта 1.pdf
            </button>

            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Отзыв отечественного научного консультанта 2 .pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Отзыв отечественного научного консультанта 2 .pdf
            </button>

            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Приказ о назначении временных членов .pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Приказ о назначении временных членов .pdf
            </button>

            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Рецензия 1.pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Рецензия 1.pdf
            </button>

            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Рецензия 2.pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Рецензия 2.pdf
            </button>

            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Сопроводительное письмо.pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Сопроводительное письмо.pdf
            </button>

            <button onclick="openGeneralRulesPdf('/files/pdf/dissertation_advice/Юридический/Құқықтану/Шакирова Алтынай Боранкулкызы/Список научных трудов.pdf','.second')"
                style="
                    background-color: #3f51b5; 
                    color: white; 
                    border: none; 
                    padding: 12px 18px; 
                    border-radius: 8px; 
                    font-size: 1rem; 
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s ease;
                    text-align: center;
                    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
                    flex: 1 1 280px; 
                    min-width: 280px;
                    line-height: 1.2;
                ">
                Список научных трудов.pdf
            </button>
        </div>
    </div>
</body>
</html>