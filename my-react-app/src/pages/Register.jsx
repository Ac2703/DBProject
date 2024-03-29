import React from "react";
import Header from "../Header";


function Register() {
    return (
        <div>
            <div>
                <Header></Header>
            </div>

            <div id="wut">
                <form method="POST" action="https://codd.cs.gsu.edu/~ssmalley1/DBSystems/php/register.php">
                    <input id="email" name="email" type='email' placeholder="Enter Email"></input>
                    <br/>
                    <br/>
                    <input id="p1" name="p1" type='password' placeholder="Enter Password"></input>
                    <br/>
                    <br/>
                    <input id="p2" name="p2" type='password' placeholder="Re-enter Password"></input>
                    <br/>
                    <br/>
                    <br/>
                </form>
                <a href='/'>
                    <button type="button" id='button'>Register</button>
                </a>
            </div>

        </div>

    );
    {}

}

export default Register;
