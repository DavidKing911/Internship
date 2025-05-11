$('#btn').click(() => {
	let input = $('#input');
	let paragraph = $('.error');
	paragraph.html('');

	if (!checkInputs(paragraph, input)) {
		let numberOfMatches = 1;
		let isDanger = false;
		for (let i = 1; i < input.val().length; i++) {
			if (input.val()[i - 1] == input.val()[i]) {
				numberOfMatches++;
			} else {
				numberOfMatches = 1;
			}

			if (numberOfMatches == 7) {
				isDanger = true;
				break;
			}
		}

		if (isDanger) {
			paragraph.append("Ситуация опасная");
		} else {
			paragraph.append("Ситуация не опасная");
		}
		paragraph.css({'color': 'black'})
	}
	input.val('');
});

function checkInputs(paragraph, input) {
	if (input.val().length === 0) {
		paragraph.append("Минимальное количество символов должно быть больше 1!");
		paragraph.css({'color': 'red'});
		return true;
	} else if (input.val().length > 100) {
		paragraph.append("Максимальное количество символов не должно превышать 100!");
		paragraph.css({'color': 'red'});
		return true;
	}
	return false;
}