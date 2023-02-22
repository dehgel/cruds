<?php 

class query extends DBConnector{
    /**
     * Select Query string
     *
     *
     *
     * @package moroverse
     * @param SELECT query requests processor
     * @since 1.0
     *
     * USAGE: 
     *   $identifier = array( 'id', '1');
     *   $columns = array('id', 'name') or '*';
     *   if( $mvquery->select( 'table_name', $columns , $identifier ) ) {
     *      echo "nice";
     *   }
     */

	public function select(?string $table, int|string $rows, ?string $clause = NULL, ?string $order = NULL ) {

        // Encapsulated variable function
        $this->a = $table;
        $this->b = $rows;
        $this->c = $clause;
        $this->d = $order;

        // Single query with identified cell value.
        if (  !empty( $this->c ) || str_contains( $this->c, self::WHERE ) ) {

            $this->sql =    self::SEL_ . " ". 
                            $this->b ." FROM " . 
                            $this->a . " " . 
                            self::WHERE . " " .
                            self::_ID_ . 
                            $this->c . " " . 
                            $this->d;

            $this->result = $this->conn->query( $this->sql );

        // Query identifier from multiple tables. @Returns array().
        } elseif ( str_contains( $this->c, self::_J_ ) || str_contains( $this->c, self::ORD_ )) {

            $this->sql = self::SEL_ . 
                         $this->b . 
                         self::F_ . 
                         $this->a . " ". 
                         $this->c .  " " . 
                         $this->d;

            $this->result = $this->conn->query( $this->sql );

        // Returns orderly in array().
        }  else {

            $this->sql = self::SEL_ . $this->b . self::F_ ." ". $this->a . " " . $this->c . " " . $this->d;

            $this->result = $this->conn->query( $this->sql );

            $this->args = array();

        }

        $json = $this->result->fetch( PDO::FETCH_ASSOC );

        do {

            // Update to be sent to a JSON file.
            print json_encode( $json );

        } while ( $json = $this->result->fetch( PDO::FETCH_ASSOC ) ) ;


        return 0;

    }

    /**
	 * Insert Query
  	 * 
     * @package moroverse
     * @param processes values of input request as input array
	 * @since 1.0
     *
     * USAGE: 
     *   $values = array( '1', 'John');
     *   $columns = array('id', 'name')
     *   if( $mvquery->insert( 'table_name', $columns, $values) ) {
     *      echo "nice";
     *   }
	 */

	public function insert($totable = '' , $tocolumn = '', $value = '', $fromtable = NULL, $condition = NULL ) {

        $this->a = $totable;
        $this->b = $tocolumn;
        $this->c = $value;
        $this->d = $fromtable;
        $this->e = $condition;

        if ( empty( $this->d ) && empty( $this->e ) ) {

            $this->sql = self::INS_ . "{$this->a} ({$this->b}) " . self::VALS . " ({$this->c})";

        } else {

            $this->sql = "INSERT INTO {$this->a} SELECT {($this->c)} FROM {$this->d} WHERE {$this->e}";

        }
        
        $this->result = $this->conn->query( $this->sql );

        if( $this->result->execute() ) {

            return $this->__destruct();

        }
       
	}

	/**
	 * Update Query
  	 * 
     * @param process edition of selected data from input array.
	 * @since 1.0
     *
     *
     * USAGE: 
     *   $id = array( 'id' => '1');
     *   $data = array('name' => 'John');
     *   if( $mvquery->update( 'table_name', $data, $id ) ) {
     *      echo "nice";
     *   }
	 */
    public function update(string $table = '', $fields = array(), $condition = '') {

        $this->a        = $table;
        $this->c        = $condition;
        $this->array    = $fields;

        $this->query = ''; 

        $this->d = ''; 

        
        foreach( $this->array as $key => $value )  
        {  
            $this->query .= $key . "='" . $value . "', ";  
        }  

         /* Convert array to string 
         * key1 = 'value1', key2 = 'value2'
         */ 
        $this->query = substr( $this->query, 0, -2 ); 

          
        foreach( $this->c as $key => $value )  
        {  
            $this->d .= $key . "='".$value."' AND ";  
        }  

        /* Array to string  
         * id = 'n'
         */ 
        $this->d = substr( $this->d, 0, -5 );  
       
        $this->query = "UPDATE " . $this->a . " SET ".$this->query." WHERE ". $this->d."";  

        if( $this->conn->query( $this->query ) ) {  

            return self::__destruct(); 

        } 
        
    }

    /**
	 * Delete Query
  	 *
     * @param process the removal of selected data from dataset. 
	 * @since 1.0
     * 
     * USAGE: 
     *   $id = array( 'id' => '1');
     *   if( $mvquery->delete( 'table_name', array( $id )) ) {
     *      echo "nice";
     *   }
	 */

    public function delete( $table = '', $condition = array() ) {

        $this->a    = $table;
        $this->b    = array_values( $condition );
        $this->id   = '';

        // Check if input variable is array
        if ( is_array( $this->b ) ) {

            foreach( $this->b as $key ) {

                $this->id .= $key; 

            }

            // Convert array to string returns string.
            $this->id = substr( $this->id, 0, NULL );

            $this->query = "DELETE FROM " . $this->a . " WHERE id={$this->id}";

        } 

        // Return the class buffer to NULL after query execution 
        if( $this->conn->query( $this->query ) ) {  

            return self::__destruct(); 

        }    
    }
}
