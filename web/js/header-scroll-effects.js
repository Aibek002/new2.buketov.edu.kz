
document.addEventListener('DOMContentLoaded', function () {
    const menuIcon= document.querySelector('.dropdown-toggle-header');
    const logo = document.querySelector('.logoBuketov');
    const header = document.querySelector('.header');
    const langswitcher = document.querySelector('.lang-switcher');

    window.addEventListener('scroll',function(){
    if(window.scrollY>400){
        header.classList.add('scrolled');
        logo.style.display='block';
        menuIcon.style.background="transparent"
        langswitcher.style.background="transparent"

        menuIcon.style.border="1px #fff solid";

    }else if(window.scrollY<400){
        header.classList.remove('scrolled');
        logo.style.display='none';
        langswitcher.style.background="var(--indigoblue)"
       
        menuIcon.style.background="transparent"
        menuIcon.style.border="1px solid white";
    }
    });
});