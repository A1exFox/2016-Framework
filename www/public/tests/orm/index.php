<?php
//require 'rb.php';
//function debug($data)
//{
//    echo '<pre>'. print_r($data, true) .'</pre>';
//}
//
//R::setup('mysql:host=mysql;dbname=userdb;charset=utf8', 'user', 'password');
//R::freeze(true);
//R::fancyDebug(true);
//var_dump(R::testConnection());

// Create
//$cat = R::dispense('category');
//$cat->title = 'this is text 12839109 2839012380123801238 01283109238091238091 2301238109238102380129 309123809123801238 0912380128301 09231892038 9012389012 jdlasjflkasdj alsdjflakdsjfl adlfjkalsdfjkkl adslkjfasldfjalsdfjfjadsklfjlasasdlkjfasdfjlsadjflfj asdfk a aslkdjflaksdfj l alsdkfjl';
//$id = R::store($cat);
//debug($id);

// Read
//$cat = R::load('category', 1);
//debug($cat);
//echo $cat->title;
//echo $cat['title'];

// Update
//$load = R::load('category', 2);
//echo $load->title;
//$load->title = 'Cat 2';
//$id = R::store($load);
//echo $id;

//$cat = R::dispense('category');
//$cat->title = 'Cat 4';
//$cat->id = 4;
//$id = R::store($cat);
//echo $id;

// Delete
//$cat = R::load('category', 3);
//R::trash($cat);

//$cat = R::loadAll('category',[2,4]);
//R::trashAll($cat);

//R::wipe('category');

// Find All
//$cat = R::findAll('category', 'id > ?', [2]);
//$cat = R::findAll('category', 'title LIKE ?', ['%xt%']);

// Find One
//$cat = R::findOne('category', 'id = 2');
//debug($cat);
