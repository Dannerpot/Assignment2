<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Quiz</title>
</head>
<body>
    <h1>Welcome to the Simple Quiz</h1>
    <form id="quiz-form">
        <div>
            <label for="q1">What is the capital of France?</label>
            <input type="text" id="q1" name="q1">
        </div>
        <div>
            <label for="q2">What is 2 + 2?</label>
            <input type="text" id="q2" name="q2">
        </div>
        <button type="button" onclick="submitQuiz()">Submit</button>
    </form>

    <script>
        function submitQuiz() {
            const form = document.getElementById('quiz-form');
            const formData = new FormData(form);

            fetch('http://localhost:3000/submit_quiz.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                alert(data.message);
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
        }
    </script>
</body>
</html>
