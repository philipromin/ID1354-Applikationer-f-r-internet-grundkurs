<?php 

$css = '<link rel="stylesheet" type="text/css" media="screen" href="'.ROOT_PATH.'assets/css/calendar.css" />';
require "views/header.php";

?>

    <div class="container">
        <div class="weekdays">
            <div class="weekday">Mon</div>
            <div class="weekday">Tue</div>
            <div class="weekday">Wed</div>
            <div class="weekday">Thu</div>
            <div class="weekday">Fri</div>
            <div class="weekday">Sat</div>
            <div class="weekday">Sun</div>
        </div>
        <div class="calendar">      
                <div class="calendar_day day">1<a href="<?php ROOT_URL?>recipes/recipe/2"><img src="/tastyrecipes/images/meatballs.jpg" alt="Meatballs"></a></div>
                <div class="calendar_day day">2</div>
                <div class="calendar_day day">3</div>
                <div class="calendar_day day">4</div>
                <div class="calendar_day day">5 <a href="<?php ROOT_URL?>recipes/recipe/1"><img src="/tastyrecipes/images/pancakes.jpg" alt="Pancakes"></a></div>
                <div class="calendar_day day">6</div>
                <div class="calendar_day day">7</div>
                <div class="calendar_day day">8</div>
                <div class="calendar_day day">9</div>
                <div class="calendar_day day">10</div>
                <div class="calendar_day day">11</div>
                <div class="calendar_day day">12</div>
                <div class="calendar_day day">13</div>
                <div class="calendar_day day">14</div>        
                <div class="calendar_day day">15</div>
                <div class="calendar_day day">16</div>
                <div class="calendar_day day">17</div>
                <div class="calendar_day day">18</div>
                <div class="calendar_day day">19</div>
                <div class="calendar_day day">20</div>
                <div class="calendar_day day">21</div>    
                <div class="calendar_day day">22</div>
                <div class="calendar_day day">23</div>
                <div class="calendar_day day">24</div>
                <div class="calendar_day day">25</div>
                <div class="calendar_day day">26</div> 
                <div class="calendar_day day">27</div> 
                <div class="calendar_day day">28</div> 
                <div class="calendar_day day">29</div>
                <div class="calendar_day day">30</div>
                <div class="calendar_day day">31</div>
                <div class="calendar_day day next-month">1</div>
                <div class="calendar_day day next-month">2</div>
                <div class="calendar_day day next-month">3</div>
                <div class="calendar_day day next-month">4</div>
        </div>
    </div>
    
   
</body>
</html>