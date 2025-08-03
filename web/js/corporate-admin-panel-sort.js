
document.addEventListener("DOMContentLoaded", function () {

    const select_subsection = document.querySelector('.select-subsection-corpupr');
    const select_year = document.querySelector('.select-year');
    const select_file = document.querySelector('.select-file');
    const name_url = document.querySelector('.name_url_input');
    const submitButton = document.querySelector('.submitButton');

    select_subsection.addEventListener('change', function () {
        if (select_subsection.value === 'Решения Единственного Акционера') {
            select_year.classList.add('active');

            select_year.addEventListener('change', function () {
                if (select_subsection.value === 'Решения Единственного Акционера' && select_year.selectedIndex > 0) {
                    select_file.classList.add('active');

                    select_file.addEventListener('change', function () {
                        if (select_file.files.length > 0) {
                            name_url.classList.add('active');
                            name_url.addEventListener('change', function () {
                                if (name_url.value.trim != "") {
                                    submitButton.classList.add('active');
                                } else {
                                    submitButton.classList.remove('active');
                                }
                            });
                        } else {
                            name_url.classList.remove('active');
                        }
                    })
                } else {
                    select_file.classList.remove('active');
                }
            })


        } else {
            select_year.classList.remove('active');
        }
    });
});