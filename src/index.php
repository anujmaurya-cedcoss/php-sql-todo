<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>To-do</title>
</head>

<body>
    <div class="todo">
        <section class="vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">

                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">

                                <h6 class="mb-3">My Todo List</h6>

                                <form class="d-flex justify-content-center align-items-center mb-4">
                                    <div class="form-outline flex-fill">
                                        <input type="text" id="form3" class="form-control form-control-lg" />
                                    </div>
                                    <div class="btn btn-primary btn-lg mx-2 my-0 add-todo">Add</div>
                                    <div>
                                        <!-- date picker -->
                                        <input type='date' id='datepicker' date-format='yyyy-mm-dd'>
                                    </div>
                                </form>
                                <ul class="list-group mb-0 incomplete-list">
                                </ul>
                                <ul class="list-group mb-0 complete-list">

                                </ul>
                                <!-- footer buttons -->
                                <div class="todo-left"> </div>
                                <div class="btn btn-light btn-lg mx-2 my-0 all">All</div>
                                <div class="btn btn-light btn-lg mx-2 my-0 " id="active">Active</div>
                                <div class="btn btn-light btn-lg mx-2 my-0 completed">Completed</div>
                                <div class="btn btn-light btn-lg mx-2 my-0 clear-complete">Clear Complete</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="./JS/main.js"></script>

</html>