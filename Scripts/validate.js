let validEmail = false;
let validPassword = false;
let confirmed = false;

function validateForm() {
    validateEmail(true);
    validatePassword();
    confirm();
    document.getElementById("submit").disabled = !(validEmail && validPassword && confirmed);
}
function validateEmail(register) {
    let email = document.getElementById("email").value;

    if (!email) {
        return
    }

    function invalid(msg) {
        document.querySelector("label" + "[for='email']").innerHTML = "Email: <small>"+msg+"</small>";
        document.getElementById("email").classList.remove("valid");
        document.getElementById("email").classList.add("invalid");
        validEmail = false;
    }

    function valid() {
        document.querySelector("label" + "[for='email']").innerHTML = "Email:";
        document.getElementById("email").classList.remove("invalid");
        document.getElementById("email").classList.add("valid");
        validEmail = true;
    }

    // Check if email is an email
    let emailRegex = /^\S+@\S+\.\S+$/;
    if (!emailRegex.test(email)) {
        document.getElementById("submit").disabled = true;
        return invalid("Not a valid email");
    }
    // Check if email exists in database using ajax call
    if (!register) {
        document.getElementById("submit").disabled = false;
        return valid();
    }
    let xhr = new XMLHttpRequest();
    xhr.open("GET", `../Controllers/exists.php?email=${email}`, false);
    xhr.send();
    if (xhr.status === 200) {
        let response = xhr.responseText;
        if (+response) {
            return invalid("Email already exists");
        }
    }
    return valid();
}

function validatePassword() {
    let ul = document.getElementById("passwordRules");
    let password = document.getElementById("password").value;
    let length = document.getElementById("length");
    let upper = document.getElementById("upper");
    let lower = document.getElementById("lower");
    let number = document.getElementById("number");
    let special = document.getElementById("special");

    let rules = [[length, /^.{8,}$/], [upper, /[A-Z]/], [lower, /[a-z]/], [number, /[0-9]/], [special, /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/]];

    let applied = 0;
    for (let rule of rules) {
        if (rule[1].test(password)) {
            rule[0].style.display = "none";
            applied++;
        } else {
            rule[0].style.display = "list-item";
        }
    }
    validPassword = applied === rules.length;
    if (validPassword) {
        ul.style.display = "none";
    } else {
        ul.style.display = "block";
    }
}

function confirm() {
    let password = document.getElementById("password").value;
    let confirm = document.getElementById("confirmPassword").value;

    if (!validPassword) {
        return
    }

    if (password !== confirm) {
        document.querySelector("label" + "[for='confirmPassword']").innerHTML = "Confirm Password: Passwords do not match";
        document.getElementById("confirmPassword").classList.remove("valid");
        document.getElementById("confirmPassword").classList.add("invalid");
        confirmed = false;
    } else {
        document.querySelector("label" + "[for='confirmPassword']").innerHTML = "Confirm Password:";
        document.getElementById("confirmPassword").classList.remove("invalid");
        document.getElementById("confirmPassword").classList.add("valid");
        confirmed = true;
    }
}

function show() {
    let password = document.getElementById("password");
    let confirm = document.getElementById("confirmPassword");
    if (password.type === "password") {
        password.type = "text";
        confirm.type = "text";
    } else {
        password.type = "password";
        confirm.type = "password";
    }
}
