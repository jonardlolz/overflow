<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multisort{

     private $key;

     function __construct(){
          // $this->CI =& get_instance();
          // $this->CI->load->helper('url');
     }

     //runs the sort, and returns sorted array with preserved keys for the array
     function run ($myarray, $key_to_sort, $type_of_sort = '')
     {
        $this->key = $key_to_sort;

        if($type_of_sort == 'desc')
            uasort($myarray, array($this, 'myreverse_compare'));
        else
            uasort($myarray, array($this, 'mycompare'));

        return $myarray;
     }

     //runs the sort, and returns sorted array with preserved keys for the array
     function runSTD ($myarray, $key_to_sort, $type_of_sort = '')
     {
        $this->key = $key_to_sort;

        if($type_of_sort == 'desc')
            uasort($myarray, array($this, 'myreverse_compareSTD'));
        else
            uasort($myarray, array($this, 'mycompareSTD'));

        return $myarray;
     }

	//runs the sort, and returns sorted array with new keys for the array
     function run2($myarray, $key_to_sort, $type_of_sort = '')
     {
        $this->key = $key_to_sort;

        if($type_of_sort == 'desc')
            usort($myarray, array($this, 'myreverse_compare'));
        else
            usort($myarray, array($this, 'mycompare'));

        return $myarray;
     }

     //for ascending order
     function mycompare($x, $y)
     {
        if(ucwords($x[$this->key]) == ucwords($y[$this->key]))
            return 0;
        else if(ucwords($x[$this->key]) < ucwords($y[$this->key]))
            return -1;
        else
            return 1;
     }

     function mycompareSTD($x, $y)
     {
         $sort = $this->key;

        if(ucwords($x->$sort) == ucwords($y->$sort))
            return 0;
        else if(ucwords($x->$sort) < ucwords($y->$sort))
            return -1;
        else
            return 1;
     }

     //for descending order
     function myreverse_compare($x, $y)
     {
        if(ucwords($x[$this->key]) == ucwords($y[$this->key]))
            return 0;
        else if(ucwords($x[$this->key]) > ucwords($y[$this->key]))
            return -1;
        else
            return 1;
     }

     //for descending order
     function myreverse_compareSTD($x, $y)
     {
        $sort = $this->key;
        if(ucwords($x->$sort) == ucwords($y->$sort))
            return 0;
        else if(ucwords($x->$sort) > ucwords($y->$sort))
            return -1;
        else
            return 1;
     }

}


?>
