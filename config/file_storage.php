<?php
use Aws\S3;
use Cake\Event\EventManager;
use Cake\Core\Configure;
use Burzum\FileStorage\Lib\FileStorageUtils;
use Burzum\FileStorage\Lib\StorageManager;
use Burzum\FileStorage\Event\ImageProcessingListener;
use Burzum\FileStorage\Event\LocalFileStorageListener;

// Attach the S3 Listener to the global CakeEventManager
//$listener = new S3StorageListener();
//EventManager::instance()->on($listener);
$listener = new LocalFileStorageListener();
EventManager::instance()->on($listener);

// Attach the Image Processing Listener to the global CakeEventManager
$listener = new ImageProcessingListener();
EventManager::instance()->on($listener);

Configure::write('FileStorage', array(
    // Configure image versions on a per model base
    'imageSizes' => array(
        'CategoryImage' => array(
            'small' => array(
                'thumbnail' => array(
                    'mode'   => 'inbound',
                    'width'  => 400,
                    'height' => 400
                )
            )
        ),
        'PlaceImage'    => array(
            'small' => array(
                'thumbnail' => array(
                    'mode'   => 'inbound',
                    'width'  => 100,
                    'height' => 100
                )
            ),
        ),
        'PlaceScene'    => array(
            'small' => array(
                'thumbnail' => array(
                    'mode'   => 'inbound',
                    'width'  => 400,
                    'height' => 400
                )
            ),
        ),
    )
));

// This is very important! The hashes are needed to calculate the image versions!
FileStorageUtils::generateHashes();

StorageManager::config('Local', array(
        'adapterOptions' => array(WWW_ROOT, true),
        'adapterClass'   => '\Gaufrette\Adapter\Local',
        'class'          => '\Gaufrette\Filesystem'
    )
);
