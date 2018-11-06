<?php
    class Sync extends CI_Controller {
        private $tables;
        function __construct() {
            parent::__construct();
            $this->load->database();
            $this->tables = array(
                "blog" => array("id_blog"),
            );


            $this->id_blog = $this->config->item('id_blog');


        }

        function index() {
            echo '<br>'.date("H:i:s A");

            $newLine = "\r\n";
            $output = $update = "";

            foreach($this->tables as $table_name => $columns ){

                $col_check = "SHOW COLUMNS FROM `{$table_name}` LIKE 'is_sync'";
                $col_exists = $this->db->query($col_check);
                if ( $col_exists->num_rows > 0 ) { // is_sync column exists for this table 
                    $sql = "SELECT * FROM {$table_name} WHERE is_sync = 0 LIMIT 500" ;
                    $rows = $this->db->query($sql);
                    if ( $rows->num_rows > 0 ) { // where is_sync = 0
                        foreach ( $rows->result_array() as $row ) {
                            $col_val = $update_col_val = $already_exists = array();
                            foreach($row as $name => $val) {
                                if ( is_null( $val ) ) {
                                    continue;
                                }
                                $val = mysql_real_escape_string($val);

                                $update_col_val[] = " `{$name}` = '{$val}' ";

                                if ( "is_sync" === $name ) {
                                    $val = 1;
                                }

                                if ( "id_blog" === $name ) {
                                    $val = $this->id_blog;
                                }

                                $col_val[] = " `{$name}` = '{$val}' ";

                                if ( $name === $columns[0] ){
                                    $already_exists[] = " `$columns[0]` = '{$val}'";
                                }

                                if ( $name === $columns[1] ){
                                    $already_exists[] = " `$columns[1]` = '{$val}'";
                                }


                            }

                            if ( is_array($col_val) && count($col_val) > 0 ) {

                                //echo $this->table_keys[$table_name];
                                $output .= "SELECT * FROM `{$table_name}` WHERE `id_blog` = {$this->id_blog} AND " . implode(" AND ", $already_exists) . " ||";
                                $output .= "INSERT INTO `{$table_name}` SET " . implode(",", $col_val) . " ||";
                                $output .= "UPDATE `{$table_name}` SET " . implode(",", $col_val) . " WHERE `id_blog` = {$this->id_blog} AND " . implode(" AND ", $already_exists);
                                $output .= " ;; ";

                                $update .= "UPDATE {$table_name} SET is_sync = 1 WHERE " . implode(" AND ", $update_col_val) . " ;; ";
                            }
                        }
                    } // if is_sync = 0

                } // if is_sync column exists 
            }

            if ( !empty($output) && $this->post_data($output) ) {
                $update = explode(" ;; ", $update);
                foreach($update as $upq){
                    if (!empty($upq) ) {
                        $this->db->query($upq);
                    }
                }
            } else {
                echo $result;
            }

            echo date("H:i:s A");

        }

        function post_data($qry){
            $qry = htmlspecialchars(urlencode($qry));
            $data = "qry=" . $qry;
            $ch = curl_init();
            curl_setopt( $ch, CURLOPT_URL,$this->config->item("sync_server_url") );
            curl_setopt( $ch, CURLOPT_AUTOREFERER, 1);
            curl_setopt ( $ch, CURLOPT_HTTPHEADER, array ( 'Content-length: ' . strlen($qry) ) );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt( $ch, CURLOPT_POST,1);
            curl_setopt( $ch, CURLOPT_POSTFIELDS,$data);
            curl_setopt( $ch, CURLOPT_CRLF, 1);
            $result = curl_exec($ch);
            curl_close($ch);
            if ( 1 === intval($result) ) {
                return TRUE;
            } else {
                echo $result;
                return $result;
            }
        }


    }
?>