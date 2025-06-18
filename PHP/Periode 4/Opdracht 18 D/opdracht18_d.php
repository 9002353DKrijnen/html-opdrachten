<?php
include "functions.php";
?>


<section class="calculator">
    <button class="num1" onclick="add('1')">1</button>
    <button class="num2"onclick="add('2')" >2</button>
    <button class="num3"onclick="add('3')" >3</button>
    <button class="num4"onclick="add('4')"  >4</button>
    <button class="num5"onclick="add('5')" >5</button>
    <button class="num6"onclick="add('6')" >6</button>
    <button class="num7"onclick="add('7')" >7</button>
    <button class="num8"onclick="add('8')" >8</button>
    <button class="num9"onclick="add('9')" >9</button>
    <button class="num0" onclick="add('0')" >0</button>
</section>

<input type="text" id="output">
<br><br><br>
   <div>
        <button id="plus"onclick="add('+')">+</button>
        <button id="minus" onclick="add('-')">-</button>
        <button id="multiply"onclick="add('*')">*</button>
        <button id="divide"onclick="add('/')">/</button>
        <button id="ac"onclick="ac()">AC/C</button>
        <br><br><br>
        <button id="equals" onclick="click()">=</button>
    </div>

    
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

   
    section {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        grid-template-rows: repeat(5, 1fr);
        grid-column-gap: 0px;
        grid-row-gap: 0px;
    }
    .num1{
         grid-area: 1 / 1 / 2 / 2; 
    }
    .num2{
         grid-area: 1 / 2 / 2 / 3; 
    }
    .num3{
         grid-area: 1 / 3 / 2 / 4; 
    }
    .num4{
         grid-area: 2 / 1 / 3 / 2; 
    }
    .num5{
         grid-area: 2 / 2 / 3 / 3; 
    }
    .num6{
         grid-area: 2 / 3 / 3 / 4; 
    }
    .num7{
         grid-area: 3 / 1 / 4 / 2; 
    }
    .num8{
         grid-area: 3 / 2 / 4 / 3;
    }
    .num9{
         grid-area: 3 / 3 / 4 / 4; 
    }
    .num0{
          grid-area: 4 / 2 / 5 / 3;  
    }

    button {
        width: 50px;
        height: 50px;
        font-size: 25px;
    }

    input{
        min-width: 30%;
        padding: 20px;
        border: 1px solid #ccc;
    }


</style>

<script src="./script.js"></script>