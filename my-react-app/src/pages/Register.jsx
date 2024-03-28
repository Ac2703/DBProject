import React from "react";
import Header from "../Header";


function Register() {
    return (
        <div>
            <div>
                <Header></Header>
            </div>

            <div id="wut">
                <input name="email" type='email' placeholder="Enter Email"></input>
                <br/>
                <br/>
                <input name="p1" type='password' placeholder="Enter Password"></input>
                <br/>
                <br/>
                <input name="p2" type='password' placeholder="Re-enter Password"></input>
                <br/>
                <br/>
                <br/>

                <a href='/'>
                    <button type="button" id='button'>Register</button>
                </a>
            </div>

        </div>

    );
    {}

}

export default Register;
