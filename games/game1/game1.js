let targetNumber = Math.floor(Math.random() * 100) + 1; // Random number between 1 and 100
let attempts = 0;

function checkGuess() {
    let userGuess = document.getElementById("guessInput").value;
    let resultText = document.getElementById("result");
    let attemptsText = document.getElementById("attempts");

    if (userGuess < targetNumber) {
        resultText.textContent = "Too low! Try again.";
        resultText.style.color = "red";
    } else if (userGuess > targetNumber) {
        resultText.textContent = "Too high! Try again.";
        resultText.style.color = "red";
    } else {
        resultText.textContent = "Correct! You've guessed the number!";
        resultText.style.color = "green";
    }

    attempts++;
    attemptsText.textContent = attempts;
}
