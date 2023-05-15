<?php
// загружаем ресурсы
require_once('constants.php');
require_once('functions.php');
// Подгружаем классы
spl_autoload_register('autoload');


$user = USERNAME;
$pass = PASSWORD;
$categories_url = CATS_URL;
$category_url = CAT_URL;
$article_url = ART_URL;

// Создаем объект класса HandleApi
$api_handler = new HandleApi($user, $pass);


// Получаем массив категорий
$data_categories = $api_handler->getApiData($categories_url);

?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="wrapper mb-5 mt-5">
            <div class="container">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <?php
                    foreach($data_categories as $category) { ?>
                        <a class="nav-item nav-link <?php echo ($category['category_id'] == 1)? "active" : "" ;?>" id="nav-<?php echo $category['category_id'];?>-tab" data-toggle="tab" href="#nav-<?php echo $category['category_id'];?>" role="tab" aria-controls="nav-<?php echo $category['category_id'];?>" aria-selected=<?php echo ($category['category_id'] == 1)? "true" : "false";?>><?php echo $category['name'];?></a>

                    <?php  } ?>
                        
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">

                <?php
                    foreach($data_categories as $category) { ?>
                    <div class="tab-pane fade show <?php echo ($category['category_id'] == 1)? "active" : "" ;?>" id="nav-<?php echo $category['category_id'];?>" role="tabpanel">
                        <div class="row mb-4">
                        <?php
                            $articles_list = $api_handler->getApiData($category_url.$category['category_id']);
                            
                            foreach($articles_list as $article_item) {

                                $article = $api_handler->getApiData($article_url.$article_item['article_id']);
                                ?>
                            <div class="col-12 mt-3 mb-3">
                                <h2><?php echo $article['name'];?></h2>
                                <p><i><?php echo $article['date'];?></i></p>
                                <p><?php echo $article['text'];?></p>
                            </div>
                            <div class="col-12"><hr></div>


                            <?php } ?>
                        </div>
                    </div>

                    <?php } ?>


                    
                    
                </div>
            </div>
        </div>
    </body>
</html>        