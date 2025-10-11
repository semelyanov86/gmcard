const block = document.querySelector('.mains');
const block2 = document.querySelector('.mains2');
const block3 = document.querySelector('.mains3');
const block4 = document.querySelector('.mains4');
const block5 = document.querySelector('.mains5');
const block6 = document.querySelector('.mains6');
const block7 = document.querySelector('.mains7');
const block8 = document.querySelector('.mains8');
const block9 = document.querySelector('.mains9');
const block10 = document.querySelector('.mains10');
const block11 = document.querySelector('.mains11');
const block12 = document.querySelector('.mains12');
const activeImg = document.querySelector(".image-1")
const activeImg2 = document.querySelector(".image-2")
const activeImg3 = document.querySelector(".image-3")
const activeImg4 = document.querySelector(".image-4")
const activeImg5 = document.querySelector(".image-5")
const activeImg6 = document.querySelector(".image-6")
const activeImg7 = document.querySelector(".image-7")
const activeImg8 = document.querySelector(".image-8")
const activeImg9 = document.querySelector(".image-9")
const activeImg10 = document.querySelector(".image-10")
const activeImg11 = document.querySelector(".image-11")
const activeImg12 = document.querySelector(".image-12")
const topBar = document.querySelector("#topBar")


// const lists = document.querySelector('#lists')


// const blockList = document.querySelector('#blocks_list')

// sub menu
const modalTrigger1 = document.querySelector('#icons_block1');
const modalTrigger2 = document.querySelector('#icons_block2');
const modalTrigger3 = document.querySelector('#icons_block3');
const modalTrigger4 = document.querySelector('#icons_block4');
const modalTrigger5 = document.querySelector('#icons_block5');
const modalTrigger6 = document.querySelector('#icons_block6');
const modalTrigger7 = document.querySelector('#icons_block7');
const modalTrigger8 = document.querySelector('#icons_block8');
const modalTrigger9 = document.querySelector('#icons_block9');
const modalTrigger10 = document.querySelector('#icons_block10');
const modalTrigger11 = document.querySelector('#icons_block11');
const modalTrigger12 = document.querySelector('#icons_block12');

const modal = document.querySelector('#modal_sub');
const modalClose = document.querySelector('#modal-closeSub');

const modalCahOpen = document.querySelector('#modal-cash');
const modalCash = document.querySelector('#staticModals');
const modalCashClose = document.querySelector('#close_Modal');
const modalCashSubmit = document.querySelector('#close_Submit');



// const myClass = document.querySelector(".my-class")

const dropdown = document.querySelector('.drop_list');
const arrow = document.querySelector('#icons1');
const arrow1 = document.querySelector('#icons2');
const arrow2 = document.querySelector('#icons3');
const arrow4 = document.querySelector('#icons4');
const arrow5 = document.querySelector('#icons5');
const arrow6 = document.querySelector('#icons6');
const arrow7 = document.querySelector('#icons7');
const arrow8 = document.querySelector('#icons8');
const arrow9 = document.querySelector('#icons9');
const arrow10 = document.querySelector('#icons10');
const arrow11 = document.querySelector('#icons11');
const arrow12 = document.querySelector('#icons12');

// select option start
const select = document.querySelector('.custom-select');
const select1 = document.querySelector('.custom_select');
const select2 = document.querySelector('.custom_selected');


const optionsContainer = document.querySelector('.custom-options');
const optionsContainer1 = document.querySelector('.custom-options_1');
const optionsContainer2 = document.querySelector('.custom-options_2');


const optionsList = document.querySelectorAll('.custom-option');
const optionsList1 = document.querySelectorAll('.custom-option_1');
const optionsList2 = document.querySelectorAll('.custom-option_2');
const span1 = document.querySelector("#spaner")
const span2 = document.querySelector("#spaner1")

// const listParent = document.querySelector('#list_subMenu')

const open_menuList = document.querySelector(".animated-block")

const open_menu = document.querySelector("#open_menu")


// authorization dropdown

const userAuth1 = document.querySelector("#userAuth1")
const userAuth2 = document.querySelector("#userAuth2")
const userAuth3 = document.querySelector("#userAuth3")
const btnLink1 = document.querySelector("#startBTN")
const btnLink2 = document.querySelector("#loginBTN")
const btnLink3 = document.querySelector("#mobileBTN")
const authDropDown = document.querySelector("#userDropdown")
const authDropDownMob = document.querySelector("#userDropdownMobile")
const closeDrop = document.querySelector("#closeDrop")
const closeMobDrop = document.querySelector("#closeDropMob")
const section = document.querySelector("#section-1")
const topbar = document.querySelector("#topBar")
const header = document.querySelector("#header")

const deleteLeave = document.querySelectorAll(".delete-link");
const upLeave = document.querySelectorAll(".up-link");

deleteLeave.forEach(item => {
    item.addEventListener("click", (event) => {
        event.preventDefault(); 
        const modalId = item.getAttribute('data-modal');
        const modal = document.querySelector(`.${modalId}`);
        if (modal) {
            modal.classList.remove("hidden");
        }
    });
});

upLeave.forEach(item => {
    item.addEventListener("click", (event) => {
        event.preventDefault();
        const modalId = item.getAttribute('data-modal');
        const modal = document.querySelector(`.${modalId}`);
        if (modal) {
            modal.classList.remove("hidden");
        }
    });
});

