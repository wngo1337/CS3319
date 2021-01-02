<!DOCTYPE html>
<html>
    <head>
        <!-- careful with the href, might be index2 in my VM -->
        <link rel="stylesheet" type="text/css" href="index2.css">
        <meta charset="utf-8">
        <!-- Oh man, I got title confused with headers. Uh oh... -->
        <title>University Course Database</title>
    </head>

    <!-- Tested this, doesn't give errors so it should work -->
    <?php
        include 'connectdb.php';
    ?>

    <body>
        <!-- I am taking some inspiration from the PHP workshop -->
        <!-- I really don't know when to use divs, so you will see a lot of them maybe... -->
        <div class="boxed">
            <h1><span>Welcome to The University Courses Database!</span></h1>
        </div>

        <div class="boxed">
            <h2>Looking For Western Course Data?</h2>
            <div class="boxed">
                <form action="getwesterncourses.php" method="post">
                    <h3>Choose the field you would like to sort by:</h3>
                    <input type="radio" name="sortingfield" value="coursenumber">Course Number<br>
                    <input type="radio" name="sortingfield" value="coursename">Course Name<br>

                    <h3>Choose the order you would like to sort the field by:</h3>
                    <input type="radio" name="sortingorder" value="ASC">Ascending<br>
                    <input type="radio" name="sortingorder" value="DESC">Descending<br><br>

                    <input type="submit" name="sortingfieldsubmit" value="Get Western Courses!">
                </form>
            </div>
        </div>
                
            </div>
        </div>
        
        <div class="boxed">
            <h2>Want to Add a New Course?</h2>
            <div class="boxed">
                <form action="addwesterncourses.php" method="post">
                    <p>Enter the new course's course number (xx#### format):</p> <input type="text" name="newcoursenumber"/>
                    <p>Enter the new course's name:</p> <input type="text" name="newcoursename"/><br>
                    <p>Enter the new course's weight (0.5 or 1.0):</p> <input type="text" name="newcourseweight"/><br>
                    <p>Enter the new course's suffix (A, B, A/B, or leave blank):</p> <input type="text" name="newcoursesuffix"/><br>

                    <input type="submit" name="submitattributechange"/>
                </form>
            </div>
        </div>

        <div class="boxed">
            <h2>Want to Look Up Courses by University?</h2>
            <div class="boxed">
            <form action="getcoursesbyuniversity.php" method="post">
                <select name="universitynumber">
                <?php
                    include "getuniversities.php";
                ?>
                </select>
                <input type="submit" name="submitgetcoursesbyuniversity"/>
            </form>
            </div>
        </div>

        <div class="boxed">
            <h2>Want to Look Up Universities by Province Code?</h2>
            <div class="boxed">
            <form action="getuniversitiesbyprovince.php" method="post">
                <select name="province">
                <?php
                    include "getprovinces.php";
                ?>
                </select>
                <input type="submit" name="submitgetuniversitiesbyprovince"/>
            </form>
            </div>
        </div>

        <div class="boxed">
            <h2>Want to Look Up Information by Western Course Number?</h2>
            <div class="boxed">
            <form action="getinformationbywesterncoursenumber.php" method="post">
                <select name="coursenumber">
                <?php
                    include "getwesterncoursenumbers.php";
                ?>
                </select>
                <input type="submit" name="submitgetinformationbywesterncoursenumber"/>
            </form>
            </div>
        </div>

        <div class="boxed">
            <h2>Want to See Course Equivalencies by Decision Date?</h2>
            <div class="boxed">   
                <form action="getequivalenciesbydate.php" method="post">
                    <input type="date" id="equivalencydate" name="equivalencydate">
                    <input type="submit" name="submitequivalencydate">
                </form>
            </div>
        </div>

        <div class="boxed">
            <h2>Want to Add an Equivalency?</h2>
            <div class="boxed">
            <form action="addequivalencies.php" method="post">
                <label for="westerncoursenumber">Western Course Number</label>
                <select name="westerncoursenumber">
                    <?php
                        include "getwesterncoursenumbers.php";
                    ?>
                </select>
                
                <label for="outsidecoursecode">Outside Course Code</label>
                <select name="outsidecoursecode">
                    <?php
                        include "getoutsidecoursenumbers.php";
                    ?>
                </select>
                   
                <input type="submit" name="submitnewequivalency"/>
            </form>
            </div>
        </div>
        
    </body>
</html>

