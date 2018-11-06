<?php
    class Sync_server extends CI_Controller {
        function __construct() {
            parent::__construct();
            $this->load->database();    
        }

        function index() {
            if (isset( $_POST['qry'] ) ) {
                $qry = htmlspecialchars_decode( urldecode( $_POST['qry']));


                //$this->connect_local_db();

                $qry = explode(" ;; ", $qry);

                foreach($qry as $q) {

                    $q = explode( "||", $q );

                    //print_r($q);

                    $exists = mysql_query( $q[0] ) or die ("<hr/>" . mysql_error() ."<br/>" . $q[0]);

                    if ( $exists && mysql_num_rows( $exists ) ) {
                        mysql_query( $q[2] ) or die ("<hr/>" . mysql_error()."<br />".$q[2]);
                    } else{
                        mysql_query( $q[1] ) or die ("<hr/>" . mysql_error()."<br />".$q[1]);
                    }

                    //$this->db->query($q);
                }
                die("1");
            } else {
                echo "qry not found";
            }
        }


    }
?>