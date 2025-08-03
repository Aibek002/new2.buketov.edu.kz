function openGeneralRulesPdf(filePath, type) {
    let selector = '.general-rules-pdf-bachelor'; // Это класс
    const general_rules_pdf = document.querySelector(selector); // получаем элемент по классу

    if (!general_rules_pdf) {
        console.warn("Элемент не найден:", selector);
        return;
    }

    // Очистка и обновление источника PDF
    general_rules_pdf.src = "";
    general_rules_pdf.classList.remove("active");

    setTimeout(() => {
        general_rules_pdf.classList.add("active");
        general_rules_pdf.src = filePath;
    }, 50);

    // Прокрутка к элементу
    general_rules_pdf.scrollIntoView({ behavior: 'smooth' });
}
