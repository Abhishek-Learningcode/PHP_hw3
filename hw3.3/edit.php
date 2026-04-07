<?php
include "db.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql=$conn->prepare("select * from status where id=?");
    $sql->bind_param('i',$id);
    $sql->execute();
    $user=$sql->get_result()->fetch_assoc();
}
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $pname=$_POST['pname'];
    $pdes=$_POST['pdes'];
    $s=$_POST['s'];
    $sd=$_POST['sd'];
    $ed=$_POST['ed'];

    $sql=$conn->prepare("update status set pname=?,pdes=?,status=?,sd=?,ed=? where id=?");
    $sql->bind_param('sssssi',$pname,$pdes,$s,$sd,$ed,$id);
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
                        value="<?= $user['pname']?>"
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
                        value="<?= $user['pdes']?>"
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
                        value="<?= $user['status']?>"
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
                        value="<?= $user['sd']?>"
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
                        value="<?= $user['ed']?>"
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
