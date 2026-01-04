document.getElementById("examForm").addEventListener("submit", function (event) {
    event.preventDefault(); // stop default submit first

    const name = document.getElementById("name").value.trim();
    const collegeId = document.getElementById("collegeId").value.trim();
    const stream = document.getElementById("stream").value.trim();
    const error = document.getElementById("errorMessage");

    if (name === "" || collegeId === "" || stream === "") {
        error.style.color = "red";
        error.textContent = "All fields are required";
        return;
    }

    if (collegeId.length < 4) {
        error.style.color = "red";
        error.textContent = "College ID must be at least 4 characters long";
        return;
    }

    error.style.color = "green";
    error.textContent = "Submitted Successfully! Good luck for your exam";

    setTimeout(() => {
        document.getElementById("examForm").submit(); // ✅ correct ID
    }, 800);
});
