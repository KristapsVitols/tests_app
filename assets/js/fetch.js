// Fetch class
class Fetch {
	constructor() {
		this.username = document.getElementById('username').value;
		this.test_id = document.getElementById('test_id').value;
		this.question_id = document.getElementById('question_id').value;
		this.test_key = document.getElementById('test_key').value;
		this.nextQuestion = document.querySelector('#nextQuestion');
		this.answerWarning = document.querySelector('.answerWarning');
		this.answer = answer;
	}

	//Sends fetch request to save current question
	saveQuestion(e) {
		let formData = new FormData();
		formData.append('username', this.username);
		formData.append('test_id', this.test_id);
		formData.append('test_key', `${this.username}_${this.test_key}`);
		formData.append('question_id', this.question_id);
		formData.append('answer', this.answer);

		if(this.answer === undefined) {
			console.log('not selected');
			e.preventDefault();
			this.answerWarning.classList.add('warning');
		} else {
			fetch('inc/handlers/save_question_handler.php', {
				method: 'POST',
				body: formData
			})
				.then(() => {
					this.nextQuestion.disabled = true;
					this.nextQuestion.value = 'Uzgaidi...';
				});
		}
	}
}