// Закрытие модального окна при клике вне его
document.addEventListener("click", (event) => {
    const modals = [modal_delete, modal_up];
    modals.forEach(modal => {
        if (modal && !modal.classList.contains("hidden") && !modal.contains(event.target) && !event.target.matches(`.${modal.className}`)) {
            modal.classList.add("hidden");
        }
    });
});

// Кнопки закрытия
const closeModalButtons = document.querySelectorAll(".close_modal1, .close_modal2, .modal_click_act");
closeModalButtons.forEach(button => {
    button.addEventListener("click", (event) => {
        event.preventDefault();
        const modal = button.closest('.substrate');
        if (modal) {
            modal.classList.add("hidden");
        }
    });
});

// const commentLink = document.querySelector(".cashback-card-comment-link");
//     const content2 = document.getElementById("content2");
//     const tab2 = document.getElementById("tab2");

//     commentLink.addEventListener("click", (event) => {
//         event.preventDefault(); // Предотвращаем переход по ссылке

//         // Переключаемся на вкладку 2
//         if (tab2) {
//             tab2.checked = true; // Устанавливаем состояние checked
//             const changeEvent = new Event('change'); // Создаем событие изменения
//             tab2.dispatchEvent(changeEvent); // Отправляем событие
//         }

//         // Скроллим страницу до элемента с id="content2"
//         setTimeout(() => {
//             content2.scrollIntoView({ behavior: 'smooth', block: 'start' });
//         }, 50); // Небольшая задержка перед скроллом
//     });


// function showYellow(element) {
//     const container = element.parentNode;
//     // Скрыть оригинал и показать желтую иконку
//     element.classList.add('hidden'); // Скрыть оригинал
//     container.querySelector('.yellow').classList.remove('hidden'); // Показать желтый
// }

// function showOriginal(element) {
//     const container = element.parentNode;
//     // Показать оригинал и скрыть желтую иконку
//     container.querySelector('.original').classList.remove('hidden'); // Показать оригинал
//     container.querySelector('.yellow').classList.add('hidden'); // Скрыть желтый
// }

document.querySelectorAll('.toggle-subcategories').forEach(item => {
    item.addEventListener('click', (event) => {
        event.preventDefault(); // Отменяем стандартное поведение ссылки
        const subcategories = item.nextElementSibling; // Получаем следующий элемент (подкатегории)
        if (subcategories.classList.contains('hidden')) {
            subcategories.classList.remove('hidden'); // Показываем подкатегории
        } else {
            subcategories.classList.add('hidden'); // Скрываем подкатегории
        }
    });
});


userAuth1.addEventListener("click", () => {
    btnLink1.classList.remove("hidden")
    authDropDown.classList.remove("hidden")
    btnLink2.classList.add("hidden")

})

userAuth2.addEventListener("click", () => {
    btnLink2.classList.remove("hidden")
    authDropDown.classList.remove("hidden")
    btnLink1.classList.add("hidden")
})

userAuth3.addEventListener("click", () => {
    btnLink3.classList.remove("hidden")
    authDropDownMob.classList.remove("hidden")
    authDropDownMob.classList.add("flex")
})

closeMobDrop.addEventListener('click', () => {
    btnLink3.classList.add("hidden")
    authDropDownMob.classList.add("hidden")
    authDropDownMob.classList.remove("flex")
})


closeDrop.addEventListener('click', () => {
    btnLink1.classList.add("hidden")
    btnLink2.classList.add("hidden")
    btnLink3.classList.add("hidden")
    authDropDown.classList.add("hidden")
    authDropDownMob.classList.add("hidden")
    authDropDownMob.classList.remove("flex")
})

window.addEventListener("click", (event) => {
    if (event.target == section) {
        authDropDown.classList.add("hidden");
        btnLink1.classList.add("hidden")
        btnLink2.classList.add("hidden")
    }
    if (event.target == topbar) {
        authDropDown.classList.add("hidden");
        btnLink1.classList.add("hidden")
        btnLink2.classList.add("hidden")
    }
    if (event.target == header) {
        authDropDown.classList.add("hidden");
        btnLink1.classList.add("hidden")
        btnLink2.classList.add("hidden")
    }
});



// Удалено - данные категорий теперь в Vue компоненте

// cash modal
modalCahOpen.addEventListener('click', function () {
    modalCash.classList.remove('hidden');
    modalCash.classList.add('flex');
    document.body.style.overflow = 'hidden';
});

modalCashClose.addEventListener('click', function () {
    modalCash.classList.remove('flex');
    modalCash.classList.add('hidden');
    document.body.style.overflow = 'auto';
});

modalCashSubmit.addEventListener('click', function () {
    modalCash.classList.remove('flex');
    modalCash.classList.add('hidden');
    document.body.style.overflow = 'auto';
});
// Удалено - элементы теперь создаются в Vue компоненте

// 1
optionsList[0].classList.add('text-black');
optionsList1[0].classList.add('text-black');
optionsList2[0].classList.add('text-black');


select.addEventListener('click', function () {
    optionsContainer.classList.toggle('hidden');
    select.querySelector('img').classList.toggle('rotate-180');
});


