<!DOCTYPE html>
<?php
        // put your code here
?>

<html>
<head>
<style>
.item1 { grid-area: header; }
.item2 { grid-area: menu; }
.item3 { grid-area: main; }
.item4 { grid-area: sound; }

.grid-container {
  display: grid;
  grid-template-areas:
    'header'
    'menu '
    'main' 
    'sound';
  grid-gap: 0px;
  background-color: #2196F3;
  padding: 0px;
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
}
</style>
</head>
<body>

<div class="grid-container">
  <div class="item1"> 
        <?php
            require 'header.php';        
        ?>
  </div>
  <div class="item2">Menu</div>
  <div class="item3">Main</div>  
  <div class="item4">sound</div>
</div>

</body>
</html>