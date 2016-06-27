<?php
//Mapping hardware
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
    'tipe'  =>  'relay',
    'descp' => 'Relay Pompa',
    'loc'   => 'Pompa',
    'ip_address' =>'192.168.43.70',
    'dependency'=>array(2)
    ) ,
    
  array(
    'tipe'  =>  'relay',
    'descp' => 'Relay Lampu 1',
    'loc'   => 'Ruang Tamu',
    'ip_address' =>'192.168.43.71',
    'dependency'=>array()
    )  
    
  )

?>
