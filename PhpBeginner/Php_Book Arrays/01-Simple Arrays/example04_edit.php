<?php
declare(strict_types=1); // Must be the very first line always...


print "Deleting Item <br>";
function delete_array_value( int $subscript ) {
    $customer = array( 'Pete' ,'Smith' ,'123 Main Street' ,'Atlanta','GA', 30001 );

    print_r( "before " );
    print_r( $customer );
    unset( $customer[$subscript] );

    print_r( "<br>after " );
    print_r( $customer );
}

delete_array_value( 2 );



?>
<h3>
------------
</h3>
<?php
print "<br>Inserting Item <br>";
function insert_array_value( $value ) {
    $customer = array( 'Pete' ,'Smith' ,'123 Main Street' ,'Atlanta','GA', 30001 );

    print_r( "before " );
    print_r( $customer );
    array_push( $customer, $value );

    print_r( "<br>after " );
    print_r( $customer );
}

insert_array_value( "8==3" );


print( "<br>");
// Update 

print "<br>Updating  Item <br>";
function update_array_value( $value, int $location = -1 ) {
    $customer = array( 'Pete' ,'Smith' ,'123 Main Street' ,'Atlanta','GA', 30001 );

    if( $location == -1 ) {
        print_r( "before <br>" );
        print_r( $customer );
        array_push( $customer, $value );
    
        print_r( "after <br>" );
        print_r( $customer );
    } else {
        print_r( "before <br>" );
        print_r( $customer );
        $customer[$location] = $value;
    
        print_r( "after <br>" );
        print_r( $customer );
    }

}

update_array_value( "8==3",  4 );
update_array_value( "cool beans");


?>