<?php
//Mapping hardware untuk konstruksi interface
$CONFIG_HARDWARE = 
array(
  array(
    'device_id' => 1,
    'tipe'  =>  'sensor',
    'descp' => 'Sensor Ultrasonik',
    'loc'   => 'Tandon Air',
    'ip_address' =>'192.168.43.69',
    'dependency'=>array(1)
    ),
  array(
    'device_id' => 2,
    'tipe'  =>  'relay',
    'descp' => 'Relay Pompa',
    'loc'   => 'Pompa',
    'ip_address' =>'192.168.43.70',
    'dependency'=>array(2)
    ) ,
    
  array(
    'device_id' => 3,
    'tipe'  =>  'relay',
    'descp' => 'Relay Lampu 1',
    'loc'   => 'Ruang Tamu',
    'ip_address' =>'192.168.43.71',
    'dependency'=>array()
    )  
  )



function getsocketdata($param) {
  $service_port =$param['port'];
  $address = $param['ip'];  // CHANGE TO YOUR ESP8266 IP ADDRESS!!!!!!!

/* Create a TCP/IP socket. */
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
} else {}
$result = socket_connect($socket, $address, $service_port);
if ($result === false) {
echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
} else {}
$in = $param['request'];
$out = "";
socket_write($socket, $in, strlen($in));
while ($out = socket_read($socket, 2048)) {
return $out;
}
socket_close($socket);
}

//contoh get value from sensor ultrasonik
$param = array(
  'port'=>'80',
  'ip'=>'192.168.43.69',
  'request'=>'command=sensor');
echo getsocketdata($param);// get value from sensor ,response = command=sensor&value=23


//contoh get value from relay
$param = array(
  'port'=>'80',
  'ip'=>'192.168.43.70',
  'request'=>'command=relay');
echo getsocketdata($param);// HIGH / LOW ,response = command=relay&value=1

//contoh set relay on
$param = array(
  'port'=>'80',
  'ip'=>'192.168.43.70',
  'request'=>'command=relayon');
echo getsocketdata($param);// HIGH ,response = command=relayon&value=1

//contoh set relay off
$param = array(
  'port'=>'80',
  'ip'=>'192.168.43.70',
  'request'=>'command=relayoff');
echo getsocketdata($param);// LOW,response = command=relayoff&value=0
?>
