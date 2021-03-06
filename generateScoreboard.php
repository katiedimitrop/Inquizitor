<html lang="en" >
<head>
</head>
<body>
<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 18-Mar-18
 * Time: 2:10 PM
 * #Pseudocode for the script

 * loop through all the teams in the session
 * {
 *    loop to fill the $workTeamAnswerArray with the answers of the current team
 *    {
 *        get the answer for the current question
 *        check it against the correct value from $correctArray --> use a checking function
 *        add score to the scoreArray for the current team;
 *    }
 * }
 * rsort(correctArray);
 * generate html table from the sorted array
 */
session_start();
$dbuser = 'master5';
$dbpass = 'master123';
$dbhost = 'projectdatabase3.cpvnf88ap5ww.eu-west-2.rds.amazonaws.com';
$dbname = "projectdatabase3";

$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to Connect to '$dbhost'");

#all of the arrays used by the script, with suitable names
$correct_array = array();
$workTeamAnswerArray = array();
$scoreArray = array();
$scoreArray[0] = 0;
$teamsArray = array();
# storing the results of the query

#Get the ID of the first question in the quiz
$firstQuestionQueryStatement = "SELECT idQuestion FROM projectdatabase3.Question WHERE questionText='".implode($_SESSION['result'][0])."' AND Quiz_idQuiz=".$_SESSION['quizId'];
$firstQuestionQuery = mysqli_query($connect, $firstQuestionQueryStatement);
$questionIdArray = mysqli_fetch_array($firstQuestionQuery,MYSQLI_NUM);
$questionId = intval(implode($questionIdArray));
#echo exec('whoami');
#echo "<br>";
#echo "This is query to get the ID of the first question <br>";
#echo $firstQuestionQueryStatement;
#echo "<br>";
#echo $questionId;
#echo "<br>";
#echo "This is query to get the correct answers from the database <br>";
#Get the correct answers from the database and put them into $correct_array
for($index = 0; $index < sizeof($_SESSION['result']); $index++)
{
    $answerQueryStatement = "SELECT answerText FROM projectdatabase3.Answer WHERE Question_idQuestion=" . $questionId;
    $answerQuery = mysqli_query($connect, $answerQueryStatement);
    $row = mysqli_fetch_array($answerQuery, MYSQLI_NUM);
    $correct_array[$index] = implode($row);
    $questionId++;

    #echo $answerQueryStatement;
    #echo "<br>";
    #echo $correct_array[$index];
    #cho "<br>";
}
#echo "This is query to get the teams from the Teams table<br>";
#Get the teams from the Connection table and put them into $teamsArray
$teamsArrayQueryStatement = "SELECT teamName FROM projectdatabase3.Teams WHERE sessionId=".$_SESSION['sessionId'];
$teamsArrayQuery = mysqli_query($connect, $teamsArrayQueryStatement);
$teamsArrayIndex = 0;
#echo $teamsArrayQueryStatement;
#echo "<br>";
while ($teamsArrayRow = mysqli_fetch_array($teamsArrayQuery,MYSQLI_NUM))
{
    $teamsArray[$teamsArrayIndex] = implode($teamsArrayRow);
    $key = $teamsArray[$teamsArrayIndex];
    $scoreArray[$key] = 0;
    $teamsArrayIndex++;

    #echo $key;
    #echo "<br>";
}
#Set the number of teams
$numberOfTeams = $teamsArrayIndex-1;
#Loop through the teams
for($currentTeamIndex = 0; $currentTeamIndex <= $numberOfTeams; $currentTeamIndex++)
{
    #Get the current team's answers from the teamAnswer table and put it into $workTeamAnswerArray
    /*
    $workTeamAnswerArrayQueryStatement = "SELECT answerText FROM projectdatabase3.teamAnswer WHERE teamName='".$teamsArray[$currentTeamIndex]."' AND sessionId=".$_SESSION['sessionId'];
    $workTeamAnswerArrayQuery = mysqli_query($connect, $workTeamAnswerArrayQueryStatement);
    while($workTeamAnswerArrayRow = mysqli_fetch_array($workTeamAnswerArrayQuery,MYSQLI_NUM))
    {
        $workTeamAnswerArray[] = $workTeamAnswerArrayRow;
    }*/


    $questionNumber = 1;
    for($questionNumber = 1; $questionNumber <= 10; $questionNumber++)
    {
        $workTeamAnswerArrayQueryStatement = "SELECT answerText FROM projectdatabase3.teamAnswer WHERE teamName='" . $teamsArray[$currentTeamIndex] . "' AND sessionId=" . $_SESSION['sessionId'] . " AND  questionNumber=" . $questionNumber;
        $workTeamAnswerArrayQuery = mysqli_query($connect, $workTeamAnswerArrayQueryStatement);
        $row = mysqli_fetch_array($workTeamAnswerArrayQuery, MYSQLI_NUM);
        $workTeamAnswerArray[$questionNumber - 1] = implode($row);

        #echo $workTeamAnswerArrayQueryStatement;
        #echo "<br>";
        #echo $workTeamAnswerArray[$questionNumber - 1];
    }


    #$scoreHTML="";
    #Go through the questions one by one and check if they are similar enough via Levenshtein's Algorithm
    for($questionIndex = 0; $questionIndex < sizeof($_SESSION['result']); $questionIndex++)
    {
        #echo "am intrat la " .$questionIndex."<br>";
        $correctAnswer = "";
        $teamAnswer = "";
        $correctAnswer = $correct_array[$questionIndex - 1];
        $teamAnswer = $workTeamAnswerArray[$questionIndex];
        #echo $correctAnswer;
        #echo "   ** vs **   ";
        #echo $teamAnswer;
        #echo "<br>";
        #Add 5 points to the team's score if the answer is good enough
        if(levenshtein($correct_array[$questionIndex-1], $workTeamAnswerArray[$questionIndex]) < 2)
        {
            $scoreArray[$currentTeamIndex] += 5;
        }
        #$scoreHTML.= "<p>".$teamsArray[$currentTeamIndex]." answered ".$teamAnswer." and the answer was ".$correctAnswer." levenshtein returned ".levenshtein($correct_array[$questionIndex], $workTeamAnswerArray[$questionIndex])."</p><br>";
        $scoreArray[$currentTeamIndex] += 1;
    }

}
#Sort the score array in descending order
rsort($correct_array);

