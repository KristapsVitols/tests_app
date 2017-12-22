//Instantiate UI class
const ui = new UI();

let answer;
const nextQuestion = document.querySelector('#nextQuestion');
const answerList = document.querySelector('.answer-list');


// Next question eventlistener ( saves question and creates next one )
nextQuestion.addEventListener('click', saveQuestion);

// Select li eventlistener ( selects(highlights) clicked LI and adds data attribute )
answerList.addEventListener('click', selectLi);

function saveQuestion(e) {
	nextQuestion.disabled = true;
	const fetchme = new Fetch();
	fetchme.saveQuestion(e);
}

function selectLi(e) {
	ui.selectLi(e.target);
}