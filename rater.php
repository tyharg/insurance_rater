<?php
    class Rater{

        public function rate($amt) {
            if (! is_int($amt)){
                return "ERROR_INVALID";
            }

            if($amt<1 || $amt>1000){
                return "ERROR_AMOUNT";
            }
            else if($amt >= 1 and $amt < 500){
                return round($amt * .23, 2);
            } 
            else if($amt >= 500 and $amt <= 1000){
                return round($amt * .35, 2);
            }
            else{
                return "ERROR_UNKNOWN";
            }
        }

}

?>