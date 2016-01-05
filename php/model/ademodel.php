<?php 
	class AdeData {
		public function recupEmailRf(){
			
			$db = connect();
			$request = $db -> prepare('SELECT user_instituteemail FROM User WHERE user_firstname = "'. $first_name . '" AND user_name = "' . $last_name . '"');
            $request -> execute();
            $results = $request -> fetchAll();

            return $results;
		}
	
}