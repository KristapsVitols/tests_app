//Instantiate UI class
const ui = new UI();
const nameInput = document.getElementById('name');
const testSelect = document.getElementById('test');
const startForm = document.getElementById('starting-form');

//Validate nameInput eventlistener
nameInput.addEventListener('blur', validateName);

//Validate testSelect eventlistener
testSelect.addEventListener('change', validateSelect);

//Validate Form eventlistener
startForm.addEventListener('submit', validateForm);

function validateName(e) {
	ui.validateName(e.target);
}

function validateSelect(e) {
	ui.validateSelect(e.target);
}

function validateForm(e) {
	ui.validateForm(e, nameInput, testSelect);
}