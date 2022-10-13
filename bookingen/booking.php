<?php 
class Booking {
    public $id;
    public $date;
    public $quantity;
    public $customerId;
    public $tableId;

    private static function con() {
        return mysqli_connect('localhost','root','','bontemps');
    }

    public static function insert(array $values) {
        $date = $values['date'];
        $quantity = $values['quantity'];
        $customerId = $values['customerId'];
        $tableId = $values['tableId'];

        $query = "INSERT INTO reserveringen (Datum, Aantal, Klanten_ID, Tafel_ID) VALUES ('$date', '$quantity', '$customerId', '$tableId');";
        mysqli_query(self::con(), $query);

        $query = "SELECT * FROM reserveringen ORDER BY id DESC LIMIT 1;";
        $result = self::con()->query($query);
        
        if(mysqli_prepare(self::con(), $query)) {
            while($row = $result->fetch_assoc())
            {
                if($row != NULL)
                {
                    $booking = Booking::set($row);
                }
            }
        }

        return isset($booking) ? $booking : null;
    }

    public static function update(array $values, int $id) {
        $date = $values['date'];
        $quantity = $values['quantity'];
        $customerId = $values['customerId'];
        $tableId = $values['tableId'];

        $query = "UPDATE reserveringen SET Datum='$date', Aantal='$quantity', Klanten_ID='$customerId', Tafel_ID='$tableId', WHERE id='$id'";
        
        mysqli_query(self::con(), $query);

        return Booking::select($id, null);
    }

    public static function select($id, $query) {
        if(!$query && $id) {
            $query = "SELECT * FROM reserveringen WHERE ID = '$id'";
        }

        $result = self::con()->query($query);
        
        if(mysqli_prepare(self::con(), $query)) {
            while($row = $result->fetch_assoc())
            {
                if($row != NULL)
                {
                    $reservations[] = Booking::set($row);
                }
            }
        }

        return isset($reservations) ? $reservations : null;
    }

    public function getCustomerName() {

        $query = "SELECT Naam FROM klanten WHERE ID = '$this->customerId'";
        $result = self::con()->query($query);
        
        if(mysqli_prepare(self::con(), $query)) {
            while($row = $result->fetch_assoc())
            {
                if($row != NULL)
                {
                    $customername = $row['Naam'];
                }
            }
        }

        return isset($customername) ? $customername : null;
    }

    public static function getCustomerID(string $customerName) {

        $query = "SELECT ID FROM klanten WHERE Naam = '$customerName'";
        $result = self::con()->query($query);
        
        if(mysqli_prepare(self::con(), $query)) {
            while($row = $result->fetch_assoc())
            {
                if($row != NULL)
                {
                    $customerID = $row['ID'];
                }
            }
        }

        return isset($customerID) ? $customerID : null;
    }

    public static function delete(int $id) {
        $query = "DELETE FROM reserveringen WHERE ID = '$id'";

        return self::con()->query($query);
    }

    private static function set(array $row) {
        $booking = new Booking;

        $booking->id = $row['ID'];
        $booking->date = $row['Datum'];
        $booking->quantity = $row['Aantal'];
        $booking->customerId = $row['Klanten_ID'];
        $booking->tableId = $row['Tafel_ID'];

        return $booking;
    }
}