// modal sub menu
modalTrigger1.addEventListener('click', function () {
    modal.classList.remove('hidden');
    modal.classList.add("flex")
    document.body.style.overflow = 'hidden';
});
modalTrigger2.addEventListener('click', function () {
    modal.classList.remove('hidden');
    modal.classList.add("flex")
    document.body.style.overflow = 'hidden';
});
modalTrigger3.addEventListener('click', function () {
    modal.classList.remove('hidden');
    modal.classList.add("flex")
    document.body.style.overflow = 'hidden';
});
modalTrigger4.addEventListener('click', function () {
    modal.classList.remove('hidden');
    modal.classList.add("flex")
    document.body.style.overflow = 'hidden';
});
modalTrigger5.addEventListener('click', function () {
    modal.classList.remove('hidden');
    modal.classList.add("flex")
    document.body.style.overflow = 'hidden';
});
modalTrigger6.addEventListener('click', function () {
    modal.classList.remove('hidden');
    modal.classList.add("flex")
    document.body.style.overflow = 'hidden';
});
modalTrigger7.addEventListener('click', function () {
    modal.classList.remove('hidden');
    modal.classList.add("flex")
    document.body.style.overflow = 'hidden';
});
modalTrigger8.addEventListener('click', function () {
    modal.classList.remove('hidden');
    modal.classList.add("flex")
    document.body.style.overflow = 'hidden';
});
modalTrigger9.addEventListener('click', function () {
    modal.classList.remove('hidden');
    modal.classList.add("flex")
    document.body.style.overflow = 'hidden';
});
modalTrigger10.addEventListener('click', function () {
    modal.classList.remove('hidden');
    modal.classList.add("flex")
    document.body.style.overflow = 'hidden';
});
modalTrigger11.addEventListener('click', function () {
    modal.classList.remove('hidden');
    modal.classList.add("flex")
    document.body.style.overflow = 'hidden';
});
modalTrigger12.addEventListener('click', function () {
    modal.classList.remove('hidden');
    modal.classList.add("flex")
    document.body.style.overflow = 'hidden';
});
modalClose.addEventListener('click', function () {
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
});



optionsList.forEach(option => {
    option.addEventListener('click', function () {
        optionsList.forEach(option => {
            option.classList.remove('bg-[#F9D914]');
            option.classList.remove('text-black');
        });
        this.classList.add('bg-[#F9D914]');
        this.classList.add('text-black');
        console.log(select.querySelector('span').textContent)
        select.querySelector('span').textContent = option.textContent;
        optionsContainer.classList.add('hidden');
    });
});

optionsContainer.addEventListener('mouseleave', function () {
    optionsContainer.classList.add('hidden');
    select.querySelector('img').classList.toggle('rotate-180');
});

// 2
select1.addEventListener('click', function () {
    optionsContainer1.classList.toggle('hidden');
    select1.querySelector('img').classList.toggle('rotate-180');
});

optionsList1.forEach(option => {
    option.addEventListener('click', function () {
        optionsList1.forEach(option => {
            option.classList.remove('bg-[#F9D914]');
            option.classList.remove('text-black');
        });
        this.classList.add('bg-[#F9D914]');
        this.classList.add('text-black');
        span1.textContent = option.textContent;
        optionsContainer1.classList.add('hidden');
    });
});

optionsContainer1.addEventListener('mouseleave', function () {
    optionsContainer1.classList.add('hidden');
    select1.getElementsByTagName('img').classList.toggle('rotate-180');
});

// 3
select2.addEventListener('click', function () {
    optionsContainer2.classList.toggle('hidden');
    select2.querySelector('img').classList.toggle('rotate-180');
});

optionsList2.forEach(option => {
    option.addEventListener('click', function () {
        optionsList2.forEach(option => {
            option.classList.remove('bg-[#F9D914]');
            option.classList.remove('text-black');
        });
        this.classList.add('bg-[#F9D914]');
        this.classList.add('text-black');
        span2.textContent = option.textContent;
        optionsContainer2.classList.add('hidden');
    });
});

optionsContainer2.addEventListener('mouseleave', function () {
    optionsContainer2.classList.add('hidden');
    select2.getElementsByTagName('img').classList.toggle('rotate-180');
});
// select option end


// Удалено - элементы теперь создаются в Vue компоненте

// Удалено - логика обновления заголовка теперь в Vue компоненте





const cashBackBlock = document.querySelector('.mains')

cashBackBlock.addEventListener('click', () => {
    console.log('cashBackBlock')
})


// 1
block.addEventListener('mouseenter', () => {
    console.log('ffffff')
    dropdown.classList.remove('hidden');
    arrow.classList.remove('hidden');
    arrow1.classList.add('hidden');
    arrow2.classList.add('hidden');
    arrow4.classList.add('hidden');
    arrow5.classList.add('hidden');
    arrow6.classList.add('hidden');
    arrow7.classList.add('hidden');
    arrow8.classList.add('hidden');
    arrow9.classList.add('hidden');
    arrow10.classList.add('hidden');
    arrow11.classList.add('hidden');
    arrow12.classList.add('hidden');
    activeImg.classList.add('activeImage')
    activeImg.classList.remove("image-1")
    activeImg2.classList.add("image-2")
    activeImg3.classList.add("image-3")
    activeImg4.classList.add("image-4")
    activeImg5.classList.add("image-5")
    activeImg6.classList.add("image-6")
    activeImg7.classList.add("image-7")
    activeImg8.classList.add("image-8")
    activeImg9.classList.add("image-9")
    activeImg10.classList.add("image-10")
    activeImg11.classList.add("image-11")
    activeImg12.classList.add("image-12")
    activeImg2.classList.remove('activeImage2')
    activeImg3.classList.remove('activeImage3')
    activeImg4.classList.remove('activeImage4')
    activeImg5.classList.remove('activeImage5')
    activeImg6.classList.remove('activeImage6')
    activeImg7.classList.remove('activeImage7')
    activeImg8.classList.remove('activeImage8')
    activeImg9.classList.remove('activeImage9')
    activeImg10.classList.remove('activeImage10')
    activeImg11.classList.remove('activeImage11')
    activeImg12.classList.remove('activeImage12')
    authDropDown.classList.add("hidden");
    btnLink1.classList.add("hidden")
    btnLink2.classList.add("hidden")
});

