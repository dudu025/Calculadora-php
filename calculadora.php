<?php
$history = array();

function addToHistory($expression, $result) {
  global $history;
  $history[] = array('expression' => $expression, 'esult' => $result);
}

if (isset($_POST['calc'])) {
  $expression = $_POST['expression'];
  $result = eval($expression);
  addToHistory($expression, $result);
  $display = $result;
} elseif (isset($_POST['clear'])) {
  $display = '';
  $history = array();
} else {
  $display = '';
}

?>
  <meta name="description" content="A simple calculator built with PHP, HTML, and CSS.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Inconsolata|Quicksand" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

<body>
    <div class="spacer"></div>
    <div id="calc">
        <form>
            <input type="text" id="calc-display" disabled>
            <br>
            <input type="button" value="C" class="keys" onclick="toScreen('C')">
            <input type="button" value="CE" class="keys" onclick="backSpace()">
            <input type="button" value="sqr" class="keys" onclick="sqr()">
            <input type="button" value="+" class="keys" onclick="toScreen('+')">
            <br>
            <input type="button" value="7" class="keys" onclick="toScreen('7')">
            <input type="button" value="8" class="keys" onclick="toScreen('8')">
            <input type="button" value="9" class="keys" onclick="toScreen('9')">
            <input type="button" value="-" class="keys" onclick="toScreen('-')">
            <br>
            <input type="button" value="4" class="keys" onclick="toScreen('4')">
            <input type="button" value="5" class="keys" onclick="toScreen('5')">
            <input type="button" value="6" class="keys" onclick="toScreen('6')">
            <input type="button" value="*" class="keys" onclick="toScreen('*')">
            <br>
            <input type="button" value="1" class="keys" onclick="toScreen('1')">
            <input type="button" value="2" class="keys" onclick="toScreen('2')">
            <input type="button" value="3" class="keys" onclick="toScreen('3')">
            <input type="button" value="/" class="keys" onclick="toScreen('/')">
            <br>
            <input type="button" value="0" class="keys" class="bottom" onclick="toScreen('0')">
            <input type="button" value="." class="keys" class="bottom" onclick="toScreen('.')">
            <input type="button" value="=" id="equals" onclick="answer()">
        </form>
        <div>
        <div class="spacer"></div>
        <select id="calc-history" style="width: 250px; margin-bottom: 10px;"></select>
        <button onclick="deleteHistory()" class="btn" >Apagar Histórico</button>
        </div>
    </div>

    <link href="https://fonts.googleapis.com/css?family=Inconsolata|Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">

    <script>
        var box = document.getElementById("calc-display");
        var historySelect = document.getElementById("calc-history");

        function toScreen(x) {
            box.value += x;
            if (x === 'C') {
                box.value = '';
            }
        }

        function answer() {
            var calculation = box.value;
            var result = eval(calculation);
            box.value = result;
            addToHistory(calculation + ' = ' + result);
        }

        function sqr() {
            var value = parseFloat(box.value);
            var result = value * value;
            box.value = result;
            addToHistory(value + '^2 = ' + result);
        }

        function backSpace() {
            var num = box.value;
            var len = num.length - 1;
            var newNum = num.substring(0, len);
            box.value = newNum;
        }

        function addToHistory(calculation) {
            var option = document.createElement("option");
            option.text = calculation;
            historySelect.add(option);
        }

        function deleteHistory() {
            var password = prompt("Por favor, digite a senha para apagar o histórico:");
            if (password === "POSITIVO") {
                while (historySelect.options.length > 0) {
                    historySelect.remove(0);
                }
            } else {
                alert("Senha incorreta. Histórico não apagado.");
            }
        }
    </script>
</body>




