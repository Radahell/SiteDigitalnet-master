<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Client Registration Form</title>
</head>
<body>
    <h1>Client Registration Form</h1>
    <form action="register.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required><br><br>

        <label for="date">Date:</label>
        <input type="date" name="date" id="date" required><br><br>

        <label for="type">Type:</label>
        <select name="type" id="type" required>
        <script>
                                var dropdown = document.getElementById("type");
                                var xhr = new XMLHttpRequest();
                                xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        var options = JSON.parse(this.responseText);
                                        options.forEach(function(option) {
                                            var el = document.createElement("option");
                                            el.textContent = option.text;
                                            el.value = option.value;
                                            dropdown.appendChild(el);
                                        });
                                    }
                                };
                                xhr.open("GET", "get_data.php", true);
                                xhr.send();
                            </script>
        </select><br><br>

        <label for="period">Day period:</label>
        <input type="radio" name="period" value="morning" required> Morning
        <input type="radio" name="period" value="afternoon" required> Afternoon
        <input type="radio" name="period" value="evening" required> Evening<br><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>