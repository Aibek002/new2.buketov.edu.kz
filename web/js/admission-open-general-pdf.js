function openGeneralRulesPdf(id, filePath, type) {

    let selector = '.general-rules-pdf-bachelor';

    console.log(selector);
    const general_rules_pdf = document.querySelector(selector);
    general_rules_pdf.src = "";
    general_rules_pdf.classList.remove("active");


    setTimeout(() => {
        general_rules_pdf.classList.add("active");
        console.log(filePath);
        general_rules_pdf.src = filePath;
    }, 50);
    const element = document.getElementById(selector);
    console.log(element)
    if (element) {
        element.scrollIntoView({ behavior: 'smooth' });
    }
}
