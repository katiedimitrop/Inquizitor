<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 18-Mar-18
 * Time: 2:10 PM
 */

$dbuser = 'master5';
$dbpass = 'master123';
$dbhost = 'projectdatabase3.cpvnf88ap5ww.eu-west-2.rds.amazonaws.com';
$dbname = "projectdatabase3";

$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Unable to Connect to '$dbhost'");

#all of the arrays used by the script, with suitable names
$correct_array = array();
$workTeamAnswerArray = array();
$scoreArray = array();
$teamsArray = array();
# storing the results of the query

#Get the ID of the first question in the quiz
$firstQuestionQueryStatement = "SELECT idQuestion FROM projectdatabase3.Question WHERE questionText=".$_SESSION['result'][0];
$firstQuestionQuery = mysqli_query($connect, $firstQuestionQueryStatement);
$questionIdArray = mysqli_fetch_array($firstQuestionQuery,MYSQLI_NUM);
$questionId = intval($questionIdArray[0]);

$initialQuestionId = $questionId;

for($index = 0; $index < sizeof($_SESSION['result']); $index++)
{
    $answerQueryStatement = "SELECT answerText FROM projectdatabase3.Answer WHERE quizId=" . $questionId;
    $answerQuery = mysqli_query($connect, $answerQueryStatement);
    $row = mysqli_fetch_array($answerQuery, MYSQLI_NUM);
    $correct_array[$index] = $row[0];
    $questionId++;
}

$teamsArrayQueryStatement = "SELECT teamName FROM projectdatabase3.Connection WHERE quizId=".$_SESSION['quizId'];
$teamsArrayQuery = mysqli_query($connect, $teamsArrayQueryStatement);
$teamsArrayIndex = 0;
while ($teamsArrayRow = mysqli_fetch_array($teamsArrayQuery,MYSQLI_NUM))
{
    $teamsArray[$teamsArrayIndex] = $teamsArrayRow;
    $scoreArray[$teamsArray[$teamsArrayIndex]] = 0;
    $teamsArrayIndex++;
}

$numberOfTeams = $teamsArrayIndex - 1;

for($currentTeamIndex = 0; $currentTeamIndex <= $numberOfTeams; $currentTeamIndex++)
{
    $workTeamAnswerArrayQueryStatement = "SELECT answerText FROM projectdatabase3.teamAnswer WHERE teamName=".$teamsArray[$currentTeamIndex];
    $workTeamAnswerArrayQuery = mysqli_query($connect, $workTeamAnswerArrayQueryStatement);

    while($workTeamAnswerArrayRow = mysqli_fetch_array($workTeamAnswerArrayQuery,MYSQLI_NUM))
    {
        $workTeamAnswerArray[] = $workTeamAnswerArrayRow;
    }
    for($questionIndex = 0; $index < sizeof($_SESSION['result']); $index++)
    {
        if(levenshtein($correct_array[$questionIndex], $workTeamAnswerArray[$questionIndex]) < 4)
        $scoreArray[$currentTeamIndex] += 1;
    }

}
rsort($correct_array);

$html = "<!DOCTYPE html>
<html lang=\"en\" >


<head>
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

$html .= '
<div class = "form">
<table style=\"width:100%\">
  <tr>
    <th>Team Name</th>
    <th>Score</th> 
  </tr>';
for($teamIndex = 0; $teamIndex < $numberOfTeams; $teamIndex++)
{
    $html .=
        "<tr>
            <td>" .$teamsArray[$teamIndex]."</td>
            <td>".$scoreArray[$teamIndex]."</td>
         </tr>";
}
$html .="</table></div></html>";

$htmlFile = fopen($_SESSION[sessionId], "w");
fwrite($htmlFile, $html);
#loop through all the teams in the session
#{
#   loop to fill the $workTeamAnswerArray with the answers of the current team
#   {
#       get the answer for the current question
#       check it against the correct value from $correctArray --> use a checking function
#       add score to the scoreArray for the current team;
#   }
#}
#rsort(correctArray);
#generate html table from the sorted array


