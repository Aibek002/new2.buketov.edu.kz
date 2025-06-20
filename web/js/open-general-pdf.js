function openGeneralRulesPdf(filePath, type) {
    console.log(type);
    let selector = `.general-rules-pdf`;
    if (type && type !== '') {
        selector = `${type} ${selector}`;
    }
    const general_rules_pdf = document.querySelector(selector);
    general_rules_pdf.src = "";
    general_rules_pdf.classList.remove("active");

    console.log(filePath);
    setTimeout(() => {
        general_rules_pdf.classList.add("active");
        console.log(filePath);
        general_rules_pdf.src = filePath;
    }, 50);
}
