<?php 

/**
* DbHandler all data base related actions( insert, update, select, delete )
*/
class DbHandler
{
	private $conn;
	function __construct()
	{
		require_once dirname(__FILE__) . '/DbConnect.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
	}


	/**
     * Checking user login
     * @param String $username User login username id
     * @param String $password User login password
     * @return boolean User login status success/fail
     */
    public function checkLogin($username, $password) {
        // fetching user by username
        // some sql queries will come here
        // return true or false based on query result
        
        //for now return true
        if($username == 'ejaz' && $password == '123456'){
	        return true;
        }

        return false;
    }

    public function getUserByUsername($username){
    	//fetch user data from database
    	//generate token here
    	//and update token expiry time
    	
    	//for now 
    	$userdata = [
    		'username' => 'Ejaz',
    		'token' => 'ihbc2q8987e78d9p0udbbd986q752%%%#%^%2'
    	];
    	return $userdata;
    }

    public function createFarmer($data){
        // insert query
        $stmt = $this->conn->prepare("INSERT INTO farmers(name, aadhaar, gender, status) values(?, ?, ?, 1)");
        $stmt->bind_param("sss", $data['name'], $data['aadhaar'], $data['gender']);
        $result = $stmt->execute();
        $stmt->close();
        // Check for successful insertion
        if ($result) {
            // Farmer successfully inserted
            return true;
        } else {
            // Failed to create Farmer
            return false;
        }
    }
}