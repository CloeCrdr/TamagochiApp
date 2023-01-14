<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome !</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/images/favicon.jpg">
</head>
<body class="index">
    <aside class="sidebar">
        <ul class="sidebar-links">
            <li>
                <section class="sidebar-group depth-0">
                    <p class="sidebar-heading open">
                        <span>Tamagotchi Project</span> <!---->
                    </p> 
                    <ul class="sidebar-links sidebar-group-items">
                        <li>
                            <a href="index.php#installation" class="t1">Project Initialization</a>
                            <ul class="sidebar-sub-headers">
                                <li class="sidebar-sub-header">
                                    <a href="index.php#download" class="sidebar-link">Download project</a>
                                </li>
                                <li class="sidebar-sub-header">
                                    <a href="index.php#database" class="sidebar-link">Create and connect to database</a>
                                </li>
                                <li class="sidebar-sub-header">
                                    <a href="index.php#start" class="sidebar-link">Start project</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="index.php#requirements" class="t1">Requirements</a>
                            <ul class="sidebar-sub-headers">
                                <li class="sidebar-sub-header">
                                    <a href="index.php#sql" class="sidebar-link">SQL dump</a>
                                </li>
                                <li class="sidebar-sub-header">
                                    <a href="index.php#diagrams" class="sidebar-link">Database diagram</a>
                                </li>
                                <li class="sidebar-sub-header">
                                    <a href="index.php#documentation" class="sidebar-link">Markdown documentation</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </section>
            </li>
        </ul>
    </aside>
    <main class="page"> 
        <h1 id="installation">
            <a href="#installation"></a> 
            Project initialization
        </h1> 
        <div class="custom-block info">
            Here are the specifics about the project initialization. Please follow instructions about it.
        </div>
        
        <h2 id="download">
            <a href="#download"></a> 
            Download the project
        </h2> 
        <div class="custom-block info">
        To start the project, please download it by using the following repository : <a href="https://github.com/CloeCrdr/TamagochiApp/">https://github.com/CloeCrdr/TamagochiApp
        </div> 
        
        <h2 id="database">
            <a href="#database"></a> 
            Create and connect to the database
        </h2> 
        <div class="custom-block info">
        First of all please add your username and password to the Database.class.php (<a href="DB/Database.class.php">./DB/Database.class.php -> getDatabase()</a>)
        <br/><br/>
        To initialize the database please go to the link : <a href="DB/databaseCreate.php">http://localhost/TamagochiApp/DB/databaseCreate.php</a>
        </div> 
        
        <h2 id="start">
            <a href="#start"></a> 
            Start the project
        </h2> 
        <div class="custom-block info">
        To start the project and create a new user follow the link : <a href="views/create_account.php">http://localhost/TamagochiApp/views/create_account.php</a>
        <br/><br/>
        To go to your login page follow the link : <a href="/select_account.php">http://localhost/TamagochiApp/views/select_account.php</a>
        <br/><br/>
        And enjoy your tamagotchi app ! :)
        </div> 

        <h1 id="requirements">
            <a href="#requirements"></a> 
            Requirements
        </h1> 
        <div class="custom-block info">
            Included with the project
        </div>
        
        <h2 id="sql">
            <a href="#sql"></a> 
            SQL dump
        </h2> 
        <div class="custom-block info">
            You can find our SQL dump right away : 
        </div> 
        
        <h2 id="diagrams">
            <a href="#diagrams"></a> 
            Database diagrams
        </h2> 
        <div class="custom-block info">
            To see our database diagrams, you can either see it in <a href="requirements/database_diagram/diagramtamagotchi.html">HTML</a> view or in <a href="requirements/database_diagram/diagramtamagotchi.png">PNG view</a>.
        </div> 
        
        <h2 id="documentation">
            <a href="#documentation"></a> 
            See markdown documentation
        </h2> 
        <div class="custom-block info">
            If you want to see the full MD documentation (or "README.md" in the requirements file) you can check it out <a href="requirements/documentation/doc.md">here</a>.
        </div> 


    </main>
</body>
</html>