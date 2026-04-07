<?php
include "db.php";
$result=$conn->query("select * from emp");
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $name=$_POST['name'];
    $age=$_POST['age'];
    $sal=$_POST['sal'];
    $email=$_POST['email'];
 $sql=$conn->prepare("insert into emp(name,age,salary,email)values(?,?,?,?)");
 $sql->bind_param('sids',$name,$age,$sal,$email);
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
       <nav
        class="navbar navbar-expand-sm navbar-light bg-light"
       >
        <div class="container">
            <a class="navbar-brand" href="#">hello <?= $_SESSION["un"]?> </a>
            <button
                class="navbar-toggler d-lg-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page"
                            >Home
                            <span class="visually-hidden">(current)</span></a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                                    </ul>
                <form class="d-flex my-2 my-lg-0">
                    <a
                        name=""
                        id=""
                        class="btn btn-primary"
                        href="logout.php"
                        role="button"
                        >logout</a
                    >
                    
                    
                    
                </form>
            </div>
        </div>
       </nav>
       
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
            <div
                class="container mt-5 col-5"
            >
                <div
                class="table-responsive"
            >
                <table
                    class="table table-primary"
                >
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Age</th>
                            <th scope="col">Salary</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row=$result->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?= $row['id']?></td>
                                <td><?= $row['name']?></td>
                                <td><?= $row['age']?></td>
                                <td><?= $row['salary']?></td>
                                <td><?= $row['email']?></td>
                                <td>
                                <a href="edit.php?id=<?= $row['id']?>" class="btn btn-sm btn-warning">edit</a>
                                    </td>
                                </td>
                                <td>
                                    <a href="delete.php?id=<?= $row['id']?>" class="btn btn-sm btn-danger">delete</a>
                                </td>
                                <?php }?>

                            </tr>
                    </tbody>
                </table>
            </div>
            
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
