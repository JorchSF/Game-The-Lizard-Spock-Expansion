<?php
    include('rules/Rules.php');
?>
<html> 
  <head> 
  </head> 
  <body>
  	<form method="get" action="index.php">
  		<label>Selecciona tu mano</label>
  		<select name="seleccion" id="seleccion">
  			<?php 
  			   foreach(Rules::$TYPE_ELEMENTS as $element){
  			       ?>
  			       <option value="<?php echo $element; ?>" <?php echo (isset($_GET["seleccion"]) && $element == $_GET["seleccion"] ? 'selected' : ''); ?>>
  			       	<?php echo $element; ?>
  			       </option>
  			       <?php 
  			   }
  			?>
  			
  		</select>
  		<input type="submit" />
  	</form>
  	<?php 
      
    if(isset($_GET["seleccion"])){
        $user = $_GET["seleccion"];
        $pc = Rules::$TYPE_ELEMENT[ceil(rand(0, 4))];
        echo 'PC: '.$pc.'</p>'; 
        echo Rules::TYPE_ELEMENT_ACTION ($user, $pc);
    }
    
  ?> 
  </body> 
</html> 