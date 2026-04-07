<?php
include "db.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql=$conn->prepare("select * from emp where id=?");
    $sql->bind_param('i',$id);
    $sql->execute();
    $user=$sql->get_result()->fetch_assoc();
}
if($_SERVER["REQUEST_METHOD"]==="POST"){
     $name=$_POST['name'];
    $age=$_POST['age'];
    $sal=$_POST['sal'];
    $email=$_POST['email'];
    $sql=$conn->prepare("update emp set name=?,age=?,salary=?,email=? where id=?");
    $sql->bind_param('sidsi',$name,$age,$sal,$email,$id);
    if($sql->execute()){
        header("Location:home.php");
    }
}


?>


<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <div
                class="container mt-5 col-5"
            >
                <form action="" method="POST">
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            id="formId1"
                            placeholder=""
                            value="<?= $user['name'] ?>"
                        />
                        <label for="formId1">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="age"
                            id=""
                            placeholder=""
                            value="<?= $user['age'] ?>"
                        />
                        <label for="formId1">age</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="sal"
                            id="formId1"
                            placeholder=""
                            value="<?= $user['salary'] ?>"
                        />
                        <label for="formId1">salary</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="email"
                            id="formId1"
                            placeholder=""
                            value="<?= $user['email'] ?>"
                        />
                        <label for="formId1">Email</label>
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Submit
                    </button>   
                </form>
            </div>
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

