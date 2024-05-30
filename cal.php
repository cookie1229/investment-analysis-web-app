<?php
// header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
// header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Allow GET, POST, and OPTIONS requests
// header("Access-Control-Allow-Headers: Content-Type"); // Allow the Content-Type header
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require_once 'vendor/autoload.php';
$servername = "localhost";
$username = "root";
$password = "root1234";
$dbname = "premifihk";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the response content type to JSON
header("Content-Type: application/json");

// Determine the HTTP method and endpoint
$method = $_SERVER["REQUEST_METHOD"];
$currentURL = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$parsedURL = parse_url($currentURL);

// Extract the endpoint path
$endpoint = rtrim($parsedURL['path'], '/');
$endpoint = str_replace("/seed/cal.php", "", $endpoint);

if ($method === "GET") {
    // Retrieve data based on the endpoint
    // echo json_encode($endpoint);

    switch ($endpoint) {
        case "/getTotalPortion":
            if (isset($_GET['selected_plan'])) {
                $selectedPlan = $_GET['selected_plan'];

                //$year = 0;

                try {
                    // Prepare the SQL statement

                    $sql = "SELECT * FROM testing_aia_sle5 WHERE selectedPlan = \"$selectedPlan\"ORDER BY `testing_aia_sle5`.`Year` ASC";

                    // Execute the query
                    $result = $conn->query($sql);

                    // var_dump($result);

                    // Fetch the results as an associative array
                    $rows = $result->fetch_all(MYSQLI_ASSOC);

                    if ($rows) {
                        // Output the JSON result
                        $jsonResult = json_encode($rows);

                        // Output the JSON result
                        echo $jsonResult;
                    } else {
                        // No results found
                        echo json_encode([]);
                    }
                } catch (Exception $e) {
                    // Handle the exception
                    echo "Error: " . $e->getMessage();
                }
            }
            break;

        case "/getTotalValueBasic":
            if (isset($_GET['selected_plan'])) {
                $selectedPlan = $_GET['selected_plan'];

                try {
                    // Prepare the SQL statement

                    $sql = "SELECT * FROM testing_aia_sle5 WHERE selectedPlan = \"$selectedPlan\" ORDER BY `testing_aia_sle5`.`Year` ASC";

                    // Execute the query
                    $result = $conn->query($sql);

                    // var_dump($result);

                    // Fetch the results as an associative array
                    $rows = $result->fetch_all(MYSQLI_ASSOC);

                    if ($rows) {
                        // Output the JSON result
                        $jsonResult = json_encode($rows);

                        // Output the JSON result
                        echo $jsonResult;
                    } else {
                        // No results found
                        echo json_encode([]);
                    }
                } catch (Exception $e) {
                    // Handle the exception
                    echo "Error: " . $e->getMessage();
                }
            }
            break;
        case "/getClientForm":
            if (isset($_GET['clientNum'])) {
                $client = $_GET['clientNum'];

                try {
                    // Prepare the SQL statement

                    $sql = "SELECT * FROM client WHERE clientNum = \"$client\"";

                    // Execute the query
                    $result = $conn->query($sql);

                    // var_dump($result);

                    // Fetch the results as an associative array
                    $rows = $result->fetch_all(MYSQLI_ASSOC);

                    if ($rows) {
                        // Output the JSON result

                        $response = [

                            'success' => true,
                            'data' => $rows,
                        ];

                        // Output the JSON result
                        echo json_encode($response);
                    } else {
                        // No results found
                        echo json_encode([]);
                    }
                } catch (Exception $e) {
                    // Handle the exception
                    echo "Error: " . $e->getMessage();
                }
            }
            break;
        case "/getClientFormPB":
            if (isset($_GET['clientNum'])) {
                $client = $_GET['clientNum'];

                try {
                    // Prepare the SQL statement

                    $sql = "SELECT * FROM clientPB WHERE clientNum = \"$client\"";

                    // Execute the query
                    $result = $conn->query($sql);

                    //var_dump($result);

                    // Fetch the results as an associative array
                    $rows = $result->fetch_all(MYSQLI_ASSOC);

                    if ($rows) {
                        // Output the JSON result

                        $response = [

                            'success' => true,
                            'data' => $rows,
                        ];

                        // Output the JSON result
                        echo json_encode($response);
                    } else {
                        // No results found
                        echo json_encode([]);
                    }
                } catch (Exception $e) {
                    // Handle the exception
                    echo "Error: " . $e->getMessage();
                }
            }
            break;
        case "/getMemberInfo":
            if (isset($_GET['memberNum'])) {
                $member = $_GET['memberNum'];

                try {
                    // Prepare the SQL statement

                    $sql = "SELECT * FROM user WHERE uid = \"$member\"";

                    // Execute the query
                    $result = $conn->query($sql);

                    //var_dump($result);

                    // Fetch the results as an associative array
                    $rows = $result->fetch_all(MYSQLI_ASSOC);

                    if ($rows) {
                        // Output the JSON result

                        $response = [

                            'success' => true,
                            'data' => $rows,
                        ];

                        // Output the JSON result
                        echo json_encode($response);
                    } else {
                        // No results found
                        echo json_encode([]);
                    }
                } catch (Exception $e) {
                    // Handle the exception
                    echo "Error: " . $e->getMessage();
                }
            }
            break;
    }

    // Send the data as JSON response
    // echo json_encode($data);
}
// Handle POST request
elseif ($method === "POST") {
    switch ($endpoint) {
        case '/postlogin':
            $username = $_POST['userName'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM user WHERE email = \"$username\" AND password = \"$password\"";
            // echo($sql);

            $result = $conn->query($sql);

            // Validate the username and password (perform necessary checks)
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $company = $row['company'];
                $team = $row['team'];
                $auth = $row['auth'];

                // Start the session or perform any necessary authentication logic
                session_start();

                $_SESSION['username'] = $username;
                $_SESSION['company'] = $company;
                $_SESSION['team'] = $team;
                $_SESSION['auth'] = $auth;

                // Set the 'username' cookie
                setcookie('username', $username, time() + 36000);
                // Set the 'company' cookie
                setcookie('company', $company, time() + 36000);
                setcookie('team', $team, time() + 36000);
                setcookie('auth', $auth, time() + 36000);

                // Return a success response
                $response = [
                    'username' => $username,
                    'company' => $company,
                    'team' => $team,
                    'auth' => $auth,
                    'success' => true,
                    'message' => 'Login successful',
                ];

                echo json_encode($response);
                // header("Location: https://www.premfihk.com/index.php");

            } else {
                $response = [
                    'success' => false,
                    'message' => 'Invalid username or password',
                ];
                echo json_encode($response);
                exit();
            }
            break;

        case '/changePw':
            $username = $_POST['userName'];
            //echo('123');

            $data = substr((rand(100000, 999999)), 0, 6);
            //echo($data);
            //exit();
            $sql = "UPDATE user SET password = \"$data\" WHERE email = \"$username\"";
            // echo $sql;
            //exit();
            $result = $conn->query($sql);
            break;

        case '/getCustomerList':
            $username = $_POST['userName'];
            $isdel = "0";
            $sql = "SELECT * FROM client WHERE creater = \"$username\" AND isdel = \"$isdel\"";
            $result1 = $conn->query($sql);

            $currentPage = isset($_POST['page']) ? $_POST['page'] : 1;

            // Get the current page number from the URL parameter
            $recordsPerPage = 9; // Set the number of records to display per pagegetCustomerListPage
            $offset = ($currentPage - 1) * $recordsPerPage;
            $sql = "SELECT * FROM client WHERE creater = \"$username\"  AND isdel = \"$isdel\"LIMIT $offset, $recordsPerPage";

            $result = $conn->query($sql);
            if ($result && $result1) {
                $Resultrows = $result1->fetch_all(MYSQLI_ASSOC);
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                if ($rows) {
                    // Output the JSON result
                    $response = [
                        'data' => $rows,
                        'number' => $Resultrows,
                    ];

                    // Output the JSON result
                    echo json_encode($response);
                } else {
                    echo json_encode([]);
                }
            }
            break;
        case '/getPw':
            $username = $_POST['userName'];
            //echo('123');

            $data = substr((rand(100000, 999999)), 0, 6);
            //echo($data);
            //exit();
            $sql = "UPDATE user SET password = \"$data\" WHERE email = \"$username\"";
            // echo $sql;
            //exit();
            $result = $conn->query($sql);

            $sql = "SELECT * FROM user WHERE email = \"$username\" AND password = \"$data\"";
            //echo $sql;
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                $mail = new PHPMailer(true);
                try {
                    // Server settings
                    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
                    $mail->isSMTP(); // Send using SMTP
                    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
                    $mail->SMTPAuth = true; // Enable SMTP authentication
                    $mail->Username = 'emailonlydontreply@gmail.com'; // SMTP username
                    $mail->Password = 'pbcwtvwxokeuybiy'; // SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
                    $mail->Port = 465; // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    // Recipients
                    $mail->setFrom('seedlogin@gmail.com');
                    $mail->addAddress($username); // Add a recipient

                    // Content
                    $mail->isHTML(true); // Set email format to HTML
                    $mail->Subject = 'seed login password';
                    $mail->Body = "\"$data\"";
                    $mail->send();
                    echo json_encode(array('code' => 200, 'msg' => 'Message has been sent'));
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo json_encode(array('code' => 400, 'msg' => 'This email is not registered!'));
            }
            break;
        case '/getTeamCustomerList':
            $username = $_POST['userName'];
            $team = $_POST['team'];
            // echo($team);
            //exit();
            $isdel = "0";
            $sql = "SELECT * FROM client WHERE team = \"$team\" AND isdel = \"$isdel\"";

            $result1 = $conn->query($sql);

            $currentPage = isset($_POST['page']) ? $_POST['page'] : 1;

            // Get the current page number from the URL parameter
            $recordsPerPage = 9; // Set the number of records to display per page
            $offset = ($currentPage - 1) * $recordsPerPage;
            $sql = "SELECT * FROM client WHERE team = \"$team\" AND isdel = \"$isdel\"LIMIT $offset, $recordsPerPage";

            $result = $conn->query($sql);
            if ($result && $result1) {
                $Resultrows = $result1->fetch_all(MYSQLI_ASSOC);
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                if ($rows) {
                    // Output the JSON result
                    $response = [
                        'data' => $rows,
                        'number' => $Resultrows,
                    ];

                    // Output the JSON result
                    echo json_encode($response);
                    exit();
                } else {
                    echo json_encode([]);
                }
            }
            break;
        case '/getTeamCustomerListPB':
            $username = $_POST['userName'];
            $team = $_POST['team'];
            // echo($team);
            //exit();
            $isdel = "0";
            $sql = "SELECT * FROM clientPB WHERE team = \"$team\" AND isdel = \"$isdel\"";

            $result1 = $conn->query($sql);

            $currentPage = isset($_POST['page']) ? $_POST['page'] : 1;

            // Get the current page number from the URL parameter
            $recordsPerPage = 9; // Set the number of records to display per page
            $offset = ($currentPage - 1) * $recordsPerPage;
            $sql = "SELECT * FROM clientPB WHERE team = \"$team\" AND isdel = \"$isdel\"LIMIT $offset, $recordsPerPage";

            $result = $conn->query($sql);
            if ($result && $result1) {
                $Resultrows = $result1->fetch_all(MYSQLI_ASSOC);
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                if ($rows) {
                    // Output the JSON result
                    $response = [
                        'data' => $rows,
                        'number' => $Resultrows,
                    ];

                    // Output the JSON result
                    echo json_encode($response);
                    exit();
                } else {
                    echo json_encode([]);
                }
            }
            break;
        case '/getCustomerListPB':
            $username = $_POST['userName'];
            $isdel = "0";
            $sql = "SELECT * FROM clientPB WHERE creater = \"$username\" AND isdel = \"$isdel\"";
            //echo $sql;
            $result1 = $conn->query($sql);

            $currentPage = isset($_POST['page']) ? $_POST['page'] : 1;

            // Get the current page number from the URL parameter
            $recordsPerPage = 9; // Set the number of records to display per page
            $offset = ($currentPage - 1) * $recordsPerPage;
            $sql = "SELECT * FROM clientPB WHERE creater = \"$username\" AND isdel = 0 LIMIT $offset, $recordsPerPage";

            $result = $conn->query($sql);
            if ($result && $result1) {
                $Resultrows = $result1->fetch_all(MYSQLI_ASSOC);
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                if ($rows) {
                    // Output the JSON result
                    $response = [
                        'data' => $rows,
                        'number' => $Resultrows,
                    ];

                    // Output the JSON result
                    echo json_encode($response);
                } else {
                    echo json_encode([]);
                }
            }
            break;
        case '/getTeamCustomerListPage':
            //$username = $_POST['userName'];
            $team = $_POST['team'];
            $isdel = "0";
            $sql = "SELECT COUNT(*) AS totalRecords FROM client WHERE team = '$team' AND isdel = '0'";
            // echo $sql;
            $result = $conn->query($sql);
            if ($result) {
                $row = $result->fetch_assoc();
                $totalRecords = $row['totalRecords'];
                echo $totalRecords;
            } else {
                echo ('10');
            }
            break;
        case '/getTeamCustomerListPagePB':
            //$username = $_POST['userName'];
            $team = $_POST['team'];
            $isdel = "0";
            $sql = "SELECT COUNT(*) AS totalRecords FROM clientPB WHERE team = '$team' AND isdel = '0'";
            // echo $sql;
            $result = $conn->query($sql);
            if ($result) {
                $row = $result->fetch_assoc();
                $totalRecords = $row['totalRecords'];
                echo $totalRecords;
            } else {
                echo ('10');
            }
            break;

        case '/getPlanOption':
            $company = $_POST['company'];
            $sql = "SELECT DISTINCT selectedPlan FROM testing_aia_sle5 WHERE company = '$company'";
            $result = $conn->query($sql);

            if ($result) {
                $rows = array(); // Create an empty array

                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row; // Append each fetched row to the array
                }

                $response = new stdClass(); // Create an empty object
                $response->data = $rows; // Assign the array to the 'data' property of the object

                echo json_encode($response); // Echo the object as a JSON-encoded string
            } else {
                $response = new stdClass(); // Create an empty object
                $response->data = 0; // Assign 0 to the 'data' property of the object

                echo json_encode($response); // Echo the object as a JSON-encoded string
            }
            break;
        case '/getCustomerListPBPage':
            $sql = "SELECT COUNT(*) AS totalRecords FROM clientPB WHERE creater = '$username'AND isdel = '0'";
            $result = $conn->query($sql);

            if ($result) {
                $row = $result->fetch_assoc();
                $totalRecords = $row['totalRecords'];
                echo $totalRecords;
            } else {
                echo 0;
            }
            break;
        case '/delRecordPB':
            $clientNum = $_POST['clientNum'];
            $isdel = "1";
            $sql = "UPDATE clientPB
            SET `isdel` = \"$isdel\"
            WHERE `clientNum` = $clientNum";

            $result = $conn->query($sql);

            if ($result) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }

            break;
        case '/delRecord':
            $clientNum = $_POST['clientNum'];
            $isdel = "1";
            $sql = "UPDATE client
            SET `isdel` = \"$isdel\"
            WHERE `clientNum` = $clientNum";

            $result = $conn->query($sql);

            if ($result) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
            break;
        case '/saveEdit':
            $clientNum = $_POST['pageNumber'];
            $title = $_POST['title'];
            $clientName = $_POST['clientName'];
            $cash_investment = $_POST['cash_investment'];
            $aum = $_POST['aum'];
            $clientPortion = $_POST['client_portion'];
            $bankPortion = $_POST['bank_portion'];
            $total_portion = $_POST['total_portion'];
            $aum_int = $_POST['aum_int'];
            $plan = $_POST['plan'];
            $financing_ratio = $_POST['financing_ratio'];
            $welcome_bonus = $_POST['welcome_bonus'];
            $coupon = $_POST['coupon'];
            $select_int_rate = $_POST['int_rate'];
            $intRatesString = implode(',', $select_int_rate);
            $creater = $_COOKIE['username'];
            $team = $_COOKIE['team'];
            $sql = "UPDATE client
           SET `title` = \"$title\",
            `clientName` = \"$clientName\",
            `cash_investment` = \"$cash_investment\",
            `aum` = \"$aum\",
            `clientPortion` = \"$clientPortion\",
            `bankPortion` = \"$bankPortion\",
            `totalPortion` = \"$total_portion\",
            `aum_int` = \"$aum_int\",
            `plan` = \"$plan\",
            `financing_ratio` = \"$financing_ratio\",
            `welcome_bonus` = \"$welcome_bonus\",
            `coupon` = \"$coupon\",
            `select_int_rate` = \"$intRatesString\",
            `creater` = \"$creater\"
            `team` = \"$team\"
            WHERE `clientNum` = $clientNum";
            $result = $conn->query($sql);
            $result = $conn->query($sql);
            if ($result) {
                header("Location: https://www.premfihk.com/customerList.php?page=1");
                exit();
            } else {
                echo ('fail');
            }
            break;

        case '/saveEditPB':
            $clientNum = $_POST['clientNum'];
            $title = $_POST['title'];
            $clientName = $_POST['clientName'];
            $cash_investment = $_POST['cash_investment'];
            $plan = $_POST['plan'];
            $property_value_pb = $_POST['property_value_pb'];
            $mortgage_percent_pb = $_POST['mortgage_percent_pb'];
            $policy_percent_pb = $_POST['policy_percent_pb'];
            $policy_value_pb = $_POST['policy_value_pb'];
            $pb_percent = $_POST['pb_percent'];
            $pb_part = $_POST['pb_part'];
            $pf_percent = $_POST['pf_percent'];
            $pf_part = $_POST['pf_part'];
            $property_value_m = $_POST['property_value_m'];
            $mortgage_percent_m = $_POST['mortgage_percent_m'];
            $up_limit = $_POST['up_limit'];
            $age = $_POST['age'];
            $int_rate_m = $_POST['int_rate_m'];
            $pmt = $_POST['pmt'];
            $total_portion = $_POST['total_portion'];
            $welcome_bonus = $_POST['welcome_bonus'];
            $coupon = $_POST['coupon'];
            $LTV = $_POST['LTV'];
            $multiplier = $_POST['multiplier'];
            $investment_yield = $_POST['investment_yield'];
            $total_investment_pb = $_POST['total_investment_pb'];
            $total_investment = $_POST['total_investment'];
            $financing_ratio = $_POST['financing_ratio'];
            $financing_rate = $_POST['financing_rate'];
            $mgt_fee_rate = $_POST['mgt_fee_rate'];
            $int_rate = $_POST['int_rate'];
            $intRatesString = implode(',', $int_rate);
            $int_yield = $_POST['int_yield'];
            $intYieldsString = implode(',', $int_yield);
            $creater = $_COOKIE['username'];
            $team = $_COOKIE['team'];

            $sql = "UPDATE clientPB
             SET `title` = '$title',
            `clientName` = '$clientName',
            `cash_investment` = '$cash_investment',
            `plan` = '$plan',
            `property_value_pb` = '$property_value_pb',
            `mortgage_percent_pb` = '$mortgage_percent_pb',
            `policy_percent_pb` = '$policy_percent_pb',
            `policy_value_pb` = '$policy_value_pb',
            `pb_percent` = '$pb_percent',
            `pb_part` = '$pb_part',
            `pf_percent` = '$pf_percent',
            `pf_part` = '$pf_part',
            `property_value_m` = '$property_value_m',
            `mortgage_percent_m` = '$mortgage_percent_m',
            `up_limit` = '$up_limit',
            `age` = '$age',
            `int_rate_m` = '$int_rate_m',
            `pmt` = '$pmt',
            `total_portion` = '$total_portion',
            `welcome_bonus` = '$welcome_bonus',
            `coupon` = '$coupon',
            `LTV` = '$LTV',
            `multiplier` = '$multiplier',
            `investment_yield` = '$investment_yield',
            `total_investment_pb` = '$total_investment_pb',
            `total_investment` = '$total_investment',
            `financing_ratio` = '$financing_ratio',
            `financing_rate` = '$financing_rate',
            `mgt_fee_rate` = '$mgt_fee_rate',
            `int_rate` = '$intRatesString',
            `int_yield` = '$intYieldsString',
            `creater` = '$creater',
            `team` = '$team',
            WHERE `clientNum` = $clientNum";
            $result = $conn->query($sql);
            $result = $conn->query($sql);
            if ($result) {
                //echo json_encode(array('code' => 200, 'msg' => 'saved'));
                header("Location: https://www.premfihk.com/customerListPB.php?page=1");
                exit();
            } else {
                echo ('fail');
            }
            break;
        case '/savePB':
            $clientName = $_POST['clientName'];
            if ($clientName) {
                $title = $_POST['title'];

                $cash_investment = $_POST['cash_investment'];
                $plan = $_POST['plan'];
                $property_value_pb = $_POST['property_value_pb'];
                $mortgage_percent_pb = $_POST['mortgage_percent_pb'];
                $policy_percent_pb = $_POST['policy_percent_pb'];
                $policy_value_pb = $_POST['policy_value_pb'];
                $pb_percent = $_POST['pb_percent'];
                $pb_part = $_POST['pb_part'];
                $pf_percent = $_POST['pf_percent'];
                $pf_part = $_POST['pf_part'];
                $property_value_m = $_POST['property_value_m'];
                $mortgage_percent_m = $_POST['mortgage_percent_m'];
                $up_limit = $_POST['up_limit'];
                $age = $_POST['age'];
                $int_rate_m = $_POST['int_rate_m'];
                $pmt = $_POST['pmt'];
                $total_portion = $_POST['total_portion'];
                $welcome_bonus = $_POST['welcome_bonus'];
                $coupon = $_POST['coupon'];
                $LTV = $_POST['LTV'];
                $multiplier = $_POST['multiplier'];
                $investment_yield = $_POST['investment_yield'];
                $total_investment_pb = $_POST['total_investment_pb'];
                $total_investment = $_POST['total_investment'];
                $financing_ratio = $_POST['financing_ratio'];
                $financing_rate = $_POST['financing_rate'];
                $mgt_fee_rate = $_POST['mgt_fee_rate'];
                $int_rate = $_POST['int_rate'];
                $intRatesString = implode(',', $int_rate);
                $int_yield = $_POST['int_yield'];
                $intYieldsString = implode(',', $int_yield);
                $creater = $_COOKIE['username'];

                $sql = "INSERT INTO clientPB (`title`, `clientName`, `cash_investment`, `plan`, `property_value_pb`, `mortgage_percent_pb`, `policy_percent_pb`, `policy_value_pb`, `pb_percent`, `pb_part`, `pf_percent`, `pf_part`, `property_value_m`, `mortgage_percent_m`, `up_limit`, `age`, `int_rate_m`, `pmt`, `total_portion`, `welcome_bonus`, `coupon`, `LTV`, `multiplier`, `investment_yield`, `total_investment_pb`, `total_investment`,`financing_ratio`, `financing_rate`,`mgt_fee_rate`, `int_rate`, `int_yield`, `creater`,`team`)
                VALUES (\"$title\", \"$clientName\", \"$cash_investment\", \"$plan\", \"$property_value_pb\", \"$mortgage_percent_pb\", \"$policy_percent_pb\", \"$policy_value_pb\", \"$pb_percent\", \"$pb_part\", \"$pf_percent\", \"$pf_part\", \"$property_value_m\", \"$mortgage_percent_m\", \"$up_limit\", \"$age\", \"$int_rate_m\", \"$pmt\", \"$total_portion\", \"$welcome_bonus\", \"$coupon\", \"$LTV\", \"$multiplier\", \"$investment_yield\", \"$total_investment_pb\", \"$total_investment\",\"$financing_ratio\", \"$financing_rate\",\"$mgt_fee_rate\", \"$intRatesString\", \"$intYieldsString\", \"$creater\", \"$team\")";

                //Execute the query
                $result = $conn->query($sql);
                if ($result) {
                    //echo('saved');
                    header("Location: https://www.premfihk.com/customerListPB.php?page=1");

                    //exit();
                } else {
                    echo ('fail');
                    header("Location: " . getenv("HTTP_REFERER"));
                }

            } else {

                header("Location: " . getenv("HTTP_REFERER"));

            }

            break;
        case '/getAllPlan':
            $sql = "SELECT DISTINCT selectedPlan
             FROM testing_aia_sle5";
            $result = $conn->query($sql);
            if ($result) {
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                if ($rows) {
                    // Output the JSON result
                    $response = [
                        'data' => $rows,

                    ];

                    // Output the JSON result
                    echo json_encode($response);
                } else {
                    echo json_encode([]);
                }
            }
            break;
       
        case '/getAllPlanList':
            $sql = "SELECT DISTINCT selectedPlan,company,upload_date FROM testing_aia_sle5 where isdel = 0";
            $result1 = $conn->query($sql);
          

            $currentPage = isset($_POST['page']) ? $_POST['page'] : 1;
            $recordsPerPage = 5; // Set the number of records to display per page
            $offset = ($currentPage - 1) * $recordsPerPage;
            $sql = "SELECT DISTINCT selectedPlan,company,upload_date FROM testing_aia_sle5 WHERE isdel = 0 LIMIT $offset, $recordsPerPage";
            $result = $conn->query($sql);
            if ($result) {
                 $Resultrows = $result1->fetch_all(MYSQLI_ASSOC);
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                if ($rows) {
                    // Output the JSON result
                   $response = [
                        'data' => $rows,
                        'number' => $Resultrows,
                    ];


                    // Output the JSON result
                    echo json_encode($response);
                } else {
                    echo json_encode([]);
                }
            }
            break;
        
        case '/getAllPlanListPage':
            $sql = "SELECT COUNT(DISTINCT selectedPlan) AS totalRecords FROM testing_aia_sle5 WHERE isdel = 0";
            $result = $conn->query($sql);

              if ($result) {
                $row = $result->fetch_assoc();
                $totalRecords = $row['totalRecords'];
                echo $totalRecords;
            } else {
                echo 0;
            }
 
            break;

        case '/getAllMembers':
            $isdel = "0";
            $sql = "SELECT * FROM user WHERE isdel = \"$isdel\"";
            //echo $sql;
            //exit();
            $result1 = $conn->query($sql);

            $currentPage = isset($_POST['page']) ? $_POST['page'] : 1;
            //echo $_POST['page'];

            // Get the current page number from the URL parameter
            $recordsPerPage = 9; // Set the number of records to display per page
            $offset = ($currentPage - 1) * $recordsPerPage;
            $sql = "SELECT * FROM user WHERE isdel = 0 LIMIT $offset, $recordsPerPage";

            $result = $conn->query($sql);
            if ($result && $result1) {
                $Resultrows = $result1->fetch_all(MYSQLI_ASSOC);
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                if ($rows) {
                    // Output the JSON result
                    $response = [
                        'data' => $rows,
                        'number' => $Resultrows,
                    ];

                    // Output the JSON result
                    echo json_encode($response);
                } else {
                    echo json_encode([]);
                }
            }
            break;
        case '/getAllMemberPage':
            $sql = "SELECT COUNT(*) AS totalRecords FROM user WHERE  isdel = '0'";

            $result = $conn->query($sql);

            if ($result) {
                $row = $result->fetch_assoc();
                $totalRecords = $row['totalRecords'];
                echo $totalRecords;
            } else {
                echo 0;
            }
            break;
        case '/saveMember':
            $userName = $_POST['username'];
            $email = $_POST['email'];
            $company = $_POST['company'];
            $team = $_POST['team'];
            $addDate = $_POST['addDate'];
            $endDate = $_POST['endDate'];
            $auth = $_POST['auth'];
            $remark = $_POST['remark'];
            $data = substr((rand(100000, 999999)), 0, 6);
            $password = $data;

            $sql = "SELECT * FROM user WHERE isdel = 0 AND email = '$email'";
            //echo $sql;
            $info = $conn->query($sql);
            $rowCount = $info->num_rows;

            if ($rowCount !== 0) {

                $response = [
                    'data' => $rowCount,
                    'message' => 'Email address is already registered',
                ];
                echo json_encode($response);
                exit();

            }

            if ($email) {
                $sql = "INSERT INTO user (`userName`, `email`, `company`, `team`, `password`,`auth`,`creat_time`,`end_time`, `remark`) VALUES (\"$userName\", \"$email\", \"$company\",\"$team\", \"$password\",\"$auth\", \"$addDate\", \"$endDate\", \"$remark\")";

                //echo($sql);
                // Execute the query
                $result = $conn->query($sql);
                if ($result) {
                    $response = [

                        'message' => 'success',
                    ];
                    echo json_encode($response);

                    exit();
                } else {

                    header("Location: " . getenv("HTTP_REFERER"));
                }
            } else {
                //header("Location: https://www.premfihk.com/index.php");
            }

            break;
        case '/saveEditMember':
            $memberNum = $_POST['memberNum'];
            $userName = $_POST['username'];
            $email = $_POST['email'];
            $company = $_POST['company'];
            $team = $_POST['team'];
            $addDate = $_POST['addDate'];
            $endDate = $_POST['endDate'];
            $auth = $_POST['auth'];
            $remark = $_POST['remark'];
            $data = substr((rand(100000, 999999)), 0, 6);
            $password = $data;

            $sql = "UPDATE user
           SET `userName` = \"$userName\",
            `email` = \"$email\",
            `company` = \"$company\",
            `team` = \"$team\",
            `creat_time` = \"$addDate\",
            `end_time` = \"$endDate\",
            `auth` = \"$auth\",
            `remark` = \"$remark\"

            WHERE `uid` = $memberNum";

            // echo $sql;
            // exit();
            $result = $conn->query($sql);

            if ($result) {
                //echo $result;
                header("Location: http://localhost/seed/account.php?page=1");
                exit();
            } else {
                //echo ('fail');
            }
            break;
        case '/delMember':
            $memberNum = $_POST['memberNum'];
            $isdel = "1";
            $sql = "UPDATE user
            SET `isdel` = \"$isdel\"
            WHERE `uid` = $memberNum";

            $result = $conn->query($sql);

            if ($result) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
            break;
        case '/postAnnoucement':
            $title = $_POST['title'];
            $content = $_POST['content'];
            $escapedContent = htmlspecialchars($content);
            $isdel = "0";
            $reader = $_POST['reader'];

            if ($_FILES['image']['name']) {
                $image = $_FILES['image']['name'];
                $imageTmp = $_FILES['image']['tmp_name'];

                // Upload image to server (adjust the upload directory path)
                $targetDir = "Public/Uploads/";
                $targetFile = $targetDir . basename($image);
                if (move_uploaded_file($imageTmp, $targetFile)) {
                    // Insert data into database
                    $sql = "INSERT INTO annoucement (`title`, `content`, `image`, `isdel`, `reader`) VALUES (\"$title\", \" $escapedContent\", \"$image\", \"$isdel\",\"$reader\")";

                    if ($conn->query($sql) === true) {
                        echo json_encode(['success' => true]);
                    } else {
                        echo json_encode(['success' => false, 'status' => '111']);
                    }
                } else {
                    echo json_encode(['success' => false]);
                }
            } else {
                // Insert data into database
                $sql = "INSERT INTO annoucement (`title`, `content`, `isdel`,`reader`) VALUES (\"$title\", \"$content\", \"$isdel\", \"$reader\")";
                // echo $sql;
                // exit();

                if ($conn->query($sql) === true) {
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false]);
                }
            }

            break;
        case '/getAllMembers':
            $isdel = "0";
            $sql = "SELECT * FROM user WHERE isdel = \"$isdel\"";
            //echo $sql;
            //exit();
            $result1 = $conn->query($sql);

            $currentPage = isset($_POST['page']) ? $_POST['page'] : 1;
            //echo $_POST['page'];

            // Get the current page number from the URL parameter
            $recordsPerPage = 9; // Set the number of records to display per page
            $offset = ($currentPage - 1) * $recordsPerPage;
            $sql = "SELECT * FROM user WHERE isdel = 0 LIMIT $offset, $recordsPerPage";

            $result = $conn->query($sql);
            if ($result && $result1) {
                $Resultrows = $result1->fetch_all(MYSQLI_ASSOC);
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                if ($rows) {
                    // Output the JSON result
                    $response = [
                        'data' => $rows,
                        'number' => $Resultrows,
                    ];

                    // Output the JSON result
                    echo json_encode($response);
                } else {
                    echo json_encode([]);
                }
            }
            break;
        case '/getAnnouncement':
            $auth = $_POST['auth'];
           
            if ($auth == "member") {
                $sql = "SELECT * FROM annoucement WHERE isdel = '0' AND reader = 'member'";
            } elseif ($auth == 'leader') {
                $sql = "SELECT *  FROM annoucement WHERE isdel = '0' AND (reader = 'member' OR reader = 'leader')";
            } elseif ($auth == 'admin') {
                $sql = "SELECT *  FROM annoucement WHERE isdel = '0'";
            } else {
                $sql = "SELECT *  FROM annoucement WHERE isdel = '0' AND reader = 'all'";
            }
            // echo $sql;
            // exit(); // Print the SQL query for debugging

            $result = $conn->query($sql);
            if ($result) {
                $data = $result->fetch_all(MYSQLI_ASSOC);
                $totalRecords = count($data);
                echo json_encode(['success' => true, 'data' => $data, 'record' => $totalRecords]);
            } else {
                echo json_encode(['success' => false, 'error' => $conn->error]);
            }
            break;
       case '/savePlan':
    if (isset($_FILES['file'])) {
        $file = $_FILES['file']['tmp_name'];

        // Read CSV file
        $handle = fopen($file, "r");
        if ($handle !== FALSE) {
            // Prepare SQL statement with placeholders
            $stmt = $conn->prepare("INSERT INTO testing_aia_sle5 (Year, selectedPlan, company, TotalPremium, GCV, AccDiv, TermDiv, TotalValue, discounted_value, isdel, upload_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            // Check if prepare() failed and output error
            if ($stmt === false) {
                die('Prepare failed: ' . htmlspecialchars($conn->error));
            }

            // Skip the first line (header)
            fgetcsv($handle, 1000, ",");

            // Read CSV data and insert into database
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Assuming your CSV has eleven columns
                $col1 = $data[0]; // Year
                $col2 = $data[1]; // selectedPlan
                $col3 = $data[2]; // company
                $col4 = $data[3]; // TotalPremium
                $col5 = $data[4]; // GCV
                $col6 = $data[5]; // AccDiv
                $col7 = $data[6]; // TermDiv
                $col8 = $data[7]; // TotalValue
                $col9 = $data[8]; // discounted_value
                $col10 = $data[9]; // isdel
                $col11 = $data[10]; // upload_date

                // Validate data types and lengths
                if (!is_numeric($col1)) $col1 = 0; // Ensure Year is numeric
                if (strlen($col2) > 255) $col2 = substr($col2, 0, 255); // Truncate if selectedPlan exceeds length
                if (strlen($col3) > 255) $col3 = substr($col3, 0, 255); // Truncate if company exceeds length
                if (!is_numeric($col4)) $col4 = 0; // Ensure TotalPremium is numeric
                if (!is_numeric($col5)) $col5 = 0; // Ensure GCV is numeric
                if (!is_numeric($col6)) $col6 = 0; // Ensure AccDiv is numeric
                if (!is_numeric($col7)) $col7 = 0; // Ensure TermDiv is numeric
                if (!is_numeric($col8)) $col8 = 0; // Ensure TotalValue is numeric
                if (!is_numeric($col9)) $col9 = 0; // Ensure discounted_value is numeric
                if (!is_numeric($col10)) $col10 = 0; // Ensure isdel is numeric
                if (strlen($col11) > 255) $col11 = substr($col11, 0, 255); // Truncate if upload_date exceeds length

                // Bind parameters and execute statement
                $stmt->bind_param("issssssssss", $col1, $col2, $col3, $col4, $col5, $col6, $col7, $col8, $col9, $col10, $col11);

                if (!$stmt->execute()) {
                    echo 'Execute failed: ' . htmlspecialchars($stmt->error);
                }
            }

            // Close the statement and handle
            $stmt->close();
            fclose($handle);

            echo "CSV file uploaded and data inserted into database successfully.";
        } else {
            echo "Error opening CSV file.";
        }
    } else {
        echo "No file uploaded.";
    }
    break;
       case '/delPlan':
            $selectedPlan = $_POST['selectedPlan'];
            $isdel = "1";
            $sql = "UPDATE testing_aia_sle5 SET `isdel` = $isdel WHERE `selectedPlan` = '$selectedPlan'";


            $result = $conn->query($sql);

            if ($result) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false,'sql'=>$sql]);
            }
            break;
        default:
            $title = $_POST['title'];
            $clientName = $_POST['clientName'];
            $cash_investment = $_POST['cash_investment'];
            $aum = $_POST['aum'];
            $clientPortion = $_POST['client_portion'];
            $bankPortion = $_POST['bank_portion'];
            $total_portion = $_POST['total_portion'];
            $aum_int = $_POST['aum_int'];
            $plan = $_POST['plan'];
            $financing_ratio = $_POST['financing_ratio'];
            $welcome_bonus = $_POST['welcome_bonus'];
            $coupon = $_POST['coupon'];
            $select_int_rate = $_POST['int_rate'];
            $intRatesString = implode(',', $select_int_rate);
            $creater = $_COOKIE['username'];
            $team = $_COOKIE['team'];

            if ($clientName) {
                $sql = "INSERT INTO client (`title`, `clientName`, `cash_investment`, `aum`, `clientPortion`,`bankPortion`,`totalPortion`,`aum_int`, `plan`, `financing_ratio`, `welcome_bonus`, `coupon`, `select_int_rate`,`creater`,`team`) VALUES (\"$title\", \"$clientName\", \"$cash_investment\",\"$aum\", \"$clientPortion\",\"$bankPortion\", \"$total_portion\", \"$aum_int\", \"$plan\", \"$financing_ratio\", \"$welcome_bonus\", \"$coupon\", \"$intRatesString\",\"$creater\",\"$team\")";

                //echo($sql);
                // Execute the query
                $result = $conn->query($sql);
                if ($result) {
                    header("Location: https://www.premfihk.com/customerList.php?page=1");
                    exit();
                } else {

                    header("Location: " . getenv("HTTP_REFERER"));
                }
            } else {
                //header("Location: https://www.premfihk.com/index.php");
            }

            break;
    }

}