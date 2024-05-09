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
    <form method="post">
      <input type="text" id="calc-display" name="expression" value="<?php echo $display;?>" disabled>
      <br>
      <input type="button" value="C" class="keys" onclick="document.getElementById('calc-display').value = ''">
      <input type="button" value="CE" class="keys" onclick="document.getElementById('calc-display').value = ''">
      <input type="button" value="sqr" class="keys" onclick="document.getElementById('calc-display').value += 'qr('">
      <input type="button" value="+" class="keys" onclick="document.getElementById('calc-display').value += '+'">
      <br>
      <input type="button" value="7" class="keys" onclick="document.getElementById('calc-display').value += '7'">
      <input type="button" value="8" class="keys" onclick="document.getElementById('calc-display').value += '8'">
      <input type="button" value="9" class="keys" onclick="document.getElementById('calc-display').value += '9'">
      <input type="button" value="-" class="keys" onclick="document.getElementById('calc-display').value += '-'">
      <br>
      <input type="button" value="4" class="keys" onclick="document.getElementById('calc-display').value += '4'">
      <input type="button" value="5" class="keys" onclick="document.getElementById('calc-display').value += '5'">
      <input type="button" value="6" class="keys" onclick="document.getElementById('calc-display').value += '6'">
      <input type="button" value="*" class="keys" onclick="document.getElementById('calc-display').value += '*'">
      <br>
      <input type="button" value="1" class="keys" onclick="document.getElementById('calc-display').value += '1'">
      <input type="button" value="2" class="keys" onclick="document.getElementById('calc-display').value += '2'">
      <input type="button" value="3" class="keys" onclick="document.getElementById('calc-display').value += '3'">
      <input type="button" value="/" class="keys" onclick="document.getElementById('calc-display').value += '/'">
      <br>
      <input type="button" value="0" class="keys" class="bottom" onclick="document.getElementById('calc-display').value += '0'">
      <input type="button" value="." class="keys" class="bottom" onclick="document.getElementById('calc-display').value += '.'">
      <input type="button" value="=" id="equals" onclick="document.forms[0].submit()">
      <input type="submit" name="clear" value="Clear History">
    </form>
  </div>
  <div class="spacer"></div>
</body>

<script>
    var box = document.getElementById("calc-display");

function toScreen(x){
  box.value+=x;
  if(x==='C'){
    box.value='';
  }
}

function answer(){
  x=box.value;
  x=eval(x);
  box.value=x;
}

function sqr(){
  x=box.value;
  x=eval(x*x);
  box.value=x;
}

function backSpace(){
  var num = box.value;
  var len = num.length-1;
  var newNum = num.substring(0,len);
  box.value = newNum;
}


</script>