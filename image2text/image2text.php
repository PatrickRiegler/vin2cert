<?php

// extend path for including composer frameworks
$path = "/var/www/html";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

    require 'vendor/autoload.php';

    use Aws\Rekognition\RekognitionClient;

    $options = [
       'region'            => 'eu-west-1',
        'version'           => 'latest'
    ];

    $rekognition = new RekognitionClient($options);
	
    #Get local image
    // $photo = 'fzausweissharan.png';
    $photo = 'fzausweisviano.png';
    // $photo = 'sz-nummer-r8.jpg';
    $fp_image = fopen($photo, 'r');
    $image = fread($fp_image, filesize($photo));
    fclose($fp_image);


    # Call DetectFaces
    $result = $rekognition->DetectText(array(
       'Image' => array(
          'Bytes' => $image,
       ),
       'Attributes' => array('ALL')
       )
    );

    echo $result;
    // print_r($result);

/*
    # Display info for each detected person
    print 'People: Image position and estimated age' . PHP_EOL;
    for ($n=0;$n<sizeof($result['FaceDetails']); $n++){

      print 'Position: ' . $result['FaceDetails'][$n]['BoundingBox']['Left'] . " "
      . $result['FaceDetails'][$n]['BoundingBox']['Top']
      . PHP_EOL
      . 'Age (low): '.$result['FaceDetails'][$n]['AgeRange']['Low']
      .  PHP_EOL
      . 'Age (high): ' . $result['FaceDetails'][$n]['AgeRange']['High']
      .  PHP_EOL . PHP_EOL;
    }
*/
?>


