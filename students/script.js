// JavaScript to handle button actions

document.getElementById('saveButton').addEventListener('click', function () {
    alert('Save button clicked!');
    // Add save functionality here
});

document.getElementById('resetButton').addEventListener('click', function () {
    alert('Reset button clicked!');
    // Add reset functionality here
});

function validateForm() {
    // Reset previous error messages
    clearErrorMessages();

    // Validate each form field
    if (!validateField('firstname', 'firstname-error', 'First Name is required.')) return false;
    if (!validateField('middlename', 'middlename-error', '')) return false;
    if (!validateField('lastname', 'lastname-error', 'Last Name is required.')) return false;
    // Add similar lines for other fields

    // Validate file upload
    if (!validateFile('profilePicture', 'profilePicture-error')) return false;

    return true;
}

function validateField(fieldName, errorId, errorMessage) {
    var fieldValue = document.getElementById(fieldName).value;
    var errorElement = document.getElementById(errorId);
    if (fieldValue.trim() === '') {
        errorElement.innerHTML = errorMessage;
        return false;
    }
    return true;
}

function validateFile(fieldName, errorId) {
    var fileInput = document.getElementById(fieldName);
    var errorElement = document.getElementById(errorId);
    if (fileInput.files.length === 0) {
        errorElement.innerHTML = 'Please choose a file.';
        return false;
    }
    return true;
}

function clearErrorMessages() {
    var errorElements = document.getElementsByClassName('error-message');
    for (var i = 0; i < errorElements.length; i++) {
        errorElements[i].innerHTML = '';
    }
}

function validateEmail(fieldName, errorId) {
    var emailValue = document.getElementById(fieldName).value;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var errorElement = document.getElementById(errorId);

    if (!emailRegex.test(emailValue) && emailValue.trim() !== '') {
        errorElement.innerHTML = 'Invalid email address.';
        return false;
    }

    return true;
}

