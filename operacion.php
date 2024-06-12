<!DOCTYPE html>
<html>
<head>
    <title>Operaciones básicas</title>
    <script>
        function validateForm() {
            const num1 = document.getElementById('num1').value;
            const num2 = document.getElementById('num2').value;
            const errorMessage = document.getElementById('error-message');
            
            if (isNaN(num1) || isNaN(num2) || num1.trim() === "" || num2.trim() === "") {
                errorMessage.innerHTML = "Por favor, ingrese números válidos.";
                return false;
            }
            errorMessage.innerHTML = "";
            return true;
        }
    </script>
</head>
<body>
    <h1>Operaciones básicas</h1>

    <form method="post" onsubmit="return validateForm()">
        <label for="num1">Número 1:</label>
        <input type="text" id="num1" name="num1" required>
        <br>
        <label for="num2">Número 2:</label>
        <input type="text" id="num2" name="num2" required>
        <br>
        <input type="submit" name="operation" value="Restar">
        <input type="submit" name="operation" value="Sumar">
        <p id="error-message" style="color: red;"></p>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        
        // Validación del lado del servidor
        if (!is_numeric($num1) || !is_numeric($num2)) {
            echo "<h2 style='color: red;'>Por favor, ingrese números válidos.</h2>";
        } else {
            $num1 = (float)$num1;
            $num2 = (float)$num2;
            $operation = $_POST['operation'];

            if ($operation == "Restar") {
                $resultado = $num1 - $num2;
                echo "<h2>La resta de $num1 - $num2 es: $resultado</h2>";
            } elseif ($operation == "Sumar") {
                $resultado = $num1 + $num2;
                echo "<h2>La suma de $num1 + $num2 es: $resultado</h2>";
            }
        }
    }
    ?>
</body>
</html>
