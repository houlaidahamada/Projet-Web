<?php
            if (isset($_GET['searchBar']) ? $_GET['searchBar'] : ''){
                $k = trim($_GET['searchBar']);
                $search_string = "SELECT * FROM posts WHERE ";
                $display_words = "";
                                    
                $keywords = explode(' ', $k);			
                foreach ($keywords as $word){
                    $search_string .= "keywords LIKE '%".$word."%' OR ";
                    $display_words .= $word.' ';
                }
                $search_string = substr($search_string, 0, strlen($search_string)-4);
                $display_words = substr($display_words, 0, strlen($display_words)-1);
                $conn = mysqli_connect("mysql-projetweb2.alwaysdata.net", "245104", "marioChampi", "projetweb2_vanes");

                $query = mysqli_query($conn, $search_string);
                $result_count = mysqli_num_rows($query);

                echo '<article id="resultats"><b><u>'.number_format($result_count).'</u></b> résultat trouvé';
                echo '<h2>Votre recherche pour <i>"'.$display_words.'"</i></h2>';
                if ($result_count > 0){

                    echo '<table class="search">';
                    
                    while ($row = mysqli_fetch_assoc($query)){
                        echo '
                            <h1>'.$row['title'].'</h1>
                            <p>'.$row['content'].'</p>
                            <i>'.$row['keywords'].'</i>';
                    }
                    
                    echo '</article>';
                }
                else
                    echo 'Aucun résultat pour ce mots cléf.';

            }
            else
                echo '';
            
?>