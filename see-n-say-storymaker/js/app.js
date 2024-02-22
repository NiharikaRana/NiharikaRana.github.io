

document.addEventListener("DOMContentLoaded", function() {
	// Variables
	var synth = window.speechSynthesis;
	var textToSpeak = '';
	var speakButton = document.querySelector('#speakButton');
	var sentenceCount = 0; // Track the number of sentences
	var buttonCount = 0; // Track the number of button clicks
	
	// Arrays for Nouns, verbs, adjectives, anotherNouns, places
	const nouns = ["dog", "cat", "elephant", "lion", "bird"];
	const verbs = ["runs", "jumps", "sleeps", "eats", "flies"];
	const adjectives = ["happily", "cunningly", "bravely", "cleverly", "friendly"];
	const anotherNouns = ["table", "chair", "book", "carpet", "lamp"];
	const places = ["park.", "beach.", "forest.", "mountain.", "city."];
	
	/* Functions */
	function getRandomWord(array) {
	  return array[Math.floor(Math.random() * array.length)];
	}
	
	// Speaking Function
	function speakNow() {
	  var utterThis = new SpeechSynthesisUtterance(textToSpeak);
	  synth.speak(utterThis);
	}
	
	// Function to add word to story text
	function addToStory(word) {
	  const storyText = document.getElementById("story-text");
	  buttonCount++;
	  // Add a line break after generating text for buttons 1 to 5
	  if (buttonCount % 5 === 0 && buttonCount !== 0) {
		storyText.innerHTML += "<br>";
	  }
	  // Add a line break after each sentence
	  if (word.endsWith('.') || word.endsWith('!') || word.endsWith('?')) {
		sentenceCount++;
		textToSpeak += word + " ";
		storyText.innerHTML += word + "<br>";
	  } else {
		textToSpeak += word + " ";
		storyText.textContent += word + " ";
	  }
	  // Speak the sentence after each period
	  if (sentenceCount > 0 && (word.endsWith('.') || word.endsWith('!') || word.endsWith('?'))) {
		speakNow();
		textToSpeak = ''; // Reset the textToSpeak variable
	  }
	}
	
	/* Event Listeners */
	// Button 1 Clicked
	document.querySelector('#button1').onclick = function () {
	  addToStory('The ' + getRandomWord(nouns));
	};
	
	// Button 2 Clicked
	document.querySelector('#button2').onclick = function () {
	  addToStory(getRandomWord(verbs));
	};
	
	// Button 3 Clicked
	document.querySelector('#button3').onclick = function () {
	  addToStory(getRandomWord(adjectives));
	};
	
	// Button 4 Clicked
	document.querySelector('#button4').onclick = function () {
	  addToStory(' sitting on the ' + getRandomWord(anotherNouns));
	};
	
	// Button 5 Clicked
	document.querySelector('#button5').onclick = function () {
	  addToStory(' at the ' + getRandomWord(places));
	};
	
	// Main button Clicked
	speakButton.onclick = function () {
	  speakNow();
	};
  });
  