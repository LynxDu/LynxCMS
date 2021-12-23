
<div id="wrap">
<script>
      $(document).ready(function() {
              $('#zapros').click (function(){
                     $.get(
                      'inquerytime.php',
                      function (data){$('#fortime').text(data)}
                       );
               });
 }); /*end ready*/
 </script>      

  Время по запросу: <span id="fortime"> <?php $today[1] = date("H:i:s");echo $today[1];?> </span> <button id="zapros">Обновить</button>
 </div>
 
