<?php
session_start();
include "header.php";
include "connection.php";
if(!isset($_SESSION["username"]))
{
    ?>
        <script type="text/javascript">
            window.location="login.php";
        </script>
    <?php
}

?>


        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">

            <center>
                <h1>Previous Quiz Results</h1>
            </center>

            <?php
            $count=0;
            $res=mysqli_query($link,"select * from exam_results where username='$_SESSION[username]' order by id desc");
            $count=mysqli_num_rows($res);

            if($count==0)
            {
                ?>
                <center>
                <h1>No Results Found</h1>
                </center>
                <?php
            }
            else
            {
                echo "<table class='table table-bordered'>";

                echo "<tr style='background-color:#006df0; color:white'>;";
                echo "<th>"; echo "Username"; echo "</th>";
                echo "<th>"; echo "Quiz Type"; echo "</th>";
                echo "<th>"; echo "Total Questions"; echo "</th>";
                echo "<th>"; echo "Correct Answer"; echo "</th>";
                echo "<th>"; echo "Wrong Answer"; echo "</th>";
                echo "<th>"; echo "Quiz Date"; echo "</th>";
                echo "</tr>";

                while($row=mysqli_fetch_array($res))
                {

                    echo "<tr>";
                    echo "<td>"; echo $row["username"]; echo "</td>";
                    echo "<td>"; echo $row["exam_type"]; echo "</td>";
                    echo "<td>"; echo $row["total_question"]; echo "</td>";
                    echo "<td>"; echo $row["correct_answer"]; echo "</td>";
                    echo "<td>"; echo $row["wrong_answer"]; echo "</td>";
                    echo "<td>"; echo $row["exam_time"]; echo "</td>";
                    echo "</tr>";

                }
                echo "</table>";
            }
            


            ?>
            
            </div>
            
        </div>

  
<?php
include "footer.php";
?>