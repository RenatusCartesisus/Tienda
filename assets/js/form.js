const form = document.getElementById('form-register');
const username = document.getElementById('usuario');
const email = document.getElementById('email');
const password = document.getElementById('pass');
const nombre = document.getElementById('nombre');

form.addEventListener('submit', e => {
    if(username.value === ''&&email.value===''&&password.value===''&&nombre==='') {
    e.preventDefault();

    validateInputs();
    }
});
// trim() = remove spaces
const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    element.classList.add('error');
    element.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const validateInputs = () => {
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const nombreValue = nombre.value.trim();

    if(usernameValue === '') {
        setError(username, 'Se requiere nombre de usuario');
    } else {
        setSuccess(username);
    }

    if(emailValue === '') {
        setError(email, 'Se requiere un correo');
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Se requiere una dirección válida de correo');
    } else {
        setSuccess(email);
    }

    if(passwordValue === '') {
        setError(password, 'Se requiere contraseña');
    } else if (passwordValue.length < 8 ) {
        setError(password, 'La contraseña debe ser de al menos 8 caracteres');
    } else {
        setSuccess(password);
    }

    if(nombreValue === '') {
        setError(nombre, 'Please confirm your password');
    } else {
        setSuccess(nombre);
    }

};
