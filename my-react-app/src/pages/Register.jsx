import React from "react";
import Header from "../Header";
import { Link } from "react-router-dom";

function Register() {
    // Potential form submission handler (to be implemented)
    const handleSubmit = (e) => {
        e.preventDefault();
        // Handle your form submission logic here
    };

    return (
        <div>
            <Header /> {/* Simplified */}
            
            {/* You might want a form element here for better semantics and accessibility */}
            <form onSubmit={handleSubmit}>
                <div id="wut">
                    <input name="email" type="email" placeholder="Enter Email" />
                    <br/><br/>
                    <input name="p1" type="password" placeholder="Enter Password" />
                    <br/><br/>
                    <input name="p2" type="password" placeholder="Re-enter Password" />
                    <br/><br/><br/>
                    {/* Corrected Link usage for navigation */}
                    <Link to='/'>
                        <button type="submit" id="button">Register</button>
                    </Link>
                </div>
            </form>
        </div>
    );
}

export default Register;
