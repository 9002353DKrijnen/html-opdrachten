<form action="" method="post">
    <label for="title">Titel</label>
    <input type="text" name="title" required>
    <label for="idea">Idee</label>
    <input type="text" name="idea" required>
    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email">
    <button type="submit" name="submit">Verzenden</button>

</form>
<script>
    // listen when page is loaded
    addEventListener("DOMContentLoaded", () => {

        // declare email
        const email = document.getElementById("email");
        // declare email value
        // check if there's an error message, so we do not duplicate it.
        email.addEventListener("input", () => {
            let emailError = document.getElementById("emailError");
            if (emailError) {
                emailError.remove();
            }

            // check on change on entered email
            const emailValue = email.value;
            if (emailValue === "") {
                return;
            }

            if (!emailValue.includes("@") || !emailValue.includes(".")) {
                let newP = document.createElement("p");
                newP.id = "emailError";
                newP.textContent = "email lijkt niet geldig.";
                newP.style.color = "red";
                document.body.appendChild(newP);
            }
        });
    });
</script>


<style>
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>

<?php

// include functions
include "functions.php";

// check if form is submitted and if title and idea are set
if (isset($_POST["submit"]) && isset($_POST["title"]) && isset($_POST["idea"])) {
    $title = $_POST["title"];
    $idea = $_POST["idea"];
    $email = isset($_POST["email"]) ? $_POST["email"] : null;
    $conn = connectDataBase('ideeenbus');


    // votes for each post 
    // with value 0 so when someone upvotes it will increase or decrease
    $newVote = "INSERT INTO `votes` (`amount`) VALUES (0);";
    $statement = $conn->prepare($newVote);
    $statement->execute();
    $voteId = $conn->lastInsertId();

    // maak de koppeling
    $sqlquery = "INSERT INTO `visitor_messages` (`titel`, `idea`, `email`, `time`, `votes_id`) 
    VALUES (:title, :idea, :email, NOW(), :votes_id);";
    // prepare query
    $statement = $conn->prepare($sqlquery);

    // bindparam to prevent sql injection
    $statement->bindParam(":title", $title);
    $statement->bindParam(":idea", $idea);
    $statement->bindParam(":email", $email);
    $statement->bindParam(":votes_id", $voteId);
    $statement->execute();
}
?>