// 2
block2.addEventListener('mouseenter', () => {
    console.log('ffffff22222')
    dropdown.classList.remove('hidden');
    arrow1.classList.remove('hidden');
    arrow.classList.add('hidden');
    arrow2.classList.add('hidden');
    arrow4.classList.add('hidden');
    arrow5.classList.add('hidden');
    arrow6.classList.add('hidden');
    arrow7.classList.add('hidden');
    arrow8.classList.add('hidden');
    arrow9.classList.add('hidden');
    arrow10.classList.add('hidden');
    arrow11.classList.add('hidden');
    arrow12.classList.add('hidden');
    activeImg.classList.remove('activeImage')
    activeImg.classList.add("image-1")
    activeImg2.classList.remove("image-2")
    activeImg3.classList.add("image-3")
    activeImg4.classList.add("image-4")
    activeImg5.classList.add("image-5")
    activeImg6.classList.add("image-6")
    activeImg7.classList.add("image-7")
    activeImg8.classList.add("image-8")
    activeImg9.classList.add("image-9")
    activeImg10.classList.add("image-10")
    activeImg11.classList.add("image-11")
    activeImg12.classList.add("image-12")
    activeImg2.classList.add('activeImage2')
    activeImg3.classList.remove('activeImage3')
    activeImg4.classList.remove('activeImage4')
    activeImg5.classList.remove('activeImage5')
    activeImg6.classList.remove('activeImage6')
    activeImg7.classList.remove('activeImage7')
    activeImg8.classList.remove('activeImage8')
    activeImg9.classList.remove('activeImage9')
    activeImg10.classList.remove('activeImage10')
    activeImg11.classList.remove('activeImage11')
    activeImg12.classList.remove('activeImage12')
    authDropDown.classList.add("hidden");
    btnLink1.classList.add("hidden")
    btnLink2.classList.add("hidden")
});

// 3
block3.addEventListener('mouseenter', () => {
    dropdown.classList.remove('hidden');
    arrow2.classList.remove('hidden');
    arrow.classList.add('hidden');
    arrow1.classList.add('hidden');
    arrow4.classList.add('hidden');
    arrow5.classList.add('hidden');
    arrow6.classList.add('hidden');
    arrow7.classList.add('hidden');
    arrow8.classList.add('hidden');
    arrow9.classList.add('hidden');
    arrow10.classList.add('hidden');
    arrow11.classList.add('hidden');
    arrow12.classList.add('hidden');
    activeImg.classList.remove('activeImage')
    activeImg.classList.add("image-1")
    activeImg2.classList.add("image-2")
    activeImg3.classList.remove("image-3")
    activeImg4.classList.add("image-4")
    activeImg5.classList.add("image-5")
    activeImg6.classList.add("image-6")
    activeImg7.classList.add("image-7")
    activeImg8.classList.add("image-8")
    activeImg9.classList.add("image-9")
    activeImg10.classList.add("image-10")
    activeImg11.classList.add("image-11")
    activeImg12.classList.add("image-12")
    activeImg2.classList.remove('activeImage2')
    activeImg3.classList.add('activeImage3')
    activeImg4.classList.remove('activeImage4')
    activeImg5.classList.remove('activeImage5')
    activeImg6.classList.remove('activeImage6')
    activeImg7.classList.remove('activeImage7')
    activeImg8.classList.remove('activeImage8')
    activeImg9.classList.remove('activeImage9')
    activeImg10.classList.remove('activeImage10')
    activeImg11.classList.remove('activeImage11')
    activeImg12.classList.remove('activeImage12')
    authDropDown.classList.add("hidden");
    btnLink1.classList.add("hidden")
    btnLink2.classList.add("hidden")
});
;
// 4
block4.addEventListener('mouseenter', () => {
    dropdown.classList.remove('hidden');
    arrow4.classList.remove('hidden');
    arrow.classList.add('hidden');
    arrow1.classList.add('hidden');
    arrow2.classList.add('hidden');
    arrow5.classList.add('hidden');
    arrow6.classList.add('hidden');
    arrow7.classList.add('hidden');
    arrow8.classList.add('hidden');
    arrow9.classList.add('hidden');
    arrow10.classList.add('hidden');
    arrow11.classList.add('hidden');
    arrow12.classList.add('hidden');
    activeImg.classList.remove('activeImage')
    activeImg.classList.add("image-1")
    activeImg2.classList.add("image-2")
    activeImg3.classList.add("image-3")
    activeImg4.classList.remove("image-4")
    activeImg5.classList.add("image-5")
    activeImg6.classList.add("image-6")
    activeImg7.classList.add("image-7")
    activeImg8.classList.add("image-8")
    activeImg9.classList.add("image-9")
    activeImg10.classList.add("image-10")
    activeImg11.classList.add("image-11")
    activeImg12.classList.add("image-12")
    activeImg2.classList.remove('activeImage2')
    activeImg3.classList.remove('activeImage3')
    activeImg4.classList.add('activeImage4')
    activeImg5.classList.remove('activeImage5')
    activeImg6.classList.remove('activeImage6')
    activeImg7.classList.remove('activeImage7')
    activeImg8.classList.remove('activeImage8')
    activeImg9.classList.remove('activeImage9')
    activeImg10.classList.remove('activeImage10')
    activeImg11.classList.remove('activeImage11')
    activeImg12.classList.remove('activeImage12')
    authDropDown.classList.add("hidden");
    btnLink1.classList.add("hidden")
    btnLink2.classList.add("hidden")
});

