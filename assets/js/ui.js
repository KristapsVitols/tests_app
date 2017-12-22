//User interface class
class UI {
	constructor() {
		this.lis = document.querySelectorAll('li');
		this.nameWarning = document.querySelector('.nameWarning');
		this.selectWarning = document.querySelector('.selectWarning');
		this.answerWarning = document.querySelector('.answerWarning');
		//comes from regexp file ( so can validate latvian characters )
		this.re = regular_exp;
	}

	//Selects, highlights, adds data attribute to LI
	selectLi(target) {
		if(target.nodeName === 'LI') {
			this.lis.forEach((li) => {
				li.classList.remove('selected');
			});
			target.classList.add('selected');
			answer = target.dataset.answer;
			this.answerWarning.classList.remove('warning');
		}
	}

	//Validates name ( only letters and 2-20 length )
	validateName(target) {
		if(!this.re.test(target.value)) {
			target.style.border = '1px solid red';
			this.nameWarning.classList.add('warning');
		} else {
			target.style.border = '';
			this.nameWarning.classList.remove('warning');
		}
	}

	//Validates select menu ( item with value needs to be selected )
	validateSelect(target) {
		if(target.value == '') {
			target.style.border = '1px solid red';
			this.selectWarning.classList.add('warning');
		} else {
			target.style.border = '';
			this.selectWarning.classList.remove('warning');
		}
	}

	//Checking the form validation on submit
	validateForm(e, name, select) {
		if(!this.re.test(name.value)) {
			e.preventDefault();
			name.style.border = '1px solid red';
			this.nameWarning.classList.add('warning');
		} else if(select.value === '') {
			e.preventDefault();
			select.style.border = '1px solid red';
			this.selectWarning.classList.add('warning');
		}
	}
}