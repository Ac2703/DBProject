function Signup() {
    return (
        <div id="yuh">
            <form method="POST" action="https://codd.cs.gsu.edu/~ssmalley1/DBSystems/php/signin.php">
                <input id="email" name="email" type='email' placeholder="Enter Email"></input>

                <br/>
                <br/>

                <input id="p3" name="p3" type='password' placeholder="Enter Password"></input>
                <br/><br/><br/><br/>
                <a href="HomePage">
                    <button type="submit" id='button'>Sign In</button>
                </a>

                <br/>
                <a href='Register'>
                    <button type="button" id='button'>Register</button>
                </a>
            </form>
        </div>

    );

}

export default Signup