// 5
block5.addEventListener('mouseenter', () => {
    dropdown.classList.remove('hidden');
    arrow5.classList.remove('hidden');
    arrow.classList.add('hidden');
    arrow1.classList.add('hidden');
    arrow2.classList.add('hidden');
    arrow4.classList.add('hidden');
    arrow6.classList.add('hidden');
    arrow7.classList.add('hidden');
    arrow8.classList.add('hidden');
    arrow9.classList.add('hidden');
    arrow10.classList.add('hidden');
    arrow11.classList.add('hidden');
    arrow12.classList.add('hidden');
    activeImg.classList.remove('activeImage')
    activeImg.classList.add("image-1")
    activeImg2.classList.add("image-2")
    activeImg3.classList.add("image-3")
    activeImg4.classList.add("image-4")
    activeImg5.classList.remove("image-5")
    activeImg6.classList.add("image-6")
    activeImg7.classList.add("image-7")
    activeImg8.classList.add("image-8")
    activeImg9.classList.add("image-9")
    activeImg10.classList.add("image-10")
    activeImg11.classList.add("image-11")
    activeImg12.classList.add("image-12")
    activeImg2.classList.remove('activeImage2')
    activeImg3.classList.remove('activeImage3')
    activeImg4.classList.remove('activeImage4')
    activeImg5.classList.add('activeImage5')
    activeImg6.classList.remove('activeImage6')
    activeImg7.classList.remove('activeImage7')
    activeImg8.classList.remove('activeImage8')
    activeImg9.classList.remove('activeImage9')
    activeImg10.classList.remove('activeImage10')
    activeImg11.classList.remove('activeImage11')
    activeImg12.classList.remove('activeImage12')
    authDropDown.classList.add("hidden");
    btnLink1.classList.add("hidden")
    btnLink2.classList.add("hidden")
});

// 6
block6.addEventListener('mouseenter', () => {
    dropdown.classList.remove('hidden');
    arrow6.classList.remove('hidden');
    arrow.classList.add('hidden');
    arrow1.classList.add('hidden');
    arrow2.classList.add('hidden');
    arrow4.classList.add('hidden');
    arrow5.classList.add('hidden');
    arrow7.classList.add('hidden');
    arrow8.classList.add('hidden');
    arrow9.classList.add('hidden');
    arrow10.classList.add('hidden');
    arrow11.classList.add('hidden');
    arrow12.classList.add('hidden');
    activeImg.classList.remove('activeImage')
    activeImg.classList.add("image-1")
    activeImg2.classList.add("image-2")
    activeImg3.classList.add("image-3")
    activeImg4.classList.add("image-4")
    activeImg5.classList.add("image-5")
    activeImg6.classList.remove("image-6")
    activeImg7.classList.add("image-7")
    activeImg8.classList.add("image-8")
    activeImg9.classList.add("image-9")
    activeImg10.classList.add("image-10")
    activeImg11.classList.add("image-11")
    activeImg12.classList.add("image-12")
    activeImg2.classList.remove('activeImage2')
    activeImg3.classList.remove('activeImage3')
    activeImg4.classList.remove('activeImage4')
    activeImg5.classList.remove('activeImage5')
    activeImg6.classList.add('activeImage6')
    activeImg7.classList.remove('activeImage7')
    activeImg8.classList.remove('activeImage8')
    activeImg9.classList.remove('activeImage9')
    activeImg10.classList.remove('activeImage10')
    activeImg11.classList.remove('activeImage11')
    activeImg12.classList.remove('activeImage12')
    authDropDown.classList.add("hidden");
    btnLink1.classList.add("hidden")
    btnLink2.classList.add("hidden")
});

// 7
block7.addEventListener('mouseenter', () => {
    dropdown.classList.remove('hidden');
    arrow7.classList.remove('hidden');
    arrow.classList.add('hidden');
    arrow1.classList.add('hidden');
    arrow2.classList.add('hidden');
    arrow4.classList.add('hidden');
    arrow5.classList.add('hidden');
    arrow6.classList.add('hidden');
    arrow8.classList.add('hidden');
    arrow9.classList.add('hidden');
    arrow10.classList.add('hidden');
    arrow11.classList.add('hidden');
    arrow12.classList.add('hidden');
    activeImg.classList.remove('activeImage')
    activeImg.classList.add("image-1")
    activeImg2.classList.add("image-2")
    activeImg3.classList.add("image-3")
    activeImg4.classList.add("image-4")
    activeImg5.classList.add("image-5")
    activeImg6.classList.add("image-6")
    activeImg7.classList.remove("image-7")
    activeImg8.classList.add("image-8")
    activeImg9.classList.add("image-9")
    activeImg10.classList.add("image-10")
    activeImg11.classList.add("image-11")
    activeImg12.classList.add("image-12")
    activeImg2.classList.remove('activeImage2')
    activeImg3.classList.remove('activeImage3')
    activeImg4.classList.remove('activeImage4')
    activeImg5.classList.remove('activeImage5')
    activeImg6.classList.remove('activeImage6')
    activeImg7.classList.add('activeImage7')
    activeImg8.classList.remove('activeImage8')
    activeImg9.classList.remove('activeImage9')
    activeImg10.classList.remove('activeImage10')
    activeImg11.classList.remove('activeImage11')
    activeImg12.classList.remove('activeImage12')
    authDropDown.classList.add("hidden");
    btnLink1.classList.add("hidden")
    btnLink2.classList.add("hidden")
});

