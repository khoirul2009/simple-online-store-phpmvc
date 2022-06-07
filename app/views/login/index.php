<style>
    .body {
        height: 100vh;
    }

    .body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }

    .form-signin {
        max-width: 330px;
        padding: 15px;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>
<div class="body">
    <main class="form-signin m-auto w-100">
        <form action="<?= BASEURL; ?>login/attemptLogin" method="post">

            <h1 class="h3 mb-3 fw-semibold ">Login</h1>
            <?= Flasher::flash('message'); ?>
            <div class="form-floating">
                <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            <p class="my-3">Belum punya akun? <a href="<?= BASEURL; ?>register">Register now</a></p>
        </form>
    </main>

</div>