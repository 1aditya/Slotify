<?php include("includes/header.php"); ?>

<h1 class="pageHeadingBig">You Might Also Like</h1>
<div class="gridViewContainer">
    <?php
        $albumQuery = pg_query($con,"SELECT * FROM albums ORDER BY RANDOM() LIMIT 10");
        while($row = pg_fetch_array($albumQuery)){
            echo "<div class='gridViewItem'>
                    <a href='album.php?id=" . $row['id'] . "'>
                        <img src='" . $row['artworkpath'] . "'>   
                        <div class='gridViewInfo'>"
                            . $row['title'] .
                        "</div>
                    </a>
                    </div>";
        }
    ?>

</div>


<?php include("includes/footer.php"); ?>