// 8
block8.addEventListener('mouseenter', () => {
    dropdown.classList.remove('hidden');
    arrow8.classList.remove('hidden');
    arrow.classList.add('hidden');
    arrow1.classList.add('hidden');
    arrow2.classList.add('hidden');
    arrow4.classList.add('hidden');
    arrow5.classList.add('hidden');
    arrow6.classList.add('hidden');
    arrow7.classList.add('hidden');
    arrow9.classList.add('hidden');
    arrow10.classList.add('hidden');
    arrow11.classList.add('hidden');
    arrow12.classList.add('hidden');
    activeImg.classList.remove('activeImage')
    activeImg.classList.add("image-1")
    activeImg2.classList.add("image-2")
    activeImg3.classList.add("image-3")
    activeImg4.classList.add("image-4")
    activeImg5.classList.add("image-5")
    activeImg6.classList.add("image-6")
    activeImg7.classList.add("image-7")
    activeImg8.classList.remove("image-8")
    activeImg9.classList.add("image-9")
    activeImg10.classList.add("image-10")
    activeImg11.classList.add("image-11")
    activeImg12.classList.add("image-12")
    activeImg2.classList.remove('activeImage2')
    activeImg3.classList.remove('activeImage3')
    activeImg4.classList.remove('activeImage4')
    activeImg5.classList.remove('activeImage5')
    activeImg6.classList.remove('activeImage6')
    activeImg7.classList.remove('activeImage7')
    activeImg8.classList.add('activeImage8')
    activeImg9.classList.remove('activeImage9')
    activeImg10.classList.remove('activeImage10')
    activeImg11.classList.remove('activeImage11')
    activeImg12.classList.remove('activeImage12')
    authDropDown.classList.add("hidden");
    btnLink1.classList.add("hidden")
    btnLink2.classList.add("hidden")
});

// 9
block9.addEventListener('mouseenter', () => {
    dropdown.classList.remove('hidden');
    arrow9.classList.remove('hidden');
    arrow.classList.add('hidden');
    arrow1.classList.add('hidden');
    arrow2.classList.add('hidden');
    arrow4.classList.add('hidden');
    arrow5.classList.add('hidden');
    arrow6.classList.add('hidden');
    arrow7.classList.add('hidden');
    arrow8.classList.add('hidden');
    arrow10.classList.add('hidden');
    arrow11.classList.add('hidden');
    arrow12.classList.add('hidden');
    activeImg.classList.remove('activeImage')
    activeImg.classList.add("image-1")
    activeImg2.classList.add("image-2")
    activeImg3.classList.add("image-3")
    activeImg4.classList.add("image-4")
    activeImg5.classList.add("image-5")
    activeImg6.classList.add("image-6")
    activeImg7.classList.add("image-7")
    activeImg8.classList.add("image-8")
    activeImg9.classList.remove("image-9")
    activeImg10.classList.add("image-10")
    activeImg11.classList.add("image-11")
    activeImg12.classList.add("image-12")
    activeImg2.classList.remove('activeImage2')
    activeImg3.classList.remove('activeImage3')
    activeImg4.classList.remove('activeImage4')
    activeImg5.classList.remove('activeImage5')
    activeImg6.classList.remove('activeImage6')
    activeImg7.classList.remove('activeImage7')
    activeImg8.classList.remove('activeImage8')
    activeImg9.classList.add('activeImage9')
    activeImg10.classList.remove('activeImage10')
    activeImg11.classList.remove('activeImage11')
    activeImg12.classList.remove('activeImage12')
    authDropDown.classList.add("hidden");
    btnLink1.classList.add("hidden")
    btnLink2.classList.add("hidden")
});

// 10
block10.addEventListener('mouseenter', () => {
    dropdown.classList.remove('hidden');
    arrow10.classList.remove('hidden');
    arrow.classList.add('hidden');
    arrow1.classList.add('hidden');
    arrow2.classList.add('hidden');
    arrow4.classList.add('hidden');
    arrow5.classList.add('hidden');
    arrow6.classList.add('hidden');
    arrow7.classList.add('hidden');
    arrow8.classList.add('hidden');
    arrow9.classList.add('hidden');
    arrow11.classList.add('hidden');
    arrow12.classList.add('hidden');
    activeImg.classList.remove('activeImage')
    activeImg.classList.add("image-1")
    activeImg2.classList.add("image-2")
    activeImg3.classList.add("image-3")
    activeImg4.classList.add("image-4")
    activeImg5.classList.add("image-5")
    activeImg6.classList.add("image-6")
    activeImg7.classList.add("image-7")
    activeImg8.classList.add("image-8")
    activeImg9.classList.add("image-9")
    activeImg10.classList.remove("image-10")
    activeImg11.classList.add("image-11")
    activeImg12.classList.add("image-12")
    activeImg2.classList.remove('activeImage2')
    activeImg3.classList.remove('activeImage3')
    activeImg4.classList.remove('activeImage4')
    activeImg5.classList.remove('activeImage5')
    activeImg6.classList.remove('activeImage6')
    activeImg7.classList.remove('activeImage7')
    activeImg8.classList.remove('activeImage8')
    activeImg9.classList.remove('activeImage9')
    activeImg10.classList.add('activeImage10')
    activeImg11.classList.remove('activeImage11')
    activeImg12.classList.remove('activeImage12')
    authDropDown.classList.add("hidden");
    btnLink1.classList.add("hidden")
    btnLink2.classList.add("hidden")
});

