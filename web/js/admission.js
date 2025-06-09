function openSection(type) {
    const existsClasses = document.querySelectorAll('.bakalavriat, .magistrant, .doctorant');
    existsClasses.forEach((classElement) => {
        classElement.classList.remove('active');
    });

    if (type == 'bakalavr') {
        const bakalavr = document.querySelector(".bakalavriat");
        bakalavr.classList.toggle('active');
    }else if(type == 'magistrant'){
        const magistrant = document.querySelector(".magistrant");
        magistrant.classList.toggle('active');
    }else{
        const doctorant = document.querySelector(".doctorant");
        doctorant.classList.toggle('active');
    }
}