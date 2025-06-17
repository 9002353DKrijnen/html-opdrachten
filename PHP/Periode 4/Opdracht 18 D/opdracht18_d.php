<?php
include "functions.php";
?>


<section class="calculator">
    <button id="1">1</button>
    <button id="2">2</button>
    <button id="3">3</button>
    <button id="4">4</button>
    <button id="5">5</button>
    <button id="6">6</button>
    <button id="7">7</button>
    <button id="8">8</button>
    <button id="9">9</button>
    <button id="0">0</button>

 

</section>
   <div>
        <button id="plus">+</button>
        <button id="minus">-</button>
        <button id="multiply">*</button>
        <button id="divide">/</button>
        <button id="equals">=</button>
    </div>

    
 <div class="parent">
<div class="div1">1 </div>
<div class="div2"> 2</div>
<div class="div3"> 3</div>
<div class="div4"> 4</div>
<div class="div5"> 5</div>
<div class="div6">6 </div>
<div class="div7"> 7</div>
<div class="div8">8 </div>
<div class="div9"> 9</div>
<div class="div10">0 </div>
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
    #1{
         grid-area: 1 / 1 / 2 / 2; 
    }
    #2{
         grid-area: 1 / 2 / 2 / 3; 
    }
    #3{
         grid-area: 1 / 3 / 2 / 4; 
    }
    #4{
         grid-area: 2 / 1 / 3 / 2; 
    }
    #5{
         grid-area: 2 / 2 / 3 / 3; 
    }
    #6{
         grid-area: 2 / 3 / 3 / 4; 
    }
    #7{
         grid-area: 3 / 1 / 4 / 2; 
    }
    #8{
         grid-area: 3 / 2 / 4 / 3;
    }
    #9{
         grid-area: 3 / 3 / 4 / 4; 
    }
    #0{
          grid-area: 4 / 2 / 5 / 3;  
    }

    button {
        width: 50px;
        height: 50px;
        font-size: 25px;
    }
    .parent {
display: grid;
grid-template-columns: repeat(5, 1fr);
grid-template-rows: repeat(5, 1fr);
grid-column-gap: 0px;
grid-row-gap: 0px;
}

.div1 { grid-area: 1 / 1 / 2 / 2; }
.div2 { grid-area: 1 / 2 / 2 / 3; }
.div3 { grid-area: 1 / 3 / 2 / 4; }
.div4 { grid-area: 2 / 1 / 3 / 2; }
.div5 { grid-area: 2 / 2 / 3 / 3; }
.div6 { grid-area: 2 / 3 / 3 / 4; }
.div7 { grid-area: 3 / 1 / 4 / 2; }
.div8 { grid-area: 3 / 2 / 4 / 3; }
.div9 { grid-area: 3 / 3 / 4 / 4; }
.div10 { grid-area: 4 / 2 / 5 / 3; }

</style>