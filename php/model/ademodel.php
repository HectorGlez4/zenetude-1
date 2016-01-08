<?php 
   class AdeData {

        /**
         * Get training manager's institute mail adress
         * @param $first_name string constains the training manager's first name
         * @param $last_name string constains the training manager's last name
         * @return array request result
         */
      public function recupEmailRf($first_name, $last_name){
         
         $db = connect();
         $request = $db -> prepare('SELECT user_instituteemail FROM User WHERE user_firstname = "'. $first_name . '" AND user_name = "' . $last_name . '"');
         $request -> execute();
         $results = $request -> fetchAll();

         return $results;
      }
   
}