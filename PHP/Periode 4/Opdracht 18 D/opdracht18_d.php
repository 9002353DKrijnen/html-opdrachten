<?php
include "functions.php";
?>


<section class="calculator">
    <button class="num1">1</button>
    <button class="num2">2</button>
    <button class="num3">3</button>
    <button class="num4">4</button>
    <button class="num5">5</button>
    <button class="num6">6</button>
    <button class="num7">7</button>
    <button class="num8">8</button>
    <button class="num9">9</button>
    <button class="num0">0</button>
</section>
   <div>
        <button id="plus">+</button>
        <button id="minus">-</button>
        <button id="multiply">*</button>
        <button id="divide">/</button>
        <button id="equals">=</button>
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


</style>