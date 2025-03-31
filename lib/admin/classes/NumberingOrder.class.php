<?php
/**
 * Defines the attributes for numbering_order
 * Project:     LogicMind
 * File:   NumberingOrder.class.php
 *
 * @author Ananthakumar V
 * @since 10/04/2017
 * @package admin
 * @version 1.0
 */
class  NumberingOrder extends DB_Public_numbering_order 
{

               /** Attributes */
/**
* represents the BusinessObject Id
* @var string
*/
    var $business_object;

/**
* represents the SubBusinessObject Id
* @var string
*/
    var $sub_business_object;

/**
* represents the prefix of the number sequence
* @var string
*/
    var $prefix;

/**
* represents the initial_number of the number sequence
* @var string
*/
    var $initial_number;

/**
* represents the body of the number sequence
* @var string
*/
    var $body;

/**
* represents the suffix of the number sequence
* @var string
*/
    var $suffix;

}
?>