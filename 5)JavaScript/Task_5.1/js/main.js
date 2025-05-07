let input = $('#input');
let paragraph = $('.error');

$('#btn').click(() => {
	paragraph.html('');
	if (input.val().length === 0) {
		paragraph.append("Минимальное количество символов должно быть больше 1!");
		paragraph.css({'color': 'red'});
	} else if (input.val().length > 100) {
		paragraph.append("Максимальное количество символов не должно превышать 100!");
		paragraph.css({'color': 'red'});
	} else {
		let count = 1;
		let flag = false;
		for (let i = 1; i < input.val().length; i++) {
			if (input.val()[i - 1] == input.val()[i]) {
				count++;
			} else {
				count = 1;
			}

			if (count == 7) {
				flag = true;
				break;
			}
		}

		if (flag) {
			paragraph.append("YES");
		} else {
			paragraph.append("NO");
		}
		paragraph.css({'color': 'black'})
	}
	input.val('');
})