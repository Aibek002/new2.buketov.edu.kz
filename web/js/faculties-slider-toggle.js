document.addEventListener('DOMContentLoaded', function () {
    const infAboutFacultiesBTN = document.querySelector('.information-faculties-btn');
    const dateAndFactsBTN = document.querySelector('.date-and-facts-faculties-btn');
    const departamentBTN = document.querySelector('.departament-faculties-btn');
    const moveBox = document.querySelector('.move-content-faculties');

    infAboutFacultiesBTN.addEventListener('click', function () {
        updateMoveClass('part-infAboutFaculties');
    });

    dateAndFactsBTN.addEventListener('click', function () {
        updateMoveClass('part-dateAndFacts');
    });

    departamentBTN.addEventListener('click', function () {
        updateMoveClass('part-departament');
    });

    function updateMoveClass(newClass) {
        moveBox.classList.remove('part-infAboutFaculties', 'part-dateAndFacts', 'part-departament');
        moveBox.classList.add(newClass);
    }
});
