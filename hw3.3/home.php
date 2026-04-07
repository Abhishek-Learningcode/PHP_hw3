<?php
include "db.php";
$result=$conn->query("select * from status");

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $pname=$_POST['pname'];
    $pdes=$_POST['pdes'];
    $s=$_POST['s'];
    $sd=$_POST['sd'];
    $ed=$_POST['ed'];

    $sql=$conn->prepare("insert into status(pname,pdes,status,sd,ed)values(?,?,?,?,?)");
    $sql->bind_param('sssss',$pname,$pdes,$s,$sd,$ed);
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
                    <a class="navbar-brand" href="#">Hello <?= $_SESSION['un']?></a>
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
                           
                            <button
                                class="btn btn-outline-success my-2 my-sm-0"
                                type="submit"
                            >
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
            
        </header>
        <main>
            <form action="" method="POST">
               <div
                class="container mt-5 col-5"
               >
                 <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="pname"
                        id="formId1"
                        placeholder=""
                    />
                    <label for="formId1">Project Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="pdes"
                        id="formId1"
                        placeholder=""
                    />
                    <label for="formId1">Project Description</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="s"
                        id="formId1"
                        placeholder=""
                    />
                    <label for="formId1">Status</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="sd"
                        id="formId1"
                        placeholder=""
                    />
                    <label for="formId1">Star Date</label>
                </div>
                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control"
                        name="ed"
                        id="formId1"
                        placeholder=""
                    />
                    <label for="formId1">End Date</label>
                </div>
                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    submit
                </button>
                
               </div>
               
               <div
                class="container"
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
                            <th scope="col">Project Name</th>
                            <th scope="col">Project Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row=$result->fetch_assoc()){

                        ?>
                        <tr>
                            <td><?= $row['id']?> </td>
                            <td><?= $row['pname']?></td>
                            <td><?= $row['pdes']?></td>
                            <td><?= $row['status']?></td>
                            <td><?= $row['sd']?></td>
                            <td><?= $row['ed']?></td>
                            <td><a href="edit.php?id=<?= $row['id']?>">edit</a></td>
                            <td><a href="delete.php?id=<?= $row['id']?>">delete</a></td>
                            <?php } ?>
                        </tr>
                        
                    </tbody>
                </table>
               </div>
               
               </div>
               
                
                
                
            </form>
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
