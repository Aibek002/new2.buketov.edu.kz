document.addEventListener("DOMContentLoaded", function () {
    const sections = {
        loadSoleShareHolderBtn: ".uchenie-sovet",
        loadBoardOfDirectorsBtn: ".academ-sovet",
        loadGovernanceBtn: ".nauchno-sovet",
        loadSustainableDevelopmentBtn: ".sovet-etica"
    };

    // Скрыть все секции
    function hideAllSections() {
        Object.values(sections).forEach(selector => {
            document.querySelector(selector).style.display = "none";
        });
    }

    // Назначить обработчики на кнопки
    Object.keys(sections).forEach(buttonId => {
        const button = document.getElementById(buttonId);
        const sectionSelector = sections[buttonId];

        if (button && sectionSelector) {
            button.addEventListener("click", function () {
                hideAllSections();
                const section = document.querySelector(sectionSelector);
                if (section) {
                    section.style.display = "block";
                }
            });
        }
    });

    // Показываем по умолчанию первую секцию
    hideAllSections();
    document.querySelector(".sovet-etica").style.display = "block";
});
