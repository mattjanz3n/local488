//=================================\\
// Shortening attached file name on Single page\\
//=================================\\

export default function shortenTheWord() {
	const wordField = $('.loc-single-post__download-text');
	const shortWord = $('.loc-single-post__download-text--mobail');


	if (wordField.length) {

		let currentWord = wordField[0].textContent;
		let firstLetters = '';
		let lastLetters;
		let allWord = currentWord;

		if (currentWord.length > 20) {

			for (let index = 0; index < currentWord.length; index++) {

				if ((index === 0) || (index === 1) || (index === 2) || (index === 3) || (index === 4) || (index === 5) || (index === 6) || (index === 7) || (index === 8) || (index === 9)) {
					firstLetters += currentWord[index];
				}
			}

			firstLetters = firstLetters + "...";

			lastLetters = currentWord.substr(currentWord.length - 10);

			allWord = firstLetters + lastLetters;

			shortWord[0].innerHTML = allWord;
		}

	}
}