// 11
block11.addEventListener('mouseenter', () => {
    dropdown.classList.remove('hidden');
    arrow11.classList.remove('hidden');
    arrow.classList.add('hidden');
    arrow1.classList.add('hidden');
    arrow2.classList.add('hidden');
    arrow4.classList.add('hidden');
    arrow5.classList.add('hidden');
    arrow6.classList.add('hidden');
    arrow7.classList.add('hidden');
    arrow8.classList.add('hidden');
    arrow9.classList.add('hidden');
    arrow10.classList.add('hidden');
    arrow12.classList.add('hidden');
    activeImg.classList.remove('activeImage')
    activeImg.classList.add("image-1")
    activeImg2.classList.add("image-2")
    activeImg3.classList.add("image-3")
    activeImg4.classList.add("image-4")
    activeImg5.classList.add("image-5")
    activeImg6.classList.add("image-6")
    activeImg7.classList.add("image-7")
    activeImg8.classList.add("image-8")
    activeImg9.classList.add("image-9")
    activeImg10.classList.add("image-10")
    activeImg11.classList.remove("image-11")
    activeImg12.classList.add("image-12")
    activeImg2.classList.remove('activeImage2')
    activeImg3.classList.remove('activeImage3')
    activeImg4.classList.remove('activeImage4')
    activeImg5.classList.remove('activeImage5')
    activeImg6.classList.remove('activeImage6')
    activeImg7.classList.remove('activeImage7')
    activeImg8.classList.remove('activeImage8')
    activeImg9.classList.remove('activeImage9')
    activeImg10.classList.remove('activeImage10')
    activeImg11.classList.add('activeImage11')
    activeImg12.classList.remove('activeImage12')
    authDropDown.classList.add("hidden");
    btnLink1.classList.add("hidden")
    btnLink2.classList.add("hidden")
});

// 12
block12.addEventListener('mouseenter', () => {
    dropdown.classList.remove('hidden');
    arrow12.classList.remove('hidden');
    arrow.classList.add('hidden');
    arrow1.classList.add('hidden');
    arrow2.classList.add('hidden');
    arrow4.classList.add('hidden');
    arrow5.classList.add('hidden');
    arrow6.classList.add('hidden');
    arrow7.classList.add('hidden');
    arrow8.classList.add('hidden');
    arrow9.classList.add('hidden');
    arrow10.classList.add('hidden');
    arrow11.classList.add('hidden');
    activeImg.classList.remove('activeImage')
    activeImg.classList.add("image-1")
    activeImg2.classList.add("image-2")
    activeImg3.classList.add("image-3")
    activeImg4.classList.add("image-4")
    activeImg5.classList.add("image-5")
    activeImg6.classList.add("image-6")
    activeImg7.classList.add("image-7")
    activeImg8.classList.add("image-8")
    activeImg9.classList.add("image-9")
    activeImg10.classList.add("image-10")
    activeImg11.classList.add("image-11")
    activeImg12.classList.remove("image-12")
    activeImg2.classList.remove('activeImage2')
    activeImg3.classList.remove('activeImage3')
    activeImg4.classList.remove('activeImage4')
    activeImg5.classList.remove('activeImage5')
    activeImg6.classList.remove('activeImage6')
    activeImg7.classList.remove('activeImage7')
    activeImg8.classList.remove('activeImage8')
    activeImg9.classList.remove('activeImage9')
    activeImg10.classList.remove('activeImage10')
    activeImg11.classList.remove('activeImage11')
    activeImg12.classList.add('activeImage12')
    authDropDown.classList.add("hidden");
    btnLink1.classList.add("hidden")
    btnLink2.classList.add("hidden")
});


// dropdown
dropdown.addEventListener('mouseenter', () => {
    dropdown.classList.remove('hidden');
}
)
dropdown.addEventListener('mouseleave', () => {
    console.log('zzzz')
    dropdown.classList.add('hidden');
    arrow.classList.add('hidden');
    arrow1.classList.add('hidden');
    arrow2.classList.add('hidden');
    arrow4.classList.add('hidden');
    arrow5.classList.add('hidden');
    arrow6.classList.add('hidden');
    arrow7.classList.add('hidden');
    arrow8.classList.add('hidden');
    arrow9.classList.add('hidden');
    arrow10.classList.add('hidden');
    arrow11.classList.add('hidden');
    arrow12.classList.add('hidden');
    activeImg.classList.remove('activeImage')
    activeImg.classList.add("image-1")
    activeImg2.classList.remove('activeImage2')
    activeImg2.classList.add("image-2")
    activeImg3.classList.remove('activeImage3')
    activeImg3.classList.add("image-3")
    activeImg4.classList.remove('activeImage4')
    activeImg4.classList.add("image-4")
    activeImg5.classList.remove('activeImage5')
    activeImg5.classList.add("image-5")
    activeImg6.classList.remove('activeImage6')
    activeImg6.classList.add("image-6")
    activeImg7.classList.remove('activeImage7')
    activeImg7.classList.add("image-7")
    activeImg8.classList.remove('activeImage8')
    activeImg8.classList.add("image-8")
    activeImg9.classList.remove('activeImage9')
    activeImg9.classList.add("image-9")
    activeImg10.classList.remove('activeImage10')
    activeImg10.classList.add("image-10")
    activeImg11.classList.remove('activeImage11')
    activeImg11.classList.add("image-11")
    activeImg12.classList.remove('activeImage12')
    activeImg12.classList.add("image-12")
}
)

