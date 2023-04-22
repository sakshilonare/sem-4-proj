<?php 

session_start();

	if(!isset($_SESSION['crud3'])){
		header("Location: login.php");
	}

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("Location: http://localhost/crud3/");
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PomoDone</title>
  <link rel="stylesheet" href="ind.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet"> 
</head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-169261747-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag() {
				dataLayer.push(arguments);
			}
			gtag("js", new Date());

			gtag("config", "UA-169261747-1");
		</script>
		<meta charset="utf-8" />
		<meta property="og:title" content="PomoDone" />
		<meta property="og:image" type="image/ico" content="favicon.ico"  />
		<meta
			name="description"
			content="PomoDone is a simple and configurable Pomodoro timer. It aims to provide a visually-pleasing and reliable way to track productivity using the Pomodoro Technique."
		/>
		<meta
			name="keywords"
			content="pomodoro technique, tomato timer, pomodoro timer, online pomodoro timer, software timer, pomodoro software timer, productivity tools, gtd, getting things done, productivity, digital timer, concentration techniques, pomodoro resources, pomodoro software, to-do list"
		/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>PomoDone</title>

		<link
			rel="stylesheet"
			href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
			integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
		<script
			src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
			integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
			crossorigin="anonymous"
		></script>
		<link rel="stylesheet" href="ind.css" type="text/css" />
		<link rel="shortcut icon" type="x-icon" href="favicon.ico" />
		<link href="https://fonts.googleapis.com/css2?family=Arvo:wght@400;700&display=swap" rel="stylesheet" />
	</head>

	<body>
		<!-- Scroll Indicator -->
		<div class="line" id="scrollIndicator"></div>

		<!-- Main Content -->
		<div class="border-bottom" id="mainPage">
			<!-- Alert -->
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<span id="alertMessage"></span>
				<button type="button" class="close" onclick="dismissAlert()" aria-label="Close">
					<span aria-hidden="true"><i class="fas fa-times fa-lg mt-1"></i></span>
				</button>
			</div>
			<!-- Brand Name -->
			<div class="d-flex justify-content-center navbar border-bottom">
				<nav class="navbar navbar-light py-0 justify-content-center" id="brand">
					<a class="navbar-brand" href="/">
						<img src="favicon.png" class="align-top" alt="PomoDone Logo" />
						<span id="brandName">PomoDone</span>
					</a>
					<!-- Only Visible when small -->
					<ul class="nav nav-pills justify-content-end">
						<li class="nav-item">
							<a class="nav-link px-2 d-md-none button-pressed-no-shadow" data-toggle="modal" data-target="#toDoModal" href="#"
								><i class="fas fa-tasks fa-lg"></i
							></a>
						</li>
						<li class="nav-item pl-2 pr-0">
							<a class="nav-link px-2 mx-1 d-md-none button-pressed-no-shadow" data-toggle="modal" data-target="#loggingModal" href="#"
								><i class="fas fa-chart-bar fa-lg"></i
							></a>
						</li>
						<li class="nav-item">
							<a class="nav-link pl-2 pr-0 ml-2 d-md-none button-pressed-no-shadow" data-toggle="modal" data-target="#settingsModal" href="#"
								><i class="fas fa-cog fa-lg"></i
							></a>
						</li>
						<li class="nav-item">
							<a class="nav-link pl-2 pr-0 ml-2 d-md-none button-pressed-no-shadow" data-toggle="modal" data-target="#loginModal" href="#"
								><i class="fas fa-user-circle fa-lg"></i
							></a>
						</li>
					</ul>
				</nav>
			</div>
			<!-- NAVBAR -->
			<div class="container mt-3">
				<div class="row justify-content-end">
					<div class="col-6 px-0">
						<ul class="nav nav-pills">
							<div class="col-lg-4 px-0">
								<a class="nav-link active pt-2 nav-underline" id="pomodoros" data-toggle="tab" role="tab" aria-selected="false" href="/">Focus</a>
							</div>
							<div class="col-lg-4 px-0">
								<a class="nav-link pt-2 nav-underline" id="shortBreak" data-toggle="tab" role="tab" aria-selected="false" href="/">Short Break</a>
							</div>
							<div class="col-lg-4 px-0">
								<a class="nav-link pt-2 nav-underline" id="longBreak" data-toggle="tab" role="tab" aria-selected="false" href="/">Long Break</a>
							</div>
						</ul>
					</div>
					<div class="col-3">
						<ul class="nav nav-pills justify-content-end">
							<li class="nav-item">
								<a class="nav-link px-2 d-none d-md-block button-pressed-no-shadow" data-toggle="modal" data-target="#toDoModal" href="#"
								title="To-Do List"	
								><i class="fas fa-tasks fa-lg"></i
								></a>
							</li>
							<li class="nav-item pl-2 pr-0">
								<a class="nav-link px-2 mx-1 d-none d-md-block button-pressed-no-shadow" href="http://localhost/crud3/php/log.php"
								title="Logs"
								><i class="fas fa-chart-bar fa-lg"></i
								></a>
							</li>
							<li class="nav-item">
								<a
									class="nav-link px-2 pr-0 ml-2 d-none d-md-block button-pressed-no-shadow"
									data-toggle="modal"
									data-target="#settingsModal"
									href="#"
									title="Settings"
									><i class="fas fa-cog fa-lg"></i
								></a>
							</li>
								 <li class="nav-item">
									<a
										class="nav-link pl-2 pr-0 ml-2 d-none d-md-block button-pressed-no-shadow"
										data-target="#loginModal"
										href="ind.php?logout=true"
										title="Logout"
										><i class="fas fa-sign-out-alt fa-lg">
											</i
									></a>
						            </li>
					        </ul>
					</div>
				</div>
			</div>
			<!-- Timer and Buttons -->

			<div class="container-fluid">
				<div class="row">
					<!-- Time Left and Progress Bar -->
					<div class="col-12 pt-0 d-flex justify-content-center">
						<div class="radial-progress-bar progress-value">
							<div class="overlay">
								<h1 id="timeLeft"></h1>
							</div>
						</div>
					</div>
					<!-- Start, Stop, Reset Buttons -->
					<div class="col-12">
						<div class="container d-flex justify-content-around">
							<div class="row">
								<div class="col-md-4">
									<button type="button" class="button-pressed-effect btn btn-lg btn-success w-100 mb-3" id="startButton">Start</button>
								</div>
								<div class="col-md-4">
									<button type="button" class="button-pressed-effect btn btn-danger btn-lg w-100 mb-3" id="stopButton">Stop</button>
								</div>
								<div class="col-md-4">
									<button type="button" class="button-pressed-effect btn btn-secondary btn-lg w-100 mb-3" id="resetButton">Reset</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Modals -->
		<!-- Settings Modal -->
		<div
			class="modal fade"
			data-keyboard="true"
			id="settingsModal"
			tabindex="-1"
			role="dialog"
			aria-labelledby="settingsModalLabel"
			aria-hidden="true"
		>
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title ml-3">Settings</h3>
						<button type="button" class="close button-pressed-no-shadow" data-dismiss="modal" aria-label="Close">
							<span class="modal-close-button mt-2" aria-hidden="true"><i class="fas fa-times fa-lg mt-2 mr-2"></i></span>
						</button>
					</div>
					<div class="modal-body">
						<!-- Selecting Timings -->
						<div class="row ml-1">
							<div class="col-12">
								<p class="h6 text-muted">Time (Minutes)</p>
							</div>
							<div class="col-lg-4">
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-default">Focus</span>
									</div>
									<input id="pomodoroInput" type="number" min="1" step="1" class="form-control" />
								</div>
							</div>
							<div class="col-lg-4">
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-default">Short Break</span>
									</div>
									<input id="shortBreakInput" type="number" min="1" step="1" class="form-control" />
								</div>
							</div>
							<div class="col-lg-4">
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-default">Long Break</span>
									</div>
									<input id="longBreakInput" type="number" min="1" step="1" class="form-control" />
								</div>
							</div>
						</div>

						<hr />
						<!-- Auto Start Next Round -->
						<div class="row ml-1">
							<div class="col">
								<p class="h6 text-muted mt-2">Auto Start Rounds</p>
							</div>
							<div class="col">
								<label class="switch">
									<input id="autoStartRoundsInput" type="checkbox" />
									<span class="slider round"></span>
								</label>
							</div>
						</div>

						<hr />
						<!-- Long Break Interval -->
						<div class="row ml-1">
							<div class="col">
								<p class="h6 text-muted mt-2">Long Break Interval</p>
							</div>
							<div class="col">
								<form>
									<div class="row">
										<div class="col">
											<input type="range" class="custom-range" min="1" max="12" id="longBreakIntervalInput" />
										</div>
										<div class="col">
											<p class="font-weight-bold" id="sliderValue"></p>
										</div>
									</div>
								</form>
							</div>
						</div>

						<hr />
						<!-- Tick Sounds -->
						<div class="row ml-1">
							<div class="col">
								<p class="h6 text-muted mt-2">Tick Sounds</p>
							</div>
							<div class="col">
								<label class="switch">
									<input id="tickSoundInput" type="checkbox" />
									<span class="slider round"></span>
								</label>
							</div>
						</div>

						<hr />
						<!-- Ending Notification Sound -->
						<div class="row ml-1">
							<div class="col-sm-6">
								<p class="h6 text-muted mt-2">Timer Ending Notification</p>
							</div>
							<div class="col-sm-6">
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<span class="input-group-text notification-text">Last</span>
									</div>
									<input id="notificationTextInput" type="number" min="0" step="1" class="form-control col-sm-3" />
									<div class="input-group-prepend">
										<span class="input-group-text notification-text">&nbsp&nbspMinutes</span>
									</div>
								</div>
							</div>
						</div>

						<hr />
						<!-- Background Music -->
						<div class="row ml-1">
							<div class="col">
								<p class="h6 text-muted mt-2">Background Music</p>
							</div>
							<div class="col">
								<select class="form-control custom-select" id="backgroundMusicOptions" style="width: 10rem">
									<option>None</option>
									<option>Rain</option>
									<option>Ocean</option>
									<option>Forest</option>
									<option>Campfire</option>
									<option>Lofi</option>
								</select>
							</div>
						</div>

						<hr />
						<!-- Dark Mode -->
						<div class="row ml-1">
							<div class="col">
								<p class="h6 text-muted mt-2">Dark Mode</p>
							</div>
							<div class="col">
								<label class="switch mb-0">
									<input id="darkModeToggle" type="checkbox" />
									<span class="slider round"></span>
								</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="container d-flex justify-content-center my-1">
							<button type="button" class="btn btn-primary button-pressed-no-shadow shadow-none" data-dismiss="modal" id="saveButton">
								Save Changes
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Logging Modal -->
		<!-- <div class="modal fade" data-keyboard="true" id="loggingModal" tabindex="-1" role="dialog" aria-labelledby="loggingModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title ml-3">Log</h3>
						<button type="button" class="close button-pressed-no-shadow" data-dismiss="modal" aria-label="Close">
							<span class="modal-close-button" aria-hidden="true"><i class="fas fa-times fa-lg mt-2 mr-2"></i></span>
						</button>
					</div>
					<div class="modal-body">
						<div class="log-modal-content">
						<form action="savelog.php" method="post">
							<table class="table table-striped table-responsive-md" id="logDataTable">
								<thead>
									<tr>
										<th scope="col">Session</th>
										<th scope="col">Date</th>
										<th scope="col">Start Time</th>
										<th scope="col">End Time</th>
										<th scope="col">Time</th>
										<th scope="col">Description</th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody id="locationUpdateLog"></tbody>
							</table>
							<div class="container d-flex justify-content-center">
								<span id="NoDataLoggedText">No data logged yet</span>
							</div>
							<button type="submit" id="save">Save Log</button>
						</form>
						</div>
					</div>
					<div class="modal-footer">
						<div class="container d-flex justify-content-center">
							<button type="button" class="btn btn-primary button-pressed-no-shadow shadow-none" id="clearButton">Clear Log</button>
                            <button type="button" onclick="addDataToLog1()">download CSV</button>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<!-- To Do Modal -->
		<div class="modal fade" data-keyboard="true" id="toDoModal" tabindex="-1" role="dialog" aria-labelledby="toDoModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title ml-3">Todo</h3>
						<button type="button" class="close button-pressed-no-shadow" data-dismiss="modal" aria-label="Close">
							<span class="modal-close-button" aria-hidden="true"><i class="fas fa-times fa-lg mt-2 mr-2"></i></span>
						</button>
					</div>
					<div class="modal-body">
						<div class="container todo-main-content">
							<!-- Task Input  -->
							<div class="input-group mb-3">
								<input
									id="taskInput"
									type="text"
									class="form-control"
									placeholder="Task Description"
									aria-label="Task name"
									aria-describedby="addTaskButton"
								/>
								<div class="input-group-append">
									<button class="btn btn-outline-secondary button-pressed-no-shadow" id="addTaskButton" onclick="submitTask()" type="button">
										Add
									</button>
								</div>
							</div>
							<div class="container d-flex justify-content-center">
								<span id="NoTaskTodayText">No tasks for today</span>
							</div>
							<!-- Task items -->
							<ul class="list-group" id="listOfTasks"></ul>
						</div>
					</div>
					<div class="modal-footer">
						<div class="container d-flex justify-content-center">
							<button type="button" class="btn btn-primary button-pressed-no-shadow shadow-none" id="clearTasksButton">Clear Tasks</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--Login Modal-->
		<div class="modal fade" data-keyboard="true" id="loggingModal" tabindex="-1" role="dialog" aria-labelledby="loggingModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title ml-3">Log</h3>
						<button type="button" class="close button-pressed-no-shadow" data-dismiss="modal" aria-label="Close">
							<span class="modal-close-button" aria-hidden="true"><i class="fas fa-times fa-lg mt-2 mr-2"></i></span>
						</button>
					</div>
					<div class="modal-body">
						<a href="http://localhost/crud2/login.php">Login</a>
					</div>
				</div>
			</div>
		</div>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.0/howler.js"></script>
		<script src="app.js"></script>
		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
			integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
			crossorigin="anonymous"
		></script>
		<script
			src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
			integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
			crossorigin="anonymous"
		></script>
		<!-- <script type="text/javascript">
	$(function(){
		$('#save').click(function(e){
			e.preventDefault();
			var logData = $('#logData').val();
			$.ajax({
				type: 'POST',
				url: 'savelog.php',
				data: {logData: logData},
				success: function(response){
					alert(response);
				},
				error: function(xhr, status, error){
					alert(error);
				}
			});	
		});
	}); 
</script> -->
	</body>
</html>