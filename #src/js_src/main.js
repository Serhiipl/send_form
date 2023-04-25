"use strict";

document.addEventListener('DOMContentLoaded', function (){
    const form = this.getElementById('form');
    form.addEventListener('submit', formSend);

    async function formSend(e) {
        e.preventDefault();

        let error = formValidate(form);

        let formData = new FormData(form);
        console.log(formData);
        if (error === 0) {
            console.log('all OK')
        } else {
            alert ('wypelnij pola');
        }
    }
    function formValidate(form) {
        let error = 0;
        let formReq = document.querySelectorAll('._req');
        
        for (let index = 0; index < formReq.length; index++) {
            const input = formReq[index];
            formRemoveError(input);

            if (input.classList.contains('_email')) {
                if (emailTest(input)) {
                    formAddError(input);
                    error ++;
                    console.log('error');
                }
            } else if (input.getAttribute("type") === "checkbox" && input.checked === false) {
                formAddError(input);
                    error ++;
            } else {
                if (input.value ==='') {
                    formAddError(input);
                    error ++;
                }
            }
            if (input.classList.contains('_tel')) {
            if (telTest(input)) {
                formAddError(input);
                error ++;
                console.log('error');
            } else if (input.getAttribute("type") === "checkbox" && input.checked === false) {
                formAddError(input);
                    error ++;
            } else {
                if (input.value ==='') {
                    formAddError(input);
                    error ++;
                }
            }
        }
        }
        return error;
    }
    function formAddError(input) {
        input.parentElement.classList.add('_error');
        input.classList.add('_error');
    }
    function formRemoveError(input) {
        input.parentElement.classList.remove('_error');
        input.classList.remove('_error');
    }
    function emailTest(input) {
        return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value);
    }
    function telTest(input) {
        return !/^[\d\+][\d\(\)\ -]{6,14}\d$/.test(input.value);
    }
});