topBar.addEventListener("mouseenter", () => {
    dropdown.classList.add('hidden');
    arrow.classList.add('hidden');
    arrow1.classList.add('hidden');
    arrow2.classList.add('hidden');
    arrow4.classList.add('hidden');
    arrow5.classList.add('hidden');
    arrow6.classList.add('hidden');
    arrow7.classList.add('hidden');
    arrow8.classList.add('hidden');
    arrow9.classList.add('hidden');
    arrow10.classList.add('hidden');
    arrow11.classList.add('hidden');
    arrow12.classList.add('hidden');
    activeImg.classList.remove('activeImage')
    activeImg.classList.add("image-1")
    activeImg2.classList.remove('activeImage2')
    activeImg2.classList.add("image-2")
    activeImg3.classList.remove('activeImage3')
    activeImg3.classList.add("image-3")
    activeImg4.classList.remove('activeImage4')
    activeImg4.classList.add("image-4")
    activeImg5.classList.remove('activeImage5')
    activeImg5.classList.add("image-5")
    activeImg6.classList.remove('activeImage6')
    activeImg6.classList.add("image-6")
    activeImg7.classList.remove('activeImage7')
    activeImg7.classList.add("image-7")
    activeImg8.classList.remove('activeImage8')
    activeImg8.classList.add("image-8")
    activeImg9.classList.remove('activeImage9')
    activeImg9.classList.add("image-9")
    activeImg10.classList.remove('activeImage10')
    activeImg10.classList.add("image-10")
    activeImg11.classList.remove('activeImage11')
    activeImg11.classList.add("image-11")
    activeImg12.classList.remove('activeImage12')
    activeImg12.classList.add("image-12")
})

// OPEn mobile menu
open_menu.addEventListener("click", () => {
    open_menuList.classList.toggle('hidden');
})


// swiper

// let Swipes = new Swiper('.swiper-container', {
//     loop: true,
// });


// $('.slider-1').owlCarousel({
//     loop:true,
//     margin:10,
//     nav:true,
//     autoplay:true,
//     autoWidth:true,
//     center:true,
//     responsiveClass:true,
//     navText: ['<div class="slider-left"></div>', '<div class="slider-right"></div>'],
//     items:2,
// });
// $('.slider-2').owlCarousel({
//     loop:true,
//     margin:10,
//     nav:true,
//     center:true,
//     autoplay:true,
//     autoWidth:true,
//     responsiveClass:true,
//     navText: ['<div class="slider-left"></div>', '<div class="slider-right"></div>'],
//     responsive:{
//         0:{
//             items:2
//         },
//         600:{
//             items:2
//         },
//         1000:{
//             items:2
//         }
//     }
// });
// let glob = {
//     auth: $('#auth'),
//     init() {
//         window.addEventListener('click', function(e){
//             if (!document.getElementById('auth').contains(e.target) && !$('#auth').hasClass('d-none'))
//                 $('#auth').addClass('d-none');
//         });
//     },
//     st(id) {
//         $([document.documentElement, document.body]).animate({
//             scrollTop: $("#" + id).offset().top
//         }, 300)
//     },
//     ta() {
//         setTimeout(()=>{
//             if(this.auth.hasClass('d-none'))
//                 this.auth.removeClass('d-none');
//             else
//                 this.auth.addClass('d-none');
//         });
//     },
//     sl() {
//         let $text = $('.btn-collapse span');
//         let $icon = $('.btn-collapse i.fa');
//         $('.clear').removeClass('clearfix');
//         $('.hashtags-slider').slideToggle({
//             done: function() {
//                 $('.clear').addClass('clearfix');
//                 console.log('test', $('.hashtags-slider').is(':visible'));
//                 if ($(this).is(':visible')) {
//                     $text.text('свернуть');
//                     $icon.removeClass('fa-chevron-down').addClass('fa-chevron-up')
//                 } else {
//                     $text.text('развернуть');
//                     $icon.removeClass('fa-chevron-up').addClass('fa-chevron-down')
//                 }
//             }
//         })
//     }
// }
// $(document).ready(function(){
//     glob.init();
//     $('.owl-prev,.owl-next').on('click', function(event){
//         $(this).parent().parent().parent().find('.owl-carousel').trigger('stop.owl.autoplay');
//     });
// });

// $('.slider-2').owlCarousel({
// }).on('initialized.owl.carousel', function(event) {
//     console.log('Слайдер инициализирован успешно');
// }).on('changed.owl.carousel', function(event) {
//     console.log('Изменения в слайдере');
// }).on('resize.owl.carousel', function(event) {
//     console.log('Слайдер изменил размер');
// }).on('refresh.owl.carousel', function(event) {
//     console.log('Слайдер обновлен');
// }).on('drag.owl.carousel', function(event) {
//     console.log('Пользователь перетаскивает слайдер');
// }).on('dragged.owl.carousel', function(event) {
//     console.log('Пользователь завершил перетаскивание слайдера');
// }).on('translate.owl.carousel', function(event) {
//     console.log('Слайдер транслируется');
// }).on('translated.owl.carousel', function(event) {
//     console.log('Слайдер завершил трансляцию');
// });

// Экспортируем пустой объект, чтобы файл считался модулем для TypeScript
export {};