#String that contains the html file generated by this script
$html = "<!DOCTYPE html>
<html lang=\"en\" >


<head>
<title>innQUIZitor</title>
  <link rel=\"stylesheet\"
      href=\"https://fonts.googleapis.com/icon?family=Material+Icons\">
  <link rel=\"stylesheet\"
      href=\"https://code.getmdl.io/1.3.0/material.indigo-orange.min.css\" />
  <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <script defer src=\"https://code.getmdl.io/1.3.0/material.min.js\"></script>

  <link rel=\"stylesheet\" href=\"styles/loginPageStyle.css\">

</head>

<body>
     <div class=\"topnav\">
       <a href=\"contactPage.html\">Contact</a>
       <a href=\"loginPage.html\">Log in</a>
       <a href=\"connectPage.html\">Connect</a>
       <a href=\"hostPage.html\">Host</a>
       <a href=\"create-page.html\">Create</a>
       <a href=\"index.html\">Home</a>
       <img id=\"logo2\" width=\"5%\" height=\"5%\" src=\"images\Logo2.png\"/>
       <header href=\"#\">InnQUIZitor</header>
     </div>

</body>";

#append the table and generate it
$html .= '
<div class = "form">
<table style="width:100%; color: white">
  <tr>
    <th>Team Name</th>
    <th>Score</th> 
  </tr>';
#echo $numberOfTeams;
#echo "<br>";
for($teamIndex = 0; $teamIndex <= $numberOfTeams; $teamIndex++)
{
    $html .=
        "<tr>
            <td>" .$teamsArray[$teamIndex]."</td>
            <td>".$scoreArray[$teamIndex]."</td>
         </tr>";
}
$html .="</table></div></html>";
#$html.="</table>".$scoreHTML."</div></html>";
#Create an html file according to the sessionID
$fileName = $_SESSION['sessionId'] . ".html";
$htmlFile = fopen($fileName, "w");
#Put the HTML code in the file
fwrite($htmlFile, $html);
#Go to the leaderboard html page
header("Location:".$fileName);
exit;
?>
</body>
</html>



