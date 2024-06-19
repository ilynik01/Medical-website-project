<div class="news">
    <?php
        $url = 'https://newsapi.org/v2/top-headlines?country=us&category=health&apiKey=7f02100dd6f84f7084a905bf55250695';
        $response = file_get_contents($url);
        $NewsData = json_decode($response);
    ?>

    <h2>Google NEWS</h2>
    <div class="container-news">
        <?php
            $i = 0;
            foreach($NewsData->articles as $News){
                if ($i++ == 3) break;
        ?>

        <div class="row NewsGrid">
            <!-- Image -->
            <a href="<?php echo $News->url ?>" target="_blank">
                <?php if ($News->urlToImage != null){
                echo '<img src="'. $News->urlToImage.'" class="rounded" alt="">';
                }
                ?>
            </a>
            <!-- Heading -->
            <a href="<?php echo $News->url ?>" target="_blank">
                <h2 class="title"><?php echo $News->title ?> </h2>
            </a>
            <!-- Description, etc -->
            <?php if ($News->description != null){
                echo '<h4 class="description">'.$News->description.'</h4>';
            }
            ?>
            <p>Content: <?php echo $News->content ?> </p>
            <a href="<?php echo $News->url ?>">Read further...</a>
            <h5>Author: <?php echo $News->author ?> </h5>
            <h5>Published: <?php echo $News->publishedAt ?> </h5>
                
            
        </div>
        <?php
            }
        ?>
    </div>
                
</div>