const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const confirmedPasswordInput = form.querySelector('input[name = "password-repeat"]');

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsSame(password, repeatedPassword) {
    return password === repeatedPassword;
}

function markValidation(element, condition) {
    !condition ? element.classList.add("no-valid") : element.classList.remove("no-valid");
}

emailInput.addEventListener('keyup', function() {
    setTimeout( function() {
            markValidation(emailInput, isEmail(emailInput.value));
        }        , 1000);
});

confirmedPasswordInput.addEventListener('keyup', function() {
    setTimeout( function() {
        const condition = arePasswordsSame(
            confirmedPasswordInput.previousElementSibling.value,
            confirmedPasswordInput.value
        );
        markValidation(confirmedPasswordInput, condition);
    }        , 1000);
});