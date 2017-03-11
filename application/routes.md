HTTTP URL => CONTROLLER.ACTION // REMARKS

GET / => home.index

GET /auth => auth.index // display login form
POST /auth/login => auth.login // process login

GET /auth/logout => auth.logout // process logout

GET /auth/signup => auth.signup // display signup form
POST /auth/signup => auth.signup